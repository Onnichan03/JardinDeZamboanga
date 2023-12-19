CREATE TABLE IF NOT EXISTS `item` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock_count` bigint(16) NOT NULL,
  PRIMARY KEY (`id`)
) ;

INSERT INTO `item` (`id`, `name`, `code`, `category`, `price`, `stock_count`) VALUES
(1, 'item1', 'item#1', 'category1', 1, 1),
(2, 'item2', 'item#2', 'category2', 2, 2),
(3, 'item3', 'item#3', 'category3', 3, 3),
(4, 'item4', 'item#4', 'category4', 4, 4),
(5, 'item5', 'item#5', 'category5', 5, 5),
(6, 'item6', 'item#6', 'category6', 6, 6),
(7, 'item7', 'item#7', 'category7', 7, 7),
(8, 'item8', 'item#8', 'category8', 8, 8);