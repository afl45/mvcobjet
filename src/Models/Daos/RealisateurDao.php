<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Realisateur;

class RealisateurDao extends BaseDao
{
   
    public function findAll(){
        $stmt = $this->db->prepare("SELECT * FROM realisateur ");
        $res = $stmt->execute();
        if ($res) {
            $realisateurs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $realisateurs[] = $this->createObjectFromFields($row);
            }
            return $realisateurs;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields)
    {
        $realisateur = new Realisateur();

        $realisateur->setId($fields['id'])
              ->setFirstName($fields['first_name']) 
              ->setLastName($fields['last_name']);         

        return $realisateur;
    }

    public function findOne($id) {
        $stmt = $this->db->prepare("SELECT * FROM realisateur WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        $realisateur = new Realisateur();
        $realisateur->setId($res['id'])
                ->setFirstName($res['first_name'])
                ->setLastName($res['last_name']);
        return ($realisateur);
    }

    public function findByMovie($id) {
      
        $stmt = $this->db->prepare("SELECT realisateur.* FROM realisateur, movie WHERE movie.id_realisateur = realisateur.id AND movie.id= ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
       
        $realisateur = $this->createObjectFromFields($res);
        
        return ($realisateur);
    }
}

?>
