<?php
namespace App\Core;

use App\Controllers\ErrorController;

class Router{
    private string $controller;
    private string $method;
    private int $param;

    public function dispatch(){
        
        //Recuperer URL
        $url= $_SERVER['REQUEST_URI'];
        
        // Diviser URL en segments
        $uri = explode('/', trim(strtolower($url), '/'));
        
        // Extraire le controller premier segment
               $controller = $uri[0] ?? 'platform'; 
            if (empty($controller)) {
                $controller = 'platform'; 
            }
            $controller = ucfirst($controller) . "Controller";
            $this->controller = "App\Controllers\\" . $controller;
        if(!class_exists($this->controller)){
            $errorController=new ErrorController();
            $errorController->error404();
            exit;
        }
        
         $objectController= new $this->controller;

         //Extraire la methode 
         $method= $uri[1] ?? 'platform';
         if (empty($method)) {
            $method = 'platform'; 
        }
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $method=  $method . "View";
        
        }elseif($_SERVER['REQUEST_METHOD']==='POST'){
            $method= $method;
         }
         $this->method= $method;

         //Extraire la parametre 
         if(isset($uri[2])){
         $this->param= $uri[2];  
         }


         if(method_exists($objectController, $this->method)){
            if(!empty($this->param)){
                $objectController->{$this->method}($this->param);
            }else{
                $objectController->{$this->method}();
            }
         }else{
            $errorController=new ErrorController();
            $errorController->error404();
            exit;
         }
         
}
}