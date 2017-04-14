$(function () {

    /*
     * Your code here
     */
    moment.locale('th');
    
    $('#datetimepicker1').datetimepicker({
        locale: 'th',
        format: 'D/M/Y',
        allowInputToggle:true
    });
    
    $('#datetimepicker1').on('dp.change',function(e){
        var day = moment(e.date);
        var day2 = moment().format("YYYY-MM-DD");
        $('.test').html("date : " + day2);
    });
});