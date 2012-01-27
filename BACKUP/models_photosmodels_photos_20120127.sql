-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2012 at 07:52 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9282721_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `models_photos`
--

CREATE TABLE `models_photos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL DEFAULT '0',
  `photo_name` mediumtext,
  `url_photo` mediumtext,
  `url_thumbnail` mediumtext,
  `add_date` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_models_photos_model` (`model_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `models_photos`
--

INSERT INTO `models_photos` VALUES(1, 2, 'photo_name_1', 'book_adinda01.jpg', 'mini_adinda01.jpg', 1325912400, 1);
INSERT INTO `models_photos` VALUES(2, 2, 'photo_name_2', 'book_adinda02.jpg', 'mini_adinda02.jpg', 1325912403, 1);
INSERT INTO `models_photos` VALUES(3, 2, 'photo_name_3', 'book_adinda03.jpg', 'mini_adinda03.jpg', 1325912402, 1);
INSERT INTO `models_photos` VALUES(4, 7, 'photo_name_4', 'book_adinda04.jpg', 'mini_adinda04.jpg', 1325912403, 1);
INSERT INTO `models_photos` VALUES(5, 7, 'photo_name_5', 'book_adinda05.jpg', 'mini_adinda05.jpg', 1325912402, 1);
INSERT INTO `models_photos` VALUES(6, 15, 'photo_name_6', 'book_adinda06.jpg', 'mini_adinda06.jpg', 1325912405, 1);
INSERT INTO `models_photos` VALUES(7, 14, 'photo_name_7', 'book_adinda07.jpg', 'mini_adinda07.jpg', 1325912406, 1);
INSERT INTO `models_photos` VALUES(8, 15, 'photo_name_8', 'book_adinda08.jpg', 'mini_adinda08.jpg', 1325912407, 1);
INSERT INTO `models_photos` VALUES(9, 16, 'photo_name_9', 'book_adinda09.jpg', 'mini_adinda09.jpg', 1325912408, 1);
INSERT INTO `models_photos` VALUES(10, 14, 'photo_name_10', 'book_adinda10.jpg', 'mini_adinda10.jpg', 1325912410, 1);
INSERT INTO `models_photos` VALUES(11, 16, 'photo_name_11', 'book_adinda11.jpg', 'mini_adinda11.jpg', 1325912408, 1);
