CREATE DATABASE  `models_proyect` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

DROP TABLE IF EXISTS `models_model`;
DROP TABLE IF EXISTS `models_youtube`;
DROP TABLE IF EXISTS `models_photos`;
DROP TABLE IF EXISTS `models_ppal`;
/*DROP TABLE IF EXISTS `models_admin`;*/
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
  /*`url_headshot_photo` mediumtext collate utf8_general_ci,	
  `url_full_length_photo` mediumtext collate utf8_general_ci,*/
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

/*CREATE TABLE `models_admin` (			
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` mediumtext collate utf8_general_ci,
  `last_name` mediumtext collate utf8_general_ci,
  `city` mediumtext collate utf8_general_ci,
  `phone_number` int(9) NOT NULL DEFAULT "0",
  `mobile` int(9) NOT NULL DEFAULT "0",
  `email` mediumtext collate utf8_general_ci,
  `password` mediumtext collate utf8_general_ci,
  `user_name` mediumtext collate utf8_general_ci,
  `add_date` int(11) NOT NULL DEFAULT "0",
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
*/

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



/* MODELOS DE PRUEBA */
INSERT INTO models_model (first_name,last_name,gender,age,shoe_size,hair_color,eyes_color,height,bust,hips,waist,collar,chest,model_type,add_date,active)
VALUES ("Ana","Lopez","female","21 años","talla 38","pelo rubio","ojos negros","1.80 m","85","65","95","","","women",1325912400,1),
("Alba","Gonzalez","female","21 años","talla 37","pelo rubio","ojos negros","1.80 m","85","65","95","","","women",1325912400,1),
("Maria","Salvatore","female","19 años","talla 40","pelo negro","ojos marrones","175 cm","75","60","100","","","women",1325912400,1),
("Sandra","Gutierrez","female","21 años","talla 40","pelo rubio","ojos negros","1.80 m","85","65","95","","","women",1325912400,1),
("Laura","Martin","female","28 años","talla 40","pelo castaño","ojos verdes","1.81","80","65","85","","","women",1325912400,1),
("Jimena","Fernandez","female","22 años","talla 40","pelo rubio","ojos marrones","1.90 m","95","65","90","","","women",1325912400,1),
("Fernando","Blanco","male","25 años","talla 40","pelo rubio","ojos negros","1.90 m","","","90","40","102","men",1325912400,1),
("Joaquin","Cabada","male","27 años","talla 40","pelo castaño","ojos verdes","1.96 m","","","85","42","100","men",1325912400,1),
("Miguel","Saura","male","28 años","talla 40","pelo castaño","ojos marrones","1.80 m","","","85","38","105","men",1325912400,1),
("Mauricio","Escudero","male","28 años","talla 40","pelo rubio","ojos negros","1.80 m","","","80","40","100","men",1325912400,1),
("Pedro","Sanchez","male","22 años","talla 41","pelo negro","ojos negros","1.90 m","","","85","42","103","men",1325912400,1),
("Marta","Arévalo","female","27 años","talla 40","pelo rubio","ojos negros","1.80 m","89","55","90","","","special_booking",1325912400,1),
("Julio","Jimenez","male","22 años","talla 40","pelo castaño","ojos negros","1.88 m","","","95","42","103","special_booking",1325912400,1),
("Jaime","Ozores","male","28 años","talla 40","pelo moreno","ojos negros","1.90 m","","","90","41","98","special_booking",1325912400,1),
("Alberto","Gonzalez","male","28 años","talla 40","pelo rubio","ojos negros","1.80 m","","","85","36","98","men",1325912400,1),
("Aroa","Valverde","female","29 años","talla 40","pelo castaño","ojos negros","1.80 m","85","65","95","","","special_booking",1325912400,1);

INSERT INTO models_youtube (model_id,video_name,url_youtube,add_date,active)
VALUES (2,"nombre_video_1","http://www.youtube.com/watch?v=rPdNn9ov7WI&list=PLB6C99C6288350923&index=1&feature=plpp_video",1325912400,1),
(2,"nombre_video_2","http://www.youtube.com/watch?v=jRXr1hWwtV4&list=PLB6C99C6288350923&index=2&feature=plpp_video",1325912403,1),
(2,"nombre_video_3","http://www.youtube.com/watch?v=fiinMUB25TQ&list=PLB6C99C6288350923&index=3&feature=plpp_video",1325912402,1),
(7,"nombre_video_4","http://www.youtube.com/watch?v=rPdNn9ov7WI&feature=autoplay&list=PLB6C99C6288350923&lf=plpp_video&playnext=1",1325912403,1),
(7,"nombre_video_5","http://www.youtube.com/watch?v=9GJudICeU5c",1325912402,1),
(7,"nombre_video_6","http://www.youtube.com/watch?v=wFA3JNPsxUY",1325912405,1),
(15,"nombre_video_7","http://www.youtube.com/watch?v=vgfNSVNyjjg",1325912406,1),
(15,"nombre_video_8","http://www.youtube.com/watch?v=OpCyNy1c9YA",1325912407,1),
(14,"nombre_video_9","http://www.youtube.com/watch?v=aNu0FDxJezo",1325912408,1),
(14,"nombre_video_10","http://www.youtube.com/watch?v=8bHfpnHGT4c",1325912409,1),
(16,"nombre_video_11","http://www.youtube.com/watch?v=qmhkdMHOceE",1325912410,1),
(16,"nombre_video_12","http://www.youtube.com/watch?v=ghIn7A5x74I",1325912408,1);

INSERT INTO models_ppal (model_id,photo_name,url_photo,add_date,active)
VALUES (1,"photo_name_1","ppal_adinda.jpg",1325912400,1),
(2,"photo_name_2","ppal_adinda.jpg",1325912403,1),
(3,"photo_name_3","ppal_adinda.jpg",1325912402,1),
(4,"photo_name_4","ppal_adinda.jpg",1325912403,1),
(5,"photo_name_5","ppal_adinda.jpg",1325912402,1),
(6,"photo_name_6","ppal_adinda.jpg",1325912405,1),
(7,"photo_name_7","ppal_adinda.jpg",1325912406,1),
(8,"photo_name_8","ppal_adinda.jpg",1325912407,1),
(9,"photo_name_9","ppal_adinda.jpg",1325912408,1),
(10,"photo_name_10","ppal_adinda.jpg",1325912410,1),
(11,"photo_name_11","ppal_adinda.jpg",1325912408,1),
(12,"photo_name_12","ppal_adinda.jpg",1325912403,1),
(13,"photo_name_13","ppal_adinda.jpg",1325912402,1),
(14,"photo_name_14","ppal_adinda.jpg",1325912403,1),
(15,"photo_name_15","ppal_adinda.jpg",1325912402,1),
(16,"photo_name_16","ppal_adinda.jpg",1325912405,1);

INSERT INTO models_photos (model_id,photo_name,url_photo,url_thumbnail,add_date,active)
VALUES (2,"photo_name_1","book_adinda01.jpg","mini_adinda01.jpg",1325912400,1),
(2,"photo_name_2","book_adinda02.jpg","mini_adinda02.jpg",1325912403,1),
(2,"photo_name_3","book_adinda03.jpg","mini_adinda03.jpg",1325912402,1),
(7,"photo_name_4","book_adinda04.jpg","mini_adinda04.jpg",1325912403,1),
(7,"photo_name_5","book_adinda05.jpg","mini_adinda05.jpg",1325912402,1),
(15,"photo_name_6","book_adinda06.jpg","mini_adinda06.jpg",1325912405,1),
(14,"photo_name_7","book_adinda07.jpg","mini_adinda07.jpg",1325912406,1),
(15,"photo_name_8","book_adinda08.jpg","mini_adinda08.jpg",1325912407,1),
(16,"photo_name_9","book_adinda09.jpg","mini_adinda09.jpg",1325912408,1),
(14,"photo_name_10","book_adinda10.jpg","mini_adinda10.jpg",1325912410,1),
(16,"photo_name_11","book_adinda11.jpg","mini_adinda11.jpg",1325912408,1);

INSERT INTO models_composite (model_id,composite_name,url_composite,add_date,active)
VALUES (2,"composite_name_1","composite01.zip",1325912400,1),
(7,"composite_name_2","composite02.zip",1325912403,1),
(14,"composite_name_3","composite03.zip",1325912402,1),
(15,"composite_name_4","composite04.zip",1325912403,1),
(16,"composite_name_5","composite05.zip",1325912402,1);

INSERT INTO models_intro (photo_name,url_photo, add_date,active)
VALUES ("photo_name_1","intro_01.gif",1325912400,1),
("photo_name_2","intro_02.gif",1325912403,1),
("photo_name_3","intro_03.gif",1325912402,1);
