-- Exportiere Datenbank Struktur für survey
DROP DATABASE IF EXISTS `survey`;
CREATE DATABASE IF NOT EXISTS `survey` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `survey`;


-- Exportiere Struktur von Tabelle survey.survey
DROP TABLE IF EXISTS `survey`;
CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle survey.survey: ~0 rows (ungefähr)
DELETE FROM `survey`;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` (`id`, `name`) VALUES
	(1, 'Welche ist deine liebste Programmiersprache?');
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle survey.surveychoice
DROP TABLE IF EXISTS `surveychoice`;
CREATE TABLE IF NOT EXISTS `surveychoice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `voteCount` int(10) NOT NULL DEFAULT '0',
  `surveyId` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle survey.surveychoice: ~2 rows (ungefähr)
DELETE FROM `surveychoice`;
/*!40000 ALTER TABLE `surveychoice` DISABLE KEYS */;
INSERT INTO `surveychoice` (`id`, `name`, `voteCount`, `surveyId`) VALUES
	(1, 'C++', 1, 1),
	(2, 'PHP', 0, 1),
	(3, 'Java', 0, 1);
/*!40000 ALTER TABLE `surveychoice` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle survey.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle survey.user: ~0 rows (ungefähr)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`) VALUES
	(1, 'patrick', '123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle survey.usersurveychoice
DROP TABLE IF EXISTS `usersurveychoice`;
CREATE TABLE IF NOT EXISTS `usersurveychoice` (
  `choiceId` int(10) NOT NULL,
  `surveyId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  PRIMARY KEY (`choiceId`,`surveyId`,`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
