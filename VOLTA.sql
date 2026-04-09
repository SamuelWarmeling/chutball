-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2026 at 10:21 AM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codexel2_xr152`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salary_date` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `balance`, `name`, `photo`, `email`, `email_verified_at`, `password`, `salary_date`, `type`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0.00, 'Md Admin', '/public/admin/assets/images/profile/1706650015HOx.png', 'admin@gmail.com', '2023-11-29 18:37:08', '$2y$10$2qcOUKrDIUqyyCklvHp7IO8fGNcJ1gAXtxouTn1isZPHu6H8CfHPq', '2024-05-03', 'admin', '01600000000', 'sd', 'GS25VySI3164qLRIKNefXEyUA8AnjmEdRzTefqgrzrvPx8zVwGyOOZcnKYp9', '2023-11-28 11:11:57', '2024-11-28 10:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ledgers`
--

CREATE TABLE `admin_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `perticulation` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected','default') NOT NULL DEFAULT 'default',
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus_name` varchar(255) NOT NULL,
  `counter` int(11) DEFAULT 0 COMMENT 'user get service count',
  `set_service_counter` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `winner` int(11) DEFAULT 0,
  `amount` double NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_ledgers`
--

CREATE TABLE `bonus_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bonus_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `bonus_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `token` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `amount` double(20,2) DEFAULT 0.00 COMMENT 'User Deposit Amount',
  `final_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) DEFAULT NULL,
  `status` enum('pending','rejected','approved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `method_name`, `address`, `transaction_id`, `order_id`, `amount`, `final_amount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Tron (TRC20)', '1010101010', 'Pc5GzYPM3.txAMnpi87.T5v3i5Q7eAiNWbC9ovdwq', '7YT8440H3A', 30.00, 30.00, '2024-12-21 02:03:01', 'approved', '2024-12-20 20:03:01', '2024-12-20 20:04:41'),
(3, 1, NULL, '01600201020', '1234567890', 'H2J5378JN2', 30.00, 30.00, '2024-12-21 14:37:53', 'pending', '2024-12-21 08:37:53', '2024-12-21 08:37:53'),
(4, 2, 'TymeBank', 'admin-bd', 'admin-bd', 'BOW1157XK7', 500.00, 500.00, '2025-01-11 20:47:40', 'approved', '2025-01-11 20:47:40', '2025-01-11 21:13:22'),
(5, 2, 'TymeBank', NULL, 'Hyyy', 'SWM4067BF9', 5000.00, 5000.00, '2026-02-28 08:54:47', 'pending', '2026-02-28 08:54:47', '2026-02-28 08:54:47');

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
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` longtext NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `commission` double(20,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `validity` bigint(20) NOT NULL,
  `minimum_invest` double(20,2) NOT NULL DEFAULT 0.00 COMMENT 'amount',
  `status` enum('upcoming','active') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `name`, `title`, `photo`, `commission`, `validity`, `minimum_invest`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fund 1', 'Fund oneFund oneFund oneFund one', '/public/upload/fund/1714067352YBp.jpg', 800.00, 5, 500.00, 'active', '2023-06-06 15:38:44', '2024-04-25 23:49:12'),
(18, 'Fund 2', 'Event', '/public/upload/fund/1714067554sbV.jpg', 2500.00, 2, 1500.00, 'active', '2024-03-24 11:28:12', '2024-05-01 07:27:28'),
(19, 'Fund 3', 'Event', '/public/upload/fund/1714067820Ksw.jpg', 3000.00, 1, 2000.00, 'active', '2024-03-24 11:29:44', '2024-05-01 07:25:27'),
(24, 'Fund 3', 'Vip4', '/public/upload/fund/171452681034u.jpg', 7500.00, 1, 5000.00, 'active', '2024-05-01 07:26:51', '2024-05-01 07:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `fund_invests`
--

CREATE TABLE `fund_invests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fund_id` bigint(20) UNSIGNED NOT NULL,
  `validity_expired` varchar(255) NOT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `return_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lucky_ledgers`
--

CREATE TABLE `lucky_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `draw_id` bigint(20) DEFAULT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `current_date` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `validity` varchar(255) NOT NULL COMMENT 'count days',
  `commission_with_avg_amount` double NOT NULL DEFAULT 0 COMMENT 'user get average amount after validity',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `type` enum('hot','vip') NOT NULL DEFAULT 'hot',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `title`, `photo`, `badge`, `price`, `validity`, `commission_with_avg_amount`, `status`, `type`, `created_at`, `updated_at`) VALUES
(24, 'Paddy', 'Vip 0', '/public/upload/package/17722731714lM.webp', '/public/upload/package/1772273171Zkd.webp', 4, '40', 20, 'active', 'hot', '2024-01-07 16:59:51', '2026-02-28 16:11:15'),
(25, 'Wheat', 'Vip 1', '/public/upload/package/17722733519A7.jpg', '/public/upload/package/1772273351v1X.jpg', 10, '30', 30, 'active', 'hot', '2024-01-07 17:03:27', '2026-02-28 16:09:11'),
(26, 'Corn', 'Vip 2', '/public/upload/package/1772273202csY.webp', '/public/upload/package/1772273202d8C.webp', 18, '35', 70, 'active', 'hot', '2024-01-07 17:07:38', '2026-02-28 16:06:42'),
(27, 'Ginger', 'VIP 3', '/public/upload/package/1772273235uQo.jpg', '/public/upload/package/1772273235WXU.jpg', 29, '30', 90, 'active', 'hot', '2024-01-09 18:21:25', '2026-02-28 16:07:15'),
(44, 'Broken', 'VIP 4', '/public/upload/package/1772273250uMk.jpg', '/public/upload/package/1772273250wNo.jpg', 45, '35', 175, 'active', 'hot', '2024-07-11 00:42:36', '2026-02-28 16:07:30'),
(56, 'Yellow', 'Vip 5', '/public/upload/package/1772273263X5V.jpg', '/public/upload/package/1772273263LwJ.jpg', 70, '40', 295, 'active', 'hot', '2024-10-13 14:58:18', '2026-02-28 16:07:43'),
(57, 'Garlic', 'Vip 6', '/public/upload/package/17722732812Bt.jpg', '/public/upload/package/177227328168G.jpg', 100, '30', 450, 'active', 'hot', '2024-10-13 15:01:45', '2026-02-28 16:08:01'),
(58, 'Mustard', 'Vip 7', '/public/upload/package/1772273336U8g.webp', '/public/upload/package/1772273336PyG.webp', 145, '30', 645, 'active', 'hot', '2024-10-13 15:04:38', '2026-02-28 16:08:56'),
(59, 'Watermelon', 'Vip 8', '/public/upload/package/17722733720Cz.webp', '/public/upload/package/1772273372OTK.webp', 300, '40', 1624, 'active', 'hot', '2024-10-13 15:08:07', '2026-02-28 16:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `receiver` varchar(200) DEFAULT NULL,
  `minimum` double(20,4) NOT NULL DEFAULT 0.0000,
  `maximum` double(20,3) NOT NULL DEFAULT 0.000,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `type` enum('wallet','usdt') NOT NULL DEFAULT 'wallet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `channel`, `address`, `receiver`, `minimum`, `maximum`, `status`, `type`, `created_at`, `updated_at`) VALUES
(43, 'TymeBank', '530****', 'demo', 200.0000, 5000.000, 'active', 'wallet', '2024-07-10 00:18:34', '2025-01-11 20:48:30'),
(44, 'Tron(TRC20)', 'TS7t849R*******XT5v', 'demo', 200.0000, 5000.000, 'active', 'usdt', '2024-11-22 17:49:15', '2025-01-11 20:48:48'),
(45, 'Usdtbep20', '0x*********B2', 'demo', 200.0000, 5000.000, 'active', 'usdt', '2024-12-03 23:24:00', '2025-01-11 20:49:07');

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

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `daily_income` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'pending',
  `validity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `package_id`, `amount`, `daily_income`, `date`, `status`, `validity`, `created_at`, `updated_at`) VALUES
(1, 1, 26, 18, 2.00, '2025-01-12 13:46:46', 'active', '2025-01-25 01:40:16', '2024-12-20 19:40:16', '2025-01-11 13:46:46'),
(2, 2, 24, 4, 0.33, '2025-01-12 21:20:49', 'active', '2025-02-25 21:20:49', '2025-01-11 21:20:49', '2025-01-11 21:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `rebates`
--

CREATE TABLE `rebates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_commission1` double(20,2) NOT NULL DEFAULT 0.00,
  `team_commission2` double(20,2) NOT NULL DEFAULT 0.00,
  `team_commission3` double(20,2) NOT NULL DEFAULT 0.00,
  `interest_commission1` double NOT NULL,
  `interest_commission2` double NOT NULL,
  `interest_commission3` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rebates`
--

INSERT INTO `rebates` (`id`, `team_commission1`, `team_commission2`, `team_commission3`, `interest_commission1`, `interest_commission2`, `interest_commission3`, `created_at`, `updated_at`) VALUES
(1, 10.00, 5.00, 2.00, 12, 4, 1, NULL, '2024-12-20 20:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_charge` int(11) NOT NULL DEFAULT 0 COMMENT 'percent',
  `minimum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `maximum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `w_time_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `checkin` double(20,2) NOT NULL DEFAULT 0.00,
  `registration_bonus` double(20,2) NOT NULL DEFAULT 0.00,
  `total_member_register_reword` int(11) NOT NULL DEFAULT 0,
  `total_member_register_reword_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `service` varchar(200) DEFAULT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `site_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `withdraw_charge`, `minimum_withdraw`, `maximum_withdraw`, `w_time_status`, `checkin`, `registration_bonus`, `total_member_register_reword`, `total_member_register_reword_amount`, `service`, `whatsapp`, `photo`, `site_name`, `created_at`, `updated_at`) VALUES
(1, 0, 8.00, 250.00, 'active', 0.00, 0.00, 0, 0.00, 'https://t.me/webdeveloper_sun', 'https://t.me/webdeveloper_sun', '/public/upload/package/1734725954Ekc.png', 'BPIP', '2022-01-18 11:03:22', '2025-01-12 01:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invest` double NOT NULL DEFAULT 0,
  `bonus` double NOT NULL DEFAULT 0,
  `team_size` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `invest`, `bonus`, `team_size`, `created_at`, `updated_at`) VALUES
(7, 15000, 300, 50, '2024-05-04 06:55:14', '2024-05-04 06:55:14'),
(8, 55000, 800, 102, '2024-05-04 06:55:37', '2024-05-04 06:55:37'),
(9, 200000, 1500, 150, '2024-05-04 06:56:19', '2024-05-04 06:56:19'),
(10, 400000, 3000, 500, '2024-05-04 06:57:05', '2024-05-04 06:57:05'),
(11, 1000000, 7000, 1500, '2024-05-04 06:57:58', '2024-05-04 06:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `task_requests`
--

CREATE TABLE `task_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `team_invest` double NOT NULL DEFAULT 0,
  `team_size` bigint(20) NOT NULL DEFAULT 0,
  `bonus` double NOT NULL DEFAULT 0,
  `status` enum('pending','received','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_by` varchar(255) DEFAULT NULL,
  `ref_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `investor` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(50) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `receive_able_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `rebate_balance` double(20,3) NOT NULL DEFAULT 0.000,
  `photo` varchar(255) DEFAULT NULL,
  `gateway_method` varchar(50) DEFAULT NULL,
  `gateway_number` varchar(50) DEFAULT NULL,
  `withdraw_password` varchar(255) DEFAULT NULL,
  `ifsc` varchar(200) DEFAULT NULL,
  `rb1` double(20,2) NOT NULL DEFAULT 0.00,
  `rb2` double(20,2) DEFAULT 0.00,
  `rb3` double(20,2) NOT NULL DEFAULT 0.00,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ban_unban` enum('ban','unban') NOT NULL DEFAULT 'unban',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_member` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ref_by`, `ref_id`, `name`, `investor`, `phone`, `ip`, `username`, `email`, `email_verified_at`, `password`, `type`, `balance`, `receive_able_amount`, `rebate_balance`, `photo`, `gateway_method`, `gateway_number`, `withdraw_password`, `ifsc`, `rb1`, `rb2`, `rb3`, `remember_token`, `status`, `ban_unban`, `created_at`, `updated_at`, `active_member`) VALUES
(1, '123456', '3597jx294gxb', 'akash', 1, '1600208571', '::1', 'uname1600208571', 'user812871734722813@gmail.com', NULL, '$2y$10$c.gXtYOgQ8voIqqHRnZUVeZA.guF9kQ8zzNFEpvwLfYIxZqJ94Cpe', NULL, 496.00, 0.00, 0.000, NULL, 'TRX', 'jhashor', '123456', NULL, 0.00, 0.00, 0.00, NULL, 'active', 'unban', '2024-12-20 19:26:53', '2025-01-11 13:46:46', 0),
(2, '12345678', '786rmr885zh0', 'admin', 1, '12345678', '103.178.191.68', 'uname12345678', 'user670481736450570@gmail.com', NULL, '$2y$10$.gCKZTgEHi5bHk5Vp8TZEuRWG6/IejR9Mlg208OB3k9JwsaVE.fGC', NULL, 496.00, 0.00, 0.000, NULL, 'TymeBank', '122676', NULL, NULL, 0.00, 0.00, 0.00, NULL, 'active', 'unban', '2025-01-10 01:22:50', '2025-01-11 21:24:38', 0),
(3, '786rmr885zh0', '821dlgtgq338', 'User92', 0, '085696062189', '125.166.16.81', 'uname085696062189', 'user896671736581903@gmail.com', NULL, '$2y$10$m.Y6KeZLW3LOjQPJadKB7ubj5HuyU7NMEHoFHX2bJn4kqqWzRa5ti', NULL, 0.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'active', 'unban', '2025-01-11 13:51:43', '2025-01-11 13:55:12', 0),
(4, '821dlgtgq338', 'mwa744766wpj', 'User29', 0, '082311205873', '182.3.138.74', 'uname082311205873', 'user645061736582112@gmail.com', NULL, '$2y$10$QKUi5TqhFj3ms27x0A2wGO11mU.nVGzT1FKAxvzIwOl0A4ed2bpDW', NULL, 0.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'active', 'unban', '2025-01-11 13:55:12', '2025-01-11 13:55:12', 0),
(5, '821dlgtgq338', 'w2d913741zgy', 'User92', 0, '081992831211', '125.166.16.81', 'uname081992831211', 'user949371736589596@gmail.com', NULL, '$2y$10$kB5JXRrDyOV05J0SUUFVYe/AgoObl4VCYBXV7JB/gS4MiSek6M3Sq', NULL, 0.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'active', 'unban', '2025-01-11 15:59:56', '2025-01-11 15:59:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_ledgers`
--

CREATE TABLE `user_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `get_balance_from_user_id` bigint(20) DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `perticulation` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected','default') NOT NULL DEFAULT 'default',
  `date` varchar(255) DEFAULT NULL,
  `step` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ledgers`
--

INSERT INTO `user_ledgers` (`id`, `user_id`, `get_balance_from_user_id`, `reason`, `perticulation`, `amount`, `debit`, `credit`, `status`, `date`, `step`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'daily_income', 'Corn Package commission', 2, 0, 2, 'approved', '2025-01-10 01:22:51', NULL, '2025-01-10 01:22:51', '2025-01-10 01:22:51'),
(2, 1, NULL, 'daily_income', 'Corn Package commission', 2, 0, 2, 'approved', '2025-01-11 13:46:46', NULL, '2025-01-11 13:46:46', '2025-01-11 13:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `vip_sliders`
--

CREATE TABLE `vip_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `page_type` enum('home_page','vip_page') NOT NULL DEFAULT 'home_page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vip_sliders`
--

INSERT INTO `vip_sliders` (`id`, `photo`, `status`, `page_type`, `created_at`, `updated_at`) VALUES
(11, '/public/upload/slider/1723471872e20.jpg', 'active', 'home_page', '2023-07-05 01:06:16', '2024-08-13 03:11:13'),
(12, '/public/upload/slider/1723471879kyn.jpg', 'active', 'home_page', '2023-07-05 01:06:35', '2024-08-13 03:11:19'),
(13, '/public/upload/slider/1723471886yrw.jpg', 'active', 'home_page', '2024-07-08 03:03:49', '2024-08-13 03:11:27'),
(14, '/public/upload/slider/1723471896CwD.jpg', 'active', 'home_page', '2024-07-13 22:39:25', '2024-08-13 03:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `oid` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `final_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','approved','rejected','processing') NOT NULL DEFAULT 'pending' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `method_name`, `oid`, `number`, `amount`, `charge`, `final_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'TRX', '205560uj6al739000', 'jhashor', 20.00, 0.00, 20.00, 'pending', '2024-12-20 19:36:19', '2024-12-20 19:36:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_user_id_foreign` (`user_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_invests`
--
ALTER TABLE `fund_invests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_invests_user_id_foreign` (`user_id`),
  ADD KEY `fund_invests_fund_id_foreign` (`fund_id`);

--
-- Indexes for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lucky_ledgers_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_package_id_foreign` (`package_id`);

--
-- Indexes for table `rebates`
--
ALTER TABLE `rebates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_requests`
--
ALTER TABLE `task_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fund_invests`
--
ALTER TABLE `fund_invests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rebates`
--
ALTER TABLE `rebates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_requests`
--
ALTER TABLE `task_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD CONSTRAINT `lucky_ledgers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
