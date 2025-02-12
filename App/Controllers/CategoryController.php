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
            return $categories;
        }

        public function renderRow($category){
            return "<tr>
                <td>". $category->getCategoryId()."</td>
                <td>". $category->getNom()."</td>
                <td>". $category->getDescription()."</td>
                <td>
                    <button  type='button' class='btn btn-warning btn-sm me-2' 
                    data-bs-toggle='modal' data-bs-target='#update-categorie' 
                    data-category-id='".$category->getCategoryId()."' 
                    data-category-name='".$category->getNom()."'
                    data-category-description='".$category->getDescription()."'>
                        <i class='fa fa-edit'></i> Modifier
                    </button>
                    <form action='/category/deleteCategory/".$category->getCategoryId()."' method='POST' class='d-inline'>
                        <button type='submit' class='btn btn-danger btn-sm me-2'>
                            <i class='fa fa-trash'></i> Supprimer
                        </button>
                    </form>
                </td>
            </tr>";
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
