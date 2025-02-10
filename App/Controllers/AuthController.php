<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Validation;

class AuthController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }


    public function authView()
    {
        require_once dirname(__DIR__, 1) . '\Views\Auth\auth.php';
    }

    public function register(): void
    {
        $nom = htmlspecialchars(string: $_POST["nom"]);
        $prenom = htmlspecialchars(string: $_POST["prenom"]);
        $image = htmlspecialchars(string: $_POST["image"]);
        $email = htmlspecialchars(string: $_POST["email"]);
        $password = htmlspecialchars(string: $_POST["password"]);
        $role = htmlspecialchars(string: $_POST["role"]);

        if (Validation::validateFields([$nom, $prenom, $image, $email, $password, $role])) {

            if ($this->userRepository->findByEmail($email)) {
                $_SESSION['error'] = "Cet email est déjà utilisé.";
                header("Location:/auth/auth");
                exit;
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $user = new User($nom, $prenom, $image, $email, $hashedPassword, $role, 'Inactive');

                $this->userRepository->save($user);

                header("Location:/auth/auth");
                $_SESSION['success'] = "Vous êtes inscrit avec succès!";
                exit;
            }
        } else {
            $_SESSION['error'] = "Veuillez remplir tous les champs correctement.";
            header("Location:/auth/auth");
            exit;
        }
    }


    public function login() {}
}
