<?php
namespace App\Controllers;
use App\Core\Session;


class AdminController {

    public function dashboardView() {
        require_once dirname(__DIR__,1).'\Views\Dashboard\Admin\admin.php';  
      }

      
    public function renderLayout($page){
        require_once  dirname(__DIR__).'\Views\Dashboard\Admin\layouts\header.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\sidebar.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\section.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\navbar.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\homeContent.php'; 
         
                 // Inclure la vue de la page spécifique (par exemple dashboard.php, events.php, etc.)
        $pagePath = '\Views\Dashboard\Admin\pages\\' . $page . '.php';
        if (file_exists($pagePath)) {
            require_once dirname(__DIR__,1). $pagePath;
        } else {
            // Si la page n'existe pas, afficher une erreur 404
            $errorController = new ErrorController();
            $errorController->error404();
            exit;
        }

         
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\endHomeContent.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\endSection.php';  
        require_once dirname(__DIR__).'\Views\Dashboard\Admin\layouts\footer.php';  
    }

    public function eventsView() {
        $this->renderLayout('events'); // Charger la vue events.php
    }
    
   
  
}