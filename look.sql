-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 07:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `look`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`, `type`) VALUES
(1, 'Admin', 'admin@gmail.com', '11111', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(7) NOT NULL,
  `pid` int(7) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `appointment_time` varchar(255) NOT NULL,
  `doc_id` int(255) NOT NULL,
  `mode` varchar(7) NOT NULL,
  `payment` varchar(25) NOT NULL,
  `remark` varchar(25) DEFAULT 'approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `pid`, `patient_name`, `appointment_date`, `appointment_time`, `doc_id`, `mode`, `payment`, `remark`) VALUES
(1, 0, 'kurian', '2022-02-25', '03:32', 3, 'online', 'upi', 'approved'),
(2, 0, '', '2023-03-04', '16:43', 3, 'online', 'upi', 'cancelled'),
(3, 0, 'Demo Sample', '2023-03-03', '16:42', 3, 'online', 'upi', 'approved'),
(4, 2, 'Demo Sample', '2023-03-09', '13:00', 1, 'offline', 'upi', 'Processing...'),
(5, 2, 'Demo Sample', '2023-03-01', '13:30', 3, 'offline', 'upi', 'approved'),
(6, 2, 'Demo Sample', '2023-03-03', '14:00', 1, 'online', 'upi', 'Processing...');

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE `article_comment` (
  `id` int(7) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_comment`
--

INSERT INTO `article_comment` (`id`, `name`, `email`, `comment`, `posting_date`) VALUES
(1, 'demo', 'demo@gmail.com', 'Good!', '2023-02-23 02:10:13'),
(2, 'Anuj Chauhan', 'demo@gmail.com', 'qwerty', '2023-03-02 19:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(7) NOT NULL,
  `pro_id` int(7) NOT NULL,
  `pid` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pro_id`, `pid`) VALUES
(21, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `email`, `mobile`, `comments`) VALUES
(1, 'Anuj', 'anuj@gmail.com', '9898989898', 'hello				'),
(2, 'Anuj', 'anuj@gmail.com', '9898989898', 'hello				'),
(3, 'demo', 'd@g.com', '9876543212', 'hie				'),
(4, '', '', '', '				'),
(5, 'Anuj', 'a@a.com', '2312321232', 'qwerty				');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(7) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'approved',
  `doc_price` int(255) NOT NULL,
  `doc_desc` varchar(255) NOT NULL,
  `doc_image` varchar(25) NOT NULL,
  `posting_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `specialization`, `doctor_name`, `doctor_email`, `doctor_password`, `status`, `doc_price`, `doc_desc`, `doc_image`, `posting_date`) VALUES
(1, 'Bridal Make Up', 'Bridal Make Up', 'Rashmi@gmail.com', '11111', 'approved', 21000, 'Premium skin care services like Q-Switch, Insta Glow & Insta Clarity Peels, Luxury Facials, and much more included in our bridal pack for a glowing skin.', 'images/5.jpg', '2023-02-28'),
(2, 'Luxury Hair Treatment', '	\nLuxury Hair Treatment', 'Phani@gmail.com', '11111', 'approved', 4000, 'Our approach combines the goodness of three sciences. With ingredients from the most authentic sources, we personalize your treatment delivering assured results.', 'images/4.jpg', '2023-02-28'),
(3, 'Body Polishing', 'Body Polishing', 'Pari@gmail.com', '11111', 'approved', 6500, 'Worthy of royalty, indulge yourself for radiant and youthful skin that will truly leave you feeling good as gold.', 'images/10.jpg', '2023-02-28'),
(4, 'Waxing', 'Waxing', 'Lavni@gmail.com', '11111', 'approved', 3500, 'WAXING IS A FORM OF SEMI-PERMANENT HAIR REMOVAL WHICH REMOVES THE HAIR FROM THE ROOT.', 'images/24.jpg', '2023-02-28'),
(29, '6 Weeks Course', 'Makeup Artist', 'c@gmail.com', '11111', 'approved', 11000, 'Premium skin care services like Q-Switch, Insta Glow & Insta Clarity Peels, Luxury Facials, and much more included in our bridal pack for a glowing skin.', 'images/14.jpg', '2023-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(7) NOT NULL,
  `pid` int(25) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `address` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `pincode` int(6) NOT NULL,
  `amount` int(25) NOT NULL,
  `payment` varchar(55) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `pid`, `patient_name`, `pro_id`, `pro_name`, `address`, `city`, `pincode`, `amount`, `payment`, `posting_date`) VALUES
(12, 0, 'pari', 5, 'Dabur Honitus Cough Drops', 'jaipur', 'Jaipur', 145245, 910, 'upi', '2023-02-28 09:41:27'),
(13, 0, 'pari', 2, 'Blood Glucose Monitoring System', 'delhi', 'delhi', 121212, 2660, 'upi', '2023-02-28 09:41:27'),
(14, 2, 'Demo Sample', 2, 'Blood Glucose Monitoring System', 'de', 'delhi', 121212, 2060, 'upi', '2023-02-28 19:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` int(7) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `patient_password` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `posting_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `patient_name`, `patient_email`, `patient_password`, `mobile`, `address`, `posting_date`) VALUES
(2, 'Demo Sample', 'demo@gmail.com', '11', 9874587454, 'Delhi', '2023-02-23'),
(4, 'om', 'om@gmail.com', '1', 0, 'qwerty', '2023-02-23'),
(5, 'om', 'om@gmail.com', '1', 1021, 'qwerty', '2023-02-23'),
(7, 'pari', 'p@gmail.com', '11', 8548547854, 'Jaipur', '2023-02-24'),
(9, 'kol', 'k@kol.com', '1', 8547854125, 'rtyu', '2023-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(7) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` int(255) NOT NULL,
  `pro_desc` varchar(255) NOT NULL,
  `pro_image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_desc`, `pro_image`) VALUES
(2, 'Blood Glucose Monitoring System', 2000, 'Accu-Check Instant S Blood Glucose Monitoring System meets the global accuracy standards, fulfilling the requirements of ISO 15197:2013. It has an easy-edge test strip with the largest dosing window that can be dosed anywhere along the edge.', 'images/33.jpg'),
(3, 'Whisper Choice Wings', 300, 'Whisper Choice pads come with wings that help the pad to stay in place. This ensures protection from leakage. The thin and long pads offer comfort and protection. This pad offers 100% stain protection. These are suitable for regular periods.', 'images/34.jpg'),
(4, 'Zandu Pancharishta 450 ml', 200, 'Zandu Pancharishta is 100% natural and safe. It helps to treat all the digestive regular problems. It is enriched with ayurvedic herbs and ingredients. it enhances the digestive immunity and helps to reduce the occurrence of digestive problems like acidit', 'images/11.jpg'),
(5, 'Dabur Honitus Cough Drops', 250, 'Dabur Honitus Cough Drops Lozenges Ginger & Honey is an ayurvedic preparation enriched with the goodness of ginger and honey. It is used to relieve sore throat and cough.', 'images/36.jpg'),
(22, 'Vaseline Cocoa Body Lotion 400 ml', 300, 'Intensive Care Cocoa Glow Body Lotion\r\nVaseline Intensive Care Cocoa Glow Lotion contains Micro-droplets of Vaseline Jelly that locks in moisture within skin to allow the skin\'s natural barrier to recover.', 'images/51.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_comment`
--
ALTER TABLE `article_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `article_comment`
--
ALTER TABLE `article_comment`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
