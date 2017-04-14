$(function () {

    //Set Localizations
    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['th-TH']);

    //Set the global defaults for the table
    $.extend($.fn.bootstrapTable.defaults, {
        formatLoadingMessage: function () {
            return "<div><img src='./public/images/loading-hourglass.gif' width='64px' height='64px'/><br>กำลังโหลดข้อมูล, กรุณารอสักครู่...</div>";
        }
    });

    //Set the global defaults for the column
    $.extend($.fn.bootstrapTable.columnDefaults, {
        align: 'center',
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
        url: 'announcement/getListings',
        columns: [
            {
                field: 'a_id',
                title: 'ID',
//                width: '5%',
                filterControl: 'input'
//                formatter: runningFormatter
            },
            {
                field: 'a_title',
                title: 'หัวข้อ',
//                width: '45%',
                align: 'left',
                filterControl: 'input'
            },
            {
                field: 'a_date_created',
                title: 'วันที่เขียนประกาศ',
//                width: '10%',
                filterControl: 'datepicker',
                filterDatepickerOptions: {
                    format: "yyyy-mm-dd",
                    language: "th",
                    autoclose: true,
                    clearBtn: true,
                    todayHighlight: true
                }
            },
            {
                field: 'a_date_updated',
                title: 'แก้ไขล่าสุด',
//                width: '10%',
                filterControl: 'datepicker',
                filterDatepickerOptions: {
                    format: "yyyy-mm-dd",
                    language: "th",
                    autoclose: true,
                    clearBtn: true,
                    todayHighlight: true
                }
            },
            {
                field: 'a_date_expired',
                title: 'วันที่ปิดการประกาศ',
//                width: '10%',
                filterControl: 'datepicker',
                filterDatepickerOptions: {
                    format: "yyyy-mm-dd",
                    language: "th",
                    autoclose: true,
                    clearBtn: true,
                    todayHighlight: true
                }
            },
            {
                field: 'a_show',
                title: 'แสดง',
//                width: '5%',
            },
            {
                field: 'is_expired',
                title: 'หมดเขต',
//                width: '5%',
            },
            {
                field: 'manage',
                title: 'Manage',
//                width: '10%',
//                events: operateEvents,
                formatter: operateFormatter
            }
        ],
//        resizable: true,
        paginationVAlign: 'both',
        sortStable: true,
        detailView: true,
        striped: true,
        icons: {
            paginationSwitchDown: 'glyphicon-collapse-down icon-chevron-down',
            paginationSwitchUp: 'glyphicon-collapse-up icon-chevron-up',
            refresh: 'glyphicon-refresh icon-refresh',
            toggle: 'glyphicon-list-alt icon-list-alt',
            columns: 'glyphicon-th icon-th',
            detailOpen: 'glyphicon-folder-close icon-folder-close',
            detailClose: 'glyphicon-folder-open icon-folder-open',
            clear: 'glyphicon-trash icon-clear'
        },
//        responseHandler: function (res) {
//            //create index field to show table row number
//            $.each(res, function (i, row) {
//                row.index = i + 1;
//            });
//            return res;
//        },
//        queryParams: queryParams,
        detailFormatter: detailShowContent,
//        showExport: true,
//        exportDataType: 'basic',
//        exportTypes: ['excel', 'pdf', 'txt', 'csv'],
//        exportOptions: {
//            onCellHtmlData: DoOnCellHtmlData
//        },
        filterControl: true,
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
        if (row.is_expired === 'Y') {
            return {
//                classes: 'default'
                css: {"color": "#AAA"}
            };
        }
        return {color : "#333"};
    }
//    function rowStyleFormatter(row, index) {
//        var color = '#333';
//        switch (row.day_name) {
//            case 'เสาร์' :
//                color = "purple";
//                break;
//            case 'อาทิตย์' :
//                color = "red";
//                break;
////            default : 
////                color = "#333";
////                break;
//        }
//        return {
//            classes: 'default',
//            css: {"color": color}
//        };
//    }

    function detailShowContent(index, row) {
        return'<p>' + row.a_content + '</p>';
    }
//    function detailViewFormatter(index, row) {
//        var html = [];
//        $.each(row, function (key, value) {
//            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
//        });
//        return html.join('');
//    }

//    function DoOnCellHtmlData(cell, row, col, data) {
//        var result = "";
//        if (data != "") {
//            var html = $.parseHTML(data);
//
//            $.each(html, function () {
//                if (typeof $(this).html() === 'undefined')
//                    result += $(this).text();
//                else if (typeof $(this).attr('class') === 'undefined' || $(this).hasClass('th-inner') === true)
//                    result += $(this).html();
//            });
//        }
//        return result;
//    }

    function operateFormatter(value, row, index) {

        var editBt = '<a class="edit btn btn-info" rel="' + row.a_id + '" href="#" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> ';
        var delBt = '<a class="del btn btn-danger" rel="' + row.a_id
                + '" data-del-info="' + '[' + row.a_id + '] '
                + row.a_title
                + '" href="#" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> ';

        return [editBt, delBt].join('');
    }

//    function queryParams(params) {
//        params.date1 = $('#date1').val();
//        params.date2 = $('#date2').val();
//        params.keyword = $('#keyword').val();
//        // console.log(JSON.stringify(params));
//        // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
//        return params;
//    }


    /*==============================
     * Global Function to use between js file
     ===============================*/
    window.refreshTable = function () {
        $table.bootstrapTable("refresh");
    };

});