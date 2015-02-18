-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2015 at 06:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dolovers_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadata`
--

CREATE TABLE IF NOT EXISTS `acadata` (
  `xmarks` float NOT NULL,
  `xboard` varchar(333) NOT NULL,
  `xyop` int(11) NOT NULL,
  `xiimarks` float NOT NULL,
  `xiiboard` varchar(333) NOT NULL,
  `xiiyop` int(11) NOT NULL,
  `diplomamarks` float NOT NULL,
  `diplomaboard` varchar(333) NOT NULL,
  `diplomayop` int(11) NOT NULL,
  `jee` int(11) NOT NULL,
  `jelet` int(11) NOT NULL,
  `sem1` float NOT NULL,
  `sem2` float NOT NULL,
  `sem3` float NOT NULL,
  `sem4` float NOT NULL,
  `sem5` float NOT NULL,
  `sem6` float NOT NULL,
  `sem7` float NOT NULL,
  `sem8` float NOT NULL,
  `cgpa` float NOT NULL,
  `avg_sem` float NOT NULL,
  `ind_tra` varchar(333) NOT NULL,
  `tra_duration` int(11) NOT NULL,
  `add1` varchar(1000) NOT NULL,
  `add2` varchar(1000) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `email` varchar(333) NOT NULL,
  `group_mail` varchar(333) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(1000) NOT NULL,
  `segment` varchar(300) NOT NULL,
  `view_count` int(11) NOT NULL,
  `topic_count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `code_fac`
--

CREATE TABLE IF NOT EXISTS `code_fac` (
`fac_code_id` int(11) NOT NULL,
  `college` varchar(300) NOT NULL,
  `code_fac` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `college_entry`
--

CREATE TABLE IF NOT EXISTS `college_entry` (
`mem_id` int(11) NOT NULL,
  `college` varchar(300) NOT NULL,
  `deeg` varchar(100) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `roll_no` varchar(200) NOT NULL,
  `reg_no` varchar(200) NOT NULL,
  `stream` varchar(200) NOT NULL,
  `enter` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `as` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`con_id` int(11) NOT NULL,
  `contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_entry`
--

CREATE TABLE IF NOT EXISTS `faculty_entry` (
`fac_id` int(11) NOT NULL,
  `college` varchar(300) NOT NULL,
  `post` varchar(200) NOT NULL,
  `quotes` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_fac` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=466 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shout_college`
--

CREATE TABLE IF NOT EXISTS `shout_college` (
`shout_id` int(11) NOT NULL,
  `college` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `shout_del` int(11) NOT NULL DEFAULT '0',
  `cate` varchar(300) NOT NULL,
  `topic_id` varchar(200) NOT NULL,
  `view_count` int(11) NOT NULL,
  `reply_count` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `shout_clg` varchar(1000) NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `priority` varchar(300) NOT NULL,
  `deeg` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shout_college_faculty`
--

CREATE TABLE IF NOT EXISTS `shout_college_faculty` (
`shout_fac_id` int(11) NOT NULL,
  `college` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `shout_del` int(11) NOT NULL DEFAULT '0',
  `cate` varchar(300) NOT NULL,
  `topic_id` varchar(300) NOT NULL,
  `view_count` int(11) NOT NULL,
  `reply_count` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `shout_fac_clg` varchar(1000) NOT NULL,
  `report` int(11) NOT NULL,
  `priority` varchar(300) NOT NULL,
  `deeg` varchar(100) NOT NULL,
  `special_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shout_review`
--

CREATE TABLE IF NOT EXISTS `shout_review` (
`promo_review_id` int(11) NOT NULL,
  `shout_review` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `priority` varchar(1000) NOT NULL,
  `deeg` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_recover` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `dob` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `profilepic` varchar(100) NOT NULL DEFAULT '../image1/dpp/dpp.jpg',
  `forum_points` int(11) NOT NULL DEFAULT '0',
  `forum_topic_count` int(11) NOT NULL DEFAULT '0',
  `forum_post_count` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `administration` int(1) NOT NULL DEFAULT '0',
  `email_perm` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadata`
--
ALTER TABLE `acadata`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`), ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Indexes for table `code_fac`
--
ALTER TABLE `code_fac`
 ADD PRIMARY KEY (`fac_code_id`);

--
-- Indexes for table `college_entry`
--
ALTER TABLE `college_entry`
 ADD PRIMARY KEY (`mem_id`), ADD KEY `user_id` (`user_id`), ADD KEY `enter` (`enter`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `faculty_entry`
--
ALTER TABLE `faculty_entry`
 ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`), ADD KEY `post_topic` (`post_topic`), ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `shout_college`
--
ALTER TABLE `shout_college`
 ADD PRIMARY KEY (`shout_id`);

--
-- Indexes for table `shout_college_faculty`
--
ALTER TABLE `shout_college_faculty`
 ADD PRIMARY KEY (`shout_fac_id`);

--
-- Indexes for table `shout_review`
--
ALTER TABLE `shout_review`
 ADD PRIMARY KEY (`promo_review_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`topic_id`), ADD KEY `topic_cat` (`topic_cat`), ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `code_fac`
--
ALTER TABLE `code_fac`
MODIFY `fac_code_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `college_entry`
--
ALTER TABLE `college_entry`
MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `faculty_entry`
--
ALTER TABLE `faculty_entry`
MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=466;
--
-- AUTO_INCREMENT for table `shout_college`
--
ALTER TABLE `shout_college`
MODIFY `shout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `shout_college_faculty`
--
ALTER TABLE `shout_college_faculty`
MODIFY `shout_fac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shout_review`
--
ALTER TABLE `shout_review`
MODIFY `promo_review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=277;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
