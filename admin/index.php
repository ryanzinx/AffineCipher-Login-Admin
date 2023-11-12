<?php
include '../config.php';
include '../functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (authenticateUser($username, $password)) {
            // Jika login berhasil, set session dan arahkan ke dashboard
            $_SESSION['admin_username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $login_error = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Poppins font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 mt-5">
                <?php
                if (isset($_SESSION['admin_username'])) {
                    echo '<p class="text-center"><a href="logout.php">Logout</a></p>';
                } else {
                    // Tampilkan pesan kesalahan jika login gagal
                    if (isset($login_error) && $login_error) {
                        echo '<p class="alert alert-danger text-center mb-2">Login gagal. Coba lagi.<p>';
                    }
                    // Jika belum login, tampilkan form login
                    echo '<div class="card bg-info">';
                    echo '<div class="card-body text-center">';
                    echo '<h4>Login Admin</h4>';
                    echo '<form method="post" action="index.php">';
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<input type="hidden" name="action" value="login">';
                    echo '<label for="admin_username">Username: </label>';
                    echo '<input type="text" id="admin_username" name="username" required>';
                    echo '<label for="admin_password" class="mt-2">Password: </label>';
                    echo '<input type="password" id="admin_password" name="password" required>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<button type="submit" class="btn btn-primary mt-3">Login</button>';
                    echo '<p class="mt-2">Belum memiliki akun?<br>Silahkan daftar disini, <a href="register.php">Daftar.</a></p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <p class="text-center mt-2">
                Kembali, <a href="../index.php">Home.</a>
            </p>
        </div>
    </div>
    <!-- Footer -->
    <footer class="mt-2 bg-info fixed-bottom text-center">
        <p class="text-white">Made With <i class="bi bi-balloon-heart-fill"></i> by Adrian Fadhali Wiratama.</p>
    </footer>
    <!-- Bootstrap 5 JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>