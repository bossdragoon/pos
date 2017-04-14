<?php
$logged = Session::get('User');
//check if user is staff(admin)
//if ($logged['type'] == 'staff'){}
?>
<div class="container-fluid">
    <div class="jumbotron" style="background: url('./public/images/NetworlManimg.png') no-repeat right #D5D5D5; background-size: contain;">
        <h1><?= SYSTEM_NAME ?></h1>
        <p><?= DEPARTMENT_NAME ?></p>
    </div>
    <?php
    IF (isset($logged)) {
        //when user had logged
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div id="menu">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-th-large"></span> Menu</div>
                        <div class="panel-body">
                            <div class="col-sm-6 col-md-3">
                                <a href="<?= URL ?>index" class="btn btn-block btn-default btn-lg" role="button">
                                    <span class="glyphicon glyphicon-inbox gi-2x"></span><br />หน้าหลัก<br />
                                </a>
                            </div>                        
                            <?php
                            if ($logged['type'] == 'staff') {
                                ?>
                                <div class="col-sm-6 col-md-3">
                                    <a href="#" class="btn btn-block btn-default btn-lg" role="button">
                                        <span class="glyphicon glyphicon-plus-sign gi-2x"></span><br />เมนูสำหรับ Admin 1<br />
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <a href="#" class="btn btn-block btn-default btn-lg" role="button">
                                        <span class="glyphicon glyphicon-plus-sign gi-2x"></span><br />เมนูสำหรับ Admin 2<br />
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <a href="#" class="btn btn-block btn-default btn-lg" role="button">
                                        <span class="glyphicon glyphicon-plus-sign gi-2x"></span><br />เมนูสำหรับ Admin 3<br />
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-lg-4">
                                    <a href="#" class="btn btn-block btn-default btn-lg" role="button">
                                        <span class="glyphicon glyphicon-list-alt gi-2x"></span><br />เมนูสำหรับ User<br />
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-5">
                <div id="div_announce" >
                    <div class="panel panel-info">
                        <div class="panel-heading"><h4><span class="glyphicon glyphicon-blackboard"></span><font color="red"><b> ข่าวประกาศ </b></font></h4></div>
                        <div class="panel-body">
                            <!-- List group -->
                            <ul class="list-group">
                                <?php
                                foreach ($this->getAnnouncement as $v) {
                                    ?>
                                    <li class="list-group-item">
                                        <h4>
                                            <strong><?= $v['a_title'] ?></strong>&nbsp;
                                            <label class="label label-default">วันที่ <?= $v['a_date_created'] ?></label>
                                        </h4>
                                        <p><?= $v['a_content'] ?></p>
                                        <hr style="border-bottom: 1px dotted #555;">
                                        <p class="text-right"><em>...แก้ไขล่าสุดเมื่อ&nbsp;<?= $v['a_date_updated'] ?>...</em></p>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-7">
                <div id="menu" >
                    <div class="panel panel-danger">
                        <div class="panel-heading"><span class="glyphicon glyphicon-th-large"></span> สรุปรายงาน</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-primary">
                                                        <span class="glyphicon glyphicon-duplicate"></span>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">จำนวน</h4>
                                                        <div class="info">
                                                            <strong class="amount">1000</strong>
                                                            <span class="text-primary">หน่วย</span>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-muted text-uppercase">(view all)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>            
                                    </div>                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                <div id="menu" >
                    <div class="hidden-xs">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-th-large"></span> Config User </h3>
                            </div>
                            <div class="panel-body">
                                <?= showArrayTable($logged, "SESSION \"User\"") ?>           
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12">
                <div class="panel-heading"><span class="glyphicon glyphicon-stats"></span> Statistics</div>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div id="container" style="width:100%; height:400px;"></div>            
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>

