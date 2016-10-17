if (gpSn!='' && dateList_sn!='' && classifySn!='' && newDateList_sn!=''){
    Ext.MessageBox.confirm('提示',"確定移動共 "+moveCount+" 筆資料到「"+newDateList_Date+"」?",function(bt){if(bt=='yes'){

        Ext.Ajax.request({
            url:subHandler.subController+'&action=moveDateList',
            params:{dateList_sn:dateList_sn,gpSn:gpSn,classifySn:classifySn,newDateList_sn:newDateList_sn},method:'post',
            success:function(result,request){
                if(result.responseText=="ok"){
                    Ext.each(records, ddSource.grid.store.remove, ddSource.grid.store);
                    Ext.ux.TopMsg.msg('訊息','移動完畢',2,150);
                }else{
                    Ext.MessageBox.alert('錯誤',"伺服器連線發生問題,請通知管理人員,該動作取消");
                }
            },
            failure:function(response){
                Ext.MessageBox.alert('Status',"伺服器連線發生問題,請通知管理人員(afterEdit) 將重新設定該數值");
                r.set(e.field,e.originalValue);
            }
        });
    }else{
        Ext.ux.TopMsg.msg('訊息','動作取消',2,150);
    }});
}
//adsasd