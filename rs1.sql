-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 02:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_uname` varchar(100) NOT NULL,
  `a_pass` varchar(255) NOT NULL,
  `a_city` varchar(100) NOT NULL,
  `a_phone` varchar(100) NOT NULL,
  `a_gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_uname`, `a_pass`, `a_city`, `a_phone`, `a_gender`) VALUES
(1, 'Rahul', 'rs224036@gmail.com', 'rs224036', 'rs', 'Mehsana', '9879277713', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `uname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_id`, `uname`) VALUES
(39, 15, 'rs224036'),
(40, 19, 'lol2'),
(41, 17, 'lol2'),
(42, 6, 'rs'),
(43, 5, 'rs'),
(44, 4, 'rs');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `msg_cont` varchar(255) NOT NULL,
  `msg_status` varchar(100) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_uname` varchar(100) NOT NULL,
  `r_uname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `s_name`, `r_name`, `msg_cont`, `msg_status`, `msg_date`, `s_uname`, `r_uname`) VALUES
(39, 'Rohit ', 'lol2 ', 'hy', 'Read', '2019-04-01 05:03:21', 'rs', 'lol2'),
(40, 'Rahul  Shekhawat', 'Rohit ', 'hy', 'Read', '2019-04-12 16:03:58', 'rs224036', 'rs'),
(41, 'Rohit ', 'Rahul  Shekhawat', 'hello\r\n', 'Read', '2019-04-12 16:04:51', 'rs', 'rs224036');

-- --------------------------------------------------------

--
-- Table structure for table `cus`
--

CREATE TABLE `cus` (
  `cust_no` int(20) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `item_p` varchar(100) NOT NULL,
  `mob_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus`
--

INSERT INTO `cus` (`cust_no`, `cust_name`, `item_p`, `mob_no`) VALUES
(1, 'Bob', 'Watch', '123456789'),
(2, 'Riyaz', 'Mobile', '987654321'),
(4, 'Hardik', 'ipad', '7658493764'),
(5, 'Rohit', 'Book', '5678934567');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `emp_no` int(100) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `desi` varchar(100) NOT NULL,
  `sal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`emp_no`, `emp_name`, `desi`, `sal`) VALUES
(1, 'Mohit', 'senior Engineer', '50,000'),
(2, 'Rohit', 'junior Engineer', '25,000'),
(3, 'Raghav', 'DBA', '60,000'),
(4, 'Rita', 'HR', '30,000'),
(5, 'Shaan', 'Designer', '61,578');

-- --------------------------------------------------------

--
-- Table structure for table `lol`
--

CREATE TABLE `lol` (
  `msg_id` int(100) NOT NULL,
  `s_uname` varchar(100) NOT NULL,
  `r_uname` varchar(100) NOT NULL,
  `msg_cont` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lol`
--

INSERT INTO `lol` (`msg_id`, `s_uname`, `r_uname`, `msg_cont`, `msg_status`, `msg_date`) VALUES
(1, 'Rohit', 'Rahul  Shekhawat', 'hello', 'read', '2019-03-26 13:32:23'),
(2, 'Rahul  Shekhawat', 'Rohit', 'hy', 'read', '2019-03-26 13:41:12'),
(3, 'Rohit', 'Rahul  Shekhawat', '1', 'read', '2019-03-26 13:42:03'),
(4, 'Rahul  Shekhawat', 'Rohit', 'hsdg', 'read', '2019-03-26 15:14:58'),
(5, 'Rohit', 'Rahul  Shekhawat', 'hello', 'read', '2019-03-26 15:23:27'),
(6, 'Rohit', 'Rahul  Shekhawat', '1', 'read', '2019-03-26 15:41:15'),
(7, 'Rahul  Shekhawat', 'Rohit', 'hsdg', 'read', '2019-03-26 15:56:28'),
(8, 'Rahul  Shekhawat', 'Rohit', 'hy', 'read', '2019-03-26 15:59:02'),
(9, 'Rahul  Shekhawat', 'Rohit', 'hy', 'read', '2019-03-26 16:11:22'),
(10, 'Rohit', 'Rahul  Shekhawat', 'hello', 'read', '2019-03-26 16:13:02'),
(11, 'Rahul  Shekhawat', 'Rohit', 'sdsd', 'read', '2019-03-26 16:15:02'),
(12, 'Rahul  Shekhawat', 'Rohit', 'dsd', 'read', '2019-03-26 16:15:27'),
(13, 'Rahul  Shekhawat', 'Rohit', 'hy', 'read', '2019-03-26 17:41:27'),
(14, 'Rohit', 'Rahul  Shekhawat', 'lol', 'read', '2019-03-26 17:42:05'),
(15, 'Rohit', 'Rahul  Shekhawat', 'ksdahsk', 'read', '2019-03-27 04:59:59'),
(16, 'Rahul  Shekhawat', 'Rohit', 'lol', 'read', '2019-03-27 05:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `my_data`
--

CREATE TABLE `my_data` (
  `rollno` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_data`
--

INSERT INTO `my_data` (`rollno`, `name`) VALUES
(1, 'Rahul'),
(3, 'Ankit'),
(4, 'Riyaz'),
(5, 'Hardik');

-- --------------------------------------------------------

--
-- Table structure for table `my_item`
--

CREATE TABLE `my_item` (
  `id` int(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_item`
--

INSERT INTO `my_item` (`id`, `item`, `price`) VALUES
(1, 'data cable', 50),
(2, 'pen', 5),
(3, 'usb drive', 500),
(4, 'file page', 40),
(5, 'pencil', 20),
(6, 'mouse', 200),
(7, 'otg cable', 10),
(8, 'java book', 450);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `prod_cate_id` int(100) NOT NULL,
  `date` timestamp(2) NOT NULL DEFAULT CURRENT_TIMESTAMP(2) ON UPDATE CURRENT_TIMESTAMP(2),
  `bname` varchar(200) NOT NULL,
  `aname` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `cond` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `des` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `p_date` timestamp(2) NOT NULL DEFAULT CURRENT_TIMESTAMP(2) ON UPDATE CURRENT_TIMESTAMP(2)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `prod_cate_id`, `date`, `bname`, `aname`, `pname`, `cond`, `price`, `des`, `img`, `uname`, `buyer`, `p_date`) VALUES
(1, 2, '2019-03-20 09:19:38.97', 'Calculus', 'Dr. Shallesh S. Patel', 'Atul Prakashan', 'Used', 'Free', 'Calculus Volume-1 used book is free', '1st_and_2nd_semesters_Engineering_Book15220329343.jpg', 'rs224036', '', '2019-04-10 12:18:34.56'),
(2, 3, '2019-03-20 09:20:09.04', 'Physics', 'Dr. Shallesh S. Patel', 'Atul Prakashan', 'Used', 'Free', 'used book is free', '1st_PU_PCME_books_15311258091.jpg', 'rs224036', '', '2019-04-10 12:18:34.56'),
(3, 4, '2019-03-20 09:20:28.62', 'Chemistry', 'Dr. Shallesh S. Patel', 'Atul Prakashan', 'Used', 'Free', 'used book is free', '1st_PU_PCME_books_15311258112.jpg', 'rs224036', '', '2019-04-10 12:18:34.56'),
(4, 2, '2019-03-20 09:20:42.60', 'Mathematics', 'Dr. Shallesh S. Patel', 'Atul Prakashan', 'Used', '100', '2 used books ', '1st_PU_PCME_books_15311258123.jpg', 'rs224036', '', '2019-04-10 12:18:34.56'),
(5, 1, '2019-04-10 12:05:13.84', '2 States', 'Chetan bhagat', 'chetan bhagat', 'Used', '150', 'it is very interesting book.', '2_States_15278420311.jpg', 'rs224036', 'rs', '2019-04-10 12:18:34.56'),
(6, 5, '2019-04-10 11:48:46.43', 'PHP/mysql', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', '6_Month_Industrial_Training_In_Mohali15156119694.jpg', 'rs224036', 'rs', '2019-04-10 12:18:34.56'),
(7, 5, '2019-03-20 09:22:51.39', 'Microprocessor Architecture', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', '6th_semister_all_etc_book15245684171.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(8, 2, '2019-03-20 09:22:51.42', 'Mathematics', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', '10th_class_ncert_old_math_book15198288641.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(9, 3, '2019-03-20 09:22:51.45', 'Physics', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'A_master_book15322474681.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(10, 3, '2019-03-20 09:22:51.48', 'Physics', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'A_master_book15322474692.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(11, 2, '2019-03-20 09:22:51.54', 'Advance Mathematics', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'Advanced_engineering_mathematics_Erwin_kreyszig15386601661.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(12, 5, '2019-03-20 09:22:51.57', 'Algorithm design', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'Algorithm_Design_by_Kleinberg_and_Tardos15134445931.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(13, 5, '2019-03-20 09:22:51.61', 'Artificial intelligence', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'Artificial_Intelligence_McGraw_Hill_Elaine_Rich15293092771.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(14, 5, '2019-03-20 09:22:51.65', 'Artificial intelligence', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'Artificial_Intelligence_Used_Book15008101551.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(15, 5, '2019-03-20 09:22:51.68', 'Artificial intelligence', 'sagar', 'Kishor Prakashan', 'Used', 'Free', 'it is very interesting book.', 'Artificial_Intelligence15293090661.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(16, 2, '2019-03-25 04:48:48.88', 'Mathematics', 'Sagar Meghani', 'Kishor Prakashan', 'Used', 'Free', 'xuSB', '10th_class_ncert_old_math_book15198288641.jpg', 'rs', '', '2019-04-10 12:18:34.56'),
(17, 5, '2019-04-11 05:29:12.57', 'aaa', 'Sagar Meghani', 'Atul Prakashan', 'Used', 'Free', 'hgsjadjbsba', '6_Month_Industrial_Training_In_Mohali15156119694.jpg', 'rs', 'rs224036', '2019-04-11 05:29:12.57'),
(19, 5, '2019-04-10 11:20:34.01', 'hello', 'sfuysg', 'webfuwb', 'Used', 'Free', 'suvsliuv', '6th_semister_all_etc_book15245684171.jpg', 'rs', 'rs224036', '2019-04-10 12:18:34.56');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `prod_cate_id` int(100) NOT NULL,
  `prod_cate_title` varchar(100) NOT NULL,
  `prod_cate_des` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`prod_cate_id`, `prod_cate_title`, `prod_cate_des`) VALUES
(1, 'Novel', 'A novel is a piece of long narrative in literary prose. Narrative prose is meant to entertain and tell a story. It is a description of a chain of events which includes a cast of characters, a setting,'),
(2, 'Mathematics', 'Topics in mathematics that every educated person needs to know to process, evaluate, and understand the numerical and graphical information in our society. Applications of mathematics in problem solvi'),
(3, 'Physics', 'Physics is the study of the natural world. It deals with the fundamental particles of which the universe is made, and the interactions between those particles, the objects composed of them (nuclei, at'),
(4, 'Chemistry', 'Central to chemistry is the interaction of one substance with another, such as in a chemical reaction, where a substance or substances are transformed into another. Chemistry primarily studies atoms a'),
(5, 'Computer', 'Computers are used to control large and small machines which in the past were controlled by humans. They are also in homes, where they are used for things such as listening to music, reading the news '),
(6, 'Other', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `resetp`
--

CREATE TABLE `resetp` (
  `reset_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schat`
--

CREATE TABLE `schat` (
  `chat_id` int(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `suname` varchar(100) NOT NULL,
  `runame` varchar(100) NOT NULL,
  `s_delete` varchar(100) NOT NULL,
  `r_delete` varchar(100) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `s_status` text NOT NULL,
  `r_status` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schat`
--

INSERT INTO `schat` (`chat_id`, `sname`, `rname`, `suname`, `runame`, `s_delete`, `r_delete`, `pro_id`, `s_status`, `r_status`, `status`) VALUES
(9, 'Rohit ', 'lol2 ', 'rs', 'lol2', 'delete', '', 1, '', '', ''),
(16, 'Rahul  Shekhawat', 'Rohit ', 'rs224036', 'rs', '', '', 17, 'ok', 'ok', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `eno` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `eno`, `uname`, `pass`) VALUES
(1, 'Rahul Shekhawat', '166490316556', 'rs224036', '3a2d7564baee79182ebc7b65084aabd1'),
(2, 'Riyaz Chauhan', '166490316513', 'Rk1401', '6fbae68d00eab04f2475119a1c3eae67');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`id`, `uname`, `pass`) VALUES
(7, 'rs224036', 'db2eb55e2b8f93557e068101cefd9284'),
(8, 'rahul', 'rs');

-- --------------------------------------------------------

--
-- Table structure for table `upload_image`
--

CREATE TABLE `upload_image` (
  `id` int(100) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_image`
--

INSERT INTO `upload_image` (`id`, `path`) VALUES
(1, 'uploads/3673706-anonymous-wallpaper-1366x768.jpg'),
(2, 'uploads/1st_and_2nd_semesters_Engineering_Book15220329331.jpg'),
(3, 'uploads/1st_and_2nd_semesters_Engineering_Book15220329331.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` text NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT 'N/A',
  `city` varchar(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `log_in` varchar(100) NOT NULL,
  `on_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `address`, `gender`, `phone`, `email`, `city`, `pin`, `username`, `password`, `log_in`, `on_time`) VALUES
(1, 'Rahul  Shekhawat', 'A/59, Gayatri 108, Society opp. Nagalpur College Mehsana-2', 'Male', 2147483647, 'rs224036@gmail.com', 'Mehsana', 384002, 'rs224036', 'db2eb55e2b8f93557e068101cefd9284', 'Offline', '2019-04-12 16:05:56'),
(28, 'Rohit ', 'hgsduygasidbakf ashbdas sajhbdjasbd', 'Male', 23423534, 'rs224036@gmail.com', 'Surat', 384002, 'rs', '3a2d7564baee79182ebc7b65084aabd1', 'Offline', '2019-04-12 16:07:33'),
(29, 'Rohan ', 'hasdiuasb ksabdias sakbdask', 'Male', 2147483647, 'rs224036@gmail.com', 'Ahemdabad', 67547, 'rohan', '3a2d7564baee79182ebc7b65084aabd1', 'Offline', '2019-03-29 04:36:39'),
(31, 'lol2 ', 'jhagdyuab', 'Male', 23423534, 'kadbajsdhb', 'Surat', 33423, 'lol2', '41df0f088fcc2e16ff5bb349470a7c8c', 'Offline', '2019-04-01 05:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_upload`
--

CREATE TABLE `user_upload` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_upload`
--

INSERT INTO `user_upload` (`id`, `name`, `path`) VALUES
(1, 'qwe', 'uploads/1st_and_2nd_semesters_Engineering_Book15220329331.jpg'),
(2, 'qwe', 'uploads/1st_and_2nd_semesters_Engineering_Book15220329331.jpg'),
(3, 'asd', 'uploads/php.jpg'),
(4, 'enc', 'uploads/EME.jpg'),
(5, 'pri', 'uploads/Capture1.PNG'),
(6, 'pritesh', 'uploads/1366x768-data_out_2_3478278-1366-x-768-wallpaper.jpg'),
(7, 'xyz', 'uploads/joker-best-quote-of-real-life-1188-likes-2-comments-joker-quotes-thejokersquote-on.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `cus`
--
ALTER TABLE `cus`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `lol`
--
ALTER TABLE `lol`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `my_data`
--
ALTER TABLE `my_data`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `my_item`
--
ALTER TABLE `my_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`prod_cate_id`);

--
-- Indexes for table `resetp`
--
ALTER TABLE `resetp`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `schat`
--
ALTER TABLE `schat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_image`
--
ALTER TABLE `upload_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_upload`
--
ALTER TABLE `user_upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cus`
--
ALTER TABLE `cus`
  MODIFY `cust_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `emp_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lol`
--
ALTER TABLE `lol`
  MODIFY `msg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `my_data`
--
ALTER TABLE `my_data`
  MODIFY `rollno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `my_item`
--
ALTER TABLE `my_item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `prod_cate_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resetp`
--
ALTER TABLE `resetp`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schat`
--
ALTER TABLE `schat`
  MODIFY `chat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `upload_image`
--
ALTER TABLE `upload_image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_upload`
--
ALTER TABLE `user_upload`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
