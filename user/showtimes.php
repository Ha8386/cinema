<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch chiếu</title>
    <link rel="icon" href="/assets/img/logo4S-onlyic.png" type="x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
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
                            <a href="/index.html" class="hd__logo-link">
                                <img src="./assets/img/logo4S.png" alt="4S CINEMA" class="hd__logo-img">
                            </a>
                        </li>
                        <li class="hd__nav-item hd__nav-item--local ">
                            Rạp phim
                            <div class="hd__local">
                                <a href="/cinemas/Showing_Movies/4SCinema_CauGiay.html" class="hd__local-link">
                                    4SCinema Cầu Giấy
                                </a>
                                <a href="/cinemas/Showing_Movies/4SCinema_HaiBaTrung.html" class="hd__local-link">
                                    4SCinema Hai Bà Trưng
                                </a>
                                <a href="/cinemas/Showing_Movies/4SCinema_LongBien.html" class="hd__local-link">
                                    4SCinema Long Biên
                                </a>
                                <a href="/cinemas/Showing_Movies/4SCinema_MyDinh.html" class="hd__local-link">
                                    4SCinema Mỹ Đình
                                </a>
                                <a href="/cinemas/Showing_Movies/4SCinema_TayHo.html" class="hd__local-link">
                                    4SCinema Tây Hồ
                                </a>
                                <a href="/cinemas/Showing_Movies/4SCinema_ThanhXuan.html" class="hd__local-link">
                                    4SCinema Thanh Xuân
                                </a>                           
                            </div>
                        </li>
                        <li class="hd__nav-item">
                            <a href="/showtimes.html" class="hd__nav-link">Lịch chiếu</a>
                        </li>
                        <li class="hd__nav-item">
                            <a href="/promotion.html" class="hd__nav-link">Ưu đãi</a>
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
                            <a href="./login.html" class="hd__login-link">
                                    
                                Đăng nhập
                            </a>
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
                                <label for="ngay">1. Ngày</label>
                                <i class="fa-solid fa-calendar"></i>
                            </div>
                            <select class="chon" name="day" id="ngay">
                                <option value="first">Hôm nay 10/09</option>
                                <option value="second">Thứ tư 11/09</option>
                                <option value="third">Thứ năm 12/09</option>
                                <option value="fourth">Thứ sáu 13/09</option>
                            </select>
                        </div>
            
                        <div class="select select-movie">
                            <div class="label">
                                <label for="phim">2. Phim</label>
                                <i class="fas fa-film"></i>
                            </div>
                            <select class="chon" name="movie" id="phim">
                                <option class="choose" value="Choose">Chọn phim</option>
                                <option value="1">Avengers: Hồi kết</option>
                                <option value="2">Những mảnh ghép cảm xúc 2</option>
                                <option value="3">Người nhện: Không còn nhà</option>
                                <option value="4">Xứ cát</option>
                                <option value="6">Kẻ cắp mặt trăng</option>
                                <option value="7">Ký sinh trùng</option>
                            </select>
                        </div>
            
                        <div class="select select-cinemas">
                            <div class="label">
                                <label for="rap">3. Rạp</label>
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <select class="chon" name="cinemas" id="rap">
                                <p>Chọn rạp</p>
                                <option class="choose" value="Choose">Chọn rạp</option>
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
                    <div class="movie-information-content movie-one">
                        <!-- menu cột -->
                         <!-- Phim thứ nhất -->
                        <div class="movie-information-column">
                            <div><img class="poster" src="https://th.bing.com/th/id/OIP.O5ar9IgC_70RgrtXxkn71AAAAA?rs=1&pid=ImgDetMain" alt=""></div>
                            <div class="poster-infor">
                                <p class="list-title">Avengers: Hồi kết</p>
                                <ul class="poster-infor-list">
                                    <div class="poster-label">
                                        <i class="fas fa-solid fa-tag"></i>
                                        <li class="list-content">Hành động, Phiêu lưu, Khoa học viễn tưởng</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-clock"></i>
                                        <li class="list-content">182 phút</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-solid fa-earth-americas"></i>
                                        <li class="list-content">Mỹ</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-closed-captioning"></i>
                                        <li class="list-content">EN</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-user"></i>
                                        <li class="list-content">Phim dành cho khán giả từ đủ 13 tuổi trở lên(13+)</li>
                                    </div>
                                </ul>
                            </div>
                        </div>
        
                        <!-- menu hàng -->
                        <div class="movie-information-row">
                            <!-- Hàng phim 1 -->
                            <div class="information-row first-row">
                                <div class="location-row first-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Long Biên</p>
                                    <p class="row-cinemas-address">Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội</p>
                                </div>
                                <div class="showtimes-row first-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">22:45</div>
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 2 -->
                            <div class="information-row second-row">
                                <div class="location-row second-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Tây Hồ</p>
                                    <p class="row-cinemas-address">Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội</p>
                                </div>
                                <div class="showtimes-row second-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 3 -->
                            <div class="information-row third-row">
                                <div class="location-row third-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Thanh Xuân</p>
                                    <p class="row-cinemas-address">Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội</p>
                                </div>
                                <div class="showtimes-row third-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 4 -->
                            <div class="information-row fourth-row">
                                <div class="location-row fourth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Mỹ Đình</p>
                                    <p class="row-cinemas-address">Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội</p>
                                </div>
                                <div class="showtimes-row fourth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:45</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 5 -->
                            <div class="information-row fifth-row">
                                <div class="location-row fifth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Hai Bà Trưng</p>
                                    <p class="row-cinemas-address">Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội</p>
                                </div>
                                <div class="showtimes-row fifth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 6 -->
                            <div class="information-row sixth-row">
                                <div class="location-row sixth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Cầu Giấy</p>
                                    <p class="row-cinemas-address">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</p>
                                </div>
                                <div class="showtimes-row sixth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                        <div class="showtimes-hour">01:45</div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                    <!-- *******************Hết******************* -->
        
                    
        
        
        
                    <!-- Phim thứ hai -->
                    <div class="movie-information-content movie-two">
                        <div class="movie-information-column">
                            <div class="poster"><img class="poster" src="https://ik.imagekit.io/9ifn2ouyo26/movies/inside-out-2/inside-out-2-poster.jpg" alt=""></div>
                            <div class="poster-infor">
                                <p class="list-title">Những mảnh ghép cảm xúc 2</p>
                                <ul class="poster-infor-list">
                                    <div class="poster-label">
                                        <i class="fas fa-solid fa-tag"></i>
                                        <li class="list-content">Hoạt hình, Hài hước, Gia đình, Phiêu lưu</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-clock"></i>
                                        <li class="list-content">98 phút</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-solid fa-earth-americas"></i>
                                        <li class="list-content">Mỹ</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-closed-captioning"></i>
                                        <li class="list-content">VN</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-user"></i>
                                        <li class="list-content">PG(Hướng dẫn của cha mẹ)</li>
                                    </div>
                                </ul>
                            </div>
                        </div>
        
                        <div class="movie-information-row">
                            <!-- Hàng phim 1 -->
                            <div class="information-row first-row">
                                <div class="location-row first-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Long Biên</p>
                                    <p class="row-cinemas-address">Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội</p>
                                </div>
                                <div class="showtimes-row first-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">22:45</div>
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 2 -->
                            <div class="information-row second-row">
                                <div class="location-row second-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Tây Hồ</p>
                                    <p class="row-cinemas-address">Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội</p>
                                </div>
                                <div class="showtimes-row second-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:45</div>
                                        <div class="showtimes-hour">00:15</div>
                                        <div class="showtimes-hour">00:30</div>
                                        <div class="showtimes-hour">00:45</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 3 -->
                            <div class="information-row third-row">
                                <div class="location-row third-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Thanh Xuân</p>
                                    <p class="row-cinemas-address">Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội</p>
                                </div>
                                <div class="showtimes-row third-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 4 -->
                            <div class="information-row fourth-row">
                                <div class="location-row fourth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Mỹ Đình</p>
                                    <p class="row-cinemas-address">Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội</p>
                                </div>
                                <div class="showtimes-row fourth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:45</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 5 -->
                            <div class="information-row fifth-row">
                                <div class="location-row fifth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Hai Bà Trưng</p>
                                    <p class="row-cinemas-address">Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội</p>
                                </div>
                                <div class="showtimes-row fifth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 6 -->
                            <div class="information-row sixth-row">
                                <div class="location-row sixth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Cầu Giấy</p>
                                    <p class="row-cinemas-address">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</p>
                                </div>
                                <div class="showtimes-row sixth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                        <div class="showtimes-hour">01:45</div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                    <!-- *******************Hết******************* -->
        
        
        
        
        
                    <!-- Phim thứ ba -->
                    <div class="movie-information-content movie-two">
                        <div class="movie-information-column">
                            <div class="poster"><img class="poster" src="https://dunenewsnet.com/wp-content/uploads/2021/08/Dune-Movie-Main-Poster.jpg" alt=""></div>
                            <div class="poster-infor">
                                <p class="list-title">Xứ cát</p>
                                <ul class="poster-infor-list">
                                    <div class="poster-label">
                                        <i class="fas fa-solid fa-tag"></i>
                                        <li class="list-content">Khoa học viễn tưởng, Hành động, Phiêu lưu</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-clock"></i>
                                        <li class="list-content">155 phút</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-solid fa-earth-americas"></i>
                                        <li class="list-content">Mỹ, Canada</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-closed-captioning"></i>
                                        <li class="list-content">VN</li>
                                    </div>
                                    <div class="poster-label">
                                        <i class="fas fa-regular fa-user"></i>
                                        <li class="list-content">PG(Hướng dẫn của cha mẹ)</li>
                                    </div>
                                </ul>
                            </div>
                        </div>
        
                        <div class="movie-information-row">
                            <!-- Hàng phim 1 -->
                            <div class="information-row first-row">
                                <div class="location-row first-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Long Biên</p>
                                    <p class="row-cinemas-address">Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội</p>
                                </div>
                                <div class="showtimes-row first-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">22:45</div>
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:15</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 2 -->
                            <div class="information-row second-row">
                                <div class="location-row second-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Tây Hồ</p>
                                    <p class="row-cinemas-address">Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội</p>
                                </div>
                                <div class="showtimes-row second-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">19:00</div>
                                        <div class="showtimes-hour">19:30</div>
                                        <div class="showtimes-hour">20:45</div>
                                        <div class="showtimes-hour">21:00</div>
                                        <div class="showtimes-hour">21:15</div>
                                        <div class="showtimes-hour">22:00</div>
                                        <div class="showtimes-hour">22:30</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 3 -->
                            <div class="information-row third-row">
                                <div class="location-row third-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Thanh Xuân</p>
                                    <p class="row-cinemas-address">Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội</p>
                                </div>
                                <div class="showtimes-row third-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                        <div class="showtimes-hour">00:45</div>
                                        <div class="showtimes-hour">01:25</div>
                                        <div class="showtimes-hour">01:45</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 4 -->
                            <div class="information-row fourth-row">
                                <div class="location-row fourth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Mỹ Đình</p>
                                    <p class="row-cinemas-address">Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội</p>
                                </div>
                                <div class="showtimes-row fourth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:45</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 5 -->
                            <div class="information-row fifth-row">
                                <div class="location-row fifth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Hai Bà Trưng</p>
                                    <p class="row-cinemas-address">Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội</p>
                                </div>
                                <div class="showtimes-row fifth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Hàng phim 6 -->
                            <div class="information-row sixth-row">
                                <div class="location-row sixth-row-text">
                                    <p class="row-cinemas">4SCinema</p>
                                    <p class="row-cinemas-district">Cầu Giấy</p>
                                    <p class="row-cinemas-address">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</p>
                                </div>
                                <div class="showtimes-row sixth-row-showtimes">
                                    <div class="showtimes-title">Standard</div>
                                    <div class="showtimes-box">
                                        <div class="showtimes-hour">23:30</div>
                                        <div class="showtimes-hour">23:59</div>
                                        <div class="showtimes-hour">00:30</div>
                                        <div class="showtimes-hour">01:45</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- *******************Hết******************* -->
        
        
        
                    <div class="btn-showtimes">
                        <button class="btn-more btn-show">Xem tất cả lịch chiếu</button>
                    </div>
                    
                    <!-- <div class="movie-rest-container">
                        <div class="movie-rest">
                            <div class="movie-rest-poster">
                                <img class="rest-poster-img" src="https://th.bing.com/th/id/R.5528290789787ff8d76be1a9f83ae667?rik=P6oBdZKE1sGO9w&riu=http%3a%2f%2fwww.allentheatresinc.com%2fmodules%2fmovies%2fcontent%2fuploads%2fdespicable_me_in_3d%2fdespicable_me_one_sheet2web.jpg&ehk=2tVtao9zoKCS6714w6BikaBJb0QQ3vNLVIvEuH%2bT6jo%3d&risl=&pid=ImgRaw&r=0" alt="">
                                <div class="rest-poster-infor">
                                    <p class="rest-poster-name">Despicalbe Me</p>  
                                    <div class="trailer-and-order-ticket">
                                        <div class="trailer-container">
                                            <a class="trailer-link" href="https://youtu.be/zzCZ1W_CUoI?si=4d980o1I5eqd8xH0">
                                                <i class="fa-regular fa-circle-play"></i>
                                            </a>
                                            <a class="trailer-link-text" href="https://youtu.be/zzCZ1W_CUoI?si=4d980o1I5eqd8xH0">Xem Trailer</a>
                                        </div>
                                        <button class="btn1 btn-ticket">Đặt vé</button>                             
                                    </div>  
                                </div>
                            </div>
                            <div class="movie-rest-poster">
                                <img class="rest-poster-img" src="https://th.bing.com/th/id/R.5cba974eae6503c89ce7fcade2304859?rik=C2OZYsdB6%2f1gzg&pid=ImgRaw&r=0" alt="">
                                <div class="rest-poster-infor">
                                    <p class="rest-poster-name">Spider-Man: No Way Home</p>
                                    <div class="trailer-and-order-ticket">
                                        <div class="trailer-container">
                                            <a class="trailer-link" href="https://youtu.be/JfVOs4VSpmA?si=agFkbcKQA2K1_XKK">
                                                <i class="fa-regular fa-circle-play"></i>
                                            </a>
                                            <a class="trailer-link-text" href="https://youtu.be/JfVOs4VSpmA?si=agFkbcKQA2K1_XKK">Xem Trailer</a>
                                        </div>
                                        <button class="btn1 btn-ticket">Đặt vé</button>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="movie-rest-poster">
                                <img class="rest-poster-img" src="https://m.media-amazon.com/images/I/91sustfojBL._AC_UF894,1000_QL80_.jpg" alt="">
                                <div class="rest-poster-infor">
                                    <p class="rest-poster-name">Parasite</p>
                                    <div class="trailer-and-order-ticket">                                
                                        <div class="trailer-container">
                                            <a class="trailer-link" href="https://youtu.be/o3ESQWArU2w?si=Pg1lTbeyzGT-61_N">
                                                <i class="fa-regular fa-circle-play"></i>
                                            </a>
                                            <a class="trailer-link-text" href="https://youtu.be/o3ESQWArU2w?si=Pg1lTbeyzGT-61_N">Xem Trailer</a>
                                        </div>
                                        <button class="btn1 btn-ticket">Đặt vé</button>
                                    </div>
                                </div>
                            </div>
                            <div class="movie-rest-poster">
                                <img class="rest-poster-img" src="https://fptninhbinh.vn/wp-content/uploads/2021/06/bo-gia-quoc-te-jpeg-3870-1619080221.jpg" alt="">
                                <div class="rest-poster-infor">
                                    <p class="rest-poster-name">Bố Già</p>
                                    <div class="trailer-and-order-ticket">
                                        <div class="trailer-container">
                                            <a class="trailer-link" href="https://youtu.be/jluSu8Rw6YE?si=tLkeKYvqKozXir-4">
                                                <i class="fa-regular fa-circle-play"></i>
                                            </a>
                                            <a class="trailer-link-text" href="https://youtu.be/jluSu8Rw6YE?si=tLkeKYvqKozXir-4">Xem Trailer</a>
                                        </div>
                                        <button class="btn1 btn-ticket">Đặt vé</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
        
        
                </div>
                  
                <section class="movie-slide">
                
                    <div class="swiper-container">
                        
                        <div class="movie-rest-container">
                            <div class="movie-rest">
                                <!-- movie 1 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie1.webp" alt="movie1">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Làm giàu với ma (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://youtu.be/zzCZ1W_CUoI?si=4d980o1I5eqd8xH0">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://youtu.be/zzCZ1W_CUoI?si=4d980o1I5eqd8xH0">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 2 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie2.webp" alt="movie2">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Không nói điều dữ (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=o2SnQCzoy8Q">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=o2SnQCzoy8Q">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>  
    
                                <!-- movie 3 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie3.webp" alt="movie3">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Tìm kiếm tài năng âm phủ (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=RkIWmEuETk0">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=RkIWmEuETk0">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                <!-- movie 4 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie4.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Anh trai vượt mọi tam tai (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=xWh0g4rKGjI">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=xWh0g4rKGjI">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>                            
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 5 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie5.webp" alt="movie5">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">The crow: báo thù (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=B_chCyJClAw">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=B_chCyJClAw">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 6 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie7.webp" alt="movie7">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Hai muối (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=MjxPoqCvvVs">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=MjxPoqCvvVs">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 7 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie6.webp" alt="movie6">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Báo thủ đi tìm chủ (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=MzJ8z_DDYYI">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=MzJ8z_DDYYI">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 8 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie8.webp" alt="movie8">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Longlegs: Thảm kịch dị giáo (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=ixsP1KPmiKA">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=ixsP1KPmiKA">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 9 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie9.webp" alt="movie9">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Beetlejuice: Ma siêu quậy (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=LJABoiuBl7Q">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=LJABoiuBl7Q">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 10 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie10.webp" alt="movie10">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Xuyên không cải mệnh gia tộc (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=zgTWmKM7E5w">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=zgTWmKM7E5w">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 11 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie11.webp" alt="movie11">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Chàng nữ phi công (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=4n60mgbiiz0">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=4n60mgbiiz0">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
                                <!-- movie 12 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="/assets/img/movie12.webp" alt="movie12">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Ma da (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=vC-KNlLNIso">
                                                   <img src="/assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=vC-KNlLNIso">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Đặt vé</button> 
                                            </a>
                                                                       
                                        </div>  
                                    </div>
                                </div>
    
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
                   
                 </section>
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
                            <div class="footer-left-logo"><img class="footer__logo-img" src="/assets/img/logo4S-footer.png" alt=""></div>
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
                                        <a class="footer-column-link" href="/cinemas/Showing_Movies/Showing_Movies.html"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="/cinemas/Upcoming_Movies/Upcoming_Movies.html"><li class="footer-column-menu">Phim sắp chiếu</li></a>
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
                                <a class="footer-column-link" href="/cinemas/Showing_Movies/4SCinema_CauGiay.html"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                <a class="footer-column-link" href="/cinemas/Showing_Movies/4SCinema_HaiBaTrung.html"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                <a class="footer-column-link" href="/cinemas/Showing_Movies/4SCinema_LongBien.html"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                <a class="footer-column-link" href="/cinemas/Showing_Movies/4SCinema_MyDinh.html"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                <a class="footer-column-link" href="/cinemas/Showing_Movies/4SCinema_TayHo.html"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                <a class="footer-column-link" href="/cinemas/Showing_Movies/4SCinema_TayHo.html"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
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
                    <a class="footer-bottom-right-items" href="/policy.html">Chính sách bảo mật</a>
                    <a class="footer-bottom-right-items" href="">Tin điện ảnh</a>
                    <a class="footer-bottom-right-items" href="">Hỏi và đáp</a>
                </div>
            </div>
        </div>
            </div>

    </footer>
        
    </div>
    <script src="./script.js"></script>
</body>
</html>