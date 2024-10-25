<?php
include '../db_connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if (isset($_POST['change_password'])) {
    $user_id = $_SESSION['user_id'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra xem mật khẩu mới và xác thực mật khẩu có khớp không
    if ($new_password !== $confirm_password) {
        header('Location: change_password.php?error=password_mismatch');
        exit();
    }

    // Lấy mật khẩu đã băm từ cơ sở dữ liệu
    $stmt = $conn->prepare("SELECT password_cs FROM customers WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Kiểm tra mật khẩu cũ
    if (password_verify($password, $hashed_password)) {
        // Băm mật khẩu mới
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Cập nhật mật khẩu trong cơ sở dữ liệu
        $stmt = $conn->prepare("UPDATE customers SET password_cs = ? WHERE id = ?");
        $stmt->bind_param("si", $hashed_new_password, $user_id);

        if ($stmt->execute()) {
            header('Location: profile.php?update=password_success');
        } else {
            header('Location: change_password.php?error=update_failed');
        }

        $stmt->close();
    } else {
        header('Location: change_password.php?error=incorrect_password');
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'password_mismatch') {
        echo "<script>
                alert('Mật khẩu xác thực không khớp');
                window.location.href = 'profile.php'; // Thay đổi đường dẫn nếu cần
              </script>";
    } elseif ($_GET['error'] == 'incorrect_password') {
        echo "<script>
                alert('Mật khẩu cũ không chính xác');
                window.location.href = 'profile.php'; // Thay đổi đường dẫn nếu cần
              </script>";
    } elseif ($_GET['error'] == 'update_failed') {
        echo "<script>
                alert('Cập nhật mật khẩu thất bại. Vui lòng thử lại.');
                window.location.href = 'profile.php'; // Thay đổi đường dẫn nếu cần
              </script>";
    }
}

if (isset($_GET['update']) && $_GET['update'] == 'password_success') {
    echo "<script>
            alert('Đổi mật khẩu thành công');
            window.location.href = 'profile.php'; // Thay đổi đường dẫn nếu cần
          </script>";
}


?>
