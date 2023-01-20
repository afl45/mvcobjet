<?php

namespace mvcobjet\Models\Services;

use mvcobjet\Models\Daos\RealisateurDao;

class RealisateurService {

    private $realisateurDao;

    public function __construct() {
        $this->realisateurDao = new RealisateurDao();
    }

    public function listeRealisateurs() {
        $liste = $this->realisateurDao->findAll();
        return ($liste);
    }

    public function getOneRealisateur($r) {
        $realisateur = $this->realisateurDao->findOne($r);
        return ($realisateur);
    }
}

?>