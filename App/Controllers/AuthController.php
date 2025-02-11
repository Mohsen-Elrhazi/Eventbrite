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


    public function authView()
    {
        require_once dirname(__DIR__, 1) . '\Views\Auth\auth.php';
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
                header("Location:/auth/auth");
                exit;
                
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $user = new User($nom, $prenom, $image, $email, $hashedPassword, $role, 'Inactive');

                $this->userRepository->save($user);

                header("Location:/auth/auth");
                Session::setSession('success', 'Vous êtes inscrit avec succès!');
                exit;
            }
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs correctement.');
            // header("Location:/auth/auth");
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

                //     switch (Session::getSession('role')) {
                //         case 'Admin':
                //             header("location:/admin/admin");
                //             exit();
                    
                //         case 'Organisateur':
                //             if (Session::getSession('status') === 'Active') {
                //                 header("location:/organisateur/organisateur");
                //                 exit();
                //             } else {
                //                 Session::setSession('error', 'Votre compte a été désactivé');
                //                 header("Location:/auth/auth");
                //                 exit();
                //             }
                    
                //         case 'Participant':
                //             if (Session::getSession('status') === 'Active') {
                //                 header("location:/platform");
                //                 exit();
                //             } else {
                //                 Session::setSession('error', 'Votre compte a été désactivé');
                //                 header("Location:/auth/auth");
                //                 exit();
                //             }
                    
                //         default:
                //         Session::setSession('error', 'Rôle ou statut invalide.');
                //             header("Location:/auth/auth");
                //             exit();
                //     }

                } else {
                 Session::setSession('error', 'Mot de pass incorrect');
                // echo Session::getSession('error');
                //     header("Location:/login");
                }
            } else {
                Session::setSession('error', 'Aucun utilisateur trouvé avec cet email');
        //    echo  Session::getSession('error');

                // header("Location:/login");
            }
        }else{
            Session::setSession('error', 'Veuiller remplir tous les champs');
        //    echo  Session::getSession('error');

            header("Location:/auth/auth");
         }
    }
}