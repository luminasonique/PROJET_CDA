<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119143142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE module_user_module_planing (module_id INT NOT NULL, user_module_planing_id INT NOT NULL, INDEX IDX_5D3C68ADAFC2B591 (module_id), INDEX IDX_5D3C68AD33AEDC53 (user_module_planing_id), PRIMARY KEY(module_id, user_module_planing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_module_planing_user (user_module_planing_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FA0D631933AEDC53 (user_module_planing_id), INDEX IDX_FA0D6319A76ED395 (user_id), PRIMARY KEY(user_module_planing_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE module_user_module_planing ADD CONSTRAINT FK_5D3C68ADAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module_user_module_planing ADD CONSTRAINT FK_5D3C68AD33AEDC53 FOREIGN KEY (user_module_planing_id) REFERENCES user_module_planing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_module_planing_user ADD CONSTRAINT FK_FA0D631933AEDC53 FOREIGN KEY (user_module_planing_id) REFERENCES user_module_planing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_module_planing_user ADD CONSTRAINT FK_FA0D6319A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module_user_module_planing DROP FOREIGN KEY FK_5D3C68ADAFC2B591');
        $this->addSql('ALTER TABLE module_user_module_planing DROP FOREIGN KEY FK_5D3C68AD33AEDC53');
        $this->addSql('ALTER TABLE user_module_planing_user DROP FOREIGN KEY FK_FA0D631933AEDC53');
        $this->addSql('ALTER TABLE user_module_planing_user DROP FOREIGN KEY FK_FA0D6319A76ED395');
        $this->addSql('DROP TABLE module_user_module_planing');
        $this->addSql('DROP TABLE user_module_planing_user');
    }
}
