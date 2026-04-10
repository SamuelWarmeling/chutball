<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Comissoes | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-a: #92e5d6;
            --bg-b: #c8f3df;
            --bg-c: #eef8f0;
            --accent: #25b85a;
            --accent-blue: #3A86FF;
            --card-dark: #35395a;
            --card-light: rgba(255,255,255,.94);
            --text-main: #243044;
            --text-soft: #65748b;
            --line: rgba(36,48,68,.08);
        }
        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        body {
            margin: 0;
            font-family: "Georgia", "Times New Roman", serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),
                radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),
                radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),
                linear-gradient(180deg, var(--bg-a) 0%, var(--bg-b) 52%, var(--bg-c) 100%);
            min-height: 100vh;
            padding-bottom: 92px;
        }
        .shell { max-width: 430px; min-height: 100vh; margin: 0 auto; }
        .hero { padding: 22px 18px 12px; position: relative; overflow: hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .top-actions { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .top-actions strong { font-size: 1rem; }
        .brand-row { position:relative; z-index:1; display:flex; align-items:center; gap:14px; margin-bottom:18px; }
        .avatar { width:54px; height:54px; border-radius:50%; background:linear-gradient(135deg,#fefefe 0%,#d9f8e8 100%); display:flex; align-items:center; justify-content:center; color:var(--accent); box-shadow:0 10px 18px rgba(37,184,90,.15); border:2px solid rgba(255,255,255,.75); }
        .brand-meta small { display:block; font-size:.72rem; color:#4d6b70; margin-bottom:4px; }
        .brand-meta h1 { margin:0; font-size:1.45rem; font-weight:700; }
        .brand-meta p { margin:3px 0 0; color:#3f5961; font-size:.92rem; line-height:1.45; }
        .summary-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; border-radius:18px; padding:18px 16px; box-shadow:0 16px 30px rgba(53,57,90,.28); position:relative; overflow:hidden; }
        .summary-card::before,.summary-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .summary-card::before { width:120px; height:120px; right:-30px; bottom:-50px; }
        .summary-card::after { width:70px; height:70px; left:38%; bottom:-20px; }
        .summary-grid { position:relative; z-index:1; display:grid; grid-template-columns:repeat(2,1fr); gap:18px; }
        .summary-item span { display:block; font-size:.78rem; opacity:.78; margin-bottom:4px; }
        .summary-item b { font-size:1.7rem; line-height:1; font-weight:700; display:block; }
        .summary-item small { display:block; margin-top:6px; font-size:.82rem; opacity:.85; }
        .tabs { display:grid; grid-template-columns:repeat(2,1fr); gap:10px; margin:18px 16px 0; }
        .tab-btn { border:none; border-radius:16px; padding:14px 12px; font-family:inherit; font-size:.88rem; font-weight:700; background:rgba(255,255,255,.86); color:var(--text-soft); box-shadow:0 10px 20px rgba(40,76,82,.06); }
        .tab-btn.active { background:linear-gradient(135deg,#3A86FF 0%,#62a2ff 100%); color:#fff; }
        .list { margin:16px; display:grid; gap:12px; }
        .card { background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:16px; }
        .card-top { display:flex; justify-content:space-between; align-items:flex-start; gap:10px; margin-bottom:10px; }
        .reason { color:var(--text-soft); font-size:.78rem; text-transform:uppercase; letter-spacing:.06em; }
        .amount { color:var(--accent); font-size:1.18rem; font-weight:700; }
        .meta { color:var(--text-soft); font-size:.83rem; line-height:1.55; }
        .badge { display:inline-flex; align-items:center; gap:6px; background:rgba(37,184,90,.12); color:var(--accent); border-radius:999px; padding:7px 10px; font-size:.7rem; font-weight:700; }
        .empty { text-align:center; padding:22px 16px; color:var(--text-soft); }
        .bottom-nav { position:fixed; left:50%; transform:translateX(-50%); bottom:0; width:100%; max-width:430px; background:rgba(255,255,255,.95); backdrop-filter:blur(12px); border-top:1px solid rgba(36,48,68,.08); display:grid; grid-template-columns:repeat(4,1fr); padding:10px 4px 12px; }
        .nav-item { text-align:center; color:#8a97a1; text-decoration:none; }
        .nav-item.active { color:#3A86FF; }
        .nav-item i { display:block; font-size:1.18rem; margin-bottom:4px; }
        .nav-item span { font-size:.68rem; font-weight:700; }
    </style>
</head>
<body>
    @php
        $myTotal = $myCommissions->sum('amount');
        $teamTotal = $teamCommissions->sum('amount');
    @endphp

    <div class="shell">
        <section class="hero">
            <div class="top-actions">
                <div onclick="window.location.href='{{ route('profile') }}'" style="cursor:pointer;"><i class="fa-solid fa-chevron-left"></i></div>
                <strong>Comissoes</strong>
                <div><i class="fa-solid fa-coins"></i></div>
            </div>
            <div class="brand-row">
                <div class="avatar"><i class="fa-solid fa-sack-dollar"></i></div>
                <div class="brand-meta">
                    <small>Ganhos da rede</small>
                    <h1>Comissao CHUTBALL</h1>
                    <p>Acompanhe seus ganhos diretos e os repasses que chegaram da sua equipe.</p>
                </div>
            </div>
            <div class="summary-card">
                <div class="summary-grid">
                    <div class="summary-item">
                        <span>Minhas comissoes</span>
                        <b>{{ price($myTotal) }}</b>
                        <small>{{ $myCommissions->count() }} lancamento(s)</small>
                    </div>
                    <div class="summary-item">
                        <span>Comissao da equipe</span>
                        <b>{{ price($teamTotal) }}</b>
                        <small>{{ $teamCommissions->count() }} lancamento(s)</small>
                    </div>
                </div>
            </div>
        </section>

        <div class="tabs">
            <button class="tab-btn active" type="button" data-target="mine">Minhas comissoes</button>
            <button class="tab-btn" type="button" data-target="team">Equipe</button>
        </div>

        <div class="list" id="mine-list">
            @forelse($myCommissions as $element)
                <div class="card">
                    <div class="card-top">
                        <div>
                            <div class="reason">{{ ucfirst(str_replace('_', ' ', $element->reason)) }}</div>
                            <div class="amount">{{ price($element->amount) }}</div>
                        </div>
                        <div class="badge"><i class="fa-solid fa-wallet"></i>Direta</div>
                    </div>
                    <div class="meta">{{ $element->perticulation ?: 'Comissao registrada na sua conta.' }}</div>
                    <div class="meta">{{ $element->created_at }}</div>
                </div>
            @empty
                <div class="card empty">Nenhuma comissao direta encontrada.</div>
            @endforelse
        </div>

        <div class="list" id="team-list" style="display:none;">
            @forelse($teamCommissions as $element)
                <div class="card">
                    <div class="card-top">
                        <div>
                            <div class="reason">Equipe {{ strtoupper($element->step ?: '---') }}</div>
                            <div class="amount">{{ price($element->amount) }}</div>
                        </div>
                        <div class="badge"><i class="fa-solid fa-users"></i>{{ $element->source_ref ?: '--' }}</div>
                    </div>
                    <div class="meta">{{ $element->perticulation ?: 'Comissao vinda da sua rede.' }}</div>
                    <div class="meta">{{ $element->created_at }}</div>
                </div>
            @empty
                <div class="card empty">Nenhuma comissao de equipe encontrada.</div>
            @endforelse
        </div>

        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item" href="{{ route('ordered') }}"><i class="fa-solid fa-rectangle-list"></i><span>Bilhetes</span></a>
            <a class="nav-item active" href="{{ route('commission') }}"><i class="fa-solid fa-coins"></i><span>Comissao</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Meu</span></a>
        </nav>
    </div>
<script>
    const buttons = document.querySelectorAll('.tab-btn');
    const mineList = document.getElementById('mine-list');
    const teamList = document.getElementById('team-list');

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            buttons.forEach((item) => item.classList.remove('active'));
            button.classList.add('active');

            const target = button.getAttribute('data-target');
            mineList.style.display = target === 'mine' ? 'grid' : 'none';
            teamList.style.display = target === 'team' ? 'grid' : 'none';
        });
    });
</script>
</body>
</html>
