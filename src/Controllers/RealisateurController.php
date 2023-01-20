<?php

namespace mvcobjet\Controllers;

use mvcobjet\Models\Services\RealisateurService;

class RealisateurController

{
    private $realisateurService;
    private $twig;

    public function __construct($twig)  { 
        $this->twig = $twig;
        $this->realisateurService = new RealisateurService();
    }

    public function listeRealisateurs() {
        $liste = $this->realisateurService->listeRealisateurs();
        //return ($liste);
        echo $this->twig->render('realisateurs.html.twig', ["realisateurs" => $liste]);
    }

    public function getOneRealisateur($r) {
        $liste = $this->realisateurService->getOneRealisateur($r);
        //return ($liste);
        echo $this->twig->render('realisateur.html.twig', ["realisateur" => $liste]);
    }
}

?>