<?php

interface ResponsesUserRegistration {
    public function userRegistredSuccefull();
    public function userRegistredFailed();
}

class AuthController implements ResponsesUserRegistration {

    protected $registration;

    public function __construct(RegisterUser $registration)
    {
        $this->registration = $registration;
    }

    public function register(){
        $this->registration->execute(['name'=>'oleg', 'email'=>'ad@google.com'], $this);
    }

    public function userRegistredSuccefull()
    {
        var_dump('created succefull, redirect somewhere');
    }

    public function userRegistredFailed()
    {
        var_dump('created fail, redirect backs');
    }

}



class RegisterUser {

    public function execute(array $data, ResponsesUserRegistration $listener){

        var_dump($data,"Registering user......");

        $listener->userRegistredSuccefull();
    }

}

$registration = new RegisterUser();
$authController = new AuthController($registration);

$authController->register();