-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 06:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ink@best`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activate` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `type`, `branch`, `password`, `activate`, `name`) VALUES
(14, 'Testing Lipa', 'EMPLOYEE', 'LIPA', 'admin', 0, 'Lipa'),
(15, 'Testing Bauan', 'EMPLOYEE', 'BAUAN', 'admin', 0, 'Bauan'),
(16, 'Testing Main', 'EMPLOYEE', 'MAIN', 'admin', 0, 'Main'),
(17, 'Tech Lipa', 'TECHNICIAN', 'LIPA', 'admin', 0, 'Lipa'),
(18, 'Tech Bauan', 'TECHNICIAN', 'BAUAN', 'admin', 0, 'Bauan'),
(19, 'Admin', 'ADMIN', 'MAIN', 'admin', 0, 'Main');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`) VALUES
(1, 'MAIN'),
(2, 'BAUAN'),
(3, 'LIPA');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `date_delivered` date NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `date_delivered`, `inventory_id`, `remarks`, `qty`) VALUES
(1, '2018-02-13', 2, 'wala', 0),
(2, '2018-02-13', 2, 'wala', 100),
(3, '2018-02-14', 1, '', 55),
(4, '2018-02-25', 3, '', 50),
(5, '2018-02-28', 4, '', 20),
(6, '2018-03-03', 2, '', -12),
(7, '2018-03-03', 2, '', 13),
(8, '2018-03-03', 4, '', 20),
(9, '2018-03-03', 3, '', 57);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `type`, `brand`, `model`, `price`, `quantity`, `description`, `branch`) VALUES
(1, 'Laptop', 'lenovo', 'ideapad 310', 32000, 34, 'asdasd', 'MAIN'),
(2, 'Printer', 'Hp', 'secret', 1500, 0, 'continuessss', 'MAIN'),
(3, 'Printer', 'Epson', 'L300', 4523.5, 99, 'New', 'MAIN'),
(4, 'Ink', 'Epson', 'B12', 125.75, 36, 'New', 'MAIN');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_branch`
--

CREATE TABLE `inventory_branch` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_transfer` date NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_branch`
--

INSERT INTO `inventory_branch` (`id`, `inventory_id`, `qty`, `date_transfer`, `branch`) VALUES
(1, 2, 70, '2018-02-13', 'LIPA'),
(3, 2, 61, '2018-02-13', 'BAUAN'),
(4, 1, 16, '2018-02-14', 'LIPA'),
(5, 3, 1, '2018-02-25', 'LIPA');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_invoice`
--

CREATE TABLE `inventory_invoice` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `invoice_by` int(11) NOT NULL,
  `price` float NOT NULL,
  `employee_id` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  `date_invoice` date NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_invoice`
--

INSERT INTO `inventory_invoice` (`id`, `inventory_id`, `invoice_id`, `qty`, `invoice_by`, `price`, `employee_id`, `done`, `date_invoice`, `branch`) VALUES
(38, 2, 4, 2, 0, 1500, 1, 1, '2018-02-14', 'MAIN'),
(39, 1, 5, 2, 0, 32000, 1, 1, '2018-02-14', 'MAIN'),
(43, 1, 6, 1, 0, 32000, 1, 1, '2018-02-14', 'MAIN'),
(44, 2, 6, 1, 0, 1500, 1, 1, '2018-02-14', 'MAIN'),
(45, 2, 7, 2, 0, 1500, 8, 1, '2018-02-14', 'LIPA'),
(46, 1, 7, 1, 0, 32000, 8, 1, '2018-02-14', 'LIPA'),
(48, 3, 9, 1, 0, 4, 11, 1, '2018-02-25', 'LIPA'),
(49, 2, 9, 1, 0, 1500, 11, 1, '2018-02-25', 'LIPA'),
(50, 3, 10, 2, 0, 4, 1, 1, '2018-02-28', 'MAIN'),
(51, 3, 0, 1, 0, 4, 14, 0, '0000-00-00', 'LIPA'),
(52, 4, 10, 3, 0, 125.75, 1, 1, '2018-02-28', 'MAIN'),
(53, 4, 11, 1, 0, 125.75, 1, 1, '2018-03-01', 'MAIN'),
(54, 3, 11, 1, 0, 4, 1, 1, '2018-03-01', 'MAIN'),
(56, 3, 13, 2, 0, 4, 1, 1, '2018-03-03', 'MAIN'),
(57, 1, 14, 1, 0, 32000, 19, 1, '2018-03-06', 'MAIN');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_history`
--

CREATE TABLE `invoice_history` (
  `id` int(11) NOT NULL,
  `service_charge` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date_invoice` date NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_history`
--

INSERT INTO `invoice_history` (`id`, `service_charge`, `client_name`, `address`, `contact_number`, `employee_id`, `invoice_number`, `date_invoice`, `branch`) VALUES
(14, '500', 'asdads', '12312asd', 'asdasd', 19, '123', '2018-03-06', 'MAIN'),
(15, '500', 'asd', 'asd', 'a123as', 19, '123', '2018-03-08', 'MAIN');

-- --------------------------------------------------------

--
-- Table structure for table `pull_out`
--

CREATE TABLE `pull_out` (
  `id` int(11) NOT NULL,
  `id_inventory_branch` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `date_pull_out` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `qty_pull_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pull_out`
--

INSERT INTO `pull_out` (`id`, `id_inventory_branch`, `id_inventory`, `date_pull_out`, `remarks`, `qty_pull_out`) VALUES
(1, 1, 2, '2018-02-13', '', 5),
(2, 3, 2, '2018-02-13', '', 5),
(3, 3, 2, '2018-02-13', 'asd', 1),
(4, 3, 2, '2018-02-13', 'asdasd', 3),
(5, 1, 2, '2018-02-13', 'asd', 10),
(6, 3, 2, '2018-02-14', 'asd', 20),
(7, 5, 3, '2018-03-03', 'To bauan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date_encode` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `machine_type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `accessories` varchar(100) NOT NULL,
  `problem_reported` varchar(100) NOT NULL,
  `problem_found` varchar(100) NOT NULL,
  `released_to` varchar(100) NOT NULL,
  `release_by` varchar(100) NOT NULL,
  `technician_assigned` varchar(100) NOT NULL,
  `repair_done` date NOT NULL,
  `waranty_date` date NOT NULL,
  `labor_cost` varchar(100) NOT NULL,
  `done` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_assign` date NOT NULL,
  `released` int(11) NOT NULL,
  `parts_cost` varchar(100) NOT NULL,
  `date_released` date NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `client_name`, `contact_number`, `account_id`, `date_encode`, `address`, `machine_type`, `brand`, `serial_number`, `model`, `accessories`, `problem_reported`, `problem_found`, `released_to`, `release_by`, `technician_assigned`, `repair_done`, `waranty_date`, `labor_cost`, `done`, `remarks`, `date_assign`, `released`, `parts_cost`, `date_released`, `branch`) VALUES
(1, 'asasd1123', '4444', 19, '2018-03-04', '2131231', '23123', '12312', '12312', '123123', '12312', '12312', '', '', '', '17', '0000-00-00', '0000-00-00', '', 0, '', '2018-03-04', 0, '', '0000-00-00', 'MAIN'),
(2, 'asd', 'ads', 19, '2018-03-07', 'asd', 'asdasda', 'ds', 'asd', 'ads', 'asd', 'asd', '', '', '', '', '0000-00-00', '0000-00-00', '', 0, '', '0000-00-00', 0, '', '0000-00-00', 'MAIN');

-- --------------------------------------------------------

--
-- Table structure for table `technician_work`
--

CREATE TABLE `technician_work` (
  `id` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_history`
--

CREATE TABLE `transfer_history` (
  `id` int(11) NOT NULL,
  `transfer_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_history`
--

INSERT INTO `transfer_history` (`id`, `transfer_date`, `qty`, `inventory_id`, `branch`) VALUES
(1, '2018-02-13', 5, 2, 'LIPA'),
(2, '2018-02-13', 4, 2, 'LIPA'),
(3, '2018-02-13', 2, 2, 'LIPA'),
(4, '2018-02-13', 5, 2, 'BAUAN'),
(5, '2018-02-13', 5, 2, 'LIPA'),
(6, '2018-02-14', 5, 1, 'LIPA'),
(7, '2018-02-14', 5, 1, 'LIPA'),
(8, '2018-02-14', 50, 2, 'LIPA'),
(9, '2018-02-14', 2, 2, 'BAUAN'),
(10, '2018-03-03', 1, 2, 'LIPA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_branch`
--
ALTER TABLE `inventory_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_invoice`
--
ALTER TABLE `inventory_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pull_out`
--
ALTER TABLE `pull_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician_work`
--
ALTER TABLE `technician_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_history`
--
ALTER TABLE `transfer_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory_branch`
--
ALTER TABLE `inventory_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventory_invoice`
--
ALTER TABLE `inventory_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `invoice_history`
--
ALTER TABLE `invoice_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pull_out`
--
ALTER TABLE `pull_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `technician_work`
--
ALTER TABLE `technician_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_history`
--
ALTER TABLE `transfer_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
