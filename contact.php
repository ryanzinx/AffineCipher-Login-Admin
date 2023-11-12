<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Link to Poppins font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Link to custom style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <nav class="navbar navbar-expand-md bg-info sticky-top" data-bs-theme="dark">
                <a class="navbar-brand ms-5" href="index.php"><i class="bi bi-balloon-heart-fill"></i> Affine Cipher</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="bi bi-person-circle"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php"><i class="bi bi-envelope"></i> Contact</a>
                        </li>
                    </ul>
                    <span class="navbar-item me-5">
                        <a class="nav-link active text-white" href="admin/"><i class="bi bi-box-arrow-in-right"></i> Admin Login</a>
                    </span>
                </div>
            </nav>
            <div class="col-md-12 mt-5">
                <h4>Contact Me</h4>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <i class="bi bi-envelope"></i>
                        <p>rianwiratama80@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-github"></i>
                        <p>ryanzinx</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-phone"></i>
                        <p>081324610584</p>
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