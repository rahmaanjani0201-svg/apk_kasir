<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['no_telp'];

    $query = mysqli_query($koneksi,
        "INSERT INTO pelanggan
        (nama_pelanggan, alamat, no_telp)
        VALUES ('$nama', '$alamat', '$telp')"
    );

    if ($query) {
        header("Location: pelanggan.php");
        exit;
    }
}

$data = mysqli_query($koneksi,
    "SELECT * FROM pelanggan"
);
?>

<h2>Data Pelanggan</h2>

<form method="POST">

    Nama:
    <input type="text" name="nama_pelanggan" required>

    Alamat:
    <input type="text" name="alamat">

    No Telepon:
    <input type="text" name="no_telp">

    <button type="submit" name="simpan">Tambah</button>

</form>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No Telepon</th>
</tr>

<?php while ($d = mysqli_fetch_assoc($data)) { ?>

<tr>
    <td><?php echo $d['pelanggan_id']; ?></td>
    <td><?php echo $d['nama_pelanggan']; ?></td>
    <td><?php echo $d['alamat']; ?></td>
    <td><?php echo $d['no_telp']; ?></td>
</tr>

<?php } ?>

</table>

<a href="dashboard.php">Kembali</a>