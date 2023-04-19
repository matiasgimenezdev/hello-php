<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FirstTableMigrations extends AbstractMigration
{
    public function change(): void
    {
        $tableAuthors = $this -> table('authors');
        $tableAuthors -> addColumn('name', 'string', ['limit' => 60]);
        $tableAuthors -> addColumn('email', 'string', ['null' => true]);
        $tableAuthors -> create();

        $tableTasks = $this -> table('tasks');
        $tableTasks -> addColumn('title', 'string', ['limit' => 60]);
        $tableTasks -> addColumn('description', 'string', ['null' => true]);
        $tableTasks -> addColumn('author', 'integer', ['signed' => false]);
        $tableTasks -> addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP']);
        $tableTasks -> addForeignKey('author', 'authors', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE']);
        $tableTasks -> create();
    }
}