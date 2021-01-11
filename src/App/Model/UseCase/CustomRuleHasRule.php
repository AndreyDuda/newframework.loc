<?php

namespace App\Model\UseCase;

use Rakit\Validation\Rule;

class CustomRuleHasRule extends Rule
{
    protected $message = "Login or Password wrong";

    protected $fillableParams = ['table', 'column', 'except'];

    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function check($value): bool
    {
        $this->requireParameters(['table', 'column']);

        $column = $this->parameter('column');
        $table = $this->parameter('table');

        $stmt = $this->pdo->prepare("select count(*) as count from `{$table}` where `{$column}` = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return intval($data['count']) === 1;
    }
}