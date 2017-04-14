$(function () {
    /*
     * SESSION TIMEOUT for Bootstrap
     */
    $.sessionTimeout({
        title: 'Session expiration',
        message: 'Your session is about to expire. Do you want to stay connected and extend your session?',
        keepAliveUrl: 'test/keepAlive',
        keepAlive: true,
        keepAliveInterval: 5000,
        redirUrl: 'login/logoff',
        logoutUrl: 'login/logout',
        warnAfter: 1200000, //1200000  ==> 20 min = 1200 sec
        redirAfter: 1500000, //1500000  ==> 25 min = 1500 sec
//        keepBtnClass: 'btn btn-success',
//        keepBtnText: 'Extend session',
//        logoutBtnClass: 'btn btn-default',
//        logoutBtnText: 'Log me out',
        ignoreUserActivity: false,
//        onWarn: function () {
//            console.log('Your session will soon expire!');
//        },
//        onRedir: function () {
//            //!!!--should including "bootstrap-dialog.js" before
//            BootstrapDialog.show({
//                type: BootstrapDialog.TYPE_DANGER,
//                title: 'Session Timeout',
//                message: 'Your session has expired! <br> Please Login again.!',
//                closable: false
//            });
//            var logoutTimeout = setTimeout(function () {
//                window.location = "login/logout";
//            }, 3000);
//
//        },
        countdownBar: true

    });
});
