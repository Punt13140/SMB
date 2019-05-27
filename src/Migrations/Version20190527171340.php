<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190527171340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE curriculum_vitae (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(20) NOT NULL, num_portable VARCHAR(10) NOT NULL, mail VARCHAR(30) NOT NULL, intitule VARCHAR(30) NOT NULL, date_naissance DATE NOT NULL, prenom VARCHAR(10) NOT NULL, nom VARCHAR(10) NOT NULL)');
        $this->addSql('CREATE TABLE experience (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, entreprise VARCHAR(255) NOT NULL, lieu VARCHAR(20) NOT NULL, is_exp_informatique BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_590C1034AF29A35 ON experience (curriculum_vitae_id)');
        $this->addSql('CREATE TABLE langage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE logiciel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE logiciel_theme_logiciel (logiciel_id INTEGER NOT NULL, theme_logiciel_id INTEGER NOT NULL, PRIMARY KEY(logiciel_id, theme_logiciel_id))');
        $this->addSql('CREATE INDEX IDX_7DA98AE3CA84195D ON logiciel_theme_logiciel (logiciel_id)');
        $this->addSql('CREATE INDEX IDX_7DA98AE322AF0A52 ON logiciel_theme_logiciel (theme_logiciel_id)');
        $this->addSql('CREATE TABLE information (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_297918834AF29A35 ON information (curriculum_vitae_id)');
        $this->addSql('CREATE TABLE framework (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE framework_langage (framework_id INTEGER NOT NULL, langage_id INTEGER NOT NULL, PRIMARY KEY(framework_id, langage_id))');
        $this->addSql('CREATE INDEX IDX_F4881B9E37AECF72 ON framework_langage (framework_id)');
        $this->addSql('CREATE INDEX IDX_F4881B9E957BB53C ON framework_langage (langage_id)');
        $this->addSql('CREATE TABLE version_framework (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, framework_id INTEGER NOT NULL, num_version VARCHAR(5) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_93C11C7737AECF72 ON version_framework (framework_id)');
        $this->addSql('CREATE TABLE langue (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, niveau INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE hobby (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('CREATE TABLE theme_logiciel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE formation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, ville VARCHAR(20) NOT NULL, lieu VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_404021BF4AF29A35 ON formation (curriculum_vitae_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE curriculum_vitae');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE langage');
        $this->addSql('DROP TABLE logiciel');
        $this->addSql('DROP TABLE logiciel_theme_logiciel');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE framework');
        $this->addSql('DROP TABLE framework_langage');
        $this->addSql('DROP TABLE version_framework');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE theme_logiciel');
        $this->addSql('DROP TABLE formation');
    }
}
