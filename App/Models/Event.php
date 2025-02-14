<?php
namespace App\Models;

class Event
{
    private $id;
    private $titre;
    private $description;
    private $event_date;
    private $heure_debut;
    private $heure_fin;
    private $prix;
    private $image;
    private $content_url;
    private $category_id;
    private $status;

    public function __construct($titre, $description, $event_date, $heure_debut, $heure_fin, $prix, $image, $content_url, $category_id,$status, $id = null)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->event_date = $event_date;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
        $this->prix = $prix;
        $this->image = $image;
        $this->content_url = $content_url;
        $this->category_id = $category_id;
        $this->status = $status;
    }

    // Getters et setters
    public function getId()
    {
        return $this->id;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getEventDate()
    {
        return $this->event_date;
    }
    public function setEventDate($event_date)
    {
        $this->event_date = $event_date;
    }
    public function getHeureDebut()
    {
        return $this->heure_debut;
    }
    public function setHeureDebut($heure_debut)
    {
        $this->heure_debut = $heure_debut;
    }
    public function getHeureFin()
    {
        return $this->heure_fin;
    }
    public function setHeureFin($heure_fin)
    {
        $this->heure_fin = $heure_fin;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getContentUrl()
    {
        return $this->content_url;
    }
    public function setContentUrl($content_url)
    {
        $this->content_url = $content_url;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
         $this->status=$status;
    }
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
}
