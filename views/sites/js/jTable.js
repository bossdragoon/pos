$(function () {

    //Set Localizations
    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['th-TH']);

    //Set the global defaults for the table
    $.extend($.fn.bootstrapTable.defaults, {
        formatLoadingMessage: function () {
            return "<div><img src='./public/images/loading.gif' width='64px' height='64px'/><br>กำลังโหลดข้อมูล, กรุณารอสักครู่...</div>";
        }
    });

    //Set the global defaults for the column
    $.extend($.fn.bootstrapTable.columnDefaults, {
        align: 'left',
        halign: 'center',
        valign: 'middle',
        sortable: true
    });




    var $table = $('#listings'),
            $remove = $('#remove'),
            selections = [];

    /*==============================
     * Bootstrap Table Event
     ===============================*/

    $table.bootstrapTable({
        url: 'meeting/getListings',
        columns: [
            {
                field: 'index',
                title: '#',
                width: '2%',
                align: 'center',
//                formatter: runningFormatter
            },            
            {
                field: 'meeting_date',
                title: 'meeting_date',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'meeting_start_time',
                title: 'meeting_start_time',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'meeting_end_time',
                title: 'meeting_end_time',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'meeting_name',
                title: 'meeting_name',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'meeting_detail',
                title: 'meeting_detail',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'meeting_status',
                title: 'meeting_status',
//                width: '2%',
                sortable: true,
                filterControl: 'select'
            },
            {
                field: 'meeting_organizer',
                title: 'meeting_organizer',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'room_id',
                title: 'room_id',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'team_id',
                title: 'team_id',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'team_name',
                title: 'team_name',
//                width: '2%',
                sortable: true,
            },
            {
                field: 'manage',
                title: 'Manage',
                width: '10%',
//                events: operateEvents,
                formatter: operateFormatter
            }
        ],
//        resizable: true,
        paginationVAlign: 'both',
        sortStable: true,
        detailView: false,
        striped: true,
        responseHandler: function (res) {
            //create index field to show table row number
            $.each(res, function (i, row) {
                row.index = i + 1;
            });
            return res;
        },
        queryParams: queryParams,
//        detailFormatter: detailViewFormatter,
        showExport: true,
        exportDataType: 'basic',
        exportTypes: ['excel', 'pdf', 'txt', 'csv'],
        exportOptions: {
            onCellHtmlData: DoOnCellHtmlData
        },
//        filterControl: true,
        filterShowClear: true,
        toolbar: '#toolbar',
        toolbarAlign: 'left',
        showColumns: true,
        showPaginationSwitch: true,
        showRefresh: true,
        showToggle: true,
        smartDisplay: true,
        pagination: true,
        rowStyle: rowStyleFormatter,
        search: true
    });

    function rowStyleFormatter(row, index) {
        /*
         * ใช้กำหนดสีตัวอักษร หรือพื้นหลัง record โดยเทียบกับข้อมูลที่ต้องการ
         * เช่นจะให้ข้อมูลเป็นสีแดง เวลาที่สถานะ N เป็นต้น 
         */
        var color = '#333';
        var classSet = 'default';
        
        switch (row.has_deleted) {
            case 'Y' :
                //color = "purple";
                classSet = 'danger';
                break;
//            default : 
//                break;
        }
        return {
            classes: classSet,
            css: {"color": color}
        };
    }

    function detailViewFormatter(index, row) {
        /*
         * ใช้กำหนดค่าที่จะแสดงใน detail view
         */
        
//        var html = [];
//        $.each(row, function (key, value) {
//            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
//        });
//        return html.join('');
    }

    function DoOnCellHtmlData(cell, row, col, data) {
        /*
         * ฟังก์ชันไว้ช่วยดึง bootstrap table ส่งออกข้อมูลผ่านตัว Export
         * (ปกติจะไม่แก้ไข)
         */
        var result = "";
        if (data != "") {
            var html = $.parseHTML(data);

            $.each(html, function () {
                if (typeof $(this).html() === 'undefined')
                    result += $(this).text();
                else if (typeof $(this).attr('class') === 'undefined' || $(this).hasClass('th-inner') === true)
                    result += $(this).html();
            });
        }
        return result;
    }

    function operateFormatter(value, row, index) {
        /*
         * สำหรับใช้สร้าง คอลัมน์พิเศษ ที่จะใช้วางปุ่ม edit delete (ส่วนอีเวนท์กดปุ่ม สามารถใส่ไว้ไฟล์อื่นได้) 
         * row (object) ใช้อ้างอิงคอลัมน์ เช่น row.column1
         */
//
//        if (row.day_name !== "เสาร์" && row.day_name !== "อาทิตย์") {
//            var editBt = '<a class="edit btn btn-info" rel="' + row.holiday_date + '" href="#" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> ';
//            var delBt = '<a class="del btn btn-danger" rel="' + row.holiday_date
//                    + '" data-del-info="' + '[' + row.holiday_date + '] '
//                    + row.day_name
//                    + '" href="#" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> ';
//            
//            return [editBt, delBt].join('');
//        }
//        
//        return '';
    }

    function queryParams(params) {
        /*
         * ใช้กำหนดค่าที่จะส่งไปยัง server side
         * เอาไว้สำหรับกรณีมี search filter ที่ไม่ใช่ของ bootstrap table เอง
         */
        params.meeting_date = $('#meeting_date').val();
        params.meeting_time = $('#meeting_time').val();
        params.keyword = $('#keyword').val();
        params.user = $('#user').val();
        // console.log(JSON.stringify(params));
        // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
        return params;
    }

    /*==============================
     * Global Function to use between js file
     ===============================*/
    window.refreshTable = function () {
        $table.bootstrapTable("refresh");
    };
    
    
    

});