<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;
use model\Trait\TraitLaundryRoom;
use Exception;
class TabMapping extends AbstractMapping
{
use TraitTestInt, TraitTestString, TraitLaundryRoom;

protected ?int $tab_id;
protected ?string $tab_slug;
protected ?string $tab_tab;

    public function getTabId(): ?int
    {
        return $this->tab_id;
    }

    public function setTabId(?int $tab_id): void
    {
        if(!$this->verifyInt($tab_id)) throw new Exception("Tab id must be an integer");
        $this->tab_id = $tab_id;
    }

    public function getTabSlug(): ?string
    {
        return $this->tab_slug;
    }

    public function setTabSlug(?string $tab_slug): void
    {
        if(!$this->verifyString($tab_slug)) throw new Exception("Tab slug must be a string");
        $tab_slug = $this->simpleTrim($tab_slug);
        $this->tab_slug = $tab_slug;
    }

    public function getTabTab(): ?string
    {
        return $this->tab_tab;
    }

    public function setTabTab(?string $tab_tab): void
    {
        if(!$this->verifyString($tab_tab)) throw new Exception("Tab tab tab must be a string");
        $tab_tab = $this->simpleTrim($tab_tab);
        $this->tab_tab = $tab_tab;
    }




} // end class