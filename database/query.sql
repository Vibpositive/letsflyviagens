CREATE TABLE `quotes` (
	`id` int NOT NULL AUTO_INCREMENT UNIQUE,
	`user_id` int NOT NULL,
	`quote_type` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `quote_field` (
	`id` int NOT NULL AUTO_INCREMENT UNIQUE,
	`quote_id` int NOT NULL,
	`field_name` varchar(100) NOT NULL,
	`field_value` TEXT(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
	`id` int NOT NULL AUTO_INCREMENT UNIQUE,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `quote_type` (
	`id` int NOT NULL AUTO_INCREMENT UNIQUE,
	`name` varchar(100) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

ALTER TABLE `quotes` ADD CONSTRAINT `quotes_fk0` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`);

ALTER TABLE `quotes` ADD CONSTRAINT `quotes_fk1` FOREIGN KEY (`quote_type`) REFERENCES `quote_type`(`id`);

ALTER TABLE `quote_field` ADD CONSTRAINT `quote_field_fk0` FOREIGN KEY (`quote_id`) REFERENCES `quotes`(`id`);



INSERT INTO quote_type (name) VALUES ("flight"), ("cruise"), ("hotel"), ("carrental"), ("travelinsurance"), ("travelpackage");