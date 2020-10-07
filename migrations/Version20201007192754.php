<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007192754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE challenge (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, content VARCHAR(255) NOT NULL, answers LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', link VARCHAR(255) DEFAULT NULL, score INT DEFAULT NULL, note VARCHAR(255) DEFAULT NULL, INDEX IDX_D709895112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE challenge_category (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, name VARCHAR(255) NOT NULL, position INT DEFAULT NULL, INDEX IDX_9B72FE21D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE challenge_section (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, position INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D709895112469DE2 FOREIGN KEY (category_id) REFERENCES challenge_category (id)');
        $this->addSql('ALTER TABLE challenge_category ADD CONSTRAINT FK_9B72FE21D823E37A FOREIGN KEY (section_id) REFERENCES challenge_section (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D709895112469DE2');
        $this->addSql('ALTER TABLE challenge_category DROP FOREIGN KEY FK_9B72FE21D823E37A');
        $this->addSql('DROP TABLE challenge');
        $this->addSql('DROP TABLE challenge_category');
        $this->addSql('DROP TABLE challenge_section');
    }
}
