<?php
$file = "data/profil_admin.json";

// Ambil data
if(file_exists($file)){
    $profil = json_decode(file_get_contents($file), true);
}else{
    $profil = [
        "nama"=>"Admin",
        "email"=>"admin@zafimresto.com",
        "status"=>"Administrator",
        "hp"=>"08xxxxxxxxxx",
        "foto"=>"gambar/default.png"
    ];
}

// Simpan data
if(isset($_POST['simpan'])){

    $profil['nama']   = $_POST['nama'];
    $profil['email']  = $_POST['email'];
    $profil['status'] = $_POST['status'];
    $profil['hp']     = $_POST['hp'];

    // Upload Foto
    if(isset($_FILES['foto']) && $_FILES['foto']['name']!=""){

        $namaFoto = time()."_".$_FILES['foto']['name'];

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "uploads/".$namaFoto
        );

        $profil['foto'] = "uploads/".$namaFoto;
    }

    file_put_contents($file,json_encode($profil,JSON_PRETTY_PRINT));

    header("Location: profil_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Setting Profil Admin</title>

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
margin-bottom:20px;

}

label{

display:block;
margin-top:15px;
font-weight:bold;

}

input{

width:100%;
padding:12px;
margin-top:5px;
border:1px solid #ccc;
border-radius:10px;

}

button{

margin-top:20px;
width:100%;
padding:13px;
background:#ff4f87;
color:white;
border:none;
border-radius:10px;
font-size:17px;
cursor:pointer;

}

button:hover{

background:#ff2f70;

}

.kembali{

display:block;
margin-top:15px;
text-align:center;
text-decoration:none;
color:#ff4f87;
font-weight:bold;

}

</style>

</head>

<body>

<div class="container">

<h2>Setting Profil Admin</h2>

<form method="POST" enctype="multipart/form-data">

<label>Nama</label>

<input
type="text"
name="nama"
value="<?= $profil['nama']; ?>">

<label>Email</label>

<input
type="email"
name="email"
value="<?= $profil['email']; ?>">

<label>Status</label>

<input
type="text"
name="status"
value="<?= $profil['status']; ?>">

<label>No HP</label>

<input
type="text"
name="hp"
value="<?= $profil['hp']; ?>">

<label>Foto Profil</label>

<input
type="file"
name="foto">

<button
type="submit"
name="simpan">

Simpan Perubahan

</button>

</form>

<a
href="profil_admin.php"
class="kembali">

← Kembali

</a>

</div>

</body>
</html>