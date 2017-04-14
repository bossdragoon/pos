$(function () {
    /*
     * Initialized
     */
    var formName = 'announcement';
    /*== Initialize datepicker ==*/
    $('.daypicker').datepicker({
        format: "yyyy-mm-dd",
        language: "th",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        orientation: "top"
    });
    
    $('.timemask').mask('00:00:0000', {'translation': {0: {pattern: /[0-9*]/}}});;

    /*== Initialize bootstrapSwitch ==*/
    $("#a_show_cb").bootstrapSwitch({
        onColor: 'success',
        offColor: 'danger',
        onText: 'เปิด',
        offText: 'ปิด'
    });

    clearData();

    /*
     $("#day_name").typeahead({
     source: function (request, response) {
     $.ajax({
     url: "holiday/getAllDayName",
     dataType: "json",
     success: function (data) {
     response(data);
     }
     });
     },
     autoSelect: true,
     displayText: function (item) {
     return item.day_name;
     }
     
     });
     */

    function clearData() {
//        resetElem();
        $('#frm').find("input[type=text], textarea").val("");
        $('#frm').find("select").val("");

        $('#frm .selectpicker').selectpicker('render');

        $('#frm').find("input[type=checkbox]").prop("checked", false);
        toggleExpDate();
        toggleBsSwitch();

        $("#formAlert").hide();

    }

    $("#show_dialog,#btn_reset").on("click", function () {
        clearData();
    });

    /*==============================
     * Edit/Delete Button
     ===============================*/
    $("#listings")
            .on('click', '.edit', function () {
                $('#show_dialog').click();
//                $('#div_hidden_id').show();

                editItem = $(this);
                var id = $(this).attr('rel');

                $.post('announcement/getByID', {'id': id}, function (o) {
                    $('#a_id').val(o[0].a_id);
                    $('#a_title').val(o[0].a_title);
                    $('#a_content').val(o[0].a_content);
                    $('#a_date_created').val(o[0].a_date_created);
                    $('#a_time_created').val(o[0].a_time_created);
                    
                    if(o[0].a_date_expired &&  o[0].a_date_expired !== ""){
                        $('#a_date_expired').val(o[0].a_date_expired);
                        $('#has_expired').prop("checked",true);
                    }else{
                        $('#has_expired').prop("checked",false); 
                    }
                    $('#a_show').val(o[0].a_show);
                    toggleBsSwitch(o[0].a_show);


                    $('#a_title').focus();

                    //re-rendering selectpicker after assign value
                    $('.selectpicker').selectpicker('render');
                    toggleExpDate();

                }, 'json');

                return false;
            })
            .on('click', '.del', function () {
//                $('#div_hidden_id').hide();
                delItem = $(this);
                var id = $(this).attr('rel');

                delConfirmDialog.realize();
                delConfirmDialog.setMessage("ต้องการลบข้อมูลนี้ \"" + $(this).attr("data-del-info") + "\" หรือไม่ ?");
                var delbtn = delConfirmDialog.getButton('del-btn-confirm');
                delbtn.click(function () {
                    $.post('announcement/deleteByID', {'id': id}, function (o) {
                        if (o.chk) {
                            delItem.empty();
                        } else {
                            alertDialog.realize();
                            alertDialog.setMessage('ลบข้อมูลไม่สำเร็จ!\nข้อมูลนี้ถูกใช้งานแล้ว ไม่สามารถลบออกได้');
                            alertDialog.open();
                        }

                        callData();
                        delConfirmDialog.close();
                    }, 'json'); // not use return json data
                });
                delConfirmDialog.open();
                return false;
            });

    /*==============================
     * Form validation & Submit
     ===============================*/
//    $('#btn_submit,#btn_reset').on('click',function(e){
//        e.preventDefault();
//    });


    /* Form method setting */
    function frmMethod(method, form) {
        var methodname = typeof method === 'undefined' ? 'insert' : method.toLowerCase();
        var formname = typeof form === 'undefined' ? $("form").get(0) : form;

        var meth;
        switch (methodname) {
            case 'insert':
                meth = 'insertByID';
                break;
            case 'edit':
                meth = 'updateByID';
                break;
        }

        $(formname).attr({
            "action": formName + "/" + meth
            , "data-form-method": methodname
        });

//        alert($(formname).attr("action"));
    }

    validator = $("#modalForm").validate({
        ignore: [],
        rules: {
            a_title: {required: true},
            a_date_created: {required: true},
            a_content: {required: true}
        },
        messages: {
//            kpi_user: {required: "User is required!"}
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            }
            else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            var id = $('#a_id').val();
            var chkExpired = $('#has_expired').prop("checked");
            
            if(!chkExpired){
                $("#a_date_expired").val('');
            }
            
            if($("#a_show_cb").bootstrapSwitch('state')){
                $("#a_show").val('Y');
            }else{
                $("#a_show").val('');
            }
            
            
//            console.log(id + "/" + chkExpired);
            
            if (id !== "") {
                frmMethod('edit', form);
            } else {
                frmMethod('insert', form);
                alertInit('success', 'เพิ่มข้อมูลอุปกรณ์เรียบร้อย');
            }

            var url = $(form).attr('action');
//            alert(url);
            var data = $(form).serialize();
            $.post(url, data, function (o) {
                refreshTable();
            });

            clearData();
            if ($(form).attr('data-form-method') === 'edit') {
                $('.modal').modal('toggle');
            } else {
                alertShow();
            }

            return false;
        }
    });











    function toggleBsSwitch(status) {
        var state = (status !== undefined ? status : 'Y');

        if (state === 'Y') {
            $("#a_show_cb").bootstrapSwitch('state', true);
            $("#a_show").val('Y');
        } else {
            $("#a_show_cb").bootstrapSwitch('state', false);
            $("#a_show").val('');
        }

    }

    $("#has_expired").on("change", function () {
        toggleExpDate();
    });

    function toggleExpDate() {
        var chk = $("#has_expired").prop("checked");
        var state = (!chk ? true : false);

        $("#a_date_expired").prop("disabled", state);
    }





    /*==============================
     * Search Filter
     ===============================*/
//    $('#item_type_id_Filter').on('change', function () {
//        cPage = 1;
//        refreshTable();
//    });

});