function toggleSubmenu(element) {
    const submenuItems = document.querySelectorAll('.submenu-item');
    const icon = element.querySelector('.fa-chevron-right');
    submenuItems.forEach(item => {
        if (item.style.maxHeight) {
            item.style.maxHeight = null;
            item.style.display = 'none';
            icon.style.transform = 'rotate(0deg)';
        } else {
            item.style.display = 'block';
            item.style.maxHeight = item.scrollHeight + "px";
            icon.style.transform = 'rotate(90deg)';
        }
    });
}

function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const header = document.querySelector('.header');
    const content = document.querySelector('.content');
    sidebar.classList.toggle('hidden');
    header.classList.toggle('shifted');
    content.classList.toggle('shifted');
}



// --------------------------------------------------------------------------------------------------------
// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("createMovieBtn");

if (btn) {
    btn.onclick = function () {
        modal.style.display = "block";
    }
}
// When the user clicks on <span> (x), close the modal





//  xoá phim
function deleteMovie(movie_id) {
    if (confirm("Bạn có chắc chắn muốn xóa phim này không?")) {
        window.location.href = "ad_movie.php?delete=" + movie_id;
    }
}

// xoá rạp
function deleteCinemas(cinema_id) {
    if (confirm("Bạn có chắc chắn muốn xóa rạp này không?")) {
        window.location.href = "cinemas.php?delete=" + cinema_id;
    }
}
// xoá suất chiếu
function deleteScreen(screeningId) {
    if (confirm("Bạn có chắc chắn muốn xóa suất chiếu này không?")) {
        window.location.href = "screening.php?delete=" + screeningId;
    }
}

// xoá lịch chiếu
function deleteShowtime(showtime_id ) {
    if (confirm("Bạn có chắc chắn muốn xóa lịch chiếu này không?")) {
        window.location.href = "showtime.php?delete=" + showtime_id ;
    }
}
// xoá ưu đãi
function deletePromotion(id ) {
    if (confirm("Bạn có chắc chắn muốn xóa ưu đãi này không?")) {
        window.location.href = "ad_promotion.php?delete=" + id ;
    }
}
// xoá nhân viên
function deleteEmployee(id ) {
    if (confirm("Bạn có chắc chắn muốn xóa nhân viên này không?")) {
        window.location.href = "employees.php?delete=" + id ;
    }
}
// xoá user
function deleteUser(id ) {
    if (confirm("Bạn có chắc chắn muốn xóa khách hàng này không?")) {
        window.location.href = "customer.php?delete=" + id ;
    }
}


// thêm suất chiếu 
function addScreeningInput() {
    const container = document.getElementById('screeningInputs');
    const inputGroup = document.createElement('div');
    // inputGroup.className = 'form-group';
    inputGroup.innerHTML = `<input style="width:100px" type="time" name="screening_time[]" required>`;
    container.appendChild(inputGroup);
}

// sửa phim
function editMovie(movieId) {
    window.location.href = `ad_movie.php?edit=${movieId}`;
}

// sửa khách hàng
function editCustomer(id) {
    window.location.href = `customer.php?edit=${id}`;
}

// sửa nhân viên
function editEmployee(id) {
    window.location.href = `employees.php?edit=${id}`;
}

// sửa ưu đãi
function editPromotion(id) {
    window.location.href = `ad_promotion.php?edit=${id}`;
}

// sửa lịch chiếu


function removeDateInput(button) {
    const dateGroup = button.parentNode;
    dateGroup.remove();
}
function openEditModal(movieId, showDatesString) {
    const modal_1 = document.getElementById('editModal');
    modal_1.style.display = 'block';
    // Chuyển đổi chuỗi thành mảng
    const showDates = showDatesString ? showDatesString.split(', ') : [];

    if (!Array.isArray(showDates)) {
        console.error('showDates is not an array or is undefined:', showDates);
        return;
    }

    // Thiết lập giá trị cho input tên phim
    const movieTitleInput = document.getElementById('movie_title');
    const movieIdInput = document.getElementById('movie_id');
    movieIdInput.value = movieId;

    // Cập nhật tên phim
    movieTitleInput.value = document.querySelector(`option[value="${movieId}"]`).textContent;

    // Xóa các input ngày chiếu cũ
    const showingDatesDiv = document.getElementById('showingDates');
    showingDatesDiv.innerHTML = '';

    // Thêm các ngày chiếu vào modal
    showDates.forEach(date => {
        const dateGroup = document.createElement('div');
        dateGroup.classList.add('date-group');
        dateGroup.innerHTML = `
            <input type="date" name="new_show_date[]" value="${date}" required>
            <button type="button" onclick="removeDateInput(this)">Xóa</button>
        `;
        showingDatesDiv.appendChild(dateGroup);
    });
    
}

// sửa suất chiếu
function removescreenInput2(button) {
    const screenGroup2 = button.parentNode;
    screenGroup2.remove();
}
function openEdit(showtimeid, screenTimeString) {
    const modal_1 = document.getElementById('editModal');
    modal_1.style.display = 'block';
    // Chuyển đổi chuỗi thành mảng
    const screenTimes = screenTimeString ? screenTimeString.split(', ') : [];

    if (!Array.isArray(screenTimes)) {
        console.error('screenTimes is not an array or is undefined:', screenTimes);
        return;
    }

    // Thiết lập giá trị cho input 
    const showtimes = document.getElementById('show_date');
    const showtimeidInput = document.getElementById('showtime_id');
    showtimeidInput.value = showtimeid;

    // Cập nhật lịch chiếu
    showtimes.value = document.querySelector(`option[value="${showtimeid}"]`).textContent;

    // Xóa các input lịch chiếu cũ
    const screentimesDiv = document.getElementById('screeningtimes');
    screentimesDiv.innerHTML = '';

    // Thêm các ngày chiếu vào modal
    screenTimes.forEach(screen => {
        const screenGroup = document.createElement('div');
        screenGroup.classList.add('screen-group');
        screenGroup.innerHTML = `
            <input type="time" name="new_screening_time[]" value="${screen}" required>
            <button type="button" onclick="removescreenInput2(this)">Xóa</button>
        `;
        screentimesDiv.appendChild(screenGroup);
    });
    
}










window.onload = function() {
    // Kiểm tra xem URL có chứa tham số 'edit' hay không
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('edit')) {
        // Nếu có, hiển thị modal
        document.getElementById('editModal').style.display = 'block';
    }

    // Khi người dùng nhấn vào bất kỳ đâu ngoài modal, đóng nó
    window.onclick = function(event) {
        var modals = document.getElementsByClassName("modal");
        for (var i = 0; i < modals.length; i++) {
            var modal = modals[i];
            if (event.target == modal) {
                modal.style.display = "none";
                history.pushState(null, '', location.pathname);
            }
        }
    };

    // Đóng modal khi nhấn vào nút đóng
    var closeButtons = document.getElementsByClassName("close");
    for (var i = 0; i < closeButtons.length; i++) {
        closeButtons[i].onclick = function() {
            var modal = this.closest(".modal");
            if (modal) {
                modal.style.display = "none";
                history.pushState(null, '', location.pathname);
            }
        };
    }
};

//Doanh thu
document.addEventListener("DOMContentLoaded", function () {
    var chart = new Morris.Bar  ({
        element: 'BieuDo',
        data: data,
        xkey: 'day',
        ykeys: ['total_revenue'],
        labels: ['Doanh thu']
    });

    function updateChart(range) {
        var filteredData = data;
        if (range === '7days') {
            filteredData = data.slice(-7);
        } 
        else if (range === '30days') {
            filteredData = data.slice(-30); 
        } 
        chart.setData(filteredData);
    }
    updateChart('7days');

    function updateChartByMovie(movieTitle) {
        // Lọc dữ liệu dựa trên tên phim đã chọn
        var filteredData = data_movie.filter(item => item.movie_name === movieTitle);
        chart.setData(filteredData);
    }

    document.querySelector('.revenue_as_time').addEventListener('change', function () {
        updateChart(this.value);
    });

    document.querySelector('select[name="select revenue_as_movie"]').addEventListener('change', function () {
        var selectedMovie = this.options[this.selectedIndex].text; // Lấy tên phim
        updateChartByMovie(selectedMovie);
    });
});





