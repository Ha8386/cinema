function deleteMovie(movie_id) {
    if (confirm("Bạn có chắc chắn muốn xóa phim này không?")) {
        window.location.href = "test.php?delete=" + movie_id;
    }
}

function editMovie(movieId) {
    window.location.href = `test.php?edit=${movieId}`;
}