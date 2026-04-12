<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Inicio | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-light:rgba(255,255,255,.94); --card-dark:#2f3455; --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); --risk:#e63946; }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding-bottom:92px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .top-actions { position:relative; z-index:1; display:flex; justify-content:flex-end; gap:14px; margin-bottom:18px; color:#2a4c52; }
        .brand-row { position:relative; z-index:1; display:flex; align-items:center; gap:14px; margin-bottom:18px; }
        .avatar { width:54px; height:54px; border-radius:50%; background:linear-gradient(135deg,#fefefe 0%,#d9f8e8 100%); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); box-shadow:0 10px 18px rgba(37,184,90,.15); border:2px solid rgba(255,255,255,.75); flex-shrink:0; }
        .brand-meta small { display:block; font-size:.72rem; color:#4d6b70; margin-bottom:4px; }
        .brand-meta h1 { margin:0; font-size:1.45rem; font-weight:700; letter-spacing:.01em; }
        .brand-meta p { margin:3px 0 0; color:#3f5961; font-size:.92rem; line-height:1.45; }
        .balance-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; border-radius:18px; padding:18px 16px; box-shadow:0 16px 30px rgba(53,57,90,.28); position:relative; z-index:1; overflow:hidden; }
        .balance-card::before, .balance-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .balance-card::before { width:120px; height:120px; right:-30px; bottom:-50px; }
        .balance-card::after { width:70px; height:70px; left:38%; bottom:-20px; }
        .balance-head { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:flex-start; gap:12px; margin-bottom:10px; }
        .balance-head strong { font-size:.98rem; font-weight:700; }
        .balance-grid { position:relative; z-index:1; display:grid; grid-template-columns:1fr 1fr; gap:18px; }
        .balance-item span { display:block; font-size:.78rem; opacity:.78; margin-bottom:4px; }
        .balance-item b { font-size:2rem; line-height:1; font-weight:700; display:block; }
        .balance-item small { display:block; margin-top:6px; font-size:.82rem; opacity:.85; }
        .action-strip { display:grid; grid-template-columns:repeat(3,1fr); background:rgba(255,255,255,.96); border-radius:0 0 16px 16px; margin:-6px 8px 0; box-shadow:0 10px 22px rgba(40,76,82,.08); overflow:hidden; position:relative; z-index:2; }
        .action-strip a { text-decoration:none; color:var(--accent-dark); text-align:center; padding:12px 8px; font-size:.8rem; font-weight:700; border-right:1px solid rgba(36,48,68,.06); }
        .action-strip a:last-child { border-right:none; }
        .action-strip i { margin-right:6px; }
        .section-card, .match-card, .ticket-card, .empty-card { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); }
        .section-card { padding:18px 16px; }
        .section-card h3, .section-title { margin:0; font-size:1.1rem; font-weight:700; }
        .feature-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:18px 10px; }
        .feature-item { text-decoration:none; color:var(--text-main); text-align:center; }
        .feature-icon { width:54px; height:54px; border-radius:16px; margin:0 auto 8px; background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.14); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); box-shadow:0 10px 20px rgba(37,184,90,.08); font-size:1.05rem; }
        .feature-item p { margin:0; font-size:.76rem; line-height:1.2; font-weight:700; }
        .match-card, .ticket-card, .empty-card { padding:18px 16px; }
        .match-card { position:relative; overflow:hidden; border-color:rgba(47,52,85,.08); cursor:pointer; }
        .match-card::before { content:""; position:absolute; inset:0 0 auto 0; height:86px; background:linear-gradient(180deg, rgba(47,52,85,.06) 0%, rgba(47,52,85,0) 100%); pointer-events:none; }
        .match-card::after { content:""; position:absolute; inset:0; border:1px solid rgba(37,184,90,.08); border-radius:20px; pointer-events:none; transition:border-color .18s ease, box-shadow .18s ease; }
        .match-card:hover::after { border-color:rgba(37,184,90,.22); box-shadow:inset 0 0 0 1px rgba(37,184,90,.08); }
        .match-top { display:flex; justify-content:space-between; align-items:flex-start; gap:12px; margin-bottom:10px; }
        .league { color:var(--text-soft); font-size:.72rem; text-transform:uppercase; letter-spacing:.04em; font-weight:700; }
        .teams { margin-top:8px; font-size:1.15rem; font-weight:700; line-height:1.35; }
        .match-time { margin-top:8px; color:#3f5961; font-size:.86rem; }
        .badge { background:var(--accent); color:#fff; border-radius:999px; padding:7px 11px; font-size:.68rem; font-weight:700; white-space:nowrap; }
        .market-head { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-top:14px; margin-bottom:10px; }
        .market-head span { font-size:.7rem; color:var(--text-soft); text-transform:uppercase; letter-spacing:.08em; font-weight:700; }
        .risk-free { display:inline-flex; align-items:center; gap:6px; padding:6px 10px; border-radius:999px; background:rgba(37,184,90,.12); color:var(--accent-dark); font-size:.68rem; font-weight:800; }
        .market-note { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-top:12px; margin-bottom:12px; padding:12px 14px; border-radius:16px; background:linear-gradient(180deg,#ffffff 0%,#f3fbf5 100%); border:1px solid rgba(37,184,90,.12); }
        .market-copy strong { display:block; font-size:.92rem; margin-bottom:2px; color:var(--text-main); }
        .market-copy span { display:block; font-size:.74rem; color:var(--text-soft); line-height:1.45; }
        .market-arrow { width:38px; height:38px; border-radius:12px; background:rgba(37,184,90,.12); color:var(--accent-dark); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .odds-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-top:0; }
        .odd-link { display:block; position:relative; z-index:2; text-decoration:none; color:inherit; border-radius:14px; transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease; }
        .odd-link:hover, .odd-link:focus-visible { transform:translateY(-2px); box-shadow:0 14px 22px rgba(37,184,90,.16); outline:none; }
        .odd-box { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); border-radius:14px; padding:12px 8px; text-align:center; cursor:pointer; }
        .odd-box span { display:block; color:var(--text-soft); font-size:.7rem; margin-bottom:6px; }
        .odd-box strong { color:var(--accent-dark); font-size:1.05rem; }
        .odd-link.away:hover .odd-box, .odd-link.away:focus-visible .odd-box { border-color:rgba(230,57,70,.26); }
        .open-match { display:grid; grid-template-columns:1fr auto; gap:10px; margin-top:14px; position:relative; z-index:2; }
        .action-btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; width:100%; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); color:#fff; padding:14px; border-radius:14px; font-weight:800; text-decoration:none; box-shadow:0 14px 22px rgba(37,184,90,.22); }
        .secondary-btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); color:var(--text-main); padding:14px 14px; border-radius:14px; font-weight:800; text-decoration:none; border:1px solid rgba(37,184,90,.14); white-space:nowrap; }
        .action-btn:hover, .secondary-btn:hover, .action-btn:focus-visible, .secondary-btn:focus-visible { transform:translateY(-1px); outline:none; }
        .match-link-layer { position:absolute; inset:0; z-index:1; border-radius:20px; }
        .match-link-layer span { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
        .ticket-card h4, .empty-card h4 { margin:0 0 8px; font-size:1rem; font-weight:700; }
        .ticket-card p, .empty-card p { margin:4px 0; color:var(--text-soft); font-size:.84rem; line-height:1.5; }
        .status { color:var(--accent-dark); font-weight:700; }
        .empty-card { text-align:center; }
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
            <div class="top-actions">
                <i class="fa-regular fa-envelope"></i>
                <i class="fa-solid fa-headset"></i>
                <i class="fa-solid fa-globe"></i>
            </div>
            <div class="brand-row">
                <div class="avatar"><i class="fa-solid fa-futbol"></i></div>
                <div class="brand-meta">
                    <small>{{ user_level_data()['key'] }} • plataforma de futebol</small>
                    <h1>CHUTBALL</h1>
                    <p>Escolha seus jogos, monte o bilhete e acompanhe os retornos em um visual unico de app.</p>
                </div>
            </div>
            <div class="balance-card">
                <div class="balance-head">
                    <strong>Painel principal</strong>
                    <div><i class="fa-regular fa-eye"></i></div>
                </div>
                <div class="balance-grid">
                    <div class="balance-item"><span>Equilibrio</span><b>{{ number_format((float) auth()->user()->balance, 2, ',', '.') }}</b><small>Saldo em conta</small></div>
                    <div class="balance-item"><span>Bilhetes</span><b>{{ $pendingBets }}</b><small>Em andamento</small></div>
                </div>
            </div>
            <div class="action-strip">
                <a href="{{ route('user.deposit') }}"><i class="fa-solid fa-wallet"></i>Depositar</a>
                <a href="{{ route('user.withdraw') }}"><i class="fa-solid fa-money-bill-transfer"></i>Sacar</a>
                <a href="{{ route('ordered') }}"><i class="fa-solid fa-ticket"></i>Bilhetes</a>
            </div>
        </section>
        <section class="section-card">
            <h3>Funcoes rapidas</h3>
            <div class="feature-grid">
                <a href="{{ route('user.deposit') }}" class="feature-item"><div class="feature-icon"><i class="fa-solid fa-wallet"></i></div><p>Depositar</p></a>
                <a href="{{ route('user.withdraw') }}" class="feature-item"><div class="feature-icon"><i class="fa-solid fa-money-bill-transfer"></i></div><p>Sacar</p></a>
                <a href="{{ route('ordered') }}" class="feature-item"><div class="feature-icon"><i class="fa-solid fa-ticket"></i></div><p>Bilhetes</p></a>
                <a href="{{ telegram_link() }}" class="feature-item"><div class="feature-icon"><i class="fa-brands fa-telegram"></i></div><p>Grupo</p></a>
            </div>
        </section>
        <section class="section-card">
            <h3>Resumo rapido</h3>
            <div class="feature-grid" style="grid-template-columns:repeat(2,1fr); gap:12px;">
                <div class="feature-item" style="text-align:left;"><div style="font-size:.74rem; color:var(--text-soft); margin-bottom:6px;">Nivel atual</div><div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ user_level_data()['key'] }}</div></div>
                <div class="feature-item" style="text-align:left;"><div style="font-size:.74rem; color:var(--text-soft); margin-bottom:6px;">Limite de aposta</div><div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ price(user_bet_limit()) }}</div></div>
                <div class="feature-item" style="text-align:left;"><div style="font-size:.74rem; color:var(--text-soft); margin-bottom:6px;">Bilhetes enviados</div><div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ $betsCount }}</div></div>
                <div class="feature-item" style="text-align:left;"><div style="font-size:.74rem; color:var(--text-soft); margin-bottom:6px;">Garantidas</div><div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">Via Telegram</div></div>
            </div>
        </section>
        <section class="section-card"><div class="section-title">Jogos em destaque</div></section>
        @forelse($matches as $match)
            <div class="match-card">
                <a class="match-link-layer" href="{{ route('purchase.confirmation', $match->id) }}"><span>Abrir {{ $match->home_team }} x {{ $match->away_team }}</span></a>
                <div class="match-top">
                    <div>
                        <div class="league">{{ $match->league }}</div>
                        <div class="teams">{{ $match->home_team }} x {{ $match->away_team }}</div>
                        <div class="match-time">{{ $match->starts_at->format('d/m H:i') }}</div>
                    </div>
                    @if($match->featured_badge)
                        <div class="badge">{{ $match->featured_badge }}</div>
                    @endif
                </div>
                <div class="market-head">
                    <span>Resultado final</span>
                    <div class="risk-free"><i class="fa-solid fa-shield-halved"></i>Sem risco via garantida</div>
                </div>
                <div class="market-note">
                    <div class="market-copy">
                        <strong>Abra o jogo e escolha sua entrada</strong>
                        <span>Odds clicaveis, bilhete rapido e entrada protegida pelo grupo quando quiser operar sem risco.</span>
                    </div>
                    <div class="market-arrow"><i class="fa-solid fa-arrow-right"></i></div>
                </div>
                <div class="odds-grid">
                    <a class="odd-link home" href="{{ route('purchase.confirmation', ['id' => $match->id, 'selection' => 'home']) }}">
                        <div class="odd-box"><span>{{ $match->home_team }}</span><strong>{{ number_format($match->home_odds, 2, ',', '.') }}</strong></div>
                    </a>
                    <a class="odd-link draw" href="{{ route('purchase.confirmation', ['id' => $match->id, 'selection' => 'draw']) }}">
                        <div class="odd-box"><span>Empate</span><strong>{{ number_format($match->draw_odds, 2, ',', '.') }}</strong></div>
                    </a>
                    <a class="odd-link away" href="{{ route('purchase.confirmation', ['id' => $match->id, 'selection' => 'away']) }}">
                        <div class="odd-box"><span>{{ $match->away_team }}</span><strong>{{ number_format($match->away_odds, 2, ',', '.') }}</strong></div>
                    </a>
                </div>
                <div class="open-match">
                    <a class="action-btn" href="{{ route('purchase.confirmation', $match->id) }}"><i class="fa-solid fa-door-open"></i>Abrir jogo</a>
                    <a class="secondary-btn" href="{{ route('purchase.confirmation', $match->id) }}"><i class="fa-solid fa-ticket"></i>Bilhete</a>
                </div>
            </div>
        @empty
            <div class="empty-card">
                <h4>Nenhuma partida cadastrada</h4>
                <p>Cadastre jogos para comecar a operar a plataforma.</p>
            </div>
        @endforelse
        <section class="section-card"><div class="section-title">Ultimos bilhetes</div></section>
        @forelse($recentBets as $bet)
            <div class="ticket-card">
                <h4>{{ $bet->match->home_team }} x {{ $bet->match->away_team }}</h4>
                <p>Escolha: {{ $bet->selection }} • Odd {{ number_format($bet->odds, 2, ',', '.') }}</p>
                <p>Stake: {{ price($bet->stake) }} • Potencial: {{ price($bet->potential_win) }}</p>
                <p class="status">Status: {{ strtoupper($bet->status) }}</p>
            </div>
        @empty
            <div class="empty-card">
                <h4>Voce ainda nao enviou bilhetes</h4>
                <p>Escolha uma partida acima para fazer sua primeira aposta.</p>
            </div>
        @endforelse
        <nav class="bottom-nav">
            <a class="nav-item active" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item" href="{{ route('ordered') }}"><i class="fa-solid fa-rectangle-list"></i><span>Registro</span></a>
            <a class="nav-item" href="{{ route('history') }}"><i class="fa-solid fa-futbol"></i><span>Evento</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Meu</span></a>
        </nav>
    </div>
</body>
</html>
