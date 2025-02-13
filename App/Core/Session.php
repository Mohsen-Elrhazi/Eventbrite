<?php
namespace App\core;

class Session {
    
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setSession($key, $value): void {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function getSession($key) {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    public static function hasSession($key): bool {
        self::start();
        return isset($_SESSION[$key]);
    }

    public static function removeSession($key): void {
        self::start();
        if (self::hasSession($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroySession(): void {
        self::start();
        session_unset(); 
        session_destroy(); 
    }
}