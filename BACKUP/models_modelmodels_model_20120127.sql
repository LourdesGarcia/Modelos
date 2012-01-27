-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2012 at 07:51 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9282721_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `models_model`
--

CREATE TABLE `models_model` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` mediumtext,
  `last_name` mediumtext,
  `gender` mediumtext,
  `age` mediumtext,
  `shoe_size` mediumtext,
  `hair_color` mediumtext,
  `eyes_color` mediumtext,
  `height` mediumtext,
  `bust` mediumtext,
  `hips` mediumtext,
  `waist` mediumtext,
  `collar` mediumtext,
  `chest` mediumtext,
  `model_type` mediumtext,
  `add_date` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `models_model`
--

INSERT INTO `models_model` VALUES(1, 'Adinda', '', 'female', '', '39', 'Blonde', 'Green', '1.78', '82', '89', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(2, 'Ainhoa', '', 'female', '', '40', 'Blonde', 'Blue', '1.76', '86', '89', '61', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(3, 'Ala', 'Malek', 'female', '', '39', 'Brown', 'Brown', '1.80', '86', '90', '62', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(4, 'Alicia', 'Mata', 'female', '', '39', 'Brown', 'Brown', '1.78', '86', '88', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(5, 'Amalia', 'Aresu', 'female', '', '40', 'Blonde', 'Blue', '1.77', '84', '90', '62', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(6, 'Ana', 'Corbi', 'female', '', '38', 'Brown', 'Brown', '1.74', '90', '89', '59', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(7, 'Andrea', 'Frosström', 'female', '', '38', 'Brown', 'Brown', '1.77', '83', '90', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(8, 'Andreína', 'Español', 'female', '', '40', 'Brown', 'Black', '1.80', '80', '90', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(9, 'Aura', '', 'female', '', '39', 'Green', 'Blonde', '1.77', '82', '89', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(10, 'Bárbara', 'T', 'female', '', '40', 'Brown', 'Blue', '1.78', '82', '90', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(11, 'Blanka', '', 'female', '', '40', 'Brown', 'Brown', '1.78', '86', '90', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(12, 'Christien', '', 'female', '', '40', 'Blonde', 'Brown', '1.78', '84', '90', '61', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(17, 'Elena', 'Cimarro', 'female', NULL, '39', 'Blonde', 'Green', '1.78', '87', '90', '63', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(13, 'Cristina', 'Sánchez', 'female', '', '40', 'Brown', 'Brown', '1.77', '85', '90', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(14, 'Cristina', 'Sidera', 'female', '', '39', 'Brown', 'Brown', '1.80', '85', '90', '62', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(15, 'Denisa', 'Matei', 'female', '', '38', 'Brown', 'Brown', '1.72', '88', '85', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(16, 'Ekaterina', 'Yuryeva', 'female', '', '40', 'Blonde', 'Blue', '1.78', '85', '90', '60', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(18, 'Elena', 'Urucatu', 'female', NULL, '41', 'Brown', 'Blue', '1.80', '83', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(19, 'Elis', 'M', 'female', NULL, '41', 'Blonde', 'Green', '1.80', '82', '88', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(20, 'Erika', '', 'female', NULL, '41', 'Brown', 'Brown', '1.77', '87', '89', '58', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(21, 'Florenta', 'Popa', 'female', NULL, '39', 'Brown', 'Green', '1.78', '88', '89', '59', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(22, 'Gabriela', 'Kutti', 'female', NULL, '38', 'Brown', 'Brown', '1.73', '83', '87', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(23, 'Inés', 'Fabrá', 'female', '', '40', 'Red Hair', 'Brown', '1.79', '85', '90', '62', '', '', 'women', 1325912400, 1);
INSERT INTO `models_model` VALUES(24, 'Inés', 'Pardo', 'female', NULL, '40', 'Brown', 'Green', '1.78', '83', '89', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(25, 'Irma', 'Monroig', 'female', NULL, '41', 'Brown', 'Brown', '1.76', '90', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(26, 'Janina', NULL, 'female', NULL, '39', 'Brown', 'Brown', '1.77', '86', '89', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(27, 'Jessica', 'Alejo', 'female', NULL, '40', 'Brown', 'Brown', '1.78', '82', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(28, 'Kaisa', 'L', 'female', NULL, '39', 'Blonde', 'Blue', '1.78', '83', '90', '63', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(29, 'Kasia', NULL, 'female', NULL, '40', 'Brown', 'Blue', '1.80', '85', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(30, 'Katarzyna', NULL, 'female', NULL, '39', 'Brown', 'Green', '1.77', '86', '89', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(31, 'Kristin', NULL, 'female', NULL, '41', 'Blonde', 'Blue', '1.80', '81', '89', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(32, 'Lena', NULL, 'female', NULL, '39', 'Blonde', 'Brown', '1.79', '84', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(33, 'Lucía', 'Aycart', 'female', NULL, '40', 'Brown', 'Brown', '1.78', '84', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(34, 'Macarena', NULL, 'female', NULL, '39', 'Blonde', 'Brown', '1.73', '85', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(35, 'Madelene', 'Nord', 'female', NULL, '39', 'Blonde', 'Blue', '1.79', '85', '90', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(36, 'María José', 'Gallego', 'female', NULL, '39', 'Brown', 'Brown', '1.78', '90', '90', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(37, 'Marta', 'S', 'female', NULL, '39', 'Brown', 'Brown', '1.78', '83', '90', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(38, 'Martina', NULL, 'female', NULL, '38', 'Brown', 'Blue', '1.72', '85', '90', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(39, 'Marysia', NULL, 'female', NULL, '40', 'Blonde', 'Blue', '1.77', '85', '90', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(40, 'Natalia', 'H', 'female', NULL, '39', 'Brown', 'Blue', '1.80', '82', '89', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(41, 'Nathalie', 'Wolk', 'female', NULL, '39', 'Brown', 'Brown', '1.78', '83', '89', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(42, 'Nicoleta', 'T', 'female', NULL, '38', 'Dark Blonde', 'Green', '1.76', '85', '89', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(43, 'Paula', 'González', 'female', NULL, '39', 'Dark Black', 'Brown', '1.75', '83', '90', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(44, 'Paula', 'Semikozova', 'female', NULL, '41', 'Blond', 'Green', '1.78', '86', '90', '63', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(45, 'Raili', 'V', 'female', NULL, '41', 'Blonde', 'Green', '1.80', '82', '89', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(46, 'Rebeca', NULL, 'female', NULL, '39', 'Black', 'Black', '1.76', '85', '90', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(47, 'Roxana', NULL, 'female', NULL, '39', 'Black', 'Gray', '1.78', '82', '88', '59', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(48, 'Sarah', '', 'female', NULL, '39', 'Blonde', 'Blue', '1.80', '82', '89', '58', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(49, 'Sara María', '', 'female', NULL, '39', 'Blonde', 'Blue', '1.76', '86', '89', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(50, 'Sarka', NULL, 'female', NULL, '40', 'Brown', 'Brown', '1.79', '85', '90', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(51, 'Sofía', 'Lecina', 'female', NULL, '41', 'Brown', 'Green', '1.79', '89', '90', '62', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(52, 'Stefany', 'Sen', 'female', NULL, '38', 'Brown', 'Brown', '1.78', '82', '88', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(53, 'Tuva', 'Heger', 'female', NULL, '39', 'Blonde', 'Blue', '1.80', '87', '91', '63', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(54, 'Ulla', '', 'female', NULL, '39', 'Blonde', 'Green', '1.78', '84', '90', '61', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(55, 'Virginia', 'González', 'female', NULL, '40', 'Brown', 'Blue', '1.76', '85', '90', '60', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(56, 'Zuzana', 'Pavlu', 'female', NULL, '41', 'Blonde', 'Blue', '1.80', '82', '90', '63', NULL, NULL, 'women', 0, 1);
INSERT INTO `models_model` VALUES(57, 'Anne', 'Van Den Berg', 'female', NULL, '41', 'Brown', 'Green', '1.76', NULL, NULL, NULL, NULL, NULL, 'special_booking', 0, 1);
INSERT INTO `models_model` VALUES(58, 'Jolien', NULL, 'female', NULL, '40', 'Blond', 'Blue', '1.80', '98', '104', '76', NULL, NULL, 'special_booking', 0, 1);
INSERT INTO `models_model` VALUES(59, 'Marte', NULL, 'female', NULL, '41', 'Ginger', 'Blue', '1.80', '94', '101', '73', NULL, NULL, 'special_booking', 0, 1);
INSERT INTO `models_model` VALUES(60, 'Naomi', 'Shimado', 'female', NULL, '40', 'Brown', 'Brown', '1.77', '100', '102', '76', NULL, NULL, 'special_booking', 0, 1);
INSERT INTO `models_model` VALUES(61, 'Adan\r\n', NULL, 'male', NULL, '43', 'Brown', 'Brown', '1.81', NULL, '92', '75', NULL, '94', 'men', 0, 1);
INSERT INTO `models_model` VALUES(62, 'Alejandro', NULL, 'male', NULL, '44', 'Brown', 'Brown', '1.86', NULL, '94', '79', NULL, '98', 'men', 0, 1);
INSERT INTO `models_model` VALUES(63, 'Billy', '', 'male', NULL, '46', 'Brown', 'Brown', '1.85', NULL, '91', '76', NULL, '90', 'men', 0, 1);
INSERT INTO `models_model` VALUES(64, 'Carlos', 'Arellano', 'male', NULL, '44', 'Brown', 'Brown', '1.83', NULL, '95', '77', NULL, '97', 'men', 0, 1);
INSERT INTO `models_model` VALUES(65, 'Dan', 'Sayer', 'male', NULL, '45', 'Brown', 'Green', '1.88', NULL, '94', '81', NULL, '96', 'men', 0, 1);
INSERT INTO `models_model` VALUES(66, 'Dimitri', '', 'male', NULL, '44', 'Brown', 'Green', '1.90', NULL, '94', '80', NULL, '100', 'men', 0, 1);
INSERT INTO `models_model` VALUES(67, 'Fede', 'Cortés', 'male', NULL, '43', 'Brown', 'Green', '1.85', NULL, '95', '76', NULL, '97', 'men', 0, 1);
INSERT INTO `models_model` VALUES(68, 'James', 'Grant', 'male', '', '43', 'Dark Blond', 'Blue', '1.88', NULL, '94', '81', NULL, '96', 'men', 0, 1);
INSERT INTO `models_model` VALUES(69, 'Jokin', NULL, 'male', NULL, '44', 'Brown', 'Blue', '1.85', NULL, '92', '70', NULL, '93', 'men', 0, 1);
INSERT INTO `models_model` VALUES(70, 'Jonathan', 'Mahaut', 'male', NULL, '44', 'Brown', 'Green', '1.88', NULL, '95', '78', NULL, '100', 'men', 0, 1);
INSERT INTO `models_model` VALUES(71, 'José', 'Martín', 'male', NULL, '43', 'Blond', 'Blue', '1.85', NULL, '90', '76', NULL, '93', 'men', 0, 1);
INSERT INTO `models_model` VALUES(72, 'Leonardo', 'Márques', 'male', NULL, '43', 'Brown', 'Brown', '1.88', NULL, '99', '84', NULL, '100', 'men', 0, 1);
INSERT INTO `models_model` VALUES(73, 'Lewis', 'J', 'male', NULL, '43', 'Blond', 'Blue', '1.86', NULL, '93', '81', NULL, '98', 'men', 0, 1);
INSERT INTO `models_model` VALUES(74, 'Lliso', NULL, 'male', NULL, '45', 'Brown', 'Brown', '1.87', NULL, '95', '77', NULL, '98', 'men', 0, 1);
INSERT INTO `models_model` VALUES(75, 'Matthew', 'Poile', 'male', NULL, '44', 'Blonde', 'Blue', '1.88', NULL, '91', '71', NULL, '92', 'men', 0, 1);
INSERT INTO `models_model` VALUES(76, 'Michael', 'S', 'male', NULL, '44', 'Black', 'Brown', '1.87', NULL, '94', '78', NULL, '95', 'men', 0, 1);
INSERT INTO `models_model` VALUES(77, 'Nick', NULL, 'male', NULL, '44', 'Brown', 'Green', '1.80', NULL, '94', '78', NULL, '104', 'men', 0, 1);
INSERT INTO `models_model` VALUES(78, 'Nicolò', NULL, 'male', NULL, '44', 'Brown', 'Brown', '1.84', NULL, '94', '81', NULL, '97', 'men', 0, 1);
INSERT INTO `models_model` VALUES(79, 'Olly', 'B', 'male', NULL, '44', 'Brown', 'Brown', '1.86', NULL, '94', '81', NULL, '99', 'men', 0, 1);
INSERT INTO `models_model` VALUES(80, 'Onofre', 'Contreras', 'male', NULL, '42', 'Brown', 'Green', '1.84', NULL, '95', '77', NULL, '98', 'men', 0, 1);
INSERT INTO `models_model` VALUES(81, 'Pau', 'Vives', 'male', NULL, '44', 'Blond', 'Blue', '1.87', NULL, '97', '76', NULL, '99', 'men', 0, 1);
INSERT INTO `models_model` VALUES(82, 'Pavel', 'Baranov', 'male', NULL, '45', 'Blond', 'Blue', '1.85', NULL, '90', '76', NULL, '93', 'men', 0, 1);
INSERT INTO `models_model` VALUES(83, 'Pete', NULL, 'male', NULL, '45', 'Brown', 'Brown', '1.89', NULL, '94', '74', NULL, '96', 'men', 0, 1);
INSERT INTO `models_model` VALUES(84, 'Philipp', 'Michael', 'male', NULL, '45', 'Dark Blond', 'Blue', '1.88', NULL, '93', '78', NULL, '95', 'men', 0, 1);
INSERT INTO `models_model` VALUES(85, 'Raphael', NULL, 'male', NULL, '42', 'Brown', 'Blue', '1.88', NULL, '93', '72', NULL, '95', 'men', 0, 1);
INSERT INTO `models_model` VALUES(86, 'Robert', 'Alewell', 'male', NULL, '44', 'Blonde', 'Blue', '1.85', NULL, '95', '69', NULL, '98', 'men', 0, 1);
INSERT INTO `models_model` VALUES(87, 'Saint', 'Beau', 'male', NULL, '41', 'Black', 'Black', '1.86', NULL, '91', '76', NULL, '93', 'men', 0, 1);
INSERT INTO `models_model` VALUES(88, 'Samuel', 'Salvio', 'male', NULL, '42', 'Brown', 'Brown', '1.85', NULL, '94', '79', NULL, '98', 'men', 0, 1);
INSERT INTO `models_model` VALUES(89, 'Scott', NULL, 'male', NULL, '43', 'Brown', 'Blue ', '1.81', NULL, '90', '71', NULL, '90', 'men', 0, 1);
INSERT INTO `models_model` VALUES(90, 'Tobías', 'W', 'male', NULL, '43', 'Blond', 'Blue', '1.87', NULL, '94', '76', NULL, '96', 'men', 0, 1);
INSERT INTO `models_model` VALUES(91, 'Viniccius', 'Mayer', 'male', NULL, '42', 'Brown', 'Green ', '1.89', NULL, '92', '72', NULL, '95', 'men', 0, 1);
INSERT INTO `models_model` VALUES(92, 'Xavi', 'Acero', 'male', NULL, '43', 'Brown', 'Brown', '1.93', NULL, '94', '76', NULL, '96', 'men', 0, 1);
INSERT INTO `models_model` VALUES(93, 'Zeus', NULL, 'male', NULL, '45', 'Brown', 'Green', '1.88', NULL, '93', '75', NULL, '95', 'men', 0, 1);
