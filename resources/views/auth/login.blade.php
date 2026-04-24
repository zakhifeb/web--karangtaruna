<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Voting</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

html,body{
    height:100%;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
    background:linear-gradient(135deg,#5f7dff,#79a5ff);
    overflow:auto;
    position:relative;
}

/* Dekorasi */
body::before{
    content:'';
    position:absolute;
    top:-80px;
    right:-80px;
    width:260px;
    height:260px;
    background:rgba(255,255,255,.15);
    border-radius:50%;
}

body::after{
    content:'';
    position:absolute;
    bottom:-90px;
    left:-90px;
    width:280px;
    height:280px;
    border:24px solid rgba(255,255,255,.10);
    border-radius:50%;
}

/* Card utama */
.container{
    width:100%;
    max-width:980px;
    min-height:620px;
    display:flex;
    border-radius:28px;
    overflow:hidden;
    background:rgba(255,255,255,.93);
    box-shadow:0 25px 45px rgba(0,0,0,.18);
    position:relative;
    z-index:2;
}

/* kiri */
.left{
    width:50%;
    background:linear-gradient(135deg,#5f7dff,#5574f4);
    padding:60px 50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    color:white;
    position:relative;
}

.left h1{
    font-size:56px;
    line-height:1.1;
    font-weight:800;
    margin-bottom:25px;
}

.left p{
    font-size:20px;
    line-height:1.8;
    color:#dfe7ff;
    max-width:360px;
}

.circle1{
    position:absolute;
    right:-45px;
    bottom:-45px;
    width:210px;
    height:210px;
    border:8px solid rgba(255,255,255,.75);
    border-radius:50%;
}

.circle2{
    position:absolute;
    right:28px;
    bottom:30px;
    width:58px;
    height:58px;
    background:#6ef0ff;
    border-radius:50%;
}

/* kanan */
.right{
    width:50%;
    background:#f8f9ff;
    padding:55px 50px;
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-box{
    width:100%;
    max-width:380px;
    margin:auto;
}

.logo{
    width:78px;
    height:78px;
    margin:0 auto 18px;
    border-radius:20px;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:34px;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

h2{
    text-align:center;
    font-size:34px;
    color:#2e3d61;
    margin-bottom:32px;
}

label{
    display:block;
    font-size:15px;
    color:#444;
    font-weight:600;
    margin-bottom:8px;
}

input[type=text],
input[type=password]{
    width:100%;
    padding:15px 16px;
    border:none;
    border-radius:12px;
    background:white;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    margin-bottom:18px;
    font-size:15px;
    outline:none;
}

.row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
    font-size:14px;
    color:#666;
}

.row a{
    color:#5574f4;
    text-decoration:none;
    font-weight:600;
}

button{
    width:100%;
    border:none;
    padding:16px;
    border-radius:12px;
    background:linear-gradient(90deg,#5f7dff,#5574f4);
    color:white;
    font-size:18px;
    font-weight:700;
    cursor:pointer;
    box-shadow:0 12px 20px rgba(90,116,244,.28);
}

button:hover{
    opacity:.95;
}

.bottom{
    text-align:center;
    margin-top:22px;
    color:#666;
    font-size:15px;
}

.bottom a{
    color:#5574f4;
    text-decoration:none;
    font-weight:700;
}

/* Mobile */
@media(max-width:900px){

.container{
    flex-direction:column;
    min-height:auto;
}

.left,.right{
    width:100%;
}

.left{
    padding:40px 30px;
}

.left h1{
    font-size:42px;
}

.right{
    padding:40px 25px;
}

h2{
    font-size:28px;
}

}
</style>
</head>

<body>

<div class="container">

    <!-- kiri -->
    <div class="left">

        <h1>Selamat<br>Datang</h1>

        <p>
            Masuk ke sistem pemilihan online dan gunakan hak suara Anda dengan aman, cepat, dan mudah.
        </p>

        <div class="circle1"></div>
        <div class="circle2"></div>

    </div>

    <!-- kanan -->
    <div class="right">

        <div class="form-box">

            <h2>Masuk Akun</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>NIK</label>
                <input type="text" name="nik" placeholder="Masukkan NIK">

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password">

                <div class="row">

                    <label style="display:flex;align-items:center;gap:6px;font-weight:400;margin:0;">
                        <input type="checkbox" style="width:auto;margin:0;">
                        Ingat saya
                    </label>

                    <a href="#">Lupa Password?</a>

                </div>

                <button type="submit">Masuk</button>

                <div class="bottom">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar Sekarang</a>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>