-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 11:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rymarcproductions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`email`, `password`, `firstName`, `lastName`) VALUES
('boss1@gmail.com', 'painter', 'Bob', 'Smith');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`email`, `password`, `firstName`, `lastName`, `phone`) VALUES
('arod13@gmail.com', '$2y$10$gLz87lxIaVGx0/qM0rF99eq28HsplwhBPRbvk4AUEuUlIqxKMI.BW', 'Alex', 'Rodriguez', '221-563-9075'),
('bjazz@gmail.com', '$2y$10$YjfEba1C43GnuWjexpVLvOZjdx4xcNj.qzxDJ9rmpBihJRnnvh/CW', 'Bob', 'Jazz', '123-456-1211'),
('jalo25@gmail.com', '$2y$10$kEq7Wc2svGY.qNzhRK18vut3kNhVh6WSAfISoLir4Xy7UCwEWMMo6', 'Julio', 'Alejandro', '561-684-1212'),
('thebestsam@gmail.com', '$2y$10$RR.sS/gsoQXEuUWk.Y54EOS1YPZyOjd5.i1LvkedYullN2hFla6.C', 'Sam', 'Best', '973-331-6445');

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(80) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_des` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimates`
--

INSERT INTO `estimates` (`email`, `address`, `city`, `job_title`, `job_des`) VALUES
('bjazz@gmail.com', '100 Music Ave', 'Clifton', 'Bathroom Paint', 'I need my bathroom painted. Old paint faded. Room is a full-size bathroom.'),
('arod13@gmail.com', '500 Grel St', 'Montclair', 'Living Room and Kitchen', 'I need my living room and kitchen painted. Wife doesn\'t like the old colors anymore. Average kitchen size, larger than normal living room. Needs to be done is less than 4 days.'),
('jalo25@gmail.com', '100 Yab St', 'Hackensack', 'Hallway and Bedroom', 'The main hallway in my house needs to be painted, bunch of scratches on the wall. Would also like to update bedroom color, old color isn\'t doing it anymore. Preferred if work is done soon.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `email` varchar(100) NOT NULL,
  `satisfaction` varchar(20) NOT NULL,
  `comments` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`email`, `satisfaction`, `comments`) VALUES
('arod13@gmail.com', 'great', 'Work ordered was done quickly as specified. Workers were very professional, and the new paint looks great. Will do business with you guys again!'),
('jalo25@gmail.com', 'excellent', 'WOW!! I am amazed at the work that was done in my house. The new paint looks amazing. Would use RyMarc\'s Painting Service again!'),
('bjazz@gmail.com', 'great', 'Work was done as requested, was finished in a timely manner. New paint looks great.');

-- --------------------------------------------------------

--
-- Table structure for table `respondedestimates`
--

CREATE TABLE `respondedestimates` (
  `email` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `comments` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respondedestimates`
--

INSERT INTO `respondedestimates` (`email`, `job_title`, `price`, `comments`) VALUES
('bjazz@gmail.com', 'Bathroom Paint', 500, 'Sounds like a normal job. Price offered is standard price for a job like this. Will cover materials, travel, and labor. Will call the number on file as soon as possible to confirm job.'),
('arod13@gmail.com', 'Living Room and Kitchen', 750, 'Price considers materials, labor, travel, and the fact you want the job done in 4 days. Will call to schedule when we can start the job. '),
('jalo25@gmail.com', 'Hallway and Bedroom', 600, 'Standard price for a job like this. Can start whenever is best for you, will call the number on file to see when we can schedule a start date for the job.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
