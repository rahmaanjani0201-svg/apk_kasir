<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<h2>Data Produk</h2>

<a href="dashboard.php">Dashboard</a>
<a href="tambah_produk.php">Tambah Produk</a>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($query)) { ?>

<tr>
    <td><?php echo $data['produk_id']; ?></td>
    <td><?php echo $data['nama_produk']; ?></td>
    <td><?php echo $data['harga']; ?></td>
    <td><?php echo $data['stok']; ?></td>

    <td>
        <a href="edit_produk.php?id=<?php echo $data['produk_id']; ?>">Edit</a>

        <a href="hapus_produk.php?id=<?php echo $data['produk_id']; ?>"
        onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>