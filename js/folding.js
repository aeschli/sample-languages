function somefunction(){
    var myhtml='<div class="form-group">'+
                    '<label for="age1" class="control-label">Minimum Age</label><div class="clearfix"></div>'+
                    '<input type="number" id="age1" name="age1" class="form-control num-only" min="0" step="1" value="0"  />'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="age2" class="control-label">Maximum Age</label><div class="clearfix"></div>'+
                    '<input type="number" id="age2" name="age2" class="form-control num-only" max="100" step="1" value="100"  />'+
                '</div>';
    var bootbx = bootbox.dialog({
        title:'AGE',
        message:myhtml,
        buttons: {
            success: {
                label: "Submit",
                className: "btn-success",
                callback: function () {
                    if ($('#age1').val()==''){ alert ('Please enter the minimum Age'); return false;}
                    if ($('#age2').val()==''){ alert ('Please enter the maximum Age'); return false;}
                    var fdata={min:$('#age1').val(),max:$('#age2').val()}
                    var obj = JSON.stringify(fdata)
                    var dataR3 = ajaxAPICall('POST',obj,'api/age',"application/json");
                        dataR3.success(function (data) {
                        if (data.response="success"){
                            //some data
                        } 
                    }) //Data
                } // Callback
            } //success
        }//Buttons
    })//bootbx
} /* !Function configAge*/