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

 // Add movie to the list
document.getElementById("addMovieBtn").onclick = function() {
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;
    var trailer = document.getElementById("trailer").value;
    var image = document.getElementById("image").files[0];
    var date = document.getElementById("date").value;
    var description = document.getElementById("description").value;
    var duration = document.getElementById("duration").value;
    var genres = document.getElementById("genres").value;
    var status = document.getElementById("status").value;
    var directors = document.getElementById("directors").value;
    var country = document.getElementById("country").value;

    var table = document.getElementById("movieList");
    var row = table.insertRow();
    row.insertCell(0).innerHTML = name;
    row.insertCell(1).innerHTML = date;
    row.insertCell(2).innerHTML = genres;
    row.insertCell(3).innerHTML = status;
    row.insertCell(4).innerHTML = '<a href="' + trailer + '">Trailer</a>';

    // Hiển thị ảnh trong bảng danh sách phim
    var reader = new FileReader();
    reader.onload = function(event) {
        row.insertCell(5).innerHTML = '<img src="' + event.target.result + '" alt="Movie Image" style="width: 40px; height: 50px;">';
        row.insertCell(6).innerHTML = '<button class="update-btn">Cập nhật</button>';
        row.insertCell(7).innerHTML = '<button class="delete-btn">Xoá</button>';
        modal.style.display = "none";
    };
    reader.readAsDataURL(image);
}