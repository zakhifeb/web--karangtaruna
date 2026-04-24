<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pilih Ketua Karang Taruna</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:linear-gradient(135deg,#5f7dff,#79a5ff);
min-height:100vh;
padding:40px 25px;
}

/* container */
.wrapper{
max-width:1300px;
margin:auto;
}

/* header */
.header{
background:rgba(255,255,255,.15);
backdrop-filter:blur(10px);
padding:25px 30px;
border-radius:20px;
margin-bottom:30px;
color:white;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.header h2{
font-size:34px;
font-weight:800;
margin-bottom:8px;
}

.header p{
font-size:17px;
opacity:.95;
}

/* alert */
.alert{
padding:15px 20px;
border-radius:12px;
margin-bottom:20px;
font-weight:600;
}

.success{
background:#d1fae5;
color:#065f46;
}

.error{
background:#fee2e2;
color:#991b1b;
}

/* grid */
.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
gap:25px;
}

/* card */
.card{
background:white;
border-radius:22px;
overflow:hidden;
box-shadow:0 15px 30px rgba(0,0,0,.08);
transition:.3s;
}

.card:hover{
transform:translateY(-6px);
box-shadow:0 20px 35px rgba(0,0,0,.12);
}

.card img{
width:100%;
height:260px;
object-fit:cover;
}

.content{
padding:25px;
}

.nama{
font-size:28px;
font-weight:800;
color:#1e293b;
margin-bottom:18px;
}

.label{
font-weight:700;
color:#4f46e5;
}

.text{
color:#555;
line-height:1.7;
margin-bottom:12px;
font-size:15px;
}

/* button */
button{
width:100%;
margin-top:15px;
padding:15px;
border:none;
border-radius:14px;
background:linear-gradient(90deg,#5f7dff,#5574f4);
color:white;
font-size:18px;
font-weight:700;
cursor:pointer;
transition:.3s;
box-shadow:0 10px 20px rgba(90,116,244,.25);
}

button:hover{
transform:translateY(-2px);
}

/* responsive */
@media(max-width:768px){

.header h2{
font-size:26px;
}

.card img{
height:220px;
}

.nama{
font-size:24px;
}

}
</style>

</head>
<body>

<div class="wrapper">

<!-- Header -->
<div class="header">
<h2>🗳 Pilih Ketua Karang Taruna</h2>
<p>Gunakan hak suara Anda dengan bijak. Pilih kandidat terbaik untuk masa depan organisasi.</p>
</div>

@if(session('success'))
<div class="alert success">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert error">
{{ session('error') }}
</div>
@endif

<!-- Kandidat -->
<div class="grid">

@foreach($data as $item)

<div class="card">

@if($item->foto)
<img src="{{ asset('storage/'.$item->foto) }}">
@endif

<div class="content">

<div class="nama">
{{ $item->nama }}
</div>

<div class="text">
<span class="label">Visi:</span><br>
{{ $item->visi }}
</div>

<div class="text">
<span class="label">Misi:</span><br>
{{ $item->misi }}
</div>

<form action="/vote" method="POST">
@csrf

<input type="hidden" name="candidate_id" value="{{ $item->id }}">

<button type="submit">
Pilih Kandidat
</button>

</form>

</div>
</div>

@endforeach

</div>

</div>

</body>
</html>