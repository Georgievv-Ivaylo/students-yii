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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx-degrees-deleted_on` (`deleted_on`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table university.degrees: ~2 rows (approximately)
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT IGNORE INTO `degrees` (`id`, `name`, `created_on`, `edited_on`, `deleted_on`) VALUES
	(1, 'Bachelor', '2018-07-17 03:23:53', '2018-07-17 03:23:53', '1'),
	(2, 'Master', '2018-07-17 03:23:53', '2018-07-17 03:23:53', '1'),
	(3, 'PhD', '2018-07-17 03:23:53', '2018-07-17 03:23:53', '1');
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;

-- Dumping structure for table university.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx-exams-deleted_on` (`deleted_on`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table university.exams: ~2 rows (approximately)
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT IGNORE INTO `exams` (`id`, `name`, `created_on`, `edited_on`, `deleted_on`) VALUES
	(1, 'Dissertation work', '2018-07-17 03:22:13', '2018-07-17 03:22:13', '1'),
	(2, 'Diploma work', '2018-07-17 03:22:13', '2018-07-17 03:22:13', '1');
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;

-- Dumping structure for table university.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table university.migration: ~4 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT IGNORE INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1531786906),
	('m180716_230300_create_exams_table', 1531786933),
	('m180717_000910_create_professors_table', 1531787032),
	('m180717_001351_create_degrees_table', 1531787033),
	('m180717_012241_create_students_table', 1531791054);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Dumping structure for table university.professors
CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx-professors-deleted_on` (`deleted_on`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table university.professors: ~6 rows (approximately)
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT IGNORE INTO `professors` (`id`, `name`, `created_on`, `edited_on`, `deleted_on`) VALUES
	(1, 'Peter Parker', '2018-07-17 03:23:52', '2018-07-17 03:23:52', '1'),
	(2, 'Michele Corleone', '2018-07-17 03:23:52', '2018-07-17 03:23:52', '1'),
	(3, 'Mister Magoo', '2018-07-18 23:43:09', '2018-07-18 23:43:09', '1'),
	(4, 'Anton Sarazin', '2018-07-18 23:44:40', '2018-07-18 23:44:40', '1'),
	(5, 'Ketty Perry', '2018-07-18 23:45:26', '2018-07-18 23:45:26', '1'),
	(6, 'Boril Todorov', '2018-07-18 23:45:54', '2018-07-18 23:45:54', '1');
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;

-- Dumping structure for table university.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `professor_id` int(6) NOT NULL,
  `degree_id` int(6) NOT NULL,
  `exam_id` int(6) NOT NULL,
  `work_title` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` varchar(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx-students-professor_id` (`professor_id`),
  KEY `idx-students-degree_id` (`degree_id`),
  KEY `idx-students-exam_id` (`exam_id`),
  KEY `idx-students-deleted_on` (`deleted_on`),
  CONSTRAINT `fk-students-degree_id` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-students-exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-students-professor_id` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table university.students: ~9 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT IGNORE INTO `students` (`id`, `name`, `professor_id`, `degree_id`, `exam_id`, `work_title`, `created_on`, `edited_on`, `deleted_on`) VALUES
	(1, 'Peter Rabbit', 2, 1, 1, 'Rabbits in wild.', '2018-07-17 04:30:54', '2018-07-17 04:31:23', '1'),
	(10, 'Test form Date', 3, 2, 2, 'Test Form', '2018-07-18 04:00:19', '2018-07-19 02:25:42', '1'),
	(11, 'Test form', 2, 1, 1, 'Test Form ', '2018-07-18 04:01:29', '2018-07-21 02:58:49', '2018-07-20 23:58:49'),
	(12, 'Test form 2107', 1, 1, 2, 'Test Form', '2018-07-18 04:01:35', '2018-07-21 03:36:26', '1'),
	(13, 'Test form', 3, 1, 2, 'Test Form', '2018-07-18 04:01:37', '2018-07-18 23:43:39', '1'),
	(14, 'Test form 5', 4, 2, 2, 'Test Form', '2018-07-18 04:01:49', '2018-07-21 03:44:58', '2018-07-21 00:44:58'),
	(15, 'Test form 2', 5, 3, 2, 'Test Form 2', '2018-07-18 04:04:41', '2018-07-18 23:51:16', '1'),
	(16, 'Test form 3', 1, 3, 1, 'Test Form 3', '2018-07-18 04:11:52', '2018-07-22 01:24:11', '2018-07-21 22:24:11'),
	(17, 'Dragan Todorov', 3, 2, 2, 'Dungeons and dragons.', '2018-07-20 00:25:52', '2018-07-21 02:55:10', '2'),
	(18, 'Last Test', 2, 2, 2, 'Best of All', '2018-07-22 01:24:55', '2018-07-22 01:24:55', '1');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
