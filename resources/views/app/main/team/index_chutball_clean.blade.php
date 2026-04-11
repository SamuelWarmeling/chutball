<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Meu Time | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-light:rgba(255,255,255,.94); --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding-bottom:92px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .top-actions { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .top-actions strong { font-size:1rem; }
        .brand-row { position:relative; z-index:1; display:flex; align-items:center; gap:14px; margin-bottom:18px; }
        .avatar { width:54px; height:54px; border-radius:50%; background:linear-gradient(135deg,#fefefe 0%,#d9f8e8 100%); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); box-shadow:0 10px 18px rgba(37,184,90,.15); border:2px solid rgba(255,255,255,.75); flex-shrink:0; }
        .brand-meta small { display:block; font-size:.72rem; color:#4d6b70; margin-bottom:4px; }
        .brand-meta h1 { margin:0; font-size:1.45rem; font-weight:700; letter-spacing:.01em; }
        .brand-meta p { margin:3px 0 0; color:#3f5961; font-size:.92rem; line-height:1.45; }
        .balance-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; border-radius:18px; padding:18px 16px; box-shadow:0 16px 30px rgba(53,57,90,.28); position:relative; z-index:1; overflow:hidden; }
        .balance-card::before, .balance-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .balance-card::before { width:120px; height:120px; right:-30px; bottom:-50px; }
        .balance-card::after { width:70px; height:70px; left:38%; bottom:-20px; }
        .balance-grid { position:relative; z-index:1; display:grid; grid-template-columns:repeat(2,1fr); gap:18px; }
        .balance-item span { display:block; font-size:.78rem; opacity:.78; margin-bottom:4px; }
        .balance-item b { font-size:1.55rem; line-height:1.1; font-weight:700; display:block; }
        .balance-item small { display:block; margin-top:6px; font-size:.82rem; opacity:.85; }
        .action-strip { display:grid; grid-template-columns:repeat(3,1fr); background:rgba(255,255,255,.96); border-radius:0 0 16px 16px; margin:-6px 8px 0; box-shadow:0 10px 22px rgba(40,76,82,.08); overflow:hidden; position:relative; z-index:2; }
        .action-strip button { border:none; background:transparent; color:var(--accent-dark); text-align:center; padding:12px 8px; font-size:.8rem; font-weight:700; border-right:1px solid rgba(36,48,68,.06); cursor:pointer; font-family:inherit; }
        .action-strip button:last-child { border-right:none; }
        .action-strip i { margin-right:6px; }
        .section-card { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .section-card h3 { margin:0 0 14px; font-size:1.1rem; font-weight:700; }
        .summary-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
        .summary-box { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); border-radius:16px; padding:14px; }
        .summary-box span { display:block; color:var(--text-soft); font-size:.72rem; margin-bottom:6px; text-transform:uppercase; }
        .summary-box strong { color:var(--accent-dark); font-size:1.05rem; }
        .link-box { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px dashed rgba(37,184,90,.26); border-radius:14px; padding:12px; font-size:.8rem; word-break:break-all; color:#38525a; }
        .copy-btn { margin-top:12px; display:inline-flex; gap:8px; align-items:center; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); color:#fff; border:none; padding:12px 14px; border-radius:12px; font-weight:800; box-shadow:0 14px 22px rgba(37,184,90,.22); cursor:pointer; font-family:inherit; }
        .empty-note { color:var(--text-soft); font-size:.86rem; line-height:1.5; }
        .bottom-nav { position:fixed; left:50%; transform:translateX(-50%); bottom:0; width:100%; max-width:430px; background:rgba(255,255,255,.95); backdrop-filter:blur(12px); border-top:1px solid rgba(36,48,68,.08); display:grid; grid-template-columns:repeat(4,1fr); padding:10px 4px 12px; }
        .nav-item { text-align:center; color:#8a97a1; text-decoration:none; }
        .nav-item.active { color:var(--accent); }
        .nav-item i { display:block; font-size:1.18rem; margin-bottom:4px; }
        .nav-item span { font-size:.68rem; font-weight:700; }
    </style>
</head>
<body>
    @php($inviteLink = url('account/create').'?inviteCode='.(auth()->user()->ref_id ?? ''))
    <div class="shell">
        <section class="hero">
            <div class="top-actions">
                <strong>Meu time</strong>
                <i class="fa-solid fa-share-nodes" onclick="window.location.href='{{ route('user.invite') }}'"></i>
            </div>
            <div class="brand-row">
                <div class="avatar"><i class="fa-solid fa-users"></i></div>
                <div class="brand-meta">
                    <small>Rede de indicacao</small>
                    <h1>CHUTBALL</h1>
                    <p>Acompanhe membros, comissoes e a atividade da sua estrutura em um visual mais limpo.</p>
                </div>
            </div>
            <div class="balance-card">
                <div class="balance-grid">
                    <div class="balance-item"><span>Total de membros</span><b>{{ $team_size }}</b><small>Equipe ativa</small></div>
                    <div class="balance-item"><span>Comissao total</span><b>{{ price($levelTotalCommission1 + $levelTotalCommission2 + $levelTotalCommission3) }}</b><small>Acumulado da rede</small></div>
                </div>
            </div>
            <div class="action-strip">
                <button type="button" onclick="window.location.href='{{ route('commission') }}'"><i class="fa-solid fa-coins"></i>Comissao</button>
                <button type="button" onclick="window.location.href='{{ route('user.invite') }}'"><i class="fa-solid fa-user-plus"></i>Convite</button>
                <button type="button" onclick="copyText('{{ $inviteLink }}')"><i class="fa-regular fa-copy"></i>Copiar</button>
            </div>
        </section>

        <section class="section-card">
            <h3>Link de convite</h3>
            <div class="link-box">{{ $inviteLink }}</div>
            <button class="copy-btn" type="button" onclick="copyText('{{ $inviteLink }}')"><i class="fa-regular fa-copy"></i>Copiar link</button>
        </section>

        <section class="section-card">
            <h3>Resumo por nivel</h3>
            <div class="summary-grid">
                <div class="summary-box"><span>Nivel 1</span><strong>{{ $first_level_users->count() }} membros</strong></div>
                <div class="summary-box"><span>Comissao N1</span><strong>{{ price($levelTotalCommission1) }}</strong></div>
                <div class="summary-box"><span>Nivel 2</span><strong>{{ $second_level_users->count() }} membros</strong></div>
                <div class="summary-box"><span>Comissao N2</span><strong>{{ price($levelTotalCommission2) }}</strong></div>
                <div class="summary-box"><span>Nivel 3</span><strong>{{ $third_level_users->count() }} membros</strong></div>
                <div class="summary-box"><span>Comissao N3</span><strong>{{ price($levelTotalCommission3) }}</strong></div>
            </div>
        </section>

        <section class="section-card">
            <h3>Atividade da equipe</h3>
            <div class="summary-grid">
                <div class="summary-box"><span>Depositos da rede</span><strong>{{ price($lvTotalDeposit) }}</strong></div>
                <div class="summary-box"><span>Saques da rede</span><strong>{{ price($lvTotalWithdraw) }}</strong></div>
                <div class="summary-box"><span>Ativos N1</span><strong>{{ $activeMembers1 }}</strong></div>
                <div class="summary-box"><span>Ativos N2</span><strong>{{ $activeMembers2 }}</strong></div>
                <div class="summary-box"><span>Ativos N3</span><strong>{{ $activeMembers3 }}</strong></div>
                <div class="summary-box"><span>Investimento da rede</span><strong>{{ price($totalInvestment) }}</strong></div>
            </div>
            @if($team_size === 0)
                <p class="empty-note" style="margin-top:14px;">Sua rede ainda esta vazia. Compartilhe o link acima para comecar a montar o time.</p>
            @endif
        </section>

        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item" href="{{ route('ordered') }}"><i class="fa-solid fa-rectangle-list"></i><span>Bilhetes</span></a>
            <a class="nav-item active" href="{{ route('user.team') }}"><i class="fa-solid fa-users"></i><span>Time</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Perfil</span></a>
        </nav>
    </div>
    <script>
        function copyText(text) {
            const input = document.createElement('input');
            document.body.appendChild(input);
            input.value = text;
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            alert('Copiado com sucesso');
        }
    </script>
</body>
</html>
