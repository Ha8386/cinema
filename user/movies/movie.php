<?php
include '../db_connection.php'; 

$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$showtime_id = isset($_GET['showtime_id']) ? intval($_GET['showtime_id']) : 0;
if ($showtime_id > 0) {
    $sql = "SELECT screening_time FROM screenings WHERE showtime_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $showtime_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $screening_times = [];
    while ($row = $result->fetch_assoc()) {
        $screening_times[] = $row['screening_time'];
    }
    $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css   ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app">
        <header class="hd">
            <div class="grid">
                <div class="hd__main">
        
                    <ul class="hd__left">
                        <li class="hd__logo">
                            <a href="../index.php" class="hd__logo-link">
                                <img src="../../assets/img/logo4S.png" alt="4S CINEMA" class="hd__logo-img">
                            </a>
                        </li>
                        <li class="hd__nav-item hd__nav-item--local ">
                            Rạp phim
                            <div class="hd__local">
                                <a href="../cinemas/Showing_Movies/4SCinema_CauGiay.php" class="hd__local-link">
                                    4SCinema Cầu Giấy
                                </a>
                                <a href="../cinemas/Showing_Movies/4SCinema_HaiBaTrung.php" class="hd__local-link">
                                    4SCinema Hai Bà Trưng
                                </a>
                                <a href="../cinemas/Showing_Movies/4SCinema_LongBien.php" class="hd__local-link">
                                    4SCinema Long Biên
                                </a>
                                <a href="../cinemas/Showing_Movies/4SCinema_MyDinh.php" class="hd__local-link">
                                    4SCinema Mỹ Đình
                                </a>
                                <a href="../cinemas/Showing_Movies/4SCinema_TayHo.php" class="hd__local-link">
                                    4SCinema Tây Hồ
                                </a>
                                <a href="../cinemas/Showing_Movies/4SCinema_ThanhXuan.php" class="hd__local-link">
                                    4SCinema Thanh Xuân
                                </a>                           
                            </div>
                        </li>
                        <li class="hd__nav-item">
                            <a href="../showtimes.php" class="hd__nav-link">Lịch chiếu</a>
                        </li>
                        <li class="hd__nav-item">
                            <a href="../promotion.php" class="hd__nav-link">Ưu đãi</a>
                        </li>
                    </ul>

                   
                    <ul class="hd__right">
                        <li class="hd__search">
                            <form action="../search/search.php" method="get" >
                                <div class="hd__search-wr">
                                    <input type="text" name="search" class="hd__search-input" placeholder="Tìm phim, rạp" required>
                                    <button type="submit" class="hd__search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </li>
                        <li class="hd__login">
                            <i class="hd__login-icon fa-regular fa-circle-user"></i>
                            <a href="../login.php" class="hd__login-link">
                                    
                                Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="app-content">
            <section class="detail ">
                <div class="grid">
                    <div class="detail-wr">
                        <div class="detail-row row">
                            <?php   
                            $sql  = "SELECT * FROM movies WHERE movie_id = $movie_id";
                            $result = $conn ->query($sql);
                            if(  $result ->num_rows > 0 ){
                                while( $row = $result -> fetch_assoc() ){

                                    echo '<div class="detail-left col col-5">';
                                        echo '<div class="web-movie-box">';
                                            echo '<div class="image">';
                                                echo '<img src="../../assets/img/'.htmlspecialchars($row['image_url']).'" alt="'.htmlspecialchars($row['title']).'">';
                                                
                                                echo '<div class="attach">';
                                                    echo '<div class="type-movie">';
                                                        echo '<span class="txt">2D</span>';
                                                    echo '</div>';
                                                    echo '<div class="age">';
                                                        echo '<span class="num">T'.htmlspecialchars($row['age_rating']).'</span>';
                                                        echo '<span class="txt">ADULT</span>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';

                                        echo '</div>';
                                   echo ' </div>';
                                    
                                    echo '<div class="detail-right col col-7">';
                                        echo '<div class="detail-ct">';
                                            echo '<div class="detail-ct-h">';
                                                echo '<h1 class="heading">'.htmlspecialchars($row['title']).' (T'.htmlspecialchars($row['age_rating']).')</h1>';
                                                echo '<ul class="info-detail">';
                                                    echo '<li class="info-item">';
                                                        echo '<span class="ic"><i class="fa-solid fa-tag"></i></span>';
                                                        echo '<span class="txt">'.htmlspecialchars($row['genre']).'</span>';
                                                   echo ' </li>';
                                                    echo '<li class="info-item">';
                                                        echo '<span class="ic"><i class="fa-regular fa-clock"></i></span>';
                                                        echo '<span class="txt">'.htmlspecialchars($row['duration']).'</span>';
                                                    echo '</li>';
                                                    echo '<li class="info-item">';
                                                        echo '<span class="ic"><i class="fa-solid fa-earth-americas"></i></span>';
                                                        echo '<span class="txt">'.htmlspecialchars($row['country']).'</span>';
                                                    echo '</li>';
                                                    echo '<li class="info-item">';
                                                        echo '<span class="ic"><i class="fa-regular fa-closed-captioning"></i></span>';
                                                        echo '<span class="txt">'.htmlspecialchars($row['vietsub']).'</span>';
                                                    echo '</li>';
                                                    echo '<li class="info-item">';
                                                        echo '<span class="ic"><i class="fa-regular fa-user"></i></span>';
                                                        echo '<span class="txt">T'.htmlspecialchars($row['age_rating']).': Phim dành cho khán giả từ đủ '.htmlspecialchars($row['age_rating']).' tuổi trở lên</span>';
                                                    echo '</li>';
                                                        
                                                echo '</ul>';
                                            echo '</div>';
                                            echo '<div class="detail-ct-bd">';
                                                echo '<h3 class="tt sub-title">MÔ TẢ</h3>';
                                                echo '<ul >';
                                                    echo '<li>Khởi chiếu: '.htmlspecialchars($row['release_date']).'</li>';
                                                echo '</ul>';
                                            echo '</div>';

                                            echo '<div class="detail-ct-bd">';
                                                echo '<h3 class="tt sub-title">NỘI DUNG PHIM</h3>';
                                                echo '<p>'.htmlspecialchars($row['description_mv']).'</p>';
                                            echo '</div>';

                                           echo ' <div class="detail-ct-trailer">';
                                                echo '<div class="trailer-and-order-ticket">';
                                                    echo '<div class="trailer-container">';
                                                        echo '<a class="trailer-link" href="../../assets/trailer/'.htmlspecialchars($row['trailer_url']).'">';
                                                       echo ' <img src="../../assets/img/icon-play-vid.svg" alt="">';
                                                        echo '</a>';
                                                        echo '<a class="trailer-link-text" href="../../assets/trailer/'.htmlspecialchars($row['trailer_url']).'">Xem Trailer</a>';
                                                    echo '</div>';
                                                echo '</div> ';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        
                        </div>
                    </div>
                </div>
            </section>

            <section class="sec-shtime">
                <div class="shtime">
                    <div class="shtime-wr">

                        <div class="shtime-heading">
                            <h2 class="heading">Lịch chiếu</h2>
                        </div>

                        <div class="shtime-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    $sql_1 = "SELECT * FROM showtimes WHERE movie_id = $movie_id";
                                    $result_1 = $conn ->query($sql_1);
                                    if ($result_1->num_rows > 0) {
                                        while($row = $result_1->fetch_assoc()) {
                                            $showDate = $row['show_date'];
                                            $dayOfWeek = date('l', strtotime($showDate));
                                            $daysInVietnamese = [
                                                'Monday' => 'Thứ Hai',
                                                'Tuesday' => 'Thứ Ba',
                                                'Wednesday' => 'Thứ Tư',
                                                'Thursday' => 'Thứ Năm',
                                                'Friday' => 'Thứ Sáu',
                                                'Saturday' => 'Thứ Bảy',
                                                'Sunday' => 'Chủ Nhật'
                                            ];
                                            $day = isset($daysInVietnamese[$dayOfWeek]) ? $daysInVietnamese[$dayOfWeek] : '';
                                            $showtime_id = $row['showtime_id'];

                                            echo '<div class="swiper-slide col">';
                                                echo '<div class="box-time" data-showtime-id="' . htmlspecialchars($showtime_id) . '">';
                                                    echo '<p class="date">'.htmlspecialchars($row['show_date']).'</p>';
                                                    echo '<p class="day">'.$day.'</p>';
                                                echo '</div>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                        <div class="shtime-body">
                            <h2 class="heading">DANH SÁCH RẠP</h2>
                            <div class="sort">
                                <div class="select-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div class="ant-select-selector">
                                        <span class="ant-select-selection-item">Hà Nội</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="shtime-ft">
                            <!-- rạp mỹ đình -->
                            <ul class="cinema-list">
                                <li class="cinema-item">
                                    <div class="cinema-heading">
                                        <h4 class="title">4SCinema Mỹ Đình</h4>
                                    </div>
                                    <div class="cinema-body">
                                        <p class="addr">Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội</p>
                                        <ul class="list-info">
                                            <li class="item-info">
                                                <div class="tt">Standard</div>
                                                <ul class="list-time">
                                                <?php 
                                                if (!empty($screening_times)) {
                                                    foreach ($screening_times as $time) {
                                                        echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                                    }
                                                } else {
                                                    echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                                }

                                                ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!-- rạp tây hồ -->
                                <li class="cinema-item">
                                    <div class="cinema-heading">
                                        <h4 class="title">4SCinema Tây Hồ</h4>
                                    </div>
                                    <div class="cinema-body">
                                        <p class="addr">Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội</p>
                                        <ul class="list-info">
                                            <li class="item-info">
                                                <div class="tt">Standard</div>
                                                <ul class="list-time">
                                                <?php 
                                                if (!empty($screening_times)) {
                                                    foreach ($screening_times as $time) {
                                                        echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                                    }
                                                } else {
                                                    echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                                }

                                                ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!-- rạp thanh xuân -->
                                    <li class="cinema-item">
                                        <div class="cinema-heading">
                                            <h4 class="title">4SCinema Thanh Xuân</h4>
                                        </div>
                                        <div class="cinema-body">
                                            <p class="addr">Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội</p>
                                            <ul class="list-info">
                                                <li class="item-info">
                                                    <div class="tt">Standard</div>
                                                    <ul class="list-time">
                                                    <?php 
                                                    if (!empty($screening_times)) {
                                                        foreach ($screening_times as $time) {
                                                            echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                                        }
                                                    } else {
                                                        echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                                    }

                                                    ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                <!-- rạp hai bà trưng -->
                                <li class="cinema-item">
                                    <div class="cinema-heading">
                                        <h4 class="title">4SCinema Hai Bà trưng</h4>
                                    </div>
                                    <div class="cinema-body">
                                        <p class="addr">Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội</p>
                                        <ul class="list-info">
                                            <li class="item-info">
                                                <div class="tt">Standard</div>
                                                <ul class="list-time">
                                                <?php 
                                                if (!empty($screening_times)) {
                                                    foreach ($screening_times as $time) {
                                                        echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                                    }
                                                } else {
                                                    echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                                }

                                                ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!-- rạp cầu giấy -->
                                <li class="cinema-item">
                                    <div class="cinema-heading">
                                        <h4 class="title">4SCinema Cầu Giấy</h4>
                                    </div>
                                    <div class="cinema-body">
                                        <p class="addr">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</p>
                                        <ul class="list-info">
                                            <li class="item-info">
                                                <div class="tt">Standard</div>
                                                <ul class="list-time">
                                                <?php 
                                                if (!empty($screening_times)) {
                                                    foreach ($screening_times as $time) {
                                                        echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                                    }
                                                } else {
                                                    echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                                }

                                                ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!-- rạp long biên -->
                                <li class="cinema-item">
                                    <div class="cinema-heading">
                                        <h4 class="title">4SCinema Long Biên<nav></nav></h4>
                                    </div>
                                    <div class="cinema-body">
                                        <p class="addr">Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội</p>
                                        <ul class="list-info">
                                            <li class="item-info">
                                                <div class="tt">Standard</div>
                                                <ul class="list-time">
                                                <?php 
                                                if (!empty($screening_times)) {
                                                    foreach ($screening_times as $time) {
                                                        echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                                    }
                                                } else {
                                                    echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                                }

                                                ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sec-ticket">
                <div class="ticket">
                    <div class="grid">
                        <div class="ticket-wr">
                            <div class="ticket-heading sec-heading">
                                <h2 class="heading">Chọn loại ghế</h2>
                            </div>
    
                            <div class="ticket-container relative">
                                <div class="combo-content">
                                    <div class="combo-list">
                                        <div class="combo-item col-4 ticket">
                                            <div class="food-box">
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="top-name">Người lớn</p>
                                                        <div class="top-desc">Đơn</div>
                                                        <div class="top-cost">70,000 VNĐ</div>
                                                    </div>

                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="combo-item col-4 ticket">
                                            <div class="food-box">
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="top-name">HSSV-Người Cao Tuổi</p>
                                                        <div class="top-desc">Đơn</div>
                                                        <div class="top-cost">45,000 VNĐ</div>
                                                    </div>

                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="combo-item col-4 ticket">
                                            <div class="food-box">
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="top-name">Người lớn</p>
                                                        <div class="top-desc">Đôi</div>
                                                        <div class="top-cost">145,000 VNĐ</div>
                                                    </div>

                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sec-seat">
                <div class="seat">
                    <div class="grid">
                        <div class="seat-wr">
                            <div class="seat-heading sec-heading">
                                <h2 class="heading">
                                    Chọn ghế 
                                </h2>
                            </div>

                            <div class="seat-indicator-scroll">
                                <div class="seat-block relative --sm">
                                    <div class="seat-screen">
                                        <img src="../../assets/img/screen.png" alt="Màn hình">
                                        <div class="txt">Màn hình</div>
                                    </div>
                                    <div class="seat-main">
                                        <div class="minimap-container">
                                            <div>
                                                <div class="seat-table">
                                                    <table class="seat-table-inner">
                                                        <tr>
                                                            <td class="seat-name-row">A</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">A14</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            

                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">B</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">B14</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">C</td>
                                        
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">C17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">D</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">D17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">E</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">E17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">F</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">F17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">G</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">G17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">H</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">H17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">J</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">J17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">K</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td ">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">K17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">L</td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L04</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L07</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L08</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L09</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L10</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L11</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L12</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L13</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L14</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L15</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L16</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-single.svg" alt="">
                                                                    <span class="seat-name">L17</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="seat-name-row">M</td>
                                                           
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M01</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M02</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M03</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M04</span>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M05</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M06</span>
                                                                </div>
                                                            </td>
                                                            <td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">M07</span>
                                                                </div>
                                                            </td>
                                                            
                                                        </tr> 
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <ul class="seat-note">
                                <li class="note-it">
                                    <div class="image">
                                        <img src="../../assets/img/seat-single.svg" alt="">
                                    </div>
                                    <span class="txt">Ghế Thường</span>
                                </li>
                                <li class="note-it">
                                    <div class="image" style="width: 40px">
                                        <img src="../../assets/img/seat-cupple.svg" alt="" >
                                    </div>
                                    <span class="txt">Ghế Đôi</span>
                                </li>
                                <li class="note-it">
                                    <div class="image">
                                        <img src="../../assets/img/seat-single.svg" alt="" class="seat-choosing">
                                    </div>
                                    <span class="txt">Ghế chọn</span>
                                </li>
                                <li class="note-it">
                                    <div class="image">
                                        <img src="../../assets/img/seat-dadat.svg" alt="" class="seat-disable">
                                    </div>
                                    <span class="txt">Ghế đã đặt</span>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </section>

            <section class="sec-dt-food">
                <div class="dt-food">
                    <div class="grid">
                        <div class="dt-food-heading sec-heading">
                            <h2 class="heading">Chọn bắp nước</h2>
                        </div>
                        <div class="dt-food-body">
                            <div class="dt-combo dt-item">
                                <div class="combo-title">
                                    <div class="title">COMBO</div>
                                </div>
                                <div class="combo-content">
                                    <div class="combo-list row">
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/combo-party.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Combo Party</p>
                                                        <div class="desc">
                                                            <p>2 Bắp Ngọt 60oz  + 4 Coke 22oz</p>
                                                        </div>
                                                        <div class="price sub-title">
                                                            <p>209,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/combo-solo.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Combo Solo</p>
                                                        <div class="desc">
                                                            <p>1 Bắp Ngọt 60oz  + 1 Coke 22oz</p>
                                                        </div>
                                                        <div class="price sub-title">
                                                            <p>94,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/combo-couple.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Combo Couple</p>
                                                        <div class="desc">
                                                            <p>1 Bắp Ngọt 60oz  + 2 Coke 22oz</p>
                                                        </div>
                                                        <div class="price sub-title">
                                                            <p>115,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dt-combo dt-item">
                                <div class="combo-title">
                                    <div class="title">NƯỚC ĐÓNG CHAI</div>
                                </div>
                                <div class="combo-content">
                                    <div class="combo-list row">
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/nuoccam.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Nước cam </p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>28,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/nuocloc.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Nước suối dasani</p>
                                                        <div class="desc">
                                                            <p>500/510ml</p>
                                                        </div>
                                                        <div class="price sub-title">
                                                            <p>20,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/nuoctraicay.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Nước trái cây</p>
                                                        <div class="desc">
                                                            <p>NUTRIBOOST</p>
                                                        </div>
                                                        <div class="price sub-title">
                                                            <p>28,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dt-combo dt-item">
                                <div class="combo-title">
                                    <div class="title">POCA</div>
                                </div>
                                <div class="combo-content">
                                    <div class="combo-list row">
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/khoaitay.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Khoai tây lay's stax 100g</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>59,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/poca.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Poca khoai tây 54g</p>
                                                       
                                                        <div class="price sub-title">
                                                            <p>28,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/poca2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Poca wavy 54g</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>28,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dt-combo dt-item">
                                <div class="combo-title">
                                    <div class="title">NƯỚC NGỌT</div>
                                </div>
                                <div class="combo-content">
                                    <div class="combo-list row">
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/fanta.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Fanta 320z</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>37,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/coke-zero.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Coca zero</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>37,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/coca.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Coca 320z</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>37,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/sprite.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Sprite 320z</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>37,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dt-combo dt-item">
                                <div class="combo-title">
                                    <div class="title">HOTDOG</div>
                                </div>
                                <div class="combo-content">
                                    <div class="combo-list row">
                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/combo-hotdog.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Combo hotdog</p>
                                                        <div class="desc">
                                                            <p>1 hotdog + 1 coca</p>
                                                        </div>
                                                        <div class="price sub-title">
                                                            <p>49,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="combo-item col-4 food">
                                            <div class="food-box">
                                                <div class="img">
                                                    <div class="image">
                                                        <img src="../../assets/img/hotdog.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-top">
                                                        <p class="name">Hotdog</p>
                                                        
                                                        <div class="price sub-title">
                                                            <p>35,000 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="content-botton">
                                                        <div class="count">
                                                            <div class="count-btn count-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                            <p class="count-number">0</p>
                                                            <div class="count-btn count-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- bill thanh toán -->
            <section class="sec-bill">
                <div class="grid">
                    <div class="bill-wr">
                        <div class="bill-left">
                            <?php 
                            $sql_2 = "SELECT title FROM movies WHERE movie_id  = '$movie_id'";
                            $result_2 = mysqli_query($conn, $sql_2);
                            while ($row_2 = mysqli_fetch_assoc($result_2)){
                                echo '<h4 class="name-combo"> ' . $row_2['title'] . '</h4>';

                            } 
                            ?>
                            <ul id="ticket-details" class="list">
                                <li class="item">
                                    <span class="txt"></span>
                                </li>
                                <li class="item">
                                    <span class="txt">Phòng chiếu:</span>
                                    <span class="txt" id="seat-name"></span>
                                    <span class="txt"> | <span id="showtime"></span></span>
                                </li>
                                <li class="item">
                                    <span class="txt"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="bill-right">
                            <div class="price">
                                <span class="txt">Tạm tính:</span>
                                <span class="total-price">0 VNĐ</span>
                            </div>
                            <button class="btn btn-ticket opacity-100">Thanh toán</button>
                        </div>
                    </div>
                </div>

            </section>
        </main>
        
        

        <!-- Khối footer         -->
        <footer class="footer">
            <div class="grid">

                <div class="footer-container">
                    <!-- Khối footer top -->
                    <div class="footer-top">
                        <!-- Khối footer nhỏ bên trái                     -->
                        <div class="footer-top-left">
                            <div class="footer-left-logo"><img class="footer__logo-img" src="../../assets/img/logo4S-footer.png" alt=""></div>
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
                                        <a class="footer-column-link" href="/login.html"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="/login.html"><li class="footer-column-menu">Đăng ký</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Membership</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/Special_Showtimes.php"><li class="footer-column-menu">Suất chiếu đặc biệt</li></a>
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
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_CauGiay.html"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_HaiBaTrung.html"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_LongBien.html"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_MyDinh.html"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_TayHo.html"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_TayHo.html"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
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
                    <a class="footer-bottom-right-items" href="/policy.php">Chính sách bảo mật</a>
                    <a class="footer-bottom-right-items" href="">Tin điện ảnh</a>
                    <a class="footer-bottom-right-items" href="">Hỏi và đáp</a>
                </div>
            </div>
        </div>
            </div>

    </footer>
        
    </div>
    <script src="../script.js"></script>
</body>

</html>