<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Calon Ketua</title>

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

/* Tombol Header */
.header-buttons{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

.btn-home,
.btn-add{
    text-decoration:none;
    padding:14px 22px;
    border-radius:14px;
    font-weight:700;
    font-size:15px;
    transition:.3s;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

.btn-home{
    background:#1e40af;
    color:white;
}

.btn-add{
    background:white;
    color:#2563eb;
}

.btn-home:hover,
.btn-add:hover{
    transform:translateY(-3px);
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

.center{
    text-align:center;
}

.no{
    font-weight:700;
}

.nama{
    font-weight:700;
    color:#1e293b;
}

/* Foto */
.photo{
    width:65px;
    height:65px;
    object-fit:cover;
    border-radius:16px;
    box-shadow:0 8px 18px rgba(0,0,0,.08);
}

.no-photo{
    width:65px;
    height:65px;
    border-radius:16px;
    background:#e2e8f0;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:26px;
}

/* Tombol aksi */
.actions{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
}

.btn{
    border:none;
    cursor:pointer;
    padding:10px 16px;
    border-radius:12px;
    font-size:14px;
    font-weight:700;
    transition:.3s;
}

.edit{
    background:#facc15;
    color:#1e293b;
    text-decoration:none;
}

.edit:hover{
    background:#eab308;
}

.delete{
    background:#ef4444;
    color:white;
}

.delete:hover{
    background:#dc2626;
}

/* Empty */
.empty{
    text-align:center;
    padding:40px;
    color:#64748b;
    font-size:16px;
}

/* Responsive */
@media(max-width:768px){

.header{
    flex-direction:column;
    align-items:flex-start;
}

.header-buttons{
    width:100%;
}

.btn-home,
.btn-add{
    flex:1;
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
<h1>👑 Data Calon Ketua</h1>
<p>Kelola daftar kandidat pemilihan ketua Karang Taruna</p>
</div>

<div class="header-buttons">

<a href="/dashboard" class="btn-home">
🏠 Dashboard
</a>

<a href="{{ route('candidates.create') }}" class="btn-add">
➕ Tambah Calon
</a>

</div>

</div>

<!-- Card -->
<div class="card">

<div class="table-wrap">

<table>

<thead>
<tr>
<th>No</th>
<th>Foto</th>
<th>Nama</th>
<th class="center">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($data as $item)

<tr>

<td class="no">
{{ $loop->iteration }}
</td>

<td>

@if($item->foto)

<img src="{{ asset('storage/'.$item->foto) }}" class="photo">

@else

<div class="no-photo">👤</div>

@endif

</td>

<td class="nama">
{{ $item->nama }}
</td>

<td class="center">

<div class="actions">

<a href="{{ route('candidates.edit',$item->id) }}" class="btn edit">
✏ Edit
</a>

<form action="{{ route('candidates.destroy',$item->id) }}" method="POST"
onsubmit="return confirm('Yakin ingin menghapus calon ini?')">

@csrf
@method('DELETE')

<button type="submit" class="btn delete">
🗑 Hapus
</button>

</form>

</div>

</td>

</tr>

@empty

<tr>
<td colspan="4" class="empty">
Belum ada data calon
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>