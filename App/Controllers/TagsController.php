<?php

namespace App\Controllers;

use App\Models\Tags;
use App\Repositories\TagsRepository;
use App\Services\Validation;
use App\Core\Session;

class TagsController
{
    private $tagsRepository;
    public function __construct()
    {
        $this->tagsRepository= new tagsRepository();
    }
    public function delet(){
        echo "delete";
    }

    public function addTag(): void
    {
        $nom = htmlspecialchars($_POST["nom"]);
        if (Validation::validateFields([$nom])) {

                $tags = new Tags($nom);

                $this->tagsRepository->save( $tags);

                Session::setSession('success', 'Vous êtes ajoute tag avec succès!');
                echo "addtag";
                header("Location:/admin/tags");
              
                exit;
               
            
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs.');
            header("Location:/admin/tags");
            exit;
        }
    }
    
    public function listeTags()
        {
            $tags = $this->tagsRepository->display();
            return $tags;
        }

        public function renderRow($tag){
            return "<tr>
            <td>". $tag->getTagId()."</td>
            <td>". $tag->getNom()."</td>
            <td>
                <a href='/category/updatTag/".$tag->getTagId()."' class='btn btn-warning btn-sm me-2'>
                    <i class='fa fa-edit'></i> Modifier
                </a>
                <a href='/category/deleteTag/".$tag->getTagId()."' class='btn btn-danger btn-sm me-2'>
                    <i class='fa fa-edit'></i> Supprimer
                </a>
            </td>
        </tr>";
        }
    public function deleteTag($id){
        $this->tagsRepository->delete($id);
        Session::setSession('success', 'Vous êtes delete tag avec succès!');
       
        echo "deleteTag";
    }
    public function updatTag(){
        echo "updatCategory";
    }
  

}