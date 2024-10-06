// đăng kí đăng nhập
document.addEventListener('DOMContentLoaded', () => {
    const login = document.querySelector('.login');
    const loginLink = document.querySelector('.switch-to-login');
    const registerLink = document.querySelector('.switch-to-register');

    registerLink.addEventListener('click', () => {
        login.classList.add('active');
    });

    loginLink.addEventListener('click', () => {
        login.classList.remove('active');
    });
    
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'none';
        }
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


    




