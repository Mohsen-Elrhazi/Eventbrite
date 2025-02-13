<?php

namespace App\Controllers;

use App\Core\Session;
use App\Services\UserService;
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
        require_once dirname(__DIR__, 1) . '\Views\Dashboard\Admin\pages\\' . $page . '.php';

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
        $organisateurs = $this->userRepository->display("Organisateur");

        foreach ($organisateurs as $organisateur) {
            echo UserService::renderRowUser(user: $organisateur);
        }
    }
    public function displayParticipant()
    {
        $participants = $this->userRepository->display("Participant");
        foreach ($participants as $participant) {
            echo UserService::renderRowUser(user: $participant);
        }
    }

    public function updateStatusUser(int $id)
    {
        $this->userRepository->updateStatus($id);
        Session::setSession('success', 'status a été changé avec success');
        $role = $this->userRepository->findById($id);

        if ($role === "Organisateur") {

            header("location:/admin/organisateurs/");
        } elseif ($role === "Participant") {
            header("location:/admin/participants/");
        } else {
            echo "erro";
        }

        exit();
    }


    //-------------amine : displayOrganisateur()------------



}
