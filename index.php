<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Poppins font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
           <!-- Navbar -->
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
                        <a class="nav-link active text-white" href="admin/"><i class="bi bi-box-arrow-in-right"></i> Login Admin</a>
                    </span>
                </div>
            </nav>
            <div class="col-md-5 mt-5">
                <h4>Logika Affine Cipher.</h4>
                <!-- Fungsi affine cipher -->
                <?php
                function affineEncrypt($plainText, $a, $b)
                {
                    $encryptedText = '';

                    foreach (str_split($plainText) as $char) {
                        if (ctype_alpha($char)) {
                            $isUpperCase = ctype_upper($char);
                            $charIndex = ord($char) - ($isUpperCase ? ord('A') : ord('a'));

                            $encryptedIndex = ($a * $charIndex + $b) % 26;
                            if ($encryptedIndex < 0) {
                                $encryptedIndex += 26;
                            }

                            $encryptedChar = chr($encryptedIndex + ($isUpperCase ? ord('A') : ord('a')));
                            $encryptedText .= $encryptedChar;
                        } else {
                            $encryptedText .= $char;
                        }
                    }

                    return $encryptedText;
                }

                function affineDecrypt($encryptedText, $a, $b)
                {
                    $decryptedText = '';

                    $aInverse = modInverse($a, 26);

                    foreach (str_split($encryptedText) as $char) {
                        if (ctype_alpha($char)) {
                            $isUpperCase = ctype_upper($char);
                            $charIndex = ord($char) - ($isUpperCase ? ord('A') : ord('a'));

                            $decryptedIndex = $aInverse * ($charIndex - $b);
                            while ($decryptedIndex < 0) {
                                $decryptedIndex += 26;
                            }

                            $decryptedChar = chr($decryptedIndex % 26 + ($isUpperCase ? ord('A') : ord('a')));
                            $decryptedText .= $decryptedChar;
                        } else {
                            $decryptedText .= $char;
                        }
                    }

                    return $decryptedText;
                }

                function modInverse($a, $m)
                {
                    $a = $a % $m;
                    for ($x = 1; $x < $m; $x++) {
                        if (($a * $x) % $m == 1) {
                            return $x;
                        }
                    }
                    return 1;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $text = $_POST['text'];
                    $a = $_POST['a'];
                    $b = $_POST['b'];

                    $resultText = '';
                    if ($_POST['operation'] === 'encrypt') {
                        $resultText = affineEncrypt($text, $a, $b);
                    } elseif ($_POST['operation'] === 'decrypt') {
                        $resultText = affineDecrypt($text, $a, $b);
                    }
                }

                ?>
                <form method="post" action="index.php">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <label for="text" class="form-label">Masukkan Teks:</label>
                            <input type="text" id="text" name="text" placeholder="Plainteks" class="form-control text-center" required>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-4 mt-2">
                            <label for="a" class="form-label">Key 1 (Angka):</label>
                            <input type="number" id="a" name="a" placeholder="Key 1" class="form-control text-center" required>
                            <label for="b" class="form-label mt-2">Key 2 (Angka):</label>
                            <input type="number" id="b" name="b" placeholder="Key 2" class="form-control text-center" required>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="operation" id="encrypt" value="encrypt" checked>
                            <label class="form-check-label" for="encrypt">Encrypt</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="operation" id="decrypt" value="decrypt">
                            <label class="form-check-label" for="decrypt">Decrypt</label>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php if (isset($resultText)) : ?>
                    <div class="mt-3">
                        <p class="fw-bold"><?= ucfirst($_POST['operation']) . 'ed Teks:' ?> <?= $resultText ?></p>
                    </div>
                <?php endif; ?>
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