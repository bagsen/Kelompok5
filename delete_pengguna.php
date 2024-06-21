<?php
include("koneksi.php");

if (isset($_POST["submit"])) {
    $id = htmlentities(strip_tags(trim($_POST["id"])));
    $id = mysqli_real_escape_string($link, $id);

    $query = "SELECT nama, username FROM pengguna WHERE id='$id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $nama = $data["nama"];
        $username = $data["username"];

        $query = "DELETE FROM pengguna WHERE id='$id'";
        $result = mysqli_query($link, $query);

        if ($result) {
            $message = "pengguna dengan nama \"<b>$nama</b>\" dan username \"<b>$username</b>\" sudah berhasil dihapus";
            $message = urlencode($message);
            header("Location: data_Pengguna.php?message={$message}");
        } else {
            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
        }
    } else {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
}
?>
