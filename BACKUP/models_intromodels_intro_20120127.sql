-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2012 at 07:50 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9282721_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `models_intro`
--

CREATE TABLE `models_intro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `photo_name` mediumtext,
  `url_photo` mediumtext,
  `add_date` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `models_intro`
--

INSERT INTO `models_intro` VALUES(1, 'photo_name_1', 'Imag_01.jpg', 1325912400, 1);
INSERT INTO `models_intro` VALUES(2, 'photo_name_2', 'Imag_02.jpg', 1325912403, 1);
INSERT INTO `models_intro` VALUES(3, 'photo_name_3', 'Imag_03.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(4, 'photo_name_4', 'Imag_04.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(5, 'photo_name_5', 'Imag_05.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(6, 'photo_name_6', 'Imag_06.jpg', 1325912402, 1);
