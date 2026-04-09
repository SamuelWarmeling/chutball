<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Extrato | CHUTBALL</title>
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
        .card, .empty { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .top { display:flex; justify-content:space-between; align-items:flex-start; gap:12px; }
        .top h3 { margin:0 0 5px; font-size:.98rem; }
        .top p { margin:0; color:var(--text-soft); font-size:.8rem; line-height:1.45; }
        .amount { font-size:1rem; font-weight:700; }
        .amount.credit { color:var(--danger); }
        .amount.debit { color:var(--accent-dark); }
        .status { display:inline-flex; margin-top:12px; border-radius:999px; padding:6px 10px; font-size:.68rem; font-weight:700; background:rgba(37,184,90,.12); color:var(--accent-dark); }
        .empty { text-align:center; }
        .empty p { color:var(--text-soft); }
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
                <strong>Extrato da conta</strong>
                <a href="{{ route('dashboard') }}" style="color:#2a4c52;"><i class="fa-solid fa-house"></i></a>
            </div>
            <div class="hero-card">
                <strong style="position:relative; z-index:1; font-size:1rem; display:block;">Movimentacoes</strong>
                <p>Veja entradas, saidas, apostas e ajustes do saldo em um historico mais legivel e no mesmo padrao visual da plataforma.</p>
            </div>
        </section>
        @forelse($ledgers as $ledger)
            <div class="card">
                <div class="top">
                    <div>
                        <h3>{{ ucfirst(str_replace('_', ' ', $ledger->reason)) }}</h3>
                        <p>{{ $ledger->perticulation }}</p>
                        <p>{{ $ledger->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="amount {{ $ledger->debit > 0 ? 'debit' : 'credit' }}">{{ price($ledger->amount) }}</div>
                </div>
                <div class="status">{{ strtoupper($ledger->status ?? 'approved') }}</div>
            </div>
        @empty
            <div class="empty">
                <h3>Sem movimentacoes</h3>
                <p>Nenhum registro financeiro foi encontrado para esta conta.</p>
            </div>
        @endforelse
        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item" href="{{ route('ordered') }}"><i class="fa-solid fa-rectangle-list"></i><span>Registro</span></a>
            <a class="nav-item active" href="{{ route('history') }}"><i class="fa-solid fa-futbol"></i><span>Evento</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Meu</span></a>
        </nav>
    </div>
</body>
</html>
