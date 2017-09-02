<?php

class BankAccounts {

    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }


    public function filteBy($accountType){
        $filtered = [];

        foreach ($this->accounts as $account){
            if($account->type() == $accountType){
                if($account->isActive()){
                    $filtered[] = $account;
                }
            }
        }

        return $filtered;

    }

}

class Account {
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public static function open($type)
    {
        return new static($type);
    }

    public function isActive()
    {
        return true;
    }

    public function type()
    {
        return $this->type;
    }

}

$accounts = [
    Account::open('checking'),
    Account::open('savings'),
    Account::open('checking'),
    Account::open('savings'),
];

$accounts = new BankAccounts($accounts);

$savings = $accounts->filteBy('savings');

var_dump($savings);

