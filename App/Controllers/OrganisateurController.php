<?php
namespace App\Controllers;
use App\Core\Session;


class OrganisateurController {
    
    public function dashboardView() {
        require_once dirname(__DIR__,1).'\Views\Dashboard\Organisateur\organisateur.php';  
      }
  
      public function renderLayout($page){
        require_once  dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\header.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\sidebar.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\section.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\navbar.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\homeContent.php'; 
         
        //todo include la page specifique selon le nom  de fichier qui est doit correspondant avec nom de page
            require_once dirname(__DIR__,1).'\Views\Dashboard\Organisateur\pages\\' . $page . '.php';

        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\endHomeContent.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\endSection.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Organisateur\layouts\footer.php';  
    }

    public function eventsView() {
        $this->renderLayout('events'); 
    }
    
    public function editEventView() {
        $this->renderLayout('editEvent'); 
    }
    
    public function participantsView() {
        $this->renderLayout('participants'); 
    }

    public function statistiquesView() {
      $this->renderLayout('statistiques'); 
    }
    
    public function logoutView() {
      $this->renderLayout('logout'); 
    }
    
}