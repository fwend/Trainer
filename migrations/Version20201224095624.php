<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201224095624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge_run ADD mode_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge_run ADD CONSTRAINT FK_493D09CC77E5854A FOREIGN KEY (mode_id) REFERENCES run_mode (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_493D09CC77E5854A ON challenge_run (mode_id)');
        $this->addSql('ALTER TABLE run_mode ADD position INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge_run DROP FOREIGN KEY FK_493D09CC77E5854A');
        $this->addSql('DROP INDEX UNIQ_493D09CC77E5854A ON challenge_run');
        $this->addSql('ALTER TABLE challenge_run DROP mode_id');
        $this->addSql('ALTER TABLE run_mode DROP position');
    }
}
