<?php

namespace mvcobjet\Models\Entities;

class Genre
{
    private $id;
    private $genre;
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getGenre()
    {
        return $this->genre;
    }
    
    public function setGenre(string $genre)
    {
        $this->genre = $genre;
        return $this;
    }
}


?>