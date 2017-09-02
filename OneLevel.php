<?php

class BankAccounts {

    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }


    public function filteBy($accountType){

        return array_filter($this->accounts, function($account) use ($accountType){
           return $this->isOfType($accountType, $account);
        });

    }

    private function isOfType($accountType, $account): bool
    {
        return $account->type() == $accountType && $account->isActive();
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

