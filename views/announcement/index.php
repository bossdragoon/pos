<div class="container-fluid">
    <div class="page-header">
        <h1>ตั้งค่าข้อความประกาศ <small>123</small></h1>
    </div>   
    <!-- New button -->
    <div class="form-horizontal">   
        <div id="toolbar">
            <div class="form-inline" role="form">
                <button type="button" id="show_dialog" class="btn btn-success btn-lg " data-toggle="modal" data-target=".bs-example-modal-lg">
                    เพิ่มรายการใหม่ <span class="glyphicon glyphicon-plus"></span>
                </button>
            </div>
        </div>
        <table id="listings" data-resizable="true"></table>
    </div>

    <!-- Listings -->   
    <div id="listings"></div>    

    <!-- Modal -->   
    <div id='frm' class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" name="modalForm" id="modalForm" role="form" action="<?php echo URL; ?>announcement/insertByID" method="post">
                    <!--modal Header--> 
                    <div class="modal-header">
                        <button id="model-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Announcement</h4>
                    </div>
                    <!---------------->
                    <!--modal Body--> 
                    <div class="modal-body">
                        <div id="formAlert"><!--show form submit status--></div>
                        <div class="form-group" id='div_tbl_id'>
                            <label class="control-label col-sm-2" for="a_title">ID :</label>
                            <div class="col-sm-3" >
                                <!--<p class="form-control-static a_id">NEW ID</p>-->
                                <input type="text" class="form-control" id="a_id" name="a_id" placeholder="NEW ID" readonly/>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="a_title">หัวข้อ :</label>
                            <div class="col-sm-10" >
                                <input type="text" id="a_title" name="a_title" class="form-control" />
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="a_date_created">วันที่เขียนประกาศ :</label>
                            <div class="col-sm-7" >
                                <div class="input-group">
                                    <input type="text" id="a_date_created" name="a_date_created" class="form-control daypicker" size="10" placeholder="เลือกวันที่..." aria-describedby="a_date_created">
                                    <span class="input-group-addon" id="a_date_created"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                            <div class="col-sm-3" >
                                <div class="input-group">
                                    <input type="text" id="a_time_created" name="a_time_created" class="form-control timemask" size="8" placeholder="เวลา..." aria-describedby="a_time_created">
                                    <span class="input-group-addon" id="a_time_created"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<label class="control-label col-sm-2"></label>-->
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" id="has_expired" name="has_expired" autocomplete="off" checked/>
                                    <label for="has_expired">กำหนดให้มีการปิดประกาศนี้</label>
                                </div>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="a_date_expired">ปิดการประกาศนี้เมื่อถึงวันที่ :</label>
                            <div class="col-sm-10" >
                                <div class="input-group">
                                    <input type="text" id="a_date_expired" name="a_date_expired" class="form-control daypicker" placeholder="เลือกวันที่..." aria-describedby="a_date_expired" disabled>
                                    <span class="input-group-addon" id="a_date_expired"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="a_content">เนื้อหาประกาศ :</label>
                            <div class="col-sm-10" >
                                <textarea id="a_content" name="a_content" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="a_show_cb">แสดง :</label>
                            <div class="col-sm-10">
                                <input type="checkbox" id="a_show_cb" name="a_show_cb" checked>
                                <input type="hidden" id="a_show" name="a_show">
                            </div>
                        </div>
                    </div>
                    <!---------------->
                    <!--modal Footer-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-primary" id="btn_submit" name="btn_submit" >บันทึก
                            <span class="glyphicon glyphicon-off"></span>
                        </button>
                        <button type="reset" value = "reset" class="btn btn-lg" id="btn_reset" name="btn_reset" >ล้างข้อมูล
                            <span ></span>
                        </button>
                    </div>
                    <!---------------->
                </form>
            </div>
        </div>
    </div>    

</div>