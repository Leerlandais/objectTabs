<?php

namespace model\Manager;


use model\Mapping\TabMapping;
use model\MyPDO;


use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;
use model\Trait\TraitSlugify;

class TabManager
{
use TraitLaundryRoom, TraitSlugify;

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

public function addNewTab($name, $tab) : bool
{
$name = $this->standardClean($name);
$slug = $this->slugify($name);
$tab = $this->simpleTrim($tab);

$stmt = $this->db->prepare("INSERT INTO tab_tab (tab_slug, tab_tab) VALUES (:slug, :tab)");
$stmt->execute(["slug" => $slug, "tab" => $tab]);
if ($stmt->rowCount() === 0) return false;
$stmt->closeCursor();
return true;
}

} // end class