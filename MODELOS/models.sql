CREATE DATABASE  `models_proyect` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

DROP TABLE IF EXISTS `models_model`;
DROP TABLE IF EXISTS `models_youtube`;
DROP TABLE IF EXISTS `models_photos`;
DROP TABLE IF EXISTS `models_ppal`;
DROP TABLE IF EXISTS `models_log`;
DROP TABLE IF EXISTS `models_intro`;
DROP TABLE IF EXISTS `models_composite`;


CREATE TABLE `models_model` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` mediumtext collate utf8_general_ci,
  `last_name` mediumtext collate utf8_general_ci,
  `gender` mediumtext collate utf8_general_ci,
  `age` mediumtext collate utf8_general_ci,
  `shoe_size` mediumtext collate utf8_general_ci,
  `hair_color` mediumtext collate utf8_general_ci,
  `eyes_color` mediumtext collate utf8_general_ci,
  `height` mediumtext collate utf8_general_ci,
  `bust` mediumtext collate utf8_general_ci,	/* female */
  `hips` mediumtext collate utf8_general_ci,	/* female */
  `waist` mediumtext collate utf8_general_ci,	/* both */
  `collar` mediumtext collate utf8_general_ci,	/* male */
  `chest` mediumtext collate utf8_general_ci,	/* male */
  `model_type` mediumtext collate utf8_general_ci,	/* women, men, special */
  `add_date` int(11) NOT NULL DEFAULT "0",
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_youtube` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`model_id` int(10) NOT NULL DEFAULT "0",
		`video_name` mediumtext collate utf8_general_ci,
		`url_youtube` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
		`active` tinyint(1) DEFAULT '1',
        PRIMARY KEY  (`id`),
		CONSTRAINT `FK_models_youtube_model` FOREIGN KEY (`model_id`) REFERENCES `models_model` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_photos` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`model_id` int(10) NOT NULL DEFAULT "0",
		`photo_name` mediumtext collate utf8_general_ci,
		`url_photo` mediumtext collate utf8_general_ci,
		`url_thumbnail` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
		`active` tinyint(1) DEFAULT '1',
        PRIMARY KEY  (`id`),
		CONSTRAINT `FK_models_photos_model` FOREIGN KEY (`model_id`) REFERENCES `models_model` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_ppal` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`model_id` int(10) NOT NULL DEFAULT "0",
		`photo_name` mediumtext collate utf8_general_ci,
		`url_photo` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
		`active` tinyint(1) DEFAULT '1',
        PRIMARY KEY  (`id`),
		CONSTRAINT `FK_models_ppal_model` FOREIGN KEY (`model_id`) REFERENCES `models_model` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_log` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `request_type` mediumtext COLLATE utf8_general_ci,
        `log_data` text COLLATE utf8_general_ci,
        `add_date` int(11) NOT NULL DEFAULT "0",
        PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_intro` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`photo_name` mediumtext collate utf8_general_ci,
		`url_photo` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
		`active` tinyint(1) DEFAULT '1',
        PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_composite` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`model_id` int(10) NOT NULL DEFAULT "0",
		`composite_name` mediumtext collate utf8_general_ci,
		`url_composite` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
		`active` tinyint(1) DEFAULT '1',
        PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


ALTER TABLE `models_intro` add `selectedOrder` INT(10) NOT NULL DEFAULT "2147483647";	/* valor maximo */

ALTER TABLE `models_photos` add `selectedOrder` INT(10) NOT NULL DEFAULT "2147483647";	/* valor maximo */