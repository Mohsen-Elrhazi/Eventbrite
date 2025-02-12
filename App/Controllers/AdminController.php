<?php
namespace App\Controllers;
use App\Core\Session;


class AdminController {
    
    public function dashboardView() {
        require_once dirname(__DIR__,1).'\Views\Dashboard\Admin\admin.php';  
      }
  
}