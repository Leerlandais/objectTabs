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

use TraitTestString, TraitTestInt, TraitDateTime, TraitLaundryRoom;

protected ?int $object_user_id;
protected ?string $object_user_login;
protected ?string $object_user_pass;
protected ?string $object_user_name;
protected ?string $object_user_email;
protected ?int $object_user_permission;
    protected null|string|DateTime $object_user_created;

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

    public function getObjectUserName(): ?string
    {
        return $this->object_user_name;
    }

    public function setObjectUserName(?string $object_user_name): void
    {
        if(intval($this->verifyInt($object_user_name))) throw new Exception("Username cannot be a number");
        if(!$this->verifyString($object_user_name)) throw new Exception("Username cannot be empty");
        $object_user_name = $this->standardClean($object_user_name);
        $this->object_user_name = $object_user_name;
    }

    public function getObjectUserEmail(): ?string
    {
        return $this->object_user_email;
    }

    public function setObjectUserEmail(?string $object_user_email): void
    {
        if(!$this->verifyString($object_user_email)) throw new Exception("Email cannot be empty");
        $object_user_email = $this->emailClean($object_user_email);
        $this->object_user_email = $object_user_email;
    }

    public function getObjectUserPermission(): ?int
    {
        return $this->object_user_permission;
    }

    public function setObjectUserPermission(?int $object_user_permission): void
    {
        if(!$this->verifyInt($object_user_permission)) throw new Exception("User permission must be a positive integer");
        $object_user_permission = $this->intClean($object_user_permission);
        $this->object_user_permission = $object_user_permission;
    }

    public function getObjectUserCreated(): DateTime|string|null
    {
        return $this->object_user_created;
    }

    public function setObjectUserCreated(DateTime|string|null $object_user_created): void
    {
        if ($object_user_created === null) {
            $object_user_created = new DateTime();
        }
        if(!$this->verifyString($object_user_created)) throw new Exception("Date cannot be empty");
        $this->formatDateTime($object_user_created, 'object_user_created');
        $this->object_user_created = $object_user_created;
    }



} // end class