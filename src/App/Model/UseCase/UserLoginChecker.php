<?php

namespace App\Model\UseCase;

use Rakit\Validation\Validator;

class UserLoginChecker
{
    private $valodator;

    public function __construct(\PDO $pdo, Validator $validator)
    {
        $this->valodator = $validator;
        $this->valodator->addValidator('has', new CustomRuleHasRule($pdo));
    }

    public function check(array $data)
    {
        $validation = $this->valodator->validate($data, [
            'email' => 'required|min:3|email|has:users,email',
            'password' => 'required|min:3||has:users,password'
        ]);
        return $validation->errors()->firstOfAll();
    }
}