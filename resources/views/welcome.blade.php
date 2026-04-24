<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beranda Voting Ketua</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:linear-gradient(135deg,#4f46e5,#2563eb,#0f172a);
min-height:100vh;
color:white;
overflow-x:hidden;
}

/* Navbar */
nav{
width:100%;
padding:22px 8%;
display:flex;
justify-content:space-between;
align-items:center;
position:fixed;
top:0;
left:0;
z-index:100;
background:rgba(255,255,255,.08);
backdrop-filter:blur(12px);
}

.logo{
font-size:28px;
font-weight:800;
letter-spacing:.5px;
}

.nav-btn{
display:flex;
gap:15px;
}

.btn{
padding:12px 22px;
border-radius:12px;
text-decoration:none;
font-weight:700;
transition:.3s;
}

.login{
background:white;
color:#2563eb;
}

.register{
border:1px solid rgba(255,255,255,.3);
color:white;
}

.btn:hover{
transform:translateY(-3px);
}

/* Hero */
.hero{
min-height:100vh;
display:flex;
align-items:center;
justify-content:space-between;
padding:120px 8% 50px;
gap:50px;
flex-wrap:wrap;
}

.hero-left{
flex:1;
min-width:320px;
}

.badge{
display:inline-block;
background:rgba(255,255,255,.12);
padding:10px 18px;
border-radius:50px;
font-size:14px;
margin-bottom:25px;
backdrop-filter:blur(10px);
}

.hero-left h1{
font-size:58px;
line-height:1.1;
font-weight:900;
margin-bottom:20px;
}

.hero-left h1 span{
color:#facc15;
}

.hero-left p{
font-size:18px;
color:#dbeafe;
line-height:1.8;
max-width:580px;
margin-bottom:35px;
}

.hero-buttons{
display:flex;
gap:18px;
flex-wrap:wrap;
}

.hero-buttons a{
padding:15px 28px;
border-radius:14px;
text-decoration:none;
font-weight:700;
transition:.3s;
}

.start{
background:white;
color:#2563eb;
}

.learn{
border:1px solid rgba(255,255,255,.25);
color:white;
}

.hero-buttons a:hover{
transform:translateY(-4px);
}

/* Right card */
.hero-right{
flex:1;
min-width:320px;
display:flex;
justify-content:center;
}

.card{
width:100%;
max-width:430px;
background:rgba(255,255,255,.12);
backdrop-filter:blur(18px);
padding:35px;
border-radius:28px;
box-shadow:0 20px 50px rgba(0,0,0,.18);
}

.card h3{
font-size:28px;
margin-bottom:18px;
}

.card-box{
background:white;
color:#1e293b;
padding:20px;
border-radius:18px;
margin-top:15px;
}

.card-box h4{
font-size:22px;
margin-bottom:8px;
}

.card-box p{
color:#64748b;
line-height:1.7;
}

/* Section bawah */
.section{
padding:60px 8%;
background:white;
color:#0f172a;
}

.title{
text-align:center;
font-size:38px;
font-weight:800;
margin-bottom:45px;
}

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:25px;
}

.feature{
background:#f8fafc;
padding:28px;
border-radius:22px;
box-shadow:0 10px 25px rgba(0,0,0,.05);
transition:.3s;
}

.feature:hover{
transform:translateY(-8px);
}

.feature h4{
font-size:22px;
margin-bottom:12px;
color:#2563eb;
}

.feature p{
color:#64748b;
line-height:1.7;
}

/* Footer */
footer{
text-align:center;
padding:25px;
background:#0f172a;
color:#cbd5e1;
font-size:14px;
}

/* Responsive */
@media(max-width:768px){

.hero{
padding-top:140px;
text-align:center;
}

.hero-left h1{
font-size:42px;
}

.hero-buttons{
justify-content:center;
}

nav{
flex-direction:column;
gap:15px;
}

}
</style>
</head>
<body>

<!-- Navbar -->
<nav>
<div class="logo">🗳 Voting Digital</div>

<div class="nav-btn">
<a href="{{ route('login') }}" class="btn login">Masuk</a>
<a href="{{ route('register') }}" class="btn register">Daftar</a>
</div>
</nav>

<!-- Hero -->
<section class="hero">

<div class="hero-left">

<div class="badge">
✨ Sistem Pemilihan Modern & Transparan
</div>

<h1>
Pilih Ketua <span>Karang Taruna</span><br>
Secara Digital
</h1>

<p>
Gunakan sistem voting online yang cepat, aman, dan profesional.
Setiap suara sangat berarti untuk masa depan organisasi.
</p>

<div class="hero-buttons">
<a href="{{ route('login') }}" class="start">Mulai Voting</a>
<a href="#fitur" class="learn">Lihat Fitur</a>
</div>

</div>

<div class="hero-right">

<div class="card">

<h3>📊 Statistik Sistem</h3>

<div class="card-box">
<h4>100% Transparan</h4>
<p>Perhitungan suara otomatis dan realtime tanpa manipulasi data.</p>
</div>

<div class="card-box">
<h4>⚡ Cepat & Mudah</h4>
<p>Pemilih cukup login menggunakan akun lalu pilih kandidat.</p>
</div>

</div>

</div>

</section>

<!-- Fitur -->
<section class="section" id="fitur">

<h2 class="title">Kenapa Memilih Sistem Ini?</h2>

<div class="grid">

<div class="feature">
<h4>🔒 Aman</h4>
<p>Setiap akun hanya dapat memilih satu kali dengan keamanan login.</p>
</div>

<div class="feature">
<h4>📈 Realtime</h4>
<p>Hasil voting langsung masuk ke dashboard admin secara otomatis.</p>
</div>

<div class="feature">
<h4>📱 Responsive</h4>
<p>Tampilan nyaman digunakan di laptop maupun smartphone.</p>
</div>

<div class="feature">
<h4>🎯 Profesional</h4>
<p>Desain modern seperti sistem pemilihan sungguhan.</p>
</div>

</div>

</section>

<footer>
© 2026 Sistem Voting Ketua Karang Taruna
</footer>

</body>
</html>