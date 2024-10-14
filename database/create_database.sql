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


/*Thông tin phim */
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanly_4scinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `age_rating` varchar(10) NOT NULL,
  `release_date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `status_mv` varchar(50) NOT NULL,
  `description_mv` text DEFAULT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `vietsub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `genre`, `age_rating`, `release_date`, `country`, `subtitle`, `status_mv`, `description_mv`, `trailer_url`, `image_url`, `duration`, `vietsub`) VALUES
(31, 'Transformers: Kỷ nguyên hủy diệt', 'Khoa học viễn tưởng, Hành động', '13', '2024-10-30', 'Mỹ', '65 triệu năm trước, một nhóm người ngoài hành tinh', 'Sắp chiếu', 'Transformers: Kỷ nguyên hủy diệt (tựa tiếng Anh: Transformers: Age of Extinction) là một bộ phim 3D hành động khoa học viễn tưởng Mỹ năm 2014 thuộc sản phẩm thương mại Transformers. Đây là phần thứ tư của loạt phim đình đám Transformers và là phần tiếp theo của phim Vùng tối của mặt trăng năm 2011, lấy bối cảnh diễn ra sau cuộc đại chiến ở Chicago. Cũng giống như các phần trước, phim do Michael Bay đạo diễn và Ehren Kruger viết kịch bản, với Steven Spielberg và Bay làm giám đốc sản xuất. Phim có sự tham gia của ngôi sao Mark Wahlberg và Peter Cullen với vai trò lồng tiếng cho nhân vật người máy Optimus Prime. Đây là phần đầu tiên trong loạt phim không đề cập đến các nhân vật người từ ba phần trước, thay vào đó là dàn nhân vật người mới cùng với 22 Transformer mới, bao gồm cả những Dinobot lần đầu xuất hiện trong loạt phim. Tuy nhiên phim vẫn có sự góp mặt của các Transformer cũ như Optimus Prime, Bumblebee, Ratchet, Leadfoot, Brains và Megatron (trong phần này lấy tên là Galvatron).', 'Transformer.mp4', 'Transformer_poster.jpg', 144, 'Vietsub'),
(32, 'Annabelle', 'Kinh dị, Giật gân, Siêu nhiên', '17', '2024-10-25', 'Mỹ', 'John Form tặng vợ mình, Mia, một con búp bê hiếm c', 'Sắp chiếu', 'Bộ phim xoay quanh một con búp bê bị nguyền rủa tên là Annabelle, xuất hiện lần đầu trong loạt phim \"The Conjuring\". Câu chuyện của Annabelle kể về những sự kiện kinh hoàng xoay quanh nó và tác động nguy hiểm mà nó mang đến cho những người sở hữu.', 'Annabelle.mp4', 'Annabelle_poster.jpg', 99, 'Vietsub'),
(33, 'Avatar: Dòng chảy của nước ', 'Hành động, Phiêu lưu, Khoa học viễn tưởng', '13', '2024-10-04', 'Mỹ', 'Jake Sully hiện sống với gia đình mới của mình trê', 'Đang chiếu', 'Phần tiếp theo của bộ phim \"Avatar\" đình đám, \"The Way of Water\" đưa khán giả trở lại hành tinh Pandora, nơi Jake Sully và Neytiri cùng các con của họ đối mặt với nhiều thử thách mới khi cuộc xung đột với con người vẫn tiếp diễn.', 'Avatar.mp4', 'Avatar_poster.jpg', 192, 'Vietsub'),
(34, 'A Quiet Place', 'Kinh dị, Giật gân, Khoa học viễn tưởng', '13', '2024-10-31', 'Mỹ', 'Câu chuyện theo chân gia đình Abbott, bao gồm Lee,', 'Sắp chiếu', '\"A Quiet Place\" là một bộ phim kinh dị với ý tưởng độc đáo, lấy bối cảnh trong một tương lai hậu tận thế, nơi con người bị săn đuổi bởi những sinh vật nhạy cảm với âm thanh. Gia đình Abbott phải sống trong im lặng để bảo vệ mạng sống của mình.', 'AQuietPlace.mp4', 'AquietPlace_poster.jpg', 90, 'Vietsub'),
(35, 'Despicable Me', 'Hoạt hình, Hài hước, Phiêu lưu', '7', '2024-10-12', 'Mỹ', 'Gru là một nhân vật phản diện khét tiếng, luôn thự', 'Sắp chiếu', '\"Despicable Me\" là một bộ phim hoạt hình nổi tiếng của Illumination Entertainment, kể về Gru, một siêu tội phạm có kế hoạch thực hiện vụ trộm lớn nhất thế giới: đánh cắp mặt trăng. Tuy nhiên, mọi thứ thay đổi khi anh phải chăm sóc ba cô bé mồ côi đáng yêu.', 'DespicableMe.mp4', 'DespicableMe_poster.jpg', 95, 'Vietsub'),
(36, 'Quá nhanh quá nguy hiểm 8', 'Hành động, Phiêu lưu, Tội phạm', '13', '2024-10-12', 'Mỹ', 'Sau khi kết hôn với Letty và tận hưởng cuộc sống y', 'Đang chiếu', '\"The Fate of the Furious\" là phần thứ tám của loạt phim \"Fast & Furious\", tiếp tục mang đến những cảnh hành động tốc độ và những cuộc đối đầu căng thẳng, nhưng với một yếu tố bất ngờ khi Dominic Toretto phản bội gia đình của mình.', 'FF8.mp4', 'FF8_poster.jpg', 136, 'Vietsub'),
(37, 'Godzilla vs Kong', 'Hành động, Khoa học viễn tưởng, Phiêu lưu, Quái vật', '13', '2024-11-06', 'Mỹ', 'Trong một thế giới nơi con người chung sống với những sinh vật khổng lồ, Godzilla bất ngờ tấn công, gây ra sự hỗn loạn trên toàn cầu. Để đối phó với Godzilla, con người quyết định đưa King Kong từ Đảo Đầu Lâu để đọ sức với quái vật. Trong khi hai quái vật đối đầu, một âm mưu đen tối từ tổ chức Apex Cybernetics đang dần được phơi bày, đe dọa cả sự tồn tại của nhân loại và các sinh vật khổng lồ. Cuộc chiến giữa Godzilla và Kong không chỉ để tranh giành vị trí quái vật mạnh nhất mà còn để ngăn chặn mối nguy lớn hơn đang đến gần.', 'Sắp chiếu', '\"Godzilla vs. Kong\" là phần mới nhất trong vũ trụ điện ảnh quái vật của Legendary, đối đầu giữa hai huyền thoại Godzilla và King Kong. Bộ phim mang đến những cảnh chiến đấu hoành tráng giữa hai sinh vật khổng lồ với quy mô tàn phá lớn.', 'GodvsKong.mp4', 'GodvsKong_poster.jpg', 113, 'Vietsub'),
(38, 'Hereditaty', 'Kinh dị, Tâm lý, Siêu nhiên', '17', '0000-00-00', 'Mỹ', 'Khi người mẹ của Annie Graham qua đời, gia đình cô bắt đầu phát hiện ra những bí mật đáng sợ về dòng dõi của mình. Những hiện tượng kỳ lạ và đáng sợ bắt đầu xuất hiện, dường như được kết nối với một thế lực ma quái tồn tại trong gia đình. Trong khi Annie cố gắng tìm cách hiểu được những sự kiện kinh hoàng đang xảy ra, cô dần khám phá ra rằng số phận của cả gia đình có thể đã bị nguyền rủa từ lâu bởi những điều kinh khủng mà bà cô đã để lại. Bộ phim đưa khán giả vào một chuyến hành trình đầy đau khổ và hoang mang về sự sụp đổ tâm lý và siêu nhiên trong một gia đình.', 'Đang chiếu', '\"Hereditary\" là một bộ phim kinh dị tâm lý đáng sợ và đậm tính u ám, được nhiều nhà phê bình đánh giá cao nhờ bầu không khí căng thẳng và những màn trình diễn xuất sắc của dàn diễn viên. Bộ phim khám phá sự đổ vỡ của một gia đình bị ám ảnh bởi các thế lực siêu nhiên sau cái chết của người bà.', 'Hereditary.mp4', 'Hereditary_poster.jpg', 127, 'Vietsub'),
(39, 'Bố Già', 'Tâm lý, Gia đình, Hài hước', '13', '2024-10-12', 'Việt Nam', 'Câu chuyện xoay quanh ông Ba Sang (do Trấn Thành thủ vai), một người cha giàu tình cảm, luôn hết lòng vì con cái và gia đình. Ông cố gắng làm tất cả để mang đến cuộc sống tốt đẹp hơn cho các con, đặc biệt là con trai Quắn - một người trẻ đầy năng lượng nhưng có nhiều khác biệt trong suy nghĩ với cha mình. Những mâu thuẫn giữa Ba Sang và Quắn càng lớn khi họ đối mặt với các khó khăn về tài chính, sự bất đồng về quan điểm sống và cách yêu thương. Bộ phim là bức tranh chân thật về tình cảm gia đình, sự hy sinh và những bài học về tình thân.', 'Đang chiếu', '\"Bố Già\" là bộ phim tâm lý - gia đình gây sốt tại Việt Nam, do Trấn Thành đồng đạo diễn và đóng vai chính. Bộ phim tập trung vào mối quan hệ gia đình, những xung đột thế hệ và cuộc sống của một gia đình lao động nghèo ở Sài Gòn.', 'BoGia.mp4', 'BoGia_poster.jpg', 128, 'VN'),
(41, 'Kẻ đánh cắp giấc mơ', 'Hành động, Khoa học viễn tưởng, Phiêu lưu, Tâm lý', '13', '2024-10-26', 'Mỹ, Anh', 'Dom Cobb (Leonardo DiCaprio) là một \"kẻ trộm giấc mơ\" chuyên nghiệp, người có khả năng xâm nhập vào tiềm thức của người khác để đánh cắp thông tin từ giấc mơ của họ. Anh bị truy nã trên toàn cầu và phải xa cách gia đình. Một cơ hội để chuộc lỗi xuất hiện khi Cobb được giao nhiệm vụ ngược lại: cấy ghép một ý tưởng vào tâm trí của một doanh nhân trẻ tên là Robert Fischer. Nhiệm vụ này, gọi là \"Inception\", được coi là gần như bất khả thi. Tuy nhiên, nếu thành công, Cobb có thể trở lại cuộc sống bình thường với gia đình mình. Trong quá trình thực hiện nhiệm vụ, anh cùng nhóm của mình phải đối mặt với nhiều tầng giấc mơ và thử thách không lường trước được, đặc biệt là từ những ký ức đau thương của chính Cobb.', 'Sắp chiếu', '\"Inception\" là một tác phẩm khoa học viễn tưởng của đạo diễn Christopher Nolan, được biết đến với cốt truyện phức tạp và sáng tạo. Phim xoay quanh việc xâm nhập vào giấc mơ của con người để trộm cắp thông tin hoặc cài đặt ý tưởng vào tâm trí họ.', 'Inception.mp4', 'Inception_poster.jpg', 148, 'Vietsub'),
(42, 'Hố đen tử thần', 'Khoa học viễn tưởng, Tâm lý, Phiêu lưu', '13', '0000-00-00', 'Mỹ, Anh', 'Interstellar khám phá các chủ đề về tình yêu, sự hy sinh và những giới hạn trong hiểu biết của con người. Câu chuyện kết hợp một cách tinh tế giữa những khái niệm khoa học tiên tiến như lỗ đen và du hành thời gian với những câu chuyện cảm động, tạo nên một trải nghiệm vừa mãn nhãn vừa sâu sắc về tư tưởng​.\r\n', 'Đang chiếu', ' Câu chuyện diễn ra trong một tương lai tăm tối, khi Trái Đất đang đối mặt với sự tuyệt chủng do thiên tai và biến đổi khí hậu. Sự sống còn của nhân loại phụ thuộc vào việc tìm kiếm một hành tinh có thể ở được. Một nhóm phi hành gia, do cựu phi công NASA Joseph Cooper (do Matthew McConaughey thủ vai) dẫn đầu, đã vượt qua một lỗ sâu gần Sao Thổ để khám phá những hành tinh tiềm năng cho sự định cư của con người. Họ gặp nhiều thách thức, bao gồm sự giãn nở thời gian, khiến nhiệm vụ của họ trở nên phức tạp khi thời gian trôi qua nhanh chóng trên Trái Đất trong khi chỉ có vài giờ trôi qua trong không gian. Cốt truyện còn xoay quanh mối quan hệ giữa Cooper và con gái của anh, Murph, cùng với những hy sinh cá nhân để đảm bảo sự sống còn của nhân loại​.', 'Interstella.mp4', 'Interstella_poster.jpg', 169, 'Vietsub'),
(43, 'Quỷ Quyệt: Chương 3', 'Kinh dị, Siêu nhiên, Bí ẩn', '13 ', '0000-00-00', 'Mỹ', ' Câu chuyện diễn ra khi Quinn Brenner, một thiếu nữ trẻ, liên lạc với Elise để tìm cách kết nối với linh hồn mẹ đã mất. Trong quá trình đó, Quinn không may thu hút sự chú ý của một linh hồn độc ác, The Man Who Cant Breathe, một thực thể siêu nhiên đáng sợ chuyên theo dõi và tấn công cô. Elise ban đầu từ chối giúp đỡ do lo sợ về quá khứ của mình, nhưng sau đó bà quyết định tham gia vào cuộc chiến chống lại linh hồn quỷ quyệt này để cứu Quinn.', 'Đang chiếu', 'Quỷ Quyệt: Chương 3 là phần tiền truyện của hai phần trước trong loạt phim Insidious. Phim xoay quanh Elise Rainier, một nhà ngoại cảm có khả năng giao tiếp với thế giới linh hồn. Bà giúp đỡ một cô gái trẻ bị quấy rối bởi một linh hồn tà ác sau khi cô cố gắng liên lạc với mẹ quá cố.', 'Incidious.mp4', 'Incidious_poster.jpg', 97, 'Vietsub'),
(44, 'Logan', 'Hành động, Phiêu lưu, Khoa học viễn tưởng, Siêu anh hùng', '18', '2024-10-31', 'Mỹ', 'Vào tương lai gần, Logan đang sống ẩn dật ở biên giới Mexico để chăm sóc Charles Xavier đang bị bệnh. Cuộc sống của anh bị đảo lộn khi một cô bé đột biến xuất hiện, là Laura, bị truy đuổi bởi một tập đoàn ác độc. Logan phải đối mặt với quá khứ và tìm cách bảo vệ Laura, trong khi khám phá ra rằng cô bé là một phiên bản 'nhân bản' của chính anh.', 'Chọn trạng thái', 'Logan là phần cuối trong bộ ba phim về nhân vật Wolverine, lấy cảm hứng từ truyện tranh Old Man Logan của Marvel. Phim kể về Logan (Hugh Jackman), một người đột biến già yếu và bị ám ảnh bởi quá khứ, cùng với Charles Xavier phải bảo vệ một cô bé đột biến tên Laura khỏi các thế lực nguy hiểm.', 'Logan.mp4', 'Logan_poster.jpg', 137, 'Vietsub'),
(45, 'Moana', 'Hoạt hình, Phiêu lưu, Hài, Gia đình', '6', '2024-10-13', 'Mỹ', 'Moana là con gái của trưởng làng Motunui. Cô có một khao khát mạnh mẽ để ra khơi và khám phá đại dương, dù điều này trái ngược với mong muốn của cha cô. Khi hòn đảo của cô đối mặt với nguy cơ, Moana lên đường tìm kiếm á thần Maui để giúp cô trả lại trái tim của nữ thần Te Fiti và khôi phục sự cân bằng cho thế giới. Trên hành trình này, Moana phải đối mặt với nhiều khó khăn, nhưng cuối cùng cô khám phá ra sức mạnh của bản thân và vai trò quan trọng trong việc cứu lấy quê hương.', 'Đang chiếu', 'Moana là một bộ phim hoạt hình phiêu lưu của Disney, xoay quanh cuộc hành trình của một cô gái trẻ đến từ một hòn đảo ở Nam Thái Bình Dương. Câu chuyện kết hợp giữa truyền thuyết Polynesia và các giá trị gia đình, với thông điệp về lòng dũng cảm, sự khám phá bản thân và kết nối với nguồn cội.', 'Moana.mp4', 'Moana_poster.jpg', 107, 'Vietsub'),
(46, 'Tên cậu là gì', 'Lãng mạn, Kỳ ảo, Hoạt hình, Khoa học viễn tưởng', '13 ', '2024-12-25', 'Nhật Bản', 'Mitsuha, một cô gái sống ở vùng quê Nhật Bản, và Taki, một chàng trai sống ở Tokyo, bất ngờ hoán đổi cơ thể với nhau mà không rõ lý do. Cả hai dần dần tìm hiểu về cuộc sống của người kia và xây dựng mối quan hệ sâu sắc mà không hề gặp mặt trực tiếp. Tuy nhiên, sự hoán đổi này không chỉ đơn thuần là một phép màu, mà còn liên quan đến một sự kiện bí ẩn sắp xảy ra. Cả hai phải hợp sức để giải quyết bí ẩn này và cứu lấy tương lai của mình.', 'Sắp chiếu', 'Your Name là một bộ phim hoạt hình Nhật Bản do đạo diễn Makoto Shinkai thực hiện, kết hợp yếu tố giả tưởng và lãng mạn với câu chuyện về mối liên kết kỳ diệu giữa hai người trẻ tuổi. Phim được ca ngợi bởi hình ảnh tuyệt đẹp, âm nhạc cuốn hút và cốt truyện cảm động.', 'YourName.mp4', 'YourName_poster.jpg', 106, 'Vietsub'),
(47, 'Đại chiến thái bình dương', 'Hành động, Khoa học viễn tưởng, Quái vật, Robot, Kaiju', '13 ', '2024-10-13', 'Mỹ', 'Câu chuyện xoay quanh cựu phi công Jaeger Raleigh Becket, người bị gọi trở lại chiến đấu cùng với phi công mới Mako Mori trong cuộc chiến cuối cùng nhằm bảo vệ nhân loại khỏi sự diệt vong trước Kaiju. Cả hai phải vượt qua những thách thức lớn, đối mặt với quái vật khổng lồ và nhiều khó khăn khác để hoàn thành sứ mệnh của mình.', 'Sắp chiếu', 'Pacific Rim là bộ phim khoa học viễn tưởng được đạo diễn bởi Guillermo del Toro. Phim lấy bối cảnh trong tương lai, khi Trái Đất phải đối mặt với cuộc xâm lược của những con quái vật khổng lồ gọi là Kaiju, xuất hiện từ một cổng không gian dưới đáy Thái Bình Dương. Để chống lại Kaiju, loài người tạo ra những robot khổng lồ gọi là Jaegers, điều khiển bởi hai phi công có liên kết thần kinh. Bộ phim nổi bật với hiệu ứng hình ảnh ấn tượng và cảnh chiến đấu hoành tráng giữa robot và quái vật.', 'PacificRim.mp4', 'PacificRim_poster.jpg', 131, 'Vietsub'),
(48, 'Nhà tù Shawshank', 'Chính kịch', '17', '2024-10-29', 'Mỹ', 'Trong quá trình chịu án ở nhà tù Shawshank, Andy kết bạn với một tù nhân lâu năm tên là Red. Bằng sự thông minh và kiên nhẫn, Andy không chỉ tìm cách sống sót trong môi trường khắc nghiệt của nhà tù mà còn giúp đỡ các quản giáo trong các vấn đề tài chính. Anh đã lập kế hoạch để trốn thoát, tìm kiếm tự do và cứu chuộc cuộc đời mình sau nhiều năm sống trong cảnh tù đày​.', 'Sắp chiếu', 'The Shawshank Redemption là một bộ phim kinh điển của điện ảnh Mỹ, dựa trên tiểu thuyết của Stephen King. Phim kể về Andy Dufresne, một người đàn ông bị kết án tù chung thân vì tội giết vợ và người tình của cô, mặc dù anh khẳng định mình vô tội.', 'SSRedemption.mp4', 'SSRedemption_poster.jpg', 142, 'Vietsub'),
(50, 'Hố sâu đói khát', 'Thể loại: Kinh dị, Khoa học viễn tưởng, Chính kịch', '17', '2024-10-13', 'Tây Ban Nha', 'Câu chuyện xoay quanh Goreng, một người đàn ông tự nguyện vào nhà tù để cai nghiện thuốc lá. Trong nhà tù, thực phẩm được đưa xuống từ tầng trên cùng qua một cái hố, nhưng chỉ đủ cho những người ở tầng trên. Những người ở tầng dưới buộc phải sống trong điều kiện khắc nghiệt và thường xuyên phải đối mặt với đói kém. Goreng cố gắng tìm cách sống sót và làm cho mọi người nhận ra rằng họ cần phải thay đổi cách mà họ cư xử với nhau để cải thiện tình hình. Phim là một phép ẩn dụ mạnh mẽ về sự bất công trong xã hội và cách mà con người có thể trở nên tàn nhẫn trong những điều kiện cực đoan .', 'Sắp chiếu', 'The Platform là một bộ phim khoa học viễn tưởng độc đáo, lấy bối cảnh trong một nhà tù hình trụ. Phim khám phá các chủ đề như sự phân chia giai cấp và bản chất của nhân loại thông qua cách mà các tù nhân tương tác với nhau và hệ thống phân phối thực phẩm.', 'thePlatform.mp4', 'thePlatform_poster.jpg', 94, 'Vietsub'),
(51, 'Venom', 'Hành động, Khoa học viễn tưởng, Kinh dị', '13 ', '0000-00-00', 'Mỹ', 'Eddie Brock (Tom Hardy) là một nhà báo quyết tâm phơi bày sự thật về một tập đoàn công nghệ. Sau khi phát hiện ra những thí nghiệm phi đạo đức của họ với sinh vật ngoài hành tinh, Eddie bị nhiễm một thực thể tên là Venom. Venom là một sinh vật ký sinh mạnh mẽ, mang lại cho Eddie sức mạnh siêu nhiên nhưng cũng khiến anh gặp nhiều rắc rối. Phim kể về cuộc chiến giữa Eddie và các thế lực đang cố gắng kiểm soát Venom, cũng như hành trình khám phá bản thân của anh trong khi phải đối mặt với những hậu quả của việc kết hợp với sinh vật này.', 'Sắp chiếu', 'Venom là một bộ phim dựa trên nhân vật truyện tranh cùng tên của Marvel, được phát triển bởi Sony Pictures. Phim khai thác mối quan hệ giữa Eddie Brock, một nhà báo điều tra, và Venom, một sinh vật ngoài hành tinh.', 'Venom.mp4', 'Venom_poster.jpg', 112, 'Vietsub'),
(52, 'Thiếu niên và chim diệc', 'Hoạt hình, Huyền bí, Drama', '13', '0000-00-00', 'Nhật Bản', 'Câu chuyện bắt đầu khi Mahito phải đối diện với cái chết của mẹ mình trong Thế chiến thứ hai. Sau đó, cậu rơi vào một thế giới huyền bí, nơi cậu gặp gỡ những sinh vật kỳ lạ và bắt đầu hành trình tìm kiếm sự thật về bản thân và cuộc sống. Phim không chỉ đơn thuần là một cuộc phiêu lưu, mà còn khám phá sâu sắc các chủ đề về cuộc sống, cái chết và sự chấp nhận.', 'Sắp chiếu', 'Phim do Hayao Miyazaki đạo diễn, mang đến một câu chuyện đậm chất thơ và triết lý. Bộ phim kể về một cậu bé tên Mahito, người đang phải đối mặt với sự mất mát và những khía cạnh tối tăm của cuộc sống.', 'TheBoyAndTheHeron.mp4', 'TheBoyAndTheHeron_poster.jpg', 124, 'Vietsub');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

