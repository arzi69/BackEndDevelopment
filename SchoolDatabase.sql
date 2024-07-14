-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2024 at 08:11 PM
-- Server version: 8.0.37-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SchoolDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `class_id` int NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `capacity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`class_id`, `class_name`, `capacity`) VALUES
(39, 'Integrated Year One', 74),
(40, 'Nursery', 45),
(41, 'KS1-Year One', 56),
(42, 'KS1-Year Two', 39),
(43, 'Year 3A', 67),
(44, 'Year 3B', 48),
(45, 'Year Four', 53),
(46, 'Year 5', 51),
(47, 'KS2-Year 6', 46),
(48, 'KS3-Year 7', 58),
(49, 'KS3-Year 8', 68),
(50, 'KS3-Year 9', 62),
(51, 'KS4-Year 10', 71),
(54, 'KS5-Year 11', 98);

-- --------------------------------------------------------

--
-- Table structure for table `Library_Book`
--

CREATE TABLE `Library_Book` (
  `book_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `available` tinyint(1) DEFAULT '1',
  `pupil_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Library_Book`
--

INSERT INTO `Library_Book` (`book_id`, `title`, `author`, `isbn`, `available`, `pupil_id`) VALUES
(587, 'The Lado King', 'Lado Rani', '099865437', 2, 115),
(588, 'To Kill a Mockingbird', 'Harper Lee', '9780061120084', 4, 116),
(589, '1984', 'George Orwell', '9780451524935', 3, 117),
(590, 'Pride and Prejudice', 'Jane Austen', '9781503290563', 5, 118),
(591, 'The Great Gatsby', 'Scott Fitzgerald', '9780743273565', 2, 119),
(592, 'Moby-Dick', 'Herman Melville', '9781503280786', 6, 120),
(593, 'War and Peace', 'Leo Tolstoy', '9780199232765', 7, 121),
(594, 'The Catcher in the Rye', 'J.D. Salinger', '9780316769488', 5, 122),
(595, 'The Hobbit', 'J.R.R. Tolkien', '9780547928227', 8, 123),
(596, 'Crime and Punishment', 'Fyodor Dostoevsky', '9780140449136', 10, 124),
(597, 'The Odyssey', 'Homer, translated by Robert Fagles', '9780140268867', 4, 125),
(598, 'Brave New World', 'Aldous Huxley', '9780060850524', 6, 126),
(599, 'The Brothers Karamazov', 'Charlotte Brontë', '9780141441146', 11, 127),
(601, 'Dark Nights', 'Lado Rani Gonzalo', '975539876', 8, 129);

-- --------------------------------------------------------

--
-- Table structure for table `Parent`
--

CREATE TABLE `Parent` (
  `parent_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Parent`
--

INSERT INTO `Parent` (`parent_id`, `name`, `address`, `email`, `telephone`) VALUES
(106, 'Khalid Mehmood', 'Multi Garden B-17 Islamabad, Pakistan', 'khalidmehmood207@gmail.com', '03333828044'),
(107, 'Munir Abbasi', 'Bella Noor Shah, Muzaffrabad', 'abbasi07@gmail.com', '045678923'),
(108, 'Raiz Mughal', 'Wadiye Atshal, Azad Kashmir', 'mughal109@gmail.com', '097584324'),
(109, 'Kinza Haider', 'Block-B, North Nazimabad, Karachi', 'kinzahaider56@gmail.com', '094567322'),
(110, 'Imran Khan', 'Bani Gala, Islamabad, Pakistan', 'imrankhan34@gmail.com', '056748321'),
(111, 'Mimi Khattak', 'G-13, Islamabad, Pakistan', 'mimikhattak306@gmail.com', '094563721'),
(112, 'Kashi Wheeler', 'Gujjar Nala, Nazimabad, Karachi', 'kashi307@gmail.com', '095674321'),
(113, 'Ghaffoor Danger', 'Korangi NO 7, Karachi, Pakistan ', 'ghaffordanger23@gmail.com', '056743289'),
(114, 'Hafsa Ali', 'Disco Bakery- Near Petrol Pump, Karachi', 'hafsaali2@gmail.com', '09567432'),
(115, 'Saleem Chariya', 'Street No 4, Sector 2, Naval Colony, Karachi', 'chariya510@gmail.com', '056748329'),
(116, 'Shoaib Mullan', 'D-14 A, Bara Board, Karachi', 'shoaibmullan302@gmail.com', '056743281'),
(117, 'Usma Janzaib', 'Block-A, Gulshan e Iqbal, Karachi', 'janzaibusma34@gmail.com', '08567403'),
(118, 'Qadir Baloch', 'Chakiwara, Liyari, Karachi', 'qadirdada306@gmail.com', '095674832'),
(121, 'Ali Khan Qureshi', 'Parh - Barbeen Boi, Abootabad', 'alikhanqureshi09@gmail.com', '03229295887');

-- --------------------------------------------------------

--
-- Table structure for table `Pupil`
--

CREATE TABLE `Pupil` (
  `pupil_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `medical_info` varchar(255) DEFAULT NULL,
  `class_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Pupil`
--

INSERT INTO `Pupil` (`pupil_id`, `name`, `address`, `medical_info`, `class_id`) VALUES
(115, 'Arzish Khalid', 'HBCHS - Naval Colony, Karachi, Pakistan', 'Clean', 39),
(116, 'Aaqib Munir', 'Bella Noor Shah, Muzaffrabad', 'Clean', 40),
(117, 'Hamza Raiz', 'Wadiye Atshal, Azad Kashmir', 'Clean', 41),
(118, 'Jawad Haji', 'Block-B, North Nazimabad, Karachi', 'Clean', 42),
(119, ' Sulaiman Isa Khan', 'Bani Gala, Islamabad, Pakistan', 'Clean', 43),
(120, 'Bonito Chinto AD', 'G-13, Islamabad, Pakistan', 'Clean', 44),
(121, 'Babu Seventy', 'Gujjar Nala, Nazimabad, Karachi', 'Clean', 45),
(122, 'Qazi Danger', 'Korangi NO 7, karacchi, Pakistan', 'Clean', 46),
(123, 'Noor Hafsa', 'Disco Bakery- Near Petrol Pump, Karachi', 'Clean', 47),
(124, 'Shafeeq Chariya', 'Street No 4, Sector 2, Naval Colony, Karachi', 'Clean', 48),
(125, 'Tariq Khattak', 'D-14 A, Bara Board, Karachi', 'Clean', 49),
(126, 'Palwasha Usma', 'Block-A, Gulshan e Iqbal, Karachi', 'Clean', 50),
(127, 'Sultan Baloch', 'Chakiwara, Liyari, Karachi', 'Clean', 51),
(129, 'Khalid Ali Khan', 'Parh - Barbeen Boi, Abootabad', 'Clean', 54);

-- --------------------------------------------------------

--
-- Table structure for table `Pupil_Parent`
--

CREATE TABLE `Pupil_Parent` (
  `pupil_id` int NOT NULL,
  `parent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Pupil_Parent`
--

INSERT INTO `Pupil_Parent` (`pupil_id`, `parent_id`) VALUES
(115, 106),
(116, 107),
(117, 108),
(118, 109),
(119, 110),
(120, 111),
(121, 112),
(122, 113),
(123, 114),
(124, 115),
(125, 116),
(126, 117),
(127, 118),
(129, 121);

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `teacher_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `annual_salary` float DEFAULT NULL,
  `background_check` varchar(255) DEFAULT NULL,
  `class_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`teacher_id`, `name`, `address`, `phone_number`, `annual_salary`, `background_check`, `class_id`) VALUES
(149, 'Ngozi Nneke', 'Abuja, Nigeria-Federal Capital Territory', '08564738', 99000, 'Clean', 39),
(150, 'Afzal Mushtaq', 'B-302, Ayesha Manzil, Karachi', '095674832', 93000, 'Clean', 40),
(151, 'Nadeem Kallu', 'L Patti, Dawood Goat, Karachi', '06785432', 91000, 'Clean', 41),
(152, 'Jaun Elia', 'Sakhi Hassan Qabristan, Karachi', '067854329', 95000, 'Clean', 42),
(153, 'Haziq Podri', 'Hamdard Haspatal, Saddar Karachi', '067583243', 88000, 'Clean', 43),
(154, 'Rehman Gujjar', 'Liaqtabad, Street 23, Karachi', '057438322', 45999, 'Clean', 44),
(155, 'Lado Rani', 'Naval Colony, HBCHS, Karachi', '07440160274', 100000, 'Clean', 45),
(156, 'Ahsan Steven', 'Canberra Chowk, Sorab Goat, Karachi', '0457832123', 990000, 'Clean', 46),
(157, 'Aman Khalid', 'Multi Garden B-17 Islamabad, Pakistan', '3132139116', 990000, 'Clean', 47),
(158, 'Sajid Khan', 'Drinkser Water Street, Gulshan e Iqbal, Karachi', '095647382', 98000, 'Clean', 48),
(159, 'Haji Mushtaq', '24 Market, Saeedabad, Karachi', '045783922', 89000, 'Clean', 49),
(160, 'Nasir Charsi', 'Street 7, Naval Colony Hub River Road Karachi', '0456783921', 79000, 'Clean', 50),
(161, 'Nimra Shapatar', 'Korangi, 302, Karachi', '096758432', 70000, 'Clean', 51),
(163, 'Tony Shapatar', 'Picadilly, North Nazimabad, Karachi', '096467322', 76000, 'Clean', 54);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `Library_Book`
--
ALTER TABLE `Library_Book`
  ADD PRIMARY KEY (`book_id`) USING BTREE,
  ADD KEY `pupilid_fk` (`pupil_id`);

--
-- Indexes for table `Parent`
--
ALTER TABLE `Parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `Pupil`
--
ALTER TABLE `Pupil`
  ADD PRIMARY KEY (`pupil_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `Pupil_Parent`
--
ALTER TABLE `Pupil_Parent`
  ADD KEY `parent_id` (`parent_id`) USING BTREE,
  ADD KEY `pupil_id` (`pupil_id`) USING BTREE;

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `class_id` (`class_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `class_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `Library_Book`
--
ALTER TABLE `Library_Book`
  MODIFY `book_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `Parent`
--
ALTER TABLE `Parent`
  MODIFY `parent_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `Pupil`
--
ALTER TABLE `Pupil`
  MODIFY `pupil_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Library_Book`
--
ALTER TABLE `Library_Book`
  ADD CONSTRAINT `pupilid_fk` FOREIGN KEY (`pupil_id`) REFERENCES `Pupil` (`pupil_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Pupil`
--
ALTER TABLE `Pupil`
  ADD CONSTRAINT `Pupil_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `Pupil_Parent`
--
ALTER TABLE `Pupil_Parent`
  ADD CONSTRAINT `Pupil_Parent_ibfk_1` FOREIGN KEY (`pupil_id`) REFERENCES `Pupil` (`pupil_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Pupil_Parent_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `Parent` (`parent_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD CONSTRAINT `Teacher_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
