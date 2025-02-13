<?php

namespace App\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\Validation;
use App\Core\Session;

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
                echo "addCategory";
                // header("Location:/admin/categories");
              
                // exit;
               
            
        } else {
            Session::setSession('error', 'Veuillez remplir tous les champs.');
            header("Location:/admin/categories");
            exit;
        }
    }
    
    public function listeCategories()
        {
            $categories = $this->categoryRepository->display();
            return $categories;
        }

        public function renderRow($category){
            return "<tr>
            <td>". $category->getCategoryId()."</td>
            <td>". $category->getNom()."</td>
            <td>". $category->getDescription()."</td>
            <td>
                <a href='/category/updatCategory/".$category->getCategoryId()."' class='btn btn-warning btn-sm me-2'>
                    <i class='fa fa-edit'></i> Modifier
                </a>
                <a href='/category/deleteCategory/".$category->getCategoryId()."' class='btn btn-danger btn-sm me-2'>
                    <i class='fa fa-edit'></i> Supprimer
                </a>
            </td>
        </tr>";
        }
    public function deleteCategory($id){
        $this->categoryRepository->delete($id);
        Session::setSession('success', 'Vous êtes delete categore avec succès!');
       
        echo "deleteCategory";
    }
    public function updatCategory(){
        echo "updatCategory";
    }
  

}