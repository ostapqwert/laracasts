<?php

class User {

    protected $name;
    protected $age;


    public function __construct($name, $age){

        $this->name = $name;
        $this->age = $age;

    }

    public function name(){
        return $this->name;
    }

    public function age(){
        return $this->age;
    }

}

class UserCollection {

    protected $users;

    public function __construct(array $users){
        $this->users = $users;
    }

    public function sortBy($proprety){

        usort($this->users, function($user1, $user2) use ($proprety){
            return $user1->$proprety() <=> $user2->$proprety();
        });

    }

    public function getUsers(){
        return $this->users;
    }

}


$collection = new UserCollection([
    new User('Vasia', 20),
    new User('Oleg', 30),
    new User('Mashsa', 355)
]);

$collection->sortBy('age');

var_dump($collection->getUsers());
