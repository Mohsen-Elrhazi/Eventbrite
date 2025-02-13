<?php
namespace App\Models;

class Event{
    private $event_id;
    private $titre;
    private $image;
    private $description;
    private $event_date;
    private $cotent_url;
    private $category_id;

    public function __construct($event_id ,$titre, $description ,$event_date ,$image ,$cotent_url ,$category_id){
        $this->event_id = $event_id;
        $this->titre = $titre;
        $this->description = $description;
        $this->event_date = $event_date;
        $this->image = $image;
        $this->cotent_url = $cotent_url;
        $this->category_id = $category_id;
    } 

    public function getEventID(){
        return $this->event_id;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getEventDATE(){
        return $this->event_date;
    }
    public function getImage(){
        return $this->image;
    }
    public function getContentURL(){
        return $this->cotent_url;
    }
    public function getCategoryID(){
        return $this->category_id;
    }
    public function setEventID(){
        return $this->event_id;
    }
    public function setTitre(){
        return $this->titre;
    }
    public function setDescription(){
        return $this->description;
    }
    public function setEventDATE(){
        return $this->event_date;
    }
    public function setImage(){
        return $this->image;
    }
    public function setContentURL(){
        return $this->cotent_url;
    }
    public function setCategoryID(){
        return $this->category_id;
    }
}