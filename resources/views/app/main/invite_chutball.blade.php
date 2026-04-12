<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Convites | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-dark:#35395a; --card-light:rgba(255,255,255,.94); --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding-bottom:92px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .top-actions { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .brand-row { position:relative; z-index:1; display:flex; align-items:center; gap:14px; margin-bottom:18px; }
        .avatar { width:54px; height:54px; border-radius:50%; background:linear-gradient(135deg,#fefefe 0%,#d9f8e8 100%); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); box-shadow:0 10px 18px rgba(37,184,90,.15); border:2px solid rgba(255,255,255,.75); flex-shrink:0; }
        .brand-meta small { display:block; font-size:.72rem; color:#4d6b70; margin-bottom:4px; }
        .brand-meta h1 { margin:0; font-size:1.45rem; font-weight:700; }
        .brand-meta p { margin:3px 0 0; color:#3f5961; font-size:.92rem; line-height:1.45; }
        .summary-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; border-radius:18px; padding:18px 16px; box-shadow:0 16px 30px rgba(53,57,90,.28); position:relative; z-index:1; overflow:hidden; }
        .summary-card::before,.summary-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .summary-card::before { width:120px; height:120px; right:-30px; bottom:-50px; }
        .summary-card::after { width:70px; height:70px; left:38%; bottom:-20px; }
        .summary-card strong { display:block; font-size:.96rem; margin-bottom:10px; position:relative; z-index:1; }
        .summary-card .code { position:relative; z-index:1; font-size:1.8rem; font-weight:700; letter-spacing:.08em; margin-bottom:8px; }
        .summary-card p { position:relative; z-index:1; color:rgba(255,255,255,.85); margin:0; font-size:.84rem; line-height:1.55; }
        .section-card { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .section-card h3 { margin:0 0 14px; font-size:1.1rem; font-weight:700; }
        .link-box { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px dashed rgba(37,184,90,.26); border-radius:14px; padding:12px; font-size:.8rem; word-break:break-all; color:#38525a; }
        .copy-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:10px; margin-top:12px; }
        .ghost-btn, .telegram-btn { border:none; border-radius:14px; padding:13px 14px; font-weight:800; font-family:inherit; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; justify-content:center; gap:8px; }
        .ghost-btn { background:rgba(37,184,90,.12); color:var(--accent-dark); }
        .telegram-btn { width:100%; margin-top:12px; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); color:#fff; box-shadow:0 14px 22px rgba(37,184,90,.22); }
        .summary-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
        .summary-box { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); border-radius:16px; padding:14px; }
        .summary-box span { display:block; color:var(--text-soft); font-size:.72rem; margin-bottom:6px; text-transform:uppercase; }
        .summary-box strong { color:var(--accent-dark); font-size:1.05rem; }
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
                <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{ route('profile') }}'"></i>
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <div class="brand-row">
                <div class="avatar"><i class="fa-solid fa-share-nodes"></i></div>
                <div class="brand-meta">
                    <small>Convite e indicacao</small>
                    <h1>CHUTBALL</h1>
                    <p>Compartilhe seu codigo para montar sua rede e acompanhar ganhos da equipe sem sair do visual principal da plataforma.</p>
                </div>
            </div>
            <div class="summary-card">
                <strong>Seu codigo de convite</strong>
                <div class="code">{{ auth()->user()->ref_id }}</div>
                <p>Use este codigo no cadastro de novos jogadores ou compartilhe o link direto abaixo.</p>
            </div>
        </section>

        <section class="section-card">
            <h3>Link de convite</h3>
            <div class="link-box">{{ $inviteLink }}</div>
            <div class="copy-grid">
                <button class="ghost-btn" type="button" onclick="copyText('{{ auth()->user()->ref_id }}')">
                    <i class="fa-regular fa-copy"></i>Copiar codigo
                </button>
                <button class="ghost-btn" type="button" onclick="copyText('{{ $inviteLink }}')">
                    <i class="fa-solid fa-link"></i>Copiar link
                </button>
            </div>
            <a href="{{ telegram_link() }}" class="telegram-btn">
                <i class="fa-brands fa-telegram"></i>Grupo oficial
            </a>
        </section>

        <section class="section-card">
            <h3>Como funciona</h3>
            <div class="summary-grid">
                <div class="summary-box">
                    <span>Rede</span>
                    <strong>3 niveis</strong>
                </div>
                <div class="summary-box">
                    <span>Comissao</span>
                    <strong>Por atividade</strong>
                </div>
                <div class="summary-box">
                    <span>Garantidas</span>
                    <strong>Via Telegram</strong>
                </div>
                <div class="summary-box">
                    <span>Convite</span>
                    <strong>Link ou codigo</strong>
                </div>
            </div>
        </section>

        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item active" href="{{ route('user.invite') }}"><i class="fa-solid fa-user-plus"></i><span>Convite</span></a>
            <a class="nav-item" href="{{ route('user.team') }}"><i class="fa-solid fa-users"></i><span>Time</span></a>
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
