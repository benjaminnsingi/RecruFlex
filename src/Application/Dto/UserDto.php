<?php

class UserDto
{
   public int $id;
   public string $lastname;
   public string $firstname;
   public string $email;
   public array $roles;

   public function __construct(int $id, string $lastname, string $firstname, string $email, array $roles)
   {
       $this->id = $id;
       $this->lastname = $lastname;
       $this->firstname = $firstname;
       $this->email = $email;
       $this->roles = $roles;
   }
}
