-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 12:31 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `Id` int(10) DEFAULT NULL,
  `Acc_no` int(10) DEFAULT NULL,
  `Cif_no` int(10) DEFAULT NULL,
  `Branch_no` int(6) DEFAULT NULL,
  `Account_type` varchar(55) DEFAULT NULL,
  `mobile` decimal(10,0) DEFAULT NULL,
  `rights` varchar(50) DEFAULT NULL,
  `Atm_card` varchar(10) DEFAULT NULL,
  `Mobile_banking` varchar(10) DEFAULT NULL,
  `Sms_alert` varchar(10) NOT NULL,
  `Checkbook` varchar(30) DEFAULT NULL,
  `captcha` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`Id`, `Acc_no`, `Cif_no`, `Branch_no`, `Account_type`, `mobile`, `rights`, `Atm_card`, `Mobile_banking`, `Sms_alert`, `Checkbook`, `captcha`) VALUES
(36, 108749051, 5153808, 235689, 'Premium Saving Account', '96238586', 'Full Rights', 'Yes', '0', 'Yes', 'Ordinary', 525282),
(37, 108420139, 8001573, 235689, 'Current Account', '2147483647', 'Full Rights', 'Yes', '0', 'Yes', 'Ordinary', 649251),
(38, 106077407, 9371202, 124578, 'saving account (with checkbook)', '8983806004', 'Full Rights', 'Yes', 'Yes', 'Yes', 'Ordinary', 230984),
(39, 123456789, 12345678, 456321, 'saving account (with checkbook)', '7875182940', 'saving account (with checkbook)', 'yes', 'yes', 'yes', 'no', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user_name`, `password`) VALUES
(1, 'Sonu', 'Sonu'),
(2, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `branch_balance`
--

CREATE TABLE `branch_balance` (
  `branch_code` int(9) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `balance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_balance`
--

INSERT INTO `branch_balance` (`branch_code`, `branch_name`, `emp_id`, `balance`) VALUES
(123456, 'Chawni Branch', 1, '170720');

-- --------------------------------------------------------

--
-- Table structure for table `branch_details`
--

CREATE TABLE `branch_details` (
  `branch_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `City` varchar(40) DEFAULT NULL,
  `branch_code` int(6) NOT NULL,
  `pin_code` int(6) DEFAULT NULL,
  `telephone` decimal(10,0) NOT NULL,
  `emp_id` int(9) NOT NULL,
  `Manager_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_details`
--

INSERT INTO `branch_details` (`branch_name`, `email`, `address`, `City`, `branch_code`, `pin_code`, `telephone`, `emp_id`, `Manager_name`) VALUES
('Chawni Branch', 'Chawni@snbank.com', 'Chawani', 'Aurangabad', 123456, 431001, '9623858600', 1, 'Sonu');

-- --------------------------------------------------------

--
-- Table structure for table `cust_balance`
--

CREATE TABLE `cust_balance` (
  `Id` int(9) DEFAULT NULL,
  `Account_number` decimal(10,0) DEFAULT NULL,
  `Balance` decimal(15,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_balance`
--

INSERT INTO `cust_balance` (`Id`, `Account_number`, `Balance`) VALUES
(37, '108420139', '50000'),
(38, '106077407', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(9) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` decimal(10,0) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `qualification` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `branch_name` varchar(30) DEFAULT NULL,
  `dateOfJoining` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `email`, `phone_number`, `address`, `gender`, `DOB`, `qualification`, `designation`, `branch_name`, `dateOfJoining`) VALUES
(1, 'Sonu', 'shaikhshahabaj987@gmail.com', '9623858600', 'New Nandanwan colony Aurangabad', 'Male', '1997-02-01', 'BCS', 'Programmer', 'Chawni', '2016-12-27'),
(2, 'Anita', 'dapkeanita@gmail.com', '8983806004', 'Pooja park padegaon Aurangabad', 'Female', '1995-02-22', 'B.tech', 'Managing Director ', 'New Nanadanwan Colony', '2016-12-27'),
(4, 'Sahil Shaikh', 'sahilshaikh9028@gmail.com', '9975872833', 'New Nandanvan colony Aurangabad', 'Male', '1999-02-22', 'BCS', 'Manager', 'Samarth Nagar', '2016-02-01'),
(5, 'Shahabaj', 'shahabaj@gmail.com', '7875182940', 'New Nandavan Colony Aurangabad', 'Male', '1997-02-01', 'Bcs', 'Bank Manager', 'New Nandanwan colony', '2016-12-29'),
(8, 'Shahabaj', 'shahabj@gmail.com', '787518294', 'New Nandavan Colony Aurangabad', 'Male', '1997-02-01', 'Bcs', 'Bank Manager', 'New Nandanwan colony', '2016-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `Id` int(10) DEFAULT NULL,
  `Confirmation_code` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`Id`, `Confirmation_code`) VALUES
(37, 309922),
(38, 137423),
(36, 931016);

-- --------------------------------------------------------

--
-- Table structure for table `loan_deposite`
--

CREATE TABLE `loan_deposite` (
  `loan_id` int(9) DEFAULT NULL,
  `acc_num` decimal(10,0) DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_deposite`
--

INSERT INTO `loan_deposite` (`loan_id`, `acc_num`, `paid_date`, `amount`) VALUES
(5, '108749051', '2016-12-28', '10000'),
(5, '108749051', '2016-12-28', '70000'),
(5, '108749051', '2016-12-28', '20000'),
(5, '108749051', '2016-12-28', '1000'),
(2, '12345', '2016-12-28', '500'),
(2, '12345', '2016-12-28', '703');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl`
--

CREATE TABLE `loan_tbl` (
  `loan_id` int(9) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `acc_num` decimal(10,0) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `loan_start` date NOT NULL,
  `loan_amount` decimal(10,0) NOT NULL,
  `Interest_rate` double NOT NULL,
  `emi_amount` decimal(10,0) NOT NULL,
  `interest_amount` decimal(10,0) NOT NULL,
  `total_amount` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tbl`
--

INSERT INTO `loan_tbl` (`loan_id`, `cust_name`, `acc_num`, `loan_type`, `loan_start`, `loan_amount`, `Interest_rate`, `emi_amount`, `interest_amount`, `total_amount`) VALUES
(1, '0', '0', 'Conventional Load', '0000-00-00', '666', 77, '88', '99', '111'),
(2, 'Sonu', '108420139', 'Conventional Load', '0000-00-00', '10000000', 10.6, '500000', '200000', '0'),
(5, 'Anita', '108749051', 'Conventional Load', '2016-12-28', '50', 5, '5', '5', '0'),
(6, 'sonu', '123456789', 'laon', '2016-12-08', '100000', 10, '10000', '1000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `Id` int(10) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Account_Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`Id`, `Email`, `Password`, `Account_Status`) VALUES
(39, 'ab@gmail.com', '371ab955fdc11c44c980779c3135b155', 'Closed'),
(38, 'dapkeanita@gmail.com', 'fa3a55e5ae94294c54678a6807d8df4b', 'Active'),
(36, 's@gmail.com', 'fa3a55e5ae94294c54678a6807d8df4b', 'Active'),
(37, 'shaikhshahabaj987@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `parent_details`
--

CREATE TABLE `parent_details` (
  `Id` int(10) DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_details`
--

INSERT INTO `parent_details` (`Id`, `title`, `last_name`, `first_name`, `middle_name`) VALUES
(35, 'Mr', 'Shaikh', 'Mubara', 'Jaffar'),
(36, 'Ms', 'dd', 'dd', 'dd'),
(37, 'Mr', 'Shaikh', 'Mubarak', 'Jaffar'),
(38, 'Mr', 'Dapke', 'Subhash', 'Father'),
(39, 'kk', 'kk', 'kk', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `Id` int(10) NOT NULL,
  `cust_type` varchar(20) NOT NULL,
  `cust_age` varchar(20) NOT NULL,
  `title` varchar(5) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(8) NOT NULL,
  `mobile_number` decimal(10,0) NOT NULL,
  `telephone_number` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`Id`, `cust_type`, `cust_age`, `title`, `last_name`, `first_name`, `middle_name`, `DOB`, `gender`, `nationality`, `address`, `landmark`, `state`, `city`, `pincode`, `mobile_number`, `telephone_number`, `email`, `education`) VALUES
(37, 'Public', 'Minor', 'Mr', 'Shaikh', 'Shahabaj', 'Mubarak', '1997-02-01', 'male', '.India', 'New Nandanvan Colony Aurangabad', 'Near Chandmari Masjid', 'Maharashtra', 'Aurangabad', 431001, '9623858600', 1234567890, 'shaikhshahabaj987@gmail.com', 'Non Graduate'),
(38, 'Public', 'Minor', 'Ms', 'Dapke', 'Anita', 'Subhash', '1995-02-22', 'female', '.India', 'Plot No 4 Pooja Park Padegaon', 'Near Marathi School', 'Maharashtra', 'Pune', 986532, '8983806004', 123456789, 'dapkeanita@gmail.com', 'Non Graduate'),
(39, 'public', 'minor', 'mr', 'shaikh', 'monu', 'monu', '2015-11-25', 'male', 'indian', 'address', 'landmar', 'maharashtra', 'auangabad', 431001, '7875182940', 123456985, 'sp@gmail.com', 'edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `Acc_no` (`Acc_no`),
  ADD UNIQUE KEY `Cif_no` (`Cif_no`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `branch_details`
--
ALTER TABLE `branch_details`
  ADD PRIMARY KEY (`branch_code`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `branch_name` (`branch_name`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `telephone` (`telephone`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `telephone_number` (`telephone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  MODIFY `loan_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
