<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251106090312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD id_user_id INT DEFAULT NULL, ADD id_categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_CB988C6F79F37AE5 ON annonces (id_user_id)');
        $this->addSql('CREATE INDEX IDX_CB988C6F9F34925F ON annonces (id_categorie_id)');
        $this->addSql('ALTER TABLE user ADD id_adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E86D5C8B FOREIGN KEY (id_adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649E86D5C8B ON user (id_adresse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F79F37AE5');
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F9F34925F');
        $this->addSql('DROP INDEX IDX_CB988C6F79F37AE5 ON annonces');
        $this->addSql('DROP INDEX IDX_CB988C6F9F34925F ON annonces');
        $this->addSql('ALTER TABLE annonces DROP id_user_id, DROP id_categorie_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E86D5C8B');
        $this->addSql('DROP INDEX IDX_8D93D649E86D5C8B ON user');
        $this->addSql('ALTER TABLE user DROP id_adresse_id');
    }
}
