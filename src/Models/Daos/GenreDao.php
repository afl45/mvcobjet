<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Genre;

class GenreDao extends BaseDao
{
   
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM genre ");
        $res = $stmt->execute();
        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $genres[] = $this->createObjectFromFields($row);
            }
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields) {
       
        $genre = new Genre();

        $genre->setId($fields['id'])
              ->setGenre($fields['genre']);     
        return $genre;
    }

    public function findOne($id) {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        $genre = new Genre();
        $genre->setId($res['id'])
                ->setGenre($res['genre']);
        return ($genre);
    }

    public function findByMovie($id) {
      
        $stmt = $this->db->prepare("SELECT genre.* FROM genre,movie WHERE movie.id_genre = genre.id AND movie.id= ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
       
        $genre = $this->createObjectFromFields($res);
        
        return ($genre);
    }
}

?>