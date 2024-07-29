<?php

namespace model\Manager;


use model\Mapping\TabMapping;
use model\MyPDO;

use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;

class TabManager
{
use TraitLaundryRoom;

private MyPDO $db;

public function __construct(MyPDO $db){
    $this->db = $db;
}

public function selectTabBySlug($slug) : ?array {
    $slug = $this->standardClean($slug);
    $stmt = $this->db->prepare("SELECT * FROM tab_tab WHERE tab_slug = :slug");
    $stmt->execute(["slug" => $slug]);
    if ($stmt->rowCount() === 0) return null;
    $tab = $stmt->fetch();
    $stmt->closeCursor();
    $tabMap = [];
    $tabMap[] = new TabMapping($tab);
    return $tabMap;
}

} // end class