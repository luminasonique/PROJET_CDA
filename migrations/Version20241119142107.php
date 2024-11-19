<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119142107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_module_planing (id INT AUTO_INCREMENT NOT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, ongoing_status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course ADD relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB93256915B FOREIGN KEY (relation_id) REFERENCES formations (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB93256915B ON course (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_module_planing');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB93256915B');
        $this->addSql('DROP INDEX IDX_169E6FB93256915B ON course');
        $this->addSql('ALTER TABLE course DROP relation_id');
    }
}
