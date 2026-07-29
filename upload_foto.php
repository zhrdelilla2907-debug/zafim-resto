<?php
session_start();

// Lokasi file JSON
$file = "data/profil.json";

// Ambil data profil
$profil = json_decode(file_get_contents($file), true);

if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    $namaBaru = "foto_".time().".".$ext;

    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/".$namaBaru);

    // Simpan nama foto ke JSON
    $profil['foto'] = "uploads/".$namaBaru;

    file_put_contents($file, json_encode($profil, JSON_PRETTY_PRINT));

}

header("Location: profil.php");
exit;
?>