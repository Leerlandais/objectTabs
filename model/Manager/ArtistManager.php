<?php

namespace model\Manager;

use model\Mapping\ArtistMapping;
use model\MyPDO;

use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;

class ArtistManager
{
use TraitLaundryRoom;
    private MyPDO $db;
    public function __construct(MyPDO $db) {
        $this->db = $db;
    }
    public function insert ($name) : bool
    {
        // to be implemented
    }
    public function update ($name) : bool
    {
        // to be implemented
    }
    public function delete ($name) : bool
    {
        // to be implemented
    }
    public function selectAll () : ?array
    {
        $query = $this->db->query("SELECT * FROM tab_artist");
        if ($query->rowCount() === 0) return null;
        $artMapper = $query->fetchAll();
        $query->closeCursor();
        $artObject = [];
        foreach ($artMapper as $art) {
            $artObject[] = new ArtistMapping($art);
        }
        return $artObject;
    }
    public function selectOneById ($name) : bool
    {
        // to be implemented
    }
} // end class