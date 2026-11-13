<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi,
        "SELECT * FROM users WHERE username='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        header("Location: dashboard.php");
        exit;

    } else {
        echo "Username atau password salah!";
    }
}
?>

<h2>Login Kasir</h2>

<form method="POST">

    Username:
    <input type="text" name="username" required>
    <br><br>

    Password:
    <input type="password" name="password" required>
    <br><br>

    <button type="submit" name="login">Login</button>

</form>

<a href="register.php">Register</a>