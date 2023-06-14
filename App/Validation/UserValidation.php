<?php

namespace App\Validation;

use App\Services\LoggerServices;
use App\Services\UserServices;
use App\Validation\Interface\ValidationInterface;

require_once('App/Validation/Interface/ValidationInterface.php');
require_once('App/Services/UserServices.php');
require_once('App/Services/LoggerServices.php');

class UserValidation implements ValidationInterface
{
    private $required_fields = [];
    private $error_fields = [];
    private $response = [];
    private $message = '';
    private $userServices;
    private LoggerServices $loggerServices;

    public function __construct()
    {
        $this->userServices = new UserServices();
        $this->loggerServices = new LoggerServices();
    }

    public function validation(array $request)
    {
        $this->init($request);

        foreach ($this->required_fields as $key => $val) {
            if ($val === '') {
                $this->error_fields[] = $key;
                $this->message = "The fields must not be empty.";
            } elseif ($key === 'email' && !filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->error_fields[] = $key;
                $this->message .= "\r\nPlease provide a valid email.";
            }
        }

        if ($this->required_fields['password'] !== $this->required_fields['password_confirm']) {
            array_push($this->error_fields, "password", "password_confirm");
            $this->message .= "\r\nThe Password and Password Confirm don't match.";
        }

        if ($this->userServices->validUniqEmail($this->required_fields['email'])) {
            $this->error_fields[] = "email";
            $text = " User with this email already exists.";
            $this->message .= "\r\n" . $text;
            $this->loggerServices->saveLog("Search by " . $this->required_fields['email'] . $text);
        }

        if (!empty($this->error_fields)) {
            $this->response = [
                "status" => false,
                "type" => 1,
                "message" => $this->message,
                "fields" => $this->error_fields
            ];
        } else {
            $this->response = [
                "status" => true,
            ];
        }

        return $this->response;
    }

    private function init(array $request)
    {
        $this->required_fields['first_name'] = $request['first_name'];
        $this->required_fields['last_name'] = $request['last_name'];
        $this->required_fields['email'] = $request['email'];
        $this->required_fields['password'] = $request['password'];
        $this->required_fields['password_confirm'] = $request['password_confirm'];
    }
}