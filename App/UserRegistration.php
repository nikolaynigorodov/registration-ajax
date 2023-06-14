<?php

namespace App;

use App\Repository\UserRepository;
use App\Validation\UserValidation;

require_once('App/Validation/UserValidation.php');
require_once('App/Repository/UserRepository.php');

class UserRegistration
{
    private array $request = [];
    /**
     * @var \App\Validation\UserValidation
     */
    private UserValidation $userValidation;
    private UserRepository $userRepository;

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->userValidation = new UserValidation();
        $this->userRepository = new UserRepository();
    }

    public function registration(): bool|string
    {
        $validation = $this->userValidation->validation($this->request);
        if ($validation['status'] === true) {
            $this->userRepository->createUser($this->request);
        }
        return json_encode($validation);
    }
}