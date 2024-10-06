<?php
namespace App\Application\Dto;

class UserDto
{
   public string $lastname;
   public string $firstname;
   public string $email;
   public array $roles;
   public string $password;

   public function __construct(string $lastname, string $firstname, string $email, array $roles, string $password)
   {
       $this->lastname = $lastname;
       $this->firstname = $firstname;
       $this->email = $email;
       $this->roles = $roles;
       $this->password = $password;
   }
}
