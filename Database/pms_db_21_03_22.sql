-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 11:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `activity_id` int(14) NOT NULL,
  `activity_desc` varchar(5000) NOT NULL,
  `activity_by` varchar(500) NOT NULL,
  `activity_date` datetime NOT NULL DEFAULT current_timestamp(),
  `project_id` int(14) NOT NULL,
  `activity_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`activity_id`, `activity_desc`, `activity_by`, `activity_date`, `project_id`, `activity_type`) VALUES
(1, 'Vinu changed title of task \'New\' to New22 ', '', '2022-03-06 10:51:03', 0, 'task'),
(2, 'Vinu changed description of task \'New22\'', '', '2022-03-06 10:51:03', 0, 'task'),
(3, 'Vinu changed title of task \'New22\' to New ', '', '2022-03-06 10:51:49', 27, 'task'),
(4, 'Vinu changed description of task \'New\'', '', '2022-03-06 10:51:49', 27, 'task'),
(5, 'Mrudul changed status of task \'Create login page\' to Development ', '', '2022-03-06 10:52:53', 26, 'task'),
(6, 'Mrudul added a new task \'New Task\'', '17', '2022-03-06 10:53:36', 26, 'task'),
(7, 'Mrudul changed status of task \'Signup page bug fix\r\n\' to Completed ', '', '2022-03-05 11:02:11', 26, 'task'),
(8, 'Mrudul add an attachment to task \'New Task\'', '', '2022-03-06 11:10:13', 26, 'file'),
(9, 'Frank changed status of task \'New Task\' to Backlog ', '', '2022-03-06 14:57:14', 28, 'task'),
(10, 'Vinu added a new task \' Design Cart Page\'', '2', '2022-03-06 14:58:56', 28, 'task'),
(11, 'Vinu added a new task \'Manager Task\'', '2', '2022-03-06 15:18:29', 27, 'task'),
(12, 'Vinu changed status of task \'New\' to Development ', '', '2022-03-07 09:23:16', 27, 'task'),
(13, 'Vinu add an attachment to task \'Manager Task\'', '', '2022-03-07 09:32:18', 27, 'file'),
(14, 'Vinu changed status of task \'Manager Task\' to Development ', '', '2022-03-07 11:33:59', 27, 'task'),
(15, 'Vinu changed status of task \'New\' to Backlog ', '', '2022-03-07 12:40:52', 27, 'task'),
(16, 'Vinu deleted task \'Manager Task\'', '2', '2022-03-07 12:41:04', 0, 'task'),
(17, 'Vinu changed status of task \'New Task\' to Completed ', '', '2022-03-07 13:08:22', 0, 'task'),
(18, 'Vinu changed status of task \'New\' to Development ', '', '2022-03-07 13:09:13', 27, 'task'),
(19, 'Vinu add an attachment to task \'New\'', '', '2022-03-07 13:11:02', 27, 'file');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `start`, `end`) VALUES
(25, 'Client Meeting', '2021-12-16', '2021-12-17'),
(26, 'Review Meeting', '2021-12-17', '2021-12-18'),
(27, 'Designer Meeting', '2021-12-17', '2021-12-18'),
(28, 'Start Development', '2021-12-18', '2021-12-19'),
(29, 'hello', '2021-12-10', '2021-12-11'),
(30, 'New event', '2022-03-05', '2022-03-06'),
(31, 'Event 1', '2022-03-06', '2022-03-07'),
(32, 'Event 2', '2022-03-07', '2022-03-08'),
(33, 'Event 1.1', '2022-03-06', '2022-03-07'),
(34, 'Event 3', '2022-03-08', '2022-03-09'),
(35, 'Event 3.1', '2022-03-08', '2022-03-09'),
(36, 'Event 2.1', '2022-03-07', '2022-03-08'),
(37, 'event', '2022-03-09', '2022-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(15) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `uploaded_by_id` int(15) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp(),
  `team_id` int(15) NOT NULL,
  `project_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_name`, `file_size`, `uploaded_by_id`, `uploaded_date`, `team_id`, `project_id`) VALUES
(32, 'b3.pdf', '164.92 KB', 2, '2021-12-17', 0, 28),
(33, 'intellipaat-certificate_2.pdf', '14.95 KB', 25, '2021-12-19', 0, 26),
(34, 'Provisional_Certificate_T32556HOHC00031.pdf', '299.62 KB', 2, '2022-02-27', 0, 27),
(35, '232919.jpg', '76.17 KB', 17, '2022-03-06', 49, 26),
(36, 'captain_america_movie_2011-wallpaper-1366x768.jpg', '491.96 KB', 2, '2022-03-07', 0, 27),
(37, 'color_t3_by_eisanka_da8tip0.png', '1.18 MB', 2, '2022-03-07', 0, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invitation`
--

CREATE TABLE `tbl_invitation` (
  `invitation_id` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `team_id` int(15) NOT NULL,
  `referral_id` varchar(100) NOT NULL,
  `invite_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invitation`
--

INSERT INTO `tbl_invitation` (`invitation_id`, `email`, `team_id`, `referral_id`, `invite_status`) VALUES
(10, 'nikkygeorgephilip2018@gmail.com', 49, 'e82df4f765325374c7b19abb8435d5ab', 1),
(11, 'liginabraham@mca.ajce.in', 50, 'e82df4f765325374c7b19abb8435d5ab', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `project_id` int(15) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_description` varchar(500) NOT NULL,
  `project_created_date` varchar(10) NOT NULL,
  `project_start_date` varchar(10) NOT NULL,
  `project_end_date` varchar(10) NOT NULL,
  `project_status` int(10) NOT NULL DEFAULT 0,
  `project_priority` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`project_id`, `project_name`, `project_description`, `project_created_date`, `project_start_date`, `project_end_date`, `project_status`, `project_priority`) VALUES
(26, 'Website', 'Website', '17-12-2021', '2021-12-18', '2021-12-24', 1, 2),
(27, 'New Project', 'New Project', '17-12-2021', '2021-12-18', '2021-12-30', 1, 1),
(28, 'Sample Project', 'Sample Project', '17-12-2021', '2021-12-17', '2021-12-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `task_id` int(15) NOT NULL,
  `task_title` varchar(300) NOT NULL,
  `task_description` varchar(500) NOT NULL,
  `team_id` int(15) NOT NULL,
  `task_added_by` int(15) NOT NULL,
  `task_status` int(11) NOT NULL,
  `project_id` int(15) NOT NULL,
  `task_created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`task_id`, `task_title`, `task_description`, `team_id`, `task_added_by`, `task_status`, `project_id`, `task_created_at`) VALUES
(12, 'Create login page', 'Create login page with validation', 49, 28, 2, 26, '2021-12-17'),
(13, 'New Task', 'New Task', 51, 2, 4, 27, '2021-12-17'),
(14, 'New Task', 'New Task', 52, 2, 1, 28, '2021-12-17'),
(15, 'Signup page bug fix\r\n', 'Signup page bug fix', 49, 25, 4, 26, '2021-12-19'),
(16, 'Home page', 'Home page', 50, 25, 2, 26, '2021-12-19'),
(18, 'New', 'Newwww', 51, 2, 2, 27, '2022-03-06'),
(37, 'New Task', 'This is a new Task', 0, 17, 4, 26, '2022-03-06'),
(38, ' Design Cart Page', ' Design Cart Page', 52, 2, 1, 28, '2022-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_allocation`
--

CREATE TABLE `tbl_task_allocation` (
  `task_allocation_id` int(15) NOT NULL,
  `team_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_status`
--

CREATE TABLE `tbl_task_status` (
  `task_status_id` int(11) NOT NULL,
  `task_status_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_task_status`
--

INSERT INTO `tbl_task_status` (`task_status_id`, `task_status_title`) VALUES
(1, 'backlog'),
(2, 'development'),
(3, 'testing'),
(4, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `team_id` int(10) NOT NULL,
  `team_title` varchar(50) NOT NULL,
  `manager_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teams`
--

INSERT INTO `tbl_teams` (`team_id`, `team_title`, `manager_id`) VALUES
(49, 'Development Team', 25),
(50, 'Design Team', 25),
(51, 'Marketing', 2),
(52, 'Design', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_allocation`
--

CREATE TABLE `tbl_team_allocation` (
  `team_allocation_id` int(10) NOT NULL,
  `team_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `project_manager` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_team_allocation`
--

INSERT INTO `tbl_team_allocation` (`team_allocation_id`, `team_id`, `project_id`, `project_manager`) VALUES
(36, 49, 26, 25),
(37, 51, 27, 2),
(38, 52, 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_members`
--

CREATE TABLE `tbl_team_members` (
  `member_id` int(10) NOT NULL,
  `team_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_team_members`
--

INSERT INTO `tbl_team_members` (`member_id`, `team_id`, `user_id`) VALUES
(37, 49, 3),
(38, 49, 17),
(39, 50, 23),
(40, 49, 28),
(41, 51, 24),
(42, 52, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_created_at` varchar(10) NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT 1,
  `type_id` int(10) NOT NULL,
  `team_id` int(20) NOT NULL,
  `profile_pic` varchar(300) NOT NULL DEFAULT 'defaultuser.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `mob`, `email`, `dob`, `password`, `user_created_at`, `user_status`, `type_id`, `team_id`, `profile_pic`) VALUES
(1, 'Admin', '9963215473', 'admin@easeit.com', '', '0e7517141fb53f21ee439b355b5a1d0a', '22-09-21', 1, 1, 0, 'defaultuser.png'),
(2, 'Vinu', '8596212368', 'vinu@gmail.com', '2021-11-', '68bb0ec8c5f289e316198290c6d4af87', '2021-11-01', 1, 2, 0, 'assassins_creed_syndicate_hidden_blade-wallpaper-1366x768.jpg'),
(3, 'Meenu', '8853364123', 'meenu@gmail.com', '2021-11-', '550ba481acb35905ed45692c3fab1ebc', '2021-11-01', 1, 6, 49, 'defaultuser.png'),
(17, 'Mrudul', '8590456210', 'mrudul@gmail.com', '2021-12-', 'a93e1669a3924937b28c1bc15061f927', '2021-12-13', 1, 3, 49, 'defaultuser.png'),
(18, 'Varun', '9590466310', 'varun@gmail.com', '2021-12-', '76750eda19aca9fae956c21090d1ce56', '2021-12-13', 1, 2, 0, 'defaultuser.png'),
(23, 'Sanju', '8463287564', 'sanju@gmail.com', '1999-05-', '92d1882adbaa49723ea22bdf43aa54c6', '2021-12-17', 1, 5, 50, 'defaultuser.png'),
(24, 'Gretta Anna Abraham', '9745852789', 'grettaabraham72@gmail.com', '1999-07-', '87f75162b2dee6a200ac9730698b5b7a', '2021-12-17', 1, 8, 51, 'defaultuser.png'),
(25, 'Jacob', '7563218962', 'jacob@gmail.com', '1999-07-', 'b76c2e664067458ada8dc865ceaacaa8', '2021-12-17', 1, 2, 0, 'defaultuser.png'),
(28, 'Nikky', '7563985410', 'nikkygeorgephilip2018@gmail.com', '1999-07-', 'b4bcac745e3a1ab16bf0cad054578cf8', '2021-12-17', 1, 3, 49, 'defaultuser.png'),
(29, 'Frank', '7593156240', 'frank@gmail.com', '1999-07-', '7b747e1be2f9f67f66b67d8867084dcb', '2021-12-17', 1, 4, 52, 'defaultuser.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_permission` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`role_id`, `role_name`, `role_permission`) VALUES
(1, 'Admin', 1),
(2, 'Manager', 2),
(3, 'Web developer', 3),
(4, 'Designer', 3),
(5, 'Back-End Developer', 3),
(6, 'Mobile Application Developer', 3),
(7, 'Marketing analyst', 3),
(8, 'UI Designer', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_invitation`
--
ALTER TABLE `tbl_invitation`
  ADD PRIMARY KEY (`invitation_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tbl_task_allocation`
--
ALTER TABLE `tbl_task_allocation`
  ADD PRIMARY KEY (`task_allocation_id`);

--
-- Indexes for table `tbl_task_status`
--
ALTER TABLE `tbl_task_status`
  ADD PRIMARY KEY (`task_status_id`);

--
-- Indexes for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tbl_team_allocation`
--
ALTER TABLE `tbl_team_allocation`
  ADD PRIMARY KEY (`team_allocation_id`);

--
-- Indexes for table `tbl_team_members`
--
ALTER TABLE `tbl_team_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `activity_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_invitation`
--
ALTER TABLE `tbl_invitation`
  MODIFY `invitation_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `task_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_task_allocation`
--
ALTER TABLE `tbl_task_allocation`
  MODIFY `task_allocation_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_task_status`
--
ALTER TABLE `tbl_task_status`
  MODIFY `task_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `team_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_team_allocation`
--
ALTER TABLE `tbl_team_allocation`
  MODIFY `team_allocation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_team_members`
--
ALTER TABLE `tbl_team_members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
