-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               10.4.13-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных beejee
CREATE DATABASE IF NOT EXISTS `beejee` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `beejee`;

-- Дамп структуры для таблица beejee.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(25) NOT NULL DEFAULT '',
    `email` varchar(25) NOT NULL DEFAULT '',
    `taskmessage` varchar(500) NOT NULL DEFAULT '',
    `status` enum('undone','done') DEFAULT NULL,
    `edited` int(3) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп структуры для таблица beejee.users
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) DEFAULT NULL,
    `is_admin` tinyint(4) DEFAULT NULL,
    `username` varchar(25) DEFAULT NULL,
    `password` varchar(40) DEFAULT NULL COMMENT 'sha1'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы beejee.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `is_admin`, `username`, `password`) VALUES
(1, 1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
