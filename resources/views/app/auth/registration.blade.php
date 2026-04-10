<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Cadastro | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-a: #92e5d6;
            --bg-b: #c8f3df;
            --bg-c: #eef8f0;
            --accent: #25b85a;
            --accent-blue: #3A86FF;
            --accent-dark: #1d9548;
            --card-light: rgba(255, 255, 255, 0.92);
            --text-main: #243044;
            --text-soft: #65748b;
            --danger: #E63946;
        }
        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Georgia", "Times New Roman", serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),
                radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),
                radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),
                linear-gradient(180deg, var(--bg-a) 0%, var(--bg-b) 52%, var(--bg-c) 100%);
        }
        .shell { max-width: 430px; min-height: 100vh; margin: 0 auto; padding: 22px 16px 28px; }
        .hero { position: relative; overflow: hidden; padding: 8px 4px 18px; }
        .hero::before { content: ""; position: absolute; inset: 0; background: linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity: .45; pointer-events: none; }
        .top-actions { position: relative; z-index: 1; display: flex; justify-content: flex-end; gap: 14px; margin-bottom: 20px; color: #2a4c52; }
        .brand-row { position: relative; z-index: 1; display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
        .avatar { width: 54px; height: 54px; border-radius: 50%; background: linear-gradient(135deg, #fefefe 0%, #d9f8e8 100%); display: flex; align-items: center; justify-content: center; color: var(--accent-dark); box-shadow: 0 10px 18px rgba(37, 184, 90, 0.15); border: 2px solid rgba(255, 255, 255, 0.75); flex-shrink: 0; }
        .brand-meta small { display: block; font-size: .72rem; color: #4d6b70; margin-bottom: 4px; }
        .brand-meta h1 { margin: 0; font-size: 1.45rem; font-weight: 700; letter-spacing: .01em; }
        .brand-meta p { margin: 3px 0 0; color: #3f5961; font-size: .92rem; line-height: 1.45; }
        .auth-card { background: var(--card-light); border: 1px solid rgba(255,255,255,.55); border-radius: 24px; box-shadow: 0 14px 28px rgba(40, 76, 82, 0.08); padding: 18px 16px 20px; }
        .logo { display: flex; justify-content: center; margin-bottom: 10px; }
        .logo img { width: 108px; height: auto; }
        .tabs { display: flex; gap: 22px; margin-bottom: 18px; }
        .tabs a, .tabs span { text-decoration: none; color: var(--text-soft); font-size: 1rem; font-weight: 700; padding-bottom: 6px; }
        .tabs .active { color: var(--text-main); border-bottom: 3px solid var(--accent-blue); }
        .alert { border-radius: 14px; padding: 12px 14px; margin-bottom: 16px; font-size: .88rem; line-height: 1.45; font-weight: 700; background: rgba(230, 57, 70, 0.12); color: #8f1d28; border: 1px solid rgba(230, 57, 70, 0.22); }
        .field { margin-bottom: 14px; }
        .field label { display: block; margin-bottom: 8px; color: var(--accent-blue); text-transform: uppercase; font-size: .76rem; letter-spacing: .08em; font-weight: 700; }
        .input-box { display: flex; align-items: center; gap: 12px; background: rgba(255,255,255,.95); border: 2px solid #dce7de; border-radius: 16px; padding: 0 16px; min-height: 60px; transition: .2s ease; }
        .input-box:focus-within { border-color: var(--accent-blue); box-shadow: 0 0 0 4px rgba(58, 134, 255, 0.12); }
        .prefix { color: var(--text-main); font-weight: 700; padding-right: 12px; border-right: 2px solid #dce7de; }
        .input-box input { width: 100%; border: none; background: transparent; outline: none; color: var(--text-main); font-size: 1rem; font-family: inherit; }
        .input-box input::placeholder { color: #7d8c93; }
        .login-link { display: block; text-align: right; margin: 4px 0 18px; color: var(--text-soft); text-decoration: none; font-size: .88rem; font-weight: 700; }
        .login-link span { color: var(--accent-blue); }
        .btn { width: 100%; border: none; border-radius: 16px; padding: 16px; color: #fff; font-size: 1rem; font-weight: 900; text-transform: uppercase; background: linear-gradient(135deg, #3A86FF 0%, #62a2ff 100%); box-shadow: 0 14px 26px rgba(58, 134, 255, 0.28); cursor: pointer; }
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
            <div class="avatar"><i class="fa-solid fa-user-plus"></i></div>
            <div class="brand-meta">
                <small>Entrada na plataforma</small>
                <h1>CHUTBALL</h1>
                <p>Crie sua conta para acompanhar jogos, operar saques e entrar no ecossistema do app.</p>
            </div>
        </div>
    </section>

    <section class="auth-card">
        <div class="logo">
            <img src="/green/logo.webp" alt="CHUTBALL">
        </div>
        <div class="tabs">
            <span class="active">Cadastro</span>
            <a href="{{ route('login') }}">Login</a>
        </div>

    @if (session('message'))
        <div class="alert">
            @if (is_object(session('message')))
                {{ session('message')->first() }}
            @else
                {{ session('message') }}
            @endif
        </div>
    @endif

    @if ($errors->any())
        <div class="alert">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="alert" style="background:rgba(56,176,0,.12); color:#246d00; border-color:rgba(56,176,0,.22);">{{ session('success') }}</div>
    @endif

    <form action="{{url('register')}}" method="post">
        @csrf

        <div class="field">
            <label>Numero de telefone</label>
            <div class="input-box">
                <div class="prefix">+55</div>
                <input type="tel" name="phone" placeholder="Seu telefone" required>
            </div>
        </div>

        <div class="field">
            <label>Criar senha</label>
            <div class="input-box">
                <input type="password" name="password" placeholder="Sua senha" required>
            </div>
        </div>

        <div class="field">
            <label>Codigo de convite</label>
            <div class="input-box">
                <input name="ref_by" value="{{ isset($ref_by) && !empty($ref_by) ? $ref_by : '' }}" type="text" placeholder="Opcional">
            </div>
        </div>

        <a href="{{route('login')}}" class="login-link">Ja tem conta? <span>Entrar</span></a>

        <button type="submit" class="btn">Criar conta</button>
    </form>
    </section>
</div>

</body>
</html>
