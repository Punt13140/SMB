<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190527223620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_840E12C94AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ide AS SELECT id, curriculum_vitae_id, libelle FROM ide');
        $this->addSql('DROP TABLE ide');
        $this->addSql('CREATE TABLE ide (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, libelle VARCHAR(50) NOT NULL COLLATE BINARY, CONSTRAINT FK_840E12C94AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES curriculum_vitae (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ide (id, curriculum_vitae_id, libelle) SELECT id, curriculum_vitae_id, libelle FROM __temp__ide');
        $this->addSql('DROP TABLE __temp__ide');
        $this->addSql('CREATE INDEX IDX_840E12C94AF29A35 ON ide (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_590C1034AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__experience AS SELECT id, curriculum_vitae_id, libelle, description, date_debut, date_fin, entreprise, lieu, is_exp_informatique FROM experience');
        $this->addSql('DROP TABLE experience');
        $this->addSql('CREATE TABLE experience (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, libelle VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, entreprise VARCHAR(255) NOT NULL COLLATE BINARY, lieu VARCHAR(20) NOT NULL COLLATE BINARY, is_exp_informatique BOOLEAN NOT NULL, CONSTRAINT FK_590C1034AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES curriculum_vitae (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO experience (id, curriculum_vitae_id, libelle, description, date_debut, date_fin, entreprise, lieu, is_exp_informatique) SELECT id, curriculum_vitae_id, libelle, description, date_debut, date_fin, entreprise, lieu, is_exp_informatique FROM __temp__experience');
        $this->addSql('DROP TABLE __temp__experience');
        $this->addSql('CREATE INDEX IDX_590C1034AF29A35 ON experience (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_E9D9F85A37AECF72');
        $this->addSql('DROP INDEX IDX_E9D9F85A46E90E27');
        $this->addSql('CREATE TEMPORARY TABLE __temp__experience_framework AS SELECT experience_id, framework_id FROM experience_framework');
        $this->addSql('DROP TABLE experience_framework');
        $this->addSql('CREATE TABLE experience_framework (experience_id INTEGER NOT NULL, framework_id INTEGER NOT NULL, PRIMARY KEY(experience_id, framework_id), CONSTRAINT FK_E9D9F85A46E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E9D9F85A37AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO experience_framework (experience_id, framework_id) SELECT experience_id, framework_id FROM __temp__experience_framework');
        $this->addSql('DROP TABLE __temp__experience_framework');
        $this->addSql('CREATE INDEX IDX_E9D9F85A37AECF72 ON experience_framework (framework_id)');
        $this->addSql('CREATE INDEX IDX_E9D9F85A46E90E27 ON experience_framework (experience_id)');
        $this->addSql('DROP INDEX IDX_897B01B4957BB53C');
        $this->addSql('DROP INDEX IDX_897B01B446E90E27');
        $this->addSql('CREATE TEMPORARY TABLE __temp__experience_langage AS SELECT experience_id, langage_id FROM experience_langage');
        $this->addSql('DROP TABLE experience_langage');
        $this->addSql('CREATE TABLE experience_langage (experience_id INTEGER NOT NULL, langage_id INTEGER NOT NULL, PRIMARY KEY(experience_id, langage_id), CONSTRAINT FK_897B01B446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_897B01B4957BB53C FOREIGN KEY (langage_id) REFERENCES langage (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO experience_langage (experience_id, langage_id) SELECT experience_id, langage_id FROM __temp__experience_langage');
        $this->addSql('DROP TABLE __temp__experience_langage');
        $this->addSql('CREATE INDEX IDX_897B01B4957BB53C ON experience_langage (langage_id)');
        $this->addSql('CREATE INDEX IDX_897B01B446E90E27 ON experience_langage (experience_id)');
        $this->addSql('DROP INDEX IDX_7DA98AE322AF0A52');
        $this->addSql('DROP INDEX IDX_7DA98AE3CA84195D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__logiciel_theme_logiciel AS SELECT logiciel_id, theme_logiciel_id FROM logiciel_theme_logiciel');
        $this->addSql('DROP TABLE logiciel_theme_logiciel');
        $this->addSql('CREATE TABLE logiciel_theme_logiciel (logiciel_id INTEGER NOT NULL, theme_logiciel_id INTEGER NOT NULL, PRIMARY KEY(logiciel_id, theme_logiciel_id), CONSTRAINT FK_7DA98AE3CA84195D FOREIGN KEY (logiciel_id) REFERENCES logiciel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7DA98AE322AF0A52 FOREIGN KEY (theme_logiciel_id) REFERENCES theme_logiciel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO logiciel_theme_logiciel (logiciel_id, theme_logiciel_id) SELECT logiciel_id, theme_logiciel_id FROM __temp__logiciel_theme_logiciel');
        $this->addSql('DROP TABLE __temp__logiciel_theme_logiciel');
        $this->addSql('CREATE INDEX IDX_7DA98AE322AF0A52 ON logiciel_theme_logiciel (theme_logiciel_id)');
        $this->addSql('CREATE INDEX IDX_7DA98AE3CA84195D ON logiciel_theme_logiciel (logiciel_id)');
        $this->addSql('DROP INDEX IDX_297918834AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__information AS SELECT id, curriculum_vitae_id, description FROM information');
        $this->addSql('DROP TABLE information');
        $this->addSql('CREATE TABLE information (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, description CLOB NOT NULL COLLATE BINARY, libelle_court VARCHAR(20) DEFAULT NULL, CONSTRAINT FK_297918834AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES curriculum_vitae (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO information (id, curriculum_vitae_id, description) SELECT id, curriculum_vitae_id, description FROM __temp__information');
        $this->addSql('DROP TABLE __temp__information');
        $this->addSql('CREATE INDEX IDX_297918834AF29A35 ON information (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_F4881B9E957BB53C');
        $this->addSql('DROP INDEX IDX_F4881B9E37AECF72');
        $this->addSql('CREATE TEMPORARY TABLE __temp__framework_langage AS SELECT framework_id, langage_id FROM framework_langage');
        $this->addSql('DROP TABLE framework_langage');
        $this->addSql('CREATE TABLE framework_langage (framework_id INTEGER NOT NULL, langage_id INTEGER NOT NULL, PRIMARY KEY(framework_id, langage_id), CONSTRAINT FK_F4881B9E37AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F4881B9E957BB53C FOREIGN KEY (langage_id) REFERENCES langage (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO framework_langage (framework_id, langage_id) SELECT framework_id, langage_id FROM __temp__framework_langage');
        $this->addSql('DROP TABLE __temp__framework_langage');
        $this->addSql('CREATE INDEX IDX_F4881B9E957BB53C ON framework_langage (langage_id)');
        $this->addSql('CREATE INDEX IDX_F4881B9E37AECF72 ON framework_langage (framework_id)');
        $this->addSql('DROP INDEX IDX_93C11C7737AECF72');
        $this->addSql('CREATE TEMPORARY TABLE __temp__version_framework AS SELECT id, framework_id, num_version FROM version_framework');
        $this->addSql('DROP TABLE version_framework');
        $this->addSql('CREATE TABLE version_framework (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, framework_id INTEGER NOT NULL, num_version VARCHAR(5) NOT NULL COLLATE BINARY, CONSTRAINT FK_93C11C7737AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO version_framework (id, framework_id, num_version) SELECT id, framework_id, num_version FROM __temp__version_framework');
        $this->addSql('DROP TABLE __temp__version_framework');
        $this->addSql('CREATE INDEX IDX_93C11C7737AECF72 ON version_framework (framework_id)');
        $this->addSql('DROP INDEX IDX_50159CA9677335AF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__projet AS SELECT id, ide_id, libelle FROM projet');
        $this->addSql('DROP TABLE projet');
        $this->addSql('CREATE TABLE projet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ide_id INTEGER DEFAULT NULL, libelle VARCHAR(50) NOT NULL COLLATE BINARY, CONSTRAINT FK_50159CA9677335AF FOREIGN KEY (ide_id) REFERENCES ide (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO projet (id, ide_id, libelle) SELECT id, ide_id, libelle FROM __temp__projet');
        $this->addSql('DROP TABLE __temp__projet');
        $this->addSql('CREATE INDEX IDX_50159CA9677335AF ON projet (ide_id)');
        $this->addSql('DROP INDEX IDX_BE8889CD37AECF72');
        $this->addSql('DROP INDEX IDX_BE8889CDC18272');
        $this->addSql('CREATE TEMPORARY TABLE __temp__projet_framework AS SELECT projet_id, framework_id FROM projet_framework');
        $this->addSql('DROP TABLE projet_framework');
        $this->addSql('CREATE TABLE projet_framework (projet_id INTEGER NOT NULL, framework_id INTEGER NOT NULL, PRIMARY KEY(projet_id, framework_id), CONSTRAINT FK_BE8889CDC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BE8889CD37AECF72 FOREIGN KEY (framework_id) REFERENCES framework (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO projet_framework (projet_id, framework_id) SELECT projet_id, framework_id FROM __temp__projet_framework');
        $this->addSql('DROP TABLE __temp__projet_framework');
        $this->addSql('CREATE INDEX IDX_BE8889CD37AECF72 ON projet_framework (framework_id)');
        $this->addSql('CREATE INDEX IDX_BE8889CDC18272 ON projet_framework (projet_id)');
        $this->addSql('DROP INDEX IDX_404021BF4AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__formation AS SELECT id, curriculum_vitae_id, date_debut, date_fin, libelle, description, ville, lieu FROM formation');
        $this->addSql('DROP TABLE formation');
        $this->addSql('CREATE TABLE formation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, libelle VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, ville VARCHAR(20) NOT NULL COLLATE BINARY, lieu VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_404021BF4AF29A35 FOREIGN KEY (curriculum_vitae_id) REFERENCES curriculum_vitae (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO formation (id, curriculum_vitae_id, date_debut, date_fin, libelle, description, ville, lieu) SELECT id, curriculum_vitae_id, date_debut, date_fin, libelle, description, ville, lieu FROM __temp__formation');
        $this->addSql('DROP TABLE __temp__formation');
        $this->addSql('CREATE INDEX IDX_404021BF4AF29A35 ON formation (curriculum_vitae_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_590C1034AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__experience AS SELECT id, curriculum_vitae_id, libelle, description, date_debut, date_fin, entreprise, lieu, is_exp_informatique FROM experience');
        $this->addSql('DROP TABLE experience');
        $this->addSql('CREATE TABLE experience (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, entreprise VARCHAR(255) NOT NULL, lieu VARCHAR(20) NOT NULL, is_exp_informatique BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO experience (id, curriculum_vitae_id, libelle, description, date_debut, date_fin, entreprise, lieu, is_exp_informatique) SELECT id, curriculum_vitae_id, libelle, description, date_debut, date_fin, entreprise, lieu, is_exp_informatique FROM __temp__experience');
        $this->addSql('DROP TABLE __temp__experience');
        $this->addSql('CREATE INDEX IDX_590C1034AF29A35 ON experience (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_E9D9F85A46E90E27');
        $this->addSql('DROP INDEX IDX_E9D9F85A37AECF72');
        $this->addSql('CREATE TEMPORARY TABLE __temp__experience_framework AS SELECT experience_id, framework_id FROM experience_framework');
        $this->addSql('DROP TABLE experience_framework');
        $this->addSql('CREATE TABLE experience_framework (experience_id INTEGER NOT NULL, framework_id INTEGER NOT NULL, PRIMARY KEY(experience_id, framework_id))');
        $this->addSql('INSERT INTO experience_framework (experience_id, framework_id) SELECT experience_id, framework_id FROM __temp__experience_framework');
        $this->addSql('DROP TABLE __temp__experience_framework');
        $this->addSql('CREATE INDEX IDX_E9D9F85A46E90E27 ON experience_framework (experience_id)');
        $this->addSql('CREATE INDEX IDX_E9D9F85A37AECF72 ON experience_framework (framework_id)');
        $this->addSql('DROP INDEX IDX_897B01B446E90E27');
        $this->addSql('DROP INDEX IDX_897B01B4957BB53C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__experience_langage AS SELECT experience_id, langage_id FROM experience_langage');
        $this->addSql('DROP TABLE experience_langage');
        $this->addSql('CREATE TABLE experience_langage (experience_id INTEGER NOT NULL, langage_id INTEGER NOT NULL, PRIMARY KEY(experience_id, langage_id))');
        $this->addSql('INSERT INTO experience_langage (experience_id, langage_id) SELECT experience_id, langage_id FROM __temp__experience_langage');
        $this->addSql('DROP TABLE __temp__experience_langage');
        $this->addSql('CREATE INDEX IDX_897B01B446E90E27 ON experience_langage (experience_id)');
        $this->addSql('CREATE INDEX IDX_897B01B4957BB53C ON experience_langage (langage_id)');
        $this->addSql('DROP INDEX IDX_404021BF4AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__formation AS SELECT id, curriculum_vitae_id, date_debut, date_fin, libelle, description, ville, lieu FROM formation');
        $this->addSql('DROP TABLE formation');
        $this->addSql('CREATE TABLE formation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, libelle VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, ville VARCHAR(20) NOT NULL, lieu VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO formation (id, curriculum_vitae_id, date_debut, date_fin, libelle, description, ville, lieu) SELECT id, curriculum_vitae_id, date_debut, date_fin, libelle, description, ville, lieu FROM __temp__formation');
        $this->addSql('DROP TABLE __temp__formation');
        $this->addSql('CREATE INDEX IDX_404021BF4AF29A35 ON formation (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_F4881B9E37AECF72');
        $this->addSql('DROP INDEX IDX_F4881B9E957BB53C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__framework_langage AS SELECT framework_id, langage_id FROM framework_langage');
        $this->addSql('DROP TABLE framework_langage');
        $this->addSql('CREATE TABLE framework_langage (framework_id INTEGER NOT NULL, langage_id INTEGER NOT NULL, PRIMARY KEY(framework_id, langage_id))');
        $this->addSql('INSERT INTO framework_langage (framework_id, langage_id) SELECT framework_id, langage_id FROM __temp__framework_langage');
        $this->addSql('DROP TABLE __temp__framework_langage');
        $this->addSql('CREATE INDEX IDX_F4881B9E37AECF72 ON framework_langage (framework_id)');
        $this->addSql('CREATE INDEX IDX_F4881B9E957BB53C ON framework_langage (langage_id)');
        $this->addSql('DROP INDEX IDX_840E12C94AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ide AS SELECT id, curriculum_vitae_id, libelle FROM ide');
        $this->addSql('DROP TABLE ide');
        $this->addSql('CREATE TABLE ide (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, libelle VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO ide (id, curriculum_vitae_id, libelle) SELECT id, curriculum_vitae_id, libelle FROM __temp__ide');
        $this->addSql('DROP TABLE __temp__ide');
        $this->addSql('CREATE INDEX IDX_840E12C94AF29A35 ON ide (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_297918834AF29A35');
        $this->addSql('CREATE TEMPORARY TABLE __temp__information AS SELECT id, curriculum_vitae_id, description FROM information');
        $this->addSql('DROP TABLE information');
        $this->addSql('CREATE TABLE information (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, curriculum_vitae_id INTEGER DEFAULT NULL, description CLOB NOT NULL)');
        $this->addSql('INSERT INTO information (id, curriculum_vitae_id, description) SELECT id, curriculum_vitae_id, description FROM __temp__information');
        $this->addSql('DROP TABLE __temp__information');
        $this->addSql('CREATE INDEX IDX_297918834AF29A35 ON information (curriculum_vitae_id)');
        $this->addSql('DROP INDEX IDX_7DA98AE3CA84195D');
        $this->addSql('DROP INDEX IDX_7DA98AE322AF0A52');
        $this->addSql('CREATE TEMPORARY TABLE __temp__logiciel_theme_logiciel AS SELECT logiciel_id, theme_logiciel_id FROM logiciel_theme_logiciel');
        $this->addSql('DROP TABLE logiciel_theme_logiciel');
        $this->addSql('CREATE TABLE logiciel_theme_logiciel (logiciel_id INTEGER NOT NULL, theme_logiciel_id INTEGER NOT NULL, PRIMARY KEY(logiciel_id, theme_logiciel_id))');
        $this->addSql('INSERT INTO logiciel_theme_logiciel (logiciel_id, theme_logiciel_id) SELECT logiciel_id, theme_logiciel_id FROM __temp__logiciel_theme_logiciel');
        $this->addSql('DROP TABLE __temp__logiciel_theme_logiciel');
        $this->addSql('CREATE INDEX IDX_7DA98AE3CA84195D ON logiciel_theme_logiciel (logiciel_id)');
        $this->addSql('CREATE INDEX IDX_7DA98AE322AF0A52 ON logiciel_theme_logiciel (theme_logiciel_id)');
        $this->addSql('DROP INDEX IDX_50159CA9677335AF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__projet AS SELECT id, ide_id, libelle FROM projet');
        $this->addSql('DROP TABLE projet');
        $this->addSql('CREATE TABLE projet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ide_id INTEGER DEFAULT NULL, libelle VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO projet (id, ide_id, libelle) SELECT id, ide_id, libelle FROM __temp__projet');
        $this->addSql('DROP TABLE __temp__projet');
        $this->addSql('CREATE INDEX IDX_50159CA9677335AF ON projet (ide_id)');
        $this->addSql('DROP INDEX IDX_BE8889CDC18272');
        $this->addSql('DROP INDEX IDX_BE8889CD37AECF72');
        $this->addSql('CREATE TEMPORARY TABLE __temp__projet_framework AS SELECT projet_id, framework_id FROM projet_framework');
        $this->addSql('DROP TABLE projet_framework');
        $this->addSql('CREATE TABLE projet_framework (projet_id INTEGER NOT NULL, framework_id INTEGER NOT NULL, PRIMARY KEY(projet_id, framework_id))');
        $this->addSql('INSERT INTO projet_framework (projet_id, framework_id) SELECT projet_id, framework_id FROM __temp__projet_framework');
        $this->addSql('DROP TABLE __temp__projet_framework');
        $this->addSql('CREATE INDEX IDX_BE8889CDC18272 ON projet_framework (projet_id)');
        $this->addSql('CREATE INDEX IDX_BE8889CD37AECF72 ON projet_framework (framework_id)');
        $this->addSql('DROP INDEX IDX_93C11C7737AECF72');
        $this->addSql('CREATE TEMPORARY TABLE __temp__version_framework AS SELECT id, framework_id, num_version FROM version_framework');
        $this->addSql('DROP TABLE version_framework');
        $this->addSql('CREATE TABLE version_framework (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, framework_id INTEGER NOT NULL, num_version VARCHAR(5) NOT NULL)');
        $this->addSql('INSERT INTO version_framework (id, framework_id, num_version) SELECT id, framework_id, num_version FROM __temp__version_framework');
        $this->addSql('DROP TABLE __temp__version_framework');
        $this->addSql('CREATE INDEX IDX_93C11C7737AECF72 ON version_framework (framework_id)');
    }
}
