<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406110417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acteur_film (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT DEFAULT NULL, id_film_id INT DEFAULT NULL, INDEX IDX_14B01103BA091CE5 (id_personne_id), INDEX IDX_14B0110388E2F8F3 (id_film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_film_id INT DEFAULT NULL, id_utilsateur_id INT DEFAULT NULL, film VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_67F068BC88E2F8F3 (id_film_id), INDEX IDX_67F068BC2DFC80D6 (id_utilsateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, id_real_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_sortie DATE NOT NULL, bande_annonce VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_8244BE222C9D2381 (id_real_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ad_rue VARCHAR(255) NOT NULL, ad_code_postal BIGINT NOT NULL, ad_ville VARCHAR(255) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_role_id INT DEFAULT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, ad_rue VARCHAR(255) NOT NULL, ad_code_postal BIGINT NOT NULL, ad_ville VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), INDEX IDX_8D93D64989E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B01103BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B0110388E2F8F3 FOREIGN KEY (id_film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC88E2F8F3 FOREIGN KEY (id_film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC2DFC80D6 FOREIGN KEY (id_utilsateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE222C9D2381 FOREIGN KEY (id_real_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B0110388E2F8F3');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC88E2F8F3');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B01103BA091CE5');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE222C9D2381');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989E8BDC');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC2DFC80D6');
        $this->addSql('DROP TABLE acteur_film');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
    }
}
