-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2024 lúc 04:17 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_4scinema`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_cs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `email`, `phone`, `username`, `password_cs`) VALUES
(4, 'Nguyễn Đức Hà', 'haxyz04@gmail.com', '0373187183', 'anhha', '$2y$10$qICq0U.Ibx0UmtmJfCm09.UPFbCd7r1nerXKCdDgcKe9KzzQaS3he'),
(5, 'Nguyễn Đức Hà', 'abc123@gmail.com', '0373187182', '22111061137', '$2y$10$yCp3CVF7fjW8gOC6ENNIcOkZyx.kz/9nKqnt11FUavVF8ZUZUTz0y'),
(6, 'Nguyễn', 'hadeptrai@gmail.com', '123', 'ha', '$2y$10$RcMWkw6IPii.yJJGM2CSJOmV5ZDWi8kA39sPJL4q7569RGhasiQnO'),
(8, 'Nam Anh', 'haxyz4@gmail.com', '12345', 'namanh', '$2y$10$itaR/Hz4fYmyWIM3lpYTc.w2jdKEwDEnHBXW3zYWeecFDvUIrh1Vi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address_nv` varchar(255) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `email`, `phone`, `address_nv`, `position`, `hire_date`, `salary`) VALUES
(1, 'Nguyễn Văn An', 'nguyenvana@gmail.com', '0901234567', 'Hà Nội', 'Nhân viên', '2020-05-15', 10000000.00),
(4, 'Nguyễn Đức Hà', 'haxyz04@gmail.com', '0373187183', 'Bắc Ninh', 'Quản lý', '2024-10-11', 10000000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `age_rating` varchar(10) NOT NULL,
  `release_date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `subtitle` varchar(50) DEFAULT NULL,
  `status_mv` varchar(50) NOT NULL,
  `description_mv` text DEFAULT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `vietsub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `genre`, `age_rating`, `release_date`, `country`, `subtitle`, `status_mv`, `description_mv`, `trailer_url`, `image_url`, `duration`, `vietsub`) VALUES
(15, 'Avatar  2', 'Hành động, Khoa học viễn tưởng, Phiêu lưu', '18', '2024-10-11', 'EN', 'aaaaaaaaaaaaa', 'Đang chiếu', 'bbbbbbbbbbbb', 'Avatar 3_ Fire And Ash  Trailer .mp4', 'GodvsKong_poster.jpg', 120, 'EN'),
(16, 'Avenger End Game', 'Khoa học viễn tưởng', '18', '2024-10-01', 'EN', 'a', 'Đang chiếu', 'a', 'Transformers_ Rise of the Beasts .mp4', 'Avengers_EndGame_poster.jpg', 120, 'EN'),
(17, 'Annabel', 'Kinh dị', '18', '2024-10-11', 'EN', 'aaaaaaaaaaaaaa', 'Đang chiếu', 'kinh dị', 'Annabelle.mp4', 'Annabelle_poster.jpg', 120, 'EN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `discount_image` varchar(255) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `promotion_name`, `details`, `notes`, `discount_image`, `start_time`, `end_time`) VALUES
(5, 'C\'STUDENT - 45K CHO HỌC SINH SINH VIÊN ', 'Đồng giá 45K/2D cho HSSV/GV/U22 cả tuần tại mọi cụm rạp Cinestar', 'HSSV xuất trình thẻ HSSV hoặc CCCD từ dưới 22 tuổi.\r\nGiảng viên/ giáo viên xuất trình thẻ giảng viên.', 'promotion5.png', '2024-10-10', '2024-10-31'),
(6, 'C\'TEN - HAPPY HOUR - 45K/ 2D MỐC 10H', 'Áp dụng giá 45K/ 2D và 55K/ 3D cho khách hàng xem phim trước 10h sáng và sau 10h tối.', 'Khách hàng là thành C\'FRIEND hoặc C\'VIP của Cinestar.\r\nÁp dụng tại App/Web Cinestar hoặc mua trực tiếp tại rạp.', 'promotion6.png', '2024-10-25', '2024-11-05'),
(8, 'C\'MONDAY - HAPPY DAY - ĐỒNG GIÁ 45K/ 2D', 'Đồng giá 45K/2D, 55K/3D vào thứ 2 hàng tuần', 'Áp dụng cho các suất chiếu vào ngày thứ 2 hàng tuần.\r\nMua vé trực tiếp tại App/Web Cinestar hoặc mua trực tiếp tại rạp.', 'promotion4.webp', '2024-10-08', '2024-10-24'),
(9, 'HAPPY MEMBER\'S DAY - GIÁ CHỈ 45K/ 2DDDD', 'Áp dụng giá 45K/ 2D và 55K/ 3D cho khách hàng là thành viên Cinestar vào ngày thứ 4 hàng tuần.', 'Khách hàng là thành C\'FRIEND hoặc C\'VIP của Cinestar.\r\nÁp dụng tại App/Web Cinestar hoặc mua trực tiếp tại rạp.', 'promotion8.png', '2024-10-11', '2024-10-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue`
--

CREATE TABLE `revenue` (
  `id` int(11) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `transaction_count` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `revenue`
--

INSERT INTO `revenue` (`id`, `total_amount`, `transaction_count`, `report_date`) VALUES
(1, 15000000.99, 300, '2024-10-01'),
(2, 20000000.50, 450, '2024-10-02'),
(3, 17500000.75, 350, '2024-10-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `screenings`
--

CREATE TABLE `screenings` (
  `screening_id` int(11) NOT NULL,
  `showtime_id` int(11) DEFAULT NULL,
  `screening_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `screenings`
--

INSERT INTO `screenings` (`screening_id`, `showtime_id`, `screening_time`) VALUES
(45, 42, '10:50:00'),
(46, 42, '09:52:00'),
(47, 42, '10:50:00'),
(48, 42, '09:52:00'),
(49, 44, '09:59:00'),
(50, 44, '09:00:00'),
(51, 44, '09:59:00'),
(52, 44, '09:00:00'),
(53, 44, '09:59:00'),
(54, 44, '09:00:00'),
(55, 44, '09:59:00'),
(56, 44, '09:00:00'),
(57, 42, '11:36:00'),
(58, 42, '10:37:00'),
(59, 42, '10:37:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showtimes`
--

CREATE TABLE `showtimes` (
  `showtime_id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `show_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `showtimes`
--

INSERT INTO `showtimes` (`showtime_id`, `movie_id`, `show_date`) VALUES
(42, 15, '2024-10-16'),
(44, 16, '2024-09-30'),
(48, 15, '2024-10-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_orders`
--

CREATE TABLE `ticket_orders` (
  `id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket_orders`
--

INSERT INTO `ticket_orders` (`id`, `movie_name`, `customer_name`, `price`, `order_date`, `quantity`) VALUES
(1, 'Avengers: Endgame', 'Nguyễn Văn A', 150000.00, '2024-10-01 00:00:00', 2),
(2, 'Titanic', 'Trần Thị B', 120000.00, '2024-10-02 00:00:00', 1),
(3, 'Fast & Furious 9', 'Lê Văn C', 200000.00, '2024-10-03 00:00:00', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `screenings`
--
ALTER TABLE `screenings`
  ADD PRIMARY KEY (`screening_id`),
  ADD KEY `fk_showtime` (`showtime_id`);

--
-- Chỉ mục cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showtime_id`),
  ADD KEY `movie_id` (`movie_id`) USING BTREE;

--
-- Chỉ mục cho bảng `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `screenings`
--
ALTER TABLE `screenings`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `ticket_orders`
--
ALTER TABLE `ticket_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `screenings`
--
ALTER TABLE `screenings`
  ADD CONSTRAINT `fk_showtime` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`showtime_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `screenings_ibfk_1` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`showtime_id`);

--
-- Các ràng buộc cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
