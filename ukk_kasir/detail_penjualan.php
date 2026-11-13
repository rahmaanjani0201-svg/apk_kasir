<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "SELECT detail_penjualan.*, produk.nama_produk
    FROM detail_penjualan
    JOIN produk
    ON detail_penjualan.produk_id = produk.produk_id
    WHERE detail_penjualan.penjualan_id='$id'"
);
?>

<h2>Detail Penjualan</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Nama Produk</th>
    <th>Jumlah</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>

<?php while ($d = mysqli_fetch_assoc($query)) { ?>

<tr>
    <td><?php echo $d['nama_produk']; ?></td>
    <td><?php echo $d['jumlah']; ?></td>
    <td><?php echo $d['harga']; ?></td>
    <td><?php echo $d['subtotal']; ?></td>
</tr>

<?php } ?>

</table>

<a href="riwayat.php">Kembali</a>