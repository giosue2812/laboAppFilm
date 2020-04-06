<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406134413 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, id_film INT DEFAULT NULL, id_utilisateur INT DEFAULT NULL, film VARCHAR(50) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, INDEX IDX_D9BEC0C4964A220 (id_film), INDEX IDX_D9BEC0C450EAE44 (id_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, id_real INT DEFAULT NULL, titre VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, date_sortie DATE DEFAULT NULL, bande_annoce VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8244BE22FF7747B4 (titre), INDEX IDX_8244BE221DACD557 (id_real), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_film (id_personne INT NOT NULL, id_film INT NOT NULL, INDEX IDX_14B011035F15257A (id_personne), INDEX IDX_14B01103964A220 (id_film), PRIMARY KEY(id_personne, id_film)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, ad_rue VARCHAR(50) NOT NULL, ad_code_postal BIGINT NOT NULL, ad_ville VARCHAR(50) NOT NULL, tel INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_role INT DEFAULT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, ad_rue VARCHAR(50) NOT NULL, ad_code_postal BIGINT NOT NULL, ad_ville VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B386CC499D (pseudo), INDEX IDX_1D1C63B3DC499668 (id_role), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4964A220 FOREIGN KEY (id_film) REFERENCES film (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C450EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE221DACD557 FOREIGN KEY (id_real) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B011035F15257A FOREIGN KEY (id_personne) REFERENCES film (id)');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B01103964A220 FOREIGN KEY (id_film) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3DC499668 FOREIGN KEY (id_role) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4964A220');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B011035F15257A');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE221DACD557');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B01103964A220');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3DC499668');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C450EAE44');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE acteur_film');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE utilisateur');
    }
}
