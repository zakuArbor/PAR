-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 05:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pal_r`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `staff_id`, `course_id`, `year_id`, `period`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 2),
(3, 1, 3, 1, 4),
(4, 2, 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment_list`
--

CREATE TABLE `comment_list` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_list`
--

INSERT INTO `comment_list` (`comment_id`, `comment`) VALUES
(1, 'comment 1'),
(2, 'comment 2'),
(3, 'comment 3'),
(15, '<b>Comment 18</b>'),
(16, 'test1'),
(17, '<b>Comment 6</b>'),
(18, 'Comment 7'),
(20, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(9) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `course_desc`) VALUES
(1, 'AMU1O', 'Music, Grade 9, Open', 'This course emphasizes the creation and performance of music at a level consistent with previous experience and is aimed at developing technique, sensitivity and imagination. Students will develop musical literacy skills by using the creative and critical analysis processes in composition, performance, and a range of reflective and analytical activities. Students will develop an understanding of the conventions and elements of music and of safe practices related to music and will develop a variety of skills transferable to other areas of their life.'),
(2, 'AMU2O', 'Music, Grade 10, Open', 'This course emphasizes the creation and performance of music at a level consistent with previous experience. Students will develop musical literacy skills by using the creative and critical analysis processes in composition, performance, and a range of reflective and analytical activities. Students will develop their understanding of musical conventions, practices, and terminology and apply the elements of music in a range of activities. They will also explore the function of music in society with reference to the self, communities and cultures. '),
(3, 'AMU3M', 'Music, Grade 11, University/College Preparation', 'This course provides students with opportunities to develop their musical literacy through the creation, appreciation, analysis and performance of music including traditional, commercial and art music. Students will apply the creative process when performing appropriate technical exercises and repertoire and will employ the critical analysis processes when reflecting on, responding to, and analysing live and recorded performances. Students will consider the function of music in society and the impact of music on individuals and communities. They will explore how to apply skills developed in music to their life and careers.'),
(4, 'ICS2O', 'Introduction to Computer Studies, Grade 10, Open', 'This course introduces students to computer programming. Students will plan and write simple computer programs by applying fundamental programming concepts and learn to create clear and maintainable internal documentation. They will also learn to manage a computer by studying hardware configurations, software selection, operating system functions, networking and safe computing practices. Students will also investigate the social impact of computer technologies and develop an understanding of environmental and ethical issues related to the use of computers.');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `type` tinytext NOT NULL,
  `content` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `type`, `content`) VALUES
(1, 'message', 'Parent Interviews will be held in October'),
(2, 'footer', 'October 2014 West Carleton SS');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `type` tinytext NOT NULL,
  `content` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `type`, `content`) VALUES
(1, 'title', 'Progress Report Card'),
(2, 'school_name', 'West Carleton Secondary School'),
(3, 'street_name', '3088 Dunrobin Rd'),
(4, 'location', 'Dunrobin, ON, Canada'),
(5, 'postal_code', 'A2A 3F3');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `type` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `type`, `title`, `content`) VALUES
(1, 'message', 'Tutorial', '<p style="text-align:center"><span style="font-size:36px">Welcome to the<br />\r\nProgress Report Application<br />\r\n@ WCSS</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="font-size:36px">Please cl</span><span style="font-size:36px">ick the<br />\r\nmenu (</span><img alt="" src="http://cdn.css-tricks.com/wp-content/uploads/2012/10/threelines.png" style="font-size:36px; height:67px; line-height:57.599998474121094px; width:80px" /><span style="font-size:36px">) button i</span><span style="font-size:36px">n the left</span><span style="font-size:36px">&nbsp;corner for menu options</span><span style="font-size:28px"><img alt="" src="file:///D:/wamp/www/images/optionsToggle.png" /></span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:28px"><strong>Original Creators:</strong> </span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:28px">Daman Singh and Ju Hong Kim</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:26px">PHP Redesign: Ju Hong Kim</span></p>\r\n\r\n<p style="text-align:center">Reproduced with Permission from Daman Singh</p>\r\n\r\n<p style="text-align:center">Please Credit any neccessary work</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(2, 'notification', 'Notification', '<p style="text-align:center"><span style="font-size:26px">All progress reports are due<br />\r\nOct. 31, 2015</span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_type_id` int(11) NOT NULL,
  `position` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_type_id`, `position`) VALUES
(1, 'sso_admin'),
(2, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `progress_comment`
--

CREATE TABLE `progress_comment` (
  `pComment_id` int(11) NOT NULL,
  `progress_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_comment`
--

INSERT INTO `progress_comment` (`pComment_id`, `progress_id`, `comment_id`) VALUES
(33, 1, 1),
(34, 1, 2),
(35, 1, 3),
(36, 1, 15),
(37, 1, 16),
(38, 1, 17),
(39, 1, 18),
(54, 40, 1),
(55, 40, 2),
(56, 41, 1),
(57, 41, 3),
(84, 7, 16),
(85, 7, 17),
(86, 7, 18),
(135, 0, 15),
(136, 0, 18),
(144, 6, 1),
(145, 9, 15),
(146, 9, 18),
(163, 43, 15),
(164, 43, 18),
(165, 43, 20);

-- --------------------------------------------------------

--
-- Table structure for table `progress_level`
--

CREATE TABLE `progress_level` (
  `level_id` int(11) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_level`
--

INSERT INTO `progress_level` (`level_id`, `level`) VALUES
(1, 'Incomplete'),
(2, 'Below Expectation'),
(3, 'Approaching Expectation'),
(4, 'Meeting Expectation'),
(5, 'Exceeding Expectation');

-- --------------------------------------------------------

--
-- Table structure for table `progress_report`
--

CREATE TABLE `progress_report` (
  `progress_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `interview_request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_report`
--

INSERT INTO `progress_report` (`progress_id`, `level_id`, `interview_request`) VALUES
(1, 3, 1),
(2, 2, 0),
(3, 1, 0),
(4, 1, 0),
(5, 1, 0),
(6, 2, 1),
(7, 5, 1),
(8, 1, 0),
(9, 3, 0),
(10, 1, 0),
(11, 1, 0),
(12, 1, 0),
(40, 4, 0),
(41, 5, 0),
(42, 1, 0),
(43, 3, 1),
(1000, 1, 0),
(1001, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `staff_first` varchar(20) NOT NULL,
  `staff_last` varchar(20) NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `staff_first`, `staff_last`, `pw`) VALUES
(1, '0', 'Jenna', 'Sweeney', '1927'),
(2, '0', 'Reece', 'Travis', '6260'),
(3, '0', 'Aspen', 'Macias', '5361'),
(4, '0', 'Xenos', 'Vance', '6303'),
(5, '0', 'Len', 'Wilder', '4098'),
(6, '0', 'Knox', 'Brooks', '5739'),
(7, '0', 'Iola', 'Molina', '6684'),
(8, '0', 'Zelda', 'Stevenson', '2352'),
(9, '0', 'Benjamin', 'Dominguez', '2896'),
(10, '0', 'Upton', 'Carrillo', '6811'),
(11, '0', 'Martena', 'Montgomery', '4551'),
(12, '0', 'Celeste', 'Cox', '6695'),
(13, '0', 'Leilani', 'Morrow', '2863'),
(14, '0', 'Walter', 'Buck', '2402'),
(15, '0', 'Remedios', 'Patel', '3904'),
(16, '0', 'Tarik', 'Ball', '8541'),
(17, '0', 'Dillon', 'Dillon', '6618'),
(18, '0', 'Sonia', 'Reyes', '4115'),
(19, '0', 'Sonya', 'Townsend', '4476'),
(20, '0', 'Bethany', 'Guzman', '3967');

-- --------------------------------------------------------

--
-- Table structure for table `staff_position`
--

CREATE TABLE `staff_position` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `position_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_position`
--

INSERT INTO `staff_position` (`id`, `staff_id`, `position_type_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `last_name`, `first_name`, `middle_name`, `grade`) VALUES
(1, 'English', 'George', 'MacKensie', 12),
(2, 'Gill', 'Emerson', 'Branden', 10),
(3, 'Kline', 'Ulla', 'Vernon', 9),
(4, 'Schmidt', 'Whoopi', 'Leslie', 11),
(5, 'Zamora', 'Serina', 'Brianna', 12),
(6, 'Mcfarland', 'Berk', 'Jaime', 9),
(7, 'Fisher', 'Indigo', 'Tatiana', 10),
(8, 'Bass', 'Ali', 'Martha', 9),
(9, 'Bolton', 'Upton', 'Aristotle', 9),
(10, 'Cote', 'Darrel', 'Wallace', 12),
(11, 'Wheeler', 'Stacey', 'Ashely', 10),
(12, 'Kelly', 'Irma', 'Shea', 12),
(13, 'Whitehead', 'Palmer', 'Kibo', 9),
(14, 'Shannon', 'Abel', 'Raymond', 10),
(15, 'Glover', 'Scarlet', 'Jarrod', 9),
(16, 'Jackson', 'Velma', 'Ulla', 12),
(17, 'Emerson', 'Francis', 'Hiroko', 11),
(18, 'Wilkins', 'Macey', 'Summer', 10),
(19, 'Hendricks', 'Branden', 'Lysandra', 11),
(20, 'Rowe', 'Rigel', 'Nathan', 12),
(21, 'Cantu', 'Magee', 'Berk', 9),
(22, 'Guy', 'Camille', 'Ciaran', 11),
(23, 'Calhoun', 'Dolan', 'Kaseem', 11),
(24, 'Fitzpatrick', 'Eagan', 'Macy', 11),
(25, 'Gutierrez', 'Lareina', 'Germane', 11),
(26, 'Snyder', 'Shea', 'Madison', 9),
(27, 'Michael', 'Carol', 'Cade', 10),
(28, 'Blake', 'Hilary', 'Jacqueline', 10),
(29, 'Whitney', 'Curran', 'Malik', 10),
(30, 'Head', 'Cynthia', 'Sara', 10),
(31, 'Cobb', 'Samson', 'Francis', 12),
(32, 'Russo', 'Adrienne', 'Lucian', 11),
(33, 'Gilbert', 'Jonas', 'Erich', 10),
(34, 'Melendez', 'Brooke', 'Darius', 11),
(35, 'Browning', 'Sonya', 'Bruno', 9),
(36, 'Fleming', 'Petra', 'Alan', 9),
(37, 'Delaney', 'Reed', 'Martin', 10),
(38, 'Torres', 'Maia', 'Haviva', 11),
(39, 'Marsh', 'Roth', 'Dakota', 11),
(40, 'Holloway', 'Keegan', 'Haley', 12),
(41, 'Matthews', 'Merrill', 'Lester', 12),
(42, 'Jimenez', 'Cassidy', 'Ishmael', 12),
(43, 'Winters', 'Phelan', 'Marny', 11),
(44, 'Conway', 'Tatyana', 'Nayda', 10),
(45, 'Burgess', 'Aileen', 'Curran', 12),
(46, 'Alford', 'Gillian', 'Rogan', 9),
(47, 'Caldwell', 'Adrienne', 'Caleb', 9),
(48, 'Torres', 'Warren', 'Lacota', 10),
(49, 'Lester', 'Aphrodite', 'Aurelia', 11),
(50, 'Gray', 'Ava', 'Alan', 10),
(51, 'Kim', 'Ju Hong', NULL, 12),
(52, 'Kim', 'Ju Min', NULL, 12),
(53, 'Kim', 'Tom', NULL, 12),
(54, 'Kim', 'Tom', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `studentI_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `OEN` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`studentI_id`, `student_id`, `OEN`, `address`) VALUES
(1, 1, 683, 'Ap #674-9039 Convallis Rd.'),
(2, 2, 626, '323-332 Integer Av.'),
(3, 3, 875, 'P.O. Box 790, 8633 Maecenas Street'),
(4, 4, 966, '6319 Tempus Avenue'),
(5, 5, 340, '744-337 Pretium Avenue'),
(6, 6, 133, '238-112 Vehicula Avenue'),
(7, 7, 289, '189-1120 Libero Road'),
(8, 8, 806, '3417 Ut, St.'),
(9, 9, 385, 'P.O. Box 767, 5418 Augue Ave'),
(10, 10, 588, '2909 Lobortis. Avenue'),
(11, 11, 721, '5185 Quisque Avenue'),
(12, 12, 631, '627-3916 Vivamus Road'),
(13, 13, 740, '1040 Odio St.'),
(14, 14, 227, '971-647 Morbi Rd.'),
(15, 15, 908, '497-9843 Vulputate, St.'),
(16, 16, 922, 'Ap #327-1108 Tortor, Av.'),
(17, 17, 107, '3766 Viverra. Road'),
(18, 18, 376, 'P.O. Box 702, 2897 Cursus Ave'),
(19, 19, 469, '6329 Phasellus Ave'),
(20, 20, 769, '910-933 Sed Street'),
(21, 21, 957, '851 Sapien. St.'),
(22, 22, 896, '9798 Iaculis Av.'),
(23, 23, 813, '8583 Netus Road'),
(24, 24, 589, 'P.O. Box 553, 532 Ligula Ave'),
(25, 25, 392, '2923 Fusce St.'),
(26, 26, 699, 'P.O. Box 428, 9390 Aenean Rd.'),
(27, 27, 291, '959 Luctus St.'),
(28, 28, 273, 'Ap #314-8423 Massa. Rd.'),
(29, 29, 337, 'P.O. Box 376, 4357 Ultricies Av.'),
(30, 30, 388, 'Ap #321-6895 Nunc. St.'),
(31, 31, 592, '492-9264 Nulla Road'),
(32, 32, 431, '493-5824 Bibendum Road'),
(33, 33, 818, 'Ap #768-1223 In, Ave'),
(34, 34, 328, '373-8359 Congue. Ave'),
(35, 35, 535, 'Ap #164-7116 Risus. Ave'),
(36, 36, 610, 'Ap #177-2144 Aenean Ave'),
(37, 37, 430, 'Ap #802-7993 Id Road'),
(38, 38, 406, 'P.O. Box 989, 9509 Natoque Ave'),
(39, 39, 812, 'Ap #359-4268 Nullam St.'),
(40, 40, 840, '5188 Justo Road'),
(41, 41, 447, 'P.O. Box 785, 9013 Adipiscing, Rd.'),
(42, 42, 376, '7793 Enim. Road'),
(43, 43, 546, 'P.O. Box 257, 6533 Aliquam Street'),
(44, 44, 893, '8666 Amet St.'),
(45, 45, 700, 'P.O. Box 931, 5026 Aenean Rd.'),
(46, 46, 649, 'Ap #586-4852 Eu Rd.'),
(47, 47, 314, 'P.O. Box 467, 164 Orci Av.'),
(48, 48, 134, '3207 Sagittis Street'),
(49, 49, 617, 'P.O. Box 705, 4712 Nunc, St.'),
(50, 50, 674, '4362 Curabitur Rd.'),
(51, 51, 678123, 'St'),
(52, 52, 679123, 'St'),
(53, 53, 810123, 'St'),
(54, 54, 811123, 'St');

-- --------------------------------------------------------

--
-- Table structure for table `student_progress`
--

CREATE TABLE `student_progress` (
  `sProgress_id` int(11) NOT NULL,
  `progress_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_progress`
--

INSERT INTO `student_progress` (`sProgress_id`, `progress_id`, `student_id`, `class_id`, `year_id`) VALUES
(1, 1, 26, 1, 1),
(2, 2, 15, 1, 1),
(3, 3, 13, 1, 1),
(4, 4, 36, 1, 1),
(5, 5, 21, 1, 1),
(6, 6, 9, 1, 1),
(7, 7, 8, 1, 1),
(8, 8, 6, 1, 1),
(9, 9, 46, 1, 1),
(10, 10, 47, 1, 1),
(11, 11, 3, 1, 1),
(12, 12, 35, 1, 1),
(13, 13, 44, 2, 1),
(14, 14, 50, 2, 1),
(15, 15, 18, 2, 1),
(16, 16, 48, 2, 1),
(17, 17, 29, 2, 1),
(18, 18, 2, 2, 1),
(19, 19, 37, 2, 1),
(20, 20, 28, 2, 1),
(21, 21, 7, 2, 1),
(22, 22, 30, 2, 1),
(23, 23, 11, 2, 1),
(24, 24, 33, 2, 1),
(25, 25, 14, 2, 1),
(26, 26, 18, 2, 1),
(27, 27, 22, 3, 1),
(28, 28, 39, 3, 1),
(29, 29, 43, 3, 1),
(30, 30, 32, 3, 1),
(31, 31, 4, 3, 1),
(32, 32, 49, 3, 1),
(33, 33, 34, 3, 1),
(34, 34, 38, 3, 1),
(35, 35, 23, 3, 1),
(36, 36, 24, 3, 1),
(37, 37, 25, 3, 1),
(38, 38, 19, 3, 1),
(39, 39, 17, 3, 1),
(41, 1000, 1000, 1, 1),
(42, 40, 51, 4, 1),
(43, 41, 52, 4, 1),
(44, 42, 53, 4, 1),
(45, 43, 54, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_report`
--

CREATE TABLE `student_report` (
  `studentReport_id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `year_id` int(11) NOT NULL,
  `reporting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `type` char(12) NOT NULL,
  `color` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `type`, `color`) VALUES
(1, 'primary', '39393a'),
(2, 'secondary', 'f11313'),
(3, 'tertiary', 'E6E6E6'),
(4, 'font', 'E6E6E6'),
(5, 'font2', '131414'),
(6, 'shadow', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `year_default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year_start`, `year_end`, `sem`, `year_default`) VALUES
(1, 2016, 2017, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `comment_list`
--
ALTER TABLE `comment_list`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_type_id`);

--
-- Indexes for table `progress_comment`
--
ALTER TABLE `progress_comment`
  ADD PRIMARY KEY (`pComment_id`);

--
-- Indexes for table `progress_level`
--
ALTER TABLE `progress_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD PRIMARY KEY (`progress_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_position`
--
ALTER TABLE `staff_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`studentI_id`);

--
-- Indexes for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD PRIMARY KEY (`sProgress_id`);

--
-- Indexes for table `student_report`
--
ALTER TABLE `student_report`
  ADD PRIMARY KEY (`studentReport_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment_list`
--
ALTER TABLE `comment_list`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `progress_comment`
--
ALTER TABLE `progress_comment`
  MODIFY `pComment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `progress_level`
--
ALTER TABLE `progress_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `progress_report`
--
ALTER TABLE `progress_report`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `staff_position`
--
ALTER TABLE `staff_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `studentI_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `student_progress`
--
ALTER TABLE `student_progress`
  MODIFY `sProgress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `student_report`
--
ALTER TABLE `student_report`
  MODIFY `studentReport_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
