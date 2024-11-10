<?php
    $conn = new mysqli('localhost', 'root', '', 'test-movie');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addMovie'])){
        //Thêm phim
        $title = $_POST['title'];
        $age_rating = $_POST['age_rating'];
        $trailer_url = $_FILES['trailer_url']['name'];
        $release_date = $_POST['release_date'];
        $image_url = $_FILES['image_url']['name'];
        $description_mv = $_POST['description_mv'];
        $genre = $_POST['genre'];
        $status_mv = $_POST['status_mv'];
        $content = $_POST['content'];
        $country = $_POST['country'];
        $duration = $_POST['duration'];
        $subtitle  = $_POST['subtitle'];

        move_uploaded_file($_FILES['trailer_url']['tmp_name'], "assets/trailer/" . $trailer_url);
        move_uploaded_file($_FILES['image_url']['tmp_name'], "assets/img/" . $image_url);

        $sql = $conn->prepare
        ("INSERT INTO movies (title, age_rating, trailer_url, release_date, image_url, description_mv, genre, status_mv, content, country, duration, subtitle) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssssssssss', $title, $age_rating, $trailer_url, $release_date, $image_url, $description_mv, $genre, $status_mv, $content, $country, $duration, $subtitle);

        if($sql->execute()){
            echo 'Thêm phim thành công';
        }else{
            echo 'Lỗi: ' .$sql->error;
        }
        $sql->close();
    }
    //Xóa phim
    if(isset($_GET['delete'])){
        $movie_delete = $_GET['delete'];
        $sql_showtimes = $conn->prepare("DELETE FROM showtimes WHERE movie_id = ?");
        $sql_showtimes->bind_param('i', $movie_delete);
        $sql_showtimes->execute();
        $sql_showtimes->close();

        $sql_movie = $conn->prepare("DELETE FROM movies WHERE movie_id = ?");
        $sql_movie->bind_param('i', $movie_delete);
        if($sql_movie->execute()){
            echo 'Xóa phim thành công';
        }else{
            echo 'Xóa phim lỗi' . $sql_movie->error;
        }
        $sql_movie->close();
    }

    //Sửa phim
    $editData = null;
    if(isset($_GET['edit'])){
        $movie_edit = $_GET['edit'];
        $query = "SELECT * FROM movies WHERE movie_id = ?";
        $sql_get = $conn->prepare($query);
        $sql_get->bind_param('i', $movie_edit);
        $sql_get->execute();
        $result = $sql_get->get_result();
        if($row = $result->fetch_assoc()){
            $editData = $row;
            $cur_trailer = $editData['trailer_url'];
            $cur_image = $editData['image_url'];
        }

        $sql_get->close();
    }

    if(isset($_POST['update'])){
        $title = $_POST['edit_title'];
        $age_rating = $_POST['edit_age_rating'];
        $trailer_url = $_POST['edit_trailer_url'];
        $release_date = $_POST['edit_release_date'];
        $image_url = $_POST['edit_image_url'];
        $description_mv = $_POST['edit_description_mv'];
        $genre = $_POST['edit_genre'];
        $status_mv = $_POST['edit_status_mv'];
        $content = $_POST['edit_content'];
        $country = $_POST['edit_country'];
        $duration = $_POST['edit_duration'];
        $subtitle  = $_POST['edit_subtitle'];
        $id = $_POST['movie_id'];

        $trailer_url = $_FILES['edit_trailer_url']['name'];
        if(isset($_FILES['trailer_url']['name'])){
            move_uploaded_file($_FILES['edit_trailer_url']['tmp_name'], "assets/trailer/" . $trailer_url);
        } else {
            $trailer_url = $cur_trailer;
        }

        $image_url = $_FILES['edit_image_url']['name'];
        if(isset($_FILES['image_url']['name'])){
            move_uploaded_file($_FILES['edit_image_url']['tmp_name'], "assets/img/" . $image_url);
        } else {
            $image_url = $cur_image;
        }

        $query_update = "
            UPDATE movies 
            SET title = ? ,age_rating = ? ,trailer_url = ? ,release_date = ? ,image_url = ? ,description_mv = ? ,
                genre = ? ,status_mv = ? ,content = ? ,country = ? ,duration = ? ,subtitle = ? 
            WHERE movie_id = ?
        ";
        $sql_update = $conn->prepare($query_update);
        $sql_update->bind_param('ssssssssssssi', $title, $age_rating, $trailer_url, $release_date, $image_url, $description_mv, $genre, $status_mv, $content, $country, $duration, $subtitle, $id);
        $sql_update->execute();
        $sql_update->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phim</title>
    <style>  
        .app{
            
        }

        .main{
            display: flex;
        }
        /* Menu đứng */
        .side-menu{
            width: 20%;
            height: 100vh;
            background: radial-gradient(white 0%, rgb(44, 153, 165) 70%, rgb(15, 111, 130) 100%);
        }

        .admin-title{

        }

        .menu-bar{
            list-style: none;
        }

        .side-bar-menu{
            font-size: 25px;
            font-weight: 600;
        }

        /*Bảng*/
        .main-table{
            padding: 20px;
            width: 80%;
            margin-left: 12px;
        }

        .btn-block{
            display: flex;
            justify-content: space-between;
        }

        .search-block{
            
        }

        .table{
            
        }

        .thead{
            padding: 10px;
        }

        /* form */
        .add-movie{
            display: flex;
        }
        .form-list{
            list-style: none;
        }

        .content{
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="app">
        <main class="main">
            <div class="side-menu">
                <div class="admin-title">
                    <img src="" alt="">
                    <p class="side-bar-menu">Chức năng admin</p>
                </div>
                <ul class="menu-bar">
                    <li class="content">Quản lý phim</li>
                    <li class="content">Quản lý rạp phim</li>
                    <li class="content">Quản lý rạp phim</li>
                    <li class="content">Quản lý đơn đặt vé</li>
                    <li class="content">Quản lý ưu đãi</li>
                    <li class="content">Quản lý khách hàng</li>
                    <li class="content">Quản lý nhân viên</li>
                    <li class="content">Đăng xuất</li>
                </ul>
            </div>
            <div class="main-table">
                <h1>Danh sách phim</h1>
                <div class="btn-block">
                    <form method="get" class="search-block">
                        <input type="text" placeholder="Nhập dữ liệu">
                        <button type="submit">search</button>
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="thead">#</th>
                            <th class="thead">Tên phim</th>
                            <th class="thead">Thể loại</th>
                            <th class="thead">Ngày chiếu</th>
                            <th class="thead">Trạng thái</th>
                            <th class="thead">Trailer</th>
                            <th class="thead">Ảnh</th>
                            <th class="thead">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM movies";
                        $result = $conn->query($sql);
                        if($result->num_rows>0){
                            $count = 1;
                            while($row=$result->fetch_assoc()){
                                echo '<tr>';
                                    echo '<td>' .$count++ .'</td>';
                                    echo '<td>' .$row['title'] .'</td>';
                                    echo '<td>' .$row['genre'] .'</td>';
                                    echo '<td>' .$row['release_date'] .'</td>';
                                    echo '<td>' .$row['status_mv'] .'</td>';
                                    echo '<td><a href="assets/trailer/' . $row['trailer_url'] . '">Xem Trailer</a></td>';
                                    echo '<td>' .$row['image_url'] .'</td>';
                                    echo '<td><button onclick="deleteMovie('.$row['movie_id'].')">Xóa</button> 
                                    <button onclick="editMovie('.$row['movie_id'].')">Sửa</button>' .'</td>';                               
                                echo '</tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>
                <form action="test.php" method="POST" enctype="multipart/form-data">
                    <h3>Thêm phim</h3>
                    <div class="add-movie">
                        <ul class="form-list form-left">
                            <li>
                                <label for="movie-name">* Tên phim</label>
                                <input type="text" name="title" id="movie-name" placeholder="Nhập tên phim">                        
                            </li>
                            <li>
                                <label for="trailer">* Trailer</label>
                                <input type="file" name="trailer_url" id="trailer">
                            </li>
                            <li>
                                <label for="image">* Poster</label>
                                <input type="file" name="image_url" id="image">
                            </li>
                            <li>
                                <label for="movie-content">* Nội dung</label>
                                <input type="text" name="content" id="movie-content" placeholder="Nhập nội dung phim"> 
                            </li>
                            <li>
                                <label for="movie-genre">* Thể loại</label>
                                <input type="text" name="genre" id="movie-genre" placeholder="Nhập thể loại"> 
                            </li>
                            <li>
                                <label for="movie-duration">* Thời lượng phim (phút)</label>
                                <input type="text" name="duration" id="movie-duration" placeholder="Nhập thời lượng"> 
                            </li>
                        </ul>
    
                        <ul class="form-list form-right">
                            <li>
                                <label for="age">* Độ tuổi xem phim</label>
                                <input type="text" name="age_rating" id="age" placeholder="Nhập số tuổi">                        
                            </li>
                            <li>
                                <label for="date">* Ngày chiếu</label>
                                <input type="date" name="release_date" id="date">
                            </li>
                            <li>
                                <label for="subtitle">* Phụ đề</label>
                                <input type="text" name="subtitle" id="subtitle" placeholder="Nhập phụ đề">
                            </li>
                            <li>
                                <label for="movie-name">* Mô tả</label>
                                <input type="text" name="description_mv" id="movie-name" placeholder="Nhập mô tả phim"> 
                            </li>
                            <li>
                                <label for="status">* Trạng thái</label>
                                <select name="status_mv" id="status">
                                    <option value="present">Đang chiếu</option>
                                    <option value="future">Sắp chiếu</option>
                                </select>
                            </li>
                            <li>
                                <label for="country">* Quốc gia</label>
                                <input type="text" name="country" id="country" placeholder="Nhập quốc gia"> 
                            </li>
                        </ul>
                    </div>
                    <button name="addMovie">Thêm phim</button>
                </form>

                <form action="test.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="movie_id" value="<?php echo $movie_edit;?>">
                    <h3>Sửa phim</h3>
                    <div class="add-movie">
                        <ul class="form-list form-left">
                            <li>
                                <label for="movie-name">* Tên phim</label>
                                <input type="text" name="edit_title" id="movie-name" placeholder="Nhập tên phim" value="<?php echo $editData['title'];?>">                        
                            </li>
                            <li>
                                <label for="trailer">* Trailer</label>
                                <input type="file" name="edit_trailer_url" id="trailer">
                                <p>Trailer hiện tại <?php echo $cur_trailer;?></p>
                            </li>
                            <li>
                                <label for="image">* Poster</label>
                                <input type="file" name="edit_image_url" id="image">
                                <p>Poster hiện tại: <?php echo $cur_image;?></p>
                            </li>
                            <li>
                                <label for="movie-content">* Nội dung</label>
                                <input type="text" name="edit_content" id="movie-content" placeholder="Nhập nội dung phim" value="<?php echo $editData['content'];?>"> 
                            </li>
                            <li>
                                <label for="movie-genre">* Thể loại</label>
                                <input type="text" name="edit_genre" id="movie-genre" placeholder="Nhập thể loại" value="<?php echo $editData['genre'];?>"> 
                            </li>
                            <li>
                                <label for="movie-duration">* Thời lượng phim (phút)</label>
                                <input type="text" name="edit_duration" id="movie-duration" placeholder="Nhập thời lượng" value="<?php echo $editData['duration'];?>"> 
                            </li>
                        </ul>
    
                        <ul class="form-list form-right">
                            <li>
                                <label for="age">* Độ tuổi xem phim</label>
                                <input type="text" name="edit_age_rating" id="age" placeholder="Nhập số tuổi" value="<?php echo $editData['age_rating'];?>">                        
                            </li>
                            <li>
                                <label for="date">* Ngày chiếu</label>
                                <input type="date" name="edit_release_date" id="date" value="<?php echo $editData['release_date'];?>">
                            </li>
                            <li>
                                <label for="subtitle">* Phụ đề</label>
                                <input type="text" name="edit_subtitle" id="subtitle" placeholder="Nhập phụ đề" value="<?php echo $editData['subtitle'];?>">
                            </li>
                            <li>
                                <label for="movie-name">* Mô tả</label>
                                <input type="text" name="edit_description_mv" id="movie-name" placeholder="Nhập mô tả phim" value="<?php echo $editData['description_mv'];?>"> 
                            </li>
                            <li>
                                <label for="status">* Trạng thái</label>
                                <select name="edit_status_mv" id="status">
                                    <option value="present">Đang chiếu</option>
                                    <option value="future">Sắp chiếu</option>
                                </select>
                            </li>
                            <li>
                                <label for="country">* Quốc gia</label>
                                <input type="text" name="edit_country" id="country" placeholder="Nhập quốc gia" value="<?php echo $editData['country'];?>"> 
                            </li>
                        </ul>
                    </div>
                    <button name="update">Cập nhật</button>
                </form>
            </div>

        </main>
    </div>
    <script src="test.js"></script>
</body>
</html>