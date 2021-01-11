<?php

namespace App\Model\UseCase;

use Rakit\Validation\Validator;

class TaskCreateChecker
{
    private $validator;
    private $rule;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->rule = [
            'title' => 'required|min:3',
            'content' => 'required|min:3',
            'date_finish' => 'required|date|after:yesterday'
        ];
    }

    public function check(array $data)
    {
        $validation = $this->validator->validate($data, $this->rule);
        return $validation->errors()->firstOfAll();
    }
}