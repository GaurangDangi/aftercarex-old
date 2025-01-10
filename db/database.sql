-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2024 at 02:44 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliomsuf_xaftercare`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('azhar@gmail.com|103.139.5.199', 'i:2;', 1726163723),
('azhar@gmail.com|103.139.5.199:timer', 'i:1726163723;', 1726163723);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speaker_id` bigint(20) DEFAULT NULL,
  `zoomLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `speaker_id`, `zoomLink`, `title`, `start_date`, `start_time`, `duration`, `subject`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Breaking the Cycle: Understanding Triggers and Building Resilience', '2024-09-13', '19:00', '60', 'Health', 1, '2024-09-16 13:56:12', '2024-11-03 20:58:59'),
(3, 1, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Dealing with Cravings', '2024-11-10', '19:00', '60', 'Relapse Prevention', 1, '2024-09-18 11:46:55', '2024-11-03 20:57:20'),
(4, 1, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Nutrition and Sobriety: Fueling Your Body for Mental Clarity', '2024-11-29', '19:00', '60', 'Health', 1, '2024-11-03 20:59:38', '2024-11-03 20:59:38'),
(5, 3, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Journaling for Growth: Reflecting on the Journey to a Better You', '2024-11-21', '19:00', '60', 'Health', 1, '2024-11-03 21:02:55', '2024-11-03 21:02:55'),
(6, 4, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Understanding the Brain in Recovery: Rewiring for Success', '2024-11-28', '19:00', '60', 'Health', 1, '2024-11-03 21:03:25', '2024-11-03 21:03:25'),
(7, 2, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Setting Realistic Goals: Small Wins for Long-Term Success', '2024-11-15', '19:00', '60', 'Health', 1, '2024-11-03 21:04:00', '2024-11-03 21:04:00'),
(8, 3, 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Social Support Networks: Building Connections Without Relapsing', '2024-11-06', '19:00', '60', 'Health', 1, '2024-11-03 21:04:27', '2024-11-03 21:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `sms_service` tinyint(4) DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `aftercare_service_length` int(11) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disclaimer` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `institution_id`, `name`, `country_code`, `mobile_no`, `email_id`, `role`, `password`, `status`, `sms_service`, `note`, `aftercare_service_length`, `service_date`, `type`, `category`, `disclaimer`, `created_at`, `updated_at`) VALUES
(1, NULL, 'James Clark', '+1', 6892750531, 'clarkjamespers@gmail.com', 'client', NULL, 1, 1, NULL, 90, '2024-11-01', 'Institutional Subclient', 'Aftercare', 1, '2024-10-31 23:58:02', '2024-11-03 21:04:53'),
(2, NULL, 'John Biscuitworthy', '+1', 5988596589, 'biscuitworthy@gmail.com', 'client', NULL, 1, 1, NULL, 30, '2024-11-03', 'Institutional Subclient', 'Aftercare', 1, '2024-11-03 21:05:56', '2024-11-03 21:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_name` text COLLATE utf8mb4_unicode_ci,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'institution',
  `otp` int(11) DEFAULT NULL,
  `address_1` text COLLATE utf8mb4_unicode_ci,
  `address_2` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `total_expected_client` bigint(20) DEFAULT NULL,
  `company_website` text COLLATE utf8mb4_unicode_ci,
  `radha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `white_label_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_counselors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strip_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_creation_access` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `institution_name`, `industry`, `registration_no`, `contact_person_name`, `country_code`, `mobile_no`, `email_id`, `role`, `otp`, `address_1`, `address_2`, `city`, `state`, `country`, `subscription_price`, `status`, `total_expected_client`, `company_website`, `radha`, `white_label_client`, `group_counselors`, `strip_customer_id`, `content_creation_access`, `image_url`, `created_at`, `updated_at`) VALUES
(9, 'James Clark', 'Clinic', '12345678', 'James', '+1', 6892750531, 'clarkjamespers@gmail.com', 'institution', 1567, 'abanbbabna', NULL, 'florida', 'florida', 'USA', 1.00, 1, 50, NULL, 'Yes', 'Yes', 'Self Provided', NULL, 'No', NULL, '2024-08-22 20:40:48', '2024-11-14 10:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs_daily`
--

CREATE TABLE `login_logs_daily` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_logs_daily`
--

INSERT INTO `login_logs_daily` (`id`, `user_id`, `role`, `login_date`, `created_at`, `updated_at`) VALUES
(1, 4, 'client', '2024-11-02', '2024-11-02 03:00:59', '2024-11-02 03:00:59'),
(2, 5, 'client', '2024-11-01', '2024-11-02 03:00:59', '2024-11-02 03:00:59'),
(3, 4, 'client', '2024-11-04', '2024-11-02 03:00:59', '2024-11-02 03:00:59'),
(4, 4, 'client', '2024-11-08', '2024-11-02 03:00:59', '2024-11-02 03:00:59'),
(5, 5, 'client', '2024-11-02', '2024-11-02 12:38:44', '2024-11-02 12:38:44'),
(6, 5, 'client', '2024-11-03', '2024-11-02 12:38:44', '2024-11-02 12:38:44'),
(7, 5, 'client', '2024-11-03', '2024-11-02 12:38:44', '2024-11-02 12:38:44'),
(8, 5, 'client', '2024-11-02', '2024-11-02 12:38:44', '2024-11-02 12:38:44'),
(9, 8, 'client', '2024-11-03', '2024-11-03 00:11:25', '2024-11-03 00:11:25'),
(10, 4, 'client', '2024-11-03', '2024-11-03 11:36:48', '2024-11-03 11:36:48'),
(11, 1, 'client', '2024-11-03', '2024-11-03 12:30:56', '2024-11-03 12:30:56'),
(12, 1, 'client', '2024-11-04', '2024-11-03 20:53:31', '2024-11-03 20:53:31'),
(13, 1, 'client', '2024-11-04', '2024-11-03 21:09:32', '2024-11-03 21:09:32'),
(14, 1, 'client', '2024-11-04', '2024-11-04 09:29:13', '2024-11-04 09:29:13'),
(15, 1, 'client', '2024-11-04', '2024-11-04 09:54:38', '2024-11-04 09:54:38'),
(16, 1, 'client', '2024-11-14', '2024-11-14 10:38:36', '2024-11-14 10:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_23_105332_create_templates_table', 2),
(6, '2024_06_23_181134_create_clinic_table', 3),
(7, '2024_06_25_181927_rename_column_for_clinic', 4),
(8, '2024_06_25_190947_create_client_table', 5),
(9, '2024_06_25_183440_rename_column_for_templates', 6),
(10, '2024_06_25_184229_add_column_for_templates', 6),
(11, '2024_06_26_184204_create_settings_table', 7),
(12, '2024_06_27_140349_add_column_total_expected_client_for_clinic', 8),
(13, '2024_06_27_143938_rename_clinic_to_institution', 9),
(14, '2024_06_27_150730_rename_column_name_of_clinic_to_industry', 10),
(15, '2024_06_29_141431_add_column_for_institution', 11),
(16, '2024_06_29_181221_add_column_for_client', 11),
(17, '2024_07_03_185239_add_column_for_institution', 12),
(18, '2024_07_03_185512_create_verify_otp_table', 12),
(19, '2024_07_06_090710_add_column_strip_customer_id', 13),
(20, '2024_07_05_180044_add_column_for_institution', 14),
(21, '2024_07_05_181331_add_column_for_client', 14),
(22, '2024_07_05_181408_add_column_for_users', 14),
(23, '2024_07_06_102524_rename_column_for_client', 14),
(24, '2024_07_11_171333_add_column_disclaimer_for_client', 15),
(25, '2024_07_11_183250_add_column_for_institution', 16),
(26, '2024_07_12_161018_add_column_for_users', 16);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_no` bigint(255) DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `title`, `days_no`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Start of Somethin\' Special', 1, 'uploads/milestone/6b1721e92a02f728700238dd921d5371.png', 1, '2024-11-03 21:08:49', '2024-11-03 21:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_otp_verify`
--

CREATE TABLE `mobile_otp_verify` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobile_otp_verify`
--

INSERT INTO `mobile_otp_verify` (`id`, `role`, `user_id`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'client', 1, 5559, 1, '2024-11-01 11:07:38', '2024-11-01 11:07:47'),
(2, 'client', 1, 7797, 1, '2024-11-01 11:10:52', '2024-11-01 11:11:07'),
(3, 'client', 1, 8528, 1, '2024-11-03 12:30:37', '2024-11-03 12:30:56'),
(4, 'client', 1, 8233, 1, '2024-11-03 20:53:15', '2024-11-03 20:53:31'),
(5, 'client', 1, 5214, 1, '2024-11-03 21:09:17', '2024-11-03 21:09:32'),
(6, 'client', 1, 3337, 1, '2024-11-04 09:29:00', '2024-11-04 09:29:13'),
(7, 'client', 1, 7171, 1, '2024-11-04 09:54:28', '2024-11-04 09:54:38'),
(8, 'client', 1, 5071, 0, '2024-11-08 08:27:25', '2024-11-08 08:27:25'),
(9, 'client', 1, 2229, 1, '2024-11-14 10:38:26', '2024-11-14 10:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_bar`
--

CREATE TABLE `progress_bar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_library`
--

CREATE TABLE `resource_library` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_library`
--

INSERT INTO `resource_library` (`id`, `type`, `title`, `description`, `thumbnail`, `external_link`, `author`, `category`, `role`, `popular`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Video', 'Relapse Prevention Failed: And How WE Can Solve this Crisis Together | Adam Gunton | TEDxBillings', 'Before Alcoholics Anonymous and other Twelve Step Programs, there was virtually no solution for alcoholism and drug addiction - no matter how hard the medical community tried. With an increase in reliance upon methods like \"Relapse Prevention\" from the medical community, and an ever-increasing relapse and overdose rate around the world - what if the new solution to the addiction crisis was once again found in the community of those who have suffered in addiction and alcoholism?', 'uploads/thumbnail/5127a1e6e1caa55d6526e65e0d070498.jpg', 'https://www.youtube.com/watch?v=EuvHBlyLTro', 'James Clark', 'Popular on Xaftercare', 'Client', 1, 1, '2024-09-16 14:18:13', '2024-11-03 20:54:23'),
(11, 'Video', 'The Stigma of Addiction | Tony Hoffman | TEDxFresnoState', 'There is a stigma which many assign to drug addicts, even long after they have overcome their addiction. Tony discusses how his first time smoking marijuana led to his eventual drug addiction, homelessness, prison, and finally redemption.', 'uploads/thumbnail/db358dcb575de82c08d9072c45d67d55.jpeg', 'https://www.youtube.com/watch?v=FuooVrSpffk', 'TEDxFrensoState', 'Popular on Xaftercare', 'Client', 1, 1, '2024-11-03 20:42:44', '2024-11-03 20:42:44'),
(12, 'Video', 'Addiction: A Story of Stigma, A Story of Hope | Scott McFadden | TEDxColoradoSprings', 'Scott McFadden is a Licensed Addictions Counselor, who also identifies as a person in long term recovery from heroin and other drugs. He shares a harrowing story of incarceration and a long journey to recovery while explaining the dynamics of addiction and the labels, shame, and stigma which have become the greatest obstacles to turning around the opioid epidemic.', 'uploads/thumbnail/b000a9784876d81e18e212229714d2a9.jpeg', 'https://www.youtube.com/watch?v=HHiN7JftdcY', 'TEDxColoradoSprings', 'Popular on Xaftercare', 'Client', 1, 1, '2024-11-03 20:44:07', '2024-11-03 20:44:07'),
(13, 'Video', 'Lessons Learned from Meth | Nicolas Taylor | TEDxPaonia', 'What can we learn from methamphetamine addicts about ending our own addictions? Psychologist Dr. Nicholas Taylor develops community based treatment methods for methamphetamine and other drug addictions.', 'uploads/thumbnail/23490352e75d43b809d0ce2a9326a6f1.jpeg', 'https://www.youtube.com/watch?v=j7VFwtsbXPU', 'TEDxPaonia', 'Substance Abuse', 'Client', NULL, 1, '2024-11-03 20:45:36', '2024-11-03 20:45:36'),
(14, 'Video', 'Unmasking Addiction | Michael Quinn | TEDxRutgers', 'As an undergraduate student at Pennsylvania State University, Michael Quinn fell into a dangerous pathway that many college students fall victim to as he became addicted to drugs. Now after a few years of being clean, Michael shares his story of addiction, rehabilitation and freedom.', 'uploads/thumbnail/6cc714ac34abf7ad6efe9f28780661f7.jpeg', 'https://www.youtube.com/watch?v=K7TYXmS0_6M', 'TEDxRutgers', 'Substance Abuse', 'Client', NULL, 1, '2024-11-03 20:46:51', '2024-11-03 20:46:51'),
(15, 'Video', 'Unlocking the Cure to Substance Use Disorder | Brad Finegood | TEDxUofW', 'With drug addiction and overdose rampant in Seattle, how can we change our mindset to make progress on this topic? Brad Finegood shares methods of how we can view addiction with intent to help. Brad Finegood is a Strategic Advisor in Public Health in Seattle & King County.', 'uploads/thumbnail/039a305d247f07ad3581a382828a8921.jpeg', 'https://www.youtube.com/watch?v=81E4l9TevBE', 'TEDxUofW', 'Substance Abuse', 'Client', NULL, 1, '2024-11-03 20:48:22', '2024-11-03 20:48:22'),
(16, 'Video', 'Be Recovered: Breaking free from the Disease of Addiction | Dean Taraborelli | TEDxSedona', 'For over a decade, Dean Taraborelli has challenged traditional models head-on with a revolutionary Integrative Addiction Recovery program that combines the latest advances in science with ancient healing modalities to treat the whole person and has helped hundreds of clients to be recovered from addiction and to live full, meaningful lives.', 'uploads/thumbnail/006fd180e707779213687390ac91a87b.jpeg', 'https://www.youtube.com/watch?v=5eJEzg0Tfc4', 'TEDxSedona', 'Popular on Xaftercare', 'Client', NULL, 1, '2024-11-03 20:51:02', '2024-11-03 20:51:02'),
(17, 'Video', 'Everything you think you know about addiction is wrong | Johann Hari | TED', 'What really causes addiction — to everything from cocaine to smart-phones? And how can we overcome it? Johann Hari has seen our current methods fail firsthand, as he has watched loved ones struggle to manage their addictions. He started to wonder why we treat addicts the way we do — and if there might be a better way. As he shares in this deeply personal talk, his questions took him around the world, and unearthed some surprising and hopeful ways of thinking about an age-old problem.', 'uploads/thumbnail/d15b6719b035cd453f03172bbd18ac55.jpeg', 'https://www.youtube.com/watch?v=PY9DcIMGxMs', 'Johann Hari | TED', 'Popular on Xaftercare', 'Client', 1, 1, '2024-11-03 20:52:52', '2024-11-03 20:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `resource_library_images`
--

CREATE TABLE `resource_library_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resource_library_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_library_images`
--

INSERT INTO `resource_library_images` (`id`, `resource_library_id`, `image_url`, `is_main`, `status`, `created_at`, `updated_at`) VALUES
(1, '7', 'uploads/library/f6d48c7223908da6db20fe80ebab8626.jpg', 1, 1, '2024-09-14 13:20:32', '2024-09-14 13:20:32'),
(4, '8', 'uploads/library/5f273cb3d8522613083291f610468301.jpg', 1, 1, '2024-09-14 13:57:55', '2024-09-14 13:57:55'),
(5, '8', 'uploads/library/5f273cb3d8522613083291f610468301.png', 0, 1, '2024-09-14 13:57:55', '2024-09-14 13:57:55'),
(6, '8', 'uploads/library/5f273cb3d8522613083291f610468301.jpeg', 0, 1, '2024-09-14 13:57:55', '2024-09-14 13:57:55'),
(10, '9', 'uploads/library/1ad8ffd4e5b806296d0bbc87a823a7fe.jpg', 1, 1, '2024-09-16 11:26:05', '2024-09-16 11:26:05'),
(11, '9', 'uploads/library/1ad8ffd4e5b806296d0bbc87a823a7fe.png', 0, 1, '2024-09-16 11:26:05', '2024-09-16 11:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3Lar7VdWLxYkjjyMPFYvzBDlIjo6zccyA2hh265n', NULL, '80.85.245.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGNLQXI3SUF0aHhyNWdEYktrYWZ1Z21SMXZvSnV5VEo1UlphTnZuSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731628150),
('9tpm6v7SBnbRINs9BqobH1srzx6hUCRuiadFvrir', 1, '67.149.182.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUHZQOEZpMXJaamhDaEtHWmhPU1JsaGJyQzJrTGdhVWMzNUJ6QVRsSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvYWRtaW4vc29icmlldHkvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MzE2MDAzMzI7fXM6NjoibW9iaWxlIjtzOjEwOiI2ODkyNzUwNTMxIjtzOjU4OiJsb2dpbl9pbnN0aXR1dGlvbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1731602429),
('CEnyZgIcWGUoOQNdp2ZTXt7B4AGJv2iFDYQny8np', NULL, '88.210.11.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWVybjFjank0UGk1UjUzV29JUzFNcUV4Qzl3OWlNQ3dXcVlQM0Z1TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731706317),
('dVThqNQOfhmTPClCAmtiUQA52tiCUQvUTBE9k7tt', NULL, '77.238.225.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUdaSzVoajlVQWt4Q0dqU2ZWV1g3Z3ZZY1lhakgyZnNrVmpKSkxUTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731474204),
('eaFWwQCssYr3r8xV3z4Py8CQ4wX8CjSFcHMeDrqA', NULL, '80.85.245.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEhyZUhzaUozTzZ1cUFiSWxtUWlQenA1SDViOWZqYjlLSVdCd3RiSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731260156),
('hDIWWJkdWyprDYJ0hsuneXr4GCTR7EhqCNRlXpQV', NULL, '180.110.203.108', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTNzWGZZeU51dGdpWjQ4UkNDWGhnRkJHSE9KUW9aVHdrbkJ6aGZLbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731700379),
('INec1wzXIx02rh0Gupcq2HTNcTE2Ei0za88Gdvck', NULL, '185.41.185.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWp5MEVvTXo1VTI3cHhmdlpLWE5BUGNFMnhrbnBPQUtoSlhtNWV3ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731639393),
('J0V3refxSZgfu51AD3GGDaKKvU3dpAtQFwQ1BNAg', NULL, '212.118.53.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXVmOFpUUko5UDBkN2pPN0pvam9Nb2U3T2RUUnhNWXBnZkN5SmVwNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731262967),
('J2JQuNdXfl5hkXz25hWXU7cWff2E01wY1TjE8MUY', NULL, '67.149.182.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiR3JENkh2N2VXa1VtM0ZFOEVNdlo5YXo3bUR1M3NFMTBoWVVKTUNUdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1731637664),
('l3H0k547uBpdhUytCvSZ4OxePGj2rXdj5R0twZFG', NULL, '178.20.47.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3RZMG9LSWVmODdmU1RPZGVhTnRaQVN4cEVwMnhQR0ZRYzFPOWNwdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731779030),
('PCH31eV4lyagAoZMsHKBRv40WNfrb97Wfrmh7m2B', NULL, '91.201.115.242', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianlERWRRQmhucDdodU4yeEhjWmFScVlXWUlycXZoUGhGcFBBdVI3SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731552667),
('pF7s2bcg3O4vlBKmwiT0S8xpIJm44yBAg0ta46Nq', NULL, '80.85.247.161', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWJHS2t4VUNKSFI2VE83NzljaWFHNWxkQmhqZGxCdVFWOEoxZFJ3RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731391545),
('SjrDX9x6d787zQfxF0nixGGKEjs6q3QydZac5Iuq', NULL, '80.85.246.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQk81NVpDU3FhSnBWYm9nd3hPbjF2Smw1bEdwY2pFQnQyV3ZiWGlSVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnhhZnRlcmNhcmUuY29tL2JhY2tlbmQvaW5zdGl0dXRpb24vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731323694),
('T8Xgkd5VJhD2ljNTFunMO8jvIPIOFR36dU3HxQ0z', NULL, '146.70.87.172', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiem5BdUNnczNKbHNDZFdIbndmQk95WkYwV1N0WlhTbW5CRHVPOThoMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1731393837),
('UaH0zX3myk7GjyO2WlTDcAbnYlmWMa6MLgpbYkBH', NULL, '49.36.107.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ3VBaGE2Z3FrTUJXQndKRkNQRnFkNUdjUE94ZEVpaXBjSm0yVnZtNiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cHM6Ly93d3cueGFmdGVyY2FyZS5jb20vYmFja2VuZC9hZG1pbi9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cHM6Ly93d3cueGFmdGVyY2FyZS5jb20vYmFja2VuZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731649528),
('WNvqCoDk5GujXzjYOtQzDmpjXgpjoBrT4y26RlG9', 1, '67.149.182.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWmpqNDVCR1phaDFzQXR6VVpVQTJsZWkzbk9tenhpWWRXY0F6ZWV6cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8veGFmdGVyY2FyZS5jb20vYmFja2VuZC9jbGllbnQvbGl2ZS1ncm91cC1jbGFzc2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMzoibW9iaWxlX251bWJlciI7czoxMDoiNjg5Mjc1MDUzMSI7czo1MzoibG9naW5fY2xpZW50XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1731602781);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sobriety`
--

CREATE TABLE `sobriety` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sobriety_answere`
--

CREATE TABLE `sobriety_answere` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sobriety_id` bigint(20) DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answere_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answere_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answere_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answere_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answere_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answere_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `institution_id`, `name`, `country_code`, `mobile_no`, `email_id`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr. Trystan', '+1', 6892750531, 'drtrystan@gmail.com', NULL, 'speaker', 1, '2024-09-20 22:38:48', '2024-11-03 20:55:59'),
(2, 1, 'Dr. Fish', '+1', 1542563651, 'drfish@gmail.com', NULL, 'speaker', 1, '2024-11-03 21:00:46', '2024-11-03 21:00:46'),
(3, 1, 'Dr. Sarah Johnson', '+1', 5985623254, 'Sjohnson@gmail.com', NULL, 'speaker', 1, '2024-11-03 21:01:25', '2024-11-03 21:01:25'),
(4, 1, 'Dr. John Lee', '+1', 5968541523, 'Jlee@gmail.com', NULL, 'speaker', 1, '2024-11-03 21:01:52', '2024-11-03 21:01:52'),
(5, 1, 'Dr. Micheal Brown', '+1', 6698544125, 'Mbrownie@gmail.com', NULL, 'speaker', 1, '2024-11-03 21:02:26', '2024-11-03 21:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addiction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@xaftercare.com', NULL, '$2y$12$bDoGs0EIY7epRbh2rcUlo.vjY48Z.2yhOf.yCNRQBKmdffmvnSmAy', NULL, NULL, NULL, '2024-06-23 07:41:20', '2024-07-13 06:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `verify_otp`
--

CREATE TABLE `verify_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` bigint(20) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `verified` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_otp`
--

INSERT INTO `verify_otp` (`id`, `institution_id`, `otp`, `verified`, `created_at`, `updated_at`) VALUES
(1, 1, 3182, 0, '2024-07-06 05:13:14', '2024-07-06 05:13:14'),
(2, 1, 2289, 0, '2024-07-07 06:07:47', '2024-07-07 06:07:47'),
(3, 1, 5719, 0, '2024-07-07 13:32:22', '2024-07-07 13:32:22'),
(4, 1, 4744, 0, '2024-07-08 09:40:33', '2024-07-08 09:40:33'),
(5, 1, 2265, 0, '2024-07-09 12:53:47', '2024-07-09 12:53:47'),
(6, 1, 5601, 1, '2024-07-09 12:53:47', '2024-07-09 12:53:59'),
(7, 1, 1130, 1, '2024-07-09 13:51:32', '2024-07-09 13:51:52'),
(8, 1, 8494, 1, '2024-07-09 20:59:36', '2024-07-09 21:00:04'),
(9, 2, 5878, 1, '2024-07-09 21:02:00', '2024-07-09 21:02:25'),
(10, 1, 5321, 1, '2024-07-11 12:10:59', '2024-07-11 12:11:17'),
(11, 1, 7998, 1, '2024-07-11 12:11:38', '2024-07-11 12:12:08'),
(12, 1, 2769, 1, '2024-07-11 12:14:09', '2024-07-11 12:14:21'),
(13, 4, 2218, 1, '2024-07-11 12:21:55', '2024-07-11 12:22:10'),
(14, 1, 9695, 1, '2024-07-13 03:39:37', '2024-07-13 03:39:59'),
(15, 1, 6165, 1, '2024-07-13 05:30:35', '2024-07-13 05:30:47'),
(16, 1, 9970, 1, '2024-07-13 06:43:07', '2024-07-13 06:43:22'),
(17, 1, 5365, 1, '2024-07-13 06:47:57', '2024-07-13 06:48:06'),
(18, 1, 4178, 1, '2024-07-13 06:57:08', '2024-07-13 06:57:22'),
(19, 5, 5063, 1, '2024-07-14 22:08:56', '2024-07-14 22:09:16'),
(20, 5, 9821, 1, '2024-07-15 14:30:19', '2024-07-15 14:30:42'),
(21, 8, 2956, 0, '2024-07-16 21:07:27', '2024-07-16 21:07:27'),
(22, 8, 6644, 0, '2024-07-16 21:08:34', '2024-07-16 21:08:34'),
(23, 8, 4696, 0, '2024-07-16 21:12:46', '2024-07-16 21:12:46'),
(24, 8, 1133, 0, '2024-07-16 21:14:43', '2024-07-16 21:14:43'),
(25, 8, 9384, 1, '2024-07-16 21:20:22', '2024-07-16 21:21:12'),
(26, 8, 6831, 1, '2024-07-16 21:46:21', '2024-07-16 21:46:37'),
(27, 8, 3205, 1, '2024-07-16 21:54:23', '2024-07-16 21:54:37'),
(28, 8, 2654, 0, '2024-07-17 11:08:27', '2024-07-17 11:08:27'),
(29, 7, 9373, 0, '2024-07-17 12:42:34', '2024-07-17 12:42:34'),
(30, 8, 6213, 0, '2024-07-18 12:25:32', '2024-07-18 12:25:32'),
(31, 7, 4949, 0, '2024-07-18 12:26:47', '2024-07-18 12:26:47'),
(32, 8, 5106, 1, '2024-07-18 12:41:46', '2024-07-18 12:42:07'),
(33, 8, 6013, 0, '2024-07-19 12:22:24', '2024-07-19 12:22:24'),
(34, 8, 9055, 0, '2024-07-20 00:39:11', '2024-07-20 00:39:11'),
(35, 8, 2929, 0, '2024-07-23 21:04:37', '2024-07-23 21:04:37'),
(36, 8, 4603, 1, '2024-07-24 12:40:40', '2024-07-24 12:41:25'),
(37, 7, 3386, 0, '2024-07-24 12:43:09', '2024-07-24 12:43:09'),
(38, 8, 3485, 1, '2024-07-25 20:27:41', '2024-07-25 20:28:27'),
(39, 8, 5688, 1, '2024-07-25 20:41:49', '2024-07-25 20:42:03'),
(40, 8, 8177, 0, '2024-07-25 20:44:12', '2024-07-25 20:44:12'),
(41, 9, 9987, 1, '2024-08-22 20:43:00', '2024-08-22 20:43:10'),
(42, 9, 7902, 1, '2024-09-19 01:47:26', '2024-09-19 01:47:33'),
(43, 9, 2725, 1, '2024-09-28 03:08:59', '2024-09-28 03:09:09'),
(44, 9, 9546, 0, '2024-09-30 06:12:01', '2024-09-30 06:12:01'),
(45, 9, 5910, 1, '2024-09-30 06:12:20', '2024-09-30 06:12:30'),
(46, 9, 3280, 1, '2024-10-22 20:46:29', '2024-10-22 20:46:46'),
(47, 9, 4225, 1, '2024-11-01 11:01:06', '2024-11-01 11:01:34'),
(48, 9, 1567, 1, '2024-11-14 10:37:11', '2024-11-14 10:37:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_logs_daily`
--
ALTER TABLE `login_logs_daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_otp_verify`
--
ALTER TABLE `mobile_otp_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `progress_bar`
--
ALTER TABLE `progress_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_library`
--
ALTER TABLE `resource_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_library_images`
--
ALTER TABLE `resource_library_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sobriety`
--
ALTER TABLE `sobriety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sobriety_answere`
--
ALTER TABLE `sobriety_answere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_otp`
--
ALTER TABLE `verify_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_logs_daily`
--
ALTER TABLE `login_logs_daily`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobile_otp_verify`
--
ALTER TABLE `mobile_otp_verify`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `progress_bar`
--
ALTER TABLE `progress_bar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_library`
--
ALTER TABLE `resource_library`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `resource_library_images`
--
ALTER TABLE `resource_library_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sobriety`
--
ALTER TABLE `sobriety`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sobriety_answere`
--
ALTER TABLE `sobriety_answere`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verify_otp`
--
ALTER TABLE `verify_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
