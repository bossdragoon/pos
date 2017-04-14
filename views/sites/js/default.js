$(function () {
    
    moment.locale('th');
    $('#meeting_date').datetimepicker({
        locale: 'th',
        format: 'YYYY-MM-DD',
        allowInputToggle:true
    });
    
    $('#meeting_time').datetimepicker({
        locale: 'th',
        format: 'LT',
        allowInputToggle:true
    });
    
//    $('#datetimepicker1').on('dp.change',function(e){
//        var day = moment(e.date);
//        var day2 = moment().format("YYYY-MM-DD");
//        $('.test').html("date : " + day2);
//    });





});