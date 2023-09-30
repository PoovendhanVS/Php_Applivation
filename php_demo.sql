-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 09:00 AM
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
-- Database: `php_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(1, 'Ariyalur', 1),
(2, 'Chengalpattu', 1),
(3, 'Chennai', 1),
(4, 'Coimbatore', 1),
(5, 'Srikakulam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `customer_creation`
--

CREATE TABLE `customer_creation` (
  `id` int(11) NOT NULL,
  `Customer_Name` varchar(255) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Date_of_join` date DEFAULT NULL,
  `Foundation` varchar(255) DEFAULT NULL,
  `Company_Name` varchar(255) DEFAULT NULL,
  `GST` varchar(45) DEFAULT NULL,
  `Category` varchar(45) DEFAULT NULL,
  `Unique_ID` int(11) DEFAULT NULL,
  `Manager` varchar(45) DEFAULT NULL,
  `Union` varchar(45) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Building_Number` varchar(45) DEFAULT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Pincode` varchar(45) DEFAULT NULL,
  `Country_Pmt` varchar(45) DEFAULT NULL,
  `State_Pmt` varchar(45) DEFAULT NULL,
  `City_Pmt` varchar(45) DEFAULT NULL,
  `Building_Number_Pmt` varchar(45) DEFAULT NULL,
  `Street_Pmt` varchar(255) DEFAULT NULL,
  `Area_Pmt` varchar(255) DEFAULT NULL,
  `Pincode_Pmt` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_creation`
--

INSERT INTO `customer_creation` (`id`, `Customer_Name`, `Gender`, `Date_of_join`, `Foundation`, `Company_Name`, `GST`, `Category`, `Unique_ID`, `Manager`, `Union`, `Photo`, `Country`, `State`, `City`, `Building_Number`, `Street`, `Area`, `Pincode`, `Country_Pmt`, `State_Pmt`, `City_Pmt`, `Building_Number_Pmt`, `Street_Pmt`, `Area_Pmt`, `Pincode_Pmt`) VALUES
(15, 'Varma', 'Male', '2023-08-02', 'Foundes RFG', 'RK Steels Private Ltd', 'GST00975FGGFF', 'WholeSale Dealer', 2398, 'Joes', 'Stripy Groups', './img/images (2).png', 'India', 'Tamil Nadu', 'Erode', '8889', 'DDSTREET', 'DD AREA', '658246', 'India', 'Tamil Nadu', 'Erode', '8889', 'DDSTREET', 'DD AREA', '658246'),
(34, 'Sekar', 'Male', '2023-06-02', 'G Foundations', 'Lakshmi Iron corpration S1', 'GST0002FGS4', 'WholeSale Dealer', 7480, 'Joes', 'Rectal Union', './img/images (3).png', 'India', 'Tamil Nadu', 'Erode', '200', 'FF Street', 'FF Area', '664826', 'India', 'Tamil Nadu', 'Erode', '200', 'FF Street', 'FF Area', '664826'),
(42, 'Roshni', 'Female', '2023-08-08', 'IQ Foundations', 'SLR Factory Made Steels Production', 'GST003GDJ04', 'Export Dealer', 9203, 'Sam', 'Rectal Union', './img/images.jpeg', 'India', 'Tamil Nadu', 'Coimbatore', '300', 'KK STREET', 'KK AREA', '658246', 'India', 'Tamil Nadu', 'Coimbatore', '300', 'KK STREET', 'KK AREA', '658246'),
(43, 'Pawan', 'Male', '2021-12-29', 'Noppe Foundation', 'Optimize Steels&Scrap Factory', 'GST0005GHY4', 'Lease Agreement', 8351, 'Lara', 'Stripy Groups', './img/images.png', 'India', 'Tamil Nadu', 'Tirupur', '400', 'KK STREET', 'KK AREA', '658754', 'India', 'Tamil Nadu', 'Tirupur', '400', 'KK STREET', 'KK AREA', '658754');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `ID` int(11) NOT NULL,
  `CUSTOMER_ID` varchar(255) DEFAULT NULL,
  `INVOICE_ID` varchar(255) DEFAULT NULL,
  `BILL_DATE` date DEFAULT NULL,
  `TOTAL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`ID`, `CUSTOMER_ID`, `INVOICE_ID`, `BILL_DATE`, `TOTAL`) VALUES
(10, '34', 'SAI-183-23', '2023-08-08', 'NONE'),
(11, '15', 'SAI-185-23', '2023-08-08', 'NONE'),
(12, '15', 'SAI-188-23', '2023-08-08', 'NONE'),
(13, '34', 'SAI-190-23', '2023-08-08', 'NONE'),
(14, '34', 'SAI-192-23', '2023-08-08', 'NONE'),
(15, '34', 'SAI-195-23', '2023-08-08', 'NONE'),
(16, '34', 'SAI-197-23', '2023-08-08', 'NONE'),
(17, '34', 'SAI-199-23', '2023-08-08', 'NONE'),
(26, '15', 'SAI-251-23', '2023-08-08', 'NONE'),
(27, '42', 'SAI-252-23', '2023-08-08', 'NONE'),
(28, '42', 'SAI-255-23', '2023-08-09', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `item_creation`
--

CREATE TABLE `item_creation` (
  `id` int(11) NOT NULL,
  `Item_Type` varchar(255) DEFAULT NULL,
  `Item_Code` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_creation`
--

INSERT INTO `item_creation` (`id`, `Item_Type`, `Item_Code`, `Price`, `Description`) VALUES
(3, 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', 'Steel Square Pipe 20x20'),
(4, 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', 'Steel Square Pipe 20x20'),
(5, 'SL-SQ-25x25-TK-2.60-WG-11.266', 'SL-SQ-25x25#0003', '540.76', 'Steel Square Pipe 25x25'),
(6, 'SL-SQ-25x25-TK-3.20-WG-13.866', 'SL-SQ-25x25#0004', '665.56', 'Steel Square Pipe 25x25'),
(7, 'SL-SQ-30x30-TK-2.60-WG-13.716', 'SL-SQ-30x30#0005', '658.36', '  Steel Square Pipe 30x30  ');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `Invoice_Number` varchar(50) NOT NULL,
  `Bill_Date` date NOT NULL,
  `Item_Type` varchar(100) NOT NULL,
  `Item_Code` varchar(50) NOT NULL,
  `Item_Rate` varchar(12) NOT NULL,
  `Quantity` varchar(12) NOT NULL,
  `Total` decimal(12,2) NOT NULL,
  `Name_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `Invoice_Number`, `Bill_Date`, `Item_Type`, `Item_Code`, `Item_Rate`, `Quantity`, `Total`, `Name_ID`) VALUES
(1, 'SAI-023-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '56', 18229.68, 15),
(2, 'SAI-023-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '23', 12437.48, 15),
(3, 'SAI-024-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '45', 14724.45, 15),
(4, 'SAI-025-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '23', 7487.19, 15),
(5, 'SAI-026-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '23', 7525.83, 15),
(6, 'SAI-027-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '45', 24334.20, 15),
(7, 'SAI-028-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '4', 1308.84, 15),
(8, 'SAI-029-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '32', 17304.32, 15),
(9, 'SAI-030-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '23', 7487.19, 15),
(10, 'SAI-031-23', '2023-08-05', '', '', '', '', 0.00, 15),
(11, 'SAI-032-23', '2023-08-05', '', '', '', '', 0.00, 15),
(12, 'SAI-032-23', '2023-08-05', '', '', '', '', 0.00, 15),
(13, 'SAI-032-23', '2023-08-05', '', '', '', '', 0.00, 15),
(14, 'SAI-032-23', '2023-08-05', '', '', '', '', 0.00, 15),
(15, 'SAI-035-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '23', 7525.83, 15),
(16, 'SAI-039-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '231', 75197.43, 15),
(17, 'SAI-040-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '34', 11125.14, 15),
(18, 'SAI-041-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '32', 10416.96, 15),
(19, 'SAI-041-23', '2023-08-05', '', '', '', '', 0.00, 15),
(20, 'SAI-041-23', '2023-08-05', '', '', '', '', 0.00, 15),
(21, 'SAI-041-23', '2023-08-05', '', '', '', '', 0.00, 15),
(22, 'SAI-041-23', '2023-08-05', '', '', '', '', 0.00, 15),
(23, 'SAI-044-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '23', 7525.83, 15),
(24, 'SAI-045-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '43', 14070.03, 15),
(25, 'SAI-046-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '34', 11068.02, 15),
(26, 'SAI-046-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '3', 976.59, 15),
(27, 'SAI-046-23', '2023-08-05', '', '', '', '', 0.00, 15),
(28, 'SAI-046-23', '2023-08-05', '', '', '', '', 0.00, 15),
(29, 'SAI-046-23', '2023-08-05', '', '', '', '', 0.00, 15),
(30, 'SAI-047-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '100', 32721.00, 15),
(31, 'SAI-048-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '12', 3906.36, 15),
(32, 'SAI-048-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '2', 1081.52, 15),
(33, 'SAI-048-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '12', 6489.12, 15),
(34, 'SAI-048-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(35, 'SAI-049-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '23', 7525.83, 15),
(36, 'SAI-049-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '2', 654.42, 15),
(37, 'SAI-049-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '2', 1081.52, 15),
(38, 'SAI-083-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '17', 5534.01, 15),
(39, 'SAI-083-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '23', 7525.83, 15),
(40, 'SAI-083-23', '2023-08-05', '6', 'SL-SQ-25x25#0004', '665.56', '13', 8652.28, 15),
(41, 'SAI-083-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(42, 'SAI-089-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(43, 'SAI-089-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '1', 540.76, 15),
(44, 'SAI-089-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(45, 'SAI-089-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(47, 'SAI-090-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(48, 'SAI-090-23', '2023-08-05', '', '', '', '', 0.00, 15),
(49, 'SAI-090-23', '2023-08-05', '', '', '', '', 0.00, 15),
(50, 'SAI-090-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(51, 'SAI-090-23', '2023-08-05', '', '', '', '', 0.00, 15),
(52, 'SAI-091-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '12', 3926.52, 15),
(53, 'SAI-091-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(54, 'SAI-092-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '5', 1627.65, 15),
(55, 'SAI-092-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '5', 1636.05, 15),
(56, 'SAI-092-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '4', 1308.84, 15),
(58, 'SAI-093-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(59, 'SAI-093-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '2', 651.06, 15),
(60, 'SAI-093-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(62, 'SAI-094-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(63, 'SAI-094-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(64, 'SAI-094-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(65, 'SAI-094-23', '2023-08-05', '6', 'SL-SQ-25x25#0004', '665.56', '1', 665.56, 15),
(66, 'SAI-095-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '12', 3926.52, 15),
(67, 'SAI-095-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(68, 'SAI-095-23', '2023-08-05', '5', 'SL-SQ-25x25#0003', '540.76', '12', 6489.12, 15),
(70, 'SAI-096-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '3', 981.63, 15),
(71, 'SAI-096-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(72, 'SAI-096-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 15),
(73, 'SAI-105-23', '2023-08-05', '4', 'SL-SQ-20x20#0002', '327.21', '12', 3926.52, 15),
(74, 'SAI-105-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '121', 39389.13, 15),
(75, 'SAI-105-23', '2023-08-05', '3', 'SL-SQ-20x20#0001', '325.530', '12', 3906.36, 15),
(76, 'SAI-106-23', '2023-08-05', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '2', 654.42, 15),
(78, 'SAI-107-23', '2023-08-05', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '12', 3906.36, 15),
(79, 'SAI-109-23', '2023-08-05', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '2', 654.42, 15),
(81, 'SAI-110-23', '2023-08-05', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(82, 'SAI-166-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '13', 4231.89, 15),
(83, 'SAI-167-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '1', 325.53, 15),
(84, 'SAI-169-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '12', 3906.36, 15),
(85, 'SAI-171-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '200', 65106.00, 15),
(86, 'SAI-177-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '21', 6836.13, 15),
(99, 'SAI-182-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '300', 97659.00, 15),
(100, 'SAI-182-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '300', 97659.00, 15),
(103, 'SAI-183-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '2', 654.42, 15),
(104, 'SAI-185-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '12', 3906.36, 15),
(105, 'SAI-188-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '34', 11068.02, 15),
(106, 'SAI-190-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '12', 3926.52, 15),
(107, 'SAI-171-23', '2023-08-08', '', '', '', '', 0.00, 15),
(110, 'SAI-171-23', '2023-08-08', '', '', '', '', 0.00, 15),
(111, 'SAI-192-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '100', 32553.00, 34),
(112, 'SAI-192-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '100', 32721.00, 34),
(113, 'SAI-195-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '1', 327.21, 34),
(114, 'SAI-190-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '89', 29121.69, 34),
(116, 'SAI-197-23', '2023-08-08', 'SL-SQ-20x20-TK-2.00-WG-6.782', 'SL-SQ-20x20#0001', '325.530', '100', 32553.00, 34),
(117, 'SAI-197-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '12', 3926.52, 34),
(118, 'SAI-199-23', '2023-08-08', 'SL-SQ-25x25-TK-2.60-WG-11.266', 'SL-SQ-25x25#0003', '540.76', '12', 6489.12, 34),
(121, 'SAI-252-23', '2023-08-08', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '6', 1963.26, 42),
(123, 'SAI-253-23', '2023-08-09', 'SL-SQ-25x25-TK-2.60-WG-11.266', 'SL-SQ-25x25#0003', '540.76', '3', 1622.28, 15),
(124, 'SAI-254-23', '2023-08-09', 'SL-SQ-25x25-TK-3.20-WG-13.866', 'SL-SQ-25x25#0004', '665.56', '3', 1996.68, 34),
(125, 'SAI-183-23', '2023-08-09', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '45', 14724.45, 34),
(127, 'SAI-255-23', '2023-08-09', 'SL-SQ-20x20-TK-2.60-WG-6.817', 'SL-SQ-20x20#0002', '327.21', '11', 3599.31, 42),
(128, 'SAI-255-23', '2023-08-09', 'SL-SQ-30x30-TK-2.60-WG-13.716', 'SL-SQ-30x30#0005', '658.36', '100', 65836.00, 42);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `User_Name` varchar(255) DEFAULT NULL,
  `Email_ID` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `User_Name`, `Email_ID`, `Password`) VALUES
(2, 'poovendhan', 'poo@gmail.com', '1234'),
(4, 'kannan', 'kannan@gmail.com', '1234'),
(5, 'do', 'kannan@gmail.com', '1234'),
(9, 'admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Tamil Nadu', 1),
(2, 'Andhra Pradesh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_creation`
--
ALTER TABLE `customer_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item_creation`
--
ALTER TABLE `item_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Name_ID` (`Name_ID`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47577;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_creation`
--
ALTER TABLE `customer_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_creation`
--
ALTER TABLE `item_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4121;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`Name_ID`) REFERENCES `customer_creation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
