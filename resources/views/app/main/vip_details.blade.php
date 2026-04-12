<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Apostar | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --danger:#E63946; --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); }
        * { box-sizing: border-box; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); padding-bottom:40px; }
        .topbar { display:flex; align-items:center; justify-content:space-between; padding:18px 20px; background:rgba(245,245,245,.88); backdrop-filter:blur(12px); border-bottom:1px solid var(--line); }
        .topbar strong { font-size:1rem; }
        .topbar i { color:var(--accent); font-size:1.1rem; }
        .wrap { padding:18px; max-width:430px; margin:0 auto; }
        .card { background:rgba(245,245,245,.92); border:1px solid var(--line); border-radius:22px; box-shadow:0 16px 28px rgba(22,50,74,.08); padding:20px; margin-bottom:16px; }
        .hero-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; position:relative; overflow:hidden; }
        .hero-card::before, .hero-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .hero-card::before { width:140px; height:140px; right:-40px; top:-40px; }
        .hero-card::after { width:90px; height:90px; left:50%; bottom:-30px; }
        .hero-card > * { position:relative; z-index:1; }
        .league { display:inline-flex; padding:7px 12px; border-radius:999px; background:rgba(255,255,255,.14); color:#fff; font-size:.72rem; font-weight:800; text-transform:uppercase; letter-spacing:.08em; }
        .teams { font-size:1.55rem; line-height:1.3; margin:14px 0 8px; font-weight:900; }
        .subtext { color:rgba(255,255,255,.8); font-size:.88rem; margin:0; }
        .entry-band { margin-top:16px; display:flex; justify-content:space-between; align-items:center; gap:12px; padding:12px 14px; border-radius:16px; background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.12); }
        .entry-band strong { display:block; font-size:.9rem; }
        .entry-band span { display:block; font-size:.76rem; color:rgba(255,255,255,.78); line-height:1.45; }
        .entry-badge { display:inline-flex; align-items:center; gap:6px; padding:7px 10px; border-radius:999px; background:rgba(37,184,90,.22); color:#fff; font-size:.7rem; font-weight:800; white-space:nowrap; }
        .odds-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-top:18px; }
        .odd-option input, .type-option input { display:none; }
        .odd-box { border:1px solid rgba(37,184,90,.14); background:rgba(255,255,255,.08); border-radius:16px; padding:12px 8px; text-align:center; transition:.2s ease; cursor:pointer; }
        .odd-box span { display:block; color:rgba(255,255,255,.72); font-size:.7rem; margin-bottom:6px; }
        .odd-box strong { color:#fff; font-size:1.08rem; }
        .odd-option input:checked + .odd-box { background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); border-color:transparent; transform:translateY(-2px); box-shadow:0 14px 24px rgba(37,184,90,.22); }
        .odd-option input:checked + .odd-box span, .odd-option input:checked + .odd-box strong { color:#fff; }
        .section-title { margin:22px 0 12px; font-size:.9rem; text-transform:uppercase; letter-spacing:.08em; color:var(--text-soft); }
        .input-wrap { display:flex; align-items:center; gap:10px; background:rgba(255,255,255,.95); border-radius:16px; border:1px solid var(--line); padding:0 16px; }
        .input-wrap span { color:var(--accent); font-weight:900; font-size:1.1rem; }
        .input-wrap input { width:100%; border:none; background:transparent; padding:18px 0; font-size:1rem; color:var(--text-main); outline:none; font-weight:700; }
        .summary { display:grid; gap:10px; }
        .summary-row { display:flex; justify-content:space-between; align-items:center; color:var(--text-soft); font-size:.86rem; }
        .summary-row strong { color:var(--text-main); }
        .summary-row .red { color:var(--danger); }
        .telegram-note { border-radius:16px; padding:14px; border:1px solid rgba(37,184,90,.14); background:rgba(37,184,90,.08); color:var(--text-main); font-size:.82rem; line-height:1.55; }
        .telegram-note strong { display:block; margin-bottom:4px; color:var(--accent-dark); }
        .value-hint { margin-top:8px; font-size:.76rem; color:var(--text-soft); }
        .submit-btn { width:100%; border:none; border-radius:16px; padding:16px; color:#fff; font-size:.96rem; font-weight:900; letter-spacing:.04em; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); box-shadow:0 14px 26px rgba(37,184,90,.28); }
        .tips { margin:0; padding-left:18px; color:var(--text-soft); font-size:.84rem; line-height:1.6; }
        .tips li { margin-bottom:6px; }
    </style>
</head>
<body>
    <div class="topbar">
        <i class="fa-solid fa-chevron-left" onclick="window.location.href='{{ route('dashboard') }}'"></i>
        <strong>Montar bilhete</strong>
        <i class="fa-solid fa-ticket"></i>
    </div>
    <div class="wrap">
        <div class="card hero-card">
            <div class="league">{{ $match->league }}</div>
            <div class="teams">{{ $match->home_team }} x {{ $match->away_team }}</div>
            <p class="subtext">Inicio {{ $match->starts_at->format('d/m/Y H:i') }} • Mercado: resultado final</p>
            <div class="entry-band">
                <div>
                    <strong>Entrada com vibe de casa de aposta</strong>
                    <span>Escolha a odd, monte o bilhete e, se quiser operar sem risco, siga a protegida no Telegram.</span>
                </div>
                <div class="entry-badge"><i class="fa-solid fa-shield-halved"></i>Sem risco</div>
            </div>
            <form action="{{ route('bet.submit', $match->id) }}" method="post">
                @csrf
                <input type="hidden" name="bet_type" value="free">
                <div class="section-title">Escolha seu palpite</div>
                <div class="odds-grid">
                    <label class="odd-option"><input type="radio" name="selection" value="home" {{ ($preselectedSelection ?? 'home') === 'home' ? 'checked' : '' }}><div class="odd-box"><span>{{ $match->home_team }}</span><strong>{{ number_format($match->home_odds, 2, ',', '.') }}</strong></div></label>
                    <label class="odd-option"><input type="radio" name="selection" value="draw" {{ ($preselectedSelection ?? 'home') === 'draw' ? 'checked' : '' }}><div class="odd-box"><span>Empate</span><strong>{{ number_format($match->draw_odds, 2, ',', '.') }}</strong></div></label>
                    <label class="odd-option"><input type="radio" name="selection" value="away" {{ ($preselectedSelection ?? 'home') === 'away' ? 'checked' : '' }}><div class="odd-box"><span>{{ $match->away_team }}</span><strong>{{ number_format($match->away_odds, 2, ',', '.') }}</strong></div></label>
                </div>
                <div class="section-title">Canal das garantidas</div>
                <div class="telegram-note">
                    <strong>Aposta Garantida no Telegram</strong>
                    As entradas sem risco sao divulgadas no grupo oficial. Abra o jogo, escolha o lado e envie sua aposta da plataforma quando quiser operar manualmente.
                </div>
                <div class="section-title">Valor da aposta</div>
                <div class="input-wrap"><span>R$</span><input type="number" name="stake" min="50" step="0.01" placeholder="50,00" required></div>
                <div class="value-hint">Para operacao manual no app, o valor minimo desta entrada e R$ 50,00.</div>
                <div class="card" style="padding:16px; margin:18px 0 0;">
                    <div class="summary">
                        <div class="summary-row"><span>Saldo disponivel</span><strong>{{ price(auth()->user()->balance) }}</strong></div>
                        <div class="summary-row"><span>Nivel atual</span><strong>{{ user_level_data()['key'] }}</strong></div>
                        <div class="summary-row"><span>Limite por bilhete</span><strong>{{ price(user_bet_limit()) }}</strong></div>
                        <div class="summary-row"><span>Minimo desta aposta</span><strong class="red">R$ 50,00</strong></div>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Confirmar entrada no jogo</button>
            </form>
        </div>
        <div class="card">
            <div class="section-title" style="margin-top:0;">Regras rapidas</div>
            <ul class="tips">
                <li>O limite do bilhete segue o menor valor entre seu nivel e o total depositado.</li>
                <li>Seu primeiro saque so e liberado depois de 9 apostas registradas.</li>
                <li>As apostas garantidas sao comunicadas no grupo do Telegram.</li>
                <li>Bilhetes entram como pendentes ate o jogo ser finalizado.</li>
            </ul>
        </div>
    </div>
    @include('alert-message')
</body>
</html>
