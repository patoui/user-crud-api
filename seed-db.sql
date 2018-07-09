# Dump of table user_addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_addresses`;

CREATE TABLE `user_addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_addresses` WRITE;

INSERT INTO `user_addresses` (`id`, `user_id`, `address`, `province`, `city`, `country`, `postal_code`)
VALUES
	(1,1,'123 fake street','Ontario','Ottawa','Canada','123 w4t'),
	(2,2,'123 queen street','Quebec','Gatineau','Canada','123 tdf'),
	(3,3,'123 major road','Ontariofdgdgdfg','Ottawa','Canada','145 w4t'),
	(4,4,'123 blue street','Ontario','Ottawa','Canada','145 lpo');

UNLOCK TABLES;

# Dump of table user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_roles` WRITE;

INSERT INTO `user_roles` (`id`, `label`)
VALUES
	(1,'Admin'),
	(2,'Publisher'),
	(3,'Public User');

UNLOCK TABLES;

# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_roles_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;

INSERT INTO `users` (`id`, `user_roles_id`, `username`, `email`, `created_at`, `updated_at`)
VALUES
	(1,1,'I_Admin','admin@test.com','2017-05-20 12:42:53','2017-05-20 12:42:53'),
	(2,2,'I_Publish','publisher@test.com','2017-05-20 13:05:53','2017-05-22 15:08:53'),
	(3,3,'I_Use','user@test.com','2017-05-21 13:05:53','2017-05-21 13:05:53'),
	(4,3,'I_Use_Too','user2@test.com','2017-05-22 14:05:53','2017-05-22 14:05:53');

UNLOCK TABLES;
