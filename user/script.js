// đăng kí đăng nhập
document.addEventListener('DOMContentLoaded', () => {
    const login = document.querySelector('.login');
    const loginLink = document.querySelector('.switch-to-login');
    const registerLink = document.querySelector('.switch-to-register');

    // Kiểm tra sự tồn tại của phần tử
    if (login) {
        if (registerLink) {
            registerLink.addEventListener('click', () => {
                login.classList.add('active');
            });
        } else {
            console.warn('.switch-to-register element not found');
        }

        if (loginLink) {
            loginLink.addEventListener('click', () => {
                login.classList.remove('active');
            });
        } else {
            console.warn('.switch-to-login element not found');
        }
    } else {
        console.warn('.login element not found');
    }
});
//banner
document.addEventListener('DOMContentLoaded', () => {
    const banners = document.querySelectorAll('.banner');
    const nextBtn = document.querySelectorAll('.switch-to-next');
    const prevBtn = document.querySelectorAll('.switch-to-last');

    let currentIndex = 0;

    function goToBanner(text) {
        const currentBanner = banners[currentIndex];
        let newIndex;
        if(text === 'next') {
            newIndex = (currentIndex + 1) % banners.length;
        }else if(text === 'prev') {
            newIndex = currentIndex - 1;
            if(newIndex < 0){
                newIndex = banners.length-1;
            }
        }
        const newBanner = banners[newIndex];

        currentBanner.style.transform = text === 'next' ? 'translateX(-100%)' : 'translateX(100%)';
        currentBanner.style.opacity = '0';

        newBanner.style.transform = 'translateX(0)';
        newBanner.style.opacity = '1';

        currentIndex = newIndex;
    }

    // Gán sự kiện cho các nút "next"
    nextBtn.forEach(e => {
        e.addEventListener('click',() => goToBanner('next'));
    });

    // Gán sự kiện cho các nút "prev"
    prevBtn.forEach(e => {
        e.addEventListener('click',() => goToBanner('prev'));
    });
});

// chuyển trang ở movie
document.querySelectorAll('.movie-slide').forEach((slide, slideIndex) => {
    let currentIndex = 0;
    const moviesPerSlide = 4;
    const movieRest = slide.querySelector('.movie-rest');
    const totalMovies = movieRest.querySelectorAll('.movie-rest-poster').length;
    const moviePosterWidth = movieRest.querySelector('.movie-rest-poster').offsetWidth;
    const gap = 20; 
    const bullets = slide.querySelectorAll('.movie-change-bullet .movie-bullet');

    function updateBullets() {
        // Xóa lớp active khỏi tất cả các bullet
        bullets.forEach(bullet => bullet.classList.remove('movie-bullet-active'));
        // Thêm lớp active vào bullet hiện tại
        // math.floor để làm tròn số 
        const activeBulletIndex = Math.floor(currentIndex / moviesPerSlide);
        if (bullets[activeBulletIndex]) {
            bullets[activeBulletIndex].classList.add('movie-bullet-active');
        }
    }
    // bấm nút bullet
    function goToSlide(index) {
        // Tính toán vị trí cần chuyển
        currentIndex = index * moviesPerSlide;
        const translateValue = (moviePosterWidth + gap) * currentIndex;
        movieRest.style.transform = `translateX(-${translateValue}px)`;
        updateBullets();
    }

    slide.querySelector('.arrow-btn-next').addEventListener('click', function() {
        if (currentIndex < totalMovies - moviesPerSlide) {
            currentIndex += moviesPerSlide;
        } else {
            currentIndex = 0;
        }
        const translateValue = (moviePosterWidth + gap) * currentIndex;
        movieRest.style.transform = `translateX(-${translateValue}px)`;
        updateBullets();
    });

    slide.querySelector('.arrow-btn-prev').addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex -= moviesPerSlide;
            const translateValue = (moviePosterWidth + gap) * currentIndex;
            movieRest.style.transform = `translateX(-${translateValue}px)`;
            updateBullets();
        }
    });

    bullets.forEach((bullet, index) => {
        bullet.addEventListener('click', () => {
            goToSlide(index);
        });
    });
});

// chuyển trang khuyến mãi
document.querySelectorAll('.promotion').forEach((pro) => {
    let currentIndex = 0;
    const itemsPerPage = 3; // Số lượng item hiển thị trên một trang
    const promotionList = pro.querySelector('.promotion-list');
    const totalPromotion = promotionList.querySelectorAll('.promotion-item').length;
    const promotionWidth = promotionList.querySelector('.promotion-item').offsetWidth;
    const gap = 37; // Khoảng cách giữa các item
    const bullets = pro.querySelectorAll('.movie-change-bullet .movie-bullet');

    function updateBullets() {
        // Xóa lớp active khỏi tất cả các bullet
        bullets.forEach(bullet => bullet.classList.remove('movie-bullet-active'));
        // Thêm lớp active vào bullet hiện tại
        const activeBulletIndex = currentIndex;
        if (bullets[activeBulletIndex]) {
            bullets[activeBulletIndex].classList.add('movie-bullet-active');
        }
    }

    function goToSlide(index) {
        // Tính toán vị trí cần chuyển
        currentIndex = index;
        const translateValue = (promotionWidth + gap) * currentIndex;
        promotionList.style.transform = `translateX(-${translateValue}px)`;
        updateBullets(); // Cập nhật trạng thái của bullets sau khi di chuyển slide
    }

    pro.querySelector('.arrow-btn-next').addEventListener('click', function() {
        if (currentIndex < Math.ceil(totalPromotion / itemsPerPage) - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        goToSlide(currentIndex); // Gọi goToSlide để cập nhật slide và bullets
    });

    pro.querySelector('.arrow-btn-prev').addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = Math.ceil(totalPromotion / itemsPerPage) - 1;
        }
        goToSlide(currentIndex); // Gọi goToSlide để cập nhật slide và bullets
    });

    bullets.forEach((bullet, index) => {
        bullet.addEventListener('click', () => {
            // Tính toán slide index từ bullet index
            const slideIndex = index ;
            goToSlide(slideIndex); // Gọi goToSlide để cập nhật slide và bullets
        });
       
    });
    updateBullets(); 
});



function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

// Hàm hiển thị modal
function showModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
    }
}

// Đóng modal khi nhấn ra ngoài modal
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            closeModal(modal.id);
        }
    });
}

// lấy url showtime_id
document.querySelectorAll('.box-time').forEach(function(box) {
    box.addEventListener('click', function() {
        document.querySelectorAll('.box-time').forEach(function(b) {
            b.classList.remove('active');
        });

        // Thêm class 'active' vào box-time hiện tại
        this.classList.add('active');
        const showtimeId = this.getAttribute('data-showtime-id');

        sessionStorage.setItem('selected_showtime_id', showtimeId);
        // Lấy URL hiện tại
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        
        // Thêm hoặc cập nhật showtime_id
        searchParams.set('showtime_id', showtimeId);
        currentUrl.search = searchParams.toString();
        
        // Thay đổi URL mà không làm mới trang
        history.pushState(null, '', currentUrl);
        
        // Tải lại trang để hiển thị dữ liệu mới
        window.location.reload();
    });
});
window.addEventListener('DOMContentLoaded', function() {
    const selectedShowtimeId = sessionStorage.getItem('selected_showtime_id');

    if (selectedShowtimeId) {
        // Thêm class 'active' cho box-time tương ứng
        document.querySelectorAll('.box-time').forEach(function(box) {
            if (box.getAttribute('data-showtime-id') === selectedShowtimeId) {
                box.classList.add('active');
            }
        });
    }
});


const ticketDetails = {};
let selectedShowtime = ""; // Biến lưu trữ suất chiếu đã chọn
let selectedSeat = ""; // Biến lưu trữ ghế đã chọn

// Sự kiện chọn suất chiếu
document.querySelectorAll('.item-time').forEach(function(item) {
    item.addEventListener('click', function() {
        // Xóa class 'active' từ tất cả item-time
        document.querySelectorAll('.item-time').forEach(function(i) {
            i.classList.remove('active');
        });

        // Thêm class 'active' cho item-time hiện tại
        this.classList.add('active');

        // Ẩn tất cả cinema-item
        document.querySelectorAll('.cinema-item').forEach(function(cinema) {
            cinema.style.display = 'none';
        });

        // Hiển thị cinema-item của item-time được chọn
        const selectedCinemaItem = this.closest('.cinema-item');
        if (selectedCinemaItem) {
            selectedCinemaItem.style.display = 'block';
        }
        
        // Cập nhật suất chiếu đã chọn
        selectedShowtime = this.textContent; 
        updateTicketDetails(); // Cập nhật thông tin vé
    });
});

// Sự kiện cho tất cả nút tăng giảm của vé
document.querySelectorAll('.combo-item.ticket').forEach(function(ticket) {
    ticket.querySelectorAll('.count-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const countNumberElement = this.parentElement.querySelector('.count-number');
            let countNumber = parseInt(countNumberElement.textContent);
            const topNameElement = ticket.querySelector('.top-name');

            const ticketKey = `${topNameElement.textContent} - ${ticket.querySelector('.top-desc').textContent}`;

            if (this.classList.contains('count-plus')) {
                countNumber++;
            } else if (this.classList.contains('count-minus')) {
                countNumber = Math.max(0, countNumber - 1);
            }

            countNumberElement.textContent = countNumber;
            ticketDetails[ticketKey] = countNumber; 
            updateTicketDetails(); // Cập nhật thông tin vé
        });
    });
});

// Sự kiện cho tất cả nút tăng giảm của combo (food)
document.querySelectorAll('.combo-item.food').forEach(function(food) {
    food.querySelectorAll('.count-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const countNumberElement = this.parentElement.querySelector('.count-number');
            let countNumber = parseInt(countNumberElement.textContent);
            const topNameElement = food.querySelector('.name');

            const comboKey = topNameElement.textContent;

            if (this.classList.contains('count-plus')) {
                countNumber++;
            } else if (this.classList.contains('count-minus')) {
                countNumber = Math.max(0, countNumber - 1);
            }

            countNumberElement.textContent = countNumber;
            ticketDetails[comboKey] = countNumber; 
            updateTicketDetails(); // Cập nhật thông tin vé
        });
    });
});

// Hàm cập nhật thông tin vé
function updateTicketDetails() {
    const ticketDetailsElement = document.getElementById('ticket-details');
    
    // Xóa nội dung hiện tại của ticketDetailsElement
    ticketDetailsElement.innerHTML = ''; 

    // Hiển thị vé đã chọn
    for (const [key, count] of Object.entries(ticketDetails)) {
        if (count > 0) {
            const newItem = document.createElement('li');
            newItem.classList.add('item');
            newItem.innerHTML = `<span class="txt">${key} (${count})</span>`;
            ticketDetailsElement.appendChild(newItem);
        }
    }

    // Hiển thị suất chiếu và ghế ngồi
    if (selectedSeat && selectedShowtime) {
        const showtimeItem = document.createElement('li');
        showtimeItem.classList.add('item');
        showtimeItem.innerHTML = `<span class="txt">Phòng chiếu: ${selectedSeat} | ${selectedShowtime}</span>`;
        ticketDetailsElement.appendChild(showtimeItem);
    }

    updateTotalPrice();
}

// Hàm cập nhật giá tiền
function updateTotalPrice() {
    let totalPrice = 0;

    // Tính tổng tiền cho vé
    for (const [key, count] of Object.entries(ticketDetails)) {
        if (count > 0) {
            let pricePerTicket = 0;

            if (key.includes('Người lớn')) {
                if (key.includes('Đơn')) {
                    pricePerTicket = 70000; // Giá vé Người lớn - Đơn
                } else if (key.includes('Đôi')) {
                    pricePerTicket = 145000; // Giá vé Người lớn - Đôi
                }
            } else if (key.includes('HSSV')) {
                pricePerTicket = 45000; // Giá vé HSSV
            } else {
                // Tìm giá cho combo từ DOM
                const comboElements = document.querySelectorAll('.combo-item.food');
                comboElements.forEach(function(combo) {
                    const nameElement = combo.querySelector('.name').textContent;
                    const priceElement = combo.querySelector('.price.sub-title p').textContent;
                    const priceValue = parseInt(priceElement.replace(/\D/g, '')); // Chuyển đổi giá thành số

                    if (key === nameElement) {
                        pricePerTicket = priceValue; // Gán giá cho combo
                    }
                });
            }

            totalPrice += pricePerTicket * count;
        }
    }

    const totalElement = document.querySelector('.total-price');
    if (totalElement) {
        totalElement.textContent = totalPrice + ' VNĐ'; // Hiển thị tổng tiền
    }
}


// Sự kiện chọn ghế
document.addEventListener('DOMContentLoaded', function() {
    // Đoạn mã của bạn ở đây
    document.querySelectorAll('.seat-td').forEach(function(seat) {
        seat.addEventListener('click', function() {
            // Xóa class 'choosing' khỏi tất cả các seat-td
            document.querySelectorAll('.seat-td').forEach(function(s) {
                s.classList.remove('choosing');
            });

            // Thêm class 'choosing' vào seat-td được chọn
            this.classList.add('choosing');
            selectedSeat = this.querySelector('.seat-name').textContent; // Lưu ghế đã chọn
            
            const seatNameElement = document.getElementById('seat-name');
            if (seatNameElement) {
                seatNameElement.textContent = selectedSeat; // Cập nhật tên ghế
            }

            // Cập nhật thông tin vé bao gồm suất chiếu và ghế
            updateTicketDetails();
        });
    });
});






    
// Cập nhật ngày theo thời gian thực cho khối chọn ngày trong showtimes.php
// Hàm cập nhật ngày theo thời gian thực cho khối chọn ngày trong showtimes.php
function updateDateOptions() {
    const select = document.getElementById("date-select");
    select.innerHTML = ""; // Xóa tất cả tùy chọn hiện có

    const today = new Date();
    const optionsCount = 5; // Số lượng tùy chọn
    const dayNames = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];

    for (let i = 0; i < optionsCount; i++) {
        const optionDate = new Date(today);
        optionDate.setDate(today.getDate() + i); // Cộng thêm số ngày tương ứng

        const dayName = dayNames[optionDate.getDay()]; // Lấy tên ngày
        const day = optionDate.getDate(); // Lấy số ngày
        const month = optionDate.getMonth() + 1; // Lấy số tháng (bắt đầu từ 0)
        const year = optionDate.getFullYear(); // Lấy năm

        // Đảm bảo tháng và ngày luôn có 2 chữ số
        const formattedDay = day < 10 ? '0' + day : day;
        const formattedMonth = month < 10 ? '0' + month : month;

        const optionText = `${dayName}, ${formattedDay}/${formattedMonth}`; // Văn bản hiển thị
        const optionValue = `${year}/${formattedMonth}/${formattedDay}`; // Giá trị tùy chọn định dạng YYYY/MM/DD

        const option = document.createElement("option");
        option.value = optionValue; // Giá trị tùy chọn
        option.textContent = optionText; // Văn bản hiển thị

        select.appendChild(option); // Thêm tùy chọn vào select
    }
}

// Gọi hàm để cập nhật tùy chọn khi DOM đã được tải
document.addEventListener("DOMContentLoaded", function() {
    updateDateOptions(); // Gọi hàm để cập nhật tùy chọn
});

// Lắng nghe sự kiện khi chọn ngày
document.getElementById("date-select").addEventListener("change", function () {
    const selectedDate = this.value;

    // Gửi yêu cầu AJAX
    fetch("getMoviesByDate.php?date=" + selectedDate)
        .then(response => response.json())
        .then(data => {
            // Xóa các nội dung phim và suất chiếu hiện tại
            document.querySelector(".movie-information-container").innerHTML = "";

            // Cập nhật dropdown tên phim
            const phimSelect = document.getElementById('phim');
            phimSelect.innerHTML = '<option value="">Chọn phim</option>'; // Reset dropdown
            console.log(data);
            // Lặp qua danh sách phim và suất chiếu để hiển thị
            Object.values(data).forEach(movie => {
                const movieDiv = document.createElement("div");
                movieDiv.classList.add("movie-information-content");
                movieDiv.setAttribute("data-movie-id", movie.movie_id); // Thêm ID cho phép xác định phim

                // Thêm nội dung phim (title, genre, v.v.)
                movieDiv.innerHTML = `
                    <div class="movie-information-column">
                        <a src="movies/movie.php">
                            <img class="poster" src="../assets/img/${movie.image_url}" alt="Movie Poster">
                        </a>
                        <div class="poster-infor">
                            <p class="list-title">${movie.title}</p>
                            <ul class="poster-infor-list">
                                <div class="poster-label">
                                    <i class="fas fa-solid fa-tag"></i>
                                    <li class="list-content">${movie.genre}</li>
                                </div>
                                <div class="poster-label">
                                    <i class="fas fa-regular fa-clock"></i>
                                    <li class="list-content">${movie.duration}</li>
                                </div>
                                <div class="poster-label">
                                    <i class="fas fa-solid fa-earth-americas"></i>
                                    <li class="list-content">${movie.country}</li>
                                </div>
                                <div class="poster-label">
                                    <i class="fas fa-regular fa-closed-captioning"></i>
                                    <li class="list-content">${movie.vietsub}</li>
                                </div>
                                <div class="poster-label">
                                    <i class="fas fa-regular fa-user"></i>
                                    <li class="list-content">Phim dành cho khán giả từ ${movie.age_rating} trở lên</li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="movie-information-row">
                        <div class="information-row">
                            <div class="location-row">
                                <p class="row-cinemas">4SCinema</p>
                                <p class="row-cinemas-district">Cầu Giấy</p>
                                <p class="row-cinemas-address">Số 321, Đường Trần Duy Hưng, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội</p>
                            </div>
                            <div class="showtimes-row">
                                <div class="showtimes-title">Standard</div>
                                <div class="showtimes-box">
                                    ${movie.showtimes.map(time => `<div class="showtimes-hour">${time.substring(0, 5)}</div>`).join('')}
                                </div> 
                            </div> 
                        </div>

                        <div class="information-row">
                            <div class="location-row">
                                <p class="row-cinemas">4SCinema</p>
                                <p class="row-cinemas-district">Hai Bà Trưng</p>
                                <p class="row-cinemas-address">Số 789, Đường Lạc Trung, Phường Vĩnh Tuy, Quận Hai Bà Trưng, Hà Nội</p>
                            </div>
                            <div class="showtimes-row">
                                <div class="showtimes-title">Standard</div>
                                <div class="showtimes-box">
                                    ${movie.showtimes.map(time => `<div class="showtimes-hour">${time.substring(0, 5)}</div>`).join('')}
                                </div> 
                            </div> 
                        </div>

                        <div class="information-row">
                            <div class="location-row">
                                <p class="row-cinemas">4SCinema</p>
                                <p class="row-cinemas-district">Long Biên</p>
                                <p class="row-cinemas-address">Số 123, Đường Hoa Mai, Phường Phúc Lợi, Quận Long Biên, Hà Nội</p>
                            </div>
                            <div class="showtimes-row">
                                <div class="showtimes-title">Standard</div>
                                <div class="showtimes-box">
                                    ${movie.showtimes.map(time => `<div class="showtimes-hour">${time.substring(0, 5)}</div>`).join('')}
                                </div> 
                            </div> 
                        </div>

                        <div class="information-row">
                            <div class="location-row">
                                <p class="row-cinemas">4SCinema</p>
                                <p class="row-cinemas-district">Mỹ Đình</p>
                                <p class="row-cinemas-address">Số 123, Đường Hòa Bình, Khu đô thị Mỹ Đình 1, Nam Từ Liêm, Hà Nội</p>
                            </div>
                            <div class="showtimes-row">
                                <div class="showtimes-title">Standard</div>
                                <div class="showtimes-box">
                                    ${movie.showtimes.map(time => `<div class="showtimes-hour">${time.substring(0, 5)}</div>`).join('')}
                                </div> 
                            </div> 
                        </div>

                        <div class="information-row">
                            <div class="location-row">
                                <p class="row-cinemas">4SCinema</p>
                                <p class="row-cinemas-district">Tây Hồ</p>
                                <p class="row-cinemas-address">Số 45, Đường Hoa Sen, Phường Nhật Tân, Quận Tây Hồ, Hà Nội</p>
                            </div>
                            <div class="showtimes-row">
                                <div class="showtimes-title">Standard</div>
                                <div class="showtimes-box">
                                    ${movie.showtimes.map(time => `<div class="showtimes-hour">${time.substring(0, 5)}</div>`).join('')}
                                </div> 
                            </div> 
                        </div>

                        <div class="information-row sixth-row">
                            <div class="location-row">
                                <p class="row-cinemas">4SCinema</p>
                                <p class="row-cinemas-district">Thanh Xuân</p>
                                <p class="row-cinemas-address">Số 456, Đường Hoa Phượng, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội</p>
                            </div>
                            <div class="showtimes-row">
                                <div class="showtimes-title">Standard</div>
                                <div class="showtimes-box">
                                    ${movie.showtimes.map(time => `<div class="showtimes-hour">${time.substring(0, 5)}</div>`).join('')}
                                </div> 
                            </div> 
                        </div>
                    </div>
                `;

                // Thêm thông tin phim vào container
                document.querySelector(".movie-information-container").appendChild(movieDiv);

                // Cập nhật dropdown cho tên phim
                console.log('Đối tượng phim:', movie); // In ra toàn bộ đối tượng phim
                const option = document.createElement("option");
                option.value = movie.movie_id; // ID phim
                option.textContent = movie.title; // Tên phim
                phimSelect.appendChild(option); // Thêm option vào dropdown

                console.log('ID phim được thêm vào dropdown:', movie.movie_id);
            });
        })
        .catch(error => console.error("Lỗi khi lấy dữ liệu phim:", error));
        
});

// Lắng nghe sự kiện khi chọn phim
document.getElementById('phim').addEventListener('change', function () {
    var selectedMovie = this.value;  // Lấy giá trị phim đã chọn (movie_id)
    console.log('ID phim đã chọn:', selectedMovie); // In ra ID phim đã chọn để kiểm tra

    // Ẩn tất cả các phần thông tin phim
    var allMovies = document.querySelectorAll('.movie-information-content');
    allMovies.forEach(function (movie) {
        movie.style.display = 'none'; // Ẩn tất cả thông tin phim
    });

    // Hiển thị phim đã chọn
    if (selectedMovie) {
        var selectedMovieInfo = document.querySelector('.movie-information-content[data-movie-id="' + selectedMovie + '"]');
        if (selectedMovieInfo) {
            selectedMovieInfo.style.display = 'flex'; // Hiển thị thông tin của phim đã chọn
        }
    }
});






