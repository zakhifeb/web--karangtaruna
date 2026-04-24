<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hasil Voting</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#5f7dff,#79a5ff);
    padding:40px 20px;
    position:relative;
}

/* Dekorasi */
body::before{
    content:'';
    position:absolute;
    top:-80px;
    right:-80px;
    width:240px;
    height:240px;
    background:rgba(255,255,255,.12);
    border-radius:50%;
}

body::after{
    content:'';
    position:absolute;
    bottom:-100px;
    left:-90px;
    width:280px;
    height:280px;
    border:24px solid rgba(255,255,255,.10);
    border-radius:50%;
}

/* Wrapper */
.wrapper{
    max-width:1300px;
    margin:auto;
    position:relative;
    z-index:2;
}

/* Header */
.header{
    background:rgba(255,255,255,.16);
    backdrop-filter:blur(12px);
    padding:28px 30px;
    border-radius:24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:28px;
    box-shadow:0 18px 35px rgba(0,0,0,.08);
    flex-wrap:wrap;
}

.header h1{
    font-size:34px;
    color:white;
    font-weight:800;
    margin-bottom:6px;
}

.header p{
    color:#eaf0ff;
    font-size:16px;
}

.btn-home{
    text-decoration:none;
    background:white;
    color:#2563eb;
    padding:14px 22px;
    border-radius:14px;
    font-weight:700;
    font-size:15px;
    transition:.3s;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

.btn-home:hover{
    transform:translateY(-3px);
}

/* Statistik */
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-bottom:28px;
}

.stat-box{
    background:rgba(255,255,255,.96);
    padding:28px;
    border-radius:24px;
    box-shadow:0 25px 45px rgba(0,0,0,.12);
}

.stat-box p{
    font-size:15px;
    color:#64748b;
    margin-bottom:10px;
}

.stat-box h2{
    font-size:38px;
    font-weight:800;
}

.blue{color:#2563eb;}
.green{color:#16a34a;}
.red{color:#ef4444;}

/* Card */
.card{
    background:rgba(255,255,255,.96);
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 25px 45px rgba(0,0,0,.12);
}

.card-title{
    padding:22px 28px;
    border-bottom:1px solid #e2e8f0;
    font-size:22px;
    font-weight:800;
    color:#1e293b;
}

/* Table */
.table-wrap{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#eef2ff;
}

th{
    padding:18px 20px;
    text-align:left;
    font-size:15px;
    color:#334155;
    font-weight:700;
}

td{
    padding:18px 20px;
    border-bottom:1px solid #f1f5f9;
    font-size:15px;
    color:#475569;
}

tbody tr:hover{
    background:#f8fafc;
}

.nama{
    font-weight:700;
    color:#1e293b;
}

/* Badge */
.badge{
    display:inline-block;
    padding:8px 14px;
    border-radius:999px;
    background:#dbeafe;
    color:#1d4ed8;
    font-size:13px;
    font-weight:700;
}

/* Progress */
.progress-bg{
    width:100%;
    height:12px;
    background:#e2e8f0;
    border-radius:999px;
    overflow:hidden;
    margin-bottom:8px;
}

.progress-fill{
    height:100%;
    background:linear-gradient(90deg,#22c55e,#16a34a);
    border-radius:999px;
}

.percent{
    font-size:13px;
    font-weight:700;
    color:#16a34a;
}

/* Responsive */
@media(max-width:768px){

.header{
    flex-direction:column;
    align-items:flex-start;
}

.btn-home{
    width:100%;
    text-align:center;
}

}
</style>
</head>

<body>

<div class="wrapper">

<!-- Header -->
<div class="header">

<div>
<h1>📊 Hasil Voting</h1>
<p>Rekapitulasi suara pemilihan ketua Karang Taruna</p>
</div>

<a href="/dashboard" class="btn-home">
🏠 Dashboard
</a>

</div>

<!-- Statistik -->
<div class="stats">

<div class="stat-box">
<p>Total Kandidat</p>
<h2 class="blue">{{ count($data) }}</h2>
</div>

<div class="stat-box">
<p>Total Suara Masuk</p>
<h2 class="green">{{ $total }}</h2>
</div>

<div class="stat-box">
<p>Pemenang Sementara</p>
<h2 class="red">
{{ $data->sortByDesc('votes_count')->first()->nama ?? '-' }}
</h2>
</div>

</div>

<!-- Table -->
<div class="card">

<div class="card-title">
📌 Data Perolehan Suara
</div>

<div class="table-wrap">

<table>

<thead>
<tr>
<th>No</th>
<th>Nama Kandidat</th>
<th>Suara</th>
<th>Persentase</th>
</tr>
</thead>

<tbody>

@foreach($data as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td class="nama">
{{ $item->nama }}
</td>

<td>
<span class="badge">
{{ $item->votes_count }} suara
</span>
</td>

<td>

@php
$persen = $total > 0 ? round(($item->votes_count/$total)*100,1) : 0;
@endphp

<div class="progress-bg">
<div class="progress-fill" style="width: {{ $persen }}%"></div>
</div>

<div class="percent">
{{ $persen }}%
</div>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>