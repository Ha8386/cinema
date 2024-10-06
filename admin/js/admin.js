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
 btn.onclick = function() {
     modal.style.display = "block";
 }

 // When the user clicks on <span> (x), close the modal
 span.onclick = function() {
     modal.style.display = "none";
 }

 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
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
function openEditModal(movieId) {
    // Gọi API hoặc thực hiện AJAX để lấy thông tin phim theo ID
    fetch(`get_movie.php?id=${movieId}`)
        .then(response => response.json())
        .then(movie => {
            document.getElementById("edit_movie_id").value = movie.id;
            document.getElementById("edit_title").value = movie.title;
            document.getElementById("edit_age_rating").value = movie.age_rating;
            document.getElementById("edit_release_date").value = movie.release_date;
            document.getElementById("edit_description").value = movie.description;
            document.getElementById("edit_subtitle").value = movie.subtitle;
            document.getElementById("edit_genre").value = movie.genre;
            document.getElementById("edit_status").value = movie.status;
            document.getElementById("edit_duration").value = movie.duration;
            document.getElementById("edit_country").value = movie.country;

            document.getElementById("editMovieModal").style.display = "block"; // Mở modal
        });
        console.log(`get_movie.php?id=${movieId}`);

}

