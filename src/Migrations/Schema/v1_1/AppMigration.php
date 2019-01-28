<?php

namespace App\Migrations\Schema\v1_1;

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
        /** New Tables generation **/
        $this->createCuanticContactEmailTable($schema);
        $this->createCuanticContactTable($schema);
        /** Foreign keys generation **/
        $this->addCuanticContactEmailForeignKeys($schema);
    }

    /**
     * Create cuantic_contact_email table
     *
     * @param Schema $schema
     */
    protected function createCuanticContactEmailTable(Schema $schema)
    {
        $table = $schema->createTable('cuantic_contact_email');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('owner_id', 'integer', ['notnull' => false]);
        $table->addColumn('email', 'string', ['length' => 255]);
        $table->addColumn('is_primary', 'boolean', ['notnull' => false]);
        $table->addColumn('optin', 'boolean', ['notnull' => false]);
        $table->addIndex(['owner_id'], 'IDX_EB6574367E3C61F9', []);
        $table->setPrimaryKey(['id']);
        $table->addIndex(['email'], 'contact_email_email_idx', []);
    }

    /**
     * Create cuantic_contact table
     *
     * @param Schema $schema
     */
    protected function createCuanticContactTable(Schema $schema)
    {
        $table = $schema->createTable('cuantic_contact');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('first_name', 'string', ['notnull' => false, 'length' => 255]);
        $table->addColumn('last_name', 'string', ['notnull' => false, 'length' => 255]);
        $table->addColumn('created_at', 'datetime', []);
        $table->setPrimaryKey(['id']);
        $table->addIndex(['created_at'], 'contact_created_at_idx', []);
    }

    /**
     * Add cuantic_contact_email foreign keys.
     *
     * @param Schema $schema
     */
    protected function addCuanticContactEmailForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('cuantic_contact_email');
        $table->addForeignKeyConstraint(
            $schema->getTable('cuantic_contact'),
            ['owner_id'],
            ['id'],
            ['onDelete' => 'CASCADE']
        );
    }
}
