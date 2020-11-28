-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2020 at 06:06 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenseid` bigint(20) UNSIGNED NOT NULL,
  `listbuy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datebuy` date NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenseid`, `listbuy`, `datebuy`, `qty`, `price`, `total`, `remark`, `userid`, `created_at`, `updated_at`) VALUES
(1, 'ຊື້ບັດເຕີມເງິນຫຼັກ 5', '2020-06-28', 1, 10000, 10000, NULL, 1, NULL, NULL),
(2, 'ຈືນກ້ວຍ', '2020-06-28', 2, 1000, 2000, NULL, 1, NULL, NULL),
(3, 'ນ້ຳກ້ອນ', '2020-06-28', 1, 1000, 1000, NULL, 1, NULL, NULL),
(4, 'ຊື້ໝໍ້ຊີ້ນດາດໄຟຟ້າ', '2020-05-10', 1, 145000, 145000, NULL, 1, NULL, NULL),
(5, 'ຊີ້ນໝູ', '2020-06-29', 1, 20000, 20000, NULL, 1, NULL, NULL),
(6, 'ຜັກກາດ', '2020-06-29', 1, 5000, 5000, NULL, 1, NULL, NULL),
(7, 'ໝີ່', '2020-06-29', 1, 5000, 5000, NULL, 1, NULL, NULL),
(8, 'ຜັກຫອມ', '2020-06-29', 2, 1000, 2000, NULL, 1, NULL, NULL),
(9, 'ກະແລມ', '2020-06-29', 2, 2000, 4000, NULL, 1, NULL, NULL),
(10, 'ໝາກເຜັດ', '2020-06-29', 1, 1000, 1000, NULL, 1, NULL, NULL),
(11, 'ໝາກເຂືອ', '2020-06-29', 1, 1000, 1000, NULL, 1, NULL, NULL),
(12, 'ລູກຊີ້ນ', '2020-06-29', 1, 5000, 5000, NULL, 1, NULL, NULL),
(13, 'ລຳໄຍ', '2020-06-29', 1, 5000, 5000, NULL, 1, NULL, NULL),
(14, 'ເຂົ້າໜົມ', '2020-06-29', 2, 11000, 22000, NULL, 1, NULL, NULL),
(15, 'ໝີ່ມ່າມ່າເຜັດ', '2020-06-29', 2, 5000, 10000, NULL, 1, NULL, NULL),
(16, 'ເປບຊີໃຫຍ່', '2020-06-29', 1, 11000, 11000, NULL, 1, NULL, NULL),
(17, 'ນ້ຳດື່ມຫົວເສືອ', '2020-06-29', 1, 18500, 18500, NULL, 1, NULL, NULL),
(18, 'ນ້ຳຕານ', '2020-06-29', 1, 7000, 7000, NULL, 1, NULL, NULL),
(19, 'ປາແດກ', '2020-06-29', 1, 5500, 5500, NULL, 1, NULL, NULL),
(20, 'ບັດເຕີມເງິນ', '2020-06-29', 1, 10000, 10000, NULL, 1, NULL, NULL),
(21, 'ເຕີມນ້ຳມັນ', '2020-06-30', 1, 19000, 19000, 'ເຕີມນ້ຳມັນ 1 ຄັ້ງ', 1, NULL, NULL),
(22, 'ຊື້ນ້ຳດື່ມຫົວເສືອໃຫຍ່', '2020-06-30', 1, 4000, 4000, NULL, 1, NULL, NULL),
(23, 'ຕຳມົ້ວ', '2020-06-30', 1, 12000, 12000, NULL, 1, NULL, NULL),
(24, 'ນ້ຳກ້ອນ', '2020-06-30', 1, 2000, 2000, NULL, 1, NULL, NULL),
(25, 'ກະປິ', '2020-07-01', 1, 8000, 8000, 'ເຈມາຕຣ໌', 1, NULL, NULL),
(26, 'ໝີກ່ອງຍຳຍຳ', '2020-07-01', 1, 4000, 4000, NULL, 1, NULL, NULL),
(27, 'ຢາແກ້ປວດ(ປາຣາເຊຕາໂມນ)', '2020-07-01', 1, 2000, 2000, NULL, 1, NULL, NULL),
(28, 'ໂອຣາລິດ', '2020-07-01', 3, 2000, 6000, NULL, 1, NULL, NULL),
(29, 'ປີ້ງໝູ', '2020-07-01', 1, 6000, 6000, '1 ໄມ້', 1, NULL, NULL),
(30, 'ນ້ຳດື່ມຫົວເສືອ', '2020-07-01', 1, 4000, 4000, NULL, 1, NULL, NULL),
(31, 'ເຂົ້າໜຽວ', '2020-07-01', 2, 1000, 2000, '2 ຂີດ', 1, NULL, NULL),
(32, 'ເຕີມນ້ຳມັນ', '2020-07-04', 1, 20000, 20000, NULL, 1, NULL, NULL),
(33, 'ຊື້ໝີ່ກ່ອງ', '2020-07-04', 1, 5000, 5000, NULL, 1, NULL, NULL),
(34, 'ເຂົ້າປີ້ງ', '2020-07-04', 3, 1000, 3000, NULL, 1, NULL, NULL),
(35, 'ນ້ຳດື່ມນ້ຳທິບໃຫຍ່', '2020-07-04', 1, 4000, 4000, NULL, 1, NULL, NULL),
(36, 'ໂອອີຊິ', '2020-07-04', 1, 5000, 5000, NULL, 1, NULL, NULL),
(37, 'ປີ້ງຈີນ', '2020-07-04', 21, 1000, 21000, NULL, 1, NULL, NULL),
(38, 'ຍຳຈີນ', '2020-07-04', 1, 20000, 20000, NULL, 1, NULL, NULL),
(39, 'ເປບຊີຈອກ', '2020-07-04', 2, 5000, 10000, NULL, 1, NULL, NULL),
(40, 'ແປງເຂົາລົດ', '2020-07-05', 1, 15000, 15000, NULL, 1, NULL, NULL),
(41, 'ຕັງເດີຕັດຜົມ', '2020-07-05', 1, 70000, 70000, NULL, 1, NULL, NULL),
(42, 'ບັດເຕີມເງິນຫຼັກ 5', '2020-07-05', 1, 10000, 10000, NULL, 1, NULL, NULL),
(43, 'ປີ້ງຊີ້ນໝູ', '2020-07-04', 1, 6000, 6000, NULL, 1, NULL, NULL),
(44, 'ປິ້ງລູກຊິ້ນ', '2020-07-04', 1, 2000, 2000, NULL, 1, NULL, NULL),
(45, 'ແຈ່ວສົ້ມ', '2020-07-04', 1, 2000, 2000, NULL, 1, NULL, NULL),
(46, 'ຕີນໄກ່', '2020-07-05', 1, 10000, 10000, NULL, 1, NULL, NULL),
(47, 'ລ້ອນ', '2020-07-05', 1, 5000, 5000, NULL, 1, NULL, NULL),
(48, 'ເຫັດເຂັມ', '2020-07-05', 1, 6000, 6000, NULL, 1, NULL, NULL),
(49, 'ຖົ່ວງອກ', '2020-07-05', 1, 2000, 2000, NULL, 1, NULL, NULL),
(50, 'ຜັກບົ້ງ', '2020-07-05', 1, 2000, 2000, NULL, 1, NULL, NULL),
(51, 'ຜັກກາດ', '2020-07-05', 1, 2000, 2000, NULL, 1, NULL, NULL),
(52, 'ບົວລະພາ', '2020-07-05', 1, 2000, 2000, NULL, 1, NULL, NULL),
(53, 'ໝາກນາວ', '2020-07-05', 1, 1000, 1000, NULL, 1, NULL, NULL),
(54, 'ໝາກເຜັດ', '2020-07-05', 1, 1000, 1000, NULL, 1, NULL, NULL),
(55, 'ຊື້ຂອງກິນ', '2020-07-05', 1, 6000, 6000, NULL, 1, NULL, NULL),
(56, 'ນ້ຳກ້ອນ', '2020-07-05', 1, 2000, 2000, NULL, 1, NULL, NULL),
(57, 'ເປັບຊີໃຫຍ່', '2020-07-05', 1, 12000, 12000, NULL, 1, NULL, NULL),
(58, 'ແຟັບ', '2020-07-05', 1, 21000, 21000, NULL, 1, NULL, NULL),
(59, 'ຂົ້ວຕັບ', '2020-07-06', 1, 5000, 5000, NULL, 1, NULL, NULL),
(60, 'ເອາະໄກ່', '2020-07-06', 1, 5000, 5000, NULL, 1, NULL, NULL),
(61, 'ນ້ຳກ້ອນ', '2020-07-06', 1, 1000, 1000, NULL, 1, NULL, NULL),
(62, 'ບັດເຕີມເງິນຫຼັກ 5', '2020-07-06', 1, 10000, 10000, NULL, 1, NULL, NULL),
(63, 'ເສຍຄ່າຫ້ອງເດືອນ 7-10', '2020-06-26', 3, 500000, 1500000, NULL, 1, NULL, NULL),
(64, 'ຊື້ນ້ຳໝາກນ໋ອດ', '2020-07-07', 1, 5000, 5000, NULL, 1, NULL, NULL),
(65, 'ສົ້ມຜັກ', '2020-07-07', 1, 3000, 3000, NULL, 1, NULL, NULL),
(66, 'ເຮັດທານ', '2020-07-07', 1, 5000, 5000, NULL, 1, NULL, NULL),
(67, 'ໝີ່ 6 ຖົງ', '2020-07-07', 1, 10000, 10000, NULL, 1, NULL, NULL),
(68, 'ຢາສະຜົມ', '2020-07-07', 1, 21000, 21000, NULL, 1, NULL, NULL),
(69, 'ຊື້ລູກຊີ້ນ', '2020-07-07', 1, 10000, 10000, NULL, 1, NULL, NULL),
(70, 'ຜັກ', '2020-07-07', 1, 2000, 2000, NULL, 1, NULL, NULL),
(71, 'ເຂົ້າປຸ້ນ', '2020-07-07', 1, 2000, 2000, NULL, 1, NULL, NULL),
(72, 'ໝາກແຕງ', '2020-07-07', 1, 3000, 3000, NULL, 1, NULL, NULL),
(73, 'ປີ້ງຕັບ', '2020-07-07', 1, 5000, 5000, NULL, 1, NULL, NULL),
(74, 'ຊີ້ນດອດ', '2020-07-07', 1, 5000, 5000, NULL, 1, NULL, NULL),
(75, 'ເຕີມນ້ຳມັນ', '2020-07-08', 1, 23000, 23000, NULL, 1, NULL, NULL),
(76, 'ກິນເຂົ້າປຸ້ນແຈ່ວຂີງ', '2020-07-08', 1, 47000, 47000, NULL, 1, NULL, NULL),
(77, 'ແຄັບໝູ', '2020-07-08', 2, 5000, 10000, NULL, 1, NULL, NULL),
(78, 'ນ້ຳກະຈຽບ', '2020-07-08', 1, 5000, 5000, NULL, 1, NULL, NULL),
(79, 'ປິ້ງລູກຊີ້ນ', '2020-07-08', 2, 2000, 4000, NULL, 1, NULL, NULL),
(80, 'ເຂົ້າປີ້ງ', '2020-07-09', 1, 5000, 5000, NULL, 1, NULL, NULL),
(81, 'ເຂົ້າຜັດທະເລ', '2020-07-09', 1, 15000, 15000, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_06_14_114405_create_permission_tables', 2),
(9, '2020_06_28_052137_create_expenses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1),
(5, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add', 'web', '2020-06-27 22:18:31', '2020-06-27 22:18:31'),
(2, 'Edit', 'web', '2020-06-27 22:18:31', '2020-06-27 22:18:31'),
(3, 'Delete', 'web', '2020-06-27 22:18:31', '2020-06-27 22:18:31'),
(4, 'View', 'web', '2020-06-27 22:18:31', '2020-06-27 22:18:31'),
(5, 'ManageUser', 'web', '2020-06-27 22:18:31', '2020-06-27 22:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-06-27 22:19:22', '2020-06-27 22:19:22'),
(2, 'Client', 'web', '2020-06-27 22:19:22', '2020-06-27 22:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sengsoulisay', 'sslssp1996@gmail.com', NULL, '$2y$10$24iCKWEXBZqKP/hXsyx7G.UdHFpeZ9vSzMM6Bt6J0dj4LsaUNCX5m', 'public', 'jdyofyF7EtZaDFNXUFVrGUFoNKW1AqSp0urADvgXgjF3GaoZkMEXJpXVoOF7', '1593932015.jpg', '2020-06-14 04:35:05', '2020-06-14 04:35:05'),
(2, 'Lonin', 'loninesaephan@gmail.com', NULL, '$2y$10$InaFxVTUd4GX48AHI2SpIOdnTCgB5kJqsOHz5ccIUNb7lQI.qKhve', 'public', 'HsBX7MtJCzbLThYViza3XoLhqqM7wEBS7AZH5KkxIr0vszYRr07Eva1sWHGn', '1593268374.jpg', '2020-06-26 17:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenseid`),
  ADD KEY `expenses_userid_foreign` (`userid`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenseid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
