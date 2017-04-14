<div class="container">
    <div class="row">
<!--        <div class="col-sm-12 text-center">
            <img src="http://192.168.5.5/webapp/img_web/P4P.png" alt="">
        </div>-->
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><?=SYSTEM_NAME?></h1>
            <div class="account-wall">
                <img class="profile-img" src="<?=URL?>public/images/avatar_2x.png" alt="">
                <form class="form-signin">
                    <input type="text" class="form-control" placeholder="เลขที่บัตรประชาชน 13 หลัก" required autofocus>
                    <input type="password" class="form-control" placeholder="รหัสผ่าน" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    <br>
                    <a href="#" class="forgot-pass text-center">ลืมรหัสผ่าน</a>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="#" class="text-center new-account">Create an account</a>
    </div>
</div>