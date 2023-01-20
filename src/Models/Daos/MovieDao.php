<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Movie;

class MovieDao extends BaseDao {

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM movie WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();
     
        $movie = new Movie();
       
        $movie->setId($res['id'])
                ->setTitle($res['title'])
                ->setDescription($res['description'])
                ->setDuration($res['duration'])
                ->setDate($res['date'])
                ->setCoverImage($res['coverImage']);
        return ($movie);
    }
}

?>














