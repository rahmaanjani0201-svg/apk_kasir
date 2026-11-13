<?php
include "koneksi.php";

$query = mysqli_query($koneksi,
    "SELECT penjualan.*, pelanggan.nama_pelanggan
    FROM penjualan
    LEFT JOIN pelanggan
    ON penjualan.pelanggan_id = pelanggan.pelanggan_id
    ORDER BY penjualan.penjualan_id DESC"
);
?>

<h2>Riwayat Penjualan</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID Penjualan</th>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Total Harga</th>
    <th>Detail</th>
</tr>

<?php while ($d = mysqli_fetch_assoc($query)) { ?>

<tr>
    <td><?php echo $d['penjualan_id']; ?></td>
    <td><?php echo $d['tanggal_penjualan']; ?></td>
    <td><?php echo $d['nama_pelanggan']; ?></td>
    <td>Rp<?php echo $d['total_harga']; ?></td>

    <td>
        <a href="detail_penjualan.php?id=<?php echo $d['penjualan_id']; ?>">
            Lihat Detail
        </a>
    </td>
</tr>

<?php } ?>

</table>

<a href="dashboard.php">Kembali</a>