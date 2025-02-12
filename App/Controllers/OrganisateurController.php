<?php
namespace App\Controllers;
use App\Core\Session;


class OrganisateurController {
    
    public function dashboardView() {
        require_once dirname(__DIR__,1).'\Views\Dashboard\Organisateur\organisateur.php';  
      }
  
}