<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>APLIKASI KASIR</h2>

<h3>
Selamat datang, <?php echo $_SESSION['nama']; ?>
</h3>

<hr>

<a href="produk.php">Data Produk</a>
<br><br>

<a href="pelanggan.php">Data Pelanggan</a>
<br><br>

<a href="penjualan.php">Transaksi Penjualan</a>
<br><br>

<a href="riwayat.php">Riwayat Penjualan</a>
<br><br>

<a href="logout.php">Logout</a>