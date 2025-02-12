<?php

namespace App\Controllers;

use App\Core\Session;
use App\Repositories\UserRepository;

class AdminController
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function renderLayout($page)
    {
        require_once  dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\header.php';
        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\sidebar.php';
        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\section.php';
        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\navbar.php';
        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\homeContent.php';

        //todo include la page specifique selon le nom  de fichier qui est doit correspondant avec nom de page
         require_once dirname(__DIR__,1).'\Views\Dashboard\Admin\pages\\' . $page . '.php';

        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\endHomeContent.php';
        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\endSection.php';
        require_once dirname(__DIR__) . '\Views\Dashboard\Admin\layouts\footer.php';
    }

    public function statistiquesView()
    {
        $this->renderLayout('statistiques');
    }

    public function organisateursView()
    {
        $this->renderLayout('organisateurs');
    }

    public function participantsView()
    {
        $this->renderLayout('participants');
    }

    public function eventsView()
    {
        $this->renderLayout('events');
    }

    public function categoriesView()
    {
        $this->renderLayout('categories');
    }

    public function editCategorieView()
    {
        $this->renderLayout('editCategorie');
    }

    public function tagsView()
    {
        $this->renderLayout('tags');
    }

    public function editTagView()
    {
        $this->renderLayout('editTag');
    }



    public function logoutView()
    {
        $this->renderLayout('logout');
    }

    //-------------amine : displayOrganisateur()------------
    public function displayOrganisateur()
    {
        return $this->userRepository->display();
    }

    public function rederRow($organisateur)
    {

        return "<tr>
        <td> " . $organisateur->getPrenom() . "</td>
        <td> " . $organisateur->getNom() . "</td>
        <td> " . $organisateur->getEmail() . "</td>
        <td> " . $organisateur->getStatus() . "</td>
        <td>
        <a href='admin/updateStatusUser/". $organisateur->getID() ."'>switch</a>
        </td>
    </tr>";
    }

    public function updateStatusUser($id)
    {

        // echo "methode update";
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $this->userRepository->updateStatus("users","users_id",$id);
        }
    }

    //-------------amine : displayOrganisateur()------------



}
