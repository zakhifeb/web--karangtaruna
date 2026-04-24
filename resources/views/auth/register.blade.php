<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Akun Voting</title>

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
    max-width:1020px;
    min-height:670px;
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
    font-size:54px;
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
    padding:50px 45px;
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-box{
    width:100%;
    max-width:390px;
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
    font-size:32px;
    color:#2e3d61;
    margin-bottom:28px;
    font-weight:700;
}

label{
    display:block;
    font-size:15px;
    color:#444;
    font-weight:600;
    margin-bottom:8px;
}

input{
    width:100%;
    padding:15px 16px;
    border:none;
    border-radius:12px;
    background:white;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    margin-bottom:16px;
    font-size:15px;
    outline:none;
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
    margin-top:8px;
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

.error{
    font-size:13px;
    color:#ef4444;
    margin-top:-10px;
    margin-bottom:12px;
    display:block;
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

        <h1>Buat<br>Akun Baru</h1>

        <p>
            Daftarkan diri Anda sebagai pemilih resmi dan ikut serta dalam sistem voting online yang aman.
        </p>

        <div class="circle1"></div>
        <div class="circle2"></div>

    </div>

    <!-- kanan -->
    <div class="right">

        <div class="form-box">

            <h2>Registrasi Akun</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                <x-input-error :messages="$errors->get('name')" class="error" />

                <label>NIK</label>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan NIK">
                <x-input-error :messages="$errors->get('email')" class="error" />

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password">
                <x-input-error :messages="$errors->get('password')" class="error" />

                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="error" />

                <button type="submit">Daftar Sekarang</button>

                <div class="bottom">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Masuk</a>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>