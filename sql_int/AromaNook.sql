-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-11-10 20:50:09
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `DressHouse`
--

-- --------------------------------------------------------

--
-- 表的结构 `confirmed_orders`
--

CREATE TABLE `confirmed_orders` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `confirmed_orders`
--

INSERT INTO `confirmed_orders` (`customer_id`, `product_id`, `quantity`) VALUES
(1, 7, 10),
(1, 1, 5),
(1, 1, 5),
(2, 4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `customer_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `password`, `customer_email`) VALUES
(1, '12qwer', '25d55ad283aa400af464c76d713c07ad', '123@qw.cos'),
(2, 'abcd', '25d55ad283aa400af464c76d713c07ad', 'abcd@abcd.com');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`customer_id`, `product_id`, `quantity`) VALUES
(4, 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE `products` (
  `product_id` int(20) UNSIGNED NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_size` varchar(30) NOT NULL,
  `product_pic` varchar(30) NOT NULL,
  `product_avaliable` int(10) UNSIGNED DEFAULT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `products`
--
INSERT INTO `products` ( `product_id`, `product_name`,  `product_size`, `product_pic`, `product_avaliable`, `product_price`) VALUES
 (1,'Chanel N5', '50ml', 'img/products/p1.png','10', '195'),
  (2,'Chanel N5', '100ml','img/products/p1.png', '5', '280'),
  (3,'Penhaligons Juniper Sling', '30ml', 'img/products/p2.png','10', '142'),
  (4,'Penhaligons Juniper Sling', '100ml','img/products/p2.png', '5', '275'),
  (5,'Invictus Platinum Paco Rabanne', '50ml', 'img/products/p3.jpg','10', '78'),
  (6,'Invictus Platinum Paco Rabanne', '100ml', 'img/products/p3.jpg','5', '142'),
  (7,'Encre Noire Lalique', '50ml', 'img/products/p4.jpg','10', '70'),
  (8,'Encre Noire Lalique', '100ml', 'img/products/p4.jpg','5', '95'),
  (9,'Marc Jacobs Daisy Love', '50ml', 'img/products/p5.png','10', '120'),
  (10,'Marc Jacobs Daisy Love', '100ml', 'img/products/p5.png','5', '232'),
  (11,'Guerlain Herba Fresca', '75ml', 'img/products/p6.png','10', '220'),
  (12,'Guerlain Herba Fresca', '125ml', 'img/products/p6.png','5', '258'),
  (13,'Tom Ford Electric Cherry', '30ml', 'img/products/p7.png','10', '365'),
  (14,'Tom Ford Electric Cherry', '100ml','img/products/p7.png', '5', '520'),
  (15,'Herod Parfums de Marly', '50ml', 'img/products/p8.jpg','10', '92'),
  (16,'Herod Parfums de Marly', '100ml', 'img/products/p8.jpg','5', '140'),
  (17,'Bleu de Chanel EDP', '50ml','img/products/p9.jpg', '10', '130'),
  (18,'Bleu de Chanel EDP', '100ml','img/products/p9.jpg', '5', '180');

--
-- 转储表的索引
--

--
-- 表的索引 `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- 表的索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- 表的索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 限制导出的表
--

--
-- 限制表 `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD CONSTRAINT `confirmed_orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `confirmed_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
