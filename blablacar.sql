-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2018 lúc 08:55 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blablacar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `choose_pick_up` int(11) NOT NULL,
  `choose_drop_off` int(11) NOT NULL,
  `walk_pk` int(11) NOT NULL,
  `walk_dr` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ride_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `choose_pick_up`, `choose_drop_off`, `walk_pk`, `walk_dr`, `seats`, `price`, `fee`, `status`, `ride_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 17, 18, 0, 0, 2, 800000, 40000, -1, 7, 4, '2018-12-04 23:32:51', '2018-12-14 15:55:32'),
(5, 63, 58, 0, 0, 2, 400000, 20000, 0, 17, 5, '2018-12-10 17:57:33', '2018-12-10 17:57:33'),
(11, 61, 101, 0, 0, 1, 400000, 20000, 0, 26, 1, '2018-12-14 16:34:45', '2018-12-14 16:34:45'),
(12, 61, 101, 0, 0, 1, 400000, 20000, 0, 26, 8, '2018-12-15 23:30:37', '2018-12-15 23:30:37'),
(13, 61, 58, 0, 0, 1, 300000, 15000, 1, 28, 11, '2018-12-15 23:55:18', '2018-12-15 23:58:08'),
(14, 61, 107, 0, 0, 1, 200000, 10000, -1, 28, 12, '2018-12-16 00:42:56', '2018-12-16 00:43:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` float(10,7) NOT NULL,
  `lng` float(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locations`
--

INSERT INTO `locations` (`id`, `address`, `lat`, `lng`) VALUES
(1, '12 Đường Cầu Giấy, Cầu Giấy, Hà Nội, Việt Nam', 21.0327110, 105.7987442),
(2, '7 Đại Cồ Việt, Phố Huế, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0088043, 105.8510208),
(3, 'Học viện ngân hàng, Chùa Bộc, Quang Trung, Đống Đa, Hà Nội, Việt Nam', 21.0074654, 105.8287964),
(4, '12 Đại Cồ Việt, Lê Đại Hành, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0087585, 105.8503799),
(5, '125 Láng Hạ, Đống Đa, Hà Nội, Việt Nam', 21.0118294, 105.8118820),
(6, '47 Ba Đình, Nga Sơn, Thanh Hoá, Việt Nam', 20.0076389, 105.9732895),
(7, '21 Lương Thế Vinh, Thanh Xuân Bắc, Thanh Xuân, Hà Nội, Việt Nam', 20.9887810, 105.7982483),
(8, 'Trường Đại học Công nghiệp Hà Nội, Nhổn, Minh Khai, Bắc Từ Liêm, Hà Nội, Việt Nam', 21.0544491, 105.7351456),
(9, 'Trường Đại học Thương mại, Đường Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Mai Dịch Cầu Giấy Mai Dịch Cầu Giấy Hà Nội, Việt Nam', 21.0366707, 105.7751083),
(10, 'Tx. Sơn Tây, Sơn Tây, Hà Nội, Việt Nam', 21.1162262, 105.4953232),
(11, 'Kim Chung, Đông Anh, Hà Nội, Việt Nam', 21.1246338, 105.7761993),
(12, 'Trường Đại học Bách khoa Hà Nội, Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0055542, 105.8434601),
(13, 'Laptop Sơn Tây, Tùng Thiện, Tông, Sơn Lộc, Sơn Tây, Hà Nội, Việt Nam', 21.1129246, 105.4954453),
(14, '125 Phạm Hùng, Từ Liêm, Hà Nội, Việt Nam', 21.0100193, 105.7886047),
(15, 'Thư viện Tạ Quang Bửu, Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0044441, 105.8440781),
(16, '127 Kim Mã, Ba Đình, Hà Nội, Việt Nam', 21.0316467, 105.8251495),
(17, '125 ĐCT Nội Bài - Hạ Long, Biểu Nghi, Minh Thành, Yên Hưng, Quảng Ninh, Việt Nam', 21.0062809, 106.8588104),
(18, '49 Hải Dương, Tuy An, Phú Yên, Việt Nam', 13.3066483, 109.2121201),
(19, '12 Đội Cấn, Vĩnh Phúc, Ba Đình, Hà Nội, Việt Nam', 21.0385780, 105.8126678),
(20, '15 Phương Mai, Đống Đa, Hà Nội, Việt Nam', 21.0055218, 105.8375854),
(21, 'Dai Hoc Giao Thong Van Tai, Trường Chinh, Khương Mai, Hà Nội, Việt Nam', 21.0025330, 105.8248672),
(26, '45 Nguyễn Chí Thanh, Láng Thượng, Ba Đình, Hà Nội, Việt Nam', 21.0262718, 105.8099365),
(31, '15 Phan Bội Châu, Cửa Nam, Hoàn Kiếm, Hà Nội, Việt Nam', 21.0278931, 105.8423233),
(34, '256 Nguyễn Trãi, Trung Văn, Từ Liêm, Hà Nội, Việt Nam', 20.9885960, 105.7955704),
(39, '15 Đặng Văn Ngữ, Trung Tự, Đống Đa, Hà Nội, Việt Nam', 21.0093117, 105.8310623),
(40, '67 Nguyễn Cơ Thạch, Từ Liêm, Hà Nội, Việt Nam', 21.0354328, 105.7643127),
(41, 'Keangnam, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam', 21.0188580, 105.7826767),
(42, '15 Giảng Võ, Cát Linh, Đống Đa, Hà Nội, Việt Nam', 21.0318699, 105.8278198),
(43, 'Tp. Nam Định, Nam Định, Việt Nam', 20.4595852, 106.1176300),
(44, '13 Giảng Võ, Cát Linh, Đống Đa, Hà Nội, Việt Nam', 21.0328083, 105.8284531),
(45, '45 Phan Chu Trinh, Hoàn Kiếm, Hà Nội, Việt Nam', 21.0210533, 105.8541870),
(46, '14 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0089741, 105.8461304),
(47, '170 Lê Trọng Tấn, Thanh Xuân, Hà Nội, Việt Nam', 20.9959221, 105.8297348),
(48, '47 Trường Chinh, Phương Mai, Thanh Xuân, Hà Nội, Việt Nam', 20.9991341, 105.8393936),
(49, 'Trường Đại Học Y Hà Nội, Tôn Thất Tùng, Trung Tự, Đống Đa, Hà Nội, Việt Nam', 21.0046005, 105.8291855),
(50, '77 Đào Duy Từ, Hàng Buồm, Hà Nội, Việt Nam', 21.0362568, 105.8517303),
(51, '43 Nguyễn Chí Thanh, Giảng Võ, Ba Đình, Hà Nội, Việt Nam', 21.0273876, 105.8108444),
(52, '14 Trần Khánh Dư, Hoàn Kiếm, Hà Nội, Việt Nam', 21.0244942, 105.8594208),
(53, '55 Trần Khát Chân, Bạch Đằng, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0102997, 105.8611374),
(54, '14 Tạ Quang Bửu, Bách Khoa, Ha', 21.0089741, 105.8461304),
(56, '170 Lê Trọng Tấn, Thanh X', 20.9959221, 105.8297348),
(57, 'Tp. Hưng Yên, Hưng Yên, Việt Nam', 20.7152538, 106.0296631),
(58, 'Thanh Hoá, Việt Nam', 20.6702137, 104.3740616),
(59, 'Nam Định, Việt Nam', 20.5002537, 105.9240265),
(60, 'Hưng Yên, Việt Nam', 21.0054111, 105.8946686),
(61, 'Hà Nội, Hoàn Kiếm, Hà Nội, Việt Nam', 21.0503807, 105.7974777),
(62, 'Lào Cai, TX.Lào Cai, Lào Cai, Việt Nam', 22.5137405, 103.9624023),
(63, 'Thái Bình, Việt Nam', 20.7291317, 106.1094589),
(64, 'Ninh Bình, Việt Nam', 20.2902145, 105.9270859),
(96, '18 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0088329, 105.8461304),
(97, '100 Kim Mã, Ba Đình, Hà Nội, Việt Nam', 21.0334892, 105.8259659),
(98, '18 Đặng Văn Ngữ, Trung Tự, Đống Đa, Hà Nội, Việt Nam', 21.0115185, 105.8297882),
(99, '20 Nguyễn Cơ Thạch, Từ Liêm, Hà Nội, Việt Nam', 21.0364189, 105.7646408),
(101, 'Móng Cái, Quảng Ninh, Việt Nam', 21.6593285, 107.7318115),
(102, '12 Điện Biên Phủ, Phường 15, Bình Thạnh, Hồ Chí Minh, Việt Nam', 10.7983913, 106.6986771),
(103, 'Tp. Thủ Dầu Một, Bình Dương, Việt Nam', 11.1109266, 106.5951843),
(104, 'Tx. Dĩ An, Bình Dương, Việt Nam', 10.9689159, 106.7365799),
(105, 'Văn Điển, Thanh Trì, Hà Nội, Việt Nam', 20.9584789, 105.8388519),
(106, 'Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam', 21.0084209, 105.8413620),
(107, 'Thành phố Vinh, Nghệ An, Việt Nam', 18.7665634, 105.6264191),
(108, 'Vinh, Nghệ An, Việt Nam', 18.7665634, 105.6264191),
(109, 'Hải Dương, Việt Nam', 20.9878063, 106.2577667),
(110, 'Hải Phòng, Việt Nam', 20.8792629, 106.6375961),
(111, 'Đà Nẵng, Hải Châu, Đà Nẵng, Việt Nam', 16.0951347, 108.1779938),
(112, 'Tp. Tam Kỳ, Quảng Nam, Việt Nam', 15.6459455, 108.4407272),
(113, 'Thành phố Hồ Chí Minh, Hồ Chí Minh, Việt Nam', 11.1602135, 106.3638763),
(114, 'Tp. Tây Ninh, Tây Ninh, Việt Nam', 11.4384375, 106.0712967),
(115, 'Phú Mỹ Hưng, Củ Chi, Hồ Chí Minh, Việt Nam', 11.1601543, 106.4373932),
(116, 'Tp. Bắc Ninh, Bắc Ninh, Việt Nam', 21.2278156, 106.0174484);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rides`
--

CREATE TABLE `rides` (
  `id` int(11) NOT NULL,
  `pick_up` int(11) NOT NULL,
  `stopover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `seats` int(11) NOT NULL,
  `sub_path1` int(11) NOT NULL DEFAULT '0',
  `sub_path2` int(11) NOT NULL DEFAULT '0',
  `path` int(11) NOT NULL DEFAULT '0',
  `detail` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rides`
--

INSERT INTO `rides` (`id`, `pick_up`, `stopover`, `drop_off`, `start_date`, `start_time`, `seats`, `sub_path1`, `sub_path2`, `path`, `detail`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 12, '14', 13, '2018-11-22', '04:10:00', 3, 120000, 120000, 200000, NULL, 0, 1, '2018-11-12 02:08:59', '2018-12-14 16:45:02'),
(6, 15, NULL, 16, '2018-11-30', '17:10:00', 4, 0, 0, 200000, NULL, 1, 1, '2018-11-12 02:12:01', '2018-12-14 16:09:25'),
(7, 17, NULL, 18, '2018-11-29', '15:40:00', 3, 0, 0, 300000, NULL, 1, 1, '2018-11-12 02:19:19', '2018-12-14 16:46:42'),
(8, 31, '36', 34, '2018-11-28', '17:10:00', 3, 50000, 50000, 800000, NULL, 1, 4, '2018-11-13 01:25:07', '2018-11-13 01:25:07'),
(9, 31, '36', 34, '2018-11-27', '17:10:00', 3, 50000, 50000, 800000, NULL, 1, 4, '2018-11-13 01:25:07', '2018-11-13 01:25:07'),
(10, 39, '41', 40, '2018-11-27', '16:10:00', 3, 120000, 120000, 200000, NULL, 1, 2, '2018-11-13 02:43:52', '2018-11-13 02:43:52'),
(11, 42, '60', 43, '2018-12-07', '06:30:00', 3, 120000, 200000, 300000, 'Đi khoảng 6 tiếng', 1, 4, '2018-12-02 17:25:02', '2018-12-04 23:10:25'),
(12, 44, NULL, 45, '2018-12-27', '15:20:00', 2, 0, 0, 800000, NULL, 1, 4, '2018-12-02 19:16:44', '2018-12-02 19:16:44'),
(13, 46, '49', 47, '2018-12-27', '18:30:00', 3, 100000, 100000, 150000, NULL, 1, 4, '2018-12-02 19:30:56', '2018-12-02 19:30:56'),
(14, 50, NULL, 51, '2018-12-18', '15:30:00', 3, 0, 0, 200000, 'Yêu cầu không delay', 0, 1, '2018-12-04 06:59:52', '2018-12-14 16:44:56'),
(15, 61, NULL, 62, '2018-12-28', '18:00:00', 3, 0, 0, 700000, 'Đi đường quốc lộ', 1, 4, '2018-12-04 22:44:12', '2018-12-04 22:44:12'),
(17, 63, '64', 58, '2018-12-20', '16:00:00', 0, 200000, 200000, 400000, 'Xe rộng rãi, thoải mái', 1, 4, '2018-12-04 23:15:04', '2018-12-10 17:57:33'),
(26, 61, NULL, 101, '2019-01-03', '16:00:00', 4, 0, 0, 400000, NULL, 1, 2, '2018-12-14 16:30:50', '2018-12-14 16:43:57'),
(27, 102, '104', 103, '2019-01-02', '16:00:00', 3, 100000, 100000, 200000, NULL, 1, 2, '2018-12-14 17:54:03', '2018-12-14 17:54:34'),
(28, 61, '58', 107, '2018-12-18', '18:00:00', 3, 100000, 120000, 200000, NULL, 1, 10, '2018-12-15 23:53:45', '2018-12-16 00:05:51'),
(29, 109, NULL, 110, '2018-12-19', '15:00:00', 3, 0, 0, 200000, NULL, 1, 10, '2018-12-16 11:51:39', '2018-12-16 11:51:39'),
(30, 111, NULL, 112, '2019-01-04', '18:50:00', 3, 0, 0, 200000, NULL, 1, 8, '2018-12-17 00:07:07', '2018-12-17 00:07:07'),
(31, 113, '115', 114, '2019-01-04', '16:00:00', 3, 120000, 200000, 400000, NULL, 1, 8, '2018-12-17 00:08:04', '2018-12-17 00:08:04'),
(32, 109, NULL, 116, '2019-01-05', '16:00:00', 3, 0, 0, 200000, NULL, 1, 4, '2018-12-17 00:54:51', '2018-12-17 00:54:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vu Ngoc Dang', 'vungocdang@gmail.com', '321387913', '$2y$10$L3dadrCFhaWI3dlO/w4CTudGesRXzb4S4M/Bql9HnlP50o2g3Nlsq', 'vObTCt7m0tIbanSaLfMc3dxvTEqhstf64rsfX2Sc0zB8Hx5INZsTSmcWk2KU', '2018-11-11 23:02:15', '2018-11-11 23:02:15'),
(2, 'Nguyen Dinh Van', 'van@gmail.com', '0971053097', '$2y$10$ERQV1/U8sGowr5Yd7BdA9e4JtHTPdB.w1JgbYe/mOj71fs.WUdSGC', 'oqUpXzh6bOyO51m2d3K6hpquvFg3tvgzNsoShAIin3bR3pcBZdzVvmfG934p', '2018-11-11 23:03:28', '2018-12-14 17:04:29'),
(4, 'Vu Cong Duy', 'duy123@gmail.com', '0971053097', '$2y$10$hXOF2ammUTLDgJLtwzURzu3hgKkboT6qLNVlPaHlAuSAEP.yr5ZiS', 'iqvdChvBDMBCPMh2tZsoye4MzBbgUdSF8ymYo0A8wHaF3XTVs89gZ5crmzDZ', '2018-11-12 02:53:28', '2018-12-15 23:42:16'),
(5, 'Vu Manh Duc', 'duc123@gmail.com', '321387913', '$2y$10$kEhnrD6Oj//.wUGD3p.1bu3jJ5Aq5SP3DxBYxD1/GSGA.uy3VR.Qe', 'UYqkSCguJ4GyXIvxssqt4xvtLqrwuo4x0S6WTWtiwrSxLomsYOm8UBIfRKZz', '2018-11-26 09:30:31', '2018-11-26 09:30:31'),
(6, 'Vu Ngoc Truc', 'truc123@gmail.com', '321387913', '$2y$10$bQXUJy3LXXLIdG9xcIKWw./ALSV9nKq4hrh8c8s5dxmkfbw6VwjWS', 'JoicTL5wSxKY4GwfBzjfn0NQekwWp2Mb2IUZKKr4bGP6LRZPhgmRD0bwwoTA', '2018-11-27 07:07:51', '2018-11-27 07:07:51'),
(7, 'Le Tien Dat', 'dat@gmail.com', '321387913', '$2y$10$A9I64YUzP3mmUhV87CMZxe/Tjk1QtGlzn../iX3HoI1ALCge4cFOa', '0Mv5DtTbWZLPYhrzscZpa7Q1Kl9HmOPIb4vncYtUxaj3CM85IQLDDUhTeKQ2', '2018-12-10 18:03:26', '2018-12-10 18:03:26'),
(8, 'Vu Van Tao', 'tao123@gmail.com', '321387913', '$2y$10$MUefX78lkT67tug/tWMR0e7lLQW8oU7vvYhkkB4wSWHFNRGemz05W', 'zfvaYa7TkGoQZyOrMNEhd1xIZRJPYrfcTSkIriOUbBlSBe7ZqaUwdg738nqF', '2018-12-14 14:20:19', '2018-12-14 14:20:19'),
(9, 'Do Dinh Dao', 'dao@gmail.com', '381293021', '$2y$10$lsJHeg6nOZSYi1fNUoXj5.EzSwq8k43ghuV3iz/0jeyLtJkL8Pioq', NULL, '2018-12-14 17:56:01', '2018-12-14 17:56:01'),
(10, 'vu van anh', 'anh123@gmail.com', '3721937812', '$2y$10$YTXTA8pFTZnfxCtCfbMRK.scPDb3exaxmYg6IU4EXxtERqLIEQvQy', 'ZSB864K6fbh4VXZuPJKi7lE8W9ezxAbkO5ZxvO8L2dMO4feeoXYHd6IST1WW', '2018-12-15 23:52:50', '2018-12-15 23:52:50'),
(11, 'vu van bao', 'bao123@gmail.com', '321839210', '$2y$10$f6HUo96/XDAONqH5qoXzberPnlw780KHqEO4bh1/9/5EwS83eqv/6', 'DScNgoVgfRL1lcA2ZtLHt5tuep7sUJ1fUvLugy3j2PYjAVPL99XjfTlIJUdG', '2018-12-15 23:54:42', '2018-12-15 23:54:42'),
(12, 'Vu Van Chien', 'chien@gmail.com', '232190321', '$2y$10$hckHs6h.p0IGkvQqW.KTk.1225BlsRYl8wfEQlWUs1i5Wr/1Bs.0u', NULL, '2018-12-16 00:42:25', '2018-12-16 00:42:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rides_fk0` (`pick_up`),
  ADD KEY `rides_fk1` (`drop_off`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `rides`
--
ALTER TABLE `rides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_fk0` FOREIGN KEY (`pick_up`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `rides_fk1` FOREIGN KEY (`drop_off`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
