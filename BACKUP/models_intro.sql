-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2012 at 05:10 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `models_intro`
--

INSERT INTO `models_intro` VALUES(1, 'intro_1325912400', 'Imag_01.jpg', 1325912400, 1);
INSERT INTO `models_intro` VALUES(2, 'intro_1325912401', 'Imag_02.jpg', 1325912403, 1);
INSERT INTO `models_intro` VALUES(3, 'intro_1325912402', 'Imag_03.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(4, 'intro_1325912403', 'Imag_04.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(5, 'intro_1325912404', 'Imag_05.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(6, 'intro_1325912405', 'Imag_06.jpg', 1325912402, 1);
INSERT INTO `models_intro` VALUES(20, 'intro_1329951671', 'intro_1329951671.jpg', 1329951671, 1);
