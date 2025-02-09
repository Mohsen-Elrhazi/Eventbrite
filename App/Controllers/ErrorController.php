<?php
namespace App\Controllers;

class ErrorController {

    public function error404() {
        require_once dirname(__DIR__,1).'\Views\ErrorPages\error404.php';  
    }
}