<?php

namespace mvcobjet\Models\Services;

use mvcobjet\Models\Daos\GenreDao;

class GenreService {

    private $genreDao;

    public function __construct() {
        $this->genreDao = new GenreDao();
    }

    public function listeGenres() {
        $liste = $this->genreDao->findAll();
        return ($liste);
    }

    public function getOneGenre($g) {
        $genre = $this->genreDao->findOne($g);
        return ($genre);
    }
}

?>