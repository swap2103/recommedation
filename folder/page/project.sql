-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 09:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_like`
--

CREATE TABLE `answer_like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ask_question`
--

CREATE TABLE `ask_question` (
  `questionid` int(11) NOT NULL,
  `question` text NOT NULL,
  `unique_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ask_question`
--

INSERT INTO `ask_question` (`questionid`, `question`, `unique_number`) VALUES
(1, 'Dalgona how to make can you help me for  making dalgona', 78634),
(3, 'how to make panipur\'s puri at home\r\n', 78437609);

-- --------------------------------------------------------

--
-- Table structure for table `give_answer`
--

CREATE TABLE `give_answer` (
  `answerid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ans_unique_no` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `give_answer`
--

INSERT INTO `give_answer` (`answerid`, `qid`, `ans_unique_no`, `answer`) VALUES
(1, 1, 768888, 'take one cup and'),
(2, 1, 8787878, 'sugar\r\ncoffee\r\nchocolates'),
(16, 1, 11324, 'what ypu do'),
(19, 1, 108780334, 'do well'),
(21, 1, 1996597040, 'hey'),
(22, 1, 1878802981, 'puriogtur'),
(23, 3, 1135811411, 'nn'),
(24, 1, 774057582, 'good'),
(25, 3, 1043876968, 'ok'),
(26, 3, 1257558240, 'good'),
(27, 1, 278049186, 'ok gooof,jeahjlfhlq'),
(28, 3, 152613377, 'one one one one'),
(30, 1, 2022475880, 'ohy'),
(31, 3, 1656498766, 'meda');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `userid` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`userid`, `user_name`, `password`) VALUES
(1, 'pankti', 'cb1c4cb97b47c0ff880893fbed642d132b2ba400e4e4e64a1b061bd2012be2556e2150434f4e1f1222d48856133909315809ba9fafdebc112df61f95730ff52a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_like`
--
ALTER TABLE `answer_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ans_unique_numbe` (`ans_id`);

--
-- Indexes for table `ask_question`
--
ALTER TABLE `ask_question`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `give_answer`
--
ALTER TABLE `give_answer`
  ADD PRIMARY KEY (`answerid`),
  ADD UNIQUE KEY `answerid` (`answerid`),
  ADD KEY `question_unique_no` (`qid`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_like`
--
ALTER TABLE `answer_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ask_question`
--
ALTER TABLE `ask_question`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `give_answer`
--
ALTER TABLE `give_answer`
  MODIFY `answerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
