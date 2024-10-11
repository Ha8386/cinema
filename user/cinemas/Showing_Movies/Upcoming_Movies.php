<?php
$servername = "localhost";
$username = "root";
$password = "anhhadeptrai";
$dbname = "quanly_4scinemas";

// Kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy danh sách phim
$sql = "SELECT title, image_url, trailer_url FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4SCinema Cầu Giấy</title>
    <link rel="icon" href="../../..../../..../../../assets/img/logo4S-onlyic.png" type="x-icon">
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
                            <div class="hd__search-wr">
                                <input type="text" class="hd__search-input" placeholder="Tìm phim, rạp">
                                <i class="hd__search-icon fa-solid fa-magnifying-glass"></i>
                            </div>
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
            <main class="grid">
            <div class="upcoming__movies-title">
                    <h2 class="web-title">Phim sắp chiếu</h2>
                </div>
                <div class="upcoming__movies-row">
                    <!-- movie 1 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Avatar_poster.jpg" alt="movie1">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Thế thân: Dòng chảy của nước (t13)</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Avatar.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Avatar.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 2 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Logan_poster.jpg" alt="movie2">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Logan (t17)</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Logan.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Logan.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>                             
                            </div>  
                        </div>
                    </div>  

                    <!-- movie 3 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/PacificRim_poster.jpg" alt="movie3">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Đại chiến thái bình dương (t13)</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/PacificRim.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/PacificRim.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>                             
                            </div>  
                        </div>
                    </div>
                    <!-- movie 4 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Transformer_poster.jpg" alt="movie4">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Người máy biến hình: Kỷ nguyên hủy diệt (t13)</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Transformer.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Transformer.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 5 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/YourName_poster.jpg" alt="movie5">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Tên cậu là gì</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/YourName.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/YourName.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 6 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/TheBoyAndTheHeron_poster.jpg" alt="movie7">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Thiếu niên và chim diệc (T13) </a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/TheBoyAndTheHeron.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/TheBoyAndTheHeron.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 7 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Moana_poster.jpg" alt="movie6">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Moana</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Moana.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Moana.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 8 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/DespicableMe_poster.jpg" alt="movie8">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Kẻ cắp mặt trăng</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/DespicableMe.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/DespicableMe.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 9 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Annabelle_poster.jpg" alt="movie9">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Búp bê Annabelle</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Annabelle.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Annabelle.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 10 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Hereditary_poster.jpg" alt="movie10">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Di truyền</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Hereditary.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Hereditary.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 11 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Friday13th_poster.jpg" alt="movie10">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Thứ 6 ngày 13</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/FridayThe13th.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/FridayThe13th.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 12 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Incidious_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Quỷ quyệt: Chương 3</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Incidious.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Incidious.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 13 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Venom_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Venom: Đối mặt tử thù</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Venom.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Venom.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 14 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/AquietPlace_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Vùng đất câm lặng</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/AQuietPlace.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/AQuietPlace.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 15 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/GodvsKong_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Godzilla vs Kong</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/GodvsKong.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/GodvsKong.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 16 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/thePlatform_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Hố sâu đói khát</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/thePlatform.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/thePlatform.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 17 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Interstella_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Hố đen tử thần</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Interstella.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Interstella.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 18 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/LOTR-Eng_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Chúa tể của những chiếc nhẫn: Nghĩa tình huynh đệ</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/LOTR.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/LOTR.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 19 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/SSRedemption_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Nhà tù Shawshank</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/SSRedemption.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/SSRedemption.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 20 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/Inception_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Kẻ đánh cắp giấc mơ</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/Inception.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/Inception.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>

                    <!-- movie 13 -->
                    <div class="showing__movie-item">
                        <a href="">
                            <img class="rest-poster-img" src="../../../assets/img/FF8_poster.jpg" alt="movie12">
                        </a>
                        <div class="rest-poster-infor">
                            <a href="" class="rest-poster-name">Quá nhanh quá nguy hiểm 8</a>
                            <div class="trailer-and-order-ticket">
                                <div class="trailer-container">
                                    <a class="trailer-link" href="../../../assets/trailer/FF8.mp4">
                                        <img src="../../../assets/img/icon-play-vid.svg" alt="">
                                    </a>
                                    <a class="trailer-link-text" href="../../../assets/trailer/FF8.mp4">Xem Trailer</a>
                                </div>
                                <a href="">
                                    <button class="btn btn-ticket">Đặt vé</button> 
                                </a>
                                                            
                            </div>  
                        </div>
                    </div>
                    
                    <!-- Thêm phim  -->
                        <?php
                        if ($result->num_rows > 0) {
                            // Lặp qua từng dòng dữ liệu
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="showing__movie-item">';
                                    echo '<a href="">';
                                        echo '<img class="rest-poster-img" src="">';
                                    echo '</a>';
                                    echo '<div class="rest-poster-infor">';
                                        echo '<a href="" class="rest-poster-name">' . '</a>';
                                        echo '<div class="trailer-and-order-ticket">';
                                            echo '<div class="trailer-container">';
                                                echo '<a class="trailer-link" href="">';
                                                    echo '<img src="icon-play-vid.svg" alt="">';
                                                echo '</a>';
                                                echo '<a class="trailer-link-text" href="">Xem Trailer</a>';
                                            echo '</div>';
                                            echo '<a href="">';
                                                echo '<button class="btn btn-ticket">Đặt vé</button>';
                                            echo '</a>';                                                                       
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo 'Không có phim nào được tìm thấy.';
                        }
                        ?>
                  
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
                            <div class="footer-left-logo"><img class="footer__logo-img" src="../../..../../..../../../assets/img/logo4S-footer.png" alt=""></div>
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
                                        <a class="footer-column-link" href="/login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="/login.php"><li class="footer-column-menu">Đăng ký</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Membership</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="/cinemas/Upcoming_Movies/Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Suất chiếu đặc biệt</li></a>
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
    <script src="/script.js"></script>    
</body>
</html>