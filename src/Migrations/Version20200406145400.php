<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406145400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C450EAE44');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4964A220');
        $this->addSql('DROP INDEX IDX_D9BEC0C4964A220 ON commentaires');
        $this->addSql('DROP INDEX IDX_D9BEC0C450EAE44 ON commentaires');
        $this->addSql('ALTER TABLE commentaires CHANGE id_film id_film INT NOT NULL, CHANGE id_utilisateur id_utilisateur INT NOT NULL, CHANGE film film VARCHAR(50) DEFAULT NULL, CHANGE content content VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE221DACD557');
        $this->addSql('DROP INDEX IDX_8244BE221DACD557 ON film');
        $this->addSql('ALTER TABLE film CHANGE id_real id_real INT NOT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date_sortie date_sortie DATE DEFAULT NULL, CHANGE bande_annoce bande_annoce VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B011035F15257A');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B01103964A220');
        $this->addSql('ALTER TABLE acteur_film DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B011035F15257A FOREIGN KEY (id_personne) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B01103964A220 FOREIGN KEY (id_film) REFERENCES film (id)');
        $this->addSql('ALTER TABLE acteur_film ADD PRIMARY KEY (id_film, id_personne)');
        $this->addSql('ALTER TABLE personne CHANGE tel tel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3DC499668');
        $this->addSql('DROP INDEX IDX_1D1C63B3DC499668 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE id_role id_role INT NOT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B01103964A220');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B011035F15257A');
        $this->addSql('ALTER TABLE acteur_film DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B01103964A220 FOREIGN KEY (id_film) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B011035F15257A FOREIGN KEY (id_personne) REFERENCES film (id)');
        $this->addSql('ALTER TABLE acteur_film ADD PRIMARY KEY (id_personne, id_film)');
        $this->addSql('ALTER TABLE commentaires CHANGE film film VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE content content VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id_film id_film INT DEFAULT NULL, CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C450EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4964A220 FOREIGN KEY (id_film) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C4964A220 ON commentaires (id_film)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C450EAE44 ON commentaires (id_utilisateur)');
        $this->addSql('ALTER TABLE film CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_sortie date_sortie DATE DEFAULT \'NULL\', CHANGE bande_annoce bande_annoce VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id_real id_real INT DEFAULT NULL, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE221DACD557 FOREIGN KEY (id_real) REFERENCES personne (id)');
        $this->addSql('CREATE INDEX IDX_8244BE221DACD557 ON film (id_real)');
        $this->addSql('ALTER TABLE personne CHANGE tel tel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE id_role id_role INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3DC499668 FOREIGN KEY (id_role) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3DC499668 ON utilisateur (id_role)');
    }
}
