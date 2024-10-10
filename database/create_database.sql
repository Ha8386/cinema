
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `email`, `phone`, `username`, `password`) VALUES
(4, 'Nguyễn Đức Hà', 'haxyz04@gmail.com', '0373187183', 'anhha', '$2y$10$qICq0U.Ibx0UmtmJfCm09.UPFbCd7r1nerXKCdDgcKe9KzzQaS3he'),
(5, 'Nguyễn Đức Hà', 'abc123@gmail.com', '0373187182', '22111061137', '$2y$10$yCp3CVF7fjW8gOC6ENNIcOkZyx.kz/9nKqnt11FUavVF8ZUZUTz0y'),
(6, 'Nguyễn', 'hadeptrai@gmail.com', '123', 'ha', '$2y$10$RcMWkw6IPii.yJJGM2CSJOmV5ZDWi8kA39sPJL4q7569RGhasiQnO'),
(8, 'Nam Anh', 'haxyz4@gmail.com', '12345', 'namanh', '$2y$10$itaR/Hz4fYmyWIM3lpYTc.w2jdKEwDEnHBXW3zYWeecFDvUIrh1Vi'),
(10, 'Nam', 'abc@gmail.com', '12345', 'nam', '$2y$10$xPGKYogrBachOvnygRldYeSNGQDIzLnPBsRkZuxUM/2C.AUNpjr8e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `email`, `phone`, `date_of_birth`, `address`, `position`, `hire_date`, `salary`) VALUES
(1, 'Nguyễn Văn An', 'nguyenvana@gmail.com', '0901234567', '1990-01-01', 'Hà Nội', 'Nhân viên', '2020-05-15', 10000000.00),
(2, 'Trần Thị Tuyền', 'tranthib@gmail.com', '0912345678', '1985-03-20', 'TP.HCM', 'Quản lý', '2018-07-10', 15000000.00),
(3, 'Lê Văn Luyện', 'levanc@gmail.com', '0923456789', '1992-11-30', 'Đà Nẵng', 'Kỹ sư', '2021-01-20', 12000000.00);

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
(13, 'A', 'Hành động, Khoa học viễn tưởng', '18', '2024-10-15', 'VN', 'v', 'Đang chiếu', 'a', 'Avatar 3_ Fire And Ash  Trailer .mp4', 'AquietPlace_poster.jpg', 120, 'EN'),
(15, 'Avatar', 'Hành động, Khoa học viễn tưởng, Phiêu lưu', '18', '2024-10-11', 'EN', 'aaaaaaaaaaaaa', 'Sắp chiếu', 'bbbbbbbbbbbb', 'Avatar 3_ Fire And Ash  Trailer .mp4', 'Avatar_poster.jpg', 120, 'EN'),
(16, 'Avenger', 'Khoa học viễn tưởng', '18', '2024-10-01', 'EN', 'a', 'Đang chiếu', 'a', 'Transformers_ Rise of the Beasts .mp4', 'Avengers_EndGame_poster.jpg', 120, 'EN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `discount_image` varchar(255) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `promotion_name`, `details`, `notes`, `conditions`, `discount_image`, `start_time`, `end_time`) VALUES
(1, 'Giảm giá vé cuối tuần', 'Giảm 20% cho vé xem phim vào thứ 7 và Chủ nhật', 'Áp dụng cho tất cả các phim', 'Không áp dụng cho phim 3D', 'image1.jpg', '2024-10-01 00:00:00', '2024-10-31 00:00:00'),
(2, 'Thẻ thành viên', 'Giảm 30% cho vé cho thành viên mới đăng ký', 'Chỉ áp dụng cho lần đặt vé đầu tiên', 'Cần xuất trình thẻ thành viên', 'image2.jpg', '2024-10-05 00:00:00', '2025-01-05 00:00:00'),
(3, 'Khuyến mãi phim mới', 'Mua 2 vé, tặng 1 nước uống', 'Chỉ áp dụng cho phim mới ra mắt', 'Chỉ áp dụng tại rạp X', 'image3.jpg', '2024-10-10 00:00:00', '2024-11-10 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue_summary`
--

CREATE TABLE `revenue_summary` (
  `id` int(11) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `transaction_count` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `revenue_summary`
--

INSERT INTO `revenue_summary` (`id`, `total_amount`, `transaction_count`, `report_date`) VALUES
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
(38, 13, '2024-10-14'),
(42, 15, '2024-10-16'),
(44, 16, '2024-09-30');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Chỉ mục cho bảng `revenue_summary`
--
ALTER TABLE `revenue_summary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `screenings`
--
ALTER TABLE `screenings`
  ADD PRIMARY KEY (`screening_id`),
  ADD KEY `showtime_id` (`showtime_id`);

--
-- Chỉ mục cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showtime_id`),
  ADD UNIQUE KEY `movie_id` (`movie_id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `revenue_summary`
--
ALTER TABLE `revenue_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `screenings`
--
ALTER TABLE `screenings`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
