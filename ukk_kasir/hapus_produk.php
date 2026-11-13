<?php

include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "DELETE FROM produk WHERE produk_id='$id'"
);

if ($query) {
    header("Location: produk.php");
    exit;
} else {
    echo "Gagal menghapus produk!";
}

?>