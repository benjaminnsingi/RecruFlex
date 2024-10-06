<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface UserRepositoryInterface
{
   /**
    *  Finds a user by their unique identifier.
     * @param int $id The User ID
     * @return User|null The user corresponding to the identifier, or null if no user is found.
   */
   public function find(int $id): ?User;

   /**
    * Finds a user by their email.
     * @param string $email
     * @return User|null The user corresponding to the identifier, or null if no user is found.
   */
   public function findByEmail(string $email): ?User;

   /**
    *  Retrieves all users.
     * @return array A table containing all the users.
    */
   public function findAll(): array;

   /**
    *  Saves a user to the database.
     * @param User $user
     * @return void
   */
   public function save(User $user): void;

   /**
    * Checks whether a user is marked as deleted.
     * @param User $user The user entity to be verified.
     * @return bool True if the user is deleted, False otherwise.
   */
   public function isDeleted(User $user): bool;
}
