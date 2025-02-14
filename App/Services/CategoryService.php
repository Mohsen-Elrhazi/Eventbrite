<?php
namespace App\Services;
use App\Models\Category;
class CategoryService{
    public static function renderRow(Category $category){
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


    public static function rendreOption(Category $category) {
        return "<option value='{$category->getCategoryId()}'>{$category->getNom()}</option>";
    }
}