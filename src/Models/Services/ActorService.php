<?php

namespace mvcobjet\Models\Services;

use mvcobjet\Models\Daos\ActorDao;

class ActorService {

    private $actorDao;

    public function __construct() {
        $this->actorDao = new ActorDao();
    }

    public function listeActeurs() {
        $liste = $this->actorDao->findAll();
        return ($liste);
    }

    public function getOneActor($a) {
        $actor = $this->actorDao->findOne($a);
        return ($actor);
    }
}

?>