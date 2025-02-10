<?php
namespace APP\Core;

class Response{
    
    public function setStatusCode(int $code){
        return http_response_code($code);
    }
}