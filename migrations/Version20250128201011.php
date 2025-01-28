<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250128201011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agency CHANGE telephone telephone VARCHAR(20) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70C0C6E6F55AE19E ON agency (numero)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70C0C6E6450FF010 ON agency (telephone)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_70C0C6E6F55AE19E ON agency');
        $this->addSql('DROP INDEX UNIQ_70C0C6E6450FF010 ON agency');
        $this->addSql('ALTER TABLE agency CHANGE telephone telephone VARCHAR(255) NOT NULL');
    }
}
