<?php

namespace model\Interface;

use model\Abstract\AbstractMapping;

interface InterfaceUserManager
{
    public function register(string $login, string $email, string $password, string $username);

    public function login(string $login, string $password);

    public function hashPassword(string $password): string;

    public function verifyPassword(string $password, string $hash): bool;

    public function generateUniqueKey(): string;

    public function updateKey(string $login, string $key);

    public function verifyMailByKey(string $key,string $mail);

    public function logout();

}
