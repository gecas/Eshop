-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 m. Kov 09 d. 19:17
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(8) NOT NULL,
  `admin_nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Sukurta duomenų kopija lentelei `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nickname`, `admin_password`, `admin_name`, `admin_surname`) VALUES
(1, 'gecas', 'abc', 'gecas', 'gecas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brand_id` int(8) NOT NULL,
  `brand_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Sukurta duomenų kopija lentelei `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Dell');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(8) NOT NULL,
  `ip_add` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(8) NOT NULL,
  `cat_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Sukurta duomenų kopija lentelei `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Kompiuteriai'),
(2, 'Mob.telefonai'),
(3, 'Planšetės'),
(4, 'Fotoaparatai'),
(6, 'Garso tech.'),
(7, 'Žaidimams'),
(8, 'GPS navig.');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`image_id` bigint(20) NOT NULL,
  `image_name` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- Sukurta duomenų kopija lentelei `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `product_id`) VALUES
(77, '5452916d63b62.jpg', 7),
(78, '5452916d81665.png', 7),
(79, '5452916dacd3e.png', 7),
(80, '5452916dbd794.jpg', 7),
(81, '546455299df22.png', 11);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `order_confirmed` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Sukurta duomenų kopija lentelei `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_confirmed`) VALUES
(1, 6, 1),
(2, 6, 1),
(3, 6, 2),
(4, 6, 1),
(5, 6, 1),
(6, 6, 2),
(7, 6, 1),
(8, 6, 1),
(9, 6, 1),
(10, 6, 1),
(11, 6, 1),
(12, 6, 0),
(13, 6, 0),
(14, 6, 0),
(15, 6, 0),
(18, 8, 0),
(21, 8, 0),
(22, 8, 2),
(23, 27, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
`id` bigint(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Sukurta duomenų kopija lentelei `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `product_quantity`) VALUES
(1, 1, 10, 1),
(2, 1, 9, 1),
(3, 1, 8, 1),
(4, 2, 10, 1),
(5, 2, 9, 1),
(6, 2, 8, 1),
(7, 3, 10, 1),
(8, 3, 9, 1),
(9, 3, 8, 1),
(10, 4, 10, 2),
(11, 5, 10, 2),
(12, 5, 11, 1),
(13, 6, 15, 12),
(14, 7, 15, 12),
(15, 8, 15, 12),
(16, 9, 15, 12),
(17, 10, 15, 12),
(18, 11, 15, 12),
(19, 12, 15, 12),
(20, 13, 15, 12),
(21, 14, 15, 1),
(22, 15, 7, 3),
(23, 0, 7, 1),
(24, 16, 7, 1),
(25, 16, 8, 1),
(26, 20, 8, 1),
(27, 20, 7, 1),
(28, 21, 8, 1),
(29, 21, 7, 2),
(30, 22, 8, 5),
(31, 23, 7, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(8) NOT NULL,
  `product_cat` int(8) NOT NULL,
  `product_brand` int(8) NOT NULL,
  `product_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(8) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keywords` varchar(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Sukurta duomenų kopija lentelei `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_keywords`) VALUES
(8, 1, 1, 'Acura', 5000, '<p>Gera auto</p>', 'acura, auto'),
(10, 1, 1, 'Desdf', 25, '<p>fsfsdfsdf</p>', 'sdfsdf'),
(11, 1, 2, 'dgregr', 3, '<p>rgre</p>', 'egerg');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(8) NOT NULL,
  `user_nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_country` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`user_id`, `user_nickname`, `user_password`, `user_name`, `user_surname`, `user_email`, `user_address`, `user_phone`, `user_city`, `user_country`) VALUES
(6, 'vitamin', '900150983cd24fb0d6963f7d28e17f72', 'Tomas', 'Rodriguezas', 'geciauskasmarius@gmail.com', 'belekas', '244-52-01', 'Vilnius', 'Lietuva'),
(7, 'gecas', 'abc', 'Lebron', 'James', 'be', 'ffef', '2154', '2131', 'dwede'),
(8, 'vova', '202cb962ac59075b964b07152d234b70', 'knfsdjn', 'skdnflsdn', 'klndslfn', 'knfdslkfn', 'lknflsndl', 'lknflfn', 'lknlkfnsld'),
(9, 'testas', '202cb962ac59075b964b07152d234b70', 'sdgdf', 'kmgdklm', 'klklnlk', 'lknkld', 'lnmdkl', 'klnlkgnlkn', 'lnlknlkdfg'),
(12, 'ewrewr', 'a773149870428a47fe947314b9aa54df', '$!empty ewrewr &&name', 'werwerewr', 'erwer@dfdsf.lt', 'werwer', 'werwe', 'rwe', 'werwe'),
(13, 'efe', '084fe8aecafea8b2f84cca493377eb9b', '$!empty efe &&name', 'fefe', 'naujas@naujas.lt', 'fefe', 'efe', 'fef', 'efefef'),
(14, 'efe', '084fe8aecafea8b2f84cca493377eb9b', 'efe', 'fefe', 'naujas@naujas.lt', 'fefe', 'efe', 'fef', 'efefef'),
(15, 'efe', '084fe8aecafea8b2f84cca493377eb9b', 'efe', 'fefe', 'naujas@naujas.lt', 'fefe', 'efe', 'fef', 'efefef'),
(16, 'cr7', '900150983cd24fb0d6963f7d28e17f72', 'cr7', 'efewf', 'cr@naujas.lt', 'fewf', 'fwef', 'efwef', 'wefwefwe'),
(17, 'cr7', '900150983cd24fb0d6963f7d28e17f72', 'cr7', 'efewf', 'cr@naujas.lt', 'fewf', 'fwef', 'efwef', 'wefwefwe'),
(18, 'gg', '202cb962ac59075b964b07152d234b70', 'gg', 'wefwef', 'belekas@naujas.lt', 'fwef', 'wf', 'wf', 'wfwfw'),
(19, 'gg', '202cb962ac59075b964b07152d234b70', 'gg', 'wefwef', 'belekas@naujas.lt', 'fwef', 'wf', 'wf', 'wfwfw'),
(20, 'gg', '202cb962ac59075b964b07152d234b70', 'gg', 'wefwef', 'belekas@naujas.lt', 'fwef', 'wf', 'wf', 'wfwfw'),
(21, 'vova', '202cb962ac59075b964b07152d234b70', 'vova', 'ef', 'fsd@sf.lt', 'ef', 'fef', 'fqf', 'ffefe'),
(22, 'vova', '202cb962ac59075b964b07152d234b70', 'vova', 'ef', 'fsd@sf.lt', 'ef', 'fef', 'fqf', 'ffefe'),
(23, 'gecas', '202cb962ac59075b964b07152d234b70', 'gecas', 'fef', 'efew@fwef.lt', 'wdf', 'rr', 'rr', 'erer'),
(24, 'gecas', '202cb962ac59075b964b07152d234b70', 'gecas', 'fef', 'efew@fwef.lt', 'wdf', 'rr', 'rr', 'erer'),
(25, 'gecas', '202cb962ac59075b964b07152d234b70', 'gecas', 'efwe', 'ef@efe.lt', 'fefe', 'fef', 'fef', 'fefe'),
(26, 'gecas', '202cb962ac59075b964b07152d234b70', 'gecas', 'efwe', 'ef@efe.lt', 'fefe', 'fef', 'fef', 'fefe'),
(27, 'deivis', '202cb962ac59075b964b07152d234b70', 'deivis', 'ggg', 'fg@qfef.lt', 'rgfrg', 'rgfgqfgf', 'fvfbqq', 'fvbfbf'),
(28, 'vyckalopas', '202cb962ac59075b964b07152d234b70', 'vyckalopas', 'vycka', 'lopas@vycka.lt', '123', 'efef', 'efef', 'fefef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `image_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
