<!DOCTYPE html>
<html lang="th">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= TITLE_SYSTEM_NAME ?></title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= URL ?>public/images/favicon.ico" />
        <link rel="shortcut icon" type="image/ico" href="<?= URL ?>public/images/favicon.ico" />
        <link rel="icon" href="<?= URL ?>public/images/favicon.ico" sizes="64x64"/>

        <!--CSS-->
        <link href="<?= URL ?>public/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--<link href="<?= URL ?>public/bootstrap-3.3.7/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>-->
        <link href="<?= URL ?>public/css/themes/bootstrap-theme-flaty.css" rel="stylesheet" type="text/css"/>

        <!--<link href="<?= URL ?>public/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>-->        
        <link href="<?= URL ?>public/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= URL ?>public/bootstrap-dialog/css/bootstrap-dialog.css" />
        <link rel="stylesheet" href="<?= URL ?>public/bootstrap-select/css/bootstrap-select.css" type="text/css"/>
        <link rel="stylesheet" href="<?= URL ?>public/bootstrap-fileinput/css/fileinput.css" type="text/css"/>
        <link rel="stylesheet" href="<?= URL ?>public/bootstrap-checkbox-x/css/checkbox-x.css" type="text/css"/>

        <link rel="stylesheet" href="<?= URL ?>public/bootstrap-table/bootstrap-table.css" type="text/css"/>

        <link href="<?= URL ?>public/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!--[Custom CSS]-->
        <link rel="stylesheet" href="<?= URL; ?>public/css/pagecss.css" type="text/css"/>
        <link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-glyphicon-custom.css" type="text/css"/>
        <link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-badge-custom.css" type="text/css"/>
        <link rel="stylesheet" href="<?= URL; ?>public/css/mini-stat.css" type="text/css"/>
        <link rel="stylesheet" href="<?= URL; ?>public/css/widget-summary.css" type="text/css"/>

        <!--JS-->        
        <script src="<?= URL ?>public/js/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="<?= URL ?>public/js/moment/moment.js" type="text/javascript"></script>
        <script src="<?= URL ?>public/js/moment/moment-with-locales.js" type="text/javascript"></script>
        <script src="<?= URL ?>public/js/jquery.validate.min.js" type="text/javascript"></script>        
        <!--<script src="<?= URL ?>public/js/jquery.twbsPagination.js" type="text/javascript"></script>-->

        <script src="<?= URL ?>public/bootstrap-3.3.7/js/bootstrap.js" type="text/javascript"></script>

<!--        <script src="<?= URL ?>public/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.js"></script>
        <script src="<?= URL ?>public/bootstrap-datepicker-1.6.4/locales/bootstrap-datepicker.th.min.js"></script>-->
        <script src="<?= URL ?>public/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?= URL ?>public/bootstrap-dialog/js/bootstrap-dialog.js"></script>
        <script src="<?= URL ?>public/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="<?= URL ?>public/bootstrap-fileinput/js/fileinput.js"></script>
        <script src="<?= URL ?>public/bootstrap-checkbox-x/js/checkbox-x.js"></script>


        <script src="<?= URL ?>public/bootstrap-table/bootstrap-table.js"></script>
        <script src="<?= URL ?>public/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
        <script src="<?= URL ?>public/tableExport.jquery.plugin-master/tableExport.min.js"></script>
        <script src="<?= URL ?>public/tableExport.jquery.plugin-master/libs/jsPDF/jspdf.min.js"></script>
        <script src="<?= URL ?>public/tableExport.jquery.plugin-master/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
        <script src="<?= URL ?>public/bootstrap-table/extensions/resizable/bootstrap-table-resizable.js"></script>
        <script src="<?= URL ?>public/bootstrap-table/colResizable-1.5.source.js"></script>
        <script src="<?= URL ?>public/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.js"></script>

        <script src="<?= URL ?>public/js/bootstrap-add-clear.js"></script>
        <script src="<?= URL ?>public/bootstrap-session-timeout/js/bootstrap-session-timeout.js"></script>
        <script src="<?= URL ?>public/js/bootstrap-waitingfor.js"></script>
        <script src="<?= URL ?>public/js/pagejscript.js"></script>

        <!--[External Script]-->
        <!--<script src="http://code.highcharts.com/highcharts.js">-->


        <?php
        $User = Session::get('User');
        if (isset($User['type'])) {
            //when login, starting session-timeout widgets
            ?>
            <script src="<?= URL ?>public/js/page-bt-session-timeout.js"></script>
        <?php } ?>
        <?php
        require 'pagescript.php';
        ?>
    </head>
    <body style="padding-top: 70px;">
        <?php Session::init(); ?>