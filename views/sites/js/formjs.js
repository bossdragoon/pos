$(function () {
    
    moment.locale('th');
    $('#meeting_date').datetimepicker({
        locale: 'th',
        format: 'YYYY-MM-DD',
        allowInputToggle:true
    });
    
    $('#meeting_start_time,#meeting_end_time').datetimepicker({
        locale: 'th',
        format: 'LT',
        allowInputToggle:true
    });

    
    $('#btnSave').on('click',function(){
        
        return false;        
        
    });





});