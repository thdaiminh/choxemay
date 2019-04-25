-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2019 lúc 12:35 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `choxemay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `level`, `created_at`, `update_at`, `phone`) VALUES
(1, 'Tô Hồng Đại Minh', '122 Phổ Quang', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, NULL, '2019-01-05 08:49:58', '0916088591');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `create_time`, `update_time`) VALUES
(1, 'Yamaha', 'yamaha', '2018-12-10 12:55:41', '2018-12-11 08:14:38'),
(2, 'Honda', 'honda', '2018-12-11 22:30:24', '2018-12-11 22:30:46'),
(3, 'Suzuki', 'suzuki', '2018-12-11 06:39:43', '2018-12-11 08:14:46'),
(4, 'Piaggio', 'piaggio', '2018-12-11 06:39:56', '2018-12-11 08:14:49'),
(5, 'SYM', 'sym', '2018-12-11 06:40:07', '2018-12-11 08:14:53'),
(6, 'Kawasaki', 'kawasaki', '2018-12-11 06:40:16', '2018-12-11 08:14:56'),
(7, 'Ducati', 'ducati', '2018-12-11 06:40:31', '2018-12-11 08:14:59'),
(8, 'Hãng khác', 'hang-khac', '2018-12-11 06:40:39', '2018-12-11 08:15:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `hotitem` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `posted_by` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `img`, `category_id`, `content`, `hotitem`, `created_at`, `update_at`, `posted_by`) VALUES
(1, 'Suzuki Axelo', 'suzuki-axelo', 30000000, 'products-12.png', 3, ' Axelo cũ chạy 2000 km', 0, NULL, '2019-01-05 07:12:44', 1),
(2, 'Sh 2015', 'sh-2015', 50000000, 'products-01.png', 2, ' Sh cũ nguyên zin.', 0, NULL, '2019-01-05 07:13:09', 1),
(3, 'Exciter 2007', 'exciter-2007', 35000000, 'products-02.png', 1, ' Exciter chạy 3k cây. Liên hệ sđt                ', 1, NULL, '2019-01-05 07:12:22', 1),
(4, 'Wave RSX cũ', 'wave-rsx-cu', 25000000, 'products-03.png', 2, ' Bán gấp.', 0, NULL, '2019-01-05 07:13:09', 1),
(5, 'Sirius 110 Fi', 'sirius-110-fi', 15000000, 'products-04.png', 1, ' Chạy 2 năm.                ', 0, NULL, '2019-01-05 07:13:09', 1),
(6, 'Jupiter Fi', 'jupiter-fi', 26000000, 'products-05.png', 1, ' Jupiter 2015', 0, NULL, '2019-01-05 07:13:09', 1),
(7, 'Wave Alpha', 'wave-alpha', 14000000, 'products-06.png', 2, 'Mới 99% nguyên zin', 0, NULL, '2019-01-05 07:13:09', 1),
(8, 'Atila Elizabeth', 'atila-elizabeth', 23000000, 'products-07.png', 5, ' Elizabeth đỏ còn mới.', 1, NULL, '2019-01-05 07:12:27', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `created_at`, `update_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0916088591', '122 Pho Quang', '202cb962ac59075b964b07152d234b70', NULL, '2019-01-05 08:12:30'),
(4, 'Tô Hồng Đại Minh', 'thdaiminh@gmail.com', '0916088591', '122 Pho Quang', '202cb962ac59075b964b07152d234b70', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
