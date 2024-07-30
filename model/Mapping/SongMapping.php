<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitLaundryRoom;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;
use Exception;
class SongMapping extends AbstractMapping
{
use TraitLaundryRoom, TraitTestInt, TraitTestString;

protected ?int $song_id = null;
protected ?int $artist_id = null;
protected ?string $song_name = null;
protected ?string $song_slug = null;
    protected ?string $art_name;
    protected ?int $art_id = null;

    public function getArtId(): ?int
    {
        return $this->art_id;
    }

    public function setArtId(?int $art_id): void
    {
        $this->art_id = $art_id;
    }



    public function getArtName(): ?string {
        return $this->art_name;
    }
    public function setArtName(?string $art_name): void
    {
        $this->art_name = $art_name;
    }
    public function getSongId(): ?int
    {
        return $this->song_id;
    }

    public function setSongId(?int $song_id): void
    {
        if(!$this->verifyInt($song_id)) throw new Exception("Song id must be an integer");
        $this->song_id = $song_id;
    }

    public function getArtistId(): ?int
    {
        return $this->artist_id;
    }

    public function setArtistId(?int $artist_id): void
    {
        if(!$this->verifyInt($artist_id)) throw new Exception("Artist id must be an integer");
        $this->artist_id = $artist_id;
    }

    public function getSongName(): ?string
    {
        return $this->song_name;
    }

    public function setSongName(?string $song_name): void
    {
        if(!$this->verifyString($song_name)) throw new Exception("Song name cannot be empty");
        $this->song_name = $song_name;
    }

    public function getSongSlug(): ?string
    {
        return $this->song_slug;
    }

    public function setSongSlug(?string $song_slug): void
    {
        if(!$this->verifyString($song_slug)) throw new Exception("Song slug cannot be empty");
        $this->song_slug = $song_slug;
    }

} // end class
