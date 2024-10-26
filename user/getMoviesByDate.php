<?php
require 'db_connection.php'; // Kết nối CSDL

$date = $_GET['date'] ?? '';
$movies = [];

// Truy vấn SQL lấy thông tin phim cùng các suất chiếu theo ngày đã chọn
$sql_movies = "SELECT m.movie_id, m.image_url, m.title, m.genre, m.duration, m.country, m.vietsub, m.age_rating, sc.screening_time 
               FROM movies m
               JOIN showtimes s ON m.movie_id = s.movie_id
               JOIN screenings sc ON s.showtime_id = sc.showtime_id
               WHERE s.show_date = ?";
               
$stmt = $conn->prepare($sql_movies);
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();

// Xử lý dữ liệu đầu ra thành mảng phim
while ($row = $result->fetch_assoc()) {
    // Tạo một phần tử phim nếu chưa tồn tại movie_id trong mảng
    if (!isset($movies[$row['movie_id']])) {
        $movies[$row['movie_id']] = [
            'movie_id'=> $row['movie_id'],
            'image_url' => $row['image_url'],
            'title' => $row['title'],
            'genre' => $row['genre'],
            'duration' => $row['duration'],
            'country' => $row['country'],
            'vietsub' => $row['vietsub'],
            'age_rating' => $row['age_rating'],
            'showtimes' => [] // Tạo mảng để chứa các suất chiếu
        ];
    }
    
    // Thêm thời gian chiếu vào mảng 'showtimes' cho phim tương ứng
    $movies[$row['movie_id']]['showtimes'][] = $row['screening_time'];
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($movies);


$stmt->close();
$conn->close();
?>
