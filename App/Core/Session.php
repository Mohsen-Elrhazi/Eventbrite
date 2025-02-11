<?php
namespace App\core;

class Session {

    public function __construct(){
        if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
     }
    

    public static function setSession($key, $value): void {
        $_SESSION[$key] = $value;
    }

    public static function getSession($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function hasSession($key): bool {
        return isset($_SESSION[$key]);
    }

    public static function removeSession($key): void {
        if (self::hasSession($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroySession(): void {
        session_unset(); 
        session_destroy(); 
    }
}