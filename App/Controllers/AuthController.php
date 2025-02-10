<?php
namespace App\Controllers;

use App\Models\User;
// use App\Repositories\UserRepository;
use App\Services\Validation;

class AuthController {
    private $userRepository;

    public function __construct() {
        // $this->userRepository = new userRepository();
    }
    
    public function register() {
        echo "methode de register POST";
    }

    public function authView() {
        require_once dirname(__DIR__,1).'\Views\Auth\auth.php';  
    }

    public function login() {
        echo "methode de login POST";
        // header("location:/platform/platform");
    }
}