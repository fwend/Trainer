<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011013604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge ADD created DATETIME NOT NULL, ADD modified DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge_category ADD created DATETIME NOT NULL, ADD modified DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge_section ADD created DATETIME NOT NULL, ADD modified DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP created, DROP modified');
        $this->addSql('ALTER TABLE challenge_category DROP created, DROP modified');
        $this->addSql('ALTER TABLE challenge_section DROP created, DROP modified');
    }
}
