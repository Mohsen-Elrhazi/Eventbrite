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
        
        public function OptionCategories()
        {
            $categories = $this->categoryRepository->display();
             foreach ($categories as $category){
                echo CategoryService::rendreOption($category);
             } 
        }


        public function deleteCategory(): void
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $id = $_POST['id'];
                if ($this->categoryRepository->delete($id)) {
                    echo json_encode(['status' => 'success']); 
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error deleting category']);
                }
                exit;
            } 
        }
        



        public function updateCategory(): void
        {
            $id = htmlspecialchars($_POST['categoryId']);
            $nom = htmlspecialchars($_POST['nom']);
            $description = htmlspecialchars($_POST['description']);
        
            if (Validation::validateFields([$nom, $description])) {
                $category = new Category($nom, $description, $id);
        
                if ($this->categoryRepository->edit($category)) {
                    echo json_encode(['status' => 'success', 'message' => 'La catégorie a été modifiée avec succès!']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Une erreur est survenue lors de la modification.']);
                }
                exit;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir tous les champs.']);
                exit;
            }
        }
        


}