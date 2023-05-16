-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 12:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eslam`
--

-- --------------------------------------------------------

--
-- Table structure for table `eslam_categories`
--

CREATE TABLE `eslam_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eslam_categories`
--

INSERT INTO `eslam_categories` (`id`, `parent_id`, `name_en`, `name_ar`, `slug`) VALUES
(1, 0, 'Title 1', 'إسم 2', '1684171998'),
(2, 0, 'Child', 'طفل', '1684172786'),
(3, 8, 'asd', 'asd', '1684172873'),
(4, 0, 'aaaa', 'aaaa', '1684182526'),
(5, 0, 'ssss', 'ssss', '1684182540'),
(6, 0, 'sssssax', 'asdasd', '1684182645'),
(7, 0, 'cccccc', 'ccccccc', '1684182655'),
(8, 0, 'sssssssssssssssd', 'sdsadasd', '1684182805');

-- --------------------------------------------------------

--
-- Table structure for table `eslam_comments`
--

CREATE TABLE `eslam_comments` (
  `id` int(11) NOT NULL,
  `port_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eslam_feedback`
--

CREATE TABLE `eslam_feedback` (
  `id` int(11) NOT NULL,
  `port_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eslam_messages`
--

CREATE TABLE `eslam_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `contact` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 => new\r\n1 => marked done',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eslam_permissions`
--

CREATE TABLE `eslam_permissions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eslam_permissions`
--

INSERT INTO `eslam_permissions` (`id`, `title`, `name`) VALUES
(1, 'Show Portfolio', 'portfolio'),
(2, 'Add New Portfolio', 'add_portfolio'),
(3, 'Edit/Delete Portfolio', 'edit_portfolio'),
(4, 'Show Categories', 'categories'),
(5, 'Add New Categories', 'add_categories'),
(6, 'Edit/Delete Categories', 'edit_categories'),
(7, 'Show Comments', 'comments'),
(8, 'Edit/Delete Comments', 'edit_comments'),
(9, 'Show Feedback', 'feedback'),
(10, 'Edit/Delete Feedback', 'edit_feedback'),
(11, 'Show Messages', 'messages'),
(12, 'Edit/Delete Messages', 'edit_messages'),
(13, 'Show Team', 'team'),
(14, 'Edit/Delete Team', 'edit_team'),
(16, 'Control Website Settings', 'settings');

-- --------------------------------------------------------

--
-- Table structure for table `eslam_portfolio`
--

CREATE TABLE `eslam_portfolio` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `photos` text NOT NULL,
  `videos` text NOT NULL,
  `panorama` text NOT NULL,
  `description_en` text NOT NULL,
  `description_ar` text NOT NULL,
  `date` date NOT NULL,
  `views` int(11) NOT NULL,
  `likes` int(50) NOT NULL,
  `port_slug` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 => hide\r\n1 => public ( default )',
  `cat_id` varchar(50) NOT NULL COMMENT 'it''s really the slug not the ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eslam_portfolio`
--

INSERT INTO `eslam_portfolio` (`id`, `title_en`, `title_ar`, `photos`, `videos`, `panorama`, `description_en`, `description_ar`, `date`, `views`, `likes`, `port_slug`, `status`, `cat_id`) VALUES
(2, 'aaaaa', 'zzz', '6463dc522a0840.74379273.webp', 'https://www.google.com/,https://www.google.com/asc,https://www.facebook.com/,,', '', 'asdasd\r\n', 'asdasd\r\n', '2023-05-16', 0, 0, 1684266062, 1, '1684172873'),
(3, 'asdasd', 'asdasd', '6463e64ac3af45.06569944.webp,6463dd244e8ce6.53763814.webp', 'https://www.google.com/asc,https://www.google.com/asdsadssss,https://www.google.com/asdsadsssszzzzzzzzzzz,https://www.google.com/asdsadsssszzzzzzzzzzzsaa7a', '6463e64f321812.56780248.webp', 'asdasd\r\n', 'asdsad\r\n', '2023-05-16', 0, 0, 1684266251, 0, '1684172873');

-- --------------------------------------------------------

--
-- Table structure for table `eslam_users`
--

CREATE TABLE `eslam_users` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `member_order` tinyint(4) NOT NULL,
  `pin` tinyint(4) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `job_en` varchar(255) NOT NULL,
  `job_ar` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eslam_users`
--

INSERT INTO `eslam_users` (`id`, `name_en`, `email`, `password`, `member_order`, `pin`, `name_ar`, `job_en`, `job_ar`, `facebook`, `whatsapp`, `photo`, `instagram`, `status`) VALUES
(1, 'Eslam', 'admin@yahoo.com', '$2y$10$eC2NfI7KS/HdI9Vi0HS3Ru0aKPwZtoK1rPJ79AgoCWdl2eMQG4Bq6', 0, 0, '', '', '', '', '', '', '', 1),
(2, 'Constance Williams', 'luduvosu@mailinator.com', '', 23, 1, 'Daryl Wilcox', 'Dolorem eveniet dic', 'Est qui distinctio ', 'Error quia dolor sed', 'Ipsa id consectetur', '1684269814/personalimg.webp', 'Itaque aut ut qui pe', 1),
(3, 'Sacha Sanchez', 'user@user.com', '$2y$10$O1Nljj0DfVUYy23Oni11ZOQPsE7mh.wXz/2CRF7Eym8vUvVjSFq2e', 98, 1, 'Mallory Ewing', 'Velit optio accusa', 'Non voluptas placeat', 'Ut temporibus dicta ', 'Dolores sit eos qui', '1684273732/personalimg.webp', 'Consequat Consequat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eslam_users_permissions`
--

CREATE TABLE `eslam_users_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eslam_users_permissions`
--

INSERT INTO `eslam_users_permissions` (`id`, `user_id`, `permission_id`) VALUES
(17, 3, 3),
(18, 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eslam_categories`
--
ALTER TABLE `eslam_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslam_comments`
--
ALTER TABLE `eslam_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `port_comment` (`port_id`);

--
-- Indexes for table `eslam_feedback`
--
ALTER TABLE `eslam_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslam_messages`
--
ALTER TABLE `eslam_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslam_permissions`
--
ALTER TABLE `eslam_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslam_portfolio`
--
ALTER TABLE `eslam_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslam_users`
--
ALTER TABLE `eslam_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslam_users_permissions`
--
ALTER TABLE `eslam_users_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_permission` (`user_id`),
  ADD KEY `permission_id_permission` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eslam_categories`
--
ALTER TABLE `eslam_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eslam_comments`
--
ALTER TABLE `eslam_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslam_feedback`
--
ALTER TABLE `eslam_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslam_messages`
--
ALTER TABLE `eslam_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslam_permissions`
--
ALTER TABLE `eslam_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `eslam_portfolio`
--
ALTER TABLE `eslam_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eslam_users`
--
ALTER TABLE `eslam_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eslam_users_permissions`
--
ALTER TABLE `eslam_users_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eslam_comments`
--
ALTER TABLE `eslam_comments`
  ADD CONSTRAINT `port_comment` FOREIGN KEY (`port_id`) REFERENCES `eslam_portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eslam_users_permissions`
--
ALTER TABLE `eslam_users_permissions`
  ADD CONSTRAINT `permission_id_permission` FOREIGN KEY (`permission_id`) REFERENCES `eslam_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_permission` FOREIGN KEY (`user_id`) REFERENCES `eslam_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
