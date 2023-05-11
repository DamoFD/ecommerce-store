-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 04:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxe_society`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `quantity`, `color`, `size`) VALUES
(41, 8, 1, 2, 'Yellow', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` date NOT NULL,
  `item_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_name`, `item_price`, `item_image`, `item_register`, `item_category`) VALUES
(1, 'Men\'s Shirt', 49.99, './assets/products/dress-shirt.webp', '2023-05-02', 'Men'),
(2, 'Women\'s Jeans', 39.99, './assets/products/womens-jeans.webp', '2023-05-02', 'Women'),
(3, 'Women\'s Dress', 99.99, './assets/products/womens-dress.webp', '2023-05-02', 'Women'),
(4, 'Men\'s Jeans', 49.99, './assets/products/mens-jeans.webp', '2023-05-02', 'Men'),
(5, 'Women\'s Shoes', 89.99, './assets/products/womens-shoes.webp', '2023-05-02', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`, `email`, `password`) VALUES
(3, 'Ryan', 'Reynolds', '2023-05-02', '', ''),
(5, 'John', 'Doe', '2023-05-02', '', ''),
(6, 'Billy', 'Bob', '2023-05-04', 'billy@billy.com', '$2y$10$9fJz3QOzA/UUrd40dnW6uuUZP0rh7I.645jjraIqNBPK/3FvnyYr6'),
(7, 'ABC', 'ABC', '2023-05-04', 'abc@abc.com', '$2y$10$/MDWurbXXN23BTw5Th/NrexAQTvTc71VZmO9RxWN5AwL3B7w/NL3u'),
(8, '123', '123', '2023-05-04', '123@123.com', '$2y$10$UVeHuS6sX1cP8mXOikKNgOOQ2y5cPr2ie3rsq/ImCWR16NAhrIQD6'),
(9, '123', '123', '2023-05-04', '123@123.com', '$2y$10$B55ZNKbE7DZg9jK0kz1tTuNBjP6VKrNlgM11N9BMEq4Rt9Z.wWDDO'),
(10, 'Joe', 'Bob', '2023-05-04', '987@987.com', '$2y$10$NC06cdkZOQHxL6pCrF021O6LS0M4fE272.OS2WjYDFpeP3Y5U9F7u'),
(11, 'Odie', 'Dozer', '2023-05-04', 'odie@odie.com', '$2y$10$0RxFQU2FBXyS5/AP47Mr..40CiIJGVTA.snfTS.5KkJcHcufvzSLi'),
(12, 'test', 'test', '2023-05-04', 'test@test.com', '$2y$10$A.B6PSyD1Egw/E4Q7NZP5eicj6i/XSq1z.gkVEKMcygJe1VyZESrG'),
(13, '597', '597', '2023-05-09', '597@597.com', '$2y$10$tMLoOXlU5tJhclcsFT4lMuvWGZPRpFFa2DNm7IGgt84j/JJNk3nGa');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
