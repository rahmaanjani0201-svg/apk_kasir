<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['jual'])) {

    $pelanggan = $_POST['pelanggan_id'];
    $produk = $_POST['produk_id'];
    $jumlah = (int)$_POST['jumlah'];
    $user = $_SESSION['id'];

    $cek = mysqli_query($koneksi,
        "SELECT * FROM produk WHERE produk_id='$produk'"
    );

    $data = mysqli_fetch_assoc($cek);

    if (!$data || $jumlah < 1 || $jumlah > $data['stok']) {
        echo "Stok tidak mencukupi!";
    } else {

        $harga = $data['harga'];
        $subtotal = $harga * $jumlah;

        mysqli_begin_transaction($koneksi);

        $query1 = mysqli_query($koneksi,
            "INSERT INTO penjualan
            (tanggal_penjualan, total_harga, pelanggan_id, user_id)
            VALUES (NOW(), '$subtotal', '$pelanggan', '$user')"
        );

        if ($query1) {

            $id_penjualan = mysqli_insert_id($koneksi);

            $query2 = mysqli_query($koneksi,
                "INSERT INTO detail_penjualan
                (penjualan_id, produk_id, jumlah, harga, subtotal)
                VALUES ('$id_penjualan', '$produk',
                '$jumlah', '$harga', '$subtotal')"
            );

            $query3 = mysqli_query($koneksi,
                "UPDATE produk SET stok=stok-'$jumlah'
                WHERE produk_id='$produk'"
            );

            if ($query2 && $query3) {
                mysqli_commit($koneksi);
                header("Location: riwayat.php");
                exit;
            }
        }

        mysqli_rollback($koneksi);
        echo "Transaksi gagal!";
    }
}

$produk = mysqli_query($koneksi, "SELECT * FROM produk");
$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

<h2>Transaksi Penjualan</h2>

<form method="POST">

    Pelanggan:
    <select name="pelanggan_id" required>
        <option value="">Pilih Pelanggan</option>

        <?php while ($p = mysqli_fetch_assoc($pelanggan)) { ?>
            <option value="<?php echo $p['pelanggan_id']; ?>">
                <?php echo $p['nama_pelanggan']; ?>
            </option>
        <?php } ?>
    </select>

    <br><br>

    Produk:
    <select name="produk_id" required>
        <option value="">Pilih Produk</option>

        <?php while ($p = mysqli_fetch_assoc($produk)) { ?>
            <option value="<?php echo $p['produk_id']; ?>">
                <?php echo $p['nama_produk']; ?>
                - Rp<?php echo $p['harga']; ?>
                (Stok: <?php echo $p['stok']; ?>)
            </option>
        <?php } ?>
    </select>

    <br><br>

    Jumlah:
    <input type="number" name="jumlah" min="1" required>

    <br><br>

    <button type="submit" name="jual">Simpan Transaksi</button>

</form>

<a href="dashboard.php">Kembali</a>