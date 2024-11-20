<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241120112330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module_user_module_planing DROP FOREIGN KEY FK_5D3C68ADAFC2B591');
        $this->addSql('DROP TABLE module_user_module_planing');
        $this->addSql('DROP TABLE user_module_planing_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE module_user_module_planing (module_id INT NOT NULL, user_module_planing_id INT NOT NULL, INDEX IDX_5D3C68ADAFC2B591 (module_id), INDEX IDX_5D3C68AD33AEDC53 (user_module_planing_id), PRIMARY KEY(module_id, user_module_planing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_module_planing_user (user_module_planing_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FA0D631933AEDC53 (user_module_planing_id), INDEX IDX_FA0D6319A76ED395 (user_id), PRIMARY KEY(user_module_planing_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE module_user_module_planing ADD CONSTRAINT FK_5D3C68ADAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
    }
}
