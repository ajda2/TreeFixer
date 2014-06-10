-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tree`;
CREATE TABLE `tree` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `left` int(11) unsigned NOT NULL,
  `right` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned NOT NULL,
  `depth` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `tree` (`id`, `name`, `left`, `right`, `parent_id`, `depth`) VALUES
(1,	'Root',	0,	0,	0,	0),
(2,	'Procesory',	0,	0,	1,	1),
(3,	'Intel',	0,	0,	2,	2),
(4,	'AMD',	0,	0,	2,	2),
(5,	'Pentium',	0,	0,	3,	3),
(6,	'Celeron',	0,	0,	3,	3),
(7,	'Duron',	0,	0,	4,	3),
(8,	'Athlon',	0,	0,	4,	3),
(9,	'Paměti',	0,	0,	1,	1),
(10,	'DDR',	0,	0,	9,	2),
(11,	'DIMM',	0,	0,	9,	2);

-- 2014-06-10 12:57:32
