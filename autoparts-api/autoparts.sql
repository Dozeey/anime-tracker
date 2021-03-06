-- Sample Config file for Tables Creation
-- Corrections are welcome. These were adhoc

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autoparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` decimal(9,2),
  `phone` varchar(20),
  `location` varchar(50) NOT NULL,
  `device_type` varchar(50) NOT NULL,
  `network_latency` varchar(50),
  `acc_creation_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;,
  `log_on_time` datetime(10),
  `log_off_time` datetime(10),
  `products_clicked` blob(100),
  `categories_visited` blob(100),
  `contemplation_period` time(10),
  `verdict` blob(10),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


--
-- Table structure for table `Products`
--

CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(32) NOT NULL,
    `description` text NOT NULL,
    `image` blob NOT NULL,
    `price` decimal(10,0) NOT NULL,
    `category_id` int(11) NOT NULL,
    `created` datetime NOT NULL,
    `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;


--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category_id`, `created`, `modified`) VALUES
(1, 'LG P880 4X HD', 'My first awesome phone!', 'image_location', '336', 3, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 'image_location', '299', 2, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(3, 'Samsung Galaxy S4', 'How about no?', 'image_location', '600', 3, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(6, 'Bench Shirt', 'The best shirt!', 'image_location', '29', 1, '2014-06-01 01:12:26', '2014-05-31 02:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', 'image_location', '399', 2, '2014-06-01 01:13:45', '2014-05-31 02:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 'image_location', '259', 2, '2014-06-01 01:14:13', '2014-05-31 02:14:08'),
(9, 'Spalding Watch', 'My sports watch.', 'image_location', '199', 1, '2014-06-01 01:18:36', '2014-05-31 02:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', 'image_location', '300', 2, '2014-06-06 17:10:01', '2014-06-05 18:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', 'image_location', '100', 2, '2014-06-06 17:11:04', '2014-06-05 18:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 'image_location', '60', 1, '2014-06-06 17:12:21', '2014-06-05 18:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 'image_location', '70', 1, '2014-06-06 17:12:59', '2014-06-05 18:12:49'),
(26, 'Another product', 'Awesome product!', 'image_location', '555', 2, '2014-11-22 19:07:34', '2014-11-21 20:07:34'),
(28, 'Wallet', 'You can absolutely use this one!', 'image_location', '799', 6, '2014-12-04 21:12:03', '2014-12-03 22:12:03'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 'image_location', '333', 1, '2014-12-13 00:52:54', '2014-12-12 01:52:54'),
(42, 'Nike Shoes for Men', 'Nike Shoes', 'image_location', '12999', 3, '2015-12-12 06:47:08', '2015-12-12 05:47:08'),
(48, 'Bristol Shoes', 'Awesome shoes.', 'image_location', '999', 5, '2016-01-08 06:36:37', '2016-01-08 05:36:37'),
(60, 'Rolex Watch', 'Luxury watch.', 'image_location', '25000', 1, '2016-01-11 15:46:02', '2016-01-11 14:46:02');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
