
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2012 at 07:49 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9282721_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `models_composite`
--

CREATE TABLE `models_composite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL DEFAULT '0',
  `composite_name` mediumtext,
  `url_composite` mediumtext,
  `add_date` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `models_composite`
--

INSERT INTO `models_composite` VALUES(1, 2, 'composite_name_1', 'composite01.zip', 1325912400, 1);
INSERT INTO `models_composite` VALUES(2, 7, 'composite_name_2', 'composite02.zip', 1325912403, 1);
INSERT INTO `models_composite` VALUES(3, 14, 'composite_name_3', 'composite03.zip', 1325912402, 1);
INSERT INTO `models_composite` VALUES(4, 15, 'composite_name_4', 'composite04.zip', 1325912403, 1);
INSERT INTO `models_composite` VALUES(5, 16, 'composite_name_5', 'composite05.zip', 1325912402, 1);
