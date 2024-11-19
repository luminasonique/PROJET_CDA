<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119132746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_degree (user_id INT NOT NULL, degree_id INT NOT NULL, INDEX IDX_C2F1765EA76ED395 (user_id), INDEX IDX_C2F1765EB35C5756 (degree_id), PRIMARY KEY(user_id, degree_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_degree ADD CONSTRAINT FK_C2F1765EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_degree ADD CONSTRAINT FK_C2F1765EB35C5756 FOREIGN KEY (degree_id) REFERENCES degree (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_degree DROP FOREIGN KEY FK_C2F1765EA76ED395');
        $this->addSql('ALTER TABLE user_degree DROP FOREIGN KEY FK_C2F1765EB35C5756');
        $this->addSql('DROP TABLE user_degree');
    }
}
