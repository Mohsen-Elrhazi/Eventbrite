<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Validation;
use App\Core\Session;

class AuthController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    
    public function registerView()
    {
        require_once dirname(__DIR__, 1) . '\Views\Auth\register.php';
    }
    
    public function loginView()
    {
        require_once dirname(__DIR__, 1) . '\Views\Auth\login.php';
    }

    public function forgotPasswordView()
    {
        require_once dirname(__DIR__, 1) . '\Views\Auth\forgotPassword.php';
    }

    public function register(): void
    {
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $image = htmlspecialchars($_POST["image"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $role = htmlspecialchars($_POST["role"]);

        if (Validation::validateFields([$nom, $prenom, $image, $email, $password, $role])) {

            if ($this->userRepository->findByEmail($email)) {
                Session::setSession('error', 'Cet email est déjà utilisé.');
                header("Location:/auth/register");
                exit;
                
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $user = new User($nom, $prenom, $image, $email, $hashedPassword, $role, 'Inactive');

                $this->userRepository->save($user);

                Session::setSession('success', 'Vous êtes inscrit avec succès!');
                header("Location:/auth/register");
                exit;
            }
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs.');
            header("Location:/auth/register");
            exit;
        }
    }


    public function login()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if (Validation::validateFields([$email, $password])) {
            $user = $this->userRepository->getUserByEmail($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    Session::setSession('user_id', $user['user_id']);
                    Session::setSession('email', $user['email']);
                    Session::setSession('role', $user['role']);
                    Session::setSession('status', $user['status']);


                    switch (Session::getSession('role')) {
                        case 'Admin':
                            header("location:/admin/dashboard");
                            exit();
                    
                        case 'Organisateur':
                            if (Session::getSession('status') === 'Active') {
                                header("location:/organisateur/dashboard");
                                exit();
                            } else {
                                Session::setSession('error', 'Votre compte a été désactivé');
                                header("Location:/auth/login");
                                exit();
                            }
                    
                        case 'Participant':
                            if (Session::getSession('status') === 'Active') {
                                header("location:/platform");
                                exit();
                            } else {
                                Session::setSession('error', 'Votre compte a été désactivé');
                                header("Location:/auth/login");
                                exit();
                            }
                    
                        default:
                        Session::setSession('error', 'Rôle ou statut invalide.');
                            header("Location:/auth/login");
                            exit();
                    }
                    
                } else {
                 Session::setSession('error', 'Mot de pass incorrect');
                header("Location:/auth/login");
                }
            } else {
                Session::setSession('error', 'Aucun utilisateur trouvé avec cet email');
                header("Location:/auth/login");
            }
        }else{
            Session::setSession('error', 'Veuiller remplir tous les champs');
            header("Location:/auth/login");
         }
    }

    
}