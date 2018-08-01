<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180801082411 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE profile_settings (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, show_date_born TINYINT(1) NOT NULL, show_born_city TINYINT(1) NOT NULL, show_live_city TINYINT(1) NOT NULL, show_friends TINYINT(1) NOT NULL, INDEX IDX_1C2FC1749D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, surname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, fathername VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_born DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, sender_id_id INT NOT NULL, receiver_id_id INT NOT NULL, message VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_DB021E966061F7CF (sender_id_id), INDEX IDX_DB021E96BE20CAB0 (receiver_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, country_id_id INT NOT NULL, INDEX IDX_D95DB16BA76ED395 (user_id), INDEX IDX_D95DB16BD8A48BBD (country_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, setting_id_id INT NOT NULL, image_path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E01FBE6A36EC6D36 (setting_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friends (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, friend_id_id INT NOT NULL, INDEX IDX_21EE70699D86650F (user_id_id), UNIQUE INDEX UNIQ_21EE7069DFD406F3 (friend_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profile_settings ADD CONSTRAINT FK_1C2FC1749D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E966061F7CF FOREIGN KEY (sender_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96BE20CAB0 FOREIGN KEY (receiver_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BD8A48BBD FOREIGN KEY (country_id_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A36EC6D36 FOREIGN KEY (setting_id_id) REFERENCES profile_settings (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE70699D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE friends ADD CONSTRAINT FK_21EE7069DFD406F3 FOREIGN KEY (friend_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A36EC6D36');
        $this->addSql('ALTER TABLE profile_settings DROP FOREIGN KEY FK_1C2FC1749D86650F');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E966061F7CF');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96BE20CAB0');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BA76ED395');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE70699D86650F');
        $this->addSql('ALTER TABLE friends DROP FOREIGN KEY FK_21EE7069DFD406F3');
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BD8A48BBD');
        $this->addSql('DROP TABLE profile_settings');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE friends');
    }
}
