-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2012 at 07:54 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9282721_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `models_youtube`
--

CREATE TABLE `models_youtube` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL DEFAULT '0',
  `video_name` mediumtext,
  `url_youtube` mediumtext,
  `add_date` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_models_youtube_model` (`model_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `models_youtube`
--

INSERT INTO `models_youtube` VALUES(1, 2, 'nombre_video_1', 'http://www.youtube.com/watch?v=rPdNn9ov7WI&list=PLB6C99C6288350923&index=1&feature=plpp_video', 1325912400, 1);
INSERT INTO `models_youtube` VALUES(2, 2, 'nombre_video_2', 'http://www.youtube.com/watch?v=jRXr1hWwtV4&list=PLB6C99C6288350923&index=2&feature=plpp_video', 1325912403, 1);
INSERT INTO `models_youtube` VALUES(3, 2, 'nombre_video_3', 'http://www.youtube.com/watch?v=fiinMUB25TQ&list=PLB6C99C6288350923&index=3&feature=plpp_video', 1325912402, 1);
INSERT INTO `models_youtube` VALUES(4, 7, 'nombre_video_4', 'http://www.youtube.com/watch?v=rPdNn9ov7WI&feature=autoplay&list=PLB6C99C6288350923&lf=plpp_video&playnext=1', 1325912403, 1);
INSERT INTO `models_youtube` VALUES(5, 7, 'nombre_video_5', 'http://www.youtube.com/watch?v=9GJudICeU5c', 1325912402, 1);
INSERT INTO `models_youtube` VALUES(6, 7, 'nombre_video_6', 'http://www.youtube.com/watch?v=wFA3JNPsxUY', 1325912405, 1);
INSERT INTO `models_youtube` VALUES(7, 15, 'nombre_video_7', 'http://www.youtube.com/watch?v=vgfNSVNyjjg', 1325912406, 1);
INSERT INTO `models_youtube` VALUES(8, 15, 'nombre_video_8', 'http://www.youtube.com/watch?v=OpCyNy1c9YA', 1325912407, 1);
INSERT INTO `models_youtube` VALUES(9, 14, 'nombre_video_9', 'http://www.youtube.com/watch?v=aNu0FDxJezo', 1325912408, 1);
INSERT INTO `models_youtube` VALUES(10, 14, 'nombre_video_10', 'http://www.youtube.com/watch?v=8bHfpnHGT4c', 1325912409, 1);
INSERT INTO `models_youtube` VALUES(11, 16, 'nombre_video_11', 'http://www.youtube.com/watch?v=qmhkdMHOceE', 1325912410, 1);
INSERT INTO `models_youtube` VALUES(12, 16, 'nombre_video_12', 'http://www.youtube.com/watch?v=ghIn7A5x74I', 1325912408, 1);
