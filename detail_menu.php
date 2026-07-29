<?php
include "koneksi.php";

if(!isset($_GET['id'])){
    header("Location: beranda.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi,"SELECT * FROM menu WHERE id='$id'");
$menu = mysqli_fetch_assoc($query);

if(!$menu){
    echo "Menu tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Menu | ZAFIM RESTO</title>

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

.header{
width:100%;
height:80px;
background:linear-gradient(90deg,#ff4f87,#ff6f91);
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:38px;
font-weight:bold;
box-shadow:0 3px 10px rgba(0,0,0,.3);
}

.container{
width:550px;
margin:35px auto;
background:white;
border-radius:25px;
padding:30px;
box-shadow:0 10px 30px rgba(0,0,0,.35);
}

.judul{
text-align:center;
font-size:34px;
font-weight:bold;
color:#ff4f87;
margin-bottom:25px;
}

.foto{
width:100%;
height:300px;
border-radius:18px;
object-fit:cover;
box-shadow:0 5px 15px rgba(0,0,0,.2);
}

.nama{
text-align:center;
font-size:40px;
font-weight:bold;
margin-top:20px;
color:#ff4f87;
}

.harga{
width:200px;
margin:18px auto;
padding:12px;
background:#ff4f87;
color:white;
border-radius:10px;
font-size:30px;
font-weight:bold;
text-align:center;
}

.garis{
margin:25px 0;
border-top:2px dashed #ddd;
}

.subjudul{
font-size:25px;
font-weight:bold;
color:#ff4f87;
margin-bottom:12px;
}

.deskripsi{
font-size:18px;
line-height:30px;
color:#555;
}

.jumlah{
margin-top:30px;
}

.jumlah h3{
color:#ff4f87;
margin-bottom:15px;
font-size:24px;
}

.box-jumlah{
display:flex;
justify-content:center;
align-items:center;
gap:20px;
}

.box-jumlah button{
width:50px;
height:50px;
border:none;
border-radius:50%;
background:#ff4f87;
color:white;
font-size:28px;
cursor:pointer;
transition:.3s;
}

.box-jumlah button:hover{
background:#ff2f70;
}

#jumlah{
font-size:28px;
font-weight:bold;
width:50px;
text-align:center;
}

.total{
margin-top:35px;
background:#ffe5ee;
padding:18px;
border-radius:12px;
display:flex;
justify-content:space-between;
font-size:24px;
font-weight:bold;
color:#ff4f87;
}

.back{
position:absolute;
left:30px;
top:22px;
text-decoration:none;
font-size:35px;
color:white;
font-weight:bold;
}

/* Tombol Favorit */

.footer-button{
display:flex;
justify-content:center;
margin-top:30px;
margin-bottom:30px;
}

.btn-favorit{
width:100%;
padding:16px;
border:2px solid #ff4f87;
background:white;
color:#ff4f87;
font-size:20px;
font-weight:bold;
border-radius:14px;
cursor:pointer;
transition:.3s;
}

.btn-favorit:hover{
background:#ffe4ef;
}

/* Navbar bawah */

.navbar{
margin-top:20px;
display:flex;
justify-content:space-around;
align-items:center;
background:white;
padding:18px;
border-radius:20px;
box-shadow:0 3px 10px rgba(0,0,0,.15);
}

.navbar a{
text-decoration:none;
color:#666;
font-size:18px;
font-weight:bold;
text-align:center;
transition:.3s;
}

.navbar a:hover{
color:#ff4f87;
transform:translateY(-3px);
}

.nav-btn{
background:none;
border:none;
color:#666;
font-size:18px;
font-weight:bold;
cursor:pointer;
}

.nav-btn:hover{
color:#ff4f87;
transform:translateY(-3px);
}

</style>

</head>

<body>

<div class="header">

<a href="javascript:history.back()" class="back">
❮
</a>

🍽 ZAFIM RESTO

</div>

<div class="container">

<div class="judul">
Detail Menu
</div>

<img
class="foto"
src="gambar/<?php echo $menu['gambar']; ?>">

<div class="nama">
<?php echo $menu['nama_menu']; ?>
</div>

<div class="harga">
Rp <?php echo number_format($menu['harga']); ?>
</div>

<div class="garis"></div>

<div class="subjudul">
📄 Deskripsi
</div>

<div class="deskripsi">
<?php echo $menu['deskripsi']; ?>
</div>

<div class="garis"></div>

<div class="jumlah">

<h3>🛒 Jumlah Pesanan</h3>

<div class="box-jumlah">

<button onclick="kurang()">-</button>

<div id="jumlah">1</div>

<button onclick="tambah()">+</button>

</div>

</div>

<div class="total">

<span>Total Harga</span>

<span id="total">
Rp <?php echo number_format($menu['harga']); ?>
</span>

</div>
<div style="text-align:center;margin-top:20px;">

<div style="text-align:center;margin-top:20px;">

<button
id="favorit"
type="button"
onclick="favorit()"
style="padding:12px 25px;
border:2px solid #ff4f87;
border-radius:12px;
background:white;
color:#ff4f87;
font-size:20px;
font-weight:bold;
cursor:pointer;">

<span id="love">🤍</span> Tambah Favorit

</button>

</div>

<form action="proses_keranjang.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $menu['id']; ?>">

    <input type="hidden" name="nama" value="<?php echo $menu['nama_menu']; ?>">

    <input type="hidden" name="harga" value="<?php echo $menu['harga']; ?>">

    <input type="hidden" name="jumlah" id="jumlahInput" value="1">

</form>



<script>

let jumlah = 1;

let harga = <?php echo $menu['harga']; ?>;

function tampilkan(){

document.getElementById("jumlah").innerHTML = jumlah;

document.getElementById("jumlahNavbar").value = jumlah;

document.getElementById("total").innerHTML =
"Rp " + (harga * jumlah).toLocaleString('id-ID');

}

function tambah(){

jumlah++;

tampilkan();

}

function kurang(){

if(jumlah > 1){

jumlah--;

tampilkan();

}

}

let suka = false;

function favorit(){

const love = document.getElementById("love");

if(suka){

love.innerHTML = "🤍";

suka = false;

}else{

love.innerHTML = "❤️";

suka = true;

}

}

tampilkan();

</script>

<<div class="navbar">

<a href="beranda.php">
🏠<br>
Home
</a>

<form action="proses_keranjang.php" method="POST">

<input type="hidden" name="id" value="<?php echo $menu['id']; ?>">
<input type="hidden" name="nama" value="<?php echo $menu['nama_menu']; ?>">
<input type="hidden" name="harga" value="<?php echo $menu['harga']; ?>">
<input type="hidden" name="jumlah" id="jumlahNavbar" value="1">

<button type="submit" class="nav-btn">
🛒<br>Keranjang
</button>

</form>

<a href="profil.php">
👤<br>
Profil
</a>

</div>

</body>

</html>