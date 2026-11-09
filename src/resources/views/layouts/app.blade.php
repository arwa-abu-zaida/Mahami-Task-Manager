<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff5f8">
    <title>{{ config('app.name', 'مَهامي') }} | إدارة المهام</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        :root {
            --pink: #e9afc7;
            --pink-dark: #c76b94;
            --pink-soft: #f8dce8;
            --ink: #713b53;
            --muted: #987b89;
            --bg: #fff5f8;
            --white: #fff;
            --line: #f2dce6;
            --green: #4f9b79;
        }
        * { box-sizing: border-box; font-family: 'Tajawal', sans-serif; }
        body { margin: 0; background: var(--bg); color: var(--ink); min-height: 100vh; }
        button, input, textarea { font: inherit; }
        .topbar { background: rgba(255,255,255,.88); border-bottom: 1px solid var(--line); padding: 17px 5%; display:flex; align-items:center; justify-content:space-between; }
        .brand { display:flex; align-items:center; gap:10px; font-size:22px; font-weight:800; }
        .brand-mark { width:38px; height:38px; display:grid; place-items:center; border-radius:13px; background:var(--pink-soft); }
        .top-note { color:var(--muted); font-size:14px; }
        .container { width:min(1080px, 92%); margin:38px auto 60px; }
        .hero { display:flex; justify-content:space-between; align-items:end; gap:20px; margin-bottom:26px; }
        h1 { margin:0 0 7px; font-size:32px; }
        .subtitle { margin:0; color:var(--muted); }
        .stats { display:grid; grid-template-columns:repeat(3,1fr); gap:15px; margin-bottom:22px; }
        .stat, .panel, .task-card { background:var(--white); border:1px solid var(--line); border-radius:18px; box-shadow:0 7px 24px rgba(113,59,83,.045); }
        .stat { padding:18px 20px; }
        .stat-label { color:var(--muted); font-size:14px; }
        .stat-number { display:block; font-size:29px; font-weight:800; margin-top:5px; }
        .panel { padding:22px; margin-bottom:22px; }
        .panel h2 { margin:0 0 16px; font-size:20px; }
        .form-grid { display:grid; grid-template-columns:1fr 1fr auto; gap:12px; align-items:start; }
        .field { width:100%; border:1px solid var(--line); background:#fffafd; color:var(--ink); border-radius:12px; padding:12px 14px; outline:none; }
        .field:focus { border-color:var(--pink-dark); box-shadow:0 0 0 3px rgba(233,175,199,.22); }
        textarea.field { min-height:46px; resize:vertical; }
        .btn { border:0; border-radius:12px; padding:12px 19px; cursor:pointer; font-weight:700; transition:.2s; }
        .btn-primary { background:var(--pink-dark); color:white; }
        .btn-primary:hover { background:#b95782; transform:translateY(-1px); }
        .btn-light { background:var(--pink-soft); color:var(--ink); }
        .btn-danger { background:#fff0f1; color:#b84f62; }
        .task-list { display:grid; gap:12px; }
        .task-card { padding:17px 19px; display:flex; align-items:center; justify-content:space-between; gap:15px; }
        .task-main { display:flex; align-items:flex-start; gap:13px; min-width:0; }
        .task-check { width:21px; height:21px; accent-color:var(--pink-dark); margin-top:4px; cursor:pointer; flex-shrink:0; }
        .task-title { font-weight:700; font-size:17px; overflow-wrap:anywhere; }
        .task-description { color:var(--muted); font-size:14px; margin-top:4px; overflow-wrap:anywhere; }
        .completed .task-title { text-decoration:line-through; color:#a99aa1; }
        .status { display:inline-block; margin-top:7px; border-radius:20px; padding:3px 10px; font-size:12px; background:#fff0f5; color:var(--pink-dark); }
        .completed .status { background:#edf8f2; color:var(--green); }
        .actions { display:flex; gap:7px; flex-shrink:0; }
        .actions .btn { padding:8px 12px; font-size:13px; }
        .edit-box { width:100%; display:grid; grid-template-columns:1fr 1fr auto; gap:8px; }
        .flash { background:#f0faf4; color:#397b5e; border:1px solid #d7efdf; padding:12px 15px; border-radius:12px; margin-bottom:16px; }
        .error { color:#bd5369; font-size:13px; margin-top:5px; }
        .empty { text-align:center; color:var(--muted); padding:35px 15px; background:white; border:1px dashed var(--pink); border-radius:17px; }
        .footer { text-align:center; color:#ad929f; font-size:13px; padding:25px; }
        @media(max-width:720px) {
            .hero { align-items:flex-start; flex-direction:column; }
            .stats { gap:8px; }
            .stat { padding:13px; }
            .stat-number { font-size:23px; }
            .form-grid, .edit-box { grid-template-columns:1fr; }
            .task-card { align-items:flex-start; flex-direction:column; }
            .actions { width:100%; }
            .actions .btn { flex:1; }
            h1 { font-size:27px; }
            .top-note { display:none; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="brand"><span class="brand-mark">🌸</span><span>مَهامي</span></div>
        <div class="top-note">خطوة صغيرة كل يوم تصنع إنجازاً كبيراً</div>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

    <footer class="footer">صُنع بحب 💗 — مَهامي لإدارة المهام</footer>
    @livewireScripts
</body>
</html>
