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

// Get the button that opens the modal
var btn = document.getElementById("createMovieBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//  xoá phim
function deleteMovie(movie_id) {
    if (confirm("Bạn có chắc chắn muốn xóa phim này không?")) {
        window.location.href = "ad_movie.php?delete=" + movie_id;
    }
}

// sửa phim



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

function editMovie(movieId) {
    document.getElementById('editModal').style.display = 'block';

    // Thay đổi URL với tham số edit
    window.history.pushState(null, '', 'ad_movie.php?edit=' + movieId);
}

// Khi người dùng nhấn vào bất kỳ đâu ngoài modal, đóng nó
window.onclick = function (event) {
    var modal = document.getElementById("editModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
