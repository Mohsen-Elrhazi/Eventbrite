<?php
namespace App\Core\Middleware;

use App\Core\Session;

class AuthMiddleware{
    
    // verifier si user connecté
    public static function checkAuth() {
        if (!Session::hasSession('user_id')) {
            header("Location: /auth/login");
            exit;
        }
    }
    
   // verifier si user a un role specifique
    public static function checkRole($role) {
        self::checkAuth(); 
        $userRole = Session::getSession('role');

        if ($userRole !== $role) {
            header("Location:/error/error403"); // Page interdite si rôle incorrect
            exit;
        }
    }
}