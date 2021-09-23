CREATE DATABASE IF NOT EXISTS `news_portal`;

USE `news_portal`;

CREATE TABLE IF NOT EXISTS `accounts` (
	`id` INTEGER AUTO_INCREMENT,
	`username` VARCHAR(128),
	`password` CHAR(32),
	`salt` VARCHAR(32),
	`first_name` VARCHAR(128),
	`last_name` VARCHAR(128),
	`birth_date` DATE,
	`gender` SMALLINT(1) UNSIGNED DEFAULT 0,
	`profile_picture` VARCHAR(255),
	`is_admin` BIT DEFAULT 0,
	PRIMARY KEY (`id`),
	UNIQUE (`username`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles` (
	`id` INTEGER AUTO_INCREMENT,
	`title` VARCHAR(128),
	`author_id` INTEGER,
	`date_created` DATETIME,
	`date_modified` DATETIME,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`author_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles_likes` (
	`article_id` INTEGER,
	`account_id` INTEGER,
	FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles_body` (
	`article_id` INTEGER,
	`body` LONGTEXT,
	PRIMARY KEY (`article_id`),
	FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `articles_comments` (
	`id` INTEGER AUTO_INCREMENT,
	`article_id` INTEGER,
	`comment` MEDIUMTEXT,
	`date` DATETIME,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`article_id`) REFERENCES `articles`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `comments_likes` (
	`comment_id` INTEGER,
	`account_id` INTEGER,
	FOREIGN KEY (`comment_id`) REFERENCES `articles_comments`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `admin_log` (
	`id` INTEGER AUTO_INCREMENT,
	`date` DATETIME,
	`admin_id` INTEGER,
	`admin_name` VARCHAR(255),
	`action` VARCHAR(255),
	PRIMARY KEY (`id`),
	FOREIGN KEY (`admin_id`) REFERENCES `accounts`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;