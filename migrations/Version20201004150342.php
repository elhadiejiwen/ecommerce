<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004150342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E54F5B5DD8');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F7E73ABD');
        $this->addSql('DROP INDEX UNIQ_F65593E5F7E73ABD ON annonce');
        $this->addSql('DROP INDEX UNIQ_F65593E54F5B5DD8 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP image2_id, DROP image3_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD image2_id INT DEFAULT NULL, ADD image3_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E54F5B5DD8 FOREIGN KEY (image3_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F7E73ABD FOREIGN KEY (image2_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E5F7E73ABD ON annonce (image2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E54F5B5DD8 ON annonce (image3_id)');
    }
}
