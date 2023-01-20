<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Actor;

class ActorDao extends BaseDao
{
   
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM actor ");
        $res = $stmt->execute();
        if ($res) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $actors[] = $this->createObjectFromFields($row);
            }
            return $actors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields) {
       
        $acteur = new Actor();

        $acteur->setId($fields['id'])
              ->setFirstName($fields['first_name']) 
              ->setLastName($fields['last_name'])
              ->setNickname($fields['nickname']);      

        return $acteur;
    }

    public function findOne($id) {
        $stmt = $this->db->prepare("SELECT * FROM actor WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        $acteur = new Actor();
        $acteur->setId($res['id'])
                ->setFirstName($res['first_name'])
                ->setLastName($res['last_name'])
                ->setNickname($fields['nickname']); 
        return ($acteur);
    }

    public function findByMovie($id) {
        $acteurs = [];
        $stmt = $this->db->prepare("SELECT actor.* FROM actor,actor_movie WHERE actor_movie.id = actor.id  AND actor_movie.id_movie = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetchAll();
        foreach($res as $acteur){
                $acteurs[] = $this->createObjectFromFields($acteur);
        }
        return ($acteurs);
    }
}

?>
