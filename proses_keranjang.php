<?php
session_start();

if(!isset($_SESSION['keranjang'])){
    $_SESSION['keranjang'] = [];
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

$ada = false;

foreach($_SESSION['keranjang'] as $key => $item){

    if($item['id'] == $id){

        $_SESSION['keranjang'][$key]['jumlah'] += $jumlah;

        $ada = true;

        break;

    }

}

if(!$ada){

    $_SESSION['keranjang'][] = [

        "id"=>$id,

        "nama"=>$nama,

        "harga"=>$harga,

        "jumlah"=>$jumlah

    ];

}

header("Location: keranjang.php");

exit;
?>