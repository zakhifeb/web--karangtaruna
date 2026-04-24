<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Calon Ketua</title>

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
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
}

/* Dekorasi */
body::before{
    content:'';
    position:absolute;
    top:-70px;
    right:-70px;
    width:220px;
    height:220px;
    background:rgba(255,255,255,.12);
    border-radius:50%;
}

body::after{
    content:'';
    position:absolute;
    bottom:-80px;
    left:-80px;
    width:260px;
    height:260px;
    border:24px solid rgba(255,255,255,.10);
    border-radius:50%;
}

/* Wrapper */
.wrapper{
    width:100%;
    max-width:950px;
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

.btn-back{
    text-decoration:none;
    background:white;
    color:#2563eb;
    padding:14px 22px;
    border-radius:14px;
    font-weight:700;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.btn-back:hover{
    transform:translateY(-3px);
}

/* Card */
.card{
    background:rgba(255,255,255,.95);
    border-radius:28px;
    padding:35px;
    box-shadow:0 25px 45px rgba(0,0,0,.12);
}

/* Form */
.form-group{
    margin-bottom:22px;
}

label{
    display:block;
    margin-bottom:9px;
    color:#334155;
    font-size:15px;
    font-weight:700;
}

input,
textarea{
    width:100%;
    padding:15px 16px;
    border:none;
    border-radius:14px;
    background:#f8faff;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    font-size:15px;
    outline:none;
}

input:focus,
textarea:focus{
    background:white;
    box-shadow:0 0 0 3px rgba(95,125,255,.18);
}

textarea{
    resize:none;
}

/* Tombol */
.actions{
    display:flex;
    gap:14px;
    margin-top:28px;
    flex-wrap:wrap;
}

button{
    border:none;
    cursor:pointer;
    padding:15px 24px;
    border-radius:14px;
    font-size:15px;
    font-weight:700;
    transition:.3s;
}

.btn-save{
    background:linear-gradient(90deg,#5f7dff,#5574f4);
    color:white;
    box-shadow:0 12px 20px rgba(90,116,244,.28);
}

.btn-save:hover{
    transform:translateY(-2px);
}

.btn-cancel{
    text-decoration:none;
    padding:15px 24px;
    border-radius:14px;
    background:#e2e8f0;
    color:#334155;
    font-weight:700;
}

/* Responsive */
@media(max-width:768px){

.header{
    flex-direction:column;
    align-items:flex-start;
}

.card{
    padding:25px;
}

.actions{
    flex-direction:column;
}

button,
.btn-cancel{
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
<h1>➕ Tambah Calon Ketua</h1>
<p>Tambahkan kandidat baru untuk pemilihan ketua Karang Taruna</p>
</div>

<a href="/dashboard" class="btn-back">
🏠 Dashboard
</a>

</div>

<!-- Form -->
<div class="card">

<form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label>Nama Calon</label>
<input type="text" name="nama" placeholder="Masukkan nama calon">
</div>

<div class="form-group">
<label>Upload Foto</label>
<input type="file" name="foto">
</div>

<div class="form-group">
<label>Visi</label>
<textarea name="visi" rows="4" placeholder="Masukkan visi calon"></textarea>
</div>

<div class="form-group">
<label>Misi</label>
<textarea name="misi" rows="4" placeholder="Masukkan misi calon"></textarea>
</div>

<div class="actions">

<button type="submit" class="btn-save">
💾 Simpan Data
</button>

<a href="/candidates" class="btn-cancel">
Batal
</a>

</div>

</form>

</div>

</div>

</body>
</html>