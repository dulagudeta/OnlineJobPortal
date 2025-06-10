-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 12:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bosa_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `logged_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `logged_at`) VALUES
(1, 4, 'New candidate registered: Dula Gemeda', '2025-05-08 15:45:11'),
(2, 5, 'New candidate registered: Dula G', '2025-05-08 15:46:08'),
(3, 2, 'Posted a job with title: Soft', '2025-05-09 16:20:31'),
(4, 2, 'Updated company profile', '2025-05-09 21:00:44'),
(5, 1, 'Updated profile information.', '2025-05-09 23:38:16'),
(6, 1, 'Application submitted.', '2025-05-10 08:52:25'),
(7, 1, 'Application submitted.', '2025-05-10 08:52:25'),
(8, 2, 'Posted a job with title: Soft', '2025-05-10 13:54:41'),
(9, 2, 'Posted a job with title: Soft', '2025-05-10 13:57:08'),
(10, 2, 'Posted a job with title: Soft', '2025-05-10 14:00:26'),
(11, 1, 'Updated profile information.', '2025-05-13 19:41:23'),
(12, 6, 'New candidate registered', '2025-05-13 19:42:15'),
(13, 7, 'New candidate registered', '2025-05-13 19:43:04'),
(14, 8, 'New candidate registered', '2025-05-13 19:44:18'),
(15, 8, 'Updated profile information.', '2025-05-13 19:46:07'),
(16, 7, 'Updated profile information.', '2025-05-13 19:48:03'),
(17, 6, 'Updated profile information.', '2025-05-13 19:49:34'),
(18, 6, 'Updated profile information.', '2025-05-13 19:50:56'),
(19, 1, 'Updated profile information.', '2025-05-13 19:52:19'),
(20, 8, 'Updated profile information.', '2025-05-13 19:52:57'),
(21, 7, 'Updated profile information.', '2025-05-13 19:54:05'),
(22, 9, 'New company registered', '2025-05-13 19:55:46'),
(23, 10, 'New company registered', '2025-05-13 19:56:47'),
(24, 10, 'Updated company profile', '2025-05-13 20:05:31'),
(25, 2, 'Updated company profile', '2025-05-13 20:07:04'),
(26, 9, 'Updated company profile', '2025-05-13 20:08:46'),
(27, 9, 'Posted a job with title: Ethiopian Red Cross Society (ERCS)', '2025-05-13 20:15:33'),
(28, 10, 'Posted a job with title: Software engineer', '2025-05-13 20:16:58'),
(29, 2, 'Posted a job with title: Junior Architect', '2025-05-15 08:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `application_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','reviewed','accepted','rejected') DEFAULT 'pending',
  `is_withdrawn` tinyint(1) DEFAULT 0,
  `withdraw_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `experience` enum('0-2 years','3-5 years','5+ years') DEFAULT NULL,
  `education` enum('High School','Bachelor''s Degree','Master''s Degree','PhD') DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `profile_picture` varchar(250) DEFAULT 'default.png',
  `resume` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `candidate_id`, `phone`, `country`, `address`, `field`, `experience`, `education`, `gender`, `summary`, `profile_picture`, `resume`, `created_at`) VALUES
(1, 1, '+251912345678', 'Ethiopia', 'Jimma', 'Soft', '0-2 years', 'High School', 'male', 'About me ', 'default.png', '', '2025-05-08 07:28:49'),
(2, 8, '+251912345678', 'Ethiopia', 'Building', 'Software Engineering', '0-2 years', 'High School', 'male', 'About me', 'default.png', '', '2025-05-13 16:44:44'),
(3, 7, '+251949259287', 'Ethiopia', 'Addis Abebe', 'Information Technology', '0-2 years', 'High School', 'male', 'About', 'default.png', '', '2025-05-13 16:46:27'),
(4, 6, '+251949259287', 'Ethiopia', 'Building', 'Computer Science', '5+ years', 'PhD', 'male', 'About', 'default.png', '', '2025-05-13 16:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `logo` varchar(250) DEFAULT 'logo.png',
  `contact` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `industry` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_id`, `logo`, `contact`, `location`, `website`, `description`, `created_at`, `updated_at`, `industry`) VALUES
(1, 2, 'logo.png', '+25190000000', 'Jimma', 'www.abeba.com', 'This part is the description about company.', '2025-05-08 07:30:53', '2025-05-13 17:07:04', 'Technology'),
(2, 10, 'logo.png', '+25190000000', 'Jimma', 'www.cynox.com', ' Cynox IT  is a special purpose vehicle established with a view to meeting the increasing demand for technology solutions and advisory services arising from Ethiopian’s embrace of technology as a developmental imperative.Cynox is a wholly indigenous Ethiopian company registered with the corporate affairs commission (CAC) to deliver technology solutions and provide advisory services to meet clients’ need for increased business performance through the deployment of technology. We offer a full range of technology solutions including but not limited to technology project management, supply and installation of information technology equipment, web services, software applications development and networking.Our firm is a young one peopled by top class professionals with backgrounds in Information Systems, Software Engineering, Telecommunications & Wireless Technologies, and an amazing zeal to succeed, all of which is brought to bear in our mode of service delivery which is specifically targeted at meeting the challenging aspirations of businesses.', '2025-05-13 16:59:53', '2025-05-13 18:30:24', 'FullStack Development'),
(3, 9, 'logo.png', '+25190000000', 'Addis Ababa', 'www.redcross.com', 'The Ethiopian Red Cross Society (ERCS), one of the 192 national Red Cross and Red Crescent societies around the world, was founded on July 8th, 1935, by government Decree, following the second Italian invasion of Ethiopia. It began by providing humanitarian services to wounded soldiers and civilian victims. That same year on the 25th of September 1935, ERCS was officially recognized as the 48th member of the International Federation of Red Cross and Red Crescent Societies.', '2025-05-13 17:07:59', '2025-05-13 18:32:20', 'NGO');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `salary` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `skill` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `title`, `location`, `salary`, `type`, `skill`, `description`, `deadline`, `created_at`, `updated_at`, `status`) VALUES
(6, 9, 'Membership Development Senior Officer', 'Jimma', '40000', 'full-time', 'Communication', 'The Membership Development Senior Officer will lead the development and execution of ERCS\'s membership programs, focusing on the recruitment, retention, and mobilization of members nationwide. This role involves cultivating a culture of member engagement while ensuring alignment with the humanitarian principles and mission of ERCS. The officer will implement innovative strategies, including digitalizing membership systems, to enhance operational efficiency, effectiveness, and accessibility.', '2025-05-31', '2025-05-13 17:15:33', '2025-05-15 06:37:04', 'approved'),
(7, 10, 'Backend Software Engineer (PHP)', 'Addis Ababa', '60000', 'part-time', 'Backend Developer (PHP)', 'We are seeking a skilled and motivated Backend Software Engineer with strong expertise in PHP to join our growing development team. In this role, you will be responsible for building and maintaining robust, scalable backend systems that power our web and mobile applications. You will work closely with frontend developers, product managers, and DevOps teams to deliver high-performance solutions that meet business goals.', '2025-05-31', '2025-05-13 17:16:58', '2025-05-15 06:36:33', 'approved'),
(8, 2, 'Junior Architect', 'Addis Ababa', '15000', 'part-time', 'Technical knowledge background in areas such as Datacenter, storage, datacom, optical, CCTV, ups, server, Virtualization, Cloud, Iaas, PaaS, SaaS, ..', '<h3><strong style=\"color: rgb(0, 0, 0);\">Job Overview:</strong></h3><p><span style=\"color: rgb(0, 0, 0);\">Ahadu Marble and Granite PLC, a prominent construction company based in Addis Ababa, Ethiopia, is seeking a Junior Architect to join their team. The company specializes in building construction and finishing services and is known for its quality and innovative approach. The Junior Architect will assist in the preparation of architectural designs, technical drawings, and project documentation using CAD software. This role also involves collaborating with project teams, contributing to design concepts, and supporting project management in meeting deadlines and delivering high-quality results. The ideal candidate will have a Bachelor\'s degree in Architecture, proficiency in CAD software, and strong problem-solving abilities. The position offers opportunities for professional development within a creative and collaborative work environment.</span></p><p><strong>Key Responsibilities:</strong></p><ul><li>Assist in the preparation of architectural designs, plans, and specifications.</li><li>Collaborate with project teams to develop design concepts and renderings.</li><li>Prepare technical drawings and documentation using CAD software.</li><li>Support the project management team in coordinating project timelines and deliverables.</li><li>Assist in site visits to assess project progress and compliance.</li></ul><p><br></p><p><br></p>', '2025-06-28', '2025-05-15 05:58:34', '2025-05-15 06:34:27', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','candidate','company') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Esmael Taju', 'abiko7000@gmail.com', '$2y$10$5eGsiRmBf2F.Y9iYNap1ku128JTctOvLPrkLVliMNU/PLlMUaXjDC', 'candidate', '2025-05-08 07:27:10'),
(2, 'abtech', 'taju298@gmail.com', '$2y$10$VFRGvJy8.YtfUoDwHkR0AuezRh/tH4j8kq./AQg/DdJB7iuZwsZyW', 'company', '2025-05-08 07:28:35'),
(3, 'Admin', 'admin@example.com', 'Admin1234', 'admin', '2025-05-08 11:16:36'),
(4, 'Dula Gemeda', 'dula@gmail.com', '$2y$10$uLeVBI8g4AQx8dfuWkDs0.IZMzRroRzPHXRbO56wkOcwwMtp084te', 'candidate', '2025-05-08 12:45:11'),
(5, 'Dula G', 'dul@gmail.com', '$2y$10$Yw4lv3KgcfPGowCIF.3np.xk9fzflzXIa/pLiU73A84bWuXqWsktC', 'candidate', '2025-05-08 12:46:08'),
(6, 'Chala Tolasa', 'chala@example.com', '$2y$10$daW2egcKwbtYsgZwslwywOBErt6sXetxt4RNHWjnTvF0OQZBOsRii', 'candidate', '2025-05-13 16:42:15'),
(7, 'Abebe Gemeda', 'abebe@gmail.com', '$2y$10$yk9jCoXg.DVWTAz.i5U7E.bw4jxS8rqa3hR5SgQL4/rGZL3nZFA6i', 'candidate', '2025-05-13 16:43:04'),
(8, 'Abdi Gemechu', 'abdi@gmail.com', '$2y$10$qEvlizlMbRB.wg3gN1oFqevo6Mtg.VgJdRMfH.TYQpyTHqdrCAPyS', 'candidate', '2025-05-13 16:44:18'),
(9, 'Red Cross', 'redcross@gmail.com', '$2y$10$2uzbm4Tdak5qGnhm3J/WWecfTSDhbuVTonZOAm7dMWTU4GBPVXCwi', 'company', '2025-05-13 16:55:46'),
(10, 'Cynox Technology', 'cynoox@gmail.com', '$2y$10$vh0IPRgSMxv6DsnoE3XJreQckfoxUpVsv7Yu7WIpkt6mDq2HuWGka', 'company', '2025-05-13 16:56:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
