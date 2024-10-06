<?php

namespace App\Application\UseCase;

use App\Application\Dto\UserDto;
use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;

final class UserService
{
   public function __construct(
      private readonly UserRepositoryInterface $userRepository,
   ){
   }

   public function createUser(UserDto $userDto):void
   {
       $user = new User();
       $user->setLastname($userDto->lastname);
       $user->setFirstname($userDto->firstname);
       $user->setEmail($userDto->email);
       $user->setRoles($userDto->roles);
       $user->setPassword(password_hash($userDto->password, PASSWORD_ARGON2I));

       $this->userRepository->save($user);
   }

   public function deleteUser(int $id): bool
   {
      $user = $this->userRepository->find($id);

      if (!$user) {
          return false;
      }

      $user->setIsDeleted(true);
      $this->userRepository->save($user);

      return true;
   }
}
