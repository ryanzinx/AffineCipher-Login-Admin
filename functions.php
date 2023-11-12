<?php
// Fungsi enkripsi dan dekripsi affine cipher
function encryptPassword($password) {
    $a = 5;
    $b = 8;

    $encryptedPassword = '';
    foreach (str_split($password) as $char) {
        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $charIndex = ord($char) - ($isUpperCase ? ord('A') : ord('a'));

            $encryptedIndex = ($a * $charIndex + $b) % 26;
            if ($encryptedIndex < 0) {
                $encryptedIndex += 26;
            }

            $encryptedChar = chr($encryptedIndex + ($isUpperCase ? ord('A') : ord('a')));
            $encryptedPassword .= $encryptedChar;
        } else {
            $encryptedPassword .= $char;
        }
    }

    return $encryptedPassword;
}

function registerUser($username, $password) {
    global $conn;

    $hashedPassword = encryptPassword($password);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    $conn->query($query);
}

function authenticateUser($username, $password) {
    global $conn;

    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        $decryptedPassword = decryptPassword($hashedPassword);

        return $password === $decryptedPassword;
    }

    return false;
}

function decryptPassword($encryptedPassword) {
    $a = 5;
    $b = 8;

    $decryptedPassword = '';
    foreach (str_split($encryptedPassword) as $char) {
        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $charIndex = ord($char) - ($isUpperCase ? ord('A') : ord('a'));

            $aInverse = modInverse($a, 26);
            $decryptedIndex = $aInverse * ($charIndex - $b);

            while ($decryptedIndex < 0) {
                $decryptedIndex += 26;
            }

            $decryptedChar = chr($decryptedIndex % 26 + ($isUpperCase ? ord('A') : ord('a')));
            $decryptedPassword .= $decryptedChar;
        } else {
            $decryptedPassword .= $char;
        }
    }

    return $decryptedPassword;
}

function modInverse($a, $m) {
    $a = $a % $m;
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }
    return 1;
}

?>
