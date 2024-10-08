<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4SCinema - Hệ thống rạp chiếu phim hàng đầu Việt Nam</title>
    <link rel="icon" href="/assets/img/logo4S-onlyic.png" type="x-icon">
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
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100..700&display=swap" rel="stylesheet">

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
                            <div class="hd__search-wr">
                                <input type="text" class="hd__search-input" placeholder="Tìm phim, rạp">
                                <i class="hd__search-icon fa-solid fa-magnifying-glass"></i>
                            </div>
                        </li>
                        <li class="hd__login">
                            <i class="hd__login-icon fa-regular fa-circle-user"></i>
                            <a href="login.php" class="hd__login-link">
                                    
                                Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="app-main">
            <div class="grid">
                <!-- banner -->
                <section class="banner-web">
                    <div class="banner-container">
                        <div class="banner banner-sale">
                            <i class="switch-to-last fa-solid fa-angle-left"></i>
                            <a href="#" class="banner-link">
                                <img src="../assets/img/banner.png" alt="Banner">
                            </a>
                            <i class="switch-to-next fa-solid fa-angle-right"></i>
                        </div>
                        <div class="banner banner-movie">
                            <i class="switch-to-last fa-solid fa-angle-left"></i>
                            <a href="#" class="banner-link">
                                <img src="../assets/img/banner-phim.webp" alt="Banner">
                            </a>
                            <i class="switch-to-next fa-solid fa-angle-right"></i>
                        </div>

                    </div>

                </section>

                <!-- phim đang chiếu -->
                 <section class="movie-slide">
                    <div class="movie-slide-hd">
                        <h1>Phim đang chiếu</h1>
                    </div>

                    <div class="swiper-container">
                        
                        <div class="movie-rest-container">
                            <div class="movie-rest">
                                <!-- movie 1 -->
                                <div class="movie-rest-poster">
                                    <a href="/movie/movie1.html">
                                        <img class="rest-poster-img" src="../assets/img/movie1.webp" alt="movie1">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Làm giàu với ma (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://youtu.be/zzCZ1W_CUoI?si=4d980o1I5eqd8xH0">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie2.webp" alt="movie2">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Không nói điều dữ (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=o2SnQCzoy8Q">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie3.webp" alt="movie3">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Tìm kiếm tài năng âm phủ (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=RkIWmEuETk0">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie4.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Anh trai vượt mọi tam tai (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=xWh0g4rKGjI">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie5.webp" alt="movie5">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">The crow: báo thù (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=B_chCyJClAw">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie7.webp" alt="movie7">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Hai muối (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=MjxPoqCvvVs">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie6.webp" alt="movie6">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Báo thủ đi tìm chủ (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=MzJ8z_DDYYI">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie8.webp" alt="movie8">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Longlegs: Thảm kịch dị giáo (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=ixsP1KPmiKA">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie9.webp" alt="movie9">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Beetlejuice: Ma siêu quậy (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=LJABoiuBl7Q">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie10.webp" alt="movie10">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Xuyên không cải mệnh gia tộc (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=zgTWmKM7E5w">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie11.webp" alt="movie11">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Chàng nữ phi công (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=4n60mgbiiz0">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                                        <img class="rest-poster-img" src="../assets/img/movie12.webp" alt="movie12">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Ma da (T16) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=vC-KNlLNIso">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
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
                    <div class="btn-showtimes">
                        <a href=""> 
                            <button class="btn-more ">Xem thêm</button>
                        </a>
                    </div>
                    
                 </section>

                 <!-- phim sắp chiếu -->
                 <section class="movie-slide">
                    <div class="movie-slide-hd">
                        <h1>PHIM SẮP CHIẾU</h1>
                    </div>

                    <div class="swiper-container">
                        
                        <div class="movie-rest-container">
                            <div class="movie-rest">
                                <!-- movie 1 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie13.webp" alt="movie1">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Cám (T18) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=_8qUFEmPQbc">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=_8qUFEmPQbc">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>
                                        </div>  
                                    </div>
                                </div>

                                <!-- movie 2 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie14.webp" alt="movie2">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Look back: Liệu ta có dám nhìn lại (T13) </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=G95mJ72aY28">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=G95mJ72aY28">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>       
                                        </div>  
                                    </div>
                                </div>  

                                <!-- movie 3 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie15.webp" alt="movie3">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Transformer một  </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=B8fKghIzKhc">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=B8fKghIzKhc">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                           
                                        </div>  
                                    </div>
                                </div>
                                <!-- movie 4 -->
                                <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie16.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Đố anh còng được tôi  </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=JgUWVooKSrA">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=JgUWVooKSrA">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 5 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie17.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Minh hôn </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=Q5G06IEFFpY">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=Q5G06IEFFpY">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 6 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie18.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Nơi tình yêu kết thúc </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=mFFFhHLGqOc&t=18s">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=mFFFhHLGqOc&t=18s">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 7 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie19.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">nhất quỷ nhì ma, thứ ba takagi: trêu rồi yêu </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=2pzegkGLfJ0">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=2pzegkGLfJ0">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 8 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie20.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">Ngày xưa có một chuyện tình </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=Not4hIJxwpw&t=5s">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=Not4hIJxwpw&t=5s">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 9 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie21.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">JOKER: FOLIE À DEUX ĐIÊN CÓ ĐÔI </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=gxWLZoMT2MU">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=gxWLZoMT2MU">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 10 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie22.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">domino: lối thoát cuối cùng </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=UXXBy5n_22g">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=UXXBy5n_22g">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 11 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie23.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">robot hoang dã </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=NuYnY_P3npY">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=NuYnY_P3npY">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
                                            </a>                             
                                        </div>  
                                    </div>
                                </div>
                                 <!-- movie 12 -->
                                 <div class="movie-rest-poster">
                                    <a href="">
                                        <img class="rest-poster-img" src="../assets/img/movie24.webp" alt="movie4">
                                    </a>
                                    <div class="rest-poster-infor">
                                        <a href="" class="rest-poster-name">cô dâu hào môn </a>
                                        <div class="trailer-and-order-ticket">
                                            <div class="trailer-container">
                                                <a class="trailer-link" href="https://www.youtube.com/watch?v=xWh0g4rKGjI">
                                                   <img src="../assets/img/icon-play-vid.svg" alt="">
                                                </a>
                                                <a class="trailer-link-text" href="https://www.youtube.com/watch?v=xWh0g4rKGjI">Xem Trailer</a>
                                            </div>
                                            <a href="">
                                                <button class="btn btn-ticket">Tìm hiểu thêm</button>                             
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
                    <div class="btn-showtimes">
                        <a href=""> 
                            <button class="btn-more ">Xem thêm</button>
                        </a>
                    </div>
                    
                 </section> 

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
                                        <img src="../assets/img/promotion1.webp" alt="khuyến mãi 1">
                                    </a>
                                </div>
    
                                <div class="promotion-item">
                                    <a href="">
                                        <img src="../assets/img/promotion2.webp" alt="khuyến mãi 2">
                                    </a>
                                </div>
    
                                <div class="promotion-item">
                                    <a href="">
                                        <img src="../assets/img/promotion3.webp" alt="khuyến mãi 3">
                                    </a>                                
                                </div>
    
                                <div class="promotion-item">
                                    <a href="">
                                        <img src="../assets/img/promotion4.webp" alt="khuyến mãi 4">
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
            <div class="ht"></div>
        </div>
        

        
        
        
        
        
        
        
        
        <!-- Khối footer -->
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
                                        <a class="footer-column-link" href="login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="login.php"><li class="footer-column-menu">Đăng ký</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Membership</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
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