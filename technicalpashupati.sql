-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 11:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technicalpashupati`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_form`
--

CREATE TABLE `admission_form` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(80) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `admit_to` varchar(100) NOT NULL,
  `previous_school` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `intro` varchar(500) NOT NULL,
  `registered_on` varchar(30) NOT NULL,
  `image_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admission_form`
--

INSERT INTO `admission_form` (`id`, `full_name`, `address`, `gender`, `dob`, `father_name`, `mother_name`, `admit_to`, `previous_school`, `email`, `phone`, `intro`, `registered_on`, `image_url`) VALUES
(5, 'Nishchal Acharya', 'bahra', 'Male', '2024-01-23', 'Unzali', 'Sabitra Niraula', '+2( Commerce )', 'Saraswati', 'anish@gmail.com', 'asf3242', 'sdfa', '20/01/2024 07:52 PM', NULL),
(6, 'Nishchal Acharya', 'bahra', 'Male', '2024-01-23', 'Unzali', 'Sabitra Niraula', '+2( Commerce )', 'Saraswati', 'anish@gmail.com', 'asf3242', 'sdfa', '20/01/2024 07:55 PM', NULL),
(7, 'Nishchal Acharya', 'Chakchaki 3', 'Female', '2024-01-30', 'Hari Niraulaad', 'Sabitra Niraulaad', '9 ( Nepali Medium )', 'Sundarpur', 'anish@gmail.com', '98170099789', 'safad asdf sdf ', '20/01/2024 08:03 PM', NULL),
(8, 'Nixal Acxarya', 'Bahradashi 3', 'Male', '2004-08-27', 'Naxer Axcarya', 'Jaxer Axcarya', '9 to 12( Computer Engineering )', 'Saraswati', 'A@gmail.com', '9817099134', 'I am Nishchal Acharya From jhapa...', '21/01/2024 11:24 AM', NULL),
(9, 'Nishchal Acharya', 'bahra', 'Male', '2024-01-04', 'Hari Niraula', 'Sabitra Niraula', 'Nursery', 'Saraswati', 'nischalacharya345@gmail.com', '98170099789', 'safd sdf  sda', '21/01/2024 05:07 PM', NULL),
(10, 'Anish Niraula', 'Rajgadh', 'Male', '2024-01-05', 'fada', 'mdfsdf', '8 ( Nepali Medium )', 'Saraswati', 'asdf@gmail.com', '2342342', 'Nichal dsf ', '21/01/2024 05:20 PM', NULL),
(11, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:22 PM', NULL),
(12, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:24 PM', NULL),
(13, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:24 PM', NULL),
(14, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:24 PM', NULL),
(15, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:25 PM', NULL),
(16, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:25 PM', NULL),
(17, 'Nishchal Acharya', 'sdf', 'Male', '2024-01-06', 'sdaf ', 'safsf', '10 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'saf sfaf sadf', '21/01/2024 05:25 PM', NULL),
(18, 'Nitin Sharma', 'Chakchaki', 'Male', '2003-11-12', 'Hari Sharma', 'Sabitra Sharma', '8 ( Nepali Medium )', 'Psdfa', 'nit@gmail.com', '42345345', 'Hello I am Nishchal Acharya', '21/01/2024 05:28 PM', NULL),
(19, 'saf', 'asfd ', 'Male', '2024-01-17', 'sdfa', 'adf', 'Nursery', 'sadf', 'a@g.com', '24224', 'aeasd dsf saf ', '21/01/2024 05:35 PM', NULL),
(20, 'saf', 'asfd ', 'Male', '2024-01-17', 'sdfa', 'adf', 'Nursery', 'sadf', 'a@g.com', '24224', 'aeasd dsf saf ', '23/01/2024 10:42 AM', NULL),
(21, 'Sekhar Ghimire', 'Birtamode 4', 'Male', '2021-05-11', 'Pratik baba', 'Pratik mummy', '10 ( Nepali Medium )', 'Gyan jyoti', 'pratik@gmail.com', '980171717012', 'I am Sekhar Ghimire. Iam from bahradashi 3. My previous school is gyan jyoti.', '23/01/2024 11:06 AM', 'https://nishchalacharya.com.np/img/hero.png'),
(22, 'Anish Niraula', 'bahra', 'Male', '2024-01-11', 'Hari Niraula', 'Sabitra Niraula', '6 ( Nepali Medium)', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'asdfsadf  sdf sa', '24/01/2024 01:52 PM', NULL),
(23, 'Anish Niraula', 'bahra', 'Male', '2024-01-11', 'Hari Niraula', 'Sabitra Niraula', '6 ( Nepali Medium)', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'asdfsadf  sdf sa', '24/01/2024 01:53 PM', NULL),
(24, 'Anish Niraula', 'bahra', 'Male', '2024-01-11', 'Hari Niraula', 'Sabitra Niraula', '6 ( Nepali Medium)', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'asdfsadf  sdf sa', '24/01/2024 01:56 PM', NULL),
(25, 'Anish Niraula', 'bahra', 'Male', '2024-01-11', 'Hari Niraula', 'Sabitra Niraula', '6 ( Nepali Medium)', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'asdfsadf  sdf sa', '24/01/2024 01:56 PM', NULL),
(26, 'asdf', 'bahra', 'Female', '2024-01-15', 'Unzali', 'Sabitra Niraula', 'Nursery', 'Saraswati', 'anish@gmail.com', '98170099789', 'saf sdf af sdf a', '24/01/2024 01:56 PM', NULL),
(27, 'Anish Niraula', 'Chakchaki 3', 'Male', '2024-01-15', 'Hari Niraula', 'Sabitra Niraula', '7 ( Nepali Medium )', 'Sundarpur', 'ujwal@gmail.com', '98170099789', 'sdf s f df adf ', '24/01/2024 01:59 PM', NULL),
(28, 'Anish Niraula', 'Chakchaki 3', 'Female', '2024-01-25', 'Hari Niraula', 'Sabitra Niraula', 'Nursery', 'Saraswati', 'nischalacharya345@gmail.com', '98170099789', ' dfg   faf  fsd sdf s gf sg ', '24/01/2024 02:04 PM', NULL),
(29, 'Anish Niraula', 'Chakchaki 3', 'Female', '2024-01-25', 'Hari Niraula', 'Sabitra Niraula', 'Nursery', 'Saraswati', 'nischalacharya345@gmail.com', '98170099789', ' dfg   faf  fsd sdf s gf sg ', '24/01/2024 02:04 PM', NULL),
(30, 'Anish Niraula', 'Chakchaki 3', 'Female', '2024-01-25', 'Hari Niraula', 'Sabitra Niraula', 'Nursery', 'Saraswati', 'nischalacharya345@gmail.com', '98170099789', ' dfg   faf  fsd sdf s gf sg ', '24/01/2024 02:04 PM', NULL),
(31, 'Anish Niraula', 'Chakchaki 3', 'Male', '2024-01-26', 'Hari Niraula', 'Unzala', 'Nursery', 'pdsfg', 'anish@gmail.com', '98170099789', 'fadf sadf asdf asdf ', '24/01/2024 02:19 PM', NULL),
(32, 'sfd', 'Chakchaki 3', 'Others', '2022-09-01', 'Hari Niraula', 'Sabitra Niraula', 'Nursery', 'Sundarpur', 'nischalacharya345@gmail.com', 'asf3242', 'sdfa sdfa sdf a', '01/02/2024 07:34 PM', NULL),
(34, 'Nakul Nirsinga', 'Bahradashi', 'Male', '2024-03-26', 'Hari don', 'Harica don', '9 ( Nepali Medium )', 'Little', 'niskal@gmail.com', '9817000000', 'Hello, I am Nishchal Acharya, My previous school was Saraswati.', '29/03/2024 11:57 AM', ''),
(35, 'Nakul Nirsinga', 'cow', 'Male', '2024-03-18', 'Hari don', 'Harica don', '10 ( Nepali Medium )', 'Little', 'niskal@gmail.com', '9817000000', 'asa asf adf adf af sadf a fadfaf fasdfaf a', '29/03/2024 12:01 PM', ''),
(36, 'Nakul Nirsinga', 'btm', 'Male', '2024-03-01', 'Hari don', 'Harica don', 'Nursery', 'Little', 'niskal@gmail.com', '9817000000', ' ? Here, you have the ability to adjust the class routine according to our dynamic schedule. ? Feel free to make necessary changes to ensure that our students receive the best possible education. ? ', '29/03/2024 12:07 PM', ''),
(37, 'Nakul Nirsinga', 'btm', 'Male', '2024-03-01', 'Hari don', 'Harica don', 'Nursery', 'Little', 'niskal@gmail.com', '9817000000', ' ? Here, you have the ability to adjust the class routine according to our dynamic schedule. ? Feel free to make necessary changes to ensure that our students receive the best possible education. ? ', '29/03/2024 12:15 PM', ''),
(38, 'Nakul Nirsinga', 'btm', 'Male', '2024-03-01', 'Hari don', 'Harica don', 'Nursery', 'Little', 'niskal@gmail.com', '9817000000', ' ? Here, you have the ability to adjust the class routine according to our dynamic schedule. ? Feel free to make necessary changes to ensure that our students receive the best possible education. ? ', '29/03/2024 12:17 PM', ''),
(39, 'Nakul Nirsinga', 'btm', 'Male', '2024-03-01', 'Hari don', 'Harica don', 'Nursery', 'Little', 'niskal@gmail.com', '9817000000', ' ? Here, you have the ability to adjust the class routine according to our dynamic schedule. ? Feel free to make necessary changes to ensure that our students receive the best possible education. ? ', '29/03/2024 12:20 PM', ''),
(40, 'Nakul Nirsinga', 'btm', 'Male', '2024-03-01', 'Hari don', 'Harica don', 'Nursery', 'Little', 'niskal@gmail.com', '9817000000', ' ? Here, you have the ability to adjust the class routine according to our dynamic schedule. ? Feel free to make necessary changes to ensure that our students receive the best possible education. ? ', '29/03/2024 12:26 PM', ''),
(41, 'Nakul Nirsinga', 'cow', 'Female', '2024-02-26', 'asf af', 'Harica don', '9 ( Nepali Medium )', 'Little', 'niskal@gmail.com', '9817000000', ' af f af afaf aith this PHP code, we\'re checking if the \"file-upload\" field exists in the $_FILES array before trying to access it. If it\'s not ', '29/03/2024 12:27 PM', ''),
(42, 'Nakul Nirsinga', 'cow', 'Female', '2024-02-26', 'asf af', 'Harica don', '9 ( Nepali Medium )', 'Little', 'niskal@gmail.com', '9817000000', ' af f af afaf aith this PHP code, we\'re checking if the \"file-upload\" field exists in the $_FILES array before trying to access it. If it\'s not ', '29/03/2024 12:28 PM', ''),
(43, 'Nakul Nirsinga', 'cow', 'Female', '2024-02-26', 'asf af', 'Harica don', '9 ( Nepali Medium )', 'Little', 'niskal@gmail.com', '9817000000', ' af f af afaf aith this PHP code, we\'re checking if the \"file-upload\" field exists in the $_FILES array before trying to access it. If it\'s not ', '29/03/2024 12:32 PM', ''),
(44, 'Nakul Nirsinga', 'btm', 'Male', '2024-02-27', 'asf af', 'Harica don', 'Nursery', 'Little', 'niskal@gmail.com', '9817000000', '<form class=\"hide_after_submission\" action=\"\" method=\"POST\" enctype=\"multipart/form-data\">\r\n', '29/03/2024 12:33 PM', '../assects/images/Registered_Students/2023_11_29_18_36_IMG_5542.JPG'),
(45, 'Nakul Nirsinga', 'cow', 'Male', '2024-03-04', 'asf af', 'Harica don', 'Nursery', '', 'niskal@gmail.com', '9817000000', '<form class=\"hide_after_submission\" action=\"\" method=\"POST\" enctype=\"multipart/form-data\">\r\n', '29/03/2024 12:35 PM', '../assects/images/Registered_Students/2023_11_29_18_37_IMG_5543.JPG'),
(46, 'Nakul Nirsinga', 'cow', 'Male', '2024-03-04', 'asf af', 'Harica don', 'Nursery', '', 'niskal@gmail.com', '9817000000', '<form class=\"hide_after_submission\" action=\"\" method=\"POST\" enctype=\"multipart/form-data\">\r\n', '29/03/2024 12:36 PM', '../assects/images/Registered_Students/2023_11_29_18_37_IMG_5543.JPG'),
(47, 'Nischal Acharya', 'Bahradashi 3', 'Male', '2024-03-27', 'Narayan Acharya', 'Januka Acharya', '6 ( English Medium )', 'Saraswati Secondary School', 'niskal@gmail.com', '9817000000', 'Hi, I\'m Nishchal Acharya. I am a computer engineering student with a strong interest in web and app development. I have a solid foundation in computer science principles and programming languages, and I am always looking for opportunities to expand my skillset and take on new challenges.', '29/03/2024 12:39 PM', ''),
(48, 'Nischal Acharya', 'Bahradashi 3', 'Male', '2024-03-27', 'Narayan Acharya', 'Januka Acharya', 'Nursery', '', '', '98170000000', 'Hi, I\'m Nishchal Acharya. I am a computer engineering student with a strong interest in web and app development. I have a solid foundation in computer science principles and programming languages, and I am always looking for opportunities to expand my skillset and take on new challenges.', '29/03/2024 12:45 PM', '../assects/images/Registered_Students/calen roshika.JPG'),
(49, 'Nischal Acharya', 'Jhapa', 'Male', '2024-04-05', 'Narayan Acharya', 'Januka Acharya', '9 to 12( Computer Engineering )', 'Saraswati Secondary School', 'niskal@gmail.com', '9817000000', 'I am Nischal Acharya I am from Bahradashi 3 Jhapa. ', '09/04/2024 06:02 PM', '../assects/images/Registered_Students/Charles-Babbage-Biography.webp');

-- --------------------------------------------------------

--
-- Table structure for table `contactfeedback`
--

CREATE TABLE `contactfeedback` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactfeedback`
--

INSERT INTO `contactfeedback` (`id`, `date`, `time`, `name`, `email`, `message`) VALUES
(35, '13/12/2023', '20:05', '234', 'nischalacharyayt@gmail.com', '32'),
(37, '13/12/2023', '20:05', 'Nischal Acharya', 'niroulaanish44@gmail.com', 'Y'),
(38, '13/12/2023', '21:18', 'Nischal Acharya', 'niroulaanish44@gmail.com', 'https://www.instagram.com/reel/C0QVwNsrFsl/?igshid=MzRlODBiNWFlZA=='),
(39, '13/12/2023', '21:28', 'userAdmin', 'nischalacharya345@gmail.com', 'Ha'),
(42, '14/01/2024', '20:18', 'Ujwal Acharya', 'ujwal@gmail.com', 'Get Free Reply all Icon SVG code vector files and use them in websites, apps (Android/IOS), ppt, and other useful projects. Customize & Download the Reply all Icon SVG file (HMTL/CSS) in different colors and sizes. Reply all SVG icon white, black, red, green, blue, transparent, and other colors.\r\n\r\n'),
(43, '18/01/2024', '11:36', 'Nischal', 'nischalacharya345@gmail.com', 'adfaffs'),
(44, '20/01/2024', '19:57', 'Nischal', 'Acharya@gmail', 'apple'),
(45, '24/01/2024', '14:10', 'Nischal', 'anish@gmail.com', ' sdf sad ff sdf as'),
(46, '24/01/2024', '14:14', 'Ujwal Acharya', 'ujwal@gmail.com', ' dsasf sda d'),
(47, '24/01/2024', '14:17', 'Ujwal Acharya', 'nischalacharya345@gmail.com', 'sdf a fa '),
(48, '13/03/2024', '20:25', 'Nischal', 'nischalacharya345@gmail.com', 'asfaafas'),
(49, '13/03/2024', '20:25', 'Ujwal Acharya', 'nischalacharya345@gmail.com', '23423weeafs'),
(50, '13/03/2024', '20:26', 'we we we ', 'anish@gmail.com', 'we we we we w eeeeeeeeeewewrerwer'),
(51, '14/04/2024', '07:23 AM', 'Nischal Acharya', 'nischalacharya@gmail.com', 'I am very happy to submit our final project');

-- --------------------------------------------------------

--
-- Table structure for table `flash_notice`
--

CREATE TABLE `flash_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `trun_flash` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flash_notice`
--

INSERT INTO `flash_notice` (`id`, `title`, `image_url`, `message`, `trun_flash`) VALUES
(1, 'Admission is open!!!', 'assects/images/flashNotice/2081.png', 'Admissions open for 2081 at Pashupati Technical College! Explore Computer Engineering and Management. Apply now for a bright future!', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album`
--

CREATE TABLE `gallery_album` (
  `id` int(11) NOT NULL,
  `album_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery_album`
--

INSERT INTO `gallery_album` (`id`, `album_name`) VALUES
(7, 'Staff'),
(8, 'Garden'),
(9, 'Group'),
(15, 'Nischal acharya');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `album` varchar(500) NOT NULL,
  `image_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `album`, `image_url`) VALUES
(1, 'Garden', 'assects/images/gallery/IMG-639805fff17712.83820280.jpg'),
(2, 'Garden', 'assects/images/gallery/IMG-639805e0d36ea7.70543595.jpg'),
(3, 'Garden', 'assects/images/gallery/IMG-639805f228df31.00031335.jpg'),
(4, 'Garden', 'assects/images/gallery/IMG-639805d41b8064.08183164.jpg'),
(5, 'Staff', 'assects/images/gallery/IMG-63997aaf939083.98227156.jpg'),
(6, 'Staff', 'assects/images/gallery/IMG-63997ae6d679b2.27593381.jpg'),
(7, 'Staff', 'assects/images/gallery/IMG-63997b04c1efa6.81194372.jpg'),
(8, 'Staff', 'assects/images/gallery/IMG-63997b6a728ba2.96846499.jpg'),
(9, 'Staff', 'assects/images/gallery/IMG-63997b26ac7b35.40094468.jpg'),
(10, 'Staff', 'assects/images/gallery/IMG-63997b9eb4ce91.02853355.jpg'),
(12, 'Group', 'assects/images/gallery/IMG-6397e763196d17.43031190.jpg'),
(13, 'Group', 'assects/images/gallery/joinus.png');

-- --------------------------------------------------------

--
-- Table structure for table `management_committee`
--

CREATE TABLE `management_committee` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `image_src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_committee`
--

INSERT INTO `management_committee` (`id`, `name`, `position`, `contact_no`, `image_src`) VALUES
(1, 'Yubaraj Rajbanshi', 'Chairman', '980000000', ''),
(2, 'Thir Kumar Dahal', 'Member Secretary', '9844640316', 'assects/images/pta/thirKumarDahal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manipulators`
--

CREATE TABLE `manipulators` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `identity_code` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(500) NOT NULL,
  `last_update` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manipulators`
--

INSERT INTO `manipulators` (`id`, `name`, `identity_code`, `password`, `image`, `last_update`) VALUES
(1, 'Pashupati \nAdministrator', '7267864', 'Nishchal_School@12', 'assects/images/admin_and_scribe/pashupati_admin.png', NULL),
(2, 'Nischal', '12345', '1234512345', 'assects/images/admin_and_scribe/Charles-Babbage-Biography.png', '09/04/2024 06:09 PM'),
(3, 'Please Update this to use', '&^*^&*%$#', '$%%%$##@%$', '', NULL),
(4, 'Please Update this to use', '%^&%&^**(*%', '&(*^&*^&*^%', '', NULL),
(5, 'Please Update this to use', '%$^%$%^$^^', ')(*&^%$#@!', '', '09/04/2024 05:58 PM'),
(6, 'Please Update this to use', '%&^%$&^%*(*', '!#^%$(&(*&&*%', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `page` varchar(30) NOT NULL,
  `site` varchar(20) NOT NULL,
  `total_notification` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `page`, `site`, `total_notification`) VALUES
(1, 'join_us', 'new_students', 5),
(2, 'contact_us', 'new_feedback', 3);

-- --------------------------------------------------------

--
-- Table structure for table `schoolroutine`
--

CREATE TABLE `schoolroutine` (
  `id` int(11) NOT NULL,
  `class` varchar(1000) DEFAULT NULL,
  `routine_url` varchar(1000) DEFAULT NULL,
  `last_modified` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schoolroutine`
--

INSERT INTO `schoolroutine` (`id`, `class`, `routine_url`, `last_modified`) VALUES
(1, 'Nursery', NULL, NULL),
(2, '1 ( English Medium )', NULL, NULL),
(3, '2 ( English Medium )', NULL, NULL),
(4, '3 ( English Medium )', NULL, NULL),
(5, '4 ( English Medium )', 'assects/images/Routines/Screenshot (7).png', '10:42 AM 29/03/2024'),
(6, '5 ( English Medium )', NULL, NULL),
(7, '6 ( English Medium )', NULL, NULL),
(8, '6 ( Nepali Medium )', NULL, NULL),
(9, '7 ( English Medium )', NULL, NULL),
(10, '7 ( Nepali Medium )', NULL, NULL),
(11, '8 ( English Medium )', NULL, NULL),
(12, '8 ( Nepali Medium )', NULL, NULL),
(13, '9 ( Nepali Medium )', NULL, NULL),
(14, '10 ( Nepali Medium )', NULL, NULL),
(15, '9 ( Computer Engineering )', NULL, NULL),
(16, '10 ( Computer Engineering )', NULL, NULL),
(17, '11 ( Computer Engineering )', NULL, NULL),
(18, '12 ( Computer Engineering )', NULL, NULL),
(19, '+2 ( Commerce )', 'assects/images/Routines/2023_12_23_14_02_IMG_6275.JPG', '11:40 AM 29/03/2024'),
(20, '+2 ( Computer Science )', 'assects/images/gallery/IMG-639805fff17712.83820280.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_notice`
--

CREATE TABLE `school_notice` (
  `id` int(11) NOT NULL,
  `logo` varchar(999) NOT NULL,
  `posted_by` varchar(50) NOT NULL,
  `image_url` varchar(999) NOT NULL,
  `about` varchar(500) NOT NULL,
  `notice_description` varchar(9999) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `total_views` int(10) NOT NULL,
  `total_downloads` int(10) NOT NULL,
  `last_modified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_notice`
--

INSERT INTO `school_notice` (`id`, `logo`, `posted_by`, `image_url`, `about`, `notice_description`, `date`, `time`, `total_views`, `total_downloads`, `last_modified`) VALUES
(106, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/Screenshot (2).png', 'Apple and ball are Friends', 'Welcome to Complete C Programming Course in Nepali, Here you will learn c  programming in Nepali from basic to advance. This Programming Course is designed for beginners and as well as developers who knows about c programming but want to explore more.  This video is only available in Nepali Language. sadf asf ', '26/12/2023', '08:41 PM', 11, 3, '10:13 AM 29/03/2024'),
(107, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/Screenshot (5).png', 'Windows hit the World', 'I am Nischal Acharya, from jahapa bahradashi 3 okay ', '29/03/2024', '10:11 AM', 0, 0, '10:12 AM 29/03/2024'),
(108, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/Screenshot (6).png', 'Windows hit the World', 'I am Nischal Acharya, from jahapa bahradashi 3 okay ', '29/03/2024', '10:12 AM', 0, 0, '10:12 AM 29/03/2024'),
(109, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/2023_12_23_14_02_IMG_6275.JPG', 'Windows hit the World', 'cursor-pointer cursor-pointer cursor-pointer cursor-pointer cursor-pointer cursor-pointer cursor-pointer cursor-pointer cursor-pointer ', '29/03/2024', '11:24 AM', 0, 0, 'Not Modified'),
(110, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/2023_12_23_14_02_IMG_6275.JPG', 'Windows hit the World', ' 🏫 Here, you have the ability to adjust the class routine according to our dynamic schedule. 💼 Feel free to make necessary changes to ensure that our students receive the best possible education. 📅 ', '29/03/2024', '11:41 AM', 0, 0, '11:42 AM 29/03/2024'),
(111, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/20240328_085033.jpg', 'This notice is published', 'Welcome to Gboard clipboard, any text that you copy will be saved here.Tap on a clip to paste it in the text box.', '29/03/2024', '02:11 PM', 0, 0, 'Not Modified'),
(112, 'assects/images/admin_and_scribe/pashupati_admin.png', 'Pashupati \nAdministrator', 'assects/images/notices_files/20240328_085033.jpg', 'This notice is published', 'Welcome to Gboard clipboard, any text that you copy will be saved here.Tap on a clip to paste it in the text box.', '29/03/2024', '08:09 PM', 0, 0, 'Not Modified'),
(113, 'assects/images/admin_and_scribe/Charles-Babbage-Biography.png', 'Nischal', 'assects/images/notices_files/sale.png', 'Windows hit the World', 'I am Nischal Acharya from Bahradashi 3 jhapa', '09/04/2024', '06:12 PM', 0, 0, 'Not Modified');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image_src` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `post`, `qualification`, `contact`, `image_src`) VALUES
(1, 'Thir Kumar Dahal', 'Principal', 'M.Ed', '9844640316', 'assects/images/pta/thirKumarDahal.jpg'),
(2, 'Supen Chandra Singh Rajbanshi', 'Teacher', 'MA / M.Ed', '9804903845', 'assects/images/staff/IMG-639aad4227d326.28248876.jpg'),
(3, 'Laxmi Kafle', 'Teacher', 'M.Ed', '9842438801', 'assects/images/staff/IMG-639aad71bc1723.67601627.jpg'),
(4, 'Sabita Rajbanshi\r\n', 'Teacher', 'M.Ed', '9860155878', 'assects/images/staff/IMG-639aad94333361.83266687.jpg'),
(5, 'Dilli Ram Bhattarai', 'Teacher', 'M.Ed', '9842751110', 'assects/images/staff/Dilli Ram Bhattarai.jpg'),
(6, 'Dambar Bahadur Basnet', 'Teacher', 'M.Ed', '9815948821', 'assects/images/staff/Dambar Bahadur Basnet.jpg'),
(7, 'Rabindra Prasad Sapkota', 'Teacher', 'MA/B.Ed', '9814951994', 'assects/images/staff/Rabindra Prasad Sapkota.jpg'),
(8, 'Mohan Bikram Oli', 'Teacher', 'M.Bs', '9808255803', 'assects/images/staff/Mohan Bikram Oli.jpg'),
(9, 'Er. Biswas Niroula', 'Teacher', 'BE', '9844651107', 'assects/images/staff/Er.Biswas Niroula.jpg'),
(10, 'Roshan Subedi', 'Teacher', 'M.Sc', '9824002944', 'assects/images/staff/Roshan Subedi.jpg'),
(11, 'Er. Umesh Thapa', 'Teacher', 'BE', '9862170772', 'assects/images/staff/Er. Umesh Thapa.jpg'),
(12, 'Kedar Sapkota', 'Teacher', 'M.Sc', '9816059993', 'assects/images/staff/Kedar Sapkota.jpg'),
(13, 'Er. Om Prakash Sah', 'Teacher', 'BE', '9863902980', 'assects/images/staff/omprakash.jpeg'),
(14, 'Er. Jitendra Mehta', 'Teacher', 'BE', '9804004968', 'assects/images/staff/mehatasir.png'),
(15, 'Mohalal Rajbanshi', 'Teacher', 'M.Ed', '9804913822', 'assects/images/staff/Mohalal Rajbanshi.jpg'),
(16, 'Megnath Bhurtel', 'Teacher', 'M.Ed', '9815924367', 'assects/images/staff/Megnath Bhurtel.jpg'),
(17, 'Umesh Gautam', 'Teacher', 'B.Sc CSIT', '9806031060', 'assects/images/staff/Umesh Gautam.jpg'),
(18, 'Rana Kumar Rajbanshi', 'Teacher', 'BA/BEd', '9804933688', 'assects/images/staff/Rana Kumar Rajbanshi.jpg'),
(19, 'Mahendra Prasad Rajbanshi', 'Teacher', 'IA', '9815082111', 'assects/images/staff/Mahendra Prasad Rajbanshi.jpg'),
(20, 'Sushila Dhungana', 'Teacher', 'MA/B.Ed', '9804945857', 'assects/images/staff/Sushila Dhungana.jpg'),
(21, 'Tulasa Bhandari', 'Teacher', 'M.Ed', '9804363575', 'assects/images/staff/Tulasa Bhandari.jpg'),
(22, 'Yasoda Rana Magar', 'Teacher', 'MA', '9817930982', 'assects/images/staff/Yasoda Rana Magar.jpg'),
(23, 'Shusma Mishra', 'Teacher', 'B.Bs/B.Ed', '9816003696', 'assects/images/staff/Shusma Mishra.jpg'),
(24, 'Anupa Niroula', 'Teacher', 'M.Ed', '9804950586', 'assects/images/staff/Anupa Niroula.jpg'),
(25, 'Sita Rajbanshi', 'Teacher', 'IA', '9824044758', 'assects/images/staff/Sita Rajbanshi.jpg'),
(26, 'Pabitra Kumari Rajbanshi', 'Teacher', 'M.Ed', '9814949445', 'assects/images/staff/Pabitra Kumari Rajbanshi.jpg'),
(27, 'Krishna Ghimire', 'Teacher', 'PCL', '9804708863', 'assects/images/staff/Krishna Ghimire.jpg'),
(28, 'Siddhant Prasad Dhakal', 'Teacher', 'M.Bs', '9817942068', 'assects/images/staff/Siddhant Prasad Dhakal.jpg'),
(29, 'Naresh Kumar Rajbanshi', 'Teacher', '+2', '9806049751', 'assects/images/staff/Naresh Kumar Rajbanshi.jpg'),
(30, 'Kamal Prasad Subedi', 'Teacher', 'I.Ad', '9815934800', 'assects/images/staff/Kamal Prasad Subedi.jpg'),
(31, 'Sharmananda Bhattarai', 'Teacher', 'M.Ed', '9804931105', 'assects/images/staff/Sharmananda Bhattarai.jpg'),
(34, 'Janaki Rajbanshi', 'Teacher', 'IA', '9816024744', 'assects/images/staff/Janaki Rajbanshi.jpg'),
(35, 'Bharat Oli', 'Lab Assistant', '+2', '9825959273', 'assects/images/staff/Bharat Oli.jpg'),
(36, 'Motilal Baral', 'Accountant', '+2', '9842074346', 'assects/images/staff/Motilal Baral.jpg'),
(37, 'Sitaram Bhandari', 'Office Assistant', 'SEE', '9807940880', 'assects/images/staff/Sitaram Bhandari.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `web_content`
--

CREATE TABLE `web_content` (
  `id` int(11) NOT NULL,
  `content_about` varchar(500) NOT NULL,
  `one` varchar(1000) NOT NULL,
  `two` varchar(1000) NOT NULL,
  `three` varchar(1000) NOT NULL,
  `four` varchar(1000) NOT NULL,
  `five` varchar(1000) NOT NULL,
  `six` varchar(1000) NOT NULL,
  `seven` varchar(1000) NOT NULL,
  `eight` varchar(1000) NOT NULL,
  `nine` varchar(500) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `eleven` varchar(500) NOT NULL,
  `twelve` varchar(500) NOT NULL,
  `thirteen` varchar(500) NOT NULL,
  `fourteen` varchar(500) NOT NULL,
  `fifteen` varchar(1000) NOT NULL,
  `sixteen` varchar(1000) NOT NULL,
  `seventeen` varchar(500) NOT NULL,
  `eighteen` varchar(500) NOT NULL,
  `ninteen` varchar(500) NOT NULL,
  `twenty` varchar(500) NOT NULL,
  `twentyone` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_content`
--

INSERT INTO `web_content` (`id`, `content_about`, `one`, `two`, `three`, `four`, `five`, `six`, `seven`, `eight`, `nine`, `ten`, `eleven`, `twelve`, `thirteen`, `fourteen`, `fifteen`, `sixteen`, `seventeen`, `eighteen`, `ninteen`, `twenty`, `twentyone`) VALUES
(1, 'index', 'We embrace students from diverse faiths, races, and backgrounds, offering enhanced facilities to cater to their educational requirements. As a dynamic and inspiring educational institution, our community school serves as a model for the broader learning community. We uphold the highest standards of education across various specializations, providing excellent teachers, quality support materials, and a welcoming atmosphere to foster skill development in students. Our educational reach extends from nursery to grade 12, including Computer Engineering courses for classes 9 to 12.', 'Numerous compelling reasons make us the ideal choice as your educators at Pashupati. Here, we provide: ', 'A highly qualified teacher is integral to our education system, making learning enjoyable and engaging. With innovative teaching techniques, our educators ensure swift and effective learning. Choose our team for an enlightening and tailored educational experience that enhances your learning journey.', 'Your study environment significantly influences learning effectiveness. A tidy, tranquil space aids information absorption. Our serene and clean setting promotes efficient studying, ensuring a positive impact on your academic focus and productivity', 'Digital learning leverages technologies such as multimedia and the internet, fostering comprehensive student development and enhancing societal digital literacy. Our offerings include audio-visual learning experiences and computer labs equipped with high-speed internet, enriching the educational journey.', 'Discover an educational haven where excellence meets innovation! Our school provides a vibrant environment that fuels curiosity and sparks creativity. With qualified teachers, state-of-the-art facilities, and a focus on holistic development, we pave the way for a bright future. Enroll today for an inspiring educational journey!', 'The school setting is highly invigorating, characterized by openness and brightness, and our staff members are truly exceptional. Our time spent in school is enjoyable, thanks to the presence of good-natured and approachable teachers. Within the school, we delve into a variety of topics that pique our interest and are relevant to our future endeavors. The presence of supportive teachers is instrumental in helping us comprehend and navigate challenges seamlessly. Additionally, the school frequently organizes extracurricular activities, contributing to the development of our interpersonal skills and more.', 'The inaugural batch of Computer Engineering, commencing from class 9, was initiated in the year 2078 B.S. Presently, we conduct regular engineering classes spanning from class 9 to class 11. Computer engineering, situated at the intersection of electrical engineering and computer science, amalgamates various facets of both disciplines essential for the development of computer hardware and software. This field not only employs techniques and principles from electrical engineering and computer science but also encompasses domains like artificial intelligence (AI), robotics, computer networks, computer architecture, and operating systems.', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'about', 'Shree Pashupati Technical Secondary School, established in 2019 B.S. in Bahradashi 3, Jhapa district, offers education from nursery to grade 12, including Computer Engineering from class 9 to 12. Led by Principal Mr. Thir Kumar Dahal and Vice Principal Mr. Gunanidhi Luitel, the school operates from 10 am to 4 pm (9:15 am to 4:45 pm for coaching classes). With nearly 50 staff and 1000 students, the campus provides a peaceful environment, including a large football ground and well-equipped classrooms. Basic facilities such as clean water, separate washrooms, and support for girls during periods are ensured. The school emphasizes practical learning, incorporating labs for computer, physics, chemistry, network, and electric experiments. Extracurricular activities like singing, dancing, quizzes, speeches, and essay writing are organized, contributing to the overall growth of obedient and polite students.', 'I\'m really excited to be the Principal at Shree Pashupati Technical Secondary School. Thanks to the Pashupati Management team for trusting me with this role. We\'re committed to giving top-notch education that inspires our students to love learning and become valuable members of society. Our goal is to help each student reach their full potential. Parents, feel free to drop by anytime to chat about your child\'s education. We\'re building a fantastic learning community here, where everyone is dedicated to excellence. I\'m here to lead the school with energy and passion to help us achieve our goals. Looking forward to a great journey together!', 'Our school rules focus on being polite, using common sense, and staying safe. We expect everyone to behave well and dress appropriately. If students don\'t follow these rules or struggle with their work, we address it seriously.', 'Be prepared for class each day', 'Be on time for school', 'Follow the teacher\'s directions the first time they are given', 'Be polite to the teacher and your classmates', 'Help keep the school environment clean and tidy', 'Have a good attitude', 'Complete homework and assignments on time', 'Respect other student\'s personal belongings', 'Treat others the way you want to be treated', 'Always use your inside voice. (No yelling)', 'Shree Pashupati Technical Secondary School offers courses from nursery to grade 12, including specialized Computer Engineering classes (grades 9-12). Our emphasis on practical learning is evident in well-equipped labs for computer, physics, chemistry, network, and electric studies. We prioritize innovation with digital learning, CCTV-equipped classrooms, and activities to enhance writing and public speaking skills.', 'The inaugural batch of Computer Engineering at Shree Pashupati Technical Secondary School began in 2076 B.S., starting from class 9. Currently, we offer regular classes in engineering spanning from class 9 to class 12. Computer engineering, a branch of electrical engineering and computer science, integrates various fields essential for the development of computer hardware and software. The curriculum encompasses principles of electrical engineering and computer science, along with areas like artificial intelligence, robotics, computer networks, architecture, and operating systems.', 'Management, in essence, involves overseeing and directing an organization\'s functions. A management course signals your commitment to growing as a manager, instilling confidence in your team. It goes beyond handling singular activities, encompassing the control of both things and people. The scope spans across various organizations, from private institutions to government bodies, schools to universities, and profit-driven businesses to non-profit organizations. Recognizing the significance of this field, our campus offers courses in management to equip individuals with the essential skills for effective organizational leadership.', ' Our school boasts state-of-the-art facilities, including a Physics Lab for hands-on experiments, a Computer Lab for programming and projects, and other specialized labs, all contributing to an enriched learning environment.', 'Our well-managed physics lab caters to the needs of students up to grade 12, starting their practical experiments from class 6. Equipped with modern apparatus such as lenses, magnets, and advanced tools like voltmeters, the lab accommodates 15 students working in pairs.', 'Specifically designed for programming and project works, the computer lab supports engineering students and provides information about computer technology to general students. The lab, equipped with the latest computers, is supervised by a lab assistant who aids students in their projects and tasks.', 'This laboratory is designed to facilitate the general electronics engineering experiments and project works by the students. The laboratory has workstations each equipped with laboratory power supply, and oscilloscope. Most of the general purpose electronic components are kept in the stock and are issued as per the need of students.', 'Our extensive library boasts a collection of textbooks, reference books, study materials, newspapers, and magazines. With around 1000 books available for reference, students can use the library reading room for uninterrupted reading or borrow books for self-study.'),
(3, 'notice', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'contactus', 'Welcome to Shree Pashupati Technical Secondary School, a hub of dynamic education where diversity converges, creating an enriching and inspiring learning environment. For inquiries, enrollment details, or any information about our courses, feel free to contact us.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'join', 'Unlock a world of boundless opportunities at Shree Pashupati Technical Secondary School! Calling all students to embark on a transformative educational journey with us. Enroll now and experience dynamic learning in a vibrant and inspiring environment. Explore your potential, fuel your passion, and join our community where success begins. Contact us for enrollment details and step into a future of academic excellence!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'extras', 'This page at Pashupati Technical School/College captures vibrant moments events, picnics, and lasting memories. Aligned with the National Education Policy, our daily routine, holidays, and diverse subjects enrich our academic journey. A digital repository grants access to any book, and our staff, committee, and PTA ensure a supportive environment. Noteworthy, our students developed the website, a portal to our dynamic educational community.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_form`
--
ALTER TABLE `admission_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactfeedback`
--
ALTER TABLE `contactfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_notice`
--
ALTER TABLE `flash_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_album`
--
ALTER TABLE `gallery_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_committee`
--
ALTER TABLE `management_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manipulators`
--
ALTER TABLE `manipulators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolroutine`
--
ALTER TABLE `schoolroutine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_notice`
--
ALTER TABLE `school_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_content`
--
ALTER TABLE `web_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_form`
--
ALTER TABLE `admission_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contactfeedback`
--
ALTER TABLE `contactfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `flash_notice`
--
ALTER TABLE `flash_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_album`
--
ALTER TABLE `gallery_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `management_committee`
--
ALTER TABLE `management_committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manipulators`
--
ALTER TABLE `manipulators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolroutine`
--
ALTER TABLE `schoolroutine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `school_notice`
--
ALTER TABLE `school_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `web_content`
--
ALTER TABLE `web_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
