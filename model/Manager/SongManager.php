<?php

namespace model\Manager;
use model\Mapping\ArtistMapping;
use model\Mapping\SongMapping;
use model\MyPDO;

use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;
use model\Trait\TraitSlugify;

class SongManager
{
    use TraitLaundryRoom, TraitSlugify;
    private MyPDO $db;
    public function __construct(MyPDO $db) {
        $this->db = $db;
    }
    public function insert ($name, $id) : bool
    {
        $name = $this->standardClean($name);
        $slug = $this->slugify($name);
        $id = $this->intClean($id);

        $stmt = $this->db->prepare("INSERT INTO tab_song (song_name, song_slug, artist_id) VALUES (:name, :slug, :id)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() === 0) return false;
        return true;
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
        $songMapper = $query->fetchAll();
        $query->closeCursor();
        $songObject = [];
        foreach ($songMapper as $art) {
            $songObject[] = new SongMapping($art);
        }
        return $songObject;
    }
    public function selectAllByArtistId ($id) : ?array
    {
        $stmt = $this->db->prepare("
                                    SELECT s.*, a.art_name, a.art_id 
                                    FROM tab_song s 
                                    JOIN tab_artist a 
                                    ON s.artist_id = a.art_id
                                    WHERE s.artist_id = ?
                                    ");
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) return null;
        $songMapper = $stmt->fetchAll();
        $stmt->closeCursor();
        $songObject = [];

        foreach ($songMapper as $art) {
            $songObject[] = new SongMapping($art);
        }

        return $songObject;
    }
}