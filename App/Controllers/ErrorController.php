<?php
namespace App\Controllers;
use App\Core\Response;

class ErrorController {
    private $response;

    public function __construct(){
        $this->response =new Response();
    }

    public function error404() {
        $this->response->setStatusCode(404);
        require_once dirname(__DIR__,1).'\Views\ErrorPages\error404.php';  
    }

    public function error403() {
        $this->response->setStatusCode(403);
        require_once dirname(__DIR__,1).'\Views\ErrorPages\error403.php';  
    }
}