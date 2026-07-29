<?php
$file="data/profil_admin.json";

$profil=json_decode(file_get_contents($file),true);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Admin | ZAFIM RESTO</title>

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

width:140px;
height:140px;
margin:auto;
margin-bottom:20px;

}

.foto img{

width:140px;
height:140px;
border-radius:50%;
object-fit:cover;
border:5px solid #ff4f87;

}

.nama{

text-align:center;
font-size:32px;
font-weight:bold;
margin-bottom:20px;

}

.info{

font-size:20px;
line-height:42px;

}

.bottom{

display:grid;
grid-template-columns:repeat(2,1fr);
gap:15px;
margin-top:30px;

}

.bottom a{

text-decoration:none;
background:#ff4f87;
color:white;
padding:15px;
border-radius:12px;
text-align:center;
font-size:18px;
transition:.3s;

}

.bottom a:hover{

background:#ff2f70;

}

</style>

</head>

<body>

<div class="container">

<div class="foto">

<img src="<?= $profil['foto']; ?>">

</div>

<div class="nama">

<?= $profil['nama']; ?>

</div>

<div class="info">

<p><b>Email :</b> <?= $profil['email']; ?></p>

<p><b>Status :</b> <?= $profil['status']; ?></p>

<p><b>No HP :</b> <?= $profil['hp']; ?></p>

</div>

<div class="bottom">

<a href="dashboard_admin.php">

🏠 Dashboard

</a>

<a href="setting_admin.php">
⚙ Setting
</a>

<a href="logout.php">

🚪 Logout

</a>

</div>

</div>

</body>

</html>