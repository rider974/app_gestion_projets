<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114100621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, tache_id INT NOT NULL, intitule VARCHAR(75) NOT NULL, est_complete TINYINT(1) NOT NULL, INDEX IDX_47CC8C92D2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE colonne (id INT AUTO_INCREMENT NOT NULL, tableau_id INT NOT NULL, intitule VARCHAR(75) NOT NULL, INDEX IDX_65F87C44B062D5BC (tableau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(75) NOT NULL, objectifs LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tableau (id INT AUTO_INCREMENT NOT NULL, projet_id INT DEFAULT NULL, INDEX IDX_C6744DB1C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, colonne_id INT NOT NULL, responsable_id INT DEFAULT NULL, titre VARCHAR(75) NOT NULL, description LONGTEXT DEFAULT NULL, date_limite DATE DEFAULT NULL, INDEX IDX_93872075213EAC9D (colonne_id), INDEX IDX_9387207553C59D72 (responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(75) NOT NULL, prenom VARCHAR(75) NOT NULL, addresse_mail VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_projet (utilisateur_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_31B8A622FB88E14F (utilisateur_id), INDEX IDX_31B8A622C18272 (projet_id), PRIMARY KEY(utilisateur_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE colonne ADD CONSTRAINT FK_65F87C44B062D5BC FOREIGN KEY (tableau_id) REFERENCES tableau (id)');
        $this->addSql('ALTER TABLE tableau ADD CONSTRAINT FK_C6744DB1C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075213EAC9D FOREIGN KEY (colonne_id) REFERENCES colonne (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_9387207553C59D72 FOREIGN KEY (responsable_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92D2235D39');
        $this->addSql('ALTER TABLE colonne DROP FOREIGN KEY FK_65F87C44B062D5BC');
        $this->addSql('ALTER TABLE tableau DROP FOREIGN KEY FK_C6744DB1C18272');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075213EAC9D');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_9387207553C59D72');
        $this->addSql('ALTER TABLE utilisateur_projet DROP FOREIGN KEY FK_31B8A622FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_projet DROP FOREIGN KEY FK_31B8A622C18272');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE colonne');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE tableau');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_projet');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
