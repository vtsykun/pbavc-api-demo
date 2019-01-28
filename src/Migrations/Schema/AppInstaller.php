<?php

declare(strict_types=1);

namespace App\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Okvpn\Bundle\MigrationBundle\Migration\Installation;
use Okvpn\Bundle\MigrationBundle\Migration\QueryBag;

class AppInstaller implements Installation
{
    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion(): string
    {
        return 'v1_0';
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries): void
    {
        $table = $schema->createTable('book');
        $table->addColumn('id', Type::INTEGER, ['autoincrement' => true]);
        $table->addColumn('name', Type::STRING, ['length' => 64, 'notnull' => true]);
        $table->addColumn('code', Type::INTEGER, ['notnull' => false]);
        $table->setPrimaryKey(['id']);
    }
}
