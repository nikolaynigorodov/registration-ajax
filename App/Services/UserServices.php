<?php

namespace App\Services;

class UserServices
{
    public string $path = 'assets/users/users.csv';

    public function validUniqEmail($email)
    {
        $handle = fopen($this->path, "r"); // open in readonly mode
        while (($row = fgetcsv($handle)) !== false) {
            if ($row[2] === $email) {
                return true;
            }
        }
        fclose($handle);
        return false;
    }

    public function cryptPassword($password)
    {
        $salt = 'GHggkg&ItUuOY9IYOui8+khjk7';
        return crypt($password, $salt);
    }

    public function countLines()
    {
        $fp = file($this->path);
        return count($fp);
    }
}