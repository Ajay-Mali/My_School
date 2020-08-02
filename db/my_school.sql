-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 08:29 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(20) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_pass`) VALUES
(1, 'admin', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(20) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_author` varchar(100) NOT NULL,
  `c_desc` text NOT NULL,
  `c_duration` varchar(100) NOT NULL,
  `c_oprice` varchar(50) NOT NULL,
  `c_sprice` varchar(50) NOT NULL,
  `c_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `c_author`, `c_desc`, `c_duration`, `c_oprice`, `c_sprice`, `c_img`) VALUES
(1, 'HTML Tutorial', 'Ajay mali', 'This tutorial is designed for the aspiring Web Designers and Developers with a need to understand the HTML in enough detail along with its simple overview, and practical examples. This tutorial will give you enough ingredients to start with HTML from where you can take yourself at higher level of expertise', '10 Weeks', '500', '200', 'html.png'),
(2, 'CSS Tutorial', 'Ajay mali', 'CSS is used to control the style of a web document in a simple and easy way. CSS is the acronym for \"Cascading Style Sheet\". This tutorial covers both the versions CSS1,CSS2Â and CSS3, and gives a complete understanding of CSS, starting from its basics to advanced concepts.', '10 Weeks', '200', '50', 'css.jpg'),
(3, 'JavaScript Tutorial', 'Ajay mali', 'This tutorial has been prepared for JavaScript beginners to help them understand the basic functionality of JavaScript to build dynamic web pages and web applications.', '15 Weeks', '1000', '899', 'javascript.png'),
(4, 'PHP Tutorial', 'Ajay mali', 'This session demonstrates how PHP can provide dynamic content according to browser type, randomly generated numbers or User Input. It also demonstrated how the client browser can be redirected.', '15 Weeks', '1000', '999', 'php.jpg'),
(5, 'Python 3 Tutorial', 'Ajay Mali', 'Python is known as anÂ interpreted scripting language. It was designed by Gudo van Rossum. It was released in the year 1991. The different versions were released for Python like python 1, python 2 and python 3. It is one of the most used scripting languages for automating the modules and tools, development of web applications, handling big data, complex calculations, workflow creation, rapid prototyping, and other software development purposes.', '20 Weeks', '1999', '999', 'python.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_order`
--

CREATE TABLE `course_order` (
  `o_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(20) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_amount` int(50) NOT NULL,
  `t_mode` varchar(200) NOT NULL,
  `t_number` varchar(100) NOT NULL,
  `t_date` date NOT NULL,
  `admin_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_order`
--

INSERT INTO `course_order` (`o_id`, `s_id`, `c_id`, `c_name`, `c_amount`, `t_mode`, `t_number`, `t_date`, `admin_status`) VALUES
(1, 1, 1, 'HTML', 200, 'google_pay', '4485588855', '2020-08-02', 1),
(2, 1, 2, 'CSS Tutorial', 50, 'google_pay', '4485588855', '2020-08-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(20) NOT NULL,
  `s_id` int(20) NOT NULL,
  `f_mass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `l_id` int(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `l_desc` text NOT NULL,
  `l_video` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`l_id`, `c_id`, `l_name`, `l_desc`, `l_video`) VALUES
(1, 1, 'HTML Meta Tags', 'HTML lets you specify metadata - additional important information about a document in a variety of ways. The META elements can be used to include name/value pairs describing properties of the HTML document, such as author, expiry date, a list of keywords, document author etc. TheÂ <meta>Â tag is used to provide such additional information. This tag is an empty element and so does not have a closing tag but it carries information within its attributes.', 'Video.mp4'),
(2, 1, 'HTML Formatting', 'HTML FormattingÂ isÂ a process of formatting text for better look and feel. There are many formatting tags in HTML. These tags are used to make text bold, italicized, or underlined. There are almost 12 options available that how text appears in HTML and XHTML. Here, we are going to learn 12 HTML formatting tags.', 'Video.mp4'),
(3, 1, 'HTML Heading', 'A HTML heading or HTML h tag can be defined as a title or a subtitle which you want to display on the webpage. When you place the text within the heading tags<code> <h1>.........</h1></code>, it is displayed on the browser in the bold format and size of the text depends on the number of heading. There are six different HTML headings which are defined with the<code> <h1> to <h6></code> tags.', 'Video.mp4'),
(4, 2, 'CSS Background', 'This chapter teaches you how to set backgrounds of various HTML elements. You can set the following background properties of an element âˆ’ 	Â·Â Â Â Â Â Â Â  TheÂ background-colorÂ property is used to set the background color of an element. 	Â·Â Â Â Â Â Â Â  TheÂ background-imageÂ property is used to set the background image of an element. 	Â·Â Â Â Â Â Â Â  TheÂ background-repeatÂ property is used to control the repetition of an image in the background. 	Â·Â Â Â Â Â Â Â  TheÂ background-positionÂ property is used to control the position of an image in the background. 	Â·Â Â Â Â Â Â Â  TheÂ background-attachmentÂ property is used to control the scrolling of an image in the background. 	Â·Â Â Â Â Â Â Â  TheÂ backgroundÂ property is used as a shorthand to specify a number of other background properties.', 'Video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_pass` varchar(80) NOT NULL,
  `s_occu` varchar(200) NOT NULL,
  `s_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `s_pass`, `s_occu`, `s_img`) VALUES
(1, 'ajay mali', 'ajaymali@gmail.com', 'a', 'Web Developer', 'all.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_order`
--
ALTER TABLE `course_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_order`
--
ALTER TABLE `course_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
