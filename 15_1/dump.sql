-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`id`, `title`, `description`, `price`, `timestamp`) VALUES
(1,	'dawdwada112',	'3',	12,	'2017-10-03 15:18:29'),
(3,	'231',	'3213123',	123,	'2017-10-03 12:14:02'),
(4,	'123',	'3',	12,	'2017-10-05 14:45:18'),
(5,	'123',	'3',	12,	'2017-10-05 14:45:39'),
(6,	'123',	'3',	12,	'2017-10-05 14:46:00'),
(7,	'dawdwada11212',	'3',	12,	'2017-10-05 14:47:03'),
(8,	'123',	'3',	12,	'2017-10-05 14:47:16');

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `name`, `phone`, `text`, `timestamp`) VALUES
(4,	'4234',	'32432',	'324',	'2017-10-03 14:25:50'),
(5,	'12313',	'213213',	'31312',	'2017-10-03 14:26:29');

-- 2017-10-10 15:41:40