<div class="container">
    <h2>Meeting&nbsp;<small>...</small></h2>
    <hr>
    <div class="form-horizontal" id="searchFrm" > 
        <div class="row">
            <div class="col-md-11">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="keyword">ทีม :</label>
                    <div class="col-sm-10" >
                        <input type="text" id="keyword" name="keyword" class="form-control" />
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-sm-2 control-label">วันที่/เวลา เริ่มประชุม :</label>
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='meeting_date'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='meeting_time'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>                        
                    </div> 
                </div>
                <!--                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox checkbox-warning">
                                            <input type="checkbox" id="show_SatSun" name="show_SatSun" autocomplete="off" />
                                            <label for="show_SatSun">แสดงวันหยุด เสาร์-อาทิตย์ ด้วย</label>
                                        </div>
                                    </div>
                                </div>   -->
            </div>
        </div>
    </div>   
    <hr>
    <div class="form-horizontal">   
        <div id="toolbar">
            <!-- New button -->
            <div class="form-inline" role="form">
                <a href="meeting/form" class="btn btn-success btn-lg">
                    เพิ่มรายการใหม่ <span class="glyphicon glyphicon-plus"></span>
                </a>
            </div>
        </div>
        <!-- Listings -->
        <table id="listings" data-resizable="true"></table>
    </div>
</div>
