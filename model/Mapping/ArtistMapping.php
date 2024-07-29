<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\MyPDO;
use Exception;

use model\Trait\TraitTestString;
use model\Trait\TraitTestInt;
use model\Trait\TraitLaundryRoom;

class ArtistMapping extends AbstractMapping{

    use TraitTestString, TraitTestInt, TraitLaundryRoom;
    protected ?int $art_id = null;
    protected ?string $art_name = null;

    public function getArtId(): ?int
    {
        return $this->art_id;
    }

    public function setArtId(?int $art_id): void
    {
        if(!$this->verifyInt($art_id)) throw new Exception("ID must be an integer");
        $this->art_id = $art_id;
    }

    public function getArtName(): ?string
    {
        return $this->art_name;
    }

    public function setArtName(?string $art_name): void
    {
        if(!$this->verifyString($art_name)) throw new Exception("Name must be a string");
        $art_name = $this->standardClean($art_name);
        $this->art_name = $art_name;
    }

}