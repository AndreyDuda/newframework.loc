<?php


namespace App\Model\UseCase;


use Rakit\Validation\Validator;

class UserRegisterChecker
{
    private $validator;
    private $rule;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->rule = [
            'username' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|same:confirm_password'
        ];
    }

    public function check(array $data)
    {
        $validation = $this->validator->validate($data, $this->rule);
        return $validation->errors()->firstOfAll();
    }
}