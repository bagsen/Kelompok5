<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
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
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 bg-dark">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard_Admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Service.php">Paket Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="TentangKami.php">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_Pengguna.php">Data Pengguna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Keluar</a>
          </li>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1>
                <a href="data_Pengguna.php" style="text-decoration: none;">
                    <span class="fw-normal text-dark">Data</span>
                    <span class="text-primary">pengguna</span>
                </a>
            </h1>
            <hr>
        </header>
        <section>
            <h2 class="text-center">Data pengguna</h2>
            <div class="clearfix">
                <a href="add_data_pengguna.php" class="btn btn-primary float-end" style="width: 100px;">Add</a>
            </div>
            <?php
            if (isset($_GET["message"])) {
                echo "<div class=\"alert alert-success my-3\">" . $_GET["message"] . "</div>";
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped mt-4">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include("koneksi.php");
                    $query = "SELECT * FROM pengguna ORDER BY nama ASC";
                    $result = mysqli_query($link, $query);
                    if (!$result) {
                        die("Query Error: " . mysqli_errno($link) . " -" . mysqli_error($link));
                    }
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope=\"row\">$i</th>";
                        echo "<td>$data[nama]</td>";
                        echo "<td>$data[username]</td>";
                        echo "<td>$data[password]</td>";
                        echo "<td>$data[email]</td>";
                        echo "<td>$data[telpon]</td>";
                        echo "<td class=\"text-center\">
                                <form action=\"update_pengguna.php\" method=\"post\" class=\"d-inline-block mb-2\">
                                    <input type=\"hidden\" name=\"id\" value=\"$data[id]\">
                                    <input type=\"submit\" name=\"submit\" value=\"Update\" style=\"width:80px\" class=\"btn btn-info text-white\">
                                </form>
                                <form action=\"delete_pengguna.php\" method=\"post\" class=\"d-inline-block\">
                                    <input type=\"hidden\" name=\"id\" value=\"$data[id]\">
                                    <input type=\"submit\" name=\"submit\" value=\"Delete\" style=\"width:80px\" class=\"btn btn-danger\">
                                </form>
                              </td>";
                        echo "</tr>";
                        $i++;
                    }
                    mysqli_free_result($result);
                    mysqli_close($link);
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>
