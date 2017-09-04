<?php


class AuthController {

    protected $registration;

    public function __construct(RegisterUser $registration)
    {
        $this->registration = $registration;
    }

    public function register(){
        $this->registration->execute([], $this);
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

    public function execute(array $data, $listener){

        var_dump("REgistering user......");

        $listener->userRegistredSuccefull();
    }

}

$registration = new RegisterUser();
$authController = new AuthController($registration);

$authController->register();