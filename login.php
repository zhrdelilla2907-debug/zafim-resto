<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    // ==========================
    // LOGIN PEMBELI
    // ==========================
    if($role=="pembeli"){

        $_SESSION['username']=$username;
        $_SESSION['role']="pembeli";

        header("Location: beranda.php");
        exit();

    }

    // ==========================
    // LOGIN ADMIN
    // ==========================
    if($role=="admin"){

        $cek=mysqli_query($koneksi,"
            SELECT * FROM user
            WHERE username='$username'
            AND password='$password'
            AND role='admin'
        ");

        if(mysqli_num_rows($cek)>0){

            $data=mysqli_fetch_assoc($cek);

            $_SESSION['id_user']=$data['id_user'];
            $_SESSION['username']=$data['username'];
            $_SESSION['role']=$data['role'];

            header("Location: dashboard_admin.php");
            exit();

        }else{

            echo "<script>
            alert('Username atau Password Admin Salah!');
            </script>";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login ZAFIM RESTO</title>

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
background-repeat:no-repeat;

height:100vh;

display:flex;
justify-content:center;
align-items:center;

}

body::before{

content:"";

position:absolute;

width:100%;
height:100%;

background:rgba(0,0,0,.45);

}

.login-box{

position:relative;

width:340px;

background:rgba(255,255,255,.95);

padding:25px;

border-radius:20px;

text-align:center;

box-shadow:0 8px 20px rgba(0,0,0,.3);

z-index:2;

}

.logo{

font-size:48px;

}

h1{

color:#ff4f87;

margin:10px 0;

}

p{

color:#666;

margin-bottom:20px;

}

input[type=text],
input[type=password]{

width:100%;

padding:12px;

margin-bottom:15px;

border:1px solid #ccc;

border-radius:10px;

font-size:15px;

outline:none;

}

.role{

display:flex;

gap:10px;

margin-bottom:20px;

}

.role input{

display:none;

}

.role label{

flex:1;

padding:12px;

border:2px solid #ff4f87;

border-radius:10px;

cursor:pointer;

font-weight:bold;

color:#ff4f87;

transition:.3s;

}

.role input:checked + label{

background:#ff4f87;

color:white;

}

button{

width:100%;

padding:12px;

background:#ff4f87;

color:white;

border:none;

border-radius:10px;

font-size:17px;

cursor:pointer;

transition:.3s;

}

button:hover{

background:#ff2f70;

}

</style>

</head>

<body>

<div class="login-box">

<div class="logo">
🍽
</div>

<h1>ZAFIM RESTO</h1>

<p>Silahkan Login</p>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<div class="role">

<input
type="radio"
id="pembeli"
name="role"
value="pembeli"
checked>

<label for="pembeli">

👤 Pembeli

</label>

<input
type="radio"
id="admin"
name="role"
value="admin">

<label for="admin">

🛠 Admin

</label>

</div>

<button
type="submit"
name="login">

LOGIN

</button>

</form>

</div>

</body>

</html>