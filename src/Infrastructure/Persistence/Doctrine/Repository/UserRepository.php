<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function __construct(readonly private EntityManagerInterface $entityManager){
    }

    public function find(int $id): ?User
    {
       return $this->entityManager->getRepository(User::class)->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email, 'isDeleted' => false]);
    }

    public function findAll(): array
    {
       return $this->entityManager->getRepository(User::class)->findBy(['isDeleted' => false]);
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function isDeleted(User $user): bool
    {
       $user->setIsDeleted(true);
       $this->entityManager->flush();
       return true;
    }
}
