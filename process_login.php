<?php
session_start(); // Mulai session (jika belum dimulai)

include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    $error = "";

    // Validasi login
    if (empty($username) || empty($password)) {
        $error = "Username dan password harus diisi.";
    } else {
        // Query untuk mencari user berdasarkan username dan password
        $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
        $result = mysqli_query($link, $query);
        
        if (!$result) {
            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
        }
        
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 1) {
            // Jika login berhasil
            $row = mysqli_fetch_assoc($result);
            $_SESSION["username"] = $username;

            if ($row['admin']) {
                // If user is admin
                $_SESSION["admin"] = "1";
                header("Location: dashboard_Admin.php"); // Redirect to admin dashboard
            } else {
                // If user is a regular user
                header("Location: dashboard_Login.php"); // Redirect to user dashboard
            }
            exit();
        } else {
            // Jika login gagal
            $error = "Username atau password salah.";
        }
    }

    // Redirect kembali ke halaman login dengan pesan error
    header("Location: dashboard_Login.php?error=" . urlencode($error));
    exit();
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-control {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php
    if (isset($error)) {
        echo "<div class=\"alert alert-danger mb-3\">$error</div>";
    }
    ?>
    <form action="process_login.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
    </form>
    <div class="mt-3 text-center">
        Belum punya akun? <a href="register.php">Registrasi disini</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
