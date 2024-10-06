<?php

namespace App\Domain\Enum;

/**
 * Listing of the different roles for users of the recruitment application
 * This list defines the roles available, such as Candidate, Recruiter, HR Manager and Administrator.
 */
enum UserRole: string
{
   /**
     * Role for a candidate applying for a job.
   */
   case CANDIDATE = 'ROLE_CANDIDATE';

   /**
     * Role for a recruiter managing job offers and applications.
   */
   case RECRUITER = 'ROLE_RECRUITER';

   /**
     * Role for an HR manager supervising recruiters and the recruitment process.
   */
   case HR_MANAGER = 'ROLE_HR_MANAGER';

   /**
     * Role for an administrator with elevated privileges in platform management.
   */
   case ADMIN = 'ROLE_ADMIN';

   /**
    * Returns all the roles available in the enumeration in the form of an array
     * @return array An array containing the available roles in the form of character strings.
   */
   public static function getAvailableRoles(): array
   {
       return array_map(fn($role) => $role->value, self::cases());
   }
}
