<?php
namespace App\Controllers;

// use App\Models\User;
// use App\Repositories\UserRepository;
// use App\Services\Validation;

class AuthController {
    private $userRepository;

    // public function __construct() {
    //     $this->userRepository = new userRepository();
    // }
    
    public function registerView() {
        require_once dirname(__DIR__,1).'\Views\Auth\register.php';  
    }
}