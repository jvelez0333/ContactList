<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019005303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql("");
        $this->addSql("CREATE TABLE contacts (id VARCHAR(255) NOT NULL, first_name VARCHAR(300) NOT NULL, last_name VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");
        $this->addSql("CREATE TABLE typesContact (id VARCHAR(255) NOT NULL, contact_id VARCHAR(255) DEFAULT NULL, type VARCHAR(100) NOT NULL, value VARCHAR(300) NOT NULL, description VARCHAR(300) NOT NULL, INDEX IDX_527C748E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");
        $this->addSql("ALTER TABLE typesContact ADD CONSTRAINT FK_527C748E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id);");

        $this->addSql("ALTER TABLE typesContact CHANGE contact_id contact_id VARCHAR(255) DEFAULT NULL;");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
