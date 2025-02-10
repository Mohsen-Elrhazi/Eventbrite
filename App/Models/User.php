<?php
namespace App\Models;

class User{
    private  $user_id;
    private  $nom;
    private  $prenom;
    private  $image;
    private  $email;
    private  $password;
    private  $role;
    private  $status;

    public function __construct($nom, $prenom, $image, $email ,$password ,$role ,$status , $user_id= null){
        $this->nom= $nom;
        $this->prenom= $prenom;
        $this->image= $image;
        $this->email= $email;
        $this->password= $password;
        $this->role= $role;
        $this->status= $status;
        $this->user_id= $user_id;
        }

    public function getID(){
        return $this->user_id;
    }

    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getImage(){
        return $this->image;
    }
    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getStatus(){
        return $this->status;
    }

}