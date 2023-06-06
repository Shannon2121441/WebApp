CREATE DATABASE IF NOT EXISTS `db_wbapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_wbapp`;

-- Dumping structure for table db_wbapp.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prod_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(180) NOT NULL DEFAULT '',
  `prod_description` varchar(180) NOT NULL DEFAULT '',
  `prod_image` varchar(180) NOT NULL DEFAULT '',
  `prod_price` int(11) NOT NULL DEFAULT 0,
  `prod_date_added` date DEFAULT NULL,
  `prod_time_added` time DEFAULT NULL,
  `prod_date_updated` date DEFAULT NULL,
  `prod_time_updated` time DEFAULT NULL,
  `prod_status` int(1) NOT NULL DEFAULT 0,
  `type_id` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`prod_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000006 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_product: 4 rows
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_description`, `prod_image`, `prod_price`, `prod_date_added`, `prod_time_added`, `prod_date_updated`, `prod_time_updated`, `prod_status`, `type_id`) VALUES
	(10000002, 'Nissin Ramen Chicken', 'Chicken Flavor', '10000002_647cf851d42f2.png', 15, '2023-06-05', '04:47:08', '2023-06-05', '07:43:54', 1, 301),
	(10000003, 'Nissin Ramen Seafood', 'Seafood Flavor', '10000003_647cf86ea6013.png', 15, '2023-06-05', '04:47:37', '2023-06-05', '07:44:03', 1, 301),
	(10000004, 'Nestle Milk', 'Fresh Milk', '10000004_647d4380ec946.jpg', 100, '2023-06-05', '10:07:44', '2023-06-05', '10:08:02', 1, 307),
	(10000005, '', '', 'default.png', 0, '2023-06-05', '11:01:17', '2023-06-05', '11:01:49', 1, 301);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product_inv
CREATE TABLE IF NOT EXISTS `tbl_product_inv` (
  `rec_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `prod_qty` int(8) NOT NULL DEFAULT 0,
  KEY `prod_id` (`prod_id`),
  KEY `rec_id` (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_product_inv: 8 rows
/*!40000 ALTER TABLE `tbl_product_inv` DISABLE KEYS */;
INSERT INTO `tbl_product_inv` (`rec_id`, `prod_id`, `prod_qty`) VALUES
	(10000001, 10000001, 400),
	(10000003, 10000001, 200),
	(10000004, 10000001, 100),
	(10000005, 10000002, 200),
	(10000005, 10000002, 0),
	(10000006, 10000003, 100),
	(10000006, 10000002, 50),
	(10000007, 10000002, 200);
/*!40000 ALTER TABLE `tbl_product_inv` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product_pricing
CREATE TABLE IF NOT EXISTS `tbl_product_pricing` (
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `prod_retail_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_product_pricing: 0 rows
/*!40000 ALTER TABLE `tbl_product_pricing` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_pricing` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product_qty
CREATE TABLE IF NOT EXISTS `tbl_product_qty` (
  `prodqty_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `prodqty_date_added` date NOT NULL DEFAULT '0000-00-00',
  `prodqty_time_added` time NOT NULL DEFAULT '00:00:00',
  `prodqty_date_updated` date NOT NULL DEFAULT '0000-00-00',
  `prodqty_time_updated` time NOT NULL DEFAULT '00:00:00',
  `prodqty_quantity` int(10) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  PRIMARY KEY (`prodqty_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_product_qty: 0 rows
/*!40000 ALTER TABLE `tbl_product_qty` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_qty` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_receive
CREATE TABLE IF NOT EXISTS `tbl_receive` (
  `rec_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL DEFAULT 0,
  `rec_date_added` date DEFAULT NULL,
  `rec_time_added` time DEFAULT NULL,
  `rec_saved` int(1) NOT NULL DEFAULT 0,
  `rec_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`rec_id`),
  KEY `FK_tbl_receive_tbl_suppliers` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000008 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_receive: 3 rows
/*!40000 ALTER TABLE `tbl_receive` DISABLE KEYS */;
INSERT INTO `tbl_receive` (`rec_id`, `supplier_id`, `rec_date_added`, `rec_time_added`, `rec_saved`, `rec_status`) VALUES
	(10000007, 3, '2023-06-06', '21:28:44', 1, 1),
	(10000006, 4, '2023-06-05', '07:44:17', 1, 1),
	(10000005, 5, '2023-06-05', '07:43:15', 1, 1);
/*!40000 ALTER TABLE `tbl_receive` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_receive_items
CREATE TABLE IF NOT EXISTS `tbl_receive_items` (
  `rec_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `rec_qty` int(8) NOT NULL DEFAULT 0,
  KEY `rec_id` (`rec_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_receive_items: 8 rows
/*!40000 ALTER TABLE `tbl_receive_items` DISABLE KEYS */;
INSERT INTO `tbl_receive_items` (`rec_id`, `prod_id`, `rec_qty`) VALUES
	(10000001, 10000001, 400),
	(10000003, 10000001, 200),
	(10000004, 10000001, 100),
	(10000005, 10000002, 200),
	(10000005, 10000002, 0),
	(10000006, 10000003, 100),
	(10000006, 10000002, 50),
	(10000007, 10000002, 200);
/*!40000 ALTER TABLE `tbl_receive_items` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_release
CREATE TABLE IF NOT EXISTS `tbl_release` (
  `rel_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `rel_customer` varchar(180) NOT NULL DEFAULT '',
  `rel_date_added` date DEFAULT NULL,
  `rel_time_added` time DEFAULT NULL,
  `rel_saved` int(1) NOT NULL DEFAULT 0,
  `rel_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`rel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000007 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_release: 4 rows
/*!40000 ALTER TABLE `tbl_release` DISABLE KEYS */;
INSERT INTO `tbl_release` (`rel_id`, `rel_customer`, `rel_date_added`, `rel_time_added`, `rel_saved`, `rel_status`) VALUES
	(10000003, '121', '2023-06-05', '07:45:53', 1, 1),
	(10000004, '121', '2023-06-05', '07:46:13', 1, 1),
	(10000005, '111', '2023-06-05', '10:05:53', 1, 1),
	(10000006, 'Shan', '2023-06-06', '21:29:10', 1, 1);
/*!40000 ALTER TABLE `tbl_release` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_release_inv
CREATE TABLE IF NOT EXISTS `tbl_release_inv` (
  `rel_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `prod_qty` int(8) NOT NULL DEFAULT 0,
  KEY `prod_id` (`prod_id`),
  KEY `rel_id` (`rel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_release_inv: 6 rows
/*!40000 ALTER TABLE `tbl_release_inv` DISABLE KEYS */;
INSERT INTO `tbl_release_inv` (`rel_id`, `prod_id`, `prod_qty`) VALUES
	(10000001, 10000001, 200),
	(10000004, 10000002, 100),
	(10000004, 10000003, 50),
	(10000003, 10000002, 10),
	(10000005, 10000002, 100),
	(10000006, 10000002, 30);
/*!40000 ALTER TABLE `tbl_release_inv` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_release_items
CREATE TABLE IF NOT EXISTS `tbl_release_items` (
  `rel_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `rel_qty` int(8) NOT NULL DEFAULT 0,
  KEY `rel_id` (`rel_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_release_items: 6 rows
/*!40000 ALTER TABLE `tbl_release_items` DISABLE KEYS */;
INSERT INTO `tbl_release_items` (`rel_id`, `prod_id`, `rel_qty`) VALUES
	(10000001, 10000001, 200),
	(10000004, 10000002, 100),
	(10000004, 10000003, 50),
	(10000003, 10000002, 10),
	(10000005, 10000002, 100),
	(10000006, 10000002, 30);
/*!40000 ALTER TABLE `tbl_release_items` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_suppliers
CREATE TABLE IF NOT EXISTS `tbl_suppliers` (
  `supplier_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(180) DEFAULT NULL,
  `supplier_email` varchar(180) NOT NULL DEFAULT '0',
  `supplier_date_added` date DEFAULT NULL,
  `supplier_time_added` date DEFAULT NULL,
  `supplier_date_updated` date DEFAULT NULL,
  `supplier_time_updated` date DEFAULT NULL,
  `supplier_contactno` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_suppliers: ~3 rows (approximately)
INSERT INTO `tbl_suppliers` (`supplier_id`, `supplier_name`, `supplier_email`, `supplier_date_added`, `supplier_time_added`, `supplier_date_updated`, `supplier_time_updated`, `supplier_contactno`) VALUES
	(3, 'Joy', 'joy@gmail.com', '2023-06-05', '2023-06-05', NULL, NULL, '09787879909'),
	(4, 'Nissin', 'nissin@gmail.com', '2023-06-05', '2023-06-05', NULL, NULL, '09567778989'),
	(5, 'LuckyMe', 'luckyme@gmail.com', '2023-06-05', '2023-06-05', NULL, NULL, '09142323332');

-- Dumping structure for table db_wbapp.tbl_type
CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(180) NOT NULL DEFAULT '',
  `type_date_added` date NOT NULL DEFAULT '0000-00-00',
  `type_time_added` time NOT NULL DEFAULT '00:00:00',
  `type_date_updated` date NOT NULL DEFAULT '0000-00-00',
  `type_time_updated` time NOT NULL DEFAULT '00:00:00',
  `type_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=308 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_type: 7 rows
/*!40000 ALTER TABLE `tbl_type` DISABLE KEYS */;
INSERT INTO `tbl_type` (`type_id`, `type_name`, `type_date_added`, `type_time_added`, `type_date_updated`, `type_time_updated`, `type_status`) VALUES
	(301, 'Instant Noodles', '2023-06-04', '14:02:11', '0000-00-00', '00:00:00', 1),
	(302, 'Canned Goods', '2023-06-04', '14:02:11', '0000-00-00', '00:00:00', 1),
	(303, 'Frozen Goods', '2023-06-04', '14:02:11', '0000-00-00', '00:00:00', 1),
	(304, 'Bread and Pastries', '2023-06-04', '14:02:11', '0000-00-00', '00:00:00', 1),
	(305, 'Dry Goods', '2023-06-05', '01:22:18', '0000-00-00', '00:00:00', 1),
	(306, 'Hygiene Products', '2023-06-05', '04:41:36', '0000-00-00', '00:00:00', 1),
	(307, 'Dairy', '2023-06-05', '10:07:23', '0000-00-00', '00:00:00', 1);
/*!40000 ALTER TABLE `tbl_type` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date DEFAULT NULL,
  `user_time_added` time DEFAULT NULL,
  `user_date_updated` date DEFAULT NULL,
  `user_time_updated` time DEFAULT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT '',
  `contactno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000015 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_wbapp.tbl_users: 6 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`, `contactno`) VALUES
	(10000001, 'Po', 'Shan', 'shannon@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '0000-00-00', '00:00:00', '2023-06-05', '01:23:38', 1, '', 'Staff', '09563229521'),
	(10000013, 'Park', 'Jimin', 'jimin@gmail.com', '5c781fe62a6e25f0466ffd7f6e1ace57', '2023-06-05', '07:25:20', NULL, NULL, 1, '', 'Staff', '09563229521'),
	(10000014, 'Kim', 'Taehyung', '', '5c781fe62a6e25f0466ffd7f6e1ace57', '2023-06-05', '11:02:43', NULL, NULL, 1, '', 'Owner', '0956 322 9521'),
	(10000009, 'Lee', 'Zhongli', 'ventigenshinimpact@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2023-06-05', '01:07:52', '2023-06-05', '01:09:10', 1, '', 'Manager', '09562222222'),
	(10000010, 'Mon', 'Rick', 'mika@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', '2023-06-05', '04:12:57', NULL, NULL, 1, '', 'Supervisor', '09494124271'),
	(10000011, 'Choi', 'Soobin', 'shannonalysonpo831@gmail.com', '5c781fe62a6e25f0466ffd7f6e1ace57', '2023-06-05', '04:14:28', '2023-06-05', '04:17:32', 1, '', 'Owner', '09494124271');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
