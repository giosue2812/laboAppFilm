<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410092953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires CHANGE utilisateurs_id utilisateurs_id INT DEFAULT NULL, CHANGE films_id films_id INT DEFAULT NULL, CHANGE content content VARCHAR(255) DEFAULT NULL, CHANGE film film VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE film CHANGE realisateurs realisateurs INT DEFAULT NULL, CHANGE acteur_film_id acteur_film_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date_sortie date_sortie DATE DEFAULT NULL, CHANGE bande_annoce bande_annoce VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFFCBFEBE1');
        $this->addSql('DROP INDEX IDX_FCEC9EFFCBFEBE1 ON personne');
        $this->addSql('ALTER TABLE personne DROP acteur_film_id, CHANGE tel tel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles_id roles_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires CHANGE utilisateurs_id utilisateurs_id INT DEFAULT NULL, CHANGE films_id films_id INT DEFAULT NULL, CHANGE film film VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE content content VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE film CHANGE realisateurs realisateurs INT DEFAULT NULL, CHANGE acteur_film_id acteur_film_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_sortie date_sortie DATE DEFAULT \'NULL\', CHANGE bande_annoce bande_annoce VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personne ADD acteur_film_id INT DEFAULT NULL, CHANGE tel tel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFFCBFEBE1 FOREIGN KEY (acteur_film_id) REFERENCES acteur_film (id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EFFCBFEBE1 ON personne (acteur_film_id)');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles_id roles_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
