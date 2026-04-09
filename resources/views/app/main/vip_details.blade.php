<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Apostar | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-main:#CFE8D5; --bg-grad-a:#eef8f0; --bg-grad-b:#bdd9c4; --accent:#3A86FF; --danger:#E63946; --text-main:#16324a; --text-gray:#627479; --line:rgba(22,50,74,.08); }
        * { box-sizing: border-box; }
        body { margin:0; font-family:"Montserrat",sans-serif; color:var(--text-main); background:radial-gradient(circle at top left, rgba(58,134,255,.16), transparent 26%),radial-gradient(circle at bottom right, rgba(56,176,0,.10), transparent 24%),linear-gradient(145deg,var(--bg-grad-a) 0%,var(--bg-main) 46%,var(--bg-grad-b) 100%); padding-bottom:40px; }
        .topbar { display:flex; align-items:center; justify-content:space-between; padding:18px 20px; background:rgba(245,245,245,.88); backdrop-filter:blur(12px); border-bottom:1px solid var(--line); }
        .topbar strong { font-size:1rem; }
        .topbar i { color:var(--accent); font-size:1.1rem; }
        .wrap { padding:18px; }
        .card { background:rgba(245,245,245,.92); border:1px solid var(--line); border-radius:22px; box-shadow:0 16px 28px rgba(22,50,74,.08); padding:20px; margin-bottom:16px; }
        .league { display:inline-flex; padding:7px 12px; border-radius:999px; background:rgba(58,134,255,.12); color:var(--accent); font-size:.72rem; font-weight:800; text-transform:uppercase; letter-spacing:.08em; }
        .teams { font-size:1.55rem; line-height:1.3; margin:14px 0 8px; font-weight:900; }
        .subtext { color:var(--text-gray); font-size:.88rem; margin:0; }
        .odds-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-top:18px; }
        .odd-option input, .type-option input { display:none; }
        .odd-box { border:1px solid rgba(58,134,255,.14); background:rgba(58,134,255,.08); border-radius:16px; padding:12px 8px; text-align:center; transition:.2s ease; }
        .odd-box span { display:block; color:var(--text-gray); font-size:.7rem; margin-bottom:6px; }
        .odd-box strong { color:var(--accent); font-size:1.08rem; }
        .odd-option input:checked + .odd-box { background:linear-gradient(135deg,#3A86FF 0%,#62a2ff 100%); border-color:transparent; transform:translateY(-2px); }
        .odd-option input:checked + .odd-box span, .odd-option input:checked + .odd-box strong { color:#fff; }
        .section-title { margin:22px 0 12px; font-size:.9rem; text-transform:uppercase; letter-spacing:.08em; color:var(--text-gray); }
        .input-wrap { display:flex; align-items:center; gap:10px; background:rgba(255,255,255,.95); border-radius:16px; border:1px solid var(--line); padding:0 16px; }
        .input-wrap span { color:var(--accent); font-weight:900; font-size:1.1rem; }
        .input-wrap input { width:100%; border:none; background:transparent; padding:18px 0; font-size:1rem; color:var(--text-main); outline:none; font-weight:700; }
        .summary { display:grid; gap:10px; }
        .summary-row { display:flex; justify-content:space-between; align-items:center; color:var(--text-gray); font-size:.86rem; }
        .summary-row strong { color:var(--text-main); }
        .summary-row .red { color:var(--danger); }
        .telegram-note { border-radius:16px; padding:14px; border:1px solid rgba(58,134,255,.14); background:rgba(58,134,255,.08); color:var(--text-main); font-size:.82rem; line-height:1.55; }
        .telegram-note strong { display:block; margin-bottom:4px; color:var(--accent); }
        .submit-btn { width:100%; border:none; border-radius:16px; padding:16px; color:#fff; font-size:.96rem; font-weight:900; letter-spacing:.04em; background:linear-gradient(135deg,#3A86FF 0%,#62a2ff 100%); box-shadow:0 14px 26px rgba(58,134,255,.28); }
        .tips { margin:0; padding-left:18px; color:var(--text-gray); font-size:.84rem; line-height:1.6; }
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
        <div class="card">
            <div class="league">{{ $match->league }}</div>
            <div class="teams">{{ $match->home_team }} x {{ $match->away_team }}</div>
            <p class="subtext">Inicio {{ $match->starts_at->format('d/m/Y H:i') }} • Mercado: resultado final</p>
            <form action="{{ route('bet.submit', $match->id) }}" method="post">
                @csrf
                <input type="hidden" name="bet_type" value="free">
                <div class="section-title">Escolha seu palpite</div>
                <div class="odds-grid">
                    <label class="odd-option"><input type="radio" name="selection" value="home" checked><div class="odd-box"><span>{{ $match->home_team }}</span><strong>{{ number_format($match->home_odds, 2, ',', '.') }}</strong></div></label>
                    <label class="odd-option"><input type="radio" name="selection" value="draw"><div class="odd-box"><span>Empate</span><strong>{{ number_format($match->draw_odds, 2, ',', '.') }}</strong></div></label>
                    <label class="odd-option"><input type="radio" name="selection" value="away"><div class="odd-box"><span>{{ $match->away_team }}</span><strong>{{ number_format($match->away_odds, 2, ',', '.') }}</strong></div></label>
                </div>
                <div class="section-title">Canal das garantidas</div>
                <div class="telegram-note">
                    <strong>Aposta Garantida no Telegram</strong>
                    As entradas seguras sao divulgadas no grupo oficial. Nesta tela voce envia sua aposta normal da plataforma.
                </div>
                <div class="section-title">Valor da aposta</div>
                <div class="input-wrap"><span>R$</span><input type="number" name="stake" min="50" step="0.01" placeholder="50,00" required></div>
                <div class="card" style="padding:16px; margin:18px 0 0;">
                    <div class="summary">
                        <div class="summary-row"><span>Saldo disponivel</span><strong>{{ price(auth()->user()->balance) }}</strong></div>
                        <div class="summary-row"><span>Nivel atual</span><strong>{{ user_level_data()['key'] }}</strong></div>
                        <div class="summary-row"><span>Limite por bilhete</span><strong>{{ price(user_bet_limit()) }}</strong></div>
                        <div class="summary-row"><span>Minimo desta aposta</span><strong class="red">R$ 50,00</strong></div>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Enviar aposta da plataforma</button>
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
