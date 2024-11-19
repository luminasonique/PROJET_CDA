<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119134805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module ADD rating_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628A32EFC6 FOREIGN KEY (rating_id) REFERENCES rating (id)');
        $this->addSql('CREATE INDEX IDX_C242628A32EFC6 ON module (rating_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628A32EFC6');
        $this->addSql('DROP INDEX IDX_C242628A32EFC6 ON module');
        $this->addSql('ALTER TABLE module DROP rating_id');
    }
}
