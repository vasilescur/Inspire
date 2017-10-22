CREATE DATABASE `eripsni` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `ideas` (
  `UserName` varchar(25) NOT NULL,
  `IdeaTitle` varchar(120) NOT NULL,
  `Description` longtext NOT NULL,
  `Category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;