<?php

namespace mvcobjet\Models\Services;

use mvcobjet\Models\Daos\MovieDao;
use mvcobjet\Models\Daos\ActorDao;
use mvcobjet\Models\Daos\GenreDao;
use mvcobjet\Models\Daos\RealisateurDao;

class MovieService {

    private $movieDao;
    private $actorDao;
    private $genreDao;
    private $realisateurDao;
    
    public function __construct() {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->genreDao = new GenreDao();
        $this->realisateurDao = new RealisateurDao();
    }

    public function getOneMovie($id) {     
        // fabrication de l'objet movie. 
        $movie = $this->movieDao->findById($id);  // recherche dans movieDao ( $id = id du movie )
       
        $actors = $this->actorDao->findByMovie($id); // recherche des acteurs pour 1 film 
        foreach ($actors as $actor) {
            // fonction dans la classe Movie sans Entities
            $movie->addActor($actor);  // fonction ajoute 1 acteur à l'objet movie (voire classe/entité Movie)
        }

        $genre = $this->genreDao->findByMovie($id); // recherche du genre . creatin de l'objet genre
        $movie->setGenre($genre);
        $realisateur = $this->realisateurDao->findByMovie($id);
        $movie->setRealisateur($realisateur);
        return $movie;
    }
}

?>