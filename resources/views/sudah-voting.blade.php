<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sudah Voting</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:30px 20px;
background:linear-gradient(135deg,#5f7dff,#4f46e5,#0f172a);
overflow:hidden;
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
background:rgba(255,255,255,.08);
border-radius:50%;
}

body::after{
content:'';
position:absolute;
bottom:-120px;
left:-60px;
width:320px;
height:320px;
border:30px solid rgba(255,255,255,.06);
border-radius:50%;
}

/* Container */
.wrapper{
width:100%;
max-width:620px;
position:relative;
z-index:2;
}

/* Card */
.card{
background:rgba(255,255,255,.96);
border-radius:30px;
overflow:hidden;
box-shadow:0 25px 50px rgba(0,0,0,.18);
}

/* Header */
.top{
background:linear-gradient(135deg,#22c55e,#16a34a);
padding:45px 30px;
text-align:center;
color:white;
}

.icon{
width:90px;
height:90px;
margin:auto;
margin-bottom:18px;
border-radius:50%;
background:rgba(255,255,255,.18);
display:flex;
justify-content:center;
align-items:center;
font-size:42px;
font-weight:bold;
}

.top h1{
font-size:38px;
font-weight:800;
margin-bottom:10px;
}

.top p{
font-size:17px;
opacity:.95;
}

/* Body */
.content{
padding:40px 35px;
text-align:center;
}

.content p{
font-size:18px;
line-height:1.8;
color:#475569;
margin-bottom:28px;
}

.content span{
font-weight:800;
color:#1e293b;
}

/* Status */
.status{
background:#f0fdf4;
border:2px solid #bbf7d0;
padding:20px;
border-radius:20px;
margin-bottom:28px;
}

.status small{
display:block;
font-size:14px;
color:#64748b;
margin-bottom:8px;
}

.status h2{
font-size:24px;
font-weight:800;
color:#16a34a;
}

/* Tombol */
.btn{
display:inline-block;
text-decoration:none;
padding:16px 34px;
border-radius:14px;
font-size:17px;
font-weight:700;
background:linear-gradient(135deg,#2563eb,#1d4ed8);
color:white;
box-shadow:0 12px 25px rgba(37,99,235,.25);
transition:.3s;
}

.btn:hover{
transform:translateY(-3px);
}

/* Responsive */
@media(max-width:600px){

.top h1{
font-size:30px;
}

.content{
padding:30px 22px;
}

.content p{
font-size:16px;
}

.status h2{
font-size:20px;
}

.btn{
width:100%;
}

}
</style>
</head>

<body>

<div class="wrapper">

<div class="card">

<!-- Header -->
<div class="top">

<div class="icon">
✓
</div>

<h1>Voting Berhasil</h1>

<p>Suara Anda telah berhasil tersimpan</p>

</div>

<!-- Body -->
<div class="content">

<p>
Terima kasih telah berpartisipasi dalam
<span>Pemilihan Ketua Karang Taruna</span>.
Partisipasi Anda sangat berarti untuk kemajuan bersama.
</p>

<div class="status">
<small>Status Akun</small>
<h2>Anda Sudah Memilih</h2>
</div>

<a href="/logout"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
class="btn">
🚪 Logout
</a>

<form id="logout-form" method="POST" action="{{ route('logout') }}">
@csrf
</form>

</div>

</div>

</div>

</body>
</html>