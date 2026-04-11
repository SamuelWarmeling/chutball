<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Seguranca | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-light:rgba(255,255,255,.94); --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding:0 0 30px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .top-actions { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .brand-row { position:relative; z-index:1; display:flex; align-items:center; gap:14px; margin-bottom:18px; }
        .avatar { width:54px; height:54px; border-radius:50%; background:linear-gradient(135deg,#fefefe 0%,#d9f8e8 100%); display:flex; align-items:center; justify-content:center; color:var(--accent-dark); box-shadow:0 10px 18px rgba(37,184,90,.15); border:2px solid rgba(255,255,255,.75); flex-shrink:0; }
        .brand-meta small { display:block; font-size:.72rem; color:#4d6b70; margin-bottom:4px; }
        .brand-meta h1 { margin:0; font-size:1.45rem; font-weight:700; letter-spacing:.01em; }
        .brand-meta p { margin:3px 0 0; color:#3f5961; font-size:.92rem; line-height:1.45; }
        .card { margin:0 16px; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .tabs { display:flex; gap:18px; margin-bottom:18px; font-size:.92rem; font-weight:700; }
        .tabs a { text-decoration:none; color:#7c8b94; }
        .tabs a.active { color:var(--accent-dark); border-bottom:3px solid var(--accent); padding-bottom:6px; }
        .field { margin-bottom:16px; }
        .field label { display:block; color:var(--accent-dark); text-transform:uppercase; font-size:.72rem; font-weight:700; margin-bottom:8px; }
        .input { display:flex; align-items:center; gap:10px; border:1px solid rgba(36,48,68,.12); border-radius:14px; background:rgba(255,255,255,.95); padding:0 14px; }
        .input i { color:var(--accent-dark); }
        .input input { width:100%; border:none; background:transparent; padding:16px 0; font-size:.95rem; color:var(--text-main); outline:none; font-family:inherit; }
        .submit { width:100%; border:none; border-radius:14px; padding:16px; color:#fff; font-size:.95rem; font-weight:900; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); box-shadow:0 14px 22px rgba(37,184,90,.22); cursor:pointer; font-family:inherit; }
        .flash { margin:0 16px 14px; border-radius:16px; padding:14px 16px; font-size:.85rem; font-weight:700; }
        .flash.error { background:rgba(230,57,70,.12); color:#b7303a; border:1px solid rgba(230,57,70,.22); }
        .flash.success { background:rgba(56,176,0,.12); color:#257300; border:1px solid rgba(56,176,0,.22); }
    </style>
</head>
<body>
    <div class="shell">
        <section class="hero">
            <div class="top-actions">
                <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{ route('profile') }}'"></i>
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div class="brand-row">
                <div class="avatar"><i class="fa-solid fa-lock"></i></div>
                <div class="brand-meta">
                    <small>Seguranca da conta</small>
                    <h1>CHUTBALL</h1>
                    <p>Atualize sua senha de login sem sair do mesmo visual claro da plataforma.</p>
                </div>
            </div>
        </section>

        @if(session('error'))
            <div class="flash error">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="flash success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.change.password.confirmation') }}" method="post" class="card">
            @csrf
            <div class="tabs">
                <a href="{{ route('user.change.tpassword') }}">Senha de saque</a>
                <a href="{{ route('user.change.password') }}" class="active">Senha de login</a>
            </div>

            <div class="field">
                <label>Senha atual</label>
                <div class="input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="old_password" placeholder="Digite sua senha atual" required>
                </div>
            </div>

            <div class="field">
                <label>Nova senha</label>
                <div class="input">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" name="new_password" placeholder="Digite a nova senha" required>
                </div>
            </div>

            <div class="field">
                <label>Confirmar senha</label>
                <div class="input">
                    <i class="fa-solid fa-circle-check"></i>
                    <input type="password" name="confirm_password" placeholder="Repita a nova senha" required>
                </div>
            </div>

            <button type="submit" class="submit">Atualizar senha</button>
        </form>
    </div>
</body>
</html>
