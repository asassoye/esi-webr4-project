<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804152740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE platform_logo (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, width INT NOT NULL, height INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE platform ADD logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE platform ADD CONSTRAINT FK_3952D0CBF98F144A FOREIGN KEY (logo_id) REFERENCES platform_logo (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3952D0CBF98F144A ON platform (logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE platform DROP FOREIGN KEY FK_3952D0CBF98F144A');
        $this->addSql('DROP TABLE platform_logo');
        $this->addSql('DROP INDEX UNIQ_3952D0CBF98F144A ON platform');
        $this->addSql('ALTER TABLE platform DROP logo_id');
    }
}