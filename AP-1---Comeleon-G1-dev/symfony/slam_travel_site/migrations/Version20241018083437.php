<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018083437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY fk_utilisateur');
        $this->addSql('ALTER TABLE avis CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis RENAME INDEX fk_utilisateur TO IDX_8F91ABF0A76ED395');
        $this->addSql('ALTER TABLE contact ADD id INT AUTO_INCREMENT NOT NULL, DROP idcontact, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE contact RENAME INDEX iduser TO IDX_4C62E6385E5C27E9');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON utilisateur (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A76ED395');
        $this->addSql('ALTER TABLE avis CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT fk_utilisateur FOREIGN KEY (user_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE avis RENAME INDEX idx_8f91abf0a76ed395 TO fk_utilisateur');
        $this->addSql('ALTER TABLE contact MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6385E5C27E9');
        $this->addSql('DROP INDEX `PRIMARY` ON contact');
        $this->addSql('ALTER TABLE contact ADD idcontact INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE contact ADD PRIMARY KEY (idcontact)');
        $this->addSql('ALTER TABLE contact RENAME INDEX idx_4c62e6385e5c27e9 TO iduser');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON utilisateur');
    }
}
