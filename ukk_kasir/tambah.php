<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi,
    "INSERT INTO produk VALUES (
    '', '$nama', '$harga', '$stok')");

    if ($query) {
        header("Location: barang.php");
        exit;
    }
}
?>

<h2>Tambah Barang</h2>

<form method="POST">

    Nama Produk:
    <input type="text" name="nama_produk" required>
    <br><br>

    Harga:
    <input type="number" name="harga" required>
    <br><br>

    Stok:
    <input type="number" name="stok" required>
    <br><br>

    <button name="simpan">Simpan</button>

</form>