<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Bilhetes | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-light:rgba(255,255,255,.94); --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); --danger:#d85662; }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding-bottom:92px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .hero-top { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .hero-top strong { font-size:1.25rem; }
        .hero-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; border-radius:18px; padding:18px 16px; box-shadow:0 16px 30px rgba(53,57,90,.28); position:relative; z-index:1; overflow:hidden; }
        .hero-card::before, .hero-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .hero-card::before { width:120px; height:120px; right:-30px; bottom:-50px; }
        .hero-card::after { width:70px; height:70px; left:38%; bottom:-20px; }
        .hero-card p { position:relative; z-index:1; margin:8px 0 0; opacity:.86; line-height:1.5; font-size:.86rem; }
        .hero-grid { position:relative; z-index:1; display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-top:14px; }
        .hero-stat span { display:block; font-size:.74rem; opacity:.78; margin-bottom:6px; }
        .hero-stat strong { font-size:1rem; }
        .ticket-card, .empty-card { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .topline { display:flex; justify-content:space-between; align-items:flex-start; gap:12px; }
        .topline h3 { margin:0 0 4px; font-size:1rem; line-height:1.35; }
        .meta { color:var(--text-soft); font-size:.8rem; line-height:1.45; }
        .badge { display:inline-flex; align-items:center; justify-content:center; border-radius:999px; padding:7px 11px; font-size:.68rem; font-weight:700; color:#fff; white-space:nowrap; }
        .badge.pending { background:var(--accent); }
        .badge.won { background:#2f9b50; }
        .badge.lost, .badge.cancelled { background:var(--danger); }
        .badge.refunded { background:#7f8c8d; }
        .grid { display:grid; grid-template-columns:repeat(2,1fr); gap:10px; margin-top:16px; }
        .mini { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); border-radius:14px; padding:12px; }
        .mini span { display:block; color:var(--text-soft); font-size:.72rem; margin-bottom:5px; }
        .mini strong { color:var(--text-main); font-size:.92rem; }
        .empty-card { text-align:center; }
        .empty-card p { color:var(--text-soft); line-height:1.5; }
        .cta { display:inline-flex; align-items:center; gap:8px; margin-top:8px; padding:12px 16px; border-radius:12px; color:#fff; text-decoration:none; font-weight:700; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); box-shadow:0 14px 22px rgba(37,184,90,.22); }
        .bottom-nav { position:fixed; left:50%; transform:translateX(-50%); bottom:0; width:100%; max-width:430px; background:rgba(255,255,255,.95); backdrop-filter:blur(12px); border-top:1px solid rgba(36,48,68,.08); display:grid; grid-template-columns:repeat(4,1fr); padding:10px 4px 12px; }
        .nav-item { text-align:center; color:#8a97a1; text-decoration:none; }
        .nav-item.active { color:var(--accent); }
        .nav-item i { display:block; font-size:1.18rem; margin-bottom:4px; }
        .nav-item span { font-size:.68rem; font-weight:700; }
    </style>
</head>
<body>
    <div class="shell">
        <section class="hero">
            <div class="hero-top">
                <strong>Seus bilhetes</strong>
                <a href="{{ route('history') }}" style="color:#2a4c52;"><i class="fa-solid fa-clock-rotate-left"></i></a>
            </div>
            <div class="hero-card">
                <strong style="position:relative; z-index:1; font-size:1rem; display:block;">Painel de bilhetes</strong>
                <p>Acompanhe seus tickets enviados, stake, potencial de retorno e status de cada jogo em um layout mais limpo de app.</p>
                <div class="hero-grid">
                    <div class="hero-stat"><span>Total</span><strong>{{ $bets->count() }}</strong></div>
                    <div class="hero-stat"><span>Pendentes</span><strong>{{ $bets->where('status', 'pending')->count() }}</strong></div>
                    <div class="hero-stat"><span>Potencial</span><strong>{{ price($bets->where('status', 'pending')->sum('potential_win')) }}</strong></div>
                </div>
            </div>
        </section>
        @forelse($bets as $bet)
            <div class="ticket-card">
                <div class="topline">
                    <div>
                        <h3>{{ optional($bet->match)->home_team }} x {{ optional($bet->match)->away_team }}</h3>
                        <div class="meta">{{ optional($bet->match)->league }} • {{ optional($bet->match?->starts_at)->format('d/m H:i') }}</div>
                    </div>
                    <div class="badge {{ $bet->status }}">{{ strtoupper($bet->status) }}</div>
                </div>
                <div class="grid">
                    <div class="mini"><span>Palpite</span><strong>{{ $bet->selection }}</strong></div>
                    <div class="mini"><span>Tipo</span><strong>{{ $bet->bet_type === 'guaranteed' ? 'Garantida' : 'Sem garantia' }}</strong></div>
                    <div class="mini"><span>Stake</span><strong>{{ price($bet->stake) }}</strong></div>
                    <div class="mini"><span>Odd</span><strong>{{ number_format($bet->odds, 2, ',', '.') }}</strong></div>
                    <div class="mini"><span>Retorno potencial</span><strong>{{ price($bet->potential_win) }}</strong></div>
                    <div class="mini"><span>Enviado em</span><strong>{{ $bet->created_at->format('d/m H:i') }}</strong></div>
                </div>
            </div>
        @empty
            <div class="empty-card">
                <i class="fa-solid fa-ticket" style="font-size:2.4rem; color:var(--accent); opacity:.35;"></i>
                <h3>Voce ainda nao montou bilhetes</h3>
                <p>Escolha um jogo na home para enviar sua primeira aposta.</p>
                <a href="{{ route('dashboard') }}" class="cta"><i class="fa-solid fa-futbol"></i>Ir para jogos</a>
            </div>
        @endforelse
        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item active" href="{{ route('ordered') }}"><i class="fa-solid fa-rectangle-list"></i><span>Registro</span></a>
            <a class="nav-item" href="{{ route('history') }}"><i class="fa-solid fa-futbol"></i><span>Evento</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Meu</span></a>
        </nav>
    </div>
</body>
</html>
