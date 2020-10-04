<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004132807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD image1_id INT DEFAULT NULL, ADD image2_id INT DEFAULT NULL, ADD image3_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5E5529553 FOREIGN KEY (image1_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F7E73ABD FOREIGN KEY (image2_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E54F5B5DD8 FOREIGN KEY (image3_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E5E5529553 ON annonce (image1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E5F7E73ABD ON annonce (image2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E54F5B5DD8 ON annonce (image3_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F8805AB2F');
        $this->addSql('DROP INDEX IDX_C53D045F8805AB2F ON image');
        $this->addSql('ALTER TABLE image DROP annonce_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5E5529553');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F7E73ABD');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E54F5B5DD8');
        $this->addSql('DROP INDEX UNIQ_F65593E5E5529553 ON annonce');
        $this->addSql('DROP INDEX UNIQ_F65593E5F7E73ABD ON annonce');
        $this->addSql('DROP INDEX UNIQ_F65593E54F5B5DD8 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP image1_id, DROP image2_id, DROP image3_id');
        $this->addSql('ALTER TABLE image ADD annonce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F8805AB2F ON image (annonce_id)');
    }
}
