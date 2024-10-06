<?php

namespace App\Domain\Entity;

use App\Domain\Enum\UserRole;
use Doctrine\ORM\Mapping as ORM;
use Infrastructure\Persistence\Doctrine\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
   #[ORM\Id]
   #[ORM\GeneratedValue]
   #[ORM\Column(type: 'integer')]
   private ?int $id = null;

   #[ORM\Column(type: 'string', length: 100)]
   private ?string $lastname = null;

   #[ORM\Column(type: 'string', length: 100)]
   private ?string $firstname = null;

   #[ORM\Column(type: 'string', length: 255)]
   private ?string $email = null;

   #[ORM\Column(type: 'json')]
   private array $roles = [];

   #[ORM\Column(type: 'string', length: 255)]
   private ?string $password = null;

   #[ORM\Column(type: 'boolean')]
   private bool $isDeleted = false;

   public function getId(): ?int
   {
       return $this->id;
   }

   public function getLastname(): ?string
   {
      return $this->lastname;
   }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

   public function setPassword(?string $password): self
   {
        $this->password = $password;
        return $this;
   }

   /**
    * Returns the user's roles as an array of character strings.
    *
    * Each role is extracted from the UserRole enumeration and converted to its corresponding string value.
     * @return array|string[] An array of character strings representing the user's roles.
   */
   public function getRoles(): array
   {
       return array_map(fn($role) => $role->value, $this->roles);
   }

   public function setRoles(array $roles): self
   {
       /**
        * Validate that each role is an instance of UserRole
       */
       foreach ($roles as $role) {
         if (!$role instanceof UserRole) {
             throw new \InvalidArgumentException("Invalid role");
         }
       }
       $this->roles = $roles;
       return $this;
   }

   public function eraseCredentials()
   {
   }

   public function getUserIdentifier(): string
   {
       return (string) $this->email;
   }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;
        return $this;
    }
}
