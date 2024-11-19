<?php

namespace App\Factory;

use App\Entity\User;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Foundry;
use App\Enum\Status;

class UserFactory extends ModelFactory
{
protected function getDefaults(): array
{
return [
'first_name' => self::faker()->firstName(),
'last_name' => self::faker()->lastName(),
'email' => self::faker()->email(),
'password' => self::faker()->password(),
'roles' => ['ROLE_USER'],
'status' => Status::DRAFT, // Example of setting enum
];
}

protected static function getClass(): string
{
return User::class;
}
}