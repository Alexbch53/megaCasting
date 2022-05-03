<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502114903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE postuler (id INT IDENTITY NOT NULL, motivation VARCHAR(MAX) NOT NULL, date_postulation DATETIME2(6) NOT NULL, IdArtiste BIGINT, IdOffreDeCasting BIGINT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_8EC5A68DE4FDC1E ON postuler (IdArtiste)');
        $this->addSql('CREATE INDEX IDX_8EC5A68DA09798FD ON postuler (IdOffreDeCasting)');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68DE4FDC1E FOREIGN KEY (IdArtiste) REFERENCES Artiste (identifiant)');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68DA09798FD FOREIGN KEY (IdOffreDeCasting) REFERENCES Offre_de_Casting (identifiant)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('DROP TABLE postuler');
    }
}
