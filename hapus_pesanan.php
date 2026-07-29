<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
DELETE FROM pesanan
WHERE id_pesanan='$id'
");

echo "<script>

alert('Pesanan berhasil dihapus');

window.location='kelola_pesanan.php';

</script>";
?>