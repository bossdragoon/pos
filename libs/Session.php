<?php

class Session {

    public static function init() {
        @session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = ($value)? $value:null;
    }

    public static function get($key) {
        if (isset($_SESSION)) {
            return $_SESSION[$key];
        }
    }

    public static function destroy() {
        //unset($_SESSION);
        
        //PHP 5.3 + How To Completely Destroy Session Variables In PHP   
        //
        //http://7php.com/php-5-3-how-to-completely-destroy-session-variables-in-php/
        //remove PHPSESSID from browser
        if (isset( $_COOKIE[session_name()] ) ){
            setcookie( session_name(), "", time()-3600, "/" );
        }
        //clear session from globals
        $_SESSION = array();
        //clear session from disk
        session_destroy();
    }

}
