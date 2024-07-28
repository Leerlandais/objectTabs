<?php

// so very easy using PHPStorm
namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestInt;
use model\Trait\TraitTestString;
use model\Trait\TraitDateTime;
use model\Trait\TraitLaundryRoom;
use DateTime;
use Exception;

class UserMapping extends AbstractMapping {

use TraitTestString, TraitTestInt;

protected ?int $object_user_id;
protected ?string $object_user_login;
protected ?string $object_user_pass;

    public function getObjectUserId(): ?int
    {
        return $this->object_user_id;
    }

    public function setObjectUserId(?int $object_user_id): void
    {
        if(!$this->verifyInt($object_user_id)) throw new Exception("User id must be a positive integer");
        $object_user_id = $this->intClean($object_user_id);
        $this->object_user_id = $object_user_id;
    }

    public function getObjectUserLogin(): ?string
    {

        return $this->object_user_login;
    }

    public function setObjectUserLogin(?string $object_user_login): void
    {

        if(!$this->verifyString($object_user_login)) throw new Exception("Login cannot be empty");
        $object_user_login = $this->standardClean($object_user_login);
        $this->object_user_login = $object_user_login;
    }

    public function getObjectUserPass(): ?string
    {
        return $this->object_user_pass;
    }

    public function setObjectUserPass(?string $object_user_pass): void
    {
        if(!$this->verifyString($object_user_pass)) throw new Exception("Password cannot be empty");
        $this->object_user_pass = $object_user_pass;
    }






} // end class