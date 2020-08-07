-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 03:07 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'landlord', NULL, NULL),
(2, 'agent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `agent_id` smallint(5) UNSIGNED NOT NULL,
  `landlord_id` smallint(5) UNSIGNED DEFAULT NULL,
  `contract_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment_term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `agent_id`, `landlord_id`, `contract_number`, `rent_duration`, `start_date`, `end_date`, `payment_term`, `contract_file`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, '234543', '4 month(s)', '2020-07-01', '2020-07-31', 'monthly', 'uploads/contracts/234543-5f1e68030fe1a.pdf', '2020-07-26 21:48:07', '2020-07-28 00:26:29'),
(4, 3, 4, '4835784564', '5 month(s)', '2020-07-01', '2020-07-31', 'monthly', 'uploads/contracts/4835784564-5f1fff3d3e7aa.pdf', '2020-07-28 03:34:37', '2020-07-28 03:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_21_131648_create_account_types_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_07_20_153820_create_contracts_table', 1),
(6, '2020_07_20_154018_create_tenants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `filling_form_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_id` mediumint(8) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `first_name`, `family_name`, `email`, `phone_number`, `address`, `profession`, `company`, `income`, `photo`, `filling_form_token`, `contract_id`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 's.imam29@student.uns.ac.id', NULL, NULL, NULL, NULL, NULL, NULL, '09wmojy3hav3l0q5', 2, '2020-07-26 21:48:07', '2020-07-28 00:26:29'),
(4, 'Setiawan', 'Imam', 'onestia96@gmail.com', '082242510043', 'Wungusari RT 16, Tegaldowo Gemolong Sragen 57274', 'Freelancer', 'Qways', 4500, 'uploads/photos//Setiawan-5f200c2f7e335.jpeg', '2f8a887302721998836f84c28adaae5e', 4, '2020-07-28 03:34:37', '2020-07-28 04:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `account_type_id` tinyint(3) UNSIGNED NOT NULL,
  `national_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_type_id`, `national_id`, `first_name`, `family_name`, `phone_number`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, '2434', 'dasdk', 'hdkadhk', '43545', 'dadskan', 'dsnaskdand@dnasj.cmd', NULL, '$2y$10$sBqEqdChpLRdK59Jh4o1wul9fN7AmnKWE.mKB9KtgC8dUwZoDPTyi', NULL, '2020-07-23 08:23:27', '2020-07-23 08:23:27'),
(2, 1, '87395473', 'Imam', 'Setiawan', '082242510043', 'Wungusari RT 16, Tegaldowo Gemolong Sragen 57274', 's.imam29@student.uns.ac.id', NULL, '$2y$10$asHHWnArk/5Z7V/2qAi.iODvwJoODfw1GbREw06/6K.lIe9T8zcS6', NULL, '2020-07-27 07:52:31', '2020-07-27 07:52:31'),
(3, 2, '32435465546', 'Imam', 'Setiawan', '082242510043', 'Wungusari RT 16, Tegaldowo Gemolong Sragen 57274', 'onestia96@gmail.com', '2020-07-28 03:14:53', '$2y$10$ZgntxMAhMJBR5lO2PcK5yujZRtbV2AYmTPsYvnRsq8ZZ/YXi2/EYi', NULL, '2020-07-28 03:13:11', '2020-07-28 03:14:53'),
(4, 1, '8476495', 'Imam', 'Setiawan', '082242510043', 'Wungusari RT 16, Tegaldowo Gemolong Sragen 57274', 'imamset.business@gmail.com', '2020-07-28 03:46:15', '$2y$10$pKFXC6tOdjRHeu6j88fWpeFQfejWRpiY8532YOwq0uyDuRxMNAlPK', NULL, '2020-07-28 03:45:17', '2020-07-28 03:46:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_agent_id_foreign` (`agent_id`),
  ADD KEY `contracts_landlord_id_foreign` (`landlord_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenants_contract_id_foreign` (`contract_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_account_type_id_foreign` (`account_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contracts_landlord_id_foreign` FOREIGN KEY (`landlord_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
