<?php

namespace App\Interfaces\Controller;

use App\Application\Dto\UserDto;
use App\Application\UseCase\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
   public function __construct(
       private readonly UserService $userService
   ){
   }

   #[Route('', name: 'app_register', methods: ['POST'])]
   public function register(Request $request): JsonResponse
   {

       $data = json_decode($request->getContent(), true);

       if (!isset($data['lastname'], $data['firstname'], $data['email'], $data['roles'], $data['password'])) {
           return new JsonResponse(['error' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
       }

       $userDto = new UserDto(
           $data['lastname'],
           $data['firstname'],
           $data['email'],
           $data['roles'],
           $data['password']
       );
       

       $this->userService->createUser($userDto);
       return new JsonResponse(['message' => 'register successfully'], Response::HTTP_CREATED);
   }
}
