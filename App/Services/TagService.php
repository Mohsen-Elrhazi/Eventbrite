<?php
namespace App\Services;
use App\Models\Tags;
class TagService{
    public static function renderRow(Tags $tag){
        return "<tr>
        <td>". $tag->getTagId()."</td>
        <td>". $tag->getNom()."</td>
       <td>
                <button  type='button' class='btn btn-warning btn-sm me-2' 
                data-bs-toggle='modal' data-bs-target='#update-tag' 
                data-tag-id='".$tag->getTagId()."' 
                data-tag-name='".$tag->getNom()."'>
                
                    <i class='fa fa-edit'></i> Modifier
                </button>
                <form action='/tags/deleteTag/".$tag->getTagId()."' method='POST' class='d-inline'>
                    <button type='submit' class='btn btn-danger btn-sm me-2'>
                        <i class='fa fa-trash'></i> Supprimer
                    </button>
                </form>
            </td>
    </tr>";
    }
}