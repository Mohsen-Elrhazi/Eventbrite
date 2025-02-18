<?php
namespace App\Models;


class Category{
    private  $category_id;
    private  $nom;
    private  $description;
   
    public function __construct($nom, $description, $category_id= null){
        $this->nom= $nom;
        $this->description=$description;
        $this->category_id=$category_id;
        
        }

    public function getCategoryId(){
        return $this->category_id;
    }

    public function getNom(){
        return $this->nom;
    }
    
    public function getDescription(){
        return $this->description;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    
    public function setDescription($description){
        $this->description=$description;
    } 
}