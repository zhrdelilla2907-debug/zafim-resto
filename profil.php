<?php
session_start();

$file = "data/profil.json";

if(file_exists($file)){

    $profil = json_decode(file_get_contents($file), true);

}else{

    $profil = [

        "nama"=>"Zahra",
        "email"=>"Belum diatur",
        "status"=>"Pembeli",
        "jk"=>"Belum diatur",
        "hp"=>"Belum diatur",
        "foto"=>"gambar/default.png"

    ];

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil | ZAFIM RESTO</title>

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
margin:35px auto;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.3);

}

.foto{

width:120px;
height:120px;
border-radius:50%;
background:#ff4f87;
display:flex;
justify-content:center;
align-items:center;
font-size:65px;
margin:auto;
margin-bottom:20px;

}

.nama{

text-align:center;
font-size:34px;
font-weight:bold;
margin-bottom:20px;

}

.info{

font-size:20px;
line-height:40px;
margin-bottom:25px;

}

.bottom{

display:grid;
grid-template-columns:repeat(4,1fr);
gap:10px;
border-top:2px solid #eee;
padding-top:20px;

}

.bottom a{

text-decoration:none;
color:black;
text-align:center;
transition:.3s;

}

.bottom a:hover{

color:#ff4f87;

}

.icon{

font-size:42px;

}

.text{

font-size:18px;
margin-top:8px;

}

.foto img{

width:140px;
height:140px;

border-radius:50%;

object-fit:cover;

border:5px solid #ff4f87;

cursor:pointer;

transition:.3s;

}

.foto img:hover{

transform:scale(1.05);

}


</style>

</head>

<body>

<div class="container">

<form action="upload_foto.php" method="POST" enctype="multipart/form-data">

<div class="foto">

<label for="foto">

<img src="<?= $profil['foto']; ?>" id="preview">

</label>

<input
type="file"
id="foto"
name="foto"
accept="image/*"
onchange="previewFoto(this); this.form.submit();"
style="display:none;">

</div>


</form>

<div class="nama">
<?= $profil['nama']; ?>
</div>

<div class="info">

<p><b>Email :</b> <?= $profil['email']; ?></p>

<p><b>Sebagai :</b> <?= $profil['status']; ?></p>

<p><b>Jenis Kelamin :</b> <?= $profil['jk']; ?></p>

<p><b>No HP :</b> <?= $profil['hp']; ?></p>

</div>

<div class="bottom">

<a href="beranda.php">

<div class="icon">🏠</div>

<div class="text">Beranda</div>

</a>

<a href="riwayat_pesanan.php">

<div class="icon">🧾</div>

<div class="text">Riwayat</div>

</a>

<a href="setting.php">

<div class="icon">⚙️</div>

<div class="text">Setting</div>

</a>

<a href="logout.php" onclick="return confirm('Yakin logout?')">

<div class="icon">🚪</div>

<div class="text">Logout</div>


</div>

</div>

<script>

function previewFoto(input){

if(input.files && input.files[0]){

let reader = new FileReader();

reader.onload = function(e){

document.getElementById("preview").src = e.target.result;

}

reader.readAsDataURL(input.files[0]);

}

}

</script>

</body>

</html>