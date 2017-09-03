<?php

class Person {
    protected $name;
    protected $langs = [];


    public function __construct($name, array $langs)
    {
        $this->name = $name;
        $this->langs = $langs;
    }

}

class Staff {

    protected $members;

    public function __construct($members = [])
    {
        $this->members = $members;
    }

    public function add(Person $members)
    {
        $this->members[] = $members;
    }

    public function members()
    {
        return $this->members;
    }

}

class Business {

    protected $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function hire(Person $person)
    {
        $this->staff->add($person);
    }

    public function getMembers(){
        return $this->staff->members();
    }

}

$person = new Person('Oleg', ['php', 'C#', 'C++']);
$person2 = new Person('Kirill', ['js', 'reactjs']);
$person3 = new Person('Igor', ['js', 'reactjs']);

$personals = new Staff([$person2, $person3]);

$yandex_company = new Business($personals);
$yandex_company->hire($person);
print_r($yandex_company->getMembers());
