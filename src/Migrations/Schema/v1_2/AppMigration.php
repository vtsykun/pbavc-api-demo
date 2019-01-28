<?php

namespace App\Migrations\Schema\v1_2;

use Doctrine\DBAL\Schema\Schema;
use Okvpn\Bundle\MigrationBundle\Migration\Migration;
use Okvpn\Bundle\MigrationBundle\Migration\QueryBag;

class AppMigration implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $table = $schema->createTable('cuantic_case');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('contact_id', 'integer', ['notnull' => false]);
        $table->addColumn('reason', 'string', ['notnull' => false, 'length' => 255]);
        $table->addIndex(['contact_id'], 'IDX_5AB346F4E7A1254A', []);
        $table->setPrimaryKey(['id']);

        $table = $schema->getTable('cuantic_case');
        $table->addForeignKeyConstraint(
            $schema->getTable('cuantic_contact'),
            ['contact_id'],
            ['id'],
            ['onDelete' => 'CASCADE']
        );
    }
}
