<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180818090539 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_D95DB16BF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, locale VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_born_id INT DEFAULT NULL, live_city_id INT NOT NULL, surname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, fathername VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_born DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8D93D649444AED2 (city_born_id), INDEX IDX_8D93D649A7122D4 (live_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BF92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649444AED2 FOREIGN KEY (city_born_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A7122D4 FOREIGN KEY (live_city_id) REFERENCES cities (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649444AED2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A7122D4');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BF92F3E70');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE user');
    }
}
