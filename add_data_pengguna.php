<?php
include("koneksi.php");

if (isset($_POST["submit"])) {
    $nama = htmlentities(strip_tags(trim($_POST["nama"])));
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));
    $email = htmlentities(strip_tags(trim($_POST["email"])));
    $telpon = htmlentities(strip_tags(trim($_POST["telpon"])));

    $error_message = "";

    // Validasi Nama
    if (empty($nama)) {
        $error_message .= "<li>Nama belum diisi</li>";
    }

    // Validasi Username
    if (empty($username)) {
        $error_message .= "<li>Username belum diisi</li>";
    } else {
        // Check if username already exists
        $query = "SELECT * FROM pengguna WHERE username='$username'";
        $result = mysqli_query($link, $query);
        
        if (!$result) {
            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
        }
        
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $error_message .= "<li>Username sudah terdaftar</li>";
        }
    }

    // Validasi Password
    if (empty($password)) {
        $error_message .= "<li>Password belum diisi</li>";
    }

    // Validasi Email
    if (empty($email)) {
        $error_message .= "<li>Email belum diisi</li>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message .= "<li>Email tidak valid</li>";
    }

    // Validasi Telpon
    if (empty($telpon) || !is_numeric($telpon)) {
        $error_message .= "<li>Nomor Telpon harus diisi dengan angka</li>";
    }

    // Jika tidak ada error, lakukan insert data ke database
    if ($error_message === "") {
        $nama = mysqli_real_escape_string($link, $nama);
        $username = mysqli_real_escape_string($link, $username);
        $password = mysqli_real_escape_string($link, $password);
        $email = mysqli_real_escape_string($link, $email);
        $telpon = mysqli_real_escape_string($link, $telpon);

        // Query untuk insert data
        $query = "INSERT INTO pengguna (nama, username, password, email, telpon) VALUES ";
        $query .= "('$nama', '$username', '$password', '$email', '$telpon')";

        $result = mysqli_query($link, $query);
        if ($result) {
            // Registrasi berhasil, arahkan ke halaman login
            $message = "Pengguna dengan username \"$username\" berhasil ditambahkan";
            $message = urlencode($message);
            header("Location: data_Pengguna.php?message={$message}");
            exit();
        } else {
            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
        }
    }
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- navigasi -->
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Markas45Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Markas45Project</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard_Admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Service.php">Paket Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="TentangKami_Admin.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_Pengguna.php">Data Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
    <header class="header-title mb-4">
        <h1><a href="add_data_Pengguna.php" style="text-decoration: none;">
            <span class="fw-normal text-dark">Tambah Data</span>
            <span class="text-primary">pengguna</span></a>
        </h1>
        <hr>
    </header>
    <section>
        <h2 class="mb-3"></h2>
        <?php
        if (isset($error_message) && $error_message !== "") {
            echo "<div class=\"alert alert-danger mb-3\"><ul class=\"m-0\">$error_message</ul></div>";
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control"
                       value="<?php echo isset($nama) ? $nama : ''; ?>" placeholder="Masukkan Nama Kamu">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control"
                       value="<?php echo isset($username) ? $username : ''; ?>" placeholder="Masukkan Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                       value="<?php echo isset($password) ? $password : ''; ?>" placeholder="Masukkan Password">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Masukkan Email">
            </div>
            <div class="mb-3">
                <label for="telpon" class="form-label">Telpon</label>
                <input type="text" name="telpon" id="telpon" class="form-control"
                       value="<?php echo isset($telpon) ? $telpon : ''; ?>" placeholder="Contoh: 08123456789">
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
