<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211110130043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__villes AS SELECT id, nom, codepostal, codeinsee, population2010 FROM villes');
        $this->addSql('DROP TABLE villes');
        $this->addSql('CREATE TABLE villes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom CLOB DEFAULT NULL COLLATE BINARY, codepostal CLOB DEFAULT NULL COLLATE BINARY, codeinsee CLOB DEFAULT NULL COLLATE BINARY, population2010 INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO villes (id, nom, codepostal, codeinsee, population2010) SELECT id, nom, codepostal, codeinsee, population2010 FROM __temp__villes');
        $this->addSql('DROP TABLE __temp__villes');
        $this->addSql('CREATE INDEX IDX_19209FD86C6E55B5 ON villes (nom)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_19209FD86C6E55B5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__villes AS SELECT id, nom, codepostal, codeinsee, population2010 FROM villes');
        $this->addSql('DROP TABLE villes');
        $this->addSql('CREATE TABLE villes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom CLOB DEFAULT NULL, codepostal CLOB DEFAULT NULL, codeinsee CLOB DEFAULT NULL, population2010 INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO villes (id, nom, codepostal, codeinsee, population2010) SELECT id, nom, codepostal, codeinsee, population2010 FROM __temp__villes');
        $this->addSql('DROP TABLE __temp__villes');
    }
}
