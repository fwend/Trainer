<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201224173104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE run_history_challenge');
        $this->addSql('ALTER TABLE run_history ADD challenge_ids LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE run_history_challenge (run_history_id INT NOT NULL, challenge_id INT NOT NULL, INDEX IDX_7C4A1AA0AACBBB68 (run_history_id), INDEX IDX_7C4A1AA098A21AC6 (challenge_id), PRIMARY KEY(run_history_id, challenge_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE run_history_challenge ADD CONSTRAINT FK_7C4A1AA098A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE run_history_challenge ADD CONSTRAINT FK_7C4A1AA0AACBBB68 FOREIGN KEY (run_history_id) REFERENCES run_history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE run_history DROP challenge_ids');
    }
}
