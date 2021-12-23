-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2021 at 02:47 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `resume` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`id`, `job_id`, `user_id`, `resume`, `created_at`, `updated_at`) VALUES
(1, 2, 19, 'dd62af83ebf408d1252a909447b2f004.pdf', '2021-12-20 01:26:22', '2021-12-20 01:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Business Analyst', '2021-12-20 00:52:10', '2021-12-20 00:54:16'),
(2, 0, 'Developer', '2021-12-20 00:52:21', '2021-12-20 00:52:21'),
(3, 0, 'Tester', '2021-12-20 00:52:40', '2021-12-20 00:52:40'),
(4, 2, 'Laravel Developers', '2021-12-20 00:52:55', '2021-12-20 00:52:55'),
(5, 2, 'Full-Stack Developer', '2021-12-20 00:53:14', '2021-12-20 00:53:14'),
(6, 2, 'Android Developer', '2021-12-20 00:53:25', '2021-12-20 00:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `address`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'sample addesss', 'sample@email.co', '+13338265154', NULL, '2021-12-20 03:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'There is no contract.', '2021-12-20 00:54:59', '2021-12-20 00:55:54'),
(2, 'Six months contract.', '2021-12-20 00:55:16', '2021-12-20 00:56:05'),
(3, 'One year contract.', '2021-12-20 00:55:31', '2021-12-20 00:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_pages`
--

CREATE TABLE `dynamic_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dec2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamic_pages`
--

INSERT INTO `dynamic_pages` (`id`, `title`, `description`, `title2`, `dec2`, `title3`, `desc3`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'Job Offer 1', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;Work Sans&quot;, sans-serif; letter-spacing: 1px;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', 'Job Offer 2', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;Work Sans&quot;, sans-serif; letter-spacing: 1px;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu f', 'Job Offer 3', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;Work Sans&quot;, sans-serif; letter-spacing: 1px;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu f', 'f85fcf58764172dfd1c2eb8f06d92bd5.jpg', '2021-12-11 06:56:55', '2021-12-16 07:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `experience_levels`
--

CREATE TABLE `experience_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `from_year` int DEFAULT NULL,
  `to_year` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience_levels`
--

INSERT INTO `experience_levels` (`id`, `from_year`, `to_year`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2021-12-20 00:58:38', '2021-12-20 00:58:38'),
(2, 0, 1, '2021-12-20 00:58:52', '2021-12-20 00:58:52'),
(3, 0, 2, '2021-12-20 00:59:04', '2021-12-20 00:59:50'),
(4, 1, 2, '2021-12-20 00:59:16', '2021-12-20 00:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_settings`
--

CREATE TABLE `home_page_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_1_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_2_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_3_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_4_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_bottom_categories` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_charge` decimal(12,4) NOT NULL DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_settings`
--

INSERT INTO `home_page_settings` (`id`, `site_logo`, `banner_1`, `banner_2`, `banner_3`, `banner_4`, `banner_1_link`, `banner_2_link`, `banner_3_link`, `banner_4_link`, `home_bottom_categories`, `home_content`, `created_at`, `updated_at`, `shipping_charge`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `contracts_id` bigint UNSIGNED DEFAULT NULL,
  `working_hours_id` bigint UNSIGNED DEFAULT NULL,
  `experience_level_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `recruiter_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` tinyint DEFAULT NULL COMMENT '0=parttime 1=fulltime',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `location`, `category_id`, `contracts_id`, `working_hours_id`, `experience_level_id`, `status`, `recruiter_id`, `job_type`, `created_at`, `updated_at`) VALUES
(1, 'PHP Developer', 'Candidate must have the basic knowledge of&nbsp; HTML ,CSS ,JavaScript,Bootstrap and basic concept of core PHP.', 'Vadodara', 2, 1, 3, 1, 1, '1', 1, '2021-12-20 01:03:46', '2021-12-20 01:04:03'),
(2, 'Full-Stack Developer', '<span style=\"color: rgb(102, 102, 102); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14.4px; letter-spacing: 1px;\">Need to know Html,Css,JavaScript,PHP,Ajax.</span><br style=\"box-sizing: border-box; color: rgb(102, 102, 102); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14.4px; letter-spacing: 1px;\" />\n<span style=\"color: rgb(102, 102, 102); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 14.4px; letter-spacing: 1px;\">Implement server side logic to process front inputs. Identify and fix bugs that are found within code. Interact with SQL databases.</span>', 'Surat', 5, 2, 4, 2, 1, '18', 1, '2021-12-20 01:13:12', '2021-12-20 01:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `main_menues`
--

CREATE TABLE `main_menues` (
  `main_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdate` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_menues`
--

INSERT INTO `main_menues` (`main_id`, `name`, `createdate`) VALUES
(3, 'Admin Menu', 1519893716),
(5, 'Front', 1573214138);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` bigint UNSIGNED NOT NULL,
  `main_menu_id` int DEFAULT NULL,
  `submenu` int NOT NULL DEFAULT '0' COMMENT '1=yes, 0=no',
  `menu_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_title_guj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_title_hin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_menu_id` int DEFAULT '0',
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `Target` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '_self',
  `publish` int DEFAULT NULL,
  `icons` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type` int DEFAULT NULL COMMENT '1=page,2=link,3=submenu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `main_menu_id`, `submenu`, `menu_title`, `menu_title_guj`, `menu_title_hin`, `parent_menu_id`, `link`, `sort`, `Target`, `publish`, `icons`, `menu_type`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 'Dashboard', NULL, NULL, 0, 'admin/home', 1, '_self', 1, 'fas fa-tachometer-alt', 2, NULL, NULL),
(2, 3, 0, 'Users', NULL, NULL, 4, 'admin/users', 9, '_self', 1, 'fas fa-cubes', 2, NULL, NULL),
(3, 3, 0, 'Menus', NULL, NULL, 0, 'admin/menus', 7, '_self', 1, 'fas fa-cubes', 2, NULL, NULL),
(4, 3, 0, 'Administration', NULL, NULL, 0, NULL, 8, '_self', 1, 'fas fa-cubes', 3, NULL, NULL),
(5, 3, 0, 'Roles', NULL, NULL, 4, 'admin/roles', 10, '_self', 1, 'fas fa-cubes', 2, NULL, NULL),
(6, 3, 0, 'Settings', NULL, NULL, 4, 'admin/settings', 11, '_self', 0, 'fas fa-cubes', 2, NULL, NULL),
(7, 3, 0, 'Web Settings', NULL, NULL, 0, NULL, 12, '_self', 0, 'fas fa-cubes', 3, NULL, NULL),
(8, 3, 0, 'Sliders', NULL, NULL, 10, 'admin/sliders', 15, '_self', 1, 'fas fa-cubes', 2, NULL, NULL),
(9, 3, 0, 'Home Page Settings', NULL, NULL, 7, 'admin/home_page_settings', 13, '_self', 0, 'fas fa-cubes', 2, NULL, NULL),
(10, 3, 0, 'Dynamic Pages', NULL, NULL, 0, 'admin/pages', 14, '_self', 1, 'fas fa-cubes', 2, NULL, NULL),
(11, 3, 0, 'Categories', NULL, NULL, 0, 'admin/categories', 2, '_self', 1, NULL, 2, NULL, NULL),
(12, 3, 0, 'Working Hours', NULL, NULL, 0, 'admin/working_hours', 4, '_self', 1, NULL, 2, NULL, NULL),
(13, 3, 0, 'Contracts', NULL, NULL, 0, 'admin/contracts', 3, '_self', 1, NULL, 2, NULL, NULL),
(14, 3, 0, 'Experience Levels', NULL, NULL, 0, 'admin/experience_levels', 5, '_self', 1, NULL, 2, NULL, NULL),
(15, 3, 0, 'Jobs', NULL, NULL, 0, 'admin/jobs', 6, '_self', 1, NULL, 2, NULL, NULL),
(16, 3, 0, 'About Us', NULL, NULL, 10, '/admin/pages/1/edit', 16, '_self', 1, NULL, 2, NULL, NULL),
(17, 3, 0, 'Job Offers', NULL, NULL, 10, '/admin/job_offer/1/edit', 18, '_self', 1, NULL, 2, NULL, NULL),
(19, 3, 0, 'Contact Us', NULL, NULL, 10, 'admin/contactUs/1/edit', 17, '_self', 1, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_01_02_110847_create_roles_table', 1),
(9, '2020_01_02_111624_create_role_privilege_table', 1),
(10, '2020_01_02_112901_create_settings_table', 1),
(11, '2020_01_03_061755_create_main_menues_table', 1),
(12, '2020_01_03_065751_create_menus_table', 1),
(13, '2020_01_17_063722_change_user_table', 1),
(14, '2020_01_23_084320_add_fields_in_settings', 1),
(15, '2020_02_18_102836_add_field_in_users_table', 1),
(16, '2020_02_20_093803_create_sliders_table', 1),
(17, '2020_02_20_111724_create_home_page_settings_table', 1),
(18, '2020_02_21_070316_create_pages_table', 1),
(19, '2020_02_26_113024_add_field_in_home_page_settings_table', 1),
(20, '2020_03_11_123121_add_fields_in_home_page_settings_table', 1),
(21, '2021_07_05_094021_add_status_to_users_table', 1),
(22, '2021_11_11_053134_create_categories_table', 2),
(23, '2021_11_12_051211_create_categories_table', 3),
(24, '2021_11_12_093247_create_working_hours_table', 4),
(25, '2021_11_12_105216_create_working_hours_table', 5),
(26, '2021_11_12_114616_create_contracts_table', 6),
(27, '2021_11_12_114900_create_experience_levels_table', 6),
(29, '2021_11_13_072035_create_experience_levels_table', 7),
(32, '2021_12_02_054048_create_applied_jobs_table', 10),
(33, '2021_11_13_092748_create_jobs_table', 11),
(34, '2021_11_22_052412_add_job_type_to_jobs_table', 12),
(35, '2021_12_11_101546_create_job_offers', 13),
(36, '2021_12_11_103038_create_job_offers', 14),
(37, '2021_12_15_063358_change_job_offer_table_name', 15),
(40, '2021_12_15_063926_add__fields__to_dynamic_pages_table', 16),
(41, '2021_12_17_120242_create_contact_us_table', 17),
(42, '2021_12_17_131532_drop_column_to_dynamic_pages_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `desc`, `image_name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p>Employment opportunities for <span>Professionals</span><br />\nPellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque pharetra ac.<br />\nLorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque pharetra ac.</p>', '8e9d8f9dd1ab988c4d788bc073fc7825.png', 1, 1, '2021-11-21 23:01:56', '2021-12-16 01:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdate` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `createdate`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2021-11-10 01:22:04', '2021-11-10 01:22:04'),
(2, 'Administrator', NULL, '2021-11-10 01:22:04', '2021-11-10 01:22:04'),
(3, 'job provider', 1636607854, '2021-11-10 23:47:34', '2021-11-10 23:47:34'),
(4, 'Job Seeker', 1638178662, '2021-11-29 04:07:42', '2021-11-29 04:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_privilege`
--

CREATE TABLE `role_privilege` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int DEFAULT NULL,
  `module_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` int DEFAULT NULL,
  `access` int DEFAULT NULL,
  `add` int DEFAULT NULL,
  `edit` int DEFAULT NULL,
  `view` int DEFAULT NULL,
  `delete` int DEFAULT NULL,
  `print` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_privilege`
--

INSERT INTO `role_privilege` (`id`, `role_id`, `module_link`, `module_id`, `access`, `add`, `edit`, `view`, `delete`, `print`, `created_at`, `updated_at`) VALUES
(1, 3, 'admin/home', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, 'admin/categories', 11, 0, 0, 0, 0, 0, 0, NULL, NULL),
(3, 2, 'admin/jobs', 15, 0, 0, 0, 0, 0, 0, NULL, NULL),
(4, 3, 'admin/jobs', 15, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `mail_driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_recipient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_recipientname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `mail_driver`, `mail_host`, `mail_port`, `mail_from_address`, `mail_from_name`, `mail_encryption`, `mail_username`, `mail_password`, `mail_recipient`, `mail_recipientname`, `created_at`, `updated_at`, `zipcode`, `address`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `detail`, `image_name`, `thumb_image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Banner1', NULL, '92852267b956d08191dd7e501ecf83b7.jpg', NULL, NULL, '2021-11-18 00:04:19', '2021-11-18 00:04:19'),
(2, 'Banner2', NULL, '1c83b7b09d51b70c9b6d3e9d8fde3336.jpg', NULL, NULL, '2021-11-18 00:04:20', '2021-11-18 00:04:20'),
(3, 'Banner3', NULL, '28ff08e7bcefecfa8322898a8120d9bc.jpg', NULL, NULL, '2021-11-18 00:04:20', '2021-11-18 00:04:20'),
(4, 'Banner4', NULL, 'bd034fdbc845602276b40bb735a61d5d.jpg', NULL, NULL, '2021-11-18 00:04:21', '2021-11-18 00:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int DEFAULT NULL,
  `user_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ifsc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `mobile`, `role`, `user_image`, `remember_token`, `api_token`, `created_at`, `updated_at`, `deleted_at`, `zipcode`, `city`, `state`, `address`, `bank_name`, `bank_branch`, `bank_ifsc`, `bank_account_no`, `status`) VALUES
(1, 'Super', 'superadmin@gmail.com', NULL, '$2y$10$yUuKjedOJ8r6EiCF3U3CRebhYvjum70IFkAPQC/xVISq6KcXKi8ZW', 'Super', NULL, 1, NULL, NULL, NULL, '2021-11-10 01:21:59', '2021-11-10 01:21:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$yUuKjedOJ8r6EiCF3U3CRebhYvjum70IFkAPQC/xVISq6KcXKi8ZW', 'admin', NULL, 2, NULL, NULL, NULL, '2021-11-10 01:21:59', '2021-11-10 01:21:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'web brains', 'webbrain12@gm.con', NULL, '$2y$10$st5KJ739OXGYIZztUaDtpeWff/.ktcava6VJ/g/ag3TxvpUBuKvHC', 'webbrains12', '2154879632', 3, NULL, NULL, NULL, '2021-12-20 01:11:20', '2021-12-20 01:11:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'User', 'user29@yahoo.com', NULL, '$2y$10$XLk86J.TnxWDzwIU5DcZ6uTS0dx29zbe6dyL937b3kHqgtOAf9/9m', 'User29', '9824437282', 4, NULL, NULL, NULL, '2021-12-20 01:16:47', '2021-12-20 01:24:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `working_hours`
--

CREATE TABLE `working_hours` (
  `id` bigint UNSIGNED NOT NULL,
  `no_of_hours` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_hours`
--

INSERT INTO `working_hours` (`id`, `no_of_hours`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-12-20 00:56:29', '2021-12-20 00:57:46'),
(2, 8, '2021-12-20 00:56:37', '2021-12-20 00:56:37'),
(3, 9, '2021-12-20 00:56:44', '2021-12-20 00:56:44'),
(4, 10, '2021-12-20 00:56:51', '2021-12-20 00:57:37'),
(5, 11, '2021-12-20 00:57:01', '2021-12-20 00:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_levels`
--
ALTER TABLE `experience_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menues`
--
ALTER TABLE `main_menues`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_privilege`
--
ALTER TABLE `role_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience_levels`
--
ALTER TABLE `experience_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_menues`
--
ALTER TABLE `main_menues`
  MODIFY `main_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_privilege`
--
ALTER TABLE `role_privilege`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `working_hours`
--
ALTER TABLE `working_hours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
