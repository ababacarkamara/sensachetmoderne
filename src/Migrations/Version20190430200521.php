<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190430200521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE civilite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(20) NOT NULL, actif INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, civilite_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone INT NOT NULL, email VARCHAR(50) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, created_by VARCHAR(50) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(50) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, deleted_by VARCHAR(50) DEFAULT NULL, sup INT DEFAULT NULL, INDEX IDX_C744045539194ABF (civilite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(20) NOT NULL, actif INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix INT NOT NULL, created_at DATETIME DEFAULT NULL, created_by VARCHAR(50) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(50) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, deleted_by VARCHAR(50) DEFAULT NULL, sup INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_taille (produit_id INT NOT NULL, taille_id INT NOT NULL, INDEX IDX_81024002F347EFB (produit_id), INDEX IDX_81024002FF25611A (taille_id), PRIMARY KEY(produit_id, taille_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_couleur (produit_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_FAF60C9CF347EFB (produit_id), INDEX IDX_FAF60C9CC31BA576 (couleur_id), PRIMARY KEY(produit_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(20) NOT NULL, actif INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045539194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE produit_taille ADD CONSTRAINT FK_81024002F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_taille ADD CONSTRAINT FK_81024002FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045539194ABF');
        $this->addSql('ALTER TABLE produit_couleur DROP FOREIGN KEY FK_FAF60C9CC31BA576');
        $this->addSql('ALTER TABLE produit_taille DROP FOREIGN KEY FK_81024002F347EFB');
        $this->addSql('ALTER TABLE produit_couleur DROP FOREIGN KEY FK_FAF60C9CF347EFB');
        $this->addSql('ALTER TABLE produit_taille DROP FOREIGN KEY FK_81024002FF25611A');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_taille');
        $this->addSql('DROP TABLE produit_couleur');
        $this->addSql('DROP TABLE taille');
    }
}
