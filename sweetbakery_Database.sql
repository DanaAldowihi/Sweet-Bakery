-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 06, 2022 at 03:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `var2_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `First_name` varchar(45) NOT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Phone_number` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `First_name`, `Last_name`, `Username`, `Password`, `Phone_number`) VALUES
(101, 'Noor', 'Alnami', 'admin_Noor', 'Noor123', '0550506349'),
(102, 'Huda', 'Alharby', 'admin_Huda', 'Hd562a', '0550557766'),
(103, 'Razan', 'Al-Baloushi', 'admin_Razan', 'RAL712', '0555054455'),
(104, 'Maha', 'AlOtaibi', 'admin_Maha', 'MMI728', '0555522003'),
(105, 'Zenab', 'Alanzi', 'admin_Zenab', 'ZNA126', '0555511224'),
(106, 'Adel', 'Alshahri', 'admin_Adel', 'Ad407e', '0550578965'),
(107, 'Suliman', 'AlKathiri ', 'admin_Suliman', 'SYF915', '0555523166'),
(108, 'Amad', 'Alsuwaidi', 'admin_Amad', 'AAT789', '0550501297'),
(109, 'Othman', 'Alzahrani', 'admin_Othman', 'Oth9mn', '0555045338'),
(110, 'Dalal', 'Alnahdi', 'admin_Dalal', 'dn234al', '0555059810');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `product_name` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_ingrediens` text NOT NULL,
  `product_calorie` text NOT NULL,
  `product_availability` int(11) NOT NULL,
  `product_price` text NOT NULL,
  `product_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_desc`, `product_ingrediens`, `product_calorie`, `product_availability`, `product_price`, `product_picture`) VALUES
(1, 'Cake&CubCake', 'Chocolate cake', 'Layers of rich chocolate cake with caramel', 'Chocolate', '120', 10, '70', 'chocake.jpeg'),
(2, 'Cake&CubCake', 'Vanilla cake', 'Delicious layers of vanilla cake with cream', 'Vanilla', '120', 10, '70', 'vanillacake.jpeg'),
(3, 'Cake&CubCake', 'Vanilla and Chocolate cake', 'Delicious layers of Vanilla and Chocolate cake', 'Vanilla', '120', 10, '70', 'pinkcake.jpeg'),
(4, 'Cake&CubCake', 'Red velvet cupcake', 'Layers of red velvet cupcake with chocolate', 'Red velvet ', '120', 10, '70', 'cub3.jpg'),
(5, 'Cake&CubCake', 'Vanilla cupcake', 'Layers of Vanilla cupcake with white cream', 'Vanilla', '120', 10, '70', 'cub2.jpg'),
(6, 'Cake&CubCake', 'Oreo cupcake', 'Layers of Oreo cupcake with white cream', 'Oreo', '120', 10, '70', 'cub4.jpg'),
(7, 'Cookies&Brownies', 'Chocolate chip cookies', 'Delicious chocolate chip cookies ', 'Chocolate', '120', 10, '70', 'cookies1.jpg'),
(8, 'Cookies&Brownies', 'Brownies', 'Brownies with caramel and chocolate', 'Oreo', '120', 10, '70', 'bro1.jpeg'),
(9, 'Cookies&Brownies', 'Kinder cookies', 'Delicious  kinder cookies', 'Kinder', '120', 10, '70', 'cookies33.jpg'),
(10, 'Cheesecake', 'Blueberry cheesecake', 'This stunning Blueberry Cheesecake Dessert, made of Digestive Biscuit, will melt in your mouth and everyone will rave about it at your next gathering!', 'Blueberry', '120', 10, '70', 'chees11.jpg'),
(11, 'Cheesecake', 'Strawberry cheesecake', 'Original topped with fresh Strawberry', 'Strawberry', '120', 10, '70', 'chees2.jpg'),
(12, 'Cheesecake', 'Chocolate Cheesecake', 'Chocolate Cheesecake', 'Chocolate', '120', 10, '70', 'chees3.jpg'),
(13, 'Pies', 'Apple pie', 'Apple pie topped with salted caramel', 'Apple', '120', 10, '70', 'applepie.jpg'),
(14, 'Pies', 'Chocolate pie', 'Chocolate pie topped with hershey\'s chocolate', 'Chocolate', '120', 10, '70', 'chopies.jpg'),
(15, 'Pies', 'Pecan pie', 'Pecan pie', 'Pecan', '120', 10, '70', 'pecanpie.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
