CREATE DATABASE IF NOT EXISTS `db_inv`;
USE `db_inv`;

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned DEFAULT 0,
  `order_amount` int(10) unsigned NOT NULL DEFAULT 0,
  `order_saved` int(1) NOT NULL DEFAULT 0,
  `order_status` int(1) NOT NULL DEFAULT 0,
  `date_added` date NOT NULL,
  `time_added` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `FK_tbl_order_tbl_supplier` (`supplier_id`),
  CONSTRAINT `FK_tbl_order_tbl_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`supplier_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_order` (`order_id`, `supplier_id`, `order_amount`, `order_saved`, `order_status`, `date_added`, `time_added`, `date_updated`, `time_updated`) VALUES
	(6, 7, 200, 1, 0, '2023-03-15', '02:05:00', '0000-00-00', '00:00:00'),
	(7, 7, 2000, 1, 0, '2023-03-15', '02:22:39', '0000-00-00', '00:00:00'),
	(8, 4, 100, 1, 0, '2023-03-15', '02:26:13', '0000-00-00', '00:00:00'),
	(9, 5, 232, 1, 0, '2023-03-15', '04:31:31', '0000-00-00', '00:00:00'),
	(10, 9, 200, 1, 0, '2023-03-15', '10:47:30', '0000-00-00', '00:00:00'),
	(11, 5, 12, 1, 0, '2023-04-01', '02:39:15', '0000-00-00', '00:00:00'),
	(12, 8, 12, 0, 0, '2023-04-01', '02:40:17', '0000-00-00', '00:00:00');

CREATE TABLE IF NOT EXISTS `tbl_orderitem` (
  `order_id` int(11) unsigned NOT NULL,
  `prod_id` int(11) unsigned NOT NULL,
  `order_qty` int(6) NOT NULL DEFAULT 0,
  KEY `order_prod_id` (`prod_id`) USING BTREE,
  KEY `FK_tbl_orderitem_tbl_order` (`order_id`),
  CONSTRAINT `FK_tbl_orderitem_tbl_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_orderitem_tbl_products` FOREIGN KEY (`prod_id`) REFERENCES `tbl_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_orderitem` (`order_id`, `prod_id`, `order_qty`) VALUES
	(6, 20, 200),
	(6, 19, 400),
	(6, 21, 200),
	(7, 20, 3000),
	(8, 19, 10),
	(9, 21, 121),
	(9, 20, 212),
	(9, 21, 0),
	(9, 19, 123123),
	(10, 22, 20),
	(11, 19, 12);

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned DEFAULT 0,
  `supplier_id` int(10) unsigned DEFAULT 0,
  `beg_inv` int(10) unsigned NOT NULL DEFAULT 0,
  `prod_price` int(10) unsigned NOT NULL DEFAULT 0,
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL,
  `time_added` time NOT NULL,
  `time_updated` time NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `FK_tbl_products_tbl_supplier` (`supplier_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `FK_tbl_products_tbl_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`supplier_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `tbl_type` (`type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_products` (`prod_id`, `prod_name`, `type_id`, `supplier_id`, `beg_inv`, `prod_price`, `date_added`, `date_updated`, `time_added`, `time_updated`) VALUES
	(19, 'Vitamilk', 9, 8, 200, 100, '2023-03-15', '0000-00-00', '02:02:07', '00:00:00'),
	(20, 'Wassup Babygirl', 4, 7, 10, 20, '2023-03-15', '0000-00-00', '02:02:38', '00:00:00'),
	(21, 'Jin Ramen 120g', 1, 8, 300, 100, '2023-03-15', '0000-00-00', '02:03:18', '00:00:00'),
	(22, 'Tofu', 10, 5, 20, 100, '2023-03-15', '0000-00-00', '10:46:38', '00:00:00');

CREATE TABLE IF NOT EXISTS `tbl_product_inv` (
  `order_id` int(10) unsigned NOT NULL,
  `prod_id` int(10) unsigned NOT NULL,
  `prod_qty` int(11) NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_product_inv` (`order_id`, `prod_id`, `prod_qty`) VALUES
	(6, 20, 200),
	(6, 19, 400),
	(6, 21, 200),
	(7, 20, 3000),
	(8, 19, 10),
	(9, 21, 121),
	(9, 20, 212),
	(9, 21, 0),
	(9, 19, 123123),
	(10, 22, 20),
	(11, 19, 12);
    
CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `purchase_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL DEFAULT 0,
  `purch_amount` int(10) unsigned NOT NULL,
  `purch_saved` int(1) NOT NULL DEFAULT 0,
  `purch_status` int(1) NOT NULL DEFAULT 0,
  `date_added` date NOT NULL,
  `time_added` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`purchase_id`) USING BTREE,
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_purchase` (`purchase_id`, `customer_id`, `purch_amount`, `purch_saved`, `purch_status`, `date_added`, `time_added`, `date_updated`, `time_updated`) VALUES
	(11, 0, 100, 1, 1, '2023-03-15', '04:13:56', '0000-00-00', '00:00:00'),
	(12, 2, 21211, 1, 1, '2023-03-15', '04:16:16', '0000-00-00', '00:00:00'),
	(13, 0, 122, 1, 1, '2023-03-15', '04:23:52', '0000-00-00', '00:00:00'),
	(14, 0, 122, 1, 1, '2023-03-15', '04:24:45', '0000-00-00', '00:00:00'),
	(15, 0, 12, 1, 1, '2023-03-15', '04:26:11', '0000-00-00', '00:00:00'),
	(16, 3, 44555, 1, 1, '2023-03-15', '04:33:18', '0000-00-00', '00:00:00'),
	(17, 0, 12, 1, 1, '2023-03-15', '04:36:49', '0000-00-00', '00:00:00'),
	(18, 22, 19, 1, 1, '2023-03-15', '10:48:01', '0000-00-00', '00:00:00');

CREATE TABLE IF NOT EXISTS `tbl_purchaseitem` (
  `purchase_id` int(10) unsigned NOT NULL,
  `prod_id` int(10) unsigned NOT NULL,
  `purch_qty` int(6) unsigned NOT NULL DEFAULT 0,
  KEY `purchase_id` (`purchase_id`),
  KEY `purchase_prod_id` (`prod_id`),
  CONSTRAINT `purchase_id` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchase` (`purchase_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_prod_id` FOREIGN KEY (`prod_id`) REFERENCES `tbl_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_purchaseitem` (`purchase_id`, `prod_id`, `purch_qty`) VALUES
	(12, 19, 21),
	(14, 20, 34),
	(14, 21, 213),
	(15, 20, 420),
	(15, 21, 6969),
	(16, 20, 21),
	(16, 19, 45),
	(17, 21, 12),
	(11, 19, 12),
	(11, 19, 12),
	(13, 19, 34),
	(13, 19, 12);

CREATE TABLE IF NOT EXISTS `tbl_purchase_inv` (
  `purchase_id` int(10) unsigned NOT NULL,
  `prod_id` int(10) unsigned NOT NULL,
  `prod_qty` int(10) unsigned NOT NULL,
  KEY `FK_tbl_purchase_inv_tbl_purchase` (`purchase_id`),
  KEY `FK_tbl_purchase_inv_tbl_products` (`prod_id`),
  CONSTRAINT `FK_tbl_purchase_inv_tbl_products` FOREIGN KEY (`prod_id`) REFERENCES `tbl_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_purchase_inv_tbl_purchase` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchase` (`purchase_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_purchase_inv` (`purchase_id`, `prod_id`, `prod_qty`) VALUES
	(12, 19, 21),
	(14, 20, 34),
	(14, 21, 213),
	(15, 20, 420),
	(15, 21, 6969),
	(16, 20, 21),
	(16, 19, 45),
	(17, 21, 12),
	(11, 19, 12),
	(11, 19, 12),
	(13, 19, 34),
	(13, 19, 12);

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL DEFAULT '0',
  `supplier_address` varchar(255) NOT NULL DEFAULT '0',
  `contact_no` varchar(50) NOT NULL DEFAULT '0',
  `supplier_email` varchar(50) NOT NULL DEFAULT '0',
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL,
  `time_added` time NOT NULL,
  `time_updated` time NOT NULL,
  `supplier_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `contact_no`, `supplier_email`, `date_added`, `date_updated`, `time_added`, `time_updated`, `supplier_status`) VALUES
	(4, 'Coca-Cola', 'St. John St. Anthony, Dona Juliana Subd., Brgy. Taculing', '095632228521', 'cola@gmail.com', '2023-03-13', '0000-00-00', '00:27:14', '00:00:00', 1),
	(5, 'Nissin', 'Bacolod City', '09563229562', 'nissin@gmail.com', '2023-03-13', '0000-00-00', '23:23:51', '00:00:00', 1),
	(7, 'Kazuha', 'Inazuma, Teyvat', '09123456789', 'kazuzu@gmail.com', '2023-03-14', '0000-00-00', '14:03:10', '00:00:00', 1),
	(8, 'Ayoko Na Talaga', 'Earth', '092345678901', 'sheesh@gmail.com', '2023-03-15', '0000-00-00', '01:59:54', '00:00:00', 1),
	(9, 'Hoyoverse', 'China', '09333333333', 'hoyo@gmail.com', '2023-03-15', '0000-00-00', '10:47:18', '00:00:00', 1);

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
	(1, 'Noodles'),
	(3, 'Biscuit'),
	(4, 'Drink'),
	(5, 'Junk Food'),
	(6, 'Milk Tea'),
	(7, 'Vegetable'),
	(8, 'Fruit'),
	(9, 'Soy'),
	(10, 'Vegan');

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `date_added` date NOT NULL,
  `time_added` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_user` (`user_id`, `user_password`, `fname`, `lname`, `contact_no`, `position`, `user_email`, `DOB`, `date_added`, `time_added`, `date_updated`, `time_updated`, `user_status`) VALUES
	(1, '1', 'Shannon', 'Po', '09563229521', 'Owner', 'shannon@gmail.com', '2001-08-31', '2023-02-27', '00:23:18', '2023-03-12', '23:38:11', 0),
	(2, '2', 'Mika', 'Po', '09494721412', 'Manager', 'mika@gmail.com', '2023-03-12', '2023-03-04', '16:23:01', '0000-00-00', '00:00:00', 1),
	(19, '1', 'Joanne Joyce', 'Po', '09563334567', 'Manager', 'joanne@gmail.com', '2010-01-10', '2023-03-12', '19:08:41', '0000-00-00', '00:00:00', 1),
	(20, '1', 'Sean', 'Po', '09121221212', 'Manager', 'sean@gmail.com', '2002-09-02', '2023-03-12', '23:02:41', '0000-00-00', '00:00:00', 1),
	(21, '1', 'Lilia', 'Po', '09559889852', 'Owner', 'lilia@gmail.com', '1947-09-12', '2023-03-12', '23:39:09', '0000-00-00', '00:00:00', 1),
	(22, '1', 'Trisha', 'Tusil', '09123456789', 'Manager', 'trish@gmail.com', '1999-03-19', '2023-03-12', '23:54:44', '0000-00-00', '00:00:00', 1),
	(23, '1', 'Venti', 'Genshin', '09123456789', 'Owner', 'venti@gmail.com', '1000-06-16', '2023-03-13', '00:07:11', '0000-00-00', '00:00:00', 1),
	(24, '1', 'Zhongli', 'Genshin', '09234556789', 'Manager', 'zhongli@gmail.com', '0000-00-00', '2023-03-13', '23:31:10', '0000-00-00', '00:00:00', 1),
	(25, '1', 'Giannah', 'Trafanco', '09888888888', 'Owner', 'gian@gmail.com', '2002-03-09', '2023-03-14', '14:01:45', '0000-00-00', '00:00:00', 1),
	(26, '1', 'Venti', 'Genshin Impact', '09563229521', 'Owner', 'ven@gmail.com', '2001-08-31', '2023-03-15', '10:45:50', '0000-00-00', '00:00:00', 1);