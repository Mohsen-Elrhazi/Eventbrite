<?php

namespace App\Controllers;

use App\Models\Tags;
use App\Repositories\TagsRepository;
use App\Services\TagService;
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
           foreach ($tags as $tag){
            echo TagService::renderRow($tag); 
           }   
        }

        public function checkboxTags()
        {
            $tags = $this->tagsRepository->display();
           foreach ($tags as $tag){
            echo TagService::rendreCheckbox($tag); 
           }   
        }
 


    public function deleteTag($id){
        $this->tagsRepository->delete($id);
        Session::setSession('success', 'Vous êtes delete tag avec succès!');
       
        header("Location:/admin/tags");
            exit;
    }
    public function updateTag(){
        $id=htmlspecialchars($_POST['tagId']);
        $nom=htmlspecialchars($_POST['nom']);
        if (Validation::validateFields([$nom])) {
            $tags = new Tags($nom, $id); 
    
            if ($this->tagsRepository->edit($tags)) {
                Session::setSession('success', 'Vous êtes Modifier categore avec succès!');
            } else {
                Session::setSession('error', 'error');
            }
            header("Location:/admin/tags");
            exit;
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs.');
            header("Location:/admin/tags");
            exit;
        }
    }
  

}