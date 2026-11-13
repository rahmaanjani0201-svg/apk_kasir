<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "SELECT * FROM produk WHERE produk_id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (isset($_POST['ubah'])) {

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi,
        "UPDATE produk SET
        nama_produk='$nama',
        harga='$harga',
        stok='$stok'
        WHERE produk_id='$id'"
    );

    if ($query) {
        header("Location: produk.php");
        exit;
    }
}
?>

<h2>Edit Produk</h2>

<form method="POST">

    Nama Produk:
    <input type="text" name="nama_produk"
    value="<?php echo $data['nama_produk']; ?>">

    <br><br>

    Harga:
    <input type="number" name="harga"
    value="<?php echo $data['harga']; ?>">

    <br><br>

    Stok:
    <input type="number" name="stok"
    value="<?php echo $data['stok']; ?>">

    <br><br>

    <button type="submit" name="ubah">Ubah</button>

</form>