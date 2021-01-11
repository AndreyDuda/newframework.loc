<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;
use App\Model\UseCase\StatusTask;

final class Tasks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $tasks = $this->table('tasks');
        $tasks->addColumn('parent_id', 'integer', ['limit' => 11, 'null' => true])
            ->addColumn('title', 'string', ['null' => false])
            ->addColumn('content', 'text', ['null' => false])
            ->addColumn('date_finish', 'datetime', ['null' => false])
            ->addColumn('status', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => StatusTask::STATUS_NEW])
            ->addForeignKey('parent_id', 'tasks', 'id', [
                'delete' => 'CASCADE',
                'update' => 'NO_ACTION'
            ])
            ->create();
    }
}
