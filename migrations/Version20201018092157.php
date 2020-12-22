<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201018092157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge_category CHANGE position position INT NOT NULL');
        $this->addSql('ALTER TABLE challenge_run CHANGE current_id current_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge_section CHANGE position position INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge_category CHANGE position position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge_run CHANGE current_id current_id INT NOT NULL');
        $this->addSql('ALTER TABLE challenge_section CHANGE position position INT DEFAULT NULL');
    }
}
