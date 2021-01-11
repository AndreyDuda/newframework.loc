<?php

namespace App\Model\UseCase;

use Rakit\Validation\Validator;

class UserRegisterChecker
{
    private $valodator;

    public function __construct(\PDO $pdo, Validator $validator)
    {
        $this->valodator = $validator;
        $this->valodator->addValidator('unique', new CustomUserSignupRule($pdo));
    }

    public function check(array $data)
    {
        $validation = $this->valodator->validate($data, [
            'email' => 'required|min:3|email|unique:users,email,exception@mail.com',
            'password' => 'required|min:3|same:confirm_password',
        ]);
        return $validation->errors()->firstOfAll();
    }
}