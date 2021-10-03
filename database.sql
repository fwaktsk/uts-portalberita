CREATE DATABASE IF NOT EXISTS `news_portal`;

USE `news_portal`;

CREATE TABLE IF NOT EXISTS `accounts` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL,
	`username` VARCHAR(128) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`first_name` VARCHAR(128) NOT NULL,
	`last_name` VARCHAR(128) NOT NULL,
	`birth_date` DATE,
	`gender` BIT NOT NULL DEFAULT 0,
	`profile_picture` VARCHAR(255) NOT NULL DEFAULT '/images/profile_picture/default.jpg',
	`datetime_register` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`datetime_last_login` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`is_admin` BIT NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
	UNIQUE (`email`),
	UNIQUE (`username`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(128) NOT NULL DEFAULT 'No Title',
	`author_id` INTEGER UNSIGNED NOT NULL,
	`datetime_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`datetime_modified` DATETIME,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`author_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles_likes` (
	`account_id` INTEGER UNSIGNED NOT NULL,
	`article_id` INTEGER UNSIGNED NOT NULL,
	CONSTRAINT `pk_article_like` PRIMARY KEY (`account_id`, `article_id`),
	FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles_body` (
	`article_id` INTEGER UNSIGNED NOT NULL,
	`body` LONGTEXT NOT NULL,
	PRIMARY KEY (`article_id`),
	FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles_comments` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`article_id` INTEGER UNSIGNED NOT NULL,
	`comment` MEDIUMTEXT NOT NULL,
	`datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `comments_likes` (
	`account_id` INTEGER UNSIGNED NOT NULL,
	`comment_id` INTEGER UNSIGNED NOT NULL,
	CONSTRAINT `pk_comment_like` PRIMARY KEY (`account_id`, `comment_id`),
	FOREIGN KEY (`comment_id`) REFERENCES `articles_comments`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `admin_log` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`admin_id` INTEGER UNSIGNED NOT NULL,
	`admin_name` VARCHAR(255) NOT NULL DEFAULT 'Unknown',
	`action` VARCHAR(255) NOT NULL DEFAULT 'Unknown',
	PRIMARY KEY (`id`),
	FOREIGN KEY (`admin_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;