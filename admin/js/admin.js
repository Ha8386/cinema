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
function deleteSceen(screening_id) {
    if (confirm("Bạn có chắc chắn muốn xóa suất chiếu này không?")) {
        window.location.href = "screening.php?delete=" + screening_id;
    }
}
// xoá lịch chiếu
function deleteShowtime(showtime_id ) {
    if (confirm("Bạn có chắc chắn muốn xóa lịch chiếu này không?")) {
        window.location.href = "showtime.php?delete=" + showtime_id ;
    }
}
console.log("admin.js đã được tải!");
