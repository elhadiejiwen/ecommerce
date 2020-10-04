<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004144635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, image1_id INT DEFAULT NULL, image2_id INT DEFAULT NULL, image3_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, prix INT NOT NULL, slug VARCHAR(255) NOT NULL, negociable TINYINT(1) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, archived TINYINT(1) DEFAULT NULL, seen INT DEFAULT NULL, valide TINYINT(1) DEFAULT NULL, validerpar VARCHAR(255) DEFAULT NULL, INDEX IDX_F65593E5A76ED395 (user_id), UNIQUE INDEX UNIQ_F65593E5E5529553 (image1_id), UNIQUE INDEX UNIQ_F65593E5F7E73ABD (image2_id), UNIQUE INDEX UNIQ_F65593E54F5B5DD8 (image3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5E5529553 FOREIGN KEY (image1_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F7E73ABD FOREIGN KEY (image2_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E54F5B5DD8 FOREIGN KEY (image3_id) REFERENCES image (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5E5529553');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F7E73ABD');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E54F5B5DD8');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE user');
    }
}
