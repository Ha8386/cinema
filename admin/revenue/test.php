<?php 
include '../../user/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh thu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../css/mainadmin.css">
    <link rel="stylesheet" href="../movie_management/ad_movie.css">
    <link rel="stylesheet" href="/4scinema/assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>
<div class="sidebar">
        <h2>
            <a href="../admin.php">

                <i class="fas fa-user-circle"></i>
                Chức năng admin
            </a>
        </h2>
        <ul>
            <a href="../movie_management/ad_movie.php">
                <li>
                    <i class="fas fa-film"></i>
                    Quản lý phim
                </li>
            </a>
            
            <li class="active" onclick="toggleSubmenu(this)">
                <i class="fas fa-cube"></i>
                Quản lý rạp phim
                <i class="fas fa-chevron-right" style="position: absolute; right: 20px;"></i>
            </li>
            
         
           
            <a href="../showtime_management/showtime.php">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý lịch chiếu
                </li>
            </a>
            <a href="../screening_management/screening.php">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý suất chiếu
                </li>
            </a>
            <a href="../ticket_order/order.php">
                <li>
                    <i class="fas fa-ticket-alt"></i>
                    Quản lý đơn đặt vé
                </li>
            </a>
            <a href="../promotion/ad_promotion.php">
                <li>
                    <i class="fas fa-tags"></i>
                    Quản lý ưu đãi
                </li>
            </a>
            <a href="../customer/customer.php">
                <li>
                    <i class="fas fa-users"></i>
                    Quản lý khách hàng
                </li>
            </a>
            <a href="../employees/employees.php">
                <li>
                    <i class="fas fa-user-tie"></i>
                    Quản lý nhân viên
                </li>
            </a>
            <a href="../revenue/revenue.php">
                <li>
                    <i class="fas fa-chart-line"></i>
                    Quản lý doanh thu
                </li>
            </a>
            <a href="../../user/login.php">
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    Đăng xuất
                </li>
            </a>
        </ul>
    </div>
    

  
    


    <div class="header">
        <div class="menu-icon" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
            Home
        </div>
        <div class="user-info">
            <img src="/4scinema/assets/img/admin.jpg" alt="admin">
            <span>Nguyen Duc Ha</span>
        </div>
    </div>
    <div class="content">
        <div class="container">
        <?php
        $query = "
            SELECT 
                DATE_FORMAT(booking_date, '%Y-%m') AS month_year,
                SUM(ticket_quantity) AS total_tickets,
                SUM(total_price) AS total_revenue
            FROM 
                ticketbookings
            GROUP BY 
                month_year
            ORDER BY 
                month_year
        "; 
        $result = $conn->query($query);
        $count = 1;
        ?>
            <div class="revenue_title">Bảng thống kê doanh thu</div>
            <div class="revenue_select">
                <select name="revenue_as_movie" id="">
                    <?php
                    $sql_movie = 'SELECT id, movie_name FROM ticketbookings';
                    $result = $conn->query($sql_movie);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="">' .$row['movie_name'].'</option>';
                        }
                    }
                    ?>
                </select>
    
                <select name="revenue_as_time" id="">
                <?php
                    $sql_movie = 'SELECT id, booking_date FROM ticketbookings';
                    $result = $conn->query($sql_movie);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="">' .substr($row['booking_date'], 0, 10).'</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div id="myfirstchart" style="height: 250px">
                <?php
                $sql = 'SELECT * FROM ticketbookings';
                $result = $conn->query($sql);

                $data = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                }
                $conn->close();
                $data_json = json_encode($data);
                ?>
            </div>
            
        </div>
    </div>
           
     
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="../js/admin.js"></script>
</body>
</html>