<!DOCTYPE html>
<html lang="th">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= TITLE_SYSTEM_NAME ?></title>
        <!--        Favicon     -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= URL; ?>public/images/favicon.ico" />
        <link rel="shortcut icon" type="image/ico" href="<?= URL; ?>public/images/favicon.ico" />
        <link rel="icon" href="<?= URL; ?>public/images/favicon.ico" sizes="64x64"/>
        <link href="<?= URL; ?>public/bootstrap-3.3.5/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="<?= URL; ?>public/js/jquery-2.1.3.js" type="text/javascript"></script>
        <script src="<?= URL; ?>public/bootstrap-3.3.5/dist/js/bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">
        <!--
            var goIndex = setTimeout(function(){ 
                window.location = "<?=URL?>/login/logout";
            }, 3000);
        -->
        </script>
    </head>
    <body style="padding-top: 70px;">
        <div class="container">
            <div class="jumbotron text-center" style="background: #D5D5D5;">
                <h1>Your session has expired!</h1>
                <p>Please Login again. Wait for a minute...</p>
            </div>
        </div>
    </body>
</html>