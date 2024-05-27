<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240527203607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (isbn INT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(50) NOT NULL, price NUMERIC(5, 2) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(isbn)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (isbn INT NOT NULL, telephone VARCHAR(8) NOT NULL, ville VARCHAR(255) NOT NULL, quantity INT NOT NULL, INDEX IDX_6EEAA67DCC1CF4E6 (isbn), INDEX IDX_6EEAA67D450FF010 (telephone), PRIMARY KEY(isbn, telephone)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (telephone VARCHAR(8) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(telephone)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DCC1CF4E6 FOREIGN KEY (isbn) REFERENCES book (isbn)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D450FF010 FOREIGN KEY (telephone) REFERENCES user (telephone)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DCC1CF4E6');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D450FF010');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
