<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi,
        "INSERT INTO produk (nama_produk, harga, stok)
        VALUES ('$nama', '$harga', '$stok')"
    );

    if ($query) {
        header("Location: produk.php");
        exit;
    } else {
        echo "Gagal menambahkan produk!";
    }
}
?>

<h2>Tambah Produk</h2>

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

    <button type="submit" name="simpan">Simpan</button>

</form>