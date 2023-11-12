<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <!-- Link to Poppins font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Link to your custom style.css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 mt-5">
                <?php
                include '../config.php';
                include '../functions.php';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    // Jika pendaftaran berhasil
                    registerUser($username, $password);
                    echo '<p class="alert alert-success text-center mb-2">Pendaftaran berhasil!</p>';
                }
                ?>
                <div class="card bg-info">
                    <div class="card-body text-center">
                        <h4>Pendaftaran</h4>
                        <form method="post" action="register.php">
                            <div class="row">
                                <div class="col">
                                    <label for="admin_username">Username:</label>
                                    <input type="text" id="admin_username" name="username" required>
                                    <label for="admin_password" class="mt-2">Password:</label>
                                    <input type="password" id="admin_password" name="password" required>
                                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                                </div>
                        </form>
                        <p class="text-center mt-2">
                            Kembali, <a href="index.php">Login.</a>
                        </p>
                    </div>
                </div>
            </div>
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