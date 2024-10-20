<?php   
    include '../../db_connection.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4SCinema Cầu Giấy</title>
    <link rel="icon" href="../../../assets/img/logo4S-onlyic.png" type="x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../../assets/css/base.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="showing_movies.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
</head>

<body>
    <div class="app">
        <header class="hd">
            <div class="grid">
                <div class="hd__main">       
                    <ul class="hd__left">
                        <li class="hd__logo">
                            <a href="../../index.php" class="hd__logo-link">
                                <img src="../../../assets/img/logo4S.png" alt="4S CINEMA" class="hd__logo-img">
                            </a>
                        </li>
                        <li class="hd__nav-item hd__nav-item--local ">
                            Rạp phim
                            <div class="hd__local">
                                <a href="4SCinema_CauGiay.php" class="hd__local-link">
                                    4SCinema Cầu Giấy
                                </a>
                                <a href="4SCinema_HaiBaTrung.php" class="hd__local-link">
                                    4SCinema Hai Bà Trưng
                                </a>
                                <a href="4SCinema_LongBien.php" class="hd__local-link">
                                    4SCinema Long Biên
                                </a>
                                <a href="4SCinema_MyDinh.php" class="hd__local-link">
                                    4SCinema Mỹ Đình
                                </a>
                                <a href="4SCinema_TayHo.php" class="hd__local-link">
                                    4SCinema Tây Hồ
                                </a>
                                <a href="4SCinema_ThanhXuan.php" class="hd__local-link">
                                    4SCinema Thanh Xuân
                                </a>                           
                            </div>
                        </li>
                        <li class="hd__nav-item">
                            <a href="../../../user/showtimes.php" class="hd__nav-link">Lịch chiếu</a>
                        </li>
                        <li class="hd__nav-item">
                            <a href="../../../user/promotion.php" class="hd__nav-link">Ưu đãi</a>
                        </li>
                    </ul>

                   
                    <ul class="hd__right">
                        <li class="hd__search">
                            <form action="../../search/search.php" method="get" >
                                <div class="hd__search-wr">
                                    <input type="text" name="search" class="hd__search-input" placeholder="Tìm phim, rạp" required>
                                    <button type="submit" class="hd__search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </li>
                        <li class="hd__login">
                            <i class="hd__login-icon fa-regular fa-circle-user"></i>
                            <a href="../../../user/login.php" class="hd__login-link">                                   
                                Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>


        <!-- Phần thân trang web -->
        <div class="main__container">
            <main class="main">
                <div class="cinemas__banner">
                    <div class="cinemas__banner-left">
                        <img class="cinemas__banner-img" src="../../../assets/img/banner-showtime.jpg" alt="">
                    </div>
                    <div class="cinemas__banner-right">
                        <div class="cinemas__banner-right-box">
                            <div class="cinemas__banner-name">4SCinema Cầu Giấy</div>
                            
                            <div class="cinemas__banner-location">
                                <span class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <span class="cinemas__banner-location">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tabs">
                    <div class="tab-item active" data-tab="phim-dang-chieu">Phim Đang Chiếu</div>
                    <div class="tab-item" data-tab="phim-sap-chieu">Phim Sắp Chiếu</div>
                    <div class="tab-item" data-tab="suat-chieu-dac-biet">Suất Chiếu Đặc Biệt</div>
                    <div class="tab-item" data-tab="bang-gia-ve">Bảng Giá Vé</div>
                    <div class="line"></div>
                </div>
                

                <div class="tab-content">
                    <!-- Phim đang chiếu -->
                    <div class="tab-pane active" id="phim-dang-chieu">
                        <div class="cinemas__showing-title">Phim đang chiếu</div>
                        <div class="cinemas__showing-movies-row">
                            <?php
                            // Truy vấn các phim đang chiếu
                            $sql_movies = "SELECT * FROM movies WHERE status_mv = 'Đang chiếu'";
                            $result_movies = $conn->query($sql_movies);

                            if ($result_movies->num_rows > 0) {
                                // Lặp qua từng phim
                                while ($row_movie = $result_movies->fetch_assoc()) {
                                    // Gán ID phim
                                    $movie_id = $row_movie['movie_id'];

                                    // Truy vấn lịch chiếu cho phim hiện tại
                                    $sql_showtimes = "SELECT s.show_date, sc.screening_time 
                                                    FROM showtimes s 
                                                    JOIN screenings sc ON s.showtime_id = sc.showtime_id 
                                                    WHERE s.movie_id = ?
                                                    ORDER BY s.show_date";
                                    $stmt = $conn->prepare($sql_showtimes);
                                    if ($stmt === false) {
                                        die('Lỗi câu lệnh chuẩn bị: ' . $conn->error);
                                    }
                                    $stmt->bind_param("i", $movie_id);
                                    $stmt->execute();
                                    $result_showtimes = $stmt->get_result();

                                    // Hiển thị thông tin phim
                                    echo '<div class="showing__movies">';
                                        echo '<img class="showing__movies-img" src="../../../assets/img/' . $row_movie['image_url'] . '">';
                                        echo '<div class="showing__movies-infor">';
                                            echo '<div class="showing__movies-name">' . $row_movie['title'] . '</div>';
                                            echo '<ul class="showing__movies-attribute">';
                                                echo '<div class="showing__movies-label">';
                                                    echo '<i class="fa-solid fa-tag"></i>';
                                                    echo '<li class="movies__list-content">' . $row_movie['genre'] . '</li>';
                                                echo '</div>';
                                                echo '<div class="showing__movies-label">';
                                                    echo '<i class="fa-regular fa-clock"></i>';
                                                    echo '<li class="movies__list-content">' . $row_movie['duration'] .' phút' .'</li>';
                                                echo '</div>';
                                                echo '<div class="showing__movies-label">';
                                                    echo '<i class="fa-solid fa-earth-americas"></i>';
                                                    echo '<li class="movies__list-content">' . $row_movie['country'] . '</li>';
                                                echo '</div>';
                                                echo '<div class="showing__movies-label">';
                                                    echo '<i class="fa-regular fa-closed-captioning"></i>';
                                                    echo '<li class="movies__list-content">' . $row_movie['vietsub'] . '</li>';
                                                echo '</div>';
                                                echo '<div class="showing__movies-label">';
                                                    echo '<i class="fa-regular fa-user"></i>';
                                                    echo '<li class="movies__list-content">Phim dành cho khán giả từ ' . $row_movie['age_rating'] . ' tuổi trở lên</li>';
                                                echo '</div>';
                                            echo '</ul>';

                                            // Hiển thị lịch chiếu theo ngày
                                            if ($result_showtimes->num_rows > 0) {
                                                $current_date = ''; // Biến để theo dõi ngày hiện tại
                                                while ($row_showtime = $result_showtimes->fetch_assoc()) {
                                                    // Nếu ngày chiếu mới, hiển thị ngày mới
                                                    if ($current_date != $row_showtime['show_date']) {
                                                        if ($current_date != '') {
                                                            // Đóng div showtimes cho ngày trước đó
                                                            echo '</div>'; // Đóng .showing__movies-time-container
                                                            echo '</div>'; // Đóng .showing__movies-time
                                                            echo '</div>'; // Đóng .showing__movies-showtimes
                                                        }
                                                        $current_date = $row_showtime['show_date'];

                                                        // Hiển thị ngày chiếu
                                                        echo '<div class="showing__movies-showtimes">';
                                                            echo '<div class="showing__movies-date">';
                                                                echo '<span class="showing__movies-time">' . $current_date . '</span>';
                                                                echo '<i class="fa-solid fa-angle-down toggle-arrow"></i>';
                                                            echo '</div>';
                                                            echo '<div class="showing__movies-time toggle-content" style="width:100%">';
                                                                echo '<p class="showing__movies-ticket-class">Standard</p>';
                                                                echo '<div class="showing__movies-time-container">';
                                                    }

                                                    // Hiển thị các suất chiếu cho ngày hiện tại
                                                    $screening_time = $row_showtime['screening_time'];
                                                    $formatted_time = substr($screening_time, 0, 5); // Định dạng lại giờ chiếu
                                                    echo '<div class="movies__time-box">';
                                                        echo '<a class="movies__box-link" href="#">' . $formatted_time . '</a>';
                                                    echo '</div>';
                                                }

                                                // Đóng các div cuối cùng
                                                echo '</div>'; // Đóng .showing__movies-time-container
                                                echo '</div>'; // Đóng .showing__movies-time
                                                echo '</div>'; // Đóng .showing__movies-showtimes
                                            } else {
                                                echo '<div>Chưa có lịch chiếu.</div>';
                                            }
                                        // Thêm liên kết để xem thêm lịch chiếu
                                        echo '<div class="upcoming__showtimes-link">';
                                            echo '<a class="showtimes-link" href="#">Xem thêm lịch chiếu</a>';
                                        echo '</div>';
                                        echo '</div>'; // Đóng .showing__movies-infor

                                        
                                    echo '</div>'; // Đóng .showing__movies
                                }
                            } else {
                                echo 'Không có phim nào được tìm thấy.';
                            }
                            ?>
                        </div>
                    </div>




                    <!-- Phim sắp chiếu -->
                     
                    <div class="tab-pane" id="phim-sap-chieu">
                        <div class="cinemas__upcoming-title">Phim sắp chiếu</div>
                        <div class="cinemas__upcoming-movies-row">
                        <?php
                        $sql = "SELECT * FROM movies WHERE status_mv = 'Sắp chiếu'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua từng dòng dữ liệu
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="upcoming__movies">';
                                    echo '<img class="upcoming__movies-img" src="../../../assets/img/' .$row['image_url']  .'">';
                                    echo '<div class="upcoming__movies-infor">';
                                        echo '<div class="upcoming__movies-name">' .$row['title'] .'</div>';
                                        '<ul class="upcoming__movies-attribute">';
                                            echo '<div class="upcoming__movies-label">';
                                                echo '<i class="fa-solid fa-tag"></i>';
                                                echo '<li class="movies__list-content">'.$row['genre'] .'</li>';
                                            echo '</div>';
                                            echo '<div class="upcoming__movies-label">';
                                                echo '<i class="fa-regular fa-clock"></i>';
                                                echo '<li class="movies__list-content">'  .$row['duration'] .' phút' .'</li>';
                                            echo '</div>';
                                            echo '<div class="upcoming__movies-label">';
                                                echo '<i class="fa-solid fa-earth-americas"></i>';
                                                echo '<li class="movies__list-content">' .$row['country'] .'</li>';
                                            echo '</div>';
                                            echo '<div class="upcoming__movies-label">';
                                                echo '<i class="fa-regular fa-closed-captioning"></i>';
                                                echo '<li class="movies__list-content">' .$row['vietsub'] .'</li>';
                                            echo '</div>';
                                            echo '<div class="upcoming__movies-label">';
                                                echo '<i class="fa-regular fa-user"></i>';
                                                echo '<li class="movies__list-content">' .'Phim dành cho khán giả từ ' .$row['age_rating'] .' tuổi trở lên' .'</li>';
                                            echo '</div>';
                                        echo '</ul>';

                                        echo '<div class="upcoming__movies-showtimes">';
                                            echo '<div class="upcoming_movies-showtimes-container">';
                                                echo '<i class="fa-regular fa-circle-xmark"></i>';
                                                echo '<span class="upcoming_txt">Chưa có suất chiếu</span>';
                                            echo '</div>';
                                        echo '</div>';
                                        
                                        echo '<div class="upcoming__showtimes-link">';
                                            echo '<a class="showtimes-link" href="">Xem thêm lịch chiếu</a>';
                                        echo '</div>';
                                
                                    echo '</div>';
                                echo '</div>';
                            }
                        }else {
                            echo 'Không có phim nào được tìm thấy.';
                        }
                        ?>
                        </div>
                    </div>

                    <!-- Suất chiếu đặc biệt -->
                    <div class="tab-pane" id="suat-chieu-dac-biet">
                        <div class="cinemas__special-title">Suất chiếu đặc biệt</div>
                        <div class="cinemas__special-emote">
                            <!-- <img class="X_img" src="../../../assets/img/Special_showtime.png"> -->
                            <i class="fa-regular fa-face-sad-cry"></i>
                        </div>
                        <p class="cinemas__special-sorry">Tính năng đang cập nhật</p>
                        
                    </div>


                    <!-- Bảng giá vé -->
                    <div class="tab-pane" id="bang-gia-ve">
                        <h2 class="ticket__price-title">Bảng giá vé</h2>
                        <div class="ticket__price-img">
                            <img class="price-img" src="../../../assets/img/Ticket_Price.png" alt="">
                        </div>
                        
                    </div>

                    <!-- khuyến mãi -->
                    <section class="promotion">
                    
                        <div class="movie-slide-hd">
                            <h1>Khuyến mãi</h1>
                        </div>
                        <div class="swiper-container">

                            <div class="promotion-container">
                                <div class="promotion-list">
                                    <div class="promotion-item">
                                        <a href="" >
                                            <img src="../../../assets/img/promotion1.webp" alt="khuyến mãi 1">
                                        </a>
                                    </div>
        
                                    <div class="promotion-item">
                                        <a href="">
                                            <img src="../../../assets/img/promotion2.webp" alt="khuyến mãi 2">
                                        </a>
                                    </div>
        
                                    <div class="promotion-item">
                                        <a href="">
                                            <img src="../../../assets/img/promotion3.webp" alt="khuyến mãi 3">
                                        </a>                                
                                    </div>
        
                                    <div class="promotion-item">
                                        <a href="">
                                            <img src="../../../assets/img/promotion4.webp" alt="khuyến mãi 4">
                                        </a>                 
                                    </div>                               
                                </div>               
                            </div>
                            <!-- bullet -->
                            <div class="movie-change-bullet">
                                <span class="movie-bullet movie-bullet-active"></span>
                                <span class="movie-bullet"></span>
                            </div>

                            <!-- nút chuyển trang -->
                            <div class="arrow-btn-prev">
                                <i class="fa-solid fa-angle-left"></i>
                            </div>
                            <div class="arrow-btn-next">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>

                            <!-- nút tất cả ưu đãi -->
                            <div class="btn-showtimes">
                            <a href=""> 
                                <button class="btn-more ">Tất cả ưu đãi</button>
                            </a>
                            </div>
                        </div>        
                    </section>
                </div>
                
            </main>
        </div>





















        <!-- Footer -->
        <footer class="footer">
            <div class="grid">

                <div class="footer-container">
                    <!-- Khối footer top -->
                    <div class="footer-top">
                        <!-- Khối footer nhỏ bên trái                     -->
                        <div class="footer-top-left">
                            <div class="footer-left-logo"><img class="footer__logo-img" src="../../../assets/img/logo4S-footer.png" alt=""></div>
                            <div class="footer-left-slogan">Your satisfaction is our joy !</div>
                            <div class="btn-order">
                                <button class="btn ticket">Đặt vé</button>
                                <button class="btn food">Đặt bắp nước</button>
                            </div>
                            <div class="footer-left-contact">
                                <a href="https://www.facebook.com/chotung.mrt"><i class="fa-brands fa-facebook"></i></a>
                                <a href="https://www.tiktok.com/@nguyenducha264"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="https://www.instagram.com/bo0.905/"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://discord.gg/tvpEumX9"><i class="fa-brands fa-discord"></i></a>
                            </div>
                        </div>
        
                        <!-- Khối footer nhỏ bên phải                     -->
                        <div class="footer-top-right">
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-account">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Tài khoản</p>
                                        <a class="footer-column-link" href="../../login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="../../login.php"><li class="footer-column-menu">Đăng ký</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Membership</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
                                        <a class="footer-column-link" href="Special_Showtimes.php"><li class="footer-column-menu">Suất chiếu đặc biệt</li></a>
                                    </ul>
                                </div>
                            </div>
        
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-my-cinemas">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">4SCinema</p>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Giới thiệu</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Liên hệ</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Tuyển dụng</li></a>
                                    </ul>
                                </div>
                            </div>

                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-cinemas-system">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Hệ thống rạp</p>
                                        <a class="footer-column-link" href="4SCinema_CauGiay.php"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                        <a class="footer-column-link" href="4SCinema_HaiBaTrung.php"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                        <a class="footer-column-link" href="4SCinema_LongBien.php"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                        <a class="footer-column-link" href="4SCinema_MyDinh.php"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                        <a class="footer-column-link" href="4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                        <a class="footer-column-link" href="4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="footer-bottom-left">
                            <i class="fa-regular fa-copyright"></i>
                            <p class="copyright">2024 4SCinema. All rights reserved.</p>
                        </div>

                        <div class="footer-bottom-right">
                            <a class="footer-bottom-right-items" href="../../../user/policy.php">Chính sách bảo mật</a>
                            <a class="footer-bottom-right-items" href="">Tin điện ảnh</a>
                            <a class="footer-bottom-right-items" href="">Hỏi và đáp</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="choose_cinemas.js"></script>  
    <script src="../../script.js"></script>  
</body>
</html>