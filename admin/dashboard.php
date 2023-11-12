<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['admin_username'])) {
    header("Location: index.php");
    exit();
}

// Ambil username dari session
$admin_username = $_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <div class="col-md-6 mt-5">
                <h4>Admin Dashboard</h4>
                <hr>
                <p>Welcome, <?php echo htmlspecialchars($admin_username); ?>!</p>
                <p><a href="logout.php">Logout</a></p>
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