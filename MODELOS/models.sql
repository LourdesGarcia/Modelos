CREATE DATABASE  `models_proyect` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

DROP TABLE IF EXISTS `models_model`;
DROP TABLE IF EXISTS `models_youtube`;
DROP TABLE IF EXISTS `models_photos`;
DROP TABLE IF EXISTS `models_admin`;
DROP TABLE IF EXISTS `models_log`;
DROP TABLE IF EXISTS `models_intro`;


CREATE TABLE `models_model` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` mediumtext collate utf8_general_ci,
  `last_name` mediumtext collate utf8_general_ci,
  `address` mediumtext collate utf8_general_ci,
  `zip_code` int(5) NOT NULL DEFAULT "0",
  `city` mediumtext collate utf8_general_ci,
  `phone_number` int(9) NOT NULL DEFAULT "0",
  `the_state` mediumtext collate utf8_general_ci,
  `mobile` int(9) NOT NULL DEFAULT "0",
  `email` mediumtext collate utf8_general_ci, 
  `gender` mediumtext collate utf8_general_ci,
  `age` mediumtext collate utf8_general_ci,
  `hair_color` mediumtext collate utf8_general_ci,
  `eyes_color` mediumtext collate utf8_general_ci,
  `height` mediumtext collate utf8_general_ci,
  `bust` mediumtext collate utf8_general_ci,	/* female */
  `hips` mediumtext collate utf8_general_ci,	/* female */
  `waist` mediumtext collate utf8_general_ci,	/* both */
  `collar` mediumtext collate utf8_general_ci,	/* male */
  `chest` mediumtext collate utf8_general_ci,	/* male */
  `url_headshot_photo` mediumtext collate utf8_general_ci,	/* male */
  `url_full_length_photo` mediumtext collate utf8_general_ci,	/* male */
  `model_type` mediumtext collate utf8_general_ci,	/* women, men, special */
  `add_date` int(11) NOT NULL DEFAULT "0",
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_youtube` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`model_id` int(10) NOT NULL DEFAULT "0",
		`video_name` mediumtext collate utf8_general_ci,
		`url_youtube` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
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
        PRIMARY KEY  (`id`),
		CONSTRAINT `FK_models_photos_model` FOREIGN KEY (`model_id`) REFERENCES `models_model` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_admin` (				/*esta tabla no se como debe ser*/
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


CREATE TABLE `models_log` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `request_type` mediumtext COLLATE utf8_general_ci,
        `log_data` text COLLATE utf8_general_ci,
        `add_date` int(11) NOT NULL DEFAULT "0",
        PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `models_intro` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
		`url_photo` mediumtext collate utf8_general_ci,
		`add_date` int(11) NOT NULL DEFAULT "0",
        PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



/* MODELOS DE PRUEBA */
INSERT INTO models_model (first_name,last_name,address,zip_code,city,phone_number,the_state,mobile,email,gender,age,hair_color,eyes_color,height,bust,hips,waist,collar,chest,url_headshot_photo,url_full_length_photo,model_type,add_date)
VALUES ("Ana","Lopez","calle de la Luz 34","25802","Madrid",917896541,"España",621236547,"ana.lopez@gmail.com","female","21 años","pelo rubio","ojos negros","1.80 m","85","65","95","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","women",1325912400),
("Alba","Gonzalez","calle de lo que sea 8","28026","Madrid",917896541,"España",621237547,"alba.gonzalez@gmail.com","female","21 años","pelo rubio","ojos negros","1.80 m","85","65","95","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","women",1325912400),
("Maria","Salvatore","calle de lo que sea 7","28026","Madrid",917796241,"España",691237547,"maria.salvatore@gmail.com","female","19 años","pelo negro","ojos marrones","175 cm","75","60","100","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","women",1325912400),
("Sandra","Gutierrez","avenida de la loca 4","28026","Madrid",917896541,"España",621237547,"sandra.gutierrez@gmail.com","female","21 años","pelo rubio","ojos negros","1.80 m","85","65","95","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","women",1325912400),
("Laura","Martin","plaza de la gorda","28076","Madrid",927896541,"España",621837547,"laura.martin@gmail.com","female","28 años","pelo castaño","ojos verdes","1.81","80","65","85","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","women",1325912400),
("Jimena","Fernandez","calle de la buena suerte","28126","Madrid",917896571,"España",621237547,"jimena.fernandez@gmail.com","female","22 años","pelo rubio","ojos marrones","1.90 m","95","65","90","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","women",1325912400),
("Fernando","Blanco","avenida de mi nombre","28826","Madrid",919896571,"España",62127547,"fernando.blanco@gmail.com","male","25 años","pelo rubio","ojos negros","1.90 m","","","90","40","102","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","men",1325912400),
("Joaquin","Cabada","calle de un ejemplo","28226","Madrid",917896577,"España",621237847,"joaquin.cabada@gmail.com","male","27 años","pelo castaño","ojos verdes","1.96 m","","","85","42","100","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","men",1325912400),
("Miguel","Saura","calle de lo que sea 10","28002","Madrid",917896545,"España",621237545,"miguel.saura@gmail.com","male","28 años","pelo castaño","ojos marrones","1.80 m","","","85","38","105","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","men",1325912400),
("Mauricio","Escudero","calle de lo inutil","28022","Madrid",917898547,"España",621237547,"mauricio.escudero@gmail.com","male","28 años","pelo rubio","ojos negros","1.80 m","","","80","40","100","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","men",1325912400),
("Pedro","Sanchez","avenida del olvido 4","28026","Madrid",917796541,"España",671237547,"pedro.sanchez@gmail.com","male","22 años","pelo negro","ojos negros","1.90 m","","","85","42","103","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","men",1325912400),
("Marta","Arévalo","calle de la vida 55","28020","Madrid",917796548,"España",621237588,"marta.arevalo@gmail.com","female","27 años","pelo rubio","ojos negros","1.80 m","89","55","90","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","special_booking",1325912400),
("Julio","Jimenez","calle de las muelas","28026","Madrid",917896541,"España",621237547,"julio.jimenez@gmail.com","male","22 años","pelo castaño","ojos negros","1.88 m","","","95","42","103","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","special_booking",1325912400),
("Jaime","Ozores","calle del pesado de al lado","28186","Madrid",918896541,"España",687237547,"jaime.ozores@gmail.com","male","28 años","pelo moreno","ojos negros","1.90 m","","","90","41","98","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","special_booking",1325912400),
("Alberto","Gonzalez","avenida nueva","28029","Madrid",917896549,"España",651237547,"alberto.gonzalez@gmail.com","male","28 años","pelo rubio","ojos negros","1.80 m","","","85","36","98","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","men",1325912400),
("Aroa","Valverde","calle de lo que sea 55","28028","Madrid",917896961,"España",621887547,"aroa.valverde@gmail.com","female","29 años","pelo castaño","ojos negros","1.80 m","85","65","95","","","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/ppal_adinda.jpg","special_booking",1325912400);

INSERT INTO models_youtube (model_id,video_name,url_youtube,add_date)
VALUES (2,"nombre_video_1","http://www.youtube.com/watch?v=rPdNn9ov7WI&list=PLB6C99C6288350923&index=1&feature=plpp_video",1325912400),
(2,"nombre_video_2","http://www.youtube.com/watch?v=jRXr1hWwtV4&list=PLB6C99C6288350923&index=2&feature=plpp_video",1325912403),
(2,"nombre_video_3","http://www.youtube.com/watch?v=fiinMUB25TQ&list=PLB6C99C6288350923&index=3&feature=plpp_video",1325912402),
(7,"nombre_video_4","http://www.youtube.com/watch?v=rPdNn9ov7WI&feature=autoplay&list=PLB6C99C6288350923&lf=plpp_video&playnext=1",1325912403),
(7,"nombre_video_5","http://www.youtube.com/watch?v=9GJudICeU5c",1325912402),
(7,"nombre_video_6","http://www.youtube.com/watch?v=wFA3JNPsxUY",1325912405),
(15,"nombre_video_7","http://www.youtube.com/watch?v=vgfNSVNyjjg",1325912406),
(15,"nombre_video_8","http://www.youtube.com/watch?v=OpCyNy1c9YA",1325912407),
(14,"nombre_video_9","http://www.youtube.com/watch?v=aNu0FDxJezo",1325912408),
(14,"nombre_video_10","http://www.youtube.com/watch?v=8bHfpnHGT4c",1325912409),
(16,"nombre_video_11","http://www.youtube.com/watch?v=qmhkdMHOceE",1325912410),
(16,"nombre_video_12","http://www.youtube.com/watch?v=ghIn7A5x74I",1325912408);

INSERT INTO models_photos (model_id,photo_name,url_photo,url_thumbnail,add_date)
VALUES (2,"photo_name_1","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda01.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda01.jpg",1325912400),
(2,"photo_name_2","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda02.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda02.jpg",1325912403),
(2,"photo_name_3","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda03.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda03.jpg",1325912402),
(7,"photo_name_4","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda04.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda04.jpg",1325912403),
(7,"photo_name_5","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda05.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda05.jpg",1325912402),
(15,"photo_name_6","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda06.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda06.jpg",1325912405),
(14,"photo_name_7","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda07.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda07.jpg",1325912406),
(15,"photo_name_8","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda08.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda08.jpg",1325912407),
(16,"photo_name_9","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda09.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda01.jpg",1325912408),
(14,"photo_name_10","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda10.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda10.jpg",1325912410),
(16,"photo_name_11","http://www.rociolourdes.hostoi.com/imagesmodel/book_adinda11.jpg","http://www.rociolourdes.hostoi.com/imagesmodel/mini_adinda11.jpg",1325912408);

