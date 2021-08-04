<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804172925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, cover_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, summary LONGTEXT DEFAULT NULL, storyline LONGTEXT DEFAULT NULL, category INT NOT NULL, release_date DATETIME DEFAULT NULL, rating DOUBLE PRECISION DEFAULT NULL, rating_count INT DEFAULT NULL, aggregated_rating DOUBLE PRECISION DEFAULT NULL, aggregated_rating_count INT DEFAULT NULL, total_rating DOUBLE PRECISION DEFAULT NULL, total_rating_count INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_232B318C922726E9 (cover_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_genre (game_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_B1634A77E48FD905 (game_id), INDEX IDX_B1634A774296D31F (genre_id), PRIMARY KEY(game_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_platform (game_id INT NOT NULL, platform_id INT NOT NULL, INDEX IDX_92162FEDE48FD905 (game_id), INDEX IDX_92162FEDFFE6496F (platform_id), PRIMARY KEY(game_id, platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_age_rating (game_id INT NOT NULL, age_rating_id INT NOT NULL, INDEX IDX_2FAC9CB8E48FD905 (game_id), INDEX IDX_2FAC9CB857CDC09 (age_rating_id), PRIMARY KEY(game_id, age_rating_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C922726E9 FOREIGN KEY (cover_id) REFERENCES cover (id)');
        $this->addSql('ALTER TABLE game_genre ADD CONSTRAINT FK_B1634A77E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_genre ADD CONSTRAINT FK_B1634A774296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT FK_92162FEDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT FK_92162FEDFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_age_rating ADD CONSTRAINT FK_2FAC9CB8E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_age_rating ADD CONSTRAINT FK_2FAC9CB857CDC09 FOREIGN KEY (age_rating_id) REFERENCES age_rating (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screenshot ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE screenshot ADD CONSTRAINT FK_58991E41E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_58991E41E48FD905 ON screenshot (game_id)');
        $this->addSql('ALTER TABLE video ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CE48FD905 ON video (game_id)');
        $this->addSql('ALTER TABLE website ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE website ADD CONSTRAINT FK_476F5DE7E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_476F5DE7E48FD905 ON website (game_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_genre DROP FOREIGN KEY FK_B1634A77E48FD905');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDE48FD905');
        $this->addSql('ALTER TABLE game_age_rating DROP FOREIGN KEY FK_2FAC9CB8E48FD905');
        $this->addSql('ALTER TABLE screenshot DROP FOREIGN KEY FK_58991E41E48FD905');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CE48FD905');
        $this->addSql('ALTER TABLE website DROP FOREIGN KEY FK_476F5DE7E48FD905');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_genre');
        $this->addSql('DROP TABLE game_platform');
        $this->addSql('DROP TABLE game_age_rating');
        $this->addSql('DROP INDEX IDX_58991E41E48FD905 ON screenshot');
        $this->addSql('ALTER TABLE screenshot DROP game_id');
        $this->addSql('DROP INDEX IDX_7CC7DA2CE48FD905 ON video');
        $this->addSql('ALTER TABLE video DROP game_id');
        $this->addSql('DROP INDEX IDX_476F5DE7E48FD905 ON website');
        $this->addSql('ALTER TABLE website DROP game_id');
    }
}
