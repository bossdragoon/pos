$(function () {
//    make by bossrover
//    $("div#loginform form").on('submit',function(){
//        return false;
//    });

//    $("#check_remember").bootstrapSwitch();

    /*==============================================================*/
    /* Focusing */
    /* //now using after modal event in "menutop.php"
     if($("#username").val() !== "")
     {
     //when cookie is usable, always check this box until remove it
     $("#password").focus();
     $("#check_remember").prop("checked",true);
     }else
     {
     $("#username").focus();
     $("#check_remember").prop("checked",false);
     }
     */
    /*=============================================================*/

    $("#txtBoxWarning").hide();
    $("form").validate({
        rules: {
            username: {required: true},
            password: {required: true}
        },
        messages: {
            username: {
                required: "Username is required!"
                        //,minlength: "Field PostCode must contain at least 3 characters"
            },
            password: {
                required: "Password is required!"
                        //,minlength: "Field PostCode must contain at least 3 characters"
            }
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
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            
        }
    });


});