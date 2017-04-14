<?php
$User = Session::get('User');
$active = ' class="active"';
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand" href="<?= URL; ?>index"><?= SHORT_NAME_SYSTEM ?></span>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navCRS">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                      
                <span class="icon-bar"></span>                      
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navCRS">
            <ul class="nav navbar-nav">
                <li <?= ($this->pageMenu == 'index' || $this->pageMenu == '') ? $active : ''; ?>>
                    <a href="<?= URL; ?>index"><span class="glyphicon glyphicon-home"></span> หน้าแรก</a></li>
                <li <?= ($this->pageMenu == 'kpip') ? $active : ''; ?>>
                    <a href="<?= URL; ?>kpip"><span class="glyphicon glyphicon-inbox"></span> KPI โปรแกรมเมอร์</a></li>
                <li <?= ($this->pageMenu == 'kpip2') ? $active : ''; ?>>
                    <a href="<?= URL; ?>kpip2"><span class="glyphicon glyphicon-inbox"></span> KPI โปรแกรมเมอร์ <span class="label label-success">V.2</span></a></li>
                <li <?= ($this->pageMenu == 'reports') ? $active : ''; ?>>
                    <a href="<?= URL; ?>reports"><span class="glyphicon glyphicon-inbox"></span> รายงาน</a></li>
                <?php
                if (isset($User['type']) && $User['type'] == "staff") {
                    //if (accessMenu('staff') === 1) { 
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Utilities<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li <?= ($this->pageMenu == 'sqbk') ? $active : ''; ?>>
                                <a href="<?= URL; ?>sqbk"><span class="glyphicon glyphicon-inbox"></span> SQL Backup</a>
                            </li>
                            <li class="divider"></li>
                            <li <?= ($this->pageMenu == 'sasuk') ? $active : ''; ?>>
                                <a href="<?= URL; ?>sasuk"><span class="glyphicon glyphicon-inbox"></span> หนังสือลงรับ ระบบสารบรรณ(archives)</a></li>                            
                            <?php if (isset($User['person_id']) && $User['person_id'] == "1100200430600") { ?>
                                <li <?= ($this->pageMenu == 'medrec') ? $active : ''; ?>>
                                    <a href="<?= URL; ?>medrec"><span class="glyphicon glyphicon-inbox"></span> ข้อมูลสุ่มตรวจเวชระเบียน</a></li>
                                <li <?= ($this->pageMenu == 'holiday') ? $active : ''; ?>>
                                    <a href="<?= URL; ?>holiday"><span class="glyphicon glyphicon-inbox"></span> HOSxP Holiday</a></li>

                                <li <?= ($this->pageMenu == 'repchk') ? $active : ''; ?>>
                                    <a href="<?= URL; ?>repchk"><span class="glyphicon glyphicon-inbox"></span> Report Check</a></li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li <?= ($this->pageMenu == 'reportwork') ? $active : ''; ?>>
                                <a href="<?= URL; ?>reportwork"><span class="glyphicon glyphicon-inbox"></span> Report Works</a></li>
                        </ul>
                    </li>                
                <?php } ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (sizeof($User) > 0) { ?>  
                    <li class="dropdown">
                        <?php
                        $profile_img_name = $User['person_photo'];
                        $profile_img_path = "./public/profile-img/" . $profile_img_name;
                        if (file_exists($profile_img_path)) {
                            $imgurl = $profile_img_path;
                        }

                        if (!empty($profile_img_name)) {
                            ?>
                            <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="profile-navbar-image"><img class="img-circle" src="<?= $imgurl ?>" /></span>
                            <?php } else { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                                    <?php
                                }//end set photo  
                                echo $User['firstname'] . ' ' . $User['lastname'];
                                ?><span class="caret" aria-hidden="true"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= URL; ?>uprofile"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href="<?= URL; ?>uprofile"><span class="glyphicon glyphicon-lock" aria-hidden="true" disabled></span> สิทธิ์การใช้งาน</a></li>
                                <li><a href="http://www.skh.moph.go.th/webapp/"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> โปรแกรมอื่นๆ</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= URL; ?>login/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> ออกจากระบบ</a></li>
                            </ul>
                    </li>                    

                <?php } else {
                    if ($this->pageMenu <> 'index') {
                        ?>
                        <li><a href="<?= URL; ?>login/loginui"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ลงชื่อเข้าใช้ 2</a></li>
                        <li>
                            <a href="#" onclick="
                                    BootstrapDialog.show({
                                        message: $('<div></div>').load('login/index2'),
                                        onshown: function (dialog) {
                                            if ($('#username').val() !== '')
                                            {
                                                //when cookie is usable, always check this box until remove it
                                                $('#password').focus();
                                                $('#check_remember').prop('checked', true);
                                            } else {
                                                $('#username').focus();
                                                $('#check_remember').prop('checked', false);
                                            }
                                        }
                                    });" >
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> ลงชื่อเข้าใช้</a>
                        </li>                    
                    <?php }
                }
                ?>
                <li><a href="<?= URL; ?>about"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> เกี่ยวกับ</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

