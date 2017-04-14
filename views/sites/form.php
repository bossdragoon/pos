<div class="container">
    <h2>เพิ่มรายการใหม่</h2>
    <hr>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="txtred">*&nbsp;</span>วันที่ประชุม :</label>
            <div class="col-sm-10">
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class='input-group date' id='meeting_date'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>                        
            </div> 
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="meeting_start_time"><span class="txtred">*&nbsp;</span>เริ่มประชุมเวลา :</label>
            <div class="col-sm-10">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <div class='input-group date' id='meeting_start_time'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <label for="meeting_end_time" class="col-md-1 control-label"><span class="txtred">*&nbsp;</span>ถึง :</label>
                    <div class="col-sm-4">
                        <div class='input-group date' id='meeting_end_time'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>                        
            </div> 
        </div>        
        <div class="form-group">
            <label class="col-sm-2 control-label">หัวข้อการประชุม :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="meeting_name" />
            </div> 
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ทีม :</label>
            <div class="col-sm-10 col-lg-4">
                <select class="form-control selectpicker" data-live-search="true" data-show-tick="true" id="meeting_team" >
                    <?php
                    foreach ($this->getTeamList as $value) {
                        echo "<option value='{$value["team_id"]}'>{$value["team_name"]}</option>";
                    }
                    ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ห้อง :</label>
            <div class="col-sm-10 col-lg-4">
                <select class="form-control selectpicker" data-live-search="true" data-show-tick="true" id="meeting_room" >
                    <?php
                    foreach ($this->getRoomList as $value) {
                        echo "<option value='{$value["room_id"]}'>{$value["room_name"]}</option>";
                    }
                    ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ผู้จัด :</label>
            <div class="col-sm-10 col-lg-5">
                <input type="text" class="form-control" id="meeting_organizer" />
            </div> 
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">รายละเอียด :</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="meeting_detail"></textarea>
            </div> 
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <button class="btn btn-success" id="btnSave"><i class="fa fa-floppy-o fa-3x" aria-hidden="true"></i>&nbsp;บันทึกข้อมูล</button>
                <button class="btn btn-danger" id="btnClear"><i class="fa fa-refresh fa-3x" aria-hidden="true"></i>&nbsp;ล้าง</button>
            </div>
        </div>
        
    </form>   
    <hr>
    <!-- Listings -->
    <div id="listings-person"></div> 
</div>
