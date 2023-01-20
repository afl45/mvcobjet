<?php

namespace mvcobjet\Controllers;

use mvcobjet\Models\Services\MovieService;

class MovieController

{
    private $movieService;
    private $twig;

    public function __construct($twig)  { 
        $this->twig = $twig;
        $this->movieService = new MovieService();
    }

    public function getOneMovie($m) {
        $liste = $this->movieService->getOneMovie($m);
        //return ($liste);
      
        echo $this->twig->render('movie.html.twig', ["movie" => $liste]);
    }
}

?>