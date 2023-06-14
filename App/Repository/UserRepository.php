<?php

namespace App\Repository;

use App\Services\UserServices;

require_once('App/Services/UserServices.php');

class UserRepository
{
    private $userServices;

    public function __construct()
    {
        $this->userServices = new UserServices();
    }

    public function createUser(array $data)
    {
        $name = $data['first_name'] . " " . $data['last_name'];
        $password = $this->userServices->cryptPassword($data['password']);
        $id = $this->userServices->countLines() + 1;
        $line = [$id, $name, $data['email'], $password];
        $handle = fopen($this->userServices->path, "a");
        fputcsv($handle, $line);
        fclose($handle);
    }
}