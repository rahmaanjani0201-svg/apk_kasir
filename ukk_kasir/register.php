<?php
include "koneksi.php";

if (isset($_POST['daftar'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $role = "petugas";

    $query = mysqli_query($koneksi,
        "INSERT INTO users (nama, username, password, role)
        VALUES ('$nama', '$username', '$password', '$role')"
    );

    if ($query) {
        header("Location: login.php");
        exit;
    } else {
        echo "Register gagal!";
    }
}
?>

<h2>Register</h2>

<form method="POST">

    Nama:
    <input type="text" name="nama" required>
    <br><br>

    Username:
    <input type="text" name="username" required>
    <br><br>

    Password:
    <input type="password" name="password" required>
    <br><br>

    <button type="submit" name="daftar">
        Daftar
    </button>

</form>

<a href="login.php">Kembali ke Login</a>