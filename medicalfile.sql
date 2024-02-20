-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 10:15 AM
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
-- Database: `medicalfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ward_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `number`, `status`, `ward_id`, `created_at`, `updated_at`) VALUES
(6, 'Bed2', 'Vacant', 1, '2024-01-30 14:24:58', '2024-01-30 14:24:58'),
(7, 'Bed1', 'Occupied', 26, '2024-02-02 02:25:19', '2024-02-02 02:25:19'),
(8, 'Bed2', 'Vacant', 26, '2024-02-02 02:25:19', '2024-02-02 02:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `symp` varchar(255) NOT NULL,
  `Feeling_sick_date` varchar(255) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `patient_history_id`, `name`, `symp`, `Feeling_sick_date`, `medicines`, `created_at`, `updated_at`) VALUES
(1, 6, 'miiiii', 'test', '2022-5-10', 'nabskdhalklk', '2024-02-18 14:17:50', '2024-02-18 14:17:50'),
(2, 6, 'miiiii', 'test', '2022-5-10', 'nabskdhalklk', '2024-02-18 15:00:10', '2024-02-18 15:00:10'),
(3, 6, 'miiiii', 'test', '2022-5-10', 'nabskdhalklk', '2024-02-18 15:00:34', '2024-02-18 15:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `visit_price` double NOT NULL,
  `followup_price` double NOT NULL,
  `inpatient_visit_price` double NOT NULL,
  `note` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `visit_price`, `followup_price`, `inpatient_visit_price`, `note`, `signature`, `created_at`, `updated_at`) VALUES
(1, 5, 2255, 500, 500, 'mkhjk', 'morhaf_image/YKyWK9XdZjhdpKBv1k1QmjGq3PeQDDedsRLeCeXf.png', '2024-02-11 15:30:18', '2024-02-11 15:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_deps`
--

CREATE TABLE `hospital_deps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_deps`
--

INSERT INTO `hospital_deps` (`id`, `name`, `phone`, `email`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 'eyes', '2222222', 'moda@gmail.com', 'sdsadada', 'hghghhfh', '2024-02-11 13:45:53', '2024-02-11 13:45:53'),
(2, 'teeth', '123456789', 'teeth@gmail.com', 'sdsadadaaaaqq', 'hghghhfh', '2024-02-11 13:45:53', '2024-02-11 13:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_diags`
--

CREATE TABLE `hospital_diags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_dep_id` bigint(20) UNSIGNED NOT NULL,
  `lap_address` varchar(255) NOT NULL,
  `lap_phone` varchar(255) NOT NULL,
  `lap_mobile` varchar(255) NOT NULL,
  `lap_email` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_diags`
--

INSERT INTO `hospital_diags` (`id`, `hospital_dep_id`, `lap_address`, `lap_phone`, `lap_mobile`, `lap_email`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'morhaf', '21212121', '12212121', 'kndsa@gmail.com', 'densnan', '2024-02-11 13:54:41', '2024-02-11 14:12:36'),
(2, 2, 'morhaf', '21212121', '12212121', 'kna@gmail.com', 'moda', '2024-02-11 13:54:41', '2024-02-11 14:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_23_155703_create_hospital_deps_table', 1),
(6, '2024_01_23_155752_create_patients_table', 1),
(7, '2024_01_23_160913_create_doctors_table', 1),
(8, '2024_01_23_161730_create_hospital_diags_table', 1),
(9, '2024_01_23_162214_create_patient_histories_table', 1),
(10, '2024_01_23_162645_create_patient_followups_table', 1),
(11, '2024_01_23_162913_create_patient_diagnosle_histories_table', 1),
(12, '2024_01_30_125411_create_wards_table', 1),
(13, '2024_01_30_125423_create_beds_table', 1),
(14, '2024_02_01_155845_create_patient_admns_table', 1),
(15, '2024_02_10_174215_add_column_to_patients', 2),
(16, '2024_02_10_174456_create_diseases_table', 2),
(17, '2024_02_10_174525_create_patient_old_histories_table', 2),
(18, '2024_02_10_181846_add_column_to_patient_histories', 3),
(19, '2024_02_11_170233_add_column_to__users', 4),
(20, '2024_02_11_170817_add_column_to__patientdiagnoslehistory', 5),
(22, '2024_02_11_190112_add_column_to__patient_admn', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Relationship_Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `email`, `city`, `dob`, `gender`, `address`, `mobile`, `country`, `zipcode`, `created_at`, `updated_at`, `Relationship_Status`) VALUES
(10, 'mohamd', 'hegazi', 'hamdppp1222@gamil.com', 'kldmvk', '1999-12-01', 'm', 'dkjnv', '21541202', 'dsbfjkvsdkn', '4465461', '2024-02-10 15:37:25', '2024-02-10 15:37:25', 'skdcouidn'),
(11, 'mohamd', 'hegazi', 'hamdppp12@gamil.com', 'kldmvk', '1999-12-01', 'm', 'dkjnv', '21541202', 'dsbfjkvsdkn', '4465461', '2024-02-10 15:38:38', '2024-02-10 15:38:38', 'skdcouidn');

-- --------------------------------------------------------

--
-- Table structure for table `patient_admns`
--

CREATE TABLE `patient_admns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admission_data` varchar(255) NOT NULL,
  `discharge_data` varchar(255) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bed_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_admns`
--

INSERT INTO `patient_admns` (`id`, `admission_data`, `discharge_data`, `total_cost`, `note`, `created_at`, `updated_at`, `ward_id`, `bed_id`) VALUES
(4, '2022-May-05', '2024-5-12', 1000, 'nbkjgjff', '2024-02-02 02:50:30', '2024-02-11 15:16:28', NULL, NULL),
(5, '2022-May-05', '2023-May-05', 1000, 'nbkjgjff', '2024-02-02 02:52:15', '2024-02-02 02:52:15', NULL, NULL),
(7, '2022-5-5', NULL, NULL, 'nbkjgjff', '2024-02-11 15:25:28', '2024-02-11 15:25:28', 1, 7),
(8, '2022-5-5', NULL, NULL, 'nbkjgjff', '2024-02-11 15:25:38', '2024-02-11 15:25:38', 1, 7),
(9, '2022-5-5', NULL, NULL, 'nbkjgjff', '2024-02-11 15:25:47', '2024-02-11 15:25:47', 1, 7),
(10, '2022-5-5', NULL, NULL, 'nbkjgjff', '2024-02-11 15:30:37', '2024-02-11 15:30:37', 1, 7),
(11, '2022-5-5', NULL, NULL, 'nbkjgjff', '2024-02-11 15:32:49', '2024-02-11 15:32:49', 1, 7),
(12, '2022-5-5', '2024-5-12', 10000000, 'nbkjgjff', '2024-02-11 15:34:47', '2024-02-11 15:36:49', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosle_histories`
--

CREATE TABLE `patient_diagnosle_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_diag_id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `diag_price` double DEFAULT NULL,
  `lap_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_diagnosle_histories`
--

INSERT INTO `patient_diagnosle_histories` (`id`, `hospital_diag_id`, `patient_history_id`, `doctor_id`, `patient_id`, `date`, `note`, `created_at`, `updated_at`, `diag_price`, `lap_note`) VALUES
(3, 2, 6, 1, 10, '2000-2-25', 'moda', '2024-02-13 15:04:37', '2024-02-18 13:28:51', 2, NULL),
(4, 1, 6, 1, 10, '2024-9-15', 'mo', '2024-02-13 15:04:37', '2024-02-13 15:26:09', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_followups`
--

CREATE TABLE `patient_followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_history_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_followups`
--

INSERT INTO `patient_followups` (`id`, `patient_history_id`, `date`, `note`, `created_at`, `updated_at`, `total_price`) VALUES
(1, 6, '2022-5-11', 'kdn', '2024-02-18 15:00:34', '2024-02-18 15:00:34', '22222');

-- --------------------------------------------------------

--
-- Table structure for table `patient_histories`
--

CREATE TABLE `patient_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_admn_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_histories`
--

INSERT INTO `patient_histories` (`id`, `patient_id`, `doctor_id`, `date`, `note`, `created_at`, `updated_at`, `patient_admn_id`) VALUES
(6, 11, 1, '2022-5-11', 'kdn', '2024-02-11 15:34:47', '2024-02-18 14:56:57', 12);

-- --------------------------------------------------------

--
-- Table structure for table `patient_old_histories`
--

CREATE TABLE `patient_old_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `old_medicines` varchar(255) NOT NULL,
  `old_disease` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_old_histories`
--

INSERT INTO `patient_old_histories` (`id`, `patient_id`, `old_medicines`, `old_disease`, `created_at`, `updated_at`) VALUES
(1, 10, 'ndsmk', 'mxmmxm', '2024-02-10 15:37:25', '2024-02-10 15:37:25'),
(2, 11, 'ndsmk', 'mxmmxm', '2024-02-10 15:38:38', '2024-02-10 15:38:38'),
(3, 11, 'nabskdhalklk', 'miiiii', '2024-02-18 15:00:10', '2024-02-18 15:00:10'),
(4, 11, 'nabskdhalklk', 'miiiii', '2024-02-18 15:00:34', '2024-02-18 15:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 5, 'auth_token', 'b2565f6b1ff4ed2d59d4edf30e80095e60adae3c89bdb2b01593d11dba265514', '[\"*\"]', '2024-02-13 15:09:03', NULL, '2024-02-13 14:08:31', '2024-02-13 15:09:03'),
(2, 'App\\Models\\User', 5, 'auth_token', 'd3a494c098bbccdb21f62c8b50d60da18fe460df39bc275fd198401f109af503', '[\"*\"]', '2024-02-18 15:10:12', NULL, '2024-02-18 15:09:38', '2024-02-18 15:10:12'),
(3, 'App\\Models\\User', 2, 'auth_token', '871f188976efdd4299aad8964c03a9b6d84961ffbebdd0113f7449eb3105739e', '[\"*\"]', '2024-02-18 15:40:44', NULL, '2024-02-18 15:38:55', '2024-02-18 15:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hospital_dep_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `dob`, `gender`, `address`, `mobile`, `phone_num`, `type`, `remember_token`, `created_at`, `updated_at`, `hospital_dep_id`) VALUES
(1, 'morhaf', 'aldakaka', 'tamxjsjr@gmail.com', '$2y$12$YL9dSFwCCVfIhLWklmVTYOxirbdpqv2ri1juqAedy/k1Oks59CKlO', '1998-07-07', 'mail', 'llllll', '228515', '413265', 'secretary', NULL, '2024-02-11 14:25:05', '2024-02-11 14:25:05', 1),
(2, 'morhaf', 'aldakaka', 'specialest@gmail.com', '$2y$12$g60pKtE3M3ivx0hZBUQKs.RDYkT.lELr4Lw7M5ih1FPyJ0HZtLzJ6', '1998-07-07', 'mail', 'llllll', '228515', '413265', 'specialest', NULL, '2024-02-11 14:25:53', '2024-02-11 14:25:53', 1),
(5, 'morhaf', 'aldakaka', 'doctor@gmail.com', '$2y$12$zNNINcC9S5K1zRLpKd17Yevl3SD9RszlrN0OXd/zDg6oV5ZQNGoMi', '1998-07-07', 'mail', 'llllll', '228515', '413265', 'doctor', NULL, '2024-02-11 15:30:18', '2024-02-11 15:30:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `number`, `status`, `created_at`, `updated_at`) VALUES
(1, '12222', '2222', '2024-01-30 12:56:15', '2024-01-30 14:07:05'),
(2, '1', 'mcl,clms', '2024-01-30 13:35:42', '2024-01-30 13:35:42'),
(3, '1', 'mcl,clms', '2024-01-30 13:36:23', '2024-01-30 13:36:23'),
(4, '1', 'mcl,clms', '2024-01-30 13:37:13', '2024-01-30 13:37:13'),
(5, '1', 'mcl,clms', '2024-01-30 13:37:57', '2024-01-30 13:37:57'),
(6, '1', 'mcl,clms', '2024-01-30 13:38:53', '2024-01-30 13:38:53'),
(7, '1', 'mcl,clms', '2024-01-30 13:39:09', '2024-01-30 13:39:09'),
(8, '1', 'mcl,clms', '2024-01-30 13:39:59', '2024-01-30 13:39:59'),
(9, '1', 'mcl,clms', '2024-01-30 13:40:12', '2024-01-30 13:40:12'),
(10, '1', 'mcl,clms', '2024-01-30 13:40:32', '2024-01-30 13:40:32'),
(11, '1', 'mcl,clms', '2024-01-30 13:40:40', '2024-01-30 13:40:40'),
(12, '1', 'mcl,clms', '2024-01-30 13:41:02', '2024-01-30 13:41:02'),
(13, '1', 'mcl,clms', '2024-01-30 13:41:22', '2024-01-30 13:41:22'),
(14, '1', 'mcl,clms', '2024-01-30 13:41:36', '2024-01-30 13:41:36'),
(15, '1', 'mcl,clms', '2024-01-30 13:41:55', '2024-01-30 13:41:55'),
(16, '1', 'mcl,clms', '2024-01-30 13:42:11', '2024-01-30 13:42:11'),
(17, '1', 'mcl,clms', '2024-01-30 13:42:20', '2024-01-30 13:42:20'),
(18, '1', 'mcl,clms', '2024-01-30 13:42:33', '2024-01-30 13:42:33'),
(19, '1', 'mcl,clms', '2024-01-30 13:43:48', '2024-01-30 13:43:48'),
(20, '1', 'mcl,clms', '2024-01-30 13:43:58', '2024-01-30 13:43:58'),
(21, '1', 'mcl,clms', '2024-01-30 13:44:21', '2024-01-30 13:44:21'),
(22, '1', 'mcl,clms', '2024-01-30 13:44:31', '2024-01-30 13:44:31'),
(23, 'WardNumber123', 'Active', '2024-01-30 13:55:33', '2024-01-30 13:55:33'),
(24, 'WardNumber123', 'Active', '2024-01-30 13:58:17', '2024-01-30 13:58:17'),
(25, 'WardNumber123', 'Active', '2024-01-30 14:24:58', '2024-01-30 14:24:58'),
(26, 'WardNumber123', 'Active', '2024-02-02 02:25:19', '2024-02-02 02:25:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beds_ward_id_foreign` (`ward_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diseases_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospital_deps`
--
ALTER TABLE `hospital_deps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_diags`
--
ALTER TABLE `hospital_diags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_diags_hospital_dep_id_foreign` (`hospital_dep_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `patient_admns`
--
ALTER TABLE `patient_admns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_admns_ward_id_foreign` (`ward_id`),
  ADD KEY `patient_admns_bed_id_foreign` (`bed_id`);

--
-- Indexes for table `patient_diagnosle_histories`
--
ALTER TABLE `patient_diagnosle_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_diagnosle_histories_hospital_diag_id_foreign` (`hospital_diag_id`),
  ADD KEY `patient_diagnosle_histories_patient_history_id_foreign` (`patient_history_id`),
  ADD KEY `patient_diagnosle_histories_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_diagnosle_histories_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patient_followups`
--
ALTER TABLE `patient_followups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_followups_patient_history_id_foreign` (`patient_history_id`);

--
-- Indexes for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_histories_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_histories_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_histories_patient_admn_id_foreign` (`patient_admn_id`);

--
-- Indexes for table `patient_old_histories`
--
ALTER TABLE `patient_old_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_old_histories_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_hospital_dep_id_foreign` (`hospital_dep_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_deps`
--
ALTER TABLE `hospital_deps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_diags`
--
ALTER TABLE `hospital_diags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_admns`
--
ALTER TABLE `patient_admns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient_diagnosle_histories`
--
ALTER TABLE `patient_diagnosle_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_followups`
--
ALTER TABLE `patient_followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_old_histories`
--
ALTER TABLE `patient_old_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_ward_id_foreign` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`);

--
-- Constraints for table `diseases`
--
ALTER TABLE `diseases`
  ADD CONSTRAINT `diseases_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hospital_diags`
--
ALTER TABLE `hospital_diags`
  ADD CONSTRAINT `hospital_diags_hospital_dep_id_foreign` FOREIGN KEY (`hospital_dep_id`) REFERENCES `hospital_deps` (`id`);

--
-- Constraints for table `patient_admns`
--
ALTER TABLE `patient_admns`
  ADD CONSTRAINT `patient_admns_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`id`),
  ADD CONSTRAINT `patient_admns_ward_id_foreign` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`);

--
-- Constraints for table `patient_diagnosle_histories`
--
ALTER TABLE `patient_diagnosle_histories`
  ADD CONSTRAINT `patient_diagnosle_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_diagnosle_histories_hospital_diag_id_foreign` FOREIGN KEY (`hospital_diag_id`) REFERENCES `hospital_diags` (`id`),
  ADD CONSTRAINT `patient_diagnosle_histories_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`),
  ADD CONSTRAINT `patient_diagnosle_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patient_followups`
--
ALTER TABLE `patient_followups`
  ADD CONSTRAINT `patient_followups_patient_history_id_foreign` FOREIGN KEY (`patient_history_id`) REFERENCES `patient_histories` (`id`);

--
-- Constraints for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD CONSTRAINT `patient_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_histories_patient_admn_id_foreign` FOREIGN KEY (`patient_admn_id`) REFERENCES `patient_admns` (`id`),
  ADD CONSTRAINT `patient_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patient_old_histories`
--
ALTER TABLE `patient_old_histories`
  ADD CONSTRAINT `patient_old_histories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_hospital_dep_id_foreign` FOREIGN KEY (`hospital_dep_id`) REFERENCES `hospital_deps` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
