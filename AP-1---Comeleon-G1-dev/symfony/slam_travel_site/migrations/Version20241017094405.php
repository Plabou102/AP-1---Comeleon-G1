<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017094405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5A76ED395 ON annonce (user_id)');
        $this->addSql('ALTER TABLE avis ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_8F91ABF0A76ED395 ON avis (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON utilisateur (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('DROP INDEX IDX_F65593E5A76ED395 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP user_id');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A76ED395');
        $this->addSql('DROP INDEX IDX_8F91ABF0A76ED395 ON avis');
        $this->addSql('ALTER TABLE avis DROP user_id');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USERNAME ON utilisateur');
    }
}
