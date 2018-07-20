-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.0.34-MariaDB-0ubuntu0.16.04.1 - Ubuntu 16.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for university
CREATE DATABASE IF NOT EXISTS `university` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `university`;

-- Dumping structure for table university.degrees
CREATE TABLE IF NOT EXISTS `degrees` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `deleted_on` (`deleted_on`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table university.degrees: ~3 rows (approximately)
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT IGNORE INTO `degrees` (`id`, `name`, `created_on`, `edit_on`, `deleted_on`) VALUES
	(1, 'Bachelor', '2018-07-17 00:59:13', '2018-07-17 00:59:54', '1'),
	(2, 'Master', '2018-07-17 01:00:41', '2018-07-17 01:00:41', '1'),
	(3, 'PhD student', '2018-07-17 01:01:19', '2018-07-17 01:01:19', '1');
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;

-- Dumping structure for table university.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `deleted_on` (`deleted_on`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table university.exams: ~0 rows (approximately)
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT IGNORE INTO `exams` (`id`, `name`, `created_on`, `edit_on`, `deleted_on`) VALUES
	(1, 'Dissertation work', '2018-07-17 01:02:43', '2018-07-17 01:02:43', '1'),
	(2, 'Diploma work', '2018-07-17 01:03:10', '2018-07-17 01:03:35', '1');
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;

-- Dumping structure for table university.professors
CREATE TABLE IF NOT EXISTS `professors` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `deleted_on` (`deleted_on`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table university.professors: ~2 rows (approximately)
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT IGNORE INTO `professors` (`id`, `name`, `created_on`, `edit_on`, `deleted_on`) VALUES
	(1, 'Peter Parker', '2018-07-17 00:57:37', '2018-07-17 00:57:37', '1'),
	(2, 'Michele Corleone', '2018-07-17 00:58:23', '2018-07-17 00:58:23', '1');
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;

-- Dumping structure for table university.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `professor_id` smallint(10) NOT NULL,
  `exam_id` smallint(10) NOT NULL,
  `degree_id` smallint(10) NOT NULL,
  `work_title` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `professor_id` (`professor_id`),
  KEY `exam_id` (`exam_id`),
  KEY `degree_id` (`degree_id`),
  KEY `deleted_on` (`deleted_on`),
  CONSTRAINT `FK_students_degrees` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_students_exams` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_students_professors` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table university.students: ~0 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT IGNORE INTO `students` (`id`, `name`, `professor_id`, `exam_id`, `degree_id`, `work_title`, `created_on`, `edit_on`, `deleted_on`) VALUES
	(1, 'Peter Rabbit', 1, 1, 1, 'Rabbits in wild.', '2018-07-17 01:04:57', '2018-07-17 01:05:46', '1');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
