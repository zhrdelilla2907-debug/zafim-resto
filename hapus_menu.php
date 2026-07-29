<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM menu WHERE id='$id'");

echo "<script>
alert('Menu berhasil dihapus');
window.location='kelola_menu.php';
</script>";
?>