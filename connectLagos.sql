-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2019 at 11:06 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect_lagos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cl_blocked_users`
--

CREATE TABLE `cl_blocked_users` (
  `ref_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `person_id` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_card_transactions`
--

CREATE TABLE `cl_card_transactions` (
  `ref_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `trans_ref` varchar(100) DEFAULT NULL,
  `gateway` varchar(65) DEFAULT NULL,
  `trans_type` enum('debit','credit') NOT NULL,
  `card_provider` varchar(65) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_members`
--

CREATE TABLE `cl_members` (
  `id` bigint(20) NOT NULL,
  `loginid` varchar(30) NOT NULL,
  `fullname` varchar(65) DEFAULT NULL,
  `email` varchar(65) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `about` text,
  `password` varchar(65) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `photo` varchar(120) DEFAULT 'assets-admin/uploads/default.jpg',
  `cover_photo` varchar(120) DEFAULT 'assets-admin/uploads/default.jpg',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reset_code` varchar(250) DEFAULT NULL,
  `verify_code` varchar(250) NOT NULL DEFAULT '',
  `verify_code_expiry` timestamp NULL DEFAULT NULL,
  `reset_code_expiry` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email_verified` enum('yes','no') DEFAULT 'no',
  `phone_verified` enum('yes','no') DEFAULT 'no',
  `date_of_birth` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` enum('member','admin') NOT NULL DEFAULT 'member',
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_member_activity`
--

CREATE TABLE `cl_member_activity` (
  `ref_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `activity_table` varchar(35) DEFAULT NULL,
  `unique_id` varchar(20) DEFAULT NULL,
  `activity` text,
  `action_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(35) NOT NULL,
  `ua` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_relation`
--

CREATE TABLE `cl_relation` (
  `ref_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_stories`
--

CREATE TABLE `cl_stories` (
  `ref_id` bigint(20) NOT NULL,
  `creator_id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  `location_url` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_transport_cards`
--

CREATE TABLE `cl_transport_cards` (
  `ref_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_provider` varchar(65) DEFAULT NULL,
  `expiry_month` tinyint(2) DEFAULT NULL,
  `expiry_year` int(4) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `card_balance` double DEFAULT '0',
  `owners_name` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cl_wallet_transactions`
--

CREATE TABLE `cl_wallet_transactions` (
  `ref_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `trans_ref` varchar(100) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `gateway` varchar(65) DEFAULT NULL,
  `trans_type` enum('debit','credit') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `sn` bigint(20) NOT NULL,
  `full_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cl_blocked_users`
--
ALTER TABLE `cl_blocked_users`
  ADD PRIMARY KEY (`ref_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`person_id`);

--
-- Indexes for table `cl_card_transactions`
--
ALTER TABLE `cl_card_transactions`
  ADD PRIMARY KEY (`ref_id`),
  ADD UNIQUE KEY `transaction_reference` (`trans_ref`);

--
-- Indexes for table `cl_members`
--
ALTER TABLE `cl_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loginid` (`loginid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `access_token` (`access_token`),
  ADD UNIQUE KEY `verify_code` (`verify_code`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `reset_code` (`reset_code`);

--
-- Indexes for table `cl_member_activity`
--
ALTER TABLE `cl_member_activity`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `cl_relation`
--
ALTER TABLE `cl_relation`
  ADD PRIMARY KEY (`ref_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`friend_id`);

--
-- Indexes for table `cl_stories`
--
ALTER TABLE `cl_stories`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `cl_transport_cards`
--
ALTER TABLE `cl_transport_cards`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `cl_wallet_transactions`
--
ALTER TABLE `cl_wallet_transactions`
  ADD PRIMARY KEY (`ref_id`),
  ADD UNIQUE KEY `transaction_reference` (`trans_ref`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cl_blocked_users`
--
ALTER TABLE `cl_blocked_users`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_card_transactions`
--
ALTER TABLE `cl_card_transactions`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cl_members`
--
ALTER TABLE `cl_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cl_member_activity`
--
ALTER TABLE `cl_member_activity`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `cl_relation`
--
ALTER TABLE `cl_relation`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_stories`
--
ALTER TABLE `cl_stories`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_transport_cards`
--
ALTER TABLE `cl_transport_cards`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cl_wallet_transactions`
--
ALTER TABLE `cl_wallet_transactions`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `sn` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
