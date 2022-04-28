<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415133344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Artiste (login NVARCHAR(255) NOT NULL, Identifiant BIGINT IDENTITY NOT NULL, Nom NVARCHAR(100) NOT NULL, Prenom NVARCHAR(100) NOT NULL, CV NVARCHAR(100), Date_Naissance DATE NOT NULL, roles VARCHAR(MAX) NOT NULL, password NVARCHAR(255) NOT NULL, IdCivilite INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_53BA0CD330B2325D ON Artiste (IdCivilite)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'Artiste\', N\'COLUMN\', roles');
        $this->addSql('CREATE TABLE artiste_offre (Identifiant_Artiste BIGINT NOT NULL, Identifiant_Offre BIGINT NOT NULL, PRIMARY KEY (Identifiant_Artiste, Identifiant_Offre))');
        $this->addSql('CREATE INDEX IDX_DBAF9C913F0526FB ON artiste_offre (Identifiant_Artiste)');
        $this->addSql('CREATE INDEX IDX_DBAF9C91B756F41D ON artiste_offre (Identifiant_Offre)');
        $this->addSql('CREATE TABLE Civilite (Identifiant INT IDENTITY NOT NULL, civiliteLongue NVARCHAR(100) NOT NULL, LibelleCourt NVARCHAR(10) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Contenue_editorial (Identifiant BIGINT IDENTITY NOT NULL, Fiche_Metier NVARCHAR(100) NOT NULL, Conseil NVARCHAR(100) NOT NULL, Interviews NVARCHAR(100) NOT NULL, Article VARCHAR(MAX) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Contrat (Identifiant BIGINT IDENTITY NOT NULL, Intitule_Contrat NVARCHAR(100) NOT NULL, Description VARCHAR(MAX) NOT NULL, Identifiant_Type_Contrat BIGINT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_AF89A00FA6EDA21B ON Contrat (Identifiant_Type_Contrat)');
        $this->addSql('CREATE TABLE Domaine (Identifiant BIGINT IDENTITY NOT NULL, Nom NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Liste_referenciel (Identifiant BIGINT IDENTITY NOT NULL, Type_Contrat NVARCHAR(100) NOT NULL, Domaine_Metier NVARCHAR(100) NOT NULL, Metier NVARCHAR(100) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE liste_referenciel_offre (Identifiant_Liste BIGINT NOT NULL, Identifiant_Offre BIGINT NOT NULL, PRIMARY KEY (Identifiant_Liste, Identifiant_Offre))');
        $this->addSql('CREATE INDEX IDX_5DB2D47E4225886 ON liste_referenciel_offre (Identifiant_Liste)');
        $this->addSql('CREATE INDEX IDX_5DB2D47B756F41D ON liste_referenciel_offre (Identifiant_Offre)');
        $this->addSql('CREATE TABLE Login (identifiant INT IDENTITY NOT NULL, user_login NVARCHAR(100), user_password NVARCHAR(100), PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE Metier (Identifiant BIGINT IDENTITY NOT NULL, Nom NVARCHAR(255) NOT NULL, Identifiant_Domaine BIGINT, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_560C08BADBAD1978 ON Metier (Identifiant_Domaine)');
        $this->addSql('CREATE TABLE Offre_de_Casting (Identifiant BIGINT IDENTITY NOT NULL, Intitule_Offre NVARCHAR(255) NOT NULL, Reference_Offre INT NOT NULL, Date_Debut DATE NOT NULL, Date_Fin DATE NOT NULL, Ville NVARCHAR(100) NOT NULL, Identifiant_Domaine BIGINT NOT NULL, Identifiant_Metier BIGINT NOT NULL, Identifiant_Organisation BIGINT NOT NULL, Identifiant_Type_Contrat BIGINT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_18DFA917DBAD1978 ON Offre_de_Casting (Identifiant_Domaine)');
        $this->addSql('CREATE INDEX IDX_18DFA917EFB3CDEE ON Offre_de_Casting (Identifiant_Metier)');
        $this->addSql('CREATE INDEX IDX_18DFA917C7A45F55 ON Offre_de_Casting (Identifiant_Organisation)');
        $this->addSql('CREATE INDEX IDX_18DFA917A6EDA21B ON Offre_de_Casting (Identifiant_Type_Contrat)');
        $this->addSql('CREATE TABLE Organisation (Identifiant BIGINT IDENTITY NOT NULL, Nom_Organisation NVARCHAR(100), Adresse_Organisation NVARCHAR(100), Code_Postal INT NOT NULL, Numero_Telephone INT NOT NULL, Adresse_Email NVARCHAR(100), PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Partenaire_diffusion (Identifiant BIGINT IDENTITY NOT NULL, Libelle_Offre NVARCHAR(100), Libelle_Media NVARCHAR(100) NOT NULL, Acces BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('ALTER TABLE Partenaire_diffusion ADD CONSTRAINT DF_D7B88262_11351414 DEFAULT 1 FOR Acces');
        $this->addSql('CREATE TABLE partenaire_offre (Identifiant_Partenaire BIGINT NOT NULL, Identifiant_Offre BIGINT NOT NULL, PRIMARY KEY (Identifiant_Partenaire, Identifiant_Offre))');
        $this->addSql('CREATE INDEX IDX_6665C7D57F49D5A2 ON partenaire_offre (Identifiant_Partenaire)');
        $this->addSql('CREATE INDEX IDX_6665C7D5B756F41D ON partenaire_offre (Identifiant_Offre)');
        $this->addSql('CREATE TABLE Type_Contrat (Identifiant BIGINT IDENTITY NOT NULL, NomContrat NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Utilisateur (Identifiant BIGINT IDENTITY NOT NULL, Nom NVARCHAR(100) NOT NULL, MotdePasse NVARCHAR(50), Acces BIT NOT NULL, DateAjout DATE NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(255) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK_53BA0CD330B2325D FOREIGN KEY (IdCivilite) REFERENCES Civilite (Identifiant)');
        $this->addSql('ALTER TABLE artiste_offre ADD CONSTRAINT FK_DBAF9C913F0526FB FOREIGN KEY (Identifiant_Artiste) REFERENCES Artiste (Identifiant)');
        $this->addSql('ALTER TABLE artiste_offre ADD CONSTRAINT FK_DBAF9C91B756F41D FOREIGN KEY (Identifiant_Offre) REFERENCES Offre_de_Casting (Identifiant)');
        $this->addSql('ALTER TABLE Contrat ADD CONSTRAINT FK_AF89A00FA6EDA21B FOREIGN KEY (Identifiant_Type_Contrat) REFERENCES Type_Contrat (Identifiant)');
        $this->addSql('ALTER TABLE liste_referenciel_offre ADD CONSTRAINT FK_5DB2D47E4225886 FOREIGN KEY (Identifiant_Liste) REFERENCES Liste_referenciel (Identifiant)');
        $this->addSql('ALTER TABLE liste_referenciel_offre ADD CONSTRAINT FK_5DB2D47B756F41D FOREIGN KEY (Identifiant_Offre) REFERENCES Offre_de_Casting (Identifiant)');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BADBAD1978 FOREIGN KEY (Identifiant_Domaine) REFERENCES Domaine (Identifiant)');
        $this->addSql('ALTER TABLE Offre_de_Casting ADD CONSTRAINT FK_18DFA917DBAD1978 FOREIGN KEY (Identifiant_Domaine) REFERENCES Domaine (Identifiant)');
        $this->addSql('ALTER TABLE Offre_de_Casting ADD CONSTRAINT FK_18DFA917EFB3CDEE FOREIGN KEY (Identifiant_Metier) REFERENCES Metier (Identifiant)');
        $this->addSql('ALTER TABLE Offre_de_Casting ADD CONSTRAINT FK_18DFA917C7A45F55 FOREIGN KEY (Identifiant_Organisation) REFERENCES Organisation (Identifiant)');
        $this->addSql('ALTER TABLE Offre_de_Casting ADD CONSTRAINT FK_18DFA917A6EDA21B FOREIGN KEY (Identifiant_Type_Contrat) REFERENCES Type_Contrat (Identifiant)');
        $this->addSql('ALTER TABLE partenaire_offre ADD CONSTRAINT FK_6665C7D57F49D5A2 FOREIGN KEY (Identifiant_Partenaire) REFERENCES Partenaire_diffusion (Identifiant)');
        $this->addSql('ALTER TABLE partenaire_offre ADD CONSTRAINT FK_6665C7D5B756F41D FOREIGN KEY (Identifiant_Offre) REFERENCES Offre_de_Casting (Identifiant)');
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
        $this->addSql('ALTER TABLE artiste_offre DROP CONSTRAINT FK_DBAF9C913F0526FB');
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK_53BA0CD330B2325D');
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK_560C08BADBAD1978');
        $this->addSql('ALTER TABLE Offre_de_Casting DROP CONSTRAINT FK_18DFA917DBAD1978');
        $this->addSql('ALTER TABLE liste_referenciel_offre DROP CONSTRAINT FK_5DB2D47E4225886');
        $this->addSql('ALTER TABLE Offre_de_Casting DROP CONSTRAINT FK_18DFA917EFB3CDEE');
        $this->addSql('ALTER TABLE artiste_offre DROP CONSTRAINT FK_DBAF9C91B756F41D');
        $this->addSql('ALTER TABLE liste_referenciel_offre DROP CONSTRAINT FK_5DB2D47B756F41D');
        $this->addSql('ALTER TABLE partenaire_offre DROP CONSTRAINT FK_6665C7D5B756F41D');
        $this->addSql('ALTER TABLE Offre_de_Casting DROP CONSTRAINT FK_18DFA917C7A45F55');
        $this->addSql('ALTER TABLE partenaire_offre DROP CONSTRAINT FK_6665C7D57F49D5A2');
        $this->addSql('ALTER TABLE Contrat DROP CONSTRAINT FK_AF89A00FA6EDA21B');
        $this->addSql('ALTER TABLE Offre_de_Casting DROP CONSTRAINT FK_18DFA917A6EDA21B');
        $this->addSql('DROP TABLE Artiste');
        $this->addSql('DROP TABLE artiste_offre');
        $this->addSql('DROP TABLE Civilite');
        $this->addSql('DROP TABLE Contenue_editorial');
        $this->addSql('DROP TABLE Contrat');
        $this->addSql('DROP TABLE Domaine');
        $this->addSql('DROP TABLE Liste_referenciel');
        $this->addSql('DROP TABLE liste_referenciel_offre');
        $this->addSql('DROP TABLE Login');
        $this->addSql('DROP TABLE Metier');
        $this->addSql('DROP TABLE Offre_de_Casting');
        $this->addSql('DROP TABLE Organisation');
        $this->addSql('DROP TABLE Partenaire_diffusion');
        $this->addSql('DROP TABLE partenaire_offre');
        $this->addSql('DROP TABLE Type_Contrat');
        $this->addSql('DROP TABLE Utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
