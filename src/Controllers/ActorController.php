<?php

namespace mvcobjet\Controllers;

use mvcobjet\Models\Services\ActorService;

class ActorController

{
    private $actorService;
    private $twig;

    public function __construct($twig)  { 
        $this->twig = $twig;
        $this->actorService = new ActorService();
    }

    public function listeActeurs() {
        $liste = $this->actorService->listeActeurs();
        //return ($liste);
        echo $this->twig->render('actors.html.twig', ["acteurs" => $liste]);
    }

    public function getOneActor($a) {
        $liste = $this->actorService->getOneActor($a);
        //return ($liste);
        echo $this->twig->render('actor.html.twig', ["acteur" => $liste]);
    }
}

?>