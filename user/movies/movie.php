<?php
include '../db_connection.php'; 
session_start();
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
    <title>Đặt vé</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="icon" href="../../assets/img/logo4S-onlyic.png" type="x-icon">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100..700&display=swap" rel="stylesheet">
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
                            <?php if (isset($_SESSION['customer_name'])): ?>
                                    <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                                <?php else: ?>
                                    Đăng nhập
                                <?php endif; ?>
                            </a>
                        </li>
                        <div class="hd-login-item">
                        <a class="hd__local-link" href="../account/profile.php">Cập nhật thông tin</>
                                <a class="hd__local-link" href="../account/history.php">Lịch sử đặt vé</a>
                                <a class="hd__local-link" href="../logout.php">Đăng xuất</a>
                            </div>
                    </ul>
                </div>
            </div>
        </header>

        <main class="app-content">
        <form id="payment-form" action="../banking/payment.php" method="POST">
            
            <input type="hidden" name="show_date" value="" id="show-date">
            <input type="hidden" name="screening_time" value="" id="screening-time">
            <input type="hidden" name="seat_numbers" value="" id="seat-numbers">
            <input type="hidden" name="ticket_types" value="" id="ticket-types">
            <input type="hidden" name="ticket_quantity" value="" id="ticket-quantity">
            <input type="hidden" name="total_amount" value="" id="total-amount">
            <input type="hidden" name="food_names" value="" id="food-names">
        
            <section class="detail ">
                <div class="grid">
                    
                    <div class="detail-wr">
                   
                        <div class="detail-row row">
                        
                            <?php   
                            $sql  = "SELECT * FROM movies WHERE movie_id = $movie_id";
                            $result = $conn ->query($sql);
                            if(  $result ->num_rows > 0 ){
                                while( $row = $result -> fetch_assoc() ){
                                    echo '<input type="hidden" name="movie_name" value="' . htmlspecialchars($row['title']) . '" id="movie-name">';
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
                                               
                                                echo '<h1 class="heading" style="line-height: 65px; word-wrap: break-word; margin: 0">'.htmlspecialchars($row['title']).' </h1>';
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
                                    }else {
                                        echo '<p style="font-size:32px; color:#F3EA28;" >Hiện chưa có lịch chiếu</p>';
                                        echo '<script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    // Ẩn các phần tử có class cần ẩn
                                                    const elementsToHide = document.querySelectorAll(".shtime-heading, .shtime-body, .shtime-ft, .sec-ticket, .sec-seat, .sec-dt-food, .sec-bill");
                                                    elementsToHide.forEach(function(element) {
                                                        element.style.display = "none";
                                                    });
                                                });
                                            </script>';

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
                                <?php
                                $cinemas = [
                                        ['name' => '4SCinema Mỹ Đình', 'address' => 'Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội'],
                                        ['name' => '4SCinema Tây Hồ', 'address' => 'Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội'],
                                        ['name' => '4SCinema Thanh Xuân', 'address' => 'Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội'],
                                        ['name' => '4SCinema Hai Bà Trưng', 'address' => 'Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội'],
                                        ['name' => '4SCinema Cầu Giấy', 'address' => 'Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội'],
                                        ['name' => '4SCinema Long Biên', 'address' => 'Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội']
                                    ];

                                    foreach ($cinemas as $cinema) {
                                        echo '<li class="cinema-item">';
                                        echo '    <div class="cinema-heading">';
                                        echo '        <h4 class="title">' . htmlspecialchars($cinema['name']) . '</h4>';
                                        echo '    </div>';
                                        echo '    <div class="cinema-body">';
                                        echo '        <p class="addr">' . htmlspecialchars($cinema['address']) . '</p>';
                                        echo '        <ul class="list-info">';
                                        echo '            <li class="item-info">';
                                        echo '                <div class="tt">Standard</div>';
                                        echo '                <ul class="list-time">';
                                        if (!empty($screening_times)) {
                                            foreach ($screening_times as $time) {
                                                echo '<li class="item-time">' . htmlspecialchars($time) . '</li>';
                                            }
                                        } else {
                                            echo '<li class="item-time">Không có lịch chiếu nào.</li>';
                                        }
                                        echo '                </ul>';
                                        echo '            </li>';
                                        echo '        </ul>';
                                        echo '    </div>';
                                        echo '</li>';
                                    }
                                    ?>
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
                                                    <?php
                                                    // Các hàng ghế
                                                    $rows = ['A', 'B'];
                                                    // Số lượng ghế mỗi hàng
                                                    $total_seats = 14;

                                                    // Duyệt qua từng hàng
                                                    foreach ($rows as $row) {
                                                        echo '<tr>';
                                                        // In tên hàng ghế (A, B, ...)
                                                        echo '<td class="seat-name-row">' . $row . '</td>';

                                                        // Các ghế trống trước ghế bắt đầu
                                                        for ($i = 0; $i < 5; $i++) {
                                                            echo '<td></td>';
                                                        }

                                                        // In ghế
                                                        for ($seat = 1; $seat <= $total_seats; $seat++) {
                                                            // Tạo tên ghế, ví dụ: A01, B02, ...
                                                            $seat_name = $row . str_pad($seat, 2, '0', STR_PAD_LEFT);
                                                            echo '<td class="seat-td">
                                                                    <div class="seat-wr seat-single">
                                                                        <img src="../../assets/img/seat-single.svg" alt="">
                                                                        <span class="seat-name">' . $seat_name . '</span>
                                                                    </div>
                                                                </td>';
                                                        }

                                                        // Các ghế trống sau ghế cuối
                                                        echo '<td></td><td></td>';

                                                        echo '</tr>';
                                                    }
                                                    // Duyệt các hàng ghế C, D, E, F, G, H, J, K, L
                                                    $rows_17 = ['C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L'];
                                                    $total_seats_17 = 17;

                                                    foreach ($rows_17 as $row) {
                                                        echo '<tr>';
                                                        echo '<td class="seat-name-row">' . $row . '</td>';

                                                        // Các ghế trống trước ghế bắt đầu
                                                        for ($i = 0; $i < 2; $i++) {
                                                            echo '<td></td>';
                                                        }

                                                        // In ghế
                                                        for ($seat = 1; $seat <= $total_seats_17; $seat++) {
                                                            $seat_name = $row . str_pad($seat, 2, '0', STR_PAD_LEFT);
                                                            echo '<td class="seat-td">
                                                                    <div class="seat-wr seat-single">
                                                                        <img src="../../assets/img/seat-single.svg" alt="">
                                                                        <span class="seat-name">' . $seat_name . '</span>
                                                                    </div>
                                                                </td>';
                                                        }

                                                        // Các ghế trống sau ghế cuối
                                                        echo '<td></td><td></td>';
                                                        echo '</tr>';
                                                    }
                                                    // Hàng ghế đôi M
                                                    echo '<tr>';
                                                    echo '<td class="seat-name-row">M</td>';

                                                    // In ghế đôi
                                                    for ($seat = 1; $seat <= 10; $seat++) {
                                                        $seat_name = 'M' . str_pad($seat, 2, '0', STR_PAD_LEFT);
                                                        echo '<td class="seat-td seat-cupple">
                                                                <div class="seat-wr seat-single">
                                                                    <img src="../../assets/img/seat-cupple.svg" alt="">
                                                                    <span class="seat-name">' . $seat_name . '</span>
                                                                </div>
                                                            </td>';
                                                    }
                                    
                                                    // Các ô trống
                                                    
                                                    
                                                    echo '</tr>';
                                                    ?>
                                                        
                                                        
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
                                <!-- <li class="item">
                                    <span class="txt">Phòng chiếu:</span>
                                    <span class="txt" id="seat-name"></span>
                                    <span class="txt"> | <span id="showtime"></span></span>
                                </li> -->
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
                            <button class="btn btn-ticket opacity-100" type="submit" id="pay-button">Thanh toán</button>
                        </div>
                    </div>
                </div>

            </section>
            </form>
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
                                        <a class="footer-column-link" href="../login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="../login.php"><li class="footer-column-menu">Đăng ký</li></a>
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
                                <div class="footer-menu-column footer-column-cinemas-system">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Hệ thống rạp</p>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_CauGiay.php"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_HaiBaTrung.php"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_LongBien.php"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_MyDinh.php"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
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
                            <a class="footer-bottom-right-items" href="../policy.php">Chính sách bảo mật</a>
                        </div>
                    </div>
                </div>
            </div>

    </footer>
        
    </div>
    <script src="../script.js"></script>
</body>

</html>