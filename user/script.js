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

           // Lấy ngày chiếu từ .date
        const showDate = this.querySelector('.date') ? this.querySelector('.date').textContent : ''; // Kiểm tra phần tử có tồn tại không
        document.getElementById('show-date').value = showDate; // Cập nhật vào input show-date
         console.log(showDate);
        
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
        document.getElementById('screening-time').value = selectedShowtime; // Cập nhật vào input screening_time
        console.log("Screening Time:", selectedShowtime);
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
            ticketDetails[ticketKey] = countNumber; 
             // Tạo một danh sách các loại vé đã chọn (chỉ lấy các vé có số lượng lớn hơn 0)
             const selectedTicketTypes = Object.keys(ticketDetails).filter(key => ticketDetails[key] > 0);

             // Cập nhật số lượng vé vào input hidden
             const totalTicketQuantity = Object.values(ticketDetails).reduce((acc, val) => acc + val, 0);
             document.getElementById('ticket-quantity').value = totalTicketQuantity; // Cập nhật vào input ticket_quantity

              // Cập nhật loại vé vào input hidden ticket_types
            document.getElementById('ticket-types').value = selectedTicketTypes.join(', ');
            countNumberElement.textContent = countNumber;
          
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

            // Tăng hoặc giảm số lượng
            if (this.classList.contains('count-plus')) {
                countNumber++;
            } else if (this.classList.contains('count-minus')) {
                countNumber = Math.max(0, countNumber - 1);
            }

            // Cập nhật số lượng trong phần tử giao diện
            countNumberElement.textContent = countNumber;

            // Chỉ cập nhật ticketDetails nếu đây là một combo thực sự
            if (countNumber > 0) {
                ticketDetails[comboKey] = countNumber; // Lưu số lượng combo
            } else {
                delete ticketDetails[comboKey]; // Xóa nếu số lượng là 0
            }

            // Cập nhật input hidden cho các món ăn
            const foodNamesInput = document.getElementById('food-names');
            const excludedItems = ["Người lớn - Đơn", "HSSV - Người Cao Tuổi - Đơn", "Người lớn - Đôi"];
            const filteredItems = Object.keys(ticketDetails)
                .filter(key => !excludedItems.includes(key)); // Lọc bỏ các mục không cần thiết

            foodNamesInput.value = filteredItems.join(', '); // Nối các tên món ăn đã lọc bằng dấu phẩy

            // Cập nhật thông tin vé
            updateTicketDetails();
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
     // Cập nhật tổng số tiền vào input ẩn
     const totalAmountInput = document.getElementById('total-amount');
     if (totalAmountInput) {
         totalAmountInput.value = totalPrice; // Gán giá trị tổng tiền vào input
     }
    const totalElement = document.querySelector('.total-price');
    if (totalElement) {
        totalElement.textContent = totalPrice + ' VNĐ'; // Hiển thị tổng tiền
    }
}


// Sự kiện chọn ghế
document.addEventListener('DOMContentLoaded', function() {
    const selectedSeats = []; // Mảng lưu ghế đã chọn
    const seatNumbersElement = document.getElementById('seat-numbers'); // Lấy phần tử input cho ghế
    const maxTicketsElement = document.getElementById('ticket-quantity'); // Lấy phần tử input cho số lượng vé

    document.querySelectorAll('.seat-td').forEach(function(seat) {
        seat.addEventListener('click', function() {
            // Lấy tên ghế đã chọn
            const seatName = this.querySelector('.seat-name').textContent;

            // Kiểm tra xem ghế đã được chọn hay chưa
            if (this.classList.contains('choosing')) {
                // Nếu đã chọn, xóa ghế khỏi danh sách và bỏ class 'choosing'
                const index = selectedSeats.indexOf(seatName);
                if (index !== -1) {
                    selectedSeats.splice(index, 1); // Xóa ghế khỏi danh sách
                    this.classList.remove('choosing'); // Bỏ class 'choosing'
                }
            } else {
                // Nếu chưa chọn, kiểm tra số lượng ghế đã chọn so với số lượng vé
                const totalTicketQuantity = parseInt(maxTicketsElement.value) || 0; // Lấy số lượng vé đã chọn
                if (selectedSeats.length < totalTicketQuantity) {
                    selectedSeats.push(seatName); // Thêm ghế vào danh sách
                    this.classList.add('choosing'); // Thêm class 'choosing'
                } else {
                    alert(`Bạn đã chọn đủ số ghế (${totalTicketQuantity}). Không thể chọn thêm ghế!`);
                }
            }

            // Cập nhật thông tin ghế đã chọn vào input
            if (seatNumbersElement) {
                seatNumbersElement.value = selectedSeats.join(', '); // Cập nhật danh sách ghế vào input
            }

            const seatNameElement = document.getElementById('seat-name');
            if (seatNameElement) {
                seatNameElement.textContent = selectedSeats.join(', '); // Cập nhật tên ghế
            }

            // Cập nhật thông tin vé bao gồm suất chiếu và ghế
            updateTicketDetails();
        });
    });
});







    




