<?php

class BankAccounts {

    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }


    public function filteBy($accountType)
    {

        return array_filter($this->accounts, function($account) use ($accountType){
           return $account->isOfType($accountType);
        });

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

    private function isActive()
    {
        return true;
    }

    private function type()
    {
        return $this->type;
    }

    public function isOfType($accountType): bool
    {
        return $this->type() == $accountType && $this->isActive();
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

