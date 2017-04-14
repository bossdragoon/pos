<?php
$logged = Session::get('User');
//check if user is staff(admin)
//if ($logged['type'] == 'staff'){}
?>
<div class="container-fluid">
    <div class="jumbotron" style="background: url('./public/images/NetworlManimg.png') no-repeat right #D5D5D5; background-size: contain;">
        <h1><?=SYSTEM_NAME?></h1>
        <p><?=DEPARTMENT_NAME?></p>
    </div>
    <?php
    IF(isset($logged)){
        //when user had logged
    ?>
    
    
    <div class="panel panel-primary">
        <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-th-large"></span> Config User </h3>
        </div>
        <div class="panel-body">
            <?=showArrayTable($logged,"SESSION \"User\"")?>           
        </div>
    </div>
    <?php } ?>
</div>

