<?php
namespace App\Models;
class Tags{
    private  $tag_id;
    private  $nom;
    public function __construct($nom, $tag_id= null){
        $this->nom= $nom;
        }
    public function getTagId(){
        return $this->tag_id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
}