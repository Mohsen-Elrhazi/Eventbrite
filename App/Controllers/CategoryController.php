<?php

namespace App\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Validation;
use App\Core\Session;
use App\Services\CategoryService;

class CategoryController
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository= new CategoryRepository();
    }
    public function delet(){
        echo "delete";
    }

    public function addCategory(): void
    {
        $nom = htmlspecialchars($_POST["nom"]);
        $description = htmlspecialchars($_POST["description"]);
       
        if (Validation::validateFields([$nom, $description])) {

                $category = new category($nom, $description);

                $this->categoryRepository->save( $category);

                Session::setSession('success', 'Vous êtes ajoute categore avec succès!');
                header("Location:/admin/categories");
              
                exit;
               
            
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs.');
            header("Location:/admin/categories");
            exit;
        }
    }
    
    public function listeCategories()
        {
            $categories = $this->categoryRepository->display();
             foreach ($categories as $category){
                echo CategoryService::renderRow($category);
             } 
        }


    public function deleteCategory($id){
        $this->categoryRepository->delete($id);
        Session::setSession('success', 'Vous êtes asupprime categore avec succès!');
                header("Location:/admin/categories");
                exit;
    }
    public function updateCategory(): void
    {
        $id = htmlspecialchars($_POST['categoryId']); 
        $nom = htmlspecialchars($_POST['nom']); 
        $description = htmlspecialchars($_POST['description']); 
    
        if (Validation::validateFields([$nom, $description])) {
            $category = new Category($nom, $description, $id); 
    
            if ($this->categoryRepository->edit($category)) {
                Session::setSession('success', 'Vous êtes Modifier categore avec succès!');
            } else {
                Session::setSession('error', 'error');
            }
            header("Location:/admin/categories");
            exit;
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs.');
            header("Location:/admin/categories");
            exit;
        }
    }
}
