<?php
session_start();

$nama    = $_POST['nama'];
$status  = $_POST['status'];
$meja    = $_POST['meja'];
$alamat  = $_POST['alamat'];
$metode  = $_POST['metode'];

$total = 0;

if(isset($_SESSION['keranjang'])){

    foreach($_SESSION['keranjang'] as $item){

        $total += $item['harga'] * $item['jumlah'];

    }

}

$_SESSION['pesanan'] = [

    "nama" => $nama,

    "status" => $status,

    "meja" => $meja,

    "alamat" => $alamat,

    "metode" => $metode,

    "total" => $total,

    "status_pesanan" => "Sedang Diproses"

];

// Simpan ke riwayat pesanan
$_SESSION['riwayat'][] = [
    "nama"   => $nama,
    "status" => $_POST['status'],
    "menu"   => $_SESSION['keranjang'],
    "total"  => $total
];

unset($_SESSION['keranjang']);

header("Location: status_pesanan.php");

exit;
?>