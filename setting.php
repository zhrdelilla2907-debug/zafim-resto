<?php
session_start();

$file = "data/profil.json";

// Jika file belum ada, buat data default
if(!file_exists($file)){

    $profil = [

        "nama"=>"Zahra",

        "email"=>"Belum diatur",

        "status"=>"Pembeli",

        "jk"=>"Belum diatur",

        "hp"=>"Belum diatur",

        "foto"=>"gambar/default.png"

    ];

    file_put_contents($file, json_encode($profil, JSON_PRETTY_PRINT));

}

// Ambil data dari JSON
$profil = json_decode(file_get_contents($file), true);

// Simpan perubahan
if(isset($_POST['simpan'])){

    $profil['nama'] = $_POST['nama'];

    $profil['email'] = $_POST['email'];

    $profil['status'] = $_POST['status'];

    $profil['jk'] = $_POST['jk'];

    $profil['hp'] = $_POST['hp'];

    file_put_contents($file, json_encode($profil, JSON_PRETTY_PRINT));

    header("Location: profil.php");

    exit;

}
?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Setting Profil | ZAFIM RESTO</title>

<style>

*{

margin:0;

padding:0;

box-sizing:border-box;

font-family:Arial,sans-serif;

}

body{

background:url("gambar/restoran.jpg");

background-size:cover;

background-position:center;

background-attachment:fixed;

}

body::before{

content:"";

position:fixed;

top:0;

left:0;

width:100%;

height:100%;

background:rgba(0,0,0,.45);

z-index:-1;

}

.container{

width:430px;

margin:40px auto;

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 20px rgba(0,0,0,.3);

}

h2{

text-align:center;

color:#ff4f87;

margin-bottom:25px;

}

label{

display:block;

margin-top:15px;

font-weight:bold;

color:#444;

}

input,
select{

width:100%;

padding:12px;

margin-top:6px;

border:1px solid #ccc;

border-radius:10px;

font-size:16px;

}

button{

width:100%;

margin-top:25px;

padding:15px;

border:none;

border-radius:10px;

background:#ff4f87;

color:white;

font-size:18px;

cursor:pointer;

transition:.3s;

}

button:hover{

background:#ff2f70;

}

</style>

</head>

<body>

<div class="container">

<h2>⚙️ Setting Profil</h2>

<form method="POST">

<label>👤 Nama</label>

<input
type="text"
name="nama"
value="<?= $profil['nama']; ?>"
required>

<label>📧 Email</label>

<input
type="email"
name="email"
value="<?= $profil['email']; ?>">

<label>🛒 Status</label>

<select name="status">

<option value="Pembeli" <?= $profil['status']=="Pembeli"?"selected":""; ?>>
Pembeli
</option>

<option value="Member" <?= $profil['status']=="Member"?"selected":""; ?>>
Member
</option>

<option value="VIP" <?= $profil['status']=="VIP"?"selected":""; ?>>
VIP
</option>

</select>

<label>⚧ Jenis Kelamin</label>

<select name="jk">

<option value="Perempuan" <?= $profil['jk']=="Perempuan"?"selected":""; ?>>
Perempuan
</option>

<option value="Laki-laki" <?= $profil['jk']=="Laki-laki"?"selected":""; ?>>
Laki-laki
</option>

</select>

<label>📱 Nomor HP</label>

<input
type="text"
name="hp"
value="<?= $profil['hp']; ?>">

<button type="submit" name="simpan">

💾 Simpan Perubahan

</button>

</form>

<a href="profil.php" style="

display:block;

margin-top:20px;

text-align:center;

text-decoration:none;

background:white;

color:#ff4f87;

padding:15px;

border:2px solid #ff4f87;

border-radius:10px;

font-size:18px;

font-weight:bold;

transition:.3s;

">

⬅ Kembali ke Profil

</a>

</div>

</body>

</html>