<?php
    session_start();
    include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch chiếu</title>
    <link rel="icon" href="../assets/img/logo4S-onlyic.png" type="x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app">
    <header class="hd">
            <div class="grid">
                <div class="hd__main">
        
                    <ul class="hd__left">
                        <li class="hd__logo">
                            <a href="index.php" class="hd__logo-link">
                                <img src="../assets/img/logo4S.png" alt="4S CINEMA" class="hd__logo-img">
                            </a>
                        </li>
                        <li class="hd__nav-item hd__nav-item--local ">
                            Rạp phim
                            <div class="hd__local">
                                <a href="cinemas/Showing_Movies/4SCinema_CauGiay.php" class="hd__local-link">
                                    4SCinema Cầu Giấy
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_HaiBaTrung.php" class="hd__local-link">
                                    4SCinema Hai Bà Trưng
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_LongBien.php" class="hd__local-link">
                                    4SCinema Long Biên
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_MyDinh.php" class="hd__local-link">
                                    4SCinema Mỹ Đình
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_TayHo.php" class="hd__local-link">
                                    4SCinema Tây Hồ
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_ThanhXuan.php" class="hd__local-link">
                                    4SCinema Thanh Xuân
                                </a>                           
                            </div>
                        </li>
                        <li class="hd__nav-item">
                            <a href="showtimes.php" class="hd__nav-link">Lịch chiếu</a>
                        </li>
                        <li class="hd__nav-item">
                            <a href="promotion.php" class="hd__nav-link">Ưu đãi</a>
                        </li>
                    </ul>

                   
                    <ul class="hd__right">
                        <li class="hd__search">
                        <form action="./search/search.php" method="get" >
                            <div class="hd__search-wr">
                                <input type="text" name="search" class="hd__search-input" placeholder="Tìm phim, rạp" required>
                                <button type="submit" class="hd__search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>

                        </li>
                        <li class="hd__login">
                            <i class="hd__login-icon fa-regular fa-circle-user"></i>
                            <a href="login.php" class="hd__login-link">
                                <?php if (isset($_SESSION['customer_name'])): ?>
                                    <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                                <?php else: ?>
                                    Đăng nhập
                                <?php endif; ?>
                                        
                            </a>
                            <div class="hd-login-item">
                                <a class="hd__local-link" href="account/profile.php">Cập nhật thông tin</a>
                                <a class="hd__local-link" href="account/history.php">Lịch sử đặt vé</a>
                                <a class="hd__local-link" href="logout.php">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="showtimes">
            <main class="grid">
                <!-- Phần chọn phim -->
                <div class="movie-part movie-selection-container">
                    <div class="movie-selection-content">
                        <div class="select select-day">
                            <div class="label">
                                <label for="date-select">1. Ngày</label>
                                <i class="fa-solid fa-calendar"></i>
                            </div>
                            <select name="" id="date-select"></select>
                        </div>
                        
                        <div class="select select-movie">
                            <div class="label">
                                <label for="phim">2. Phim</label>
                                <i class="fas fa-film"></i>
                            </div>
                            <select class="chon" name="movie" id="phim">
                                <option value=""></option>
                            </select>
                        </div>
            
                        <div class="select select-cinemas">
                            <div class="label">
                                <label for="rap">3. Rạp</label>
                                <i class="fas fa-map-marker-alt"></i>
                            </div>

                            <select class="chon" name="cinemas" id="rap">
                                <option value="">4SCinema Long Biên</option>
                                <option value="">4SCinema Tây Hồ</option>
                                <option value="">4SCinema Thanh Xuân</option>
                                <option value="">4SCinema Mỹ Đình</option>
                                <option value="">4SCinema Hai Bà Trưng</option>
                                <option value="">4SCinema Cầu Giấy</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Hết khối chọn -->
                
                <!-- Phần thông tin phim -->
                <div class="movie-part movie-information-container">
                    <?php
                        /*$sql_movies = "SELECT movie_id, title, image_url, genre, duration, country, vietsub, age_rating FROM movies WHERE status_mv = 'Đang chiếu'";
                        $result_movies = $conn->query($sql_movies);
                        
                        if($result_movies->num_rows > 0){
                            while($row_movies = $result_movies->fetch_assoc()){
                                $movie_id = $row_movies['movie_id'];       
                                echo '<div class="movie-information-content" data-movie-id="'.$movie_id.'" style="display: none;">';
                                    echo '<div class="movie-information-column">';
                                        echo '<a href="movies/movie.php?id=' . htmlspecialchars($row['movie_id']) . '">';
                                            echo '<img class="poster" src="../assets/img/'.$row_movies['image_url'] .'">';
                                        echo '</a>';
                                        echo '<div class="poster-infor">';
                                            echo '<p class="list-title">'.$row_movies['title'].'</p>';
                                            echo '<ul class="poster-infor-list">';
                                                echo '<div class="poster-label">';
                                                    echo '<i class="fas fa-solid fa-tag"></i>';
                                                    echo '<li class="list-content">'.$row_movies['genre'] .'</li>';
                                                echo '</div>';
                                                echo '<div class="poster-label">';
                                                    echo '<i class="fas fa-regular fa-clock"></i>';
                                                    echo '<li class="list-content">'.$row_movies['duration'] .'</li>';
                                                echo '</div>';
                                                echo '<div class="poster-label">';
                                                    echo '<i class="fas fa-solid fa-earth-americas"></i>';
                                                    echo '<li class="list-content">'.$row_movies['country'] .'</li>';
                                                echo '</div>';
                                                echo '<div class="poster-label">';
                                                    echo '<i class="fas fa-regular fa-closed-captioning"></i>';
                                                    echo '<li class="list-content">'.$row_movies['vietsub'].'</li>';
                                                echo '</div>';
                                                echo '<div class="poster-label">';
                                                    echo '<i class="fas fa-regular fa-user"></i>';
                                                    echo '<li class="list-content">' .'Phim dành cho khán giả từ ' .$row_movies['age_rating'] .' trở lên' .'</li>';
                                                echo '</div>';
                                            echo '</ul>';
                                        echo '</div>';
                                    echo '</div>';
                                  
                                    echo '<div class="movie-information-row">';

                                        $sql_showtimes = "SELECT * FROM showtimes";
                                        $result_showtimes = $conn->query($sql_showtimes);
                                        $sql_screenings = "SELECT * FROM screenings";
                                        $result_screenings = $conn->query($sql_screenings);
                                        $sql_screenings = "SELECT sc.screening_time 
                                                    FROM screenings sc
                                                    JOIN showtimes s
                                                    ON s.showtime_id = sc.showtime_id 
                                                    WHERE movie_id = ? 
                                                    ORDER BY s.show_date";

                                        $stmt = $conn->prepare($sql_screenings);
                                        if ($stmt === false) {
                                            die('Lỗi câu lệnh chuẩn bị: ' . $conn->error);
                                        }
                                        
                                        $stmt->bind_param("i", $movie_id);
                                        $stmt->execute();
                                        $result_screenings = $stmt->get_result();
                                        // Tạo mảng để lưu trữ các suất chiếu
                                        $screening_times = [];

                                        if ($result_screenings->num_rows > 0) {
                                            while ($row_screenings = $result_screenings->fetch_assoc()) {
                                                $screening_times[] = $row_screenings['screening_time'];
                                            }
                                        }

                                        // Hàng suất chiếu 1
                                        echo '<div class="information-row">';
                                            echo '<div class="location-row">';
                                                echo '<p class="row-cinemas">4SCinema</p>';
                                                echo '<p class="row-cinemas-district">Cầu Giấy</p>';
                                                echo '<p class="row-cinemas-address">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</p>';
                                            echo '</div>';
                                            echo '<div class="showtimes-row">';
                                                echo '<div class="showtimes-title">Standard</div>';
                                                echo '<div class="showtimes-box">';
                                                    foreach ($screening_times as $time) {
                                                        echo '<div class="showtimes-hour">' . $time . '</div>';
                                                    }
                                                echo '</div>'; 
                                            echo '</div>'; 
                                        echo '</div>'; 

                                        // Hàng suất chiếu 2
                                        echo '<div class="information-row">';
                                            echo '<div class="location-row">';
                                                echo '<p class="row-cinemas">4SCinema</p>';
                                                echo '<p class="row-cinemas-district">Hai Bà Trưng</p>';
                                                echo '<p class="row-cinemas-address">Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội</p>';
                                            echo '</div>';
                                            echo '<div class="showtimes-row">';
                                                echo '<div class="showtimes-title">Standard</div>';
                                                echo '<div class="showtimes-box">';
                                                    foreach ($screening_times as $time) {
                                                        echo '<div class="showtimes-hour">' . $time . '</div>';
                                                    }
                                                echo '</div>'; 
                                            echo '</div>'; 
                                        echo '</div>'; 

                                        //Hàng suất chiếu 3
                                        echo '<div class="information-row">';
                                            echo '<div class="location-row">';
                                                echo '<p class="row-cinemas">4SCinema</p>';
                                                echo '<p class="row-cinemas-district">Long Biên</p>';
                                                echo '<p class="row-cinemas-address">Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội</p>';
                                            echo '</div>';
                                            echo '<div class="showtimes-row">';
                                                echo '<div class="showtimes-title">Standard</div>';
                                                echo '<div class="showtimes-box">';
                                                    foreach ($screening_times as $time) {
                                                        echo '<div class="showtimes-hour">' . $time . '</div>';
                                                    }
                                                echo '</div>'; 
                                            echo '</div>'; 
                                        echo '</div>'; 

                                        //Hàng suất chiếu 4
                                        echo '<div class="information-row">';
                                            echo '<div class="location-row">';
                                                echo '<p class="row-cinemas">4SCinema</p>';
                                                echo '<p class="row-cinemas-district">Mỹ Đình</p>';
                                                echo '<p class="row-cinemas-address">Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội</p>';
                                            echo '</div>';
                                            echo '<div class="showtimes-row">';
                                                echo '<div class="showtimes-title">Standard</div>';
                                                echo '<div class="showtimes-box">';
                                                    foreach ($screening_times as $time) {
                                                        echo '<div class="showtimes-hour">' . $time . '</div>';
                                                    }
                                                echo '</div>'; 
                                            echo '</div>'; 
                                        echo '</div>'; 

                                        //Hàng suất chiếu 5
                                        echo '<div class="information-row">';
                                            echo '<div class="location-row">';
                                                echo '<p class="row-cinemas">4SCinema</p>';
                                                echo '<p class="row-cinemas-district">Tây Hồ</p>';
                                                echo '<p class="row-cinemas-address">Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội</p>';
                                            echo '</div>';
                                            echo '<div class="showtimes-row">';
                                                echo '<div class="showtimes-title">Standard</div>';
                                                echo '<div class="showtimes-box">';
                                                    foreach ($screening_times as $time) {
                                                        echo '<div class="showtimes-hour">' . $time . '</div>';
                                                    }
                                                echo '</div>'; 
                                            echo '</div>'; 
                                        echo '</div>'; 

                                        //Hàng suất chiếu 6
                                        echo '<div class="information-row sixth-row">';
                                            echo '<div class="location-row">';
                                                echo '<p class="row-cinemas">4SCinema</p>';
                                                echo '<p class="row-cinemas-district">Thanh Xuân</p>';
                                                echo '<p class="row-cinemas-address">Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội</p>';
                                            echo '</div>';
                                            echo '<div class="showtimes-row">';
                                                echo '<div class="showtimes-title">Standard</div>';
                                                echo '<div class="showtimes-box">';
                                                    foreach ($screening_times as $time) {
                                                        echo '<div class="showtimes-hour">' . $time . '</div>';
                                                    }
                                                echo '</div>'; // Đóng showtimes-box
                                            echo '</div>'; // Đóng showtimes-row
                                        echo '</div>'; // Đóng information-row
                                    echo '</div>'; // Đóng movie-information-row
                                echo '</div>';    
                            }
                        }                    
                        */?>
                    </div>
                    <!-- *******************Hết******************* -->  
                    <section class="movie-slide">
                    <div class="swiper-container">                       
                        <div class="movie-rest-container">
                            <div class="movie-rest">
                                <?php 
                                $sql = "SELECT * FROM movies WHERE status_mv = 'Đang chiếu'";
                                $result = $conn->query($sql);
                                 if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        echo '<div class="movie-rest-poster">';
                                            echo '<a href="movies/movie.php?id=' . htmlspecialchars($row['movie_id']) . '">';
                                                echo '<img class="rest-poster-img" src="../assets/img/'.htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['title']) . '">';
                                            echo '</a>';
                                            echo '<div class="rest-poster-infor">';
                                                echo '<a href="" class="rest-poster-name">'. htmlspecialchars($row['title']) .' </a>';
                                                echo '<div class="trailer-and-order-ticket">';
                                                    echo '<div class="trailer-container">';
                                                        echo '<a class="trailer-link" href="../assets/trailer/' . htmlspecialchars($row['trailer_url']) . '">';
                                                        echo '<img src="../assets/img/icon-play-vid.svg" alt="">';
                                                        echo '</a>';
                                                        echo '<a class="trailer-link-text" href="../assets/trailer/' . htmlspecialchars($row['trailer_url']) . '">Xem Trailer</a>';
                                                    echo  '</div>';

                                                    echo '<a href="movies/movie.php?id=' . htmlspecialchars($row['movie_id']) . '">';
                                                        echo '<button class="btn btn-ticket">Đặt vé</button>';
                                                    echo '</a>';
                                                echo '</div> '; 
                                            echo '</div> ';
                                        echo '</div> ';
                                    }
                                }
                                ?>

                                

                            </div>
                        </div>   

                        <!-- bullet -->
                         <div class="movie-change-bullet">
                            <span class="movie-bullet movie-bullet-active"></span>
                            <span class="movie-bullet"></span>
                            <span class="movie-bullet"></span>
                         </div>

                         <!-- nút chuyển trang -->
                        <div class="arrow-btn-prev">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="arrow-btn-next">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="btn-showtimes">
                        <a href="cinemas/Showing_Movies/Showing_Movies.php"> 
                            <button class="btn-more ">Xem thêm</button>
                        </a>
                    </div>
                    
                 </section>
                </div>
                  

            </main>
            <!-- Bên dưới là khối bao trùm     --> 
        </div>

        
        <!-- Footer -->
        <footer class="footer">
            <div class="grid">

                <div class="footer-container">
                    <!-- Khối footer top -->
                    <div class="footer-top">
                        <!-- Khối footer nhỏ bên trái                     -->
                        <div class="footer-top-left">
                            <div class="footer-left-logo"><img class="footer__logo-img" src="../assets/img/logo4S-footer.png" alt=""></div>
                            <div class="footer-left-slogan">Your satisfaction is our joy !</div>
                            <div class="btn-order">
                                <button class="btn ticket">Đặt vé</button>
                                <button class="btn food">Đặt bắp nước</button>
                            </div>
                            <div class="footer-left-contact">
                                <p class="contact-us">Liên hệ với chúng tôi: </p>
                                <div class="contact_block">
                                    <a href="https://www.facebook.com/profile.php?id=61567620087932"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.tiktok.com/@nguyenducha264"><i class="fa-brands fa-tiktok"></i></a>
                                    <a href="https://www.instagram.com/bo0.905/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://discord.gg/tvpEumX9"><i class="fa-brands fa-discord"></i></a>
                                </div>
                            </div>
                        </div>
        
                        <!-- Khối footer nhỏ bên phải                     -->
                        <div class="footer-top-right">
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-account">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Tài khoản</p>
                                        <a class="footer-column-link" href="login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="login.php"><li class="footer-column-menu">Đăng ký</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Special_Showtimes.php"><li class="footer-column-menu">Suất chiếu đặc biệt</li></a>
                                    </ul>
                                </div>
                            </div>

                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-cinemas-system">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Hệ thống rạp</p>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_CauGiay.php"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_HaiBaTrung.php"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_LongBien.php"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_MyDinh.php"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
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
                            <a class="footer-bottom-right-items" href="policy.php">Chính sách bảo mật</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>    
    </div>
    <script src="script.js"></script>
</body>
</html>