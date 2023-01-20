<?php

namespace mvcobjet\Models\Entities;

class Movie {
    private $id;
    private $title;
    private $description;
    private $duration;
    private $date;
    private $coverImage;
    private $genre;
    private $realisateur;
    private $actors;


    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getCoverImage() {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage)
    {
        $this->coverImage = $coverImage;
        return $this;
    }

    public function getGenre()
    {
        return $this->genre;
    }


    public function setGenre(Genre $genre)
    {
        $this->genre = $genre;
        return $this;
    }

    public function getRealisateur()
    {
        return $this->realisateur;
    }

    public function getActors() {
        return $this->actors ;
    }

    public function setRealisateur(Realisateur $realisateur)
    {
        $this->realisateur = $realisateur;
        return $this;
    }

    public function addActor(Actor $actor): void
    {
        //  if (is_array($this->actors)){
        //      foreach ($this->actors as $a) {
        //          if ($a->getId() == $actor->getId()) {
        //              return;
        //          }
        //      } 
        //  }
        $this->actors[] = $actor;
    }
}

?>