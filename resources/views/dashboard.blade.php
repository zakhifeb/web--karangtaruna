<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#eef2ff;
}

/* Layout */
.wrapper{
display:flex;
min-height:100vh;
}

/* Sidebar */
.sidebar{
width:260px;
background:linear-gradient(180deg,#3b82f6,#1d4ed8);
color:white;
padding:30px 20px;
box-shadow:8px 0 25px rgba(0,0,0,.08);
}

.logo{
font-size:28px;
font-weight:800;
margin-bottom:35px;
text-align:center;
}

.menu a,
.menu button{
display:block;
width:100%;
text-align:left;
padding:14px 18px;
margin-bottom:12px;
border:none;
border-radius:14px;
background:rgba(255,255,255,.10);
color:white;
font-size:16px;
text-decoration:none;
cursor:pointer;
transition:.3s;
}

.menu a:hover,
.menu button:hover{
background:white;
color:#2563eb;
transform:translateX(4px);
}

.active{
background:white !important;
color:#2563eb !important;
font-weight:700;
}

/* Content */
.content{
flex:1;
padding:35px;
}

/* Header */
.header{
background:linear-gradient(135deg,#5f7dff,#79a5ff);
padding:30px;
border-radius:24px;
color:white;
margin-bottom:30px;
box-shadow:0 15px 30px rgba(79,70,229,.18);
}

.header h1{
font-size:34px;
font-weight:800;
margin-bottom:8px;
}

.header p{
font-size:16px;
opacity:.95;
}

/* Cards */
.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
padding:25px;
border-radius:22px;
box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.card p{
font-size:15px;
color:#64748b;
margin-bottom:12px;
}

.card h2{
font-size:40px;
font-weight:800;
}

.blue{color:#2563eb;}
.green{color:#16a34a;}
.purple{color:#9333ea;}
.orange{color:#f97316;}

/* Bottom Grid */
.bottom-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:22px;
}

/* Box Umum */
.box{
background:white;
padding:28px;
border-radius:22px;
box-shadow:0 10px 25px rgba(0,0,0,.06);
}

/* Winner */
.winner{
background:linear-gradient(135deg,#2563eb,#1d4ed8,#4338ca);
color:white;
position:relative;
overflow:hidden;
box-shadow:0 18px 35px rgba(37,99,235,.28);
}

.winner::before{
content:'';
position:absolute;
top:-50px;
right:-50px;
width:180px;
height:180px;
background:rgba(255,255,255,.08);
border-radius:50%;
}

.winner::after{
content:'';
position:absolute;
bottom:-60px;
left:-60px;
width:220px;
height:220px;
border:22px solid rgba(255,255,255,.06);
border-radius:50%;
}

.winner h2{
font-size:22px;
margin-bottom:15px;
position:relative;
z-index:2;
}

.winner h1{
font-size:34px;
font-weight:800;
margin-bottom:10px;
position:relative;
z-index:2;
line-height:1.4;
}

.winner p{
position:relative;
z-index:2;
font-size:16px;
}

.vote-badge{
display:inline-block;
margin-top:14px;
padding:10px 16px;
background:rgba(255,255,255,.14);
border-radius:999px;
font-size:14px;
font-weight:700;
backdrop-filter:blur(10px);
position:relative;
z-index:2;
}

/* Info */
.info h2{
margin-bottom:18px;
font-size:22px;
color:#1e293b;
}

.info ul{
line-height:2;
color:#475569;
}

/* Chart */
.chart{
grid-column:1/3;
background:linear-gradient(135deg,#ffffff,#f8fbff);
padding:30px;
border-radius:24px;
box-shadow:0 18px 35px rgba(0,0,0,.08);
position:relative;
overflow:hidden;
}

.chart::before{
content:'';
position:absolute;
top:-70px;
right:-70px;
width:180px;
height:180px;
background:#dbeafe;
border-radius:50%;
opacity:.6;
}

.chart::after{
content:'';
position:absolute;
bottom:-80px;
left:-80px;
width:200px;
height:200px;
background:#ede9fe;
border-radius:50%;
opacity:.4;
}

/* Chart Header */
.chart-header{
position:relative;
z-index:2;
display:flex;
align-items:flex-start;
justify-content:space-between;
flex-wrap:wrap;
gap:12px;
margin-bottom:20px;
}

.chart-header-left p{
font-size:13px;
color:#94a3b8;
margin:0 0 4px;
}

.chart-header-left h2{
font-size:22px;
font-weight:700;
color:#1e293b;
margin:0;
}

/* Chart Legend */
.chart-legend{
display:flex;
gap:10px;
flex-wrap:wrap;
}

.chart-legend span{
display:flex;
align-items:center;
gap:5px;
font-size:12px;
color:#475569;
}

.legend-dot{
width:10px;
height:10px;
border-radius:2px;
flex-shrink:0;
}

/* Chart Stat Cards */
.chart-stats{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:12px;
margin-bottom:22px;
position:relative;
z-index:2;
}

.chart-stat{
background:white;
border-radius:14px;
padding:14px 16px;
box-shadow:0 4px 12px rgba(0,0,0,.06);
}

.chart-stat p{
font-size:12px;
color:#64748b;
margin:0 0 6px;
}

.chart-stat h3{
font-size:22px;
font-weight:800;
margin:0;
}

/* Progress Bars */
.progress-section{
position:relative;
z-index:2;
margin-top:22px;
display:flex;
flex-direction:column;
gap:10px;
}

.progress-row{
display:flex;
align-items:center;
gap:12px;
}

.progress-rank{
font-size:11px;
font-weight:700;
min-width:18px;
text-align:center;
}

.progress-name{
font-size:13px;
color:#334155;
min-width:120px;
}

.progress-track{
flex:1;
background:#e5e7eb;
border-radius:999px;
height:8px;
overflow:hidden;
}

.progress-fill{
height:100%;
border-radius:999px;
transition:width .8s ease;
}

.progress-value{
font-size:13px;
font-weight:600;
min-width:80px;
text-align:right;
}

.progress-value small{
font-size:11px;
color:#94a3b8;
font-weight:400;
}

/* Responsive */
@media(max-width:950px){

.wrapper{
flex-direction:column;
}

.sidebar{
width:100%;
}

.bottom-grid{
grid-template-columns:1fr;
}

.chart{
grid-column:auto;
}

.chart-stats{
grid-template-columns:1fr 1fr;
}

}

@media(max-width:600px){
.chart-stats{
grid-template-columns:1fr;
}
.progress-name{
min-width:80px;
font-size:12px;
}
}
</style>
</head>

<body>

<div class="wrapper">

<!-- Sidebar -->
<div class="sidebar">

  <div class="logo">
    🗳 Voting Admin
  </div>

  <div class="menu">

    <a href="/dashboard" class="active">Dashboard</a>
    <a href="/candidates/create">Tambah Ketua</a>
    <a href="/candidates">Data Ketua</a>
    <a href="/voters">Data Pemilih</a>
    <a href="/results">Hasil Voting</a>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit">Logout</button>
    </form>

  </div>
</div>

<!-- Content -->
<div class="content">

  <!-- Header -->
  <div class="header">
    <h1>Halo, {{ Auth::user()->name }} 👋</h1>
    <p>Selamat datang di dashboard admin sistem voting online</p>
  </div>

  <!-- Statistik -->
  <div class="grid">

    <div class="card">
      <p>Total Ketua</p>
      <h2 class="blue">{{ $calon }}</h2>
    </div>

    <div class="card">
      <p>Sudah Voting</p>
      <h2 class="green">{{ $sudah }}</h2>
    </div>

    <div class="card">
      <p>Total Pemilih</p>
      <h2 class="purple">{{ $pemilih }}</h2>
    </div>

    <div class="card">
      @php
        $persen = $pemilih > 0 ? round(($sudah/$pemilih)*100) : 0;
      @endphp
      <p>Partisipasi</p>
      <h2 class="orange">{{ $persen }}%</h2>
    </div>

  </div>

  <!-- Bawah -->
  <div class="bottom-grid">

    <!-- Winner -->
    <div class="box winner">

      <h2>🏆 Pemenang Sementara</h2>

      @if($pemenang->count() > 1)

        <h1>🟡 Imbang</h1>

        <p>
          @foreach($pemenang as $item)
            {{ $item->nama }}@if(!$loop->last), @endif
          @endforeach
        </p>

        <div class="vote-badge">
          {{ $maxVote }} Suara Tertinggi
        </div>

      @else

        <h1>{{ $pemenang->first()->nama ?? '-' }}</h1>

        <div class="vote-badge">
          {{ $maxVote }} Suara
        </div>

      @endif

    </div>

    <!-- Info -->
    <div class="box info">

      <h2>📌 Informasi Sistem</h2>

      <ul>
        <li>✔ Voting hanya bisa 1 kali</li>
        <li>✔ Data masuk otomatis</li>
        <li>✔ Hasil real-time</li>
        <li>✔ Admin memantau penuh</li>
      </ul>

    </div>

    <!-- Grafik -->
    <div class="chart">

      <!-- Chart Header -->
      <div class="chart-header">
        <div class="chart-header-left">
          <p>Pemilihan Ketua</p>
          <h2>📊 Grafik Perolehan Suara</h2>
        </div>
        <div class="chart-legend" id="chartLegend"></div>
      </div>

      <!-- Mini Stat Cards -->
      <div class="chart-stats">
        <div class="chart-stat" style="border-left:4px solid #2563eb;">
          <p>Total Suara Masuk</p>
          <h3 style="color:#2563eb;">{{ $kandidat->sum('votes_count') }}</h3>
        </div>
        <div class="chart-stat" style="border-left:4px solid #f97316;">
          <p>Suara Terbanyak</p>
          <h3 style="color:#f97316;">{{ $maxVote }}</h3>
        </div>
        <div class="chart-stat" style="border-left:4px solid #16a34a;">
          <p>Partisipasi</p>
          <h3 style="color:#16a34a;">{{ $persen }}%</h3>
        </div>
      </div>

      <!-- Canvas -->
      <div style="position:relative;z-index:2;height:280px;">
        <canvas id="chartVoting" role="img" aria-label="Grafik perolehan suara tiap kandidat"></canvas>
      </div>

      <!-- Progress Bars -->
      <div class="progress-section" id="progressBars"></div>

    </div>

  </div>

</div>
</div>

<script>
const allColors  = ['#2563eb','#9333ea','#16a34a','#f97316','#ef4444','#06b6d4'];
const namaList   = {!! json_encode($kandidat->pluck('nama')) !!};
const suaraList  = {!! json_encode($kandidat->pluck('votes_count')) !!};
const totalSuara = suaraList.reduce((a,b) => a+b, 0);
const maxSuara   = Math.max(...suaraList);

/* ── Legend ── */
const legendEl = document.getElementById('chartLegend');
namaList.forEach((nama, i) => {
  const sp = document.createElement('span');
  sp.innerHTML = `
    <span class="legend-dot" style="background:${allColors[i % allColors.length]};"></span>
    ${nama.split(' ')[0]}
  `;
  sp.style.cssText = 'display:flex;align-items:center;gap:5px;font-size:12px;color:#475569;';
  legendEl.appendChild(sp);
});

/* ── Chart ── */
new Chart(document.getElementById('chartVoting'), {
  type: 'bar',
  data: {
    labels: namaList,
    datasets: [{
      label: 'Jumlah Suara',
      data: suaraList,
      backgroundColor: allColors.map((c, i) =>
        suaraList[i] === maxSuara ? c : c + '99'
      ),
      borderColor: allColors,
      borderWidth: 2,
      borderRadius: 14,
      borderSkipped: false,
      barThickness: 40,
      hoverBackgroundColor: allColors,
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: '#1e293b',
        titleColor: '#94a3b8',
        bodyColor: '#f1f5f9',
        padding: 14,
        cornerRadius: 12,
        titleFont: { size: 12 },
        bodyFont: { size: 15, weight: 'bold' },
        callbacks: {
          title: ctx => ctx[0].label,
          label: ctx => {
            const pct = totalSuara > 0 ? Math.round(ctx.raw / totalSuara * 100) : 0;
            return ` ${ctx.raw} suara  (${pct}%)`;
          }
        }
      }
    },
    scales: {
      x: {
        grid: { display: false },
        ticks: { color: '#64748b', font: { size: 12 } }
      },
      y: {
        beginAtZero: true,
        ticks: { stepSize: 1, color: '#94a3b8', font: { size: 11 } },
        grid: { color: '#e5e7eb', lineWidth: 1 },
        border: { dash: [4, 4] }
      }
    },
    animation: { duration: 900, easing: 'easeOutQuart' }
  }
});

/* ── Progress Bars ── */
const progEl = document.getElementById('progressBars');
const sorted = namaList
  .map((n, i) => ({ n, v: suaraList[i], c: allColors[i % allColors.length] }))
  .sort((a, b) => b.v - a.v);

sorted.forEach((item, rank) => {
  const pct    = totalSuara > 0 ? Math.round(item.v / totalSuara * 100) : 0;
  const isWin  = rank === 0;
  const rankColor = isWin ? '#f97316' : '#94a3b8';
  const nameWeight = isWin ? '700' : '400';

  const row = document.createElement('div');
  row.className = 'progress-row';
  row.innerHTML = `
    <span class="progress-rank" style="color:${rankColor};">${rank + 1}</span>
    <span class="progress-name" style="font-weight:${nameWeight};">${item.n}</span>
    <div class="progress-track">
      <div class="progress-fill" style="width:${pct}%;background:${item.c};"></div>
    </div>
    <span class="progress-value" style="color:${item.c};">
      ${item.v} <small>(${pct}%)</small>
    </span>
    ${isWin ? '<span style="font-size:16px;">🏆</span>' : '<span style="min-width:20px;"></span>'}
  `;
  progEl.appendChild(row);
});
</script>

</body>
</html>