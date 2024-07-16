<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716085428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD serveur_id INT DEFAULT NULL, ADD barman_id INT DEFAULT NULL, ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DB8F06499 FOREIGN KEY (serveur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA1EB02C0 FOREIGN KEY (barman_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DB8F06499 ON commande (serveur_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA1EB02C0 ON commande (barman_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DB8F06499');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA1EB02C0');
        $this->addSql('DROP INDEX IDX_6EEAA67DB8F06499 ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67DA1EB02C0 ON commande');
        $this->addSql('ALTER TABLE commande DROP serveur_id, DROP barman_id, DROP status');
    }
}
