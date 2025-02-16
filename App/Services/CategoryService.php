<?php
namespace App\Services;
use App\Models\Category;
class CategoryService{
    public static function renderRow(Category $category){
       return "<tr id='category-row-" . $category->getCategoryId() . "'>
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
              <button class='btn btn-danger' onclick='deleteCategory(".$category->getCategoryId().")'>Supprimer</button>
            </td>
        </tr>";
    }


    public static function rendreOption(Category $category) {
        return "<option value='{$category->getCategoryId()}'>{$category->getNom()}</option>";
    }
}