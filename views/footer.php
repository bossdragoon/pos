<?php $logged = Session::get('User'); 
   $people = array("5250499004786", "Joe", "Glenn", "Cleveland");
   if (!in_array($logged['person_id'],$people, TRUE)){
       //TRUE FALSE
?>
<div id="footer">
    <nav class="navbar navbar-default navbar-fixed-bottom "> 
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <li style="margin-right: 0;" class="pull-right">
                    <b>เบราว์เซอร์ที่รองรับ&nbsp;:&nbsp;</b> 
                    &nbsp;<a href="http://www.google.co.th/intl/th/chrome/browser/desktop/index.html" target="_blank">
                        <img style=" width: 20px; height: 20px;" title="Chrome" alt="Chrome" src="<?= URL ?>public/images/chrome.png"> Chrome (แนะนำ) </a>

                    &nbsp;<a href="https://www.mozilla.org/th/firefox/new/" target="_blank">
                        <img style=" width: 20px; height: 20px;" title="Firefox" alt="Firefox" src="<?= URL ?>public/images/firefox.png"> Firefox </a>
                    และ 
                    &nbsp;<a href="http://windows.microsoft.com/th-th/internet-explorer/download-ie" target="_blank">
                        <img style=" width: 20px; height: 20px;" title="IE10+" alt="IE10+" src="<?= URL ?>public/images/ie.png"> IE10 </a> ขึ้นไป
                </li>
                <li>&copy; 2016 <?=SYSTEM_NAME?></li>
            </ul>
        </div>
    </nav>
<!--    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="media-left">
                        <a href=""><img href="" /></a>
                    </div>        
                    <div class="media-body">
                        <h4 class="media-heading">LINE</h4>
                        <p></p>
                    </div> 
                </div>
            </div>        
        </div>
    </div>    -->
</div>
<!--<div id="preloader" class="modal"> Place at bottom of page </div>-->
<?php } ?>
</body>
</html>