<?php

namespace model\Manager;
use model\Mapping\SongMapping;
use model\MyPDO;

use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;

class SongManager
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
        $query = $this->db->query("SELECT * FROM tab_song");
        if ($query->rowCount() === 0) return null;
        $artMapper = $query->fetchAll();
        $query->closeCursor();
        $artObject = [];
        foreach ($artMapper as $art) {
            $artObject[] = new SongMapping($art);
        }
        return $artObject;
    }
    public function selectOneById ($name) : bool
    {
        // to be implemented
    }
}