<?php

namespace mvcobjet\Controllers;

use mvcobjet\Models\Services\GenreService;

class GenreController

{
    private $genreService;
    private $twig;

    public function __construct($twig)  { 
        $this->twig = $twig;
        $this->genreService = new GenreService();
    }

    public function listeGenres() {
        $liste = $this->genreService->listeGenres();
        //return ($liste);
        echo $this->twig->render('genres.html.twig', ["genres" => $liste]);
    }

    public function getOneGenre($a) {
        $liste = $this->genreService->getOneGenre($a);
        //return ($liste);
        echo $this->twig->render('genre.html.twig', ["genre" => $liste]);
    }
}

?>