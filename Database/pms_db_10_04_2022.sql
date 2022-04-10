-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 10:37 AM
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
(8, 'Mrudul add an attachment to task \'New Task\'', '', '2022-03-05 11:10:13', 26, 'file'),
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
(19, 'Vinu add an attachment to task \'New\'', '', '2022-03-07 13:11:02', 27, 'file'),
(20, 'Vinu changed status of task \'New\' to Backlog ', '', '2022-03-26 10:22:56', 27, 'task'),
(21, 'Mrudul changed status of task \'Create login page\' to Backlog ', '', '2022-03-26 10:44:20', 26, 'task'),
(22, 'Mrudul changed status of task \'Home page\' to Backlog ', '', '2022-03-26 10:44:21', 26, 'task'),
(23, 'Mrudul changed status of task \'Home page\' to Development ', '', '2022-03-28 12:19:15', 26, 'task'),
(24, 'Mrudul changed status of task \'Home page\' to Testing ', '', '2022-03-28 12:19:16', 26, 'task'),
(25, 'Mrudul changed status of task \'Create login page\' to Development ', '', '2022-04-01 12:20:28', 26, 'task'),
(26, 'Mrudul changed status of task \'Create login page\' to Testing ', '', '2022-04-01 12:20:36', 26, 'task'),
(27, 'Mrudul added a new task \'Java\'', '17', '2022-04-01 12:21:28', 26, 'task'),
(28, 'Mrudul changed status of task \'Java\' to Completed ', '', '2022-04-01 12:22:13', 26, 'task'),
(29, 'Mrudul added a new task \'Jf\'', '17', '2022-04-03 10:27:33', 26, 'task'),
(30, 'Mrudul deleted task \'Jf\'', '17', '2022-04-03 10:27:37', 0, 'task'),
(31, 'Mrudul added a new task \'Hj,\'', '17', '2022-04-03 10:28:01', 26, 'task'),
(32, 'Mrudul deleted task \'Hj,\'', '17', '2022-04-03 10:28:09', 0, 'task'),
(33, 'Jacob deleted task \'New Task\'', '25', '2022-04-03 12:00:32', 0, 'task'),
(34, 'Jacob changed status of task \'Java\' to Development ', '', '2022-04-03 12:00:38', 26, 'task'),
(35, 'Jacob changed status of task \'Signup page bug fix\r\n\' to Development ', '', '2022-04-03 12:00:40', 26, 'task'),
(38, 'Jacob commented \'Helloo\' on the task \'Java\'', '25', '2022-04-03 13:49:14', 26, 'comment'),
(39, 'Jacob changed description of task \'Create login page\'', '', '2022-04-04 14:10:15', 26, 'task'),
(40, 'Jacob added a checklist item \'Create ui design\' to the task \'Home page\'', '25', '2022-04-04 14:20:38', 26, 'checklist'),
(41, 'Vinu added a new task \'Testing\'', '2', '2022-04-06 09:32:36', 27, 'task'),
(42, 'Vinu changed status of task \'Testing\' to Development ', '', '2022-04-06 09:32:42', 27, 'task'),
(43, 'Vinu changed status of task \'Testing\' to Backlog ', '', '2022-04-06 09:32:45', 27, 'task'),
(44, 'Mrudul commented \'New comment\' on the task \'Signup page bug fix\n\'', '17', '2022-04-06 09:45:00', 26, 'comment'),
(45, 'Mrudul added a checklist item \'New item\' to the task \'Signup page bug fix\n\'', '17', '2022-04-06 09:45:16', 26, 'checklist'),
(46, 'Vinu added a checklist item \'Helloo\' to the task \'New\'', '2', '2022-04-06 10:00:03', 27, 'checklist'),
(47, 'Vinu commented \'Comment\' on the task \'New\'', '2', '2022-04-06 10:00:09', 27, 'comment'),
(48, 'Vinu added a new task \'Task\'', '2', '2022-04-06 12:44:30', 29, 'task'),
(49, 'Vinu commented \'hii\' on the task \'Task\'', '2', '2022-04-06 12:44:59', 29, 'comment'),
(50, 'Vinu add an attachment to task \'Task\'', '', '2022-04-06 12:46:09', 29, 'file'),
(51, 'Vinu added a checklist item \'item\' to the task \'Task\'', '2', '2022-04-06 12:46:43', 29, 'checklist'),
(52, 'Vinu added a checklist item \'item 2\' to the task \'Task\'', '2', '2022-04-06 12:46:49', 29, 'checklist'),
(53, 'Vinu changed status of task \'Task\' to Development ', '', '2022-04-06 12:49:33', 29, 'task');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chats`
--

CREATE TABLE `tbl_chats` (
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(500) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_name` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `chat_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chats`
--

INSERT INTO `tbl_chats` (`chat_id`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `date_time`, `chat_text`) VALUES
(1, 17, 'Mrudul', 2, 'Vinu', '2022-04-05 09:53:26', 'Hello Vinu'),
(2, 17, 'Mrudul', 3, 'Meenu', '2022-04-05 09:53:26', 'Hello Meenu'),
(3, 17, 'Mrudul', 2, 'Vinu', '2022-04-05 09:53:26', 'Hello Vinu'),
(4, 17, 'Mrudul', 3, 'Meenu', '2022-04-05 09:53:26', 'Hello Meenu'),
(5, 3, 'Meenu', 25, 'Jacob', '2022-04-05 10:57:54', 'Helloooooooooooooo'),
(6, 3, 'Meenu', 17, 'Mrudul', '2022-04-05 10:59:36', 'Hello how are you'),
(8, 17, 'Mrudul', 2, 'Vinu', '2022-04-05 18:23:36', 'Vinuuuuu'),
(9, 17, 'Mrudul', 3, 'Meenu', '2022-04-05 18:24:12', 'I am fine, thanks'),
(10, 25, 'Jacob', 3, 'Meenu', '2022-04-05 20:17:25', 'Hi, How are you?'),
(11, 3, 'Meenu', 25, 'Jacob', '2022-04-05 20:20:24', 'Fine, Thanks'),
(12, 3, 'Meenu', 2, 'Vinu', '2022-04-06 00:23:32', 'Vinu, how are u'),
(13, 3, 'Meenu', 18, 'Varun', '2022-04-06 00:26:49', 'Hi varun'),
(14, 3, 'Meenu', 18, 'Varun', '2022-04-06 00:27:09', 'How are you?'),
(15, 3, 'Meenu', 24, 'Gretta Anna Abraham', '2022-04-06 00:42:19', 'Hi dee'),
(16, 3, 'Meenu', 17, 'Mrudul', '2022-04-06 00:42:56', 'ok'),
(17, 3, 'Meenu', 29, 'Frank', '2022-04-06 00:44:45', 'Helo'),
(18, 17, 'Mrudul', 2, 'Vinu', '2022-04-06 00:45:28', 'Reply thaayoo'),
(19, 17, 'Mrudul', 25, 'Jacob', '2022-04-06 00:45:40', 'Daaa'),
(20, 17, 'Mrudul', 25, 'Jacob', '2022-04-06 08:53:26', 'Hello'),
(21, 32, 'Telbin Cherian', 31, 'Manaz', '2022-04-06 09:30:30', 'daaaa'),
(22, 17, 'Mrudul', 3, 'Meenu', '2022-04-06 09:46:41', 'hi'),
(23, 17, 'Mrudul', 28, 'Nikky', '2022-04-06 09:48:20', 'hi'),
(24, 17, 'Mrudul', 28, 'Nikky', '2022-04-06 09:48:28', 'hello'),
(25, 2, 'Vinu', 3, 'Meenu', '2022-04-06 12:23:40', 'hhhhh'),
(26, 2, 'Vinu', 17, 'Mrudul', '2022-04-06 12:24:28', 'liyan super'),
(27, 2, 'Vinu', 3, 'Meenu', '2022-04-06 12:57:31', 'hiii');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checklist`
--

CREATE TABLE `tbl_checklist` (
  `checklist_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checklist_title` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_checklist`
--

INSERT INTO `tbl_checklist` (`checklist_id`, `task_id`, `project_id`, `user_id`, `checklist_title`, `status`) VALUES
(2, 15, 26, 25, 'Hello', 1),
(3, 15, 26, 25, 'New checklist item', 0),
(4, 15, 26, 25, 'This', 0),
(5, 15, 26, 25, 'World', 0),
(6, 40, 26, 25, 'Study java basics', 0),
(7, 40, 26, 25, 'Study oop', 0),
(8, 40, 26, 25, 'Exception handling', 1),
(9, 16, 26, 25, 'New item', 1),
(10, 16, 26, 25, 'Create ui design', 1),
(11, 15, 26, 17, 'New item', 0),
(12, 18, 27, 2, 'Helloo', 1),
(13, 44, 29, 2, 'item', 0),
(14, 44, 29, 2, 'item 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `user_id`, `project_id`, `task_id`, `comment_time`, `comment`) VALUES
(12, 17, 26, 12, '2022-04-03 11:17:08', 'New comment'),
(16, 25, 26, 12, '2022-04-03 11:37:13', 'Hello World'),
(18, 25, 26, 15, '2022-04-03 13:48:32', 'Hello'),
(19, 25, 26, 40, '2022-04-03 13:49:14', 'Helloo'),
(20, 17, 26, 15, '2022-04-06 09:45:00', 'New comment'),
(21, 2, 27, 18, '2022-04-06 10:00:09', 'Comment'),
(22, 2, 29, 44, '2022-04-06 12:44:59', 'hii');

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
(37, 'event', '2022-03-09', '2022-03-10'),
(38, 'dfds', '2022-03-29', '2022-03-30'),
(39, 'Give keshu good food', '2022-04-13', '2022-04-14'),
(41, 'meeting 2', '2022-04-06', '2022-04-07');

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
(37, 'color_t3_by_eisanka_da8tip0.png', '1.18 MB', 2, '2022-03-07', 0, 27),
(38, 'ahmed-rizkhaan-346325.jpg', '1.28 MB', 2, '2022-04-06', 0, 29);

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
(28, 'Sample Project', 'Sample Project', '17-12-2021', '2021-12-17', '2021-12-31', 1, 1),
(29, 'Ease It', 'Ease it', '06-04-2022', '2022-04-08', '2022-04-24', 1, 2);

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
(12, 'Create login page', 'Create login page validation', 49, 28, 3, 26, '2021-12-17'),
(13, 'New Task', 'New Task', 51, 2, 4, 27, '2021-12-17'),
(14, 'New Task', 'New Task', 52, 2, 1, 28, '2021-12-17'),
(15, 'Signup page bug fix\r\n', 'Signup page bug fix', 49, 25, 2, 26, '2021-12-19'),
(16, 'Home page', 'Home page', 50, 25, 3, 26, '2021-12-19'),
(18, 'New', 'Newwww', 51, 2, 1, 27, '2022-03-06'),
(38, ' Design Cart Page', ' Design Cart Page', 52, 2, 1, 28, '2022-03-06'),
(40, 'Java', 'full stack', 49, 17, 2, 26, '2022-04-01'),
(43, 'Testing', 'Complete the testing ASAP', 52, 2, 1, 27, '2022-04-06'),
(44, 'Task', 'aa', 51, 2, 2, 29, '2022-04-06');

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
(52, 'Design', 2),
(53, 'Idukki boy', 34);

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
(38, 52, 28, 2),
(39, 51, 29, 2);

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
(42, 52, 29),
(43, 52, 32),
(44, 52, 31),
(45, 53, 30),
(46, 53, 33),
(47, 53, 1);

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
(1, 'Admin', '9963215473', 'admin@easeit.com', '', '0e7517141fb53f21ee439b355b5a1d0a', '22-09-21', 1, 1, 53, 'defaultuser.png'),
(2, 'Vinu', '8596212368', 'vinu@gmail.com', '2021-11-', '68bb0ec8c5f289e316198290c6d4af87', '2021-11-01', 1, 2, 0, 'assassins_creed_syndicate_hidden_blade-wallpaper-1366x768.jpg'),
(3, 'Meenu', '8853364123', 'meenu@gmail.com', '2021-11-', '550ba481acb35905ed45692c3fab1ebc', '2021-11-01', 1, 6, 49, 'defaultuser.png'),
(17, 'Mrudul', '8590456210', 'mrudul@gmail.com', '2021-12-', 'a93e1669a3924937b28c1bc15061f927', '2021-12-13', 1, 3, 49, 'defaultuser.png'),
(18, 'Varun', '9590466310', 'varun@gmail.com', '2021-12-', '76750eda19aca9fae956c21090d1ce56', '2021-12-13', 1, 2, 0, 'defaultuser.png'),
(23, 'Sanju', '8463287564', 'sanju@gmail.com', '1999-05-', '92d1882adbaa49723ea22bdf43aa54c6', '2021-12-17', 1, 5, 50, 'defaultuser.png'),
(24, 'Gretta Anna Abraham', '9745852789', 'grettaabraham72@gmail.com', '1999-07-', '87f75162b2dee6a200ac9730698b5b7a', '2021-12-17', 1, 8, 51, 'defaultuser.png'),
(25, 'Jacob', '7563218962', 'jacob@gmail.com', '1999-07-', 'b76c2e664067458ada8dc865ceaacaa8', '2021-12-17', 1, 2, 0, 'FB_IMG_1523036365492.jpg'),
(28, 'Nikky', '7563985410', 'nikkygeorgephilip2018@gmail.com', '1999-07-', 'b4bcac745e3a1ab16bf0cad054578cf8', '2021-12-17', 1, 3, 49, 'defaultuser.png'),
(29, 'Frank', '7593156240', 'frank@gmail.com', '1999-07-', '7b747e1be2f9f67f66b67d8867084dcb', '2021-12-17', 1, 4, 52, 'defaultuser.png'),
(30, 'Manju', '8592012650', 'manju@gmail.com', '2003-06-', 'c0aecb366d9ce7e998bc31fcf353df38', '2022-03-25', 1, 4, 53, 'defaultuser.png'),
(31, 'Manaz', '9446184518', 'manasp@gmail.com', '1998-10-', '8dd43ae0638e1ce2690e2e3cfa653923', '2022-04-01', 1, 8, 52, 'IMG-20210321-WA0026.jpg'),
(32, 'Telbin Cherian', '8138863080', 'ctelbin@gmail.com', '1999-11-', '6100b87420668a18bd7ca527238bba46', '2022-04-06', 1, 3, 52, 'captain_america_movie_2011-wallpaper-1366x768.jpg'),
(33, 'Lilly', '9443366552', 'lilli@gmail.com', '2022-04-', '8f458b50b26797475703a48a4b1ad05d', '2022-04-06', 1, 5, 53, 'defaultuser.png'),
(34, 'V R J', '8848891296', 'vinurejijohn@gmail.com', '1999-02-', '8f373d4c386f3d7b4e2b55cfda445e6d', '2022-04-06', 1, 2, 0, 'defaultuser.png');

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
-- Indexes for table `tbl_chats`
--
ALTER TABLE `tbl_chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  ADD PRIMARY KEY (`checklist_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

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
  MODIFY `activity_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_chats`
--
ALTER TABLE `tbl_chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_invitation`
--
ALTER TABLE `tbl_invitation`
  MODIFY `invitation_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `task_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `team_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_team_allocation`
--
ALTER TABLE `tbl_team_allocation`
  MODIFY `team_allocation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_team_members`
--
ALTER TABLE `tbl_team_members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
