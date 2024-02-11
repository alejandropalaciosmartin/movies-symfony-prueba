<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211175116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie ADD genre_id INT NOT NULL, ADD country_id INT NOT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F4296D31F ON movie (genre_id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26FF92F3E70 ON movie (country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4296D31F');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FF92F3E70');
        $this->addSql('DROP INDEX IDX_1D5EF26F4296D31F ON movie');
        $this->addSql('DROP INDEX IDX_1D5EF26FF92F3E70 ON movie');
        $this->addSql('ALTER TABLE movie DROP genre_id, DROP country_id');
    }
}
