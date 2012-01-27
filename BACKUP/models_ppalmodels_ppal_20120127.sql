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
-- Table structure for table `models_ppal`
--

CREATE TABLE `models_ppal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL DEFAULT '0',
  `photo_name` mediumtext,
  `url_photo` mediumtext,
  `add_date` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_models_ppal_model` (`model_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `models_ppal`
--

INSERT INTO `models_ppal` VALUES(1, 1, 'photo_name_1', '1Plano_Adinda.jpg', 1325912400, 1);
INSERT INTO `models_ppal` VALUES(34, 34, 'Macarena', '1Plano-Macarena.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(2, 2, 'photo_name_2', '1Plano_Ainhoa.jpg', 1325912403, 1);
INSERT INTO `models_ppal` VALUES(3, 3, 'AlaMalek', '1Plano_AlaMalek.jpg', 1325912402, 1);
INSERT INTO `models_ppal` VALUES(33, 33, 'LuciaAycart', '1Plano-LuciaAycart.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(4, 4, 'photo_name_4', '1Plano_AliciaMata.jpg', 1325912403, 1);
INSERT INTO `models_ppal` VALUES(5, 5, 'photo_name_5', '1Plano_AmaliaAresu.jpg', 1325912402, 1);
INSERT INTO `models_ppal` VALUES(32, 32, 'Lena', '1Plano-Lena.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(6, 6, 'photo_name_6', '1Plano_AnaCorbi.jpg', 1325912405, 1);
INSERT INTO `models_ppal` VALUES(7, 7, 'photo_name_7', '1Plano_AndreaFrosstrom.jpg', 1325912406, 1);
INSERT INTO `models_ppal` VALUES(31, 31, 'Kristin', '1Plano-Kristin.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(8, 8, 'photo_name_8', '1Plano_Andreina.jpg', 1325912407, 1);
INSERT INTO `models_ppal` VALUES(9, 9, 'photo_name_9', '1Plano_Aura.jpg', 1325912408, 1);
INSERT INTO `models_ppal` VALUES(30, 30, 'Katarzyna', '1Plano-Katarzyna.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(10, 10, 'photo_name_10', '1Plano_BarbaraT.jpg', 1325912410, 1);
INSERT INTO `models_ppal` VALUES(11, 11, 'photo_name_11', '1Plano_Blanka.jpg', 1325912408, 1);
INSERT INTO `models_ppal` VALUES(29, 29, 'Kasia', '1Plano-Kasia.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(12, 12, 'photo_name_12', '1Plano_Christien.jpg', 1325912403, 1);
INSERT INTO `models_ppal` VALUES(13, 13, 'photo_name_13', '1Plano_CristinaSanchez.jpg', 1325912402, 1);
INSERT INTO `models_ppal` VALUES(28, 28, 'KaisaL', '1Plano-KaisaL.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(14, 14, 'photo_name_14', '1Plano_CristinaSidera.jpg', 1325912403, 1);
INSERT INTO `models_ppal` VALUES(15, 15, 'photo_name_15', '1Plano_DenisaMatei.jpg', 1325912402, 1);
INSERT INTO `models_ppal` VALUES(16, 16, 'photo_name_16', '1Plano_Ekaterina.jpg', 1325912405, 1);
INSERT INTO `models_ppal` VALUES(27, 27, 'JessicaAlejo', '1Plano-JessicaAlejo.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(17, 17, 'photo_name_17', '1Plano_ElenaCimarro.jpg', 1325912403, 1);
INSERT INTO `models_ppal` VALUES(18, 18, 'photo_name_18', '1Plano_ElenaUrucatu.jpg', 1325912402, 1);
INSERT INTO `models_ppal` VALUES(26, 26, 'janina', '1Plano-Janina.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(19, 19, 'photo_name_19', '1Plano_ElisM.jpg', 1325912403, 1);
INSERT INTO `models_ppal` VALUES(20, 20, 'photo_name_20', '1Plano_Erika.jpg', 1325912402, 1);
INSERT INTO `models_ppal` VALUES(21, 21, 'photo_name_21', '1Plano_FlorentaPopa.jpg', 1325912405, 1);
INSERT INTO `models_ppal` VALUES(25, 25, 'IrmaMonroig', '1Plano-IrmaMonroig.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(22, 22, 'photo_name_22', '1Plano-GabrielaKutti.jpg', 1325912406, 1);
INSERT INTO `models_ppal` VALUES(23, 23, 'photo_name_23', '1Plano-InesFabra.jpg', 1325912407, 1);
INSERT INTO `models_ppal` VALUES(24, 24, 'inesPardo', '1Plano-InesPardo.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(35, 35, 'MadeleneNord', '1Plano-MadeleneNord.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(36, 36, 'MJoseGallego', '1Plano-MJoseGallego.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(37, 37, 'MartaS', '1Plano-MartaS.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(38, 38, 'Martina', '1Plano-Martina.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(39, 39, 'Marysia', '1Plano-Marysia.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(40, 40, 'NataliaH', '1Plano-NataliaH.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(41, 41, 'NathalieWolk', '1Plano-NathalieWolk.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(42, 42, 'NicoletaT', '1Plano-NicoletaT.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(43, 43, 'PaulaGonzalez', '1Plano-PaulaGonzalez.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(44, 44, 'PaulaSemikozova', '1Plano-PaulaSemikozova.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(45, 45, 'RailiV', '1Plano-RailiV.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(46, 46, 'Rebeca', '1Plano-Rebeca.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(47, 47, 'Roxana', '1Plano-Roxana.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(48, 48, 'Sarah', '1Plano-Sarah.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(49, 49, 'SaraMaria', '1Plano-SaraMaria.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(50, 50, 'Sarka', '1Plano-Sarka.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(51, 51, 'SofiaLecina', '1Plano-SofiaLecina.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(52, 52, 'StefanySen', '1Plano-StefanySen.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(53, 53, 'TuvaHeger', '1Plano-TuvaHeger.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(54, 54, 'Ulla', '1Plano-Ulla.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(55, 55, 'VirginiaGonzalez', '1Plano-VirginiaGonzalez.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(56, 56, 'ZuzanaPavlu', '1Plano-ZuzanaPavlu.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(57, 57, 'AnneVan', '1Plano_AnneVan.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(58, 58, 'Jolien', '1Plano_Jolien.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(59, 59, 'Marte', '1Plano_Marte.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(60, 60, 'NaomiShimado', '1Plano_NaomiShimado.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(61, 61, 'Adan', '1Plano-Adan.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(62, 62, 'Alejandro', '1Plano-Alejandro.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(63, 63, 'Billy', '1Plano-Billy.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(64, 64, 'CarlosArellano', '1Plano-CarlosArellano.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(65, 65, 'DanSayer', '1Plano-DanSayer.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(66, 66, 'Dimitri', '1Plano-Dimitri.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(67, 67, 'FedeCortes', '1Plano-FedeCortes.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(68, 68, 'JamesGrant', '1Plano-JamesGrant.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(69, 69, 'Jokin', '1Plano-Jokin.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(70, 70, 'JonathanMahau', '1Plano-JonathanMahau.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(71, 71, 'JoseMartin', '1Plano-JoseMartin.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(72, 72, 'LeonardoMarques', '1Plano-LeonardoMarques.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(73, 73, 'LewisJ', '1Plano-LewisJ.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(74, 74, 'Lliso', '1Plano-Lliso.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(75, 75, 'MatthewPoile', '1Plano-MatthewPoile.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(76, 76, 'MichaelS', '1Plano-MichaelS.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(77, 77, 'Nick', '1Plano-Nick.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(78, 78, 'Nicolo', '1Plano-Nicolo.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(79, 79, 'OllyB', '1Plano-OllyB.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(80, 80, 'Onofre', '1Plano-Onofre.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(81, 81, 'PauVives', '1Plano-PauVives.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(82, 82, 'PavelB', '1Plano-PavelB.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(83, 83, 'Pete', '1Plano-Pete.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(84, 84, 'PhilippM', '1Plano-PhilippM.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(85, 85, 'Raphael', '1Plano-Raphael.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(86, 86, 'RobertAlewell', '1Plano-RobertAlewell.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(87, 87, 'SaintBeau', '1Plano-SaintBeau.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(88, 88, 'SamuelSalvio', '1Plano-SamuelSalvio.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(89, 89, 'Scott', '1Plano-Scott.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(90, 90, 'TobiasW', '1Plano-TobiasW.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(91, 91, 'VinicciusM', '1Plano-VinicciusM.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(92, 92, 'XaviAcero', '1Plano-XaviAcero.jpg', 0, 1);
INSERT INTO `models_ppal` VALUES(93, 93, 'Zeus', '1Plano-Zeus.jpg', 0, 1);
