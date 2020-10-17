<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201017181701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE challenge_run (id INT AUTO_INCREMENT NOT NULL, section_id INT DEFAULT NULL, current_id INT NOT NULL, INDEX IDX_493D09CCD823E37A (section_id), UNIQUE INDEX UNIQ_493D09CCF58A7A5C (current_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge_run ADD CONSTRAINT FK_493D09CCD823E37A FOREIGN KEY (section_id) REFERENCES challenge_section (id)');
        $this->addSql('ALTER TABLE challenge_run ADD CONSTRAINT FK_493D09CCF58A7A5C FOREIGN KEY (current_id) REFERENCES challenge (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE challenge_run');
    }
}
