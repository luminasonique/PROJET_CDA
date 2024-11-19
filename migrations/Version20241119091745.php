<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119091745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, DROP presence, CHANGE last_name last_name VARCHAR(100) NOT NULL, CHANGE email email VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE user_info ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD presence VARCHAR(255) DEFAULT NULL, DROP created_at, DROP updated_at, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_info DROP created_at, DROP updated_at');
    }
}
