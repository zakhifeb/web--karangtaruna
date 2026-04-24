<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pemilih</title>

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
    max-width:1280px;
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

.btn{
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

.btn:hover{
    transform:translateY(-3px);
}

/* Alert */
.alert{
    background:#dcfce7;
    color:#166534;
    padding:16px 20px;
    border-radius:18px;
    margin-bottom:22px;
    font-weight:700;
}

/* Card */
.card{
    background:rgba(255,255,255,.96);
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 25px 45px rgba(0,0,0,.12);
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
    font-size:13px;
    font-weight:700;
}

.success{
    background:#dcfce7;
    color:#166534;
}

.danger{
    background:#fee2e2;
    color:#991b1b;
}

/* Tombol aksi */
.aksi{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

.btn-hapus{
    border:none;
    background:#ef4444;
    color:white;
    padding:10px 14px;
    border-radius:12px;
    font-size:13px;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
}

.btn-hapus:hover{
    background:#dc2626;
    transform:translateY(-2px);
}

/* Responsive */
@media(max-width:900px){

.header{
    flex-direction:column;
    align-items:flex-start;
}

.btn{
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
<h1>👥 Data Pemilih</h1>
<p>Daftar akun pemilih yang sudah terdaftar di sistem voting</p>
</div>

<a href="/dashboard" class="btn">
🏠 Dashboard
</a>

</div>

@if(session('success'))
<div class="alert">
{{ session('success') }}
</div>
@endif

<!-- Table -->
<div class="card">

<div class="table-wrap">

<table>

<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>NIK</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td class="nama">
{{ $item->name }}
</td>

<td>
{{ $item->email }}
</td>

<td>

@php
$vote = \App\Models\Vote::where('user_id',$item->id)->first();
@endphp

@if($vote)

<span class="badge success">
✔ Sudah Voting
</span>

@else

<span class="badge danger">
✘ Belum Voting
</span>

@endif

</td>

<td>

<div class="aksi">

<form action="{{ route('voters.destroy',$item->id) }}" method="POST"
onsubmit="return confirm('Yakin ingin menghapus data pemilih ini?')">

@csrf
@method('DELETE')

<button type="submit" class="btn-hapus">
🗑 Hapus
</button>

</form>

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