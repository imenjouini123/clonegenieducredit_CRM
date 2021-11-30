<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130183404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, authenvoiemail TINYINT(1) NOT NULL, authenvoisms TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_32EB52E8FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concessionnaire (id INT AUTO_INCREMENT NOT NULL, concessionnairemarchand_id INT NOT NULL, UNIQUE INDEX UNIQ_42384AB56771C043 (concessionnairemarchand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concessionnairemarchand (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, actif TINYINT(1) NOT NULL, logo VARCHAR(255) NOT NULL, siteweb VARCHAR(255) NOT NULL, liendealertrack VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_29246D8BFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fabriquant (id INT AUTO_INCREMENT NOT NULL, actifcrm TINYINT(1) NOT NULL, actifservice TINYINT(1) NOT NULL, actifaccueil TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, datecreation DATETIME NOT NULL, datemodification DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fabriquant_concessionnairemarchand (fabriquant_id INT NOT NULL, concessionnairemarchand_id INT NOT NULL, INDEX IDX_A3F9D8455E0C7E7D (fabriquant_id), INDEX IDX_A3F9D8456771C043 (concessionnairemarchand_id), PRIMARY KEY(fabriquant_id, concessionnairemarchand_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marchand (id INT AUTO_INCREMENT NOT NULL, concessionnairemarchand_id INT NOT NULL, UNIQUE INDEX UNIQ_9D5311966771C043 (concessionnairemarchand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, courriel VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, nomutilisateur VARCHAR(255) NOT NULL, motdepasse VARCHAR(255) NOT NULL, datecreation DATETIME NOT NULL, datemodification DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE concessionnaire ADD CONSTRAINT FK_42384AB56771C043 FOREIGN KEY (concessionnairemarchand_id) REFERENCES concessionnairemarchand (id)');
        $this->addSql('ALTER TABLE concessionnairemarchand ADD CONSTRAINT FK_29246D8BFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE fabriquant_concessionnairemarchand ADD CONSTRAINT FK_A3F9D8455E0C7E7D FOREIGN KEY (fabriquant_id) REFERENCES fabriquant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fabriquant_concessionnairemarchand ADD CONSTRAINT FK_A3F9D8456771C043 FOREIGN KEY (concessionnairemarchand_id) REFERENCES concessionnairemarchand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE marchand ADD CONSTRAINT FK_9D5311966771C043 FOREIGN KEY (concessionnairemarchand_id) REFERENCES concessionnairemarchand (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concessionnaire DROP FOREIGN KEY FK_42384AB56771C043');
        $this->addSql('ALTER TABLE fabriquant_concessionnairemarchand DROP FOREIGN KEY FK_A3F9D8456771C043');
        $this->addSql('ALTER TABLE marchand DROP FOREIGN KEY FK_9D5311966771C043');
        $this->addSql('ALTER TABLE fabriquant_concessionnairemarchand DROP FOREIGN KEY FK_A3F9D8455E0C7E7D');
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8FB88E14F');
        $this->addSql('ALTER TABLE concessionnairemarchand DROP FOREIGN KEY FK_29246D8BFB88E14F');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE concessionnaire');
        $this->addSql('DROP TABLE concessionnairemarchand');
        $this->addSql('DROP TABLE fabriquant');
        $this->addSql('DROP TABLE fabriquant_concessionnairemarchand');
        $this->addSql('DROP TABLE marchand');
        $this->addSql('DROP TABLE utilisateur');
    }
}
