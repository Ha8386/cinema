-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 10:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
=======
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2024 lúc 04:59 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30
>>>>>>> f0845ff36ef3b4966dabdd769d06988c4b8ab814

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
(5, 'Nguyễn Đức Hà Vân', 'abc123@gmail.com', '0373187182', '22111061137', '$2y$10$SYSPi2jQXMUNnIPH07bjruigy3kKLiNW.wofztEdCi56.7Hgi0GJu'),
(8, 'Nam Anh', 'haxyz4@gmail.com', '12345', 'namanh', '$2y$10$itaR/Hz4fYmyWIM3lpYTc.w2jdKEwDEnHBXW3zYWeecFDvUIrh1Vi'),
(12, 'Linh', 'Linhxinh@gmail.com', '0373187182', 'linhlinh', '$2y$10$6Xk6iIC8Jbxyjp5RPbhljOrAkP6t5uNbtWwTsl8KrGvEHvSr.iihG');

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
(1, 'Nguyễn Văn Tiến', 'nguyenvana@gmail.com', '0901234567', 'Hà Nội', 'Nhân viên', '2024-10-09', 10000000.00),
(4, 'Nguyễn Đức Hà ', 'haxyz04@gmail.com', '0373187183', 'Bắc Ninh', 'Quản lý', '2024-10-10', 10000000.00);

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
(19, 'Transformers: Kỷ nguyên hủy diệt', 'Khoa học viễn tưởng, Hành động', '13', '2024-10-30', 'Mỹ', '65 triệu năm trước, một nhóm người ngoài hành tinh', 'Sắp chiếu', 'Transformers: Kỷ nguyên hủy diệt (tựa tiếng Anh: Transformers: Age of Extinction) là một bộ phim 3D hành động khoa học viễn tưởng Mỹ năm 2014 thuộc sản phẩm thương mại Transformers. Đây là phần thứ tư của loạt phim đình đám Transformers và là phần tiếp theo của phim Vùng tối của mặt trăng năm 2011, lấy bối cảnh diễn ra sau cuộc đại chiến ở Chicago. Cũng giống như các phần trước, phim do Michael Bay đạo diễn và Ehren Kruger viết kịch bản, với Steven Spielberg và Bay làm giám đốc sản xuất. Phim có sự tham gia của ngôi sao Mark Wahlberg và Peter Cullen với vai trò lồng tiếng cho nhân vật người máy Optimus Prime. Đây là phần đầu tiên trong loạt phim không đề cập đến các nhân vật người từ ba phần trước, thay vào đó là dàn nhân vật người mới cùng với 22 Transformer mới, bao gồm cả những Dinobot lần đầu xuất hiện trong loạt phim. Tuy nhiên phim vẫn có sự góp mặt của các Transformer cũ như Optimus Prime, Bumblebee, Ratchet, Leadfoot, Brains và Megatron (trong phần này lấy tên là Galvatron).', 'Transformer.mp4', 'Transformer_poster.jpg', 144, 'Vietsub'),
(20, 'Annabelle', 'Kinh dị, Giật gân, Siêu nhiên', '17', '2024-10-25', 'Mỹ', 'John Form tặng vợ mình, Mia, một con búp bê hiếm c', 'Sắp chiếu', 'Bộ phim xoay quanh một con búp bê bị nguyền rủa tên là Annabelle, xuất hiện lần đầu trong loạt phim \"The Conjuring\". Câu chuyện của Annabelle kể về những sự kiện kinh hoàng xoay quanh nó và tác động nguy hiểm mà nó mang đến cho những người sở hữu.', 'Annabelle.mp4', 'Annabelle_poster.jpg', 99, 'Vietsub'),
(21, 'Avatar: Dòng chảy của nước ', 'Hành động, Phiêu lưu, Khoa học viễn tưởng', '13', '2024-10-04', 'Mỹ', 'Jake Sully hiện sống với gia đình mới của mình trê', 'Đang chiếu', 'Phần tiếp theo của bộ phim \"Avatar\" đình đám, \"The Way of Water\" đưa khán giả trở lại hành tinh Pandora, nơi Jake Sully và Neytiri cùng các con của họ đối mặt với nhiều thử thách mới khi cuộc xung đột với con người vẫn tiếp diễn.', 'Avatar.mp4', 'Avatar_poster.jpg', 192, 'Vietsub'),
(22, 'A Quiet Place', 'Kinh dị, Giật gân, Khoa học viễn tưởng', '13', '2024-10-31', 'Mỹ', 'Câu chuyện theo chân gia đình Abbott, bao gồm Lee,', 'Sắp chiếu', '\"A Quiet Place\" là một bộ phim kinh dị với ý tưởng độc đáo, lấy bối cảnh trong một tương lai hậu tận thế, nơi con người bị săn đuổi bởi những sinh vật nhạy cảm với âm thanh. Gia đình Abbott phải sống trong im lặng để bảo vệ mạng sống của mình.', 'AQuietPlace.mp4', 'AquietPlace_poster.jpg', 90, 'Vietsub'),
(23, 'Despicable Me', 'Hoạt hình, Hài hước, Phiêu lưu', '7', '2024-10-31', 'Mỹ', 'Gru là một nhân vật phản diện khét tiếng, luôn thự', 'Sắp chiếu', '\"Despicable Me\" là một bộ phim hoạt hình nổi tiếng của Illumination Entertainment, kể về Gru, một siêu tội phạm có kế hoạch thực hiện vụ trộm lớn nhất thế giới: đánh cắp mặt trăng. Tuy nhiên, mọi thứ thay đổi khi anh phải chăm sóc ba cô bé mồ côi đáng yêu.', 'DespicableMe.mp4', 'DespicableMe_poster.jpg', 95, 'Vietsub'),
(24, 'Quá nhanh quá nguy hiểm 8', 'Hành động, Phiêu lưu, Tội phạm', '13', '2024-10-12', 'Mỹ', 'Sau khi kết hôn với Letty và tận hưởng cuộc sống y', 'Đang chiếu', '\"The Fate of the Furious\" là phần thứ tám của loạt phim \"Fast & Furious\", tiếp tục mang đến những cảnh hành động tốc độ và những cuộc đối đầu căng thẳng, nhưng với một yếu tố bất ngờ khi Dominic Toretto phản bội gia đình của mình.', 'FF8.mp4', 'FF8_poster.jpg', 136, 'Vietsub'),
(25, 'Hereditaty', 'Kinh dị, Tâm lý, Siêu nhiên', '17', '2024-10-08', 'Mỹ', 'Khi người mẹ của Annie Graham qua đời, gia đình cô', 'Đang chiếu', '\"Hereditary\" là một bộ phim kinh dị tâm lý đáng sợ và đậm tính u ám, được nhiều nhà phê bình đánh giá cao nhờ bầu không khí căng thẳng và những màn trình diễn xuất sắc của dàn diễn viên. Bộ phim khám phá sự đổ vỡ của một gia đình bị ám ảnh bởi các thế lực siêu nhiên sau cái chết của người bà.', 'Hereditary.mp4', 'Hereditary_poster.jpg', 127, 'Vietsub'),
(26, 'Kẻ đánh cắp giấc mơ', 'Hành động, Khoa học viễn tưởng, Phiêu lưu, Tâm lý', '13', '2024-10-26', 'Mỹ, Anh', 'Dom Cobb (Leonardo DiCaprio) là một \"kẻ trộm giấc ', 'Sắp chiếu', '\"Inception\" là một tác phẩm khoa học viễn tưởng của đạo diễn Christopher Nolan, được biết đến với cốt truyện phức tạp và sáng tạo. Phim xoay quanh việc xâm nhập vào giấc mơ của con người để trộm cắp thông tin hoặc cài đặt ý tưởng vào tâm trí họ.', 'Inception.mp4', 'Inception_poster.jpg', 148, 'Vietsub'),
(37, 'Godzilla vs Kong', 'Hành động, Khoa học viễn tưởng, Phiêu lưu, Quái vật', '13', '2024-11-06', 'Mỹ', 'Trong một thế giới nơi con người chung sống với nh', 'Sắp chiếu', '\"Godzilla vs. Kong\" là phần mới nhất trong vũ trụ điện ảnh quái vật của Legendary, đối đầu giữa hai huyền thoại Godzilla và King Kong. Bộ phim mang đến những cảnh chiến đấu hoành tráng giữa hai sinh vật khổng lồ với quy mô tàn phá lớn.', 'GodvsKong.mp4', 'GodvsKong_poster.jpg', 113, 'Vietsub'),
(39, 'Bố Già', 'Tâm lý, Gia đình, Hài hước', '13', '2024-10-12', 'Việt Nam', 'Câu chuyện xoay quanh ông Ba Sang (do Trấn Thành t', 'Đang chiếu', '\"Bố Già\" là bộ phim tâm lý - gia đình gây sốt tại Việt Nam, do Trấn Thành đồng đạo diễn và đóng vai chính. Bộ phim tập trung vào mối quan hệ gia đình, những xung đột thế hệ và cuộc sống của một gia đình lao động nghèo ở Sài Gòn.', 'BoGia.mp4', 'BoGia_poster.jpg', 128, 'VN'),
(42, 'Hố đen tử thần', 'Khoa học viễn tưởng, Tâm lý, Phiêu lưu', '13', '2024-10-01', 'Mỹ, Anh', 'Interstellar khám phá các chủ đề về tình yêu, sự h', 'Đang chiếu', ' Câu chuyện diễn ra trong một tương lai tăm tối, khi Trái Đất đang đối mặt với sự tuyệt chủng do thiên tai và biến đổi khí hậu. Sự sống còn của nhân loại phụ thuộc vào việc tìm kiếm một hành tinh có thể ở được. Một nhóm phi hành gia, do cựu phi công NASA Joseph Cooper (do Matthew McConaughey thủ vai) dẫn đầu, đã vượt qua một lỗ sâu gần Sao Thổ để khám phá những hành tinh tiềm năng cho sự định cư của con người. Họ gặp nhiều thách thức, bao gồm sự giãn nở thời gian, khiến nhiệm vụ của họ trở nên phức tạp khi thời gian trôi qua nhanh chóng trên Trái Đất trong khi chỉ có vài giờ trôi qua trong không gian. Cốt truyện còn xoay quanh mối quan hệ giữa Cooper và con gái của anh, Murph, cùng với những hy sinh cá nhân để đảm bảo sự sống còn của nhân loại​.', 'Interstella.mp4', 'Interstella_poster.jpg', 169, 'Vietsub'),
(43, 'Quỷ Quyệt: Chương 3', 'Kinh dị, Siêu nhiên, Bí ẩn', '13', '2024-10-14', 'Mỹ', 'Câu chuyện diễn ra khi Quinn Brenner, một thiếu nữ', 'Đang chiếu', 'Quỷ Quyệt: Chương 3 là phần tiền truyện của hai phần trước trong loạt phim Insidious. Phim xoay quanh Elise Rainier, một nhà ngoại cảm có khả năng giao tiếp với thế giới linh hồn. Bà giúp đỡ một cô gái trẻ bị quấy rối bởi một linh hồn tà ác sau khi cô cố gắng liên lạc với mẹ quá cố.', 'Incidious.mp4', 'Incidious_poster.jpg', 97, 'Vietsub'),
(44, 'Logan', 'Hành động, Phiêu lưu, Khoa học viễn tưởng, Siêu anh hùng', '18', '2024-10-31', 'Mỹ', 'Vào tương lai gần, Logan đang sống ẩn dật ở biên g', 'Đang chiếu', 'Logan là phần cuối trong bộ ba phim về nhân vật Wolverine, lấy cảm hứng từ truyện tranh Old Man Logan của Marvel. Phim kể về Logan (Hugh Jackman), một người đột biến già yếu và bị ám ảnh bởi quá khứ, cùng với Charles Xavier phải bảo vệ một cô bé đột biến tên Laura khỏi các thế lực nguy hiểm.', 'Logan.mp4', 'Logan_poster.jpg', 137, 'Vietsub'),
(45, 'Moana', 'Hoạt hình, Phiêu lưu, Hài, Gia đình', '6', '2024-10-13', 'Mỹ', 'Moana là con gái của trưởng làng Motunui. Cô có mộ', 'Đang chiếu', 'Moana là một bộ phim hoạt hình phiêu lưu của Disney, xoay quanh cuộc hành trình của một cô gái trẻ đến từ một hòn đảo ở Nam Thái Bình Dương. Câu chuyện kết hợp giữa truyền thuyết Polynesia và các giá trị gia đình, với thông điệp về lòng dũng cảm, sự khám phá bản thân và kết nối với nguồn cội.', 'Moana.mp4', 'Moana_poster.jpg', 107, 'Vietsub'),
(46, 'Tên cậu là gì', 'Lãng mạn, Kỳ ảo, Hoạt hình, Khoa học viễn tưởng', '13', '2024-12-25', 'Nhật Bản', 'Mitsuha, một cô gái sống ở vùng quê Nhật Bản, và T', 'Sắp chiếu', 'Your Name là một bộ phim hoạt hình Nhật Bản do đạo diễn Makoto Shinkai thực hiện, kết hợp yếu tố giả tưởng và lãng mạn với câu chuyện về mối liên kết kỳ diệu giữa hai người trẻ tuổi. Phim được ca ngợi bởi hình ảnh tuyệt đẹp, âm nhạc cuốn hút và cốt truyện cảm động.', 'YourName.mp4', 'YourName_poster.jpg', 106, 'Vietsub'),
(47, 'Đại chiến thái bình dương', 'Hành động, Khoa học viễn tưởng, Quái vật, Robot, Kaiju', '13', '2024-10-13', 'Mỹ', 'Câu chuyện xoay quanh cựu phi công Jaeger Raleigh ', 'Sắp chiếu', 'Pacific Rim là bộ phim khoa học viễn tưởng được đạo diễn bởi Guillermo del Toro. Phim lấy bối cảnh trong tương lai, khi Trái Đất phải đối mặt với cuộc xâm lược của những con quái vật khổng lồ gọi là Kaiju, xuất hiện từ một cổng không gian dưới đáy Thái Bình Dương. Để chống lại Kaiju, loài người tạo ra những robot khổng lồ gọi là Jaegers, điều khiển bởi hai phi công có liên kết thần kinh. Bộ phim nổi bật với hiệu ứng hình ảnh ấn tượng và cảnh chiến đấu hoành tráng giữa robot và quái vật.', 'PacificRim.mp4', 'PacificRim_poster.jpg', 131, 'Vietsub'),
(48, 'Nhà tù Shawshank', 'Chính kịch', '17', '2024-10-29', 'Mỹ', 'Trong quá trình chịu án ở nhà tù Shawshank, Andy k', 'Sắp chiếu', 'The Shawshank Redemption là một bộ phim kinh điển của điện ảnh Mỹ, dựa trên tiểu thuyết của Stephen King. Phim kể về Andy Dufresne, một người đàn ông bị kết án tù chung thân vì tội giết vợ và người tình của cô, mặc dù anh khẳng định mình vô tội.', 'SSRedemption.mp4', 'SSRedemption_poster.jpg', 142, 'Vietsub'),
(50, 'Hố sâu đói khát', 'Thể loại: Kinh dị, Khoa học viễn tưởng, Chính kịch', '17', '2024-10-13', 'Tây Ban Nha', 'Câu chuyện xoay quanh Goreng, một người đàn ông tự', 'Sắp chiếu', 'The Platform là một bộ phim khoa học viễn tưởng độc đáo, lấy bối cảnh trong một nhà tù hình trụ. Phim khám phá các chủ đề như sự phân chia giai cấp và bản chất của nhân loại thông qua cách mà các tù nhân tương tác với nhau và hệ thống phân phối thực phẩm.', 'thePlatform.mp4', 'thePlatform_poster.jpg', 94, 'Vietsub'),
(51, 'Venom', 'Hành động, Khoa học viễn tưởng, Kinh dị', '13 ', '2024-10-30', 'Mỹ', 'Eddie Brock (Tom Hardy) là một nhà báo quyết tâm p', 'Sắp chiếu', 'Venom là một bộ phim dựa trên nhân vật truyện tranh cùng tên của Marvel, được phát triển bởi Sony Pictures. Phim khai thác mối quan hệ giữa Eddie Brock, một nhà báo điều tra, và Venom, một sinh vật ngoài hành tinh.', 'Venom.mp4', 'Venom_poster.jpg', 112, 'Vietsub'),
(52, 'Thiếu niên và chim diệc', 'Hoạt hình, Huyền bí, Drama', '13', '2024-11-01', 'Nhật Bản', 'Câu chuyện bắt đầu khi Mahito phải đối diện với cá', 'Sắp chiếu', 'Phim do Hayao Miyazaki đạo diễn, mang đến một câu chuyện đậm chất thơ và triết lý. Bộ phim kể về một cậu bé tên Mahito, người đang phải đối mặt với sự mất mát và những khía cạnh tối tăm của cuộc sống.', 'TheBoyAndTheHeron.mp4', 'TheBoyAndTheHeron_poster.jpg', 124, 'Vietsub');

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
<<<<<<< HEAD
=======
(84, 97, '13:26:00'),
(85, 97, '15:26:00'),
(86, 97, '18:26:00'),
(87, 97, '12:32:00'),
>>>>>>> f0845ff36ef3b4966dabdd769d06988c4b8ab814
(88, 98, '13:28:00'),
(89, 98, '15:29:00'),
(90, 98, '00:29:00'),
(91, 98, '06:29:00'),
<<<<<<< HEAD
=======
(92, 99, '14:41:00'),
(93, 99, '17:46:00'),
(94, 99, '20:41:00'),
>>>>>>> f0845ff36ef3b4966dabdd769d06988c4b8ab814
(100, 105, '13:44:00'),
(101, 105, '17:43:00'),
(102, 106, '13:45:00'),
(103, 106, '16:43:00'),
(104, 107, '13:45:00'),
(105, 107, '15:45:00'),
(106, 108, '13:48:00'),
(107, 109, '17:45:00'),
(108, 110, '17:45:00'),
(109, 110, '01:45:00'),
(110, 111, '17:46:00'),
(111, 111, '03:46:00'),
(112, 112, '13:50:00'),
(113, 113, '13:48:00'),
(114, 122, '13:51:00');

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
<<<<<<< HEAD
(98, 21, '2024-10-23'),
=======
(97, 20, '2024-10-15'),
(98, 21, '2024-10-23'),
(99, 20, '2024-10-01'),
>>>>>>> f0845ff36ef3b4966dabdd769d06988c4b8ab814
(105, 22, '2024-10-11'),
(106, 23, '2024-10-24'),
(107, 24, '2024-11-01'),
(108, 25, '2024-10-23'),
(109, 26, '2024-10-16'),
(110, 37, '2024-10-25'),
(111, 39, '2024-10-17'),
(112, 42, '2024-10-16'),
(113, 43, '2024-10-16'),
(114, 44, '2024-10-09'),
(115, 45, '2024-11-09'),
(116, 46, '2024-10-16'),
(117, 47, '2024-11-06'),
(118, 48, '2024-10-10'),
(119, 50, '2024-11-02'),
(120, 51, '2024-10-23'),
(121, 52, '2024-10-24'),
(122, 23, '2024-10-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticketbookings`
--

CREATE TABLE `ticketbookings` (
  `ticket_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `showtime_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticketprices`
--

CREATE TABLE `ticketprices` (
  `ticket_type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ticketprices`
--

INSERT INTO `ticketprices` (`ticket_type`, `price`) VALUES
('HSSV', 45000),
('Đôi', 145000),
('Đơn', 70000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `ticketbookings`
--
ALTER TABLE `ticketbookings`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `ticket_type` (`ticket_type`),
  ADD KEY `fk1_showtime` (`showtime_id`),
  ADD KEY `fk1_screening` (`screening_id`);

--
-- Chỉ mục cho bảng `ticketprices`
--
ALTER TABLE `ticketprices`
  ADD PRIMARY KEY (`ticket_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `ticketbookings`
--
ALTER TABLE `ticketbookings`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

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
<<<<<<< HEAD
=======

--
-- Các ràng buộc cho bảng `ticketbookings`
--
ALTER TABLE `ticketbookings`
  ADD CONSTRAINT `fk1_screening` FOREIGN KEY (`screening_id`) REFERENCES `screenings` (`screening_id`),
  ADD CONSTRAINT `fk1_showtime` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`showtime_id`),
  ADD CONSTRAINT `ticketbookings_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `ticketbookings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `ticketbookings_ibfk_3` FOREIGN KEY (`ticket_type`) REFERENCES `ticketprices` (`ticket_type`);
>>>>>>> f0845ff36ef3b4966dabdd769d06988c4b8ab814
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
