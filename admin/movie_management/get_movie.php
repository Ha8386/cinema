<?php 
   $edit_sql = "SELECT * FROM movies WHERE movie_id = ?";
   $stmt = $conn->prepare($edit_sql);
   $stmt->bind_param("i", $id); // Liên kết tham số (i cho integer)
   $stmt->execute(); // Thực thi câu truy vấn
   $result = $stmt->get_result(); // Lấy kết quả
   
   // Kiểm tra và lấy dữ liệu
   if ($result->num_rows > 0) {
       $row = $result->fetch_assoc(); // Lấy dữ liệu từ hàng đầu tiên
   } else {
       echo "Không tìm thấy phim.";
   }