-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2019 at 12:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tutanium`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `entryid` int(11) NOT NULL,
  `tutorialid` int(11) NOT NULL,
  `data` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'text',
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entryid`, `tutorialid`, `data`, `type`, `number`) VALUES
(64, 22, 'It\'s easy!', 'Header', 1),
(65, 22, 'Just follow along with this video, and you can make what you see in the picture below :)', 'Text', 2),
(66, 22, 'https://www.youtube.com/embed/UKSGg2IuCLI', 'Video', 3),
(67, 22, 'https://images-na.ssl-images-amazon.com/images/I/91dDyICBMrL._UL1500_.jpg', 'Picture', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorialid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorialid`, `userid`, `title`, `description`, `category`, `views`, `likes`, `published`) VALUES
(22, 1, 'How to Make a Paracord Bracelet', 'Paracord bracelets are easy to make!', 'Art', 20, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL DEFAULT 'm',
  `birthday` date NOT NULL,
  `pass` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `recovery_email` varchar(30) DEFAULT '',
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `gender`, `birthday`, `pass`, `date_created`, `email`, `recovery_email`, `admin`) VALUES
(1, 'admin', 'test', 'admin', 'm', '2019-11-25', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '2019-11-26', 'admin@tutanium', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`entryid`),
  ADD KEY `tutorialid` (`tutorialid`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorialid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `entryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorialid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`tutorialid`) REFERENCES `tutorial` (`tutorialid`);

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
