<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Comunidade | CHUTBALL</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-light:rgba(255,255,255,.94); --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding-bottom:30px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .top-actions { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .brand-row { position:relative; z-index:1; display:flex; align-items:center; gap:14px; margin-bottom:18px; }
        .avatar { width:54px; height:54px; border-radius:50%; background:linear-gradient(135deg,#fefefe 0%,#d9f8e8 100%); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); box-shadow:0 10px 18px rgba(37,184,90,.15); border:2px solid rgba(255,255,255,.75); flex-shrink:0; }
        .brand-meta small { display:block; font-size:.72rem; color:#4d6b70; margin-bottom:4px; }
        .brand-meta h1 { margin:0; font-size:1.45rem; font-weight:700; }
        .brand-meta p { margin:3px 0 0; color:#3f5961; font-size:.92rem; line-height:1.45; }
        .section-card { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .section-card h3 { margin:0 0 14px; font-size:1.1rem; font-weight:700; }
        .service-item { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); border-radius:16px; padding:14px; display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:12px; text-decoration:none; color:var(--text-main); }
        .item-left { display:flex; align-items:center; gap:14px; }
        .icon-box { width:46px; height:46px; border-radius:14px; background:rgba(37,184,90,.12); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); font-size:1.15rem; }
        .item-info p { margin:0; font-size:.95rem; font-weight:700; }
        .item-info span { font-size:.76rem; color:var(--text-soft); }
        .btn-contact { background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); color:#fff; border:none; padding:10px 16px; border-radius:12px; font-weight:800; font-size:.75rem; text-decoration:none; box-shadow:0 10px 20px rgba(37,184,90,.2); }
        .arrow-icon { color:var(--accent-dark); font-size:1rem; }
        .status-dot { width:8px; height:8px; background:var(--accent); border-radius:50%; display:inline-block; margin-right:5px; box-shadow:0 0 8px rgba(37,184,90,.35); }
    </style>
</head>

<body>

    <div class="shell">
        <section class="hero">
            <div class="top-actions">
                <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{ route('profile') }}'"></i>
                <i class="fa-solid fa-headset"></i>
            </div>
            <div class="brand-row">
                <div class="avatar"><i class="fa-brands fa-telegram"></i></div>
                <div class="brand-meta">
                    <small>Comunidade oficial</small>
                    <h1>CHUTBALL</h1>
                    <p>Entre nos canais oficiais para receber palpites, novidades e avisos da plataforma todos os dias.</p>
                </div>
            </div>
        </section>

        <section class="section-card">
            <h3>Contato direto</h3>
            <div class="service-item">
                <div class="item-left">
                    <div class="icon-box"><i class="fa-brands fa-telegram"></i></div>
                    <div class="item-info">
                        <p>Telegram oficial</p>
                        <span>Atendimento e suporte da plataforma</span>
                    </div>
                </div>
                <a href="{{ telegram_link() }}" class="btn-contact" target="_blank" rel="noopener">Abrir</a>
            </div>
        </section>

        <section class="section-card">
            <h3>Comunidade e atualizacoes</h3>
            <div class="service-item" onclick="window.location.href='{{ telegram_link() }}'">
                <div class="item-left">
                    <div class="icon-box"><i class="fa-solid fa-bullhorn"></i></div>
                    <div class="item-info">
                        <p>Canal de noticias</p>
                        <span>Bilhete do mestre e comunicados</span>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right arrow-icon"></i>
            </div>

            <div class="service-item" onclick="window.location.href='{{ telegram_link() }}'">
                <div class="item-left">
                    <div class="icon-box"><i class="fa-solid fa-users"></i></div>
                    <div class="item-info">
                        <p>Grupo CHUTBALL</p>
                        <span>Troca de palpites em tempo real</span>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right arrow-icon"></i>
            </div>

            <div class="service-item" onclick="window.location.href='{{ telegram_link() }}'">
                <div class="item-left">
                    <div class="icon-box"><i class="fa-solid fa-circle-check"></i></div>
                    <div class="item-info">
                        <p>Garantidas do dia</p>
                        <span><span class="status-dot"></span>Ativas diariamente via Telegram</span>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right arrow-icon"></i>
            </div>
        </section>
    </div>

</body>
</html>
