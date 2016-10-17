// API地址
var API_INIT = 'kitchen/kitcheninfoinit/getkcallinfoforinitdisplay';
var API_CONFIRM = '';
if(loginMode == 0){
  API_CONFIRM = 'kitchen/kitchencookmode/updatewhencompletecook';
}
if(loginMode == 1){
  API_CONFIRM = 'kitchen/kitchenservemode/updatewhencompleteserve';
}
var WS_URL = WS_CONTEXTPATH + '/websocket/' + ((loginMode == 0) ? 'cookmodewebsocketserver' : 'servemodewebsocketserver');

// 测试设置
var commonOption = {
  timegrad1: 5 * 60,
  timegrad2: 15 * 60,
  timegrad3: 20 * 60
};
// 加载模板
require(T('kitchen/main/modulars'), function (TPL) {
  // 用于过滤方案的数组
  var itemIdList = [];
  // 客位区域信息
  var areaList = [];
  // 客位类型信息
  var pointTypeList = [];
  // 品项大类信息
  var itemBigClassList = [];
  // 品项小类信息
  var itemSmallClassList = [];
  // 单个菜品模型
  var List = Backbone.Model.extend({
    defaults: {
      // 数据
      kscId: '',                          // ID
      scId: '',                           // 服务ID
      kitchenFlg: loginMode == 0 ? 1 : 2, // 传配状态 0：备菜 1：配菜 2：出品 3：完成
      lastQty: 0,                         // 当前数量
      coUnknowQty: 0,                     // 退菜未知数量
      itemId: '',                         // 品项ID
      itemName: '',                       // 品项名称
      itemCode: '',                       // 品项代码
      itemPinyin: '',                     // 品项拼音
      unitName: '',                       // 单位名称
      sizeId: '-1',                       // 规格ID -1：无规格
      sizeName: '-',                      // 规格名称
      methodText: null,                   // 制作方法
      remark: null,                       // 备注
      pkgFlg: 0,                          // 套餐标志
      smallClassId: '',                   // 小类ID
      pointId: '',                        // 客位ID
      pointName: '',                      // 客位名称
      pointCode: '',                      // 客位代码
      pointPinyin: '',                    // 客位拼音
      createTimeForTimeStamp: 0,          // 创建时间（时间戳 单位：ms）
      standardTime: null,                 // 标准制作时长（Int 单位：分钟）
      warnTime: null,                     // 警告时间（Int 单位：分钟）
      hastenFlg: null,                    // 催菜标志
      // 内部状态
      checked: false,                     // 是否选中 true：选中 false：未选中
      filtered: false,                    // 是否被过滤 true：过滤后的 false：被拒绝
      // 其他
      smallClassName: '',                 // 品项小类名称
      smallClassCode: '',                 // 品项小类代码
      unitId: '',                         // 单位ID
      createTime: '',                     // 创建时间（标准时间）
      enableMutiSize: false               // 是否启用多规格
    },
    idAttribute: 'kscId'
  });
  // 菜品组模型
  var Group = Backbone.Model.extend({
    defaults: {
      kscIdArr: [],                       // 单个菜品ID数组
      kitchenFlg: loginMode == 0 ? 1 : 2, // 传配状态 0：备菜 1：配菜 2：出品 3：完成
      lastQty: 0,                         // 当前数量
      coUnknowQty: 0,                     // 退菜位置数量
      itemId: '',                         // 品项ID
      itemName: '',                       // 品项名称
      unitName: '',                       // 单位名称
      sizeId: '-1',                       // 规格ID -1：无规格
      sizeName: '-',                      // 规格名称
      methodText: null,                   // 制作方法
      remark: null,                       // 备注
      pkgFlg: 0,                          // 套餐标志
      pointName: '',                      // 客位名称
      createTimeForTimeStamp: 0,          // 创建时间（时间戳 单位：ms）
      standardTime: null,                 // 标准制作时长（Int 单位：分钟）
      warnTime: null,                     // 警告时间（Int 单位：分钟）
      hastenFlg: null,                    // 催菜标志
      checked: false,                     // 是否选中 true：选中 false：未选中 'part'：部分选中
      timer: 0,                           // 计时器
      filtered: false,                    // 是否被过滤 true：过滤后的 false：被拒绝
    },
    // 统一设置组内的菜品
    setModels: function(setting){
      _.each(this.get('kscIdArr'), function(value){
        listCollection.get(value).set(setting);
      });
    },
    // 获取组内模型
    getModels: function(callback){
      _.each(this.get('kscIdArr'), function(value, index, list){
        callback(listCollection.get(value), index, list);
      });
    }
  });
  // 菜品集合
  var ListCollection = Backbone.Collection.extend({
    model: List,
    // 清楚所有被选中的项
    clearChecked: function(){
      _.each(this.where({checked: true}), function(model){
        model.set({checked: false});
      });
    },
    // 设置集合，根据过滤方案的数组过滤数据
    setCollection: function(list){
      var filtered = [];
      _.each(list, function(value){
        if(itemIdList.indexOf(value.itemId) != -1){
          filtered.push(value);
        }
      });
      this.set(filtered);
    },
    // 获取指定模型（通过where）的属性值（what），返回属性值的数组
    getAttrs: function(where, what){
      var re = [];
      _.each(this.where(where), function(model){
        re.push(model.get(what));
      });
      return re;
    },
    // 删除模型
    removeModels: function(list){
      var _this = this;
      _.each(list, function(id){
        _this.remove(_this.get(id));
      });
    }
  });
  var listCollection = new ListCollection;
  // 菜品组集合
  var GroupCollection = Backbone.Collection.extend({
    model: Group,
    initialize: function(){
      this.listenTo(listCollection, 'all', function(event, model, collection){console.log(event, model, collection);});
      // 监听菜品集合（listCollection）新增（add）事件
      this.listenTo(listCollection, 'add', this.addOneModel);
      // 监听菜品集合（listCollection）删除（remove）事件
      this.listenTo(listCollection, 'remove', this.removeOneModel);
      // 监听过滤状态变化
      this.on('change:filtered', this.changeFiltered);
    },
    // 渲染集合数据
    addOneModel: function(model){
      var _this = this;
      _this.addItem(model);
    },
    // 渲染集合模型
    addItem: function(model){
      var curItem = this.findItem(model);
      // 判断组内是否存在菜品，已存在增加数量，不存在新加组
      if(curItem){
        var curIds = curItem.get('kscIdArr');
        curIds.push(model.get('kscId'));
        curItem.set({
          kscIdArr: curIds,
          lastQty: curItem.get('lastQty') + model.get('lastQty'),
          coUnknowQty: curItem.get('coUnknowQty') + model.get('coUnknowQty')
        });
      }else{
        this.add({
          kscIdArr: [model.get('kscId')],
          scId: model.get('scId'),
          kitchenFlg: model.get('kitchenFlg'),
          lastQty: model.get('lastQty'),
          coUnknowQty: model.get('coUnknowQty'),
          itemId: model.get('itemId'),
          itemName: model.get('itemName'),
          unitName: model.get('unitName'),
          sizeId: model.get('sizeId'),
          sizeName: model.get('sizeName'),
          methodText: model.get('methodText'),
          remark: model.get('remark'),
          pkgFlg: model.get('pkgFlg'),
          pointName: model.get('pointName'),
          createTimeForTimeStamp: model.get('createTimeForTimeStamp'),
          standardTime: model.get('standardTime'),
          warnTime: model.get('warnTime'),
          hastenFlg: model.get('hastenFlg'),
          checked: false,
          timer: 0,
          filtered: this.checkFiltered(model)
        });
      }
    },
    // 删除菜品数据
    removeOneModel: function(model){
      var curItem = this.findItem(model);
      if(curItem){
        var ids = curItem.get('kscIdArr');
        var index = ids.indexOf(model.get('kscId'));
        if(index != -1){
          ids.splice(index, 1);
          if(ids.length){
            curItem.set({
              kscIdArr: ids,
              lastQty: curItem.get('lastQty') - model.get('lastQty'),
              coUnknowQty: curItem.get('coUnknowQty') - model.get('coUnknowQty')
            });
          }else{
            this.remove(curItem);
          }
        }else{
          (new Message).warn('数据出错，请刷新重试');
        }
      }else{
        (new Message).warn('数据出错，请刷新重试');
      }
    },
    // 查找已有模型，用来合并显示菜品
    findItem: function(model){
      return this.findWhere({
        scId: model.get('scId'),
        itemId: model.get('itemId'),
        sizeId: model.get('sizeId'),
        pkgFlg: model.get('pkgFlg'),
        kitchenFlg: model.get('kitchenFlg'),
        methodText: model.get('methodText'),
        remark: model.get('remark')
      });
    },
    // 检测显示状态
    checkFiltered: function(model){
      var active = dishesScreenCollection.findWhere({active: true});
      return active
        && active.get('itemId') == model.get('itemId')
        && active.get('sizeId') == model.get('sizeId')
        && active.get('pkgFlg') == model.get('pkgFlg');
    },
    // 控制显示状态
    doFilter: function(rules){
      this.each(function(model){
        model.set({filtered: false});
      });
      var filtered = this.where({
        itemId: rules.get('itemId'),
        sizeId: rules.get('sizeId'),
        pkgFlg: rules.get('pkgFlg')
      });
      _.each(filtered, function(model){
        model.set({filtered: true});
      });
    },
    // 清除选中状态
    clearChecked: function(){
      _.each(this.models, function(model){
        model.set('checked', false);
      });
    },
    // 修改显示状态
    changeFiltered: function(model, isFiltered){
      model.setModels({filtered: isFiltered});
    }
  });
  var groupCollection = new GroupCollection;
  // 单项View
  var ItemView = Backbone.View.extend({
    tagName: 'div',
    className: 'item',
    template: _.template($(TPL).find('#listItemTpl').html()),
    initialize: function(){
      // 初始化时执行计时器
      this.timer();
      // 监听模型的计时器（timer）数据变化
      this.listenTo(this.model, 'change:timer', this.changeTimer);
      // 监听模型的选中状态（checked）
      this.listenTo(this.model, 'change:checked', this.changeCheckState);
      // 监听模型的数量变化
      this.listenTo(this.model, 'change:lastQty change:coUnknowQty', this.changeNum);
      // 监听模型的显示状态变化
      this.listenTo(this.model, 'change:filtered', this.isShow);
    },
    events: {
      // 点击事件：修改选中状态
      'click': 'check'
    },
    // 点击时触发，修改选中状态
    check: function(){
      // 判断是否在部分配菜/传菜状态
      if(listView.isCheck){
        var isChecked = !this.model.get('checked');
        var totalNum = this.model.get('kscIdArr').length;
        var oldNum = totalNum;
        this.model.getModels(function(model){
          if(model.get('coUnknowQty') == 0 && isChecked){
            model.set({checked: true});
            totalNum--;
          }else{
            model.set({checked: false});
          }
        });
        if(totalNum == 0){
          this.model.set({checked: true});
        }else{
          if(totalNum == oldNum){
            this.model.set({checked: false});
          }else{
            this.model.set({checked: 'part'});
          }
        }
      }
    },
    // 计时器（timer）发生变化时
    changeTimer: function(model, value){
      this.$('.timer').text(timeFormat('%H:%I:%S', value));
      // 刷新计时器状态
      this.initTimerState(value);
    },
    // 修改选中状态
    changeCheckState: function(model, value){
      if(value){
        if(value == 'part'){
          this.$el.removeClass('checked').addClass('part');
        }else{
          this.$el.removeClass('part').addClass('checked');
        }
      }else{
        this.$el.removeClass('checked part');
      }
      appView.changeCheckNum();
    },
    // 修改数量
    changeNum: function(model){
      this.$('.num').text(model.get('lastQty') + model.get('coUnknowQty'));
    },
    // 修改显示状态
    isShow: function(model, value){
      if(value){
        this.$el.show();
      }else{
        this.$el.hide();
      }
    },
    // 渲染
    render: function(){
      this.$el.html((this.template)(this.model.toJSON()));
      if(this.model.get('filtered')){
        this.$el.show();
      }else{
        this.$el.hide();
      }
      return this;
    },
    // 计时器
    timer: function(){
      var _this = this;
      var now = Date.parse(new Date()) / 1000;
      var create = _this.model.get('createTimeForTimeStamp');
      var timer = now - create / 1000;  // 计算用时
      _this.model.set('timer', timer);  // 将用时记录到模型中
      this.initTimerState(timer); // 初始化时间状态
      // 开始计时
      setInterval(function(){
        timer ++;
        _this.model.set('timer', timer);
      }, 1000);
    },
    initTimerState: function(value){
      // 如果时间大于某个警告级别分别显示状态
      if(commonOption.timegrad1 && value > commonOption.timegrad1){
        this.$el.addClass('timegrad1');
      }
      if(commonOption.timegrad2 && value > commonOption.timegrad2){
        this.$el.addClass('timegrad2');
      }
      if(commonOption.timegrad3 && value > commonOption.timegrad3){
        this.$el.addClass('timegrad3');
      }
      // 如果菜品设置了警告时间，当时间大于警告时间则显示对应状态
      var warn = this.model.get('warnTime');
      if(warn && value > warn){
        this.$el.addClass('warn');
      }
      // 如果菜品设置了标准制作时长，当时间大于标准制作时长则显示对应状态
      var standard = this.model.get('standardTime');
      if(standard && value > standard){
        this.$el.addClass('timeout');
      }
    }
  });
  // 列表View
  var ListView = Backbone.View.extend({
    el: $('#kitchenLists'),
    initialize: function(){
      // 监听菜品组集合的add事件
      this.listenTo(groupCollection, 'add', this.addItem);
    },
    // 添加一个菜品组
    addItem: function(item){
      var view = new ItemView({model: item});
      this.$el.append(view.render().el);
    },
    // 是否正在部分配菜/传菜状态，默认为false
    isCheck: false,
    // 开启部分配菜/传菜
    openCheck: function(){
      this.isCheck = true;
      this.$el.addClass('check');
      listCollection.clearChecked();
      groupCollection.clearChecked();
    },
    closeCheck: function(){
      this.isCheck = false;
      this.$el.removeClass('check');
      listCollection.clearChecked();
      groupCollection.clearChecked();
    }
  });
  var listView = new ListView;
  
  // 按菜品筛选
  // 菜品筛选模型
  var DishesScreen = Backbone.Model.extend({
    defaults: {
      itemId: '',     // 品项ID
      sizeId: '',     // 规格ID
      sizeName: '',   // 规格名称
      pkgFlg: 0,      // 套餐标志
      code: '',       // 代码
      lastQty: 0,     // 数量
      coUnknowQty: 0, // 退菜未知数量
      name: '',       // 名称
      pinyin: '',     // 拼音
      kitchenFlg: 1,  // 传配状态 1：正常 0：备菜
      active: false,  // 选中状态
      isShow: true    // 是否显示
    }
  });
  // 菜品筛选集合
  var DishesScreenCollection = Backbone.Collection.extend({
    model: DishesScreen,
    initialize: function(){
      // 监听菜品集合（listCollection）新增（add）事件
      this.listenTo(listCollection, 'add', this.addItem);
    },
    // 添加一个菜品筛选按钮
    addItem: function(model){
      var curItem = this.findWhere({
        itemId: model.get('itemId'),
        sizeId: model.get('sizeId'),
        pkgFlg: model.get('pkgFlg')
      });
      // 查找是否存在相同品项，如果存在修改数量，不存在添加新项
      if(curItem){
        curItem.set({
          lastQty: curItem.get('lastQty') + model.get('lastQty'),
          coUnknowQty: curItem.get('coUnknowQty') + model.get('coUnknowQty')
        });
        if(model.get('kitchenFlg') == 0){
          curItem.set({kitchenFlg: 0});
        }
      }else{
        this.add({
          itemId: model.get('itemId'),
          sizeId: model.get('sizeId'),
          sizeName: model.get('sizeName'),
          pkgFlg: model.get('pkgFlg'),
          code: model.get('itemCode'),
          lastQty: model.get('lastQty'),
          coUnknowQty: model.get('coUnknowQty'),
          name: model.get('itemName'),
          pinyin: model.get('itemPinyin'),
          kitchenFlg: model.get('kitchenFlg') == 0 ? 0 : 1
        });
      }
    }
  });
  var dishesScreenCollection = new DishesScreenCollection;
  // 菜品筛选按钮
  var DishesScreenItemView = Backbone.View.extend({
    tagName: 'button',
    className: 'btn btn-kitchen-screen',
    template: _.template($(TPL).find('#screenItemTpl').html()),
    initialize: function(){
      // 监听模型数量变化
      this.listenTo(this.model, 'change:lastQty change:coUnknowQty', this.changeNum);
      // 监听模型选中状态变化
      this.listenTo(this.model, 'change:active', this.changeActive);
    },
    events: {
      // 点击事件：筛选菜品组的显示
      'click': 'doFilter'
    },
    render: function(){
      this.$el.html((this.template)(this.model.toJSON()));
      return this;
    },
    // 修改数量
    changeNum: function(model){
      this.$('.num').text((model.get('lastQty') + model.get('coUnknowQty')) > 99 ? 99 : (model.get('lastQty') + model.get('coUnknowQty')));
    },
    // 修改选中状态
    changeActive: function(model, value){
      if(value){
        this.$el.addClass('active');
      }else{
        this.$el.removeClass('active');
      }
    },
    // 筛选菜品组的显示
    doFilter: function(){
      dishesScreenCollection.each(function(model){
        model.set({active: false});
      });
      this.model.set({active: true});
      groupCollection.doFilter(this.model);
      appView.back();
    }
  });
  // 菜品筛选View
  var DishesScreenView = Backbone.View.extend({
    el: $('#kitchenScreenDishesList'),
    initialize: function(){
      // 监听菜品筛选集合（dishesScreenCollection）新增（add）事件
      this.listenTo(dishesScreenCollection, 'add', this.addItem);
    },
    // 添加一个菜品筛选按钮
    addItem: function(item){
      var view = new DishesScreenItemView({model: item});
      this.$el.append(view.render().el);
    }
  });
  var dishesScreenView = new DishesScreenView;
  // 系统页面
  var AppView = Backbone.View.extend({
    el: $('#container'),
    kitchenListSimple: this.$('#kitchenListSimple'),            // 全部配菜/传菜按钮组
    kitchenListPart: this.$('#kitchenListPart'),                // 部分配菜/传菜按钮组
    kitchenListNum: this.$('#kitchenListNum'),                  // 列表数量显示
    kitchenListTitle: this.$('#kitchenListTitle'),              // 列表标题显示
    iKitchenListConfirmNum: this.$('#iKitchenListConfirmNum'),  // 部分配菜/传菜快速输入数量
    wsStatus: this.$('#wsStatus'),                              // WebSocket状态灯
    initialize: function(){
      var wsState = 'connect normal close error message'; // WebSocket状态类名组
      var _this = this;
      // 加载数据
      (new Backbone.Model).fetch({
        url: API(API_INIT),
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          loginMode: loginMode,
          itemfilterId: filterId
        }),
        success: function(model, response){
          if(response.success){
            itemIdList = response.data.itemIdList;                            // 初始化过滤方案数组
            areaList = response.data.areaList;                                // 初始化客位区域信息
            pointTypeList = response.data.pointTypeList;                      // 初始化客位类型信息
            itemBigClassList = response.data.itemBigClassList;                // 初始化品项大类信息
            itemSmallClassList = response.data.itemSmallClassList;            // 初始化品项小类信息
            listCollection.setCollection(response.data.kitchenItemInfoList);  // 初始化菜品列表
            // 建立WebSocket通信
            new WS(WS_URL, {
              // 监听状态变化
              doStatus: function(event){
                switch (event) {
                  case 'connect':
                    _this.wsStatus.removeClass(wsState).addClass('connect');
                    break;
                  case 'open':
                    _this.wsStatus.removeClass(wsState).addClass('normal');
                    break;
                  case 'close':
                    _this.wsStatus.removeClass(wsState).addClass('close');
                    break;
                  case 'error':
                    _this.wsStatus.removeClass(wsState).addClass('error');
                    break;
                  case 'message':
                    _this.wsStatus.removeClass(wsState).addClass('message');
                    setTimeout(function () {
                      _this.wsStatus.removeClass(wsState).addClass('normal');
                    }, 1000);
                    break;
                  default:
                    _this.wsStatus.removeClass(wsState).addClass('normal');
                    break;
                }
              },
              // 接收WebSocket推送的信息
              message: function(message){
                switch(message.method){
                  case 'cookInfoAdd':                 // 前台加单菜品进入配菜
                  case 'serveInfoAdd':                // 配菜完成菜品进入传菜
                    listCollection.add(message.data);   // 执行添加数据
                    break;
                  default:                            // 未知消息传入刷新页面
                    location.reload();
                    break;
                }
              }
            });
          }else{
            (new Message).warn(response.msg);
          }
        },
        error: function(){
          (new Message).warn('网络错误，请刷新重试');
        }
      });
      // 监听菜品集合（listCollection）的显示(filtered）状态变化
      this.listenTo(listCollection, 'change:filtered', this.changeFiltered);
    },
    events: {
      'click #btnKitchenConfirmToPart': 'toPart',           // 点击部分配菜/传菜按钮
      'click #btnKitchenConfirmBack': 'back',               // 部分配菜/传菜模式下点击返回
      'keyup #iKitchenListConfirmNum': 'changeConfirmNum',  // 部分配菜/传菜快速输入数量
      'click #btnKitchenConfirmAll': 'confirmAll',          // 点击全部配菜/传菜按钮
      'click #btnKitchenConfirmPart': 'confirmPart'         // 点击部分配菜/传菜按钮
    },
    // 进入部分配菜/传菜模式
    toPart: function(){
      this.kitchenListSimple.hide();
      this.kitchenListPart.show();
      listView.openCheck();
      this.iKitchenListConfirmNum.trigger('focus').val('');
    },
    // 返回全部配菜/传菜模式
    back: function(){
      this.kitchenListPart.hide();
      this.kitchenListSimple.show();
      listView.closeCheck();
    },
    // 全部配菜/传菜
    confirmAll: function(){
      // 查找出菜品列表中所有正在显示状态下（filtered为true）的所有kscId
      this.confirm(listCollection.getAttrs({filtered: true}, 'kscId'));
    },
    confirmPart: function(){
      var checked = listCollection.getAttrs({checked: true}, 'kscId');
      if(checked.length){
        this.confirm(checked);
      }else{
        (new Message).warn('未选择任何菜品');
      }
    },
    confirm: function(list){
      $.ajax({
        url: API(API_CONFIRM),
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          kcKscIdList: list
        }),
        success: function(data){
          if(data.success){
            listCollection.removeModels(list);
          }else{
            (new Message).warn(data.msg);
          }
        },
        error: function(){
          (new Message).warn('系统出错，请刷新重试');
        }
      });
    },
    // 选中状态发生变化时
    changeCheckNum: function(){
      var num = 0;
      _.each(listCollection.where({checked: true}), function(model){
        num += model.get('lastQty');
      });
      this.iKitchenListConfirmNum.val(num ? num : '');
    },
    // 改变部分配菜/传菜快速输入数量时
    changeConfirmNum: function(event){
      if(event.keyCode != 110 && event.keyCode != 190){
        var num = parseFloat(this.iKitchenListConfirmNum.val());
        _.each(groupCollection.where({filtered: true}), function(model){
          var originalNum = model.get('lastQty');
          var temp = originalNum;
          model.getModels(function(model){
            if(model.get('coUnknowQty') == 0){
              var tempNum = model.get('lastQty');
              num -= tempNum;
              if(num >= 0){
                model.set({checked: true});
                temp -= tempNum;
              }else{
                model.set({checked: false});
              }
            }else{
              model.set({checked: false});
            }
          });
          if(temp == originalNum){model.set({checked: false});}else{if(temp == 0){model.set({checked: true});}else{model.set({checked: 'part'});}}
        });
        this.changeCheckNum();
      }
    },
    // 菜品集合的显示状态发生变化时
    changeFiltered: function(){
      if(listCollection.where({filtered: true}).length){
        this.ableControlBtn();
      }else{
        this.disableControlBtn();
      }
    },
    // 开启控制按钮
    ableControlBtn: function(){
      this.$('#btnKitchenConfirmToPart, #btnKitchenConfirmAll, #iKitchenListConfirmNum, #btnKitchenConfirmPart').prop('disabled', false);
    },
    // 禁用控制按钮
    disableControlBtn: function(){
      this.$('#btnKitchenConfirmToPart, #btnKitchenConfirmAll, #iKitchenListConfirmNum, #btnKitchenConfirmPart').prop('disabled', true);
    }
  });
  var appView = new AppView;
});