-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 11:52 AM
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
(1, 'Vinu Reji John added a new task \'Design A Login Page For Drive\'', '35', '2022-05-03 20:24:09', 1, 'task'),
(2, 'Vinu Reji John changed title of task \'Design A Login Page For Drive\' to Design driver registration page ', '', '2022-05-03 20:26:11', 1, 'task'),
(3, 'Vinu Reji John added a checklist item \'Multi step registration\' to the task \'Design driver registration page\'', '35', '2022-05-03 20:26:35', 1, 'checklist'),
(4, 'Vinu Reji John added a checklist item \'Add error message placeholders\' to the task \'Design driver registration page\'', '35', '2022-05-03 20:28:33', 1, 'checklist'),
(5, 'Vinu Reji John added a new task \'Create Authentication Page\'', '35', '2022-05-03 22:22:46', 1, 'task'),
(6, 'Vinu Reji John added a checklist item \'OTP Verification\' to the task \'Create Authentication Page\'', '35', '2022-05-03 22:23:01', 1, 'checklist'),
(7, 'Vinu Reji John added a checklist item \'Login with user credentials\' to the task \'Create Authentication Page\'', '35', '2022-05-03 22:23:46', 1, 'checklist'),
(8, 'Vinu Reji John added a checklist item \'Login with google\' to the task \'Create Authentication Page\'', '35', '2022-05-03 22:23:57', 1, 'checklist'),
(9, 'Vinu Reji John added a checklist item \'login with facebook\' to the task \'Create Authentication Page\'', '35', '2022-05-03 22:24:07', 1, 'checklist'),
(10, 'Vinu Reji John added a new task \'Check Booking Availability\'', '35', '2022-05-03 22:25:37', 1, 'task'),
(11, 'Vinu Reji John added a new task \'Design Landing Page\'', '35', '2022-05-03 22:26:17', 1, 'task'),
(12, 'Vinu Reji John added a checklist item \'Landing page wireframe\' to the task \'Design Landing Page\'', '35', '2022-05-03 22:27:01', 1, 'checklist'),
(13, 'Vinu Reji John added a checklist item \'Contact us form\' to the task \'Design Landing Page\'', '35', '2022-05-03 22:27:11', 1, 'checklist'),
(14, 'Vinu Reji John added a checklist item \'Landing page prototype\' to the task \'Design Landing Page\'', '35', '2022-05-03 22:27:32', 1, 'checklist'),
(15, 'Vinu Reji John added a checklist item \'Social links\' to the task \'Design Landing Page\'', '35', '2022-05-03 22:29:33', 1, 'checklist'),
(21, 'Mrudul A commented \'Attached a screenshot of multipage sign up design\' on the task \'Design driver registration page\'', '37', '2022-05-03 23:03:16', 1, 'comment'),
(28, 'Vinu Reji John changed status of task \'Create Authentication Page\' to Backlog ', '', '2022-05-19 22:07:45', 1, 'task'),
(29, 'Vinu Reji John changed status of task \'Create Authentication Page\' to Development ', '', '2022-05-19 22:07:47', 1, 'task'),
(30, 'Vinu Reji John changed status of task \'Check Booking Availability\' to Backlog ', '', '2022-05-19 22:07:48', 1, 'task'),
(31, 'Vinu Reji John added a new task \'Login And Register Page Design\'', '35', '2022-05-19 22:14:20', 2, 'task'),
(32, 'Vinu Reji John added a checklist item \'Multi-step signup screen\' to the task \'Login And Register Page Design\'', '35', '2022-05-19 22:14:52', 2, 'checklist'),
(33, 'Vinu Reji John added a checklist item \'OTP Screen\' to the task \'Login And Register Page Design\'', '35', '2022-05-19 22:15:21', 2, 'checklist'),
(34, 'Vinu Reji John added a checklist item \'Forgot password page\' to the task \'Login And Register Page Design\'', '35', '2022-05-19 22:15:31', 2, 'checklist'),
(35, 'Vinu Reji John commented \'Add a option to choose between OTP authentication and biometric authentication\' on the task \'Create Authentication Page\'', '35', '2022-05-19 22:18:59', 1, 'comment'),
(36, 'Vinu Reji John changed status of task \'Design driver registration page\' to Completed ', '', '2022-05-29 19:18:49', 1, 'task'),
(37, 'Vinu Reji John changed status of task \'Design Landing Page\' to Completed ', '', '2022-05-29 19:18:50', 1, 'task');

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
  `chat_text` varchar(1000) DEFAULT NULL,
  `chat_image` varchar(500) DEFAULT NULL,
  `chat_attachment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chats`
--

INSERT INTO `tbl_chats` (`chat_id`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `date_time`, `chat_text`, `chat_image`, `chat_attachment`) VALUES
(1, 36, 'Abyson Mathew', 35, 'Vinu Reji John', '2022-05-03 17:10:56', 'Hi sir', NULL, NULL),
(2, 36, 'Abyson Mathew', 35, 'Vinu Reji John', '2022-05-03 17:11:24', 'how are you', NULL, NULL),
(3, 37, 'Mrudul A', 36, 'Abyson Mathew', '2022-05-03 23:05:06', 'Hello abyson', NULL, NULL),
(4, 37, 'Mrudul A', 36, 'Abyson Mathew', '2022-05-03 23:05:43', 'can you help me with an error', NULL, NULL),
(5, 36, 'Abyson Mathew', 37, 'Mrudul A', '2022-05-03 23:06:34', 'ofcourse', NULL, NULL),
(6, 36, 'Abyson Mathew', 37, 'Mrudul A', '2022-05-03 23:07:13', 'what is your error', NULL, NULL),
(36, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-04 20:18:13', 'Hi', NULL, NULL),
(41, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-04 20:31:37', 'hi', NULL, NULL),
(42, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-04 20:36:14', 'hiiiii', NULL, NULL),
(53, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-04 21:29:18', NULL, '292282Dashboard.png', NULL),
(54, 36, 'Abyson Mathew', 37, 'Mrudul A', '2022-05-04 21:55:15', NULL, '936061ujjwal.jpeg', NULL),
(56, 36, 'Abyson Mathew', 37, 'Mrudul A', '2022-05-04 22:00:39', NULL, '774951thota.jpeg', NULL),
(61, 36, 'Abyson Mathew', 37, 'Mrudul A', '2022-05-04 22:28:23', NULL, NULL, ''),
(62, 36, 'Abyson Mathew', 35, 'Vinu Reji John', '2022-05-04 22:29:11', NULL, NULL, ''),
(63, 36, 'Abyson Mathew', 35, 'Vinu Reji John', '2022-05-05 00:25:24', NULL, NULL, ''),
(64, 36, 'Abyson Mathew', 35, 'Vinu Reji John', '2022-05-05 00:29:14', NULL, NULL, '225952Batch-INTQEA22QE085 New (1).xlsx'),
(65, 36, 'Abyson Mathew', 35, 'Vinu Reji John', '2022-05-05 00:29:29', NULL, '276610kishor.jpeg', NULL),
(66, 37, 'Mrudul A', 36, 'Abyson Mathew', '2022-05-05 16:20:35', 'hello', NULL, NULL),
(67, 37, 'Mrudul A', 36, 'Abyson Mathew', '2022-05-05 16:21:01', NULL, '911616kishor.jpeg', NULL),
(68, 37, 'Mrudul A', 36, 'Abyson Mathew', '2022-05-05 16:21:54', NULL, NULL, '839841Affidavit.pdf'),
(69, 38, 'Mrudul', 36, 'Abyson Mathew', '2022-05-09 00:18:23', 'Hi', NULL, NULL),
(70, 38, 'Mrudul', 37, 'Mrudul A', '2022-05-09 00:30:25', 'Hi mrudul', NULL, NULL),
(71, 38, 'Mrudul', 36, 'Abyson Mathew', '2022-05-09 00:30:40', 'Hello', NULL, NULL),
(72, 36, 'Abyson Mathew', 39, 'Meenu Philip', '2022-05-09 03:09:48', 'hi meenu', NULL, NULL),
(73, 36, 'Abyson Mathew', 39, 'Meenu Philip', '2022-05-09 03:11:32', 'I am sending a screenshot for website for your reference', NULL, NULL),
(74, 36, 'Abyson Mathew', 39, 'Meenu Philip', '2022-05-09 03:11:47', NULL, '141885Desktop - 2.png', NULL),
(75, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-09 09:25:24', NULL, '260309Landing-Page 2.png', NULL),
(76, 40, 'Telbin', 35, 'Vinu Reji John', '2022-05-24 22:46:33', 'Hello sir', NULL, NULL),
(77, 40, 'Telbin', 35, 'Vinu Reji John', '2022-05-24 22:46:50', 'I have not assigned to a project yet', NULL, NULL),
(78, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-25 08:07:46', 'hello', NULL, NULL),
(79, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-26 12:26:35', 'da enich poda', NULL, NULL),
(80, 35, 'Vinu Reji John', 40, 'Telbin', '2022-05-26 12:27:20', 'ayinu', NULL, NULL),
(81, 35, 'Vinu Reji John', 36, 'Abyson Mathew', '2022-05-26 12:40:33', 'Hello Abyson Mathew,Congratulations you have been appointed as marketing manager of ease it.Your monthly renumeration will be RS.100.. spend it carefully,You will be provided with additional allowances like TA(2 wheel Bicycle), DA etc etc...You will have 10 years of bond....and the bond will automatically get activate if you saw this message......if you refuse to come you have to pay the penalty amount of RS 10,00000 within 2 days.Enjoy Abyson Mathew.....Once again congratulations for your job', NULL, NULL),
(82, 37, 'Mrudul A', 38, 'Mrudul', '2022-06-01 17:57:39', 'Hi', NULL, NULL),
(83, 37, 'Mrudul A', 38, 'Mrudul', '2022-06-01 18:00:01', 'How are you bro?', NULL, NULL),
(84, 37, 'Mrudul A', 38, 'Mrudul', '2022-06-01 18:00:45', 'hi', NULL, NULL),
(85, 37, 'Mrudul A', 38, 'Mrudul', '2022-06-01 18:02:02', 'Where are you', NULL, NULL);

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
(1, 1, 1, 35, 'Multi step registration', 0),
(2, 1, 1, 35, 'Add error message placeholders', 0),
(3, 2, 1, 35, 'OTP Verification', 0),
(4, 2, 1, 35, 'Login with user credentials', 1),
(5, 2, 1, 35, 'Login with google', 1),
(6, 2, 1, 35, 'login with facebook', 1),
(7, 4, 1, 35, 'Landing page wireframe', 0),
(8, 4, 1, 35, 'Contact us form', 0),
(9, 4, 1, 35, 'Landing page prototype', 0),
(10, 4, 1, 35, 'Social links', 0),
(11, 5, 2, 35, 'Multi-step signup screen', 1),
(12, 5, 2, 35, 'OTP Screen', 1),
(13, 5, 2, 35, 'Forgot password page', 1);

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
(1, 37, 1, 1, '2022-05-03 23:03:16', 'Attached a screenshot of multipage sign up design'),
(2, 35, 1, 2, '2022-05-19 22:18:59', 'Add a option to choose between OTP authentication and biometric authentication');

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
(1, 'Client Meeting @4 30pm', '2022-05-09', '2022-05-10'),
(2, 'Complete Feedback', '2022-05-08', '2022-05-09'),
(3, 'Submit report', '2022-05-09', '2022-05-10'),
(4, 'Project review', '2022-05-08', '2022-05-09'),
(5, 'Project 2nd Review', '2022-05-19', '2022-05-20'),
(6, 'Daily Standup meeting', '2022-05-20', '2022-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(15) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `uploaded_by_id` int(15) NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT current_timestamp(),
  `team_id` int(15) NOT NULL,
  `project_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_name`, `file_size`, `uploaded_by_id`, `uploaded_date`, `team_id`, `project_id`) VALUES
(1, 'EaseIT - Dashboard.png', '131.31 KB', 37, '2022-05-03 00:00:00', 1, 1),
(2, 'Letter Of Authorization - Background verification.', '353.64 KB', 36, '2022-05-05 00:00:00', 2, 1);

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
(4, 'mrudulathakadiyel@mca.ajce.in', 1, 'P9N4A0QEVWFK', 1);

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
(1, 'Cab Management System', 'Online cab booking system', '03-05-2022', '2022-05-04', '2022-06-30', 1, 1),
(2, 'Car Rental System', 'Car Rental System with php', '03-05-2022', '2022-05-12', '2022-07-08', 1, 2),
(3, 'Shopify', 'Online shopping website', '19-05-2022', '2022-05-20', '2022-06-30', 0, 2);

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
  `task_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `progress` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`task_id`, `task_title`, `task_description`, `team_id`, `task_added_by`, `task_status`, `project_id`, `task_created_at`, `progress`) VALUES
(1, 'Design driver registration page', 'Design should be minimal and modern', 1, 35, 4, 1, '2022-05-03 00:00:00', 100),
(2, 'Create Authentication Page', 'Authentication page with otp verification', 2, 35, 2, 1, '2022-05-03 00:00:00', 25),
(3, 'Check Booking Availability', 'Check booking availability after entering the ride details', 2, 35, 1, 1, '2022-05-03 00:00:00', -1),
(4, 'Design Landing Page', 'Landing page should contain contact us form', 1, 35, 4, 1, '2022-05-03 00:00:00', 100),
(5, 'Login And Register Page Design', 'Create a minimal login and register page design', 1, 35, 1, 2, '2022-05-19 00:00:00', 0);

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
(1, 'Design Team', 35),
(2, 'Development Team', 35),
(3, 'Marketing Team', 35);

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
(1, 1, 1, 35),
(2, 2, 1, 35),
(3, 1, 2, 35),
(4, 1, 3, 35),
(5, 2, 3, 35),
(6, 3, 3, 35);

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
(1, 1, 37),
(2, 2, 36),
(3, 2, 38),
(4, 3, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_created_at` varchar(10) NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT 1,
  `type_id` int(10) NOT NULL,
  `team_id` int(20) NOT NULL DEFAULT -1,
  `profile_pic` varchar(300) NOT NULL DEFAULT 'defaultuser.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `mob`, `email`, `dob`, `password`, `user_created_at`, `user_status`, `type_id`, `team_id`, `profile_pic`) VALUES
(1, 'Admin', '9963215473', 'admin@easeit.com', '', '0e7517141fb53f21ee439b355b5a1d0a', '22-09-21', 1, 1, -1, 'defaultuser.png'),
(35, 'Vinu Reji John', '8848891296', 'vinu@gmail.com', '1998-06-', '9fa4d6b9792ac4e2997a23926d1980ef', '2022-05-03', 1, 2, 0, 'IMG-20220207-WA0021.jpg'),
(36, 'Abyson Mathew', '9654398562', 'abyson@gmail.com', '2000-07-', 'c50b888edb7b3d6e0c838603c0ce7bb5', '2022-05-03', 1, 3, 2, 'defaultuser.png'),
(37, 'Mrudul A', '8590456210', 'mrudulathakadiyel@mca.ajce.in', '1999-06-', 'a93e1669a3924937b28c1bc15061f927', '2022-05-03', 1, 4, 1, 'defaultuser.png'),
(38, 'Mrudul', '8563214963', 'mrudul@gmail.com', '2001-07-', 'a93e1669a3924937b28c1bc15061f927', '2022-05-03', 1, 6, 2, 'IMG-20191026-WA0029.jpg'),
(39, 'Meenu Philip', '8563210397', 'meenu@gmail.com', '1999-06-', '550ba481acb35905ed45692c3fab1ebc', '2022-05-08', 1, 7, 3, 'defaultuser.png'),
(40, 'Telbin', '8569321452', 'telbin@gmail.com', '2005-02-', '6100b87420668a18bd7ca527238bba46', '2022-05-24', 1, 5, 0, 'defaultuser.png');

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
  MODIFY `activity_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_chats`
--
ALTER TABLE `tbl_chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_invitation`
--
ALTER TABLE `tbl_invitation`
  MODIFY `invitation_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `task_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `team_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_team_allocation`
--
ALTER TABLE `tbl_team_allocation`
  MODIFY `team_allocation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_team_members`
--
ALTER TABLE `tbl_team_members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
