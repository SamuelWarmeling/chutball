<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Perfil | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-a: #92e5d6;
            --bg-b: #c8f3df;
            --bg-c: #eef8f0;
            --accent: #25b85a;
            --accent-dark: #1d9548;
            --card-dark: #35395a;
            --card-light: rgba(255, 255, 255, 0.94);
            --text-main: #243044;
            --text-soft: #65748b;
            --line: rgba(36, 48, 68, 0.08);
        }
        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        body {
            margin: 0;
            font-family: "Georgia", "Times New Roman", serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at 18% 16%, rgba(255, 255, 255, 0.34), transparent 22%),
                radial-gradient(circle at 82% 28%, rgba(255, 255, 255, 0.28), transparent 18%),
                radial-gradient(circle at 50% 72%, rgba(255, 255, 255, 0.18), transparent 24%),
                linear-gradient(180deg, var(--bg-a) 0%, var(--bg-b) 52%, var(--bg-c) 100%);
            min-height: 100vh;
            padding-bottom: 92px;
        }
        .shell { max-width: 430px; margin: 0 auto; min-height: 100vh; position: relative; }
        .hero { padding: 22px 18px 12px; position: relative; overflow: hidden; }
        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.18) 0 8%, transparent 8% 14%, rgba(255,255,255,0.12) 14% 17%, transparent 17% 100%);
            opacity: 0.45;
            pointer-events: none;
        }
        .top-actions {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-bottom: 20px;
            color: #2a4c52;
        }
        .top-actions i { font-size: 1rem; }
        .profile-row {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }
        .avatar {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fefefe 0%, #d9f8e8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-dark);
            box-shadow: 0 10px 18px rgba(37, 184, 90, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.75);
            flex-shrink: 0;
        }
        .profile-meta small {
            display: block;
            font-size: 0.72rem;
            color: #4d6b70;
            margin-bottom: 4px;
        }
        .profile-meta h1 {
            margin: 0;
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: 0.01em;
        }
        .profile-meta p {
            margin: 2px 0 0;
            color: #3f5961;
            font-size: 0.9rem;
        }
        .balance-card {
            background: linear-gradient(180deg, #4d506f 0%, #35395a 100%);
            color: #fff;
            border-radius: 18px;
            padding: 18px 16px;
            box-shadow: 0 16px 30px rgba(53, 57, 90, 0.28);
            position: relative;
            z-index: 1;
            overflow: hidden;
        }
        .balance-card::before,
        .balance-card::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .balance-card::before { width: 120px; height: 120px; right: -30px; bottom: -50px; }
        .balance-card::after { width: 70px; height: 70px; left: 38%; bottom: -20px; }
        .balance-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            position: relative;
            z-index: 1;
        }
        .balance-head strong { display: block; font-size: 0.98rem; margin-bottom: 10px; font-weight: 700; }
        .eye { opacity: 0.75; font-size: 0.92rem; }
        .balance-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            position: relative;
            z-index: 1;
        }
        .balance-item span {
            display: block;
            font-size: 0.78rem;
            opacity: 0.78;
            margin-bottom: 4px;
        }
        .balance-item b { font-size: 2rem; line-height: 1; font-weight: 700; }
        .balance-item small { display: block; margin-top: 6px; font-size: 0.82rem; opacity: 0.85; }
        .action-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            background: rgba(255, 255, 255, 0.96);
            border-radius: 0 0 16px 16px;
            margin: -6px 8px 0;
            box-shadow: 0 10px 22px rgba(40, 76, 82, 0.08);
            overflow: hidden;
            position: relative;
            z-index: 2;
        }
        .action-strip a {
            text-decoration: none;
            color: var(--accent-dark);
            text-align: center;
            padding: 12px 8px;
            font-size: 0.8rem;
            font-weight: 700;
            border-right: 1px solid rgba(36, 48, 68, 0.06);
        }
        .action-strip a:last-child { border-right: none; }
        .action-strip i { margin-right: 6px; }
        .section-card {
            margin: 18px 16px 0;
            background: var(--card-light);
            border: 1px solid rgba(255,255,255,0.55);
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(40, 76, 82, 0.08);
            padding: 18px 16px;
        }
        .section-card h3 { margin: 0 0 14px; font-size: 1.1rem; font-weight: 700; }
        .menu-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px 10px; }
        .menu-item { text-decoration: none; color: var(--text-main); text-align: center; }
        .menu-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            margin: 0 auto 8px;
            background: linear-gradient(180deg, #ffffff 0%, #eff7f2 100%);
            border: 1px solid rgba(37, 184, 90, 0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-dark);
            box-shadow: 0 10px 20px rgba(37, 184, 90, 0.08);
            font-size: 1.05rem;
        }
        .menu-item p { margin: 0; font-size: 0.76rem; line-height: 1.2; font-weight: 700; }
        .list-card {
            margin: 16px;
            background: rgba(255, 255, 255, 0.94);
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(40, 76, 82, 0.08);
            overflow: hidden;
        }
        .list-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 16px;
            text-decoration: none;
            color: var(--text-main);
            border-bottom: 1px solid var(--line);
        }
        .list-row:last-child { border-bottom: none; }
        .list-left { display: flex; align-items: center; gap: 12px; }
        .list-left i:first-child { color: var(--accent-dark); width: 22px; text-align: center; }
        .list-left span { font-size: 0.92rem; font-weight: 700; }
        .list-row i:last-child { color: #a2aeb5; }
        .logout-wrap {
            margin: 16px;
        }
        .logout-btn {
            width: 100%;
            border: none;
            border-radius: 18px;
            padding: 16px;
            background: linear-gradient(135deg, #e63946 0%, #f06a75 100%);
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 900;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 14px 24px rgba(230, 57, 70, 0.2);
            cursor: pointer;
        }
        .bottom-nav {
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            width: 100%;
            max-width: 430px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-top: 1px solid rgba(36, 48, 68, 0.08);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            padding: 10px 4px 12px;
        }
        .nav-item { text-align: center; color: #8a97a1; text-decoration: none; }
        .nav-item.active { color: var(--accent); }
        .nav-item i { display: block; font-size: 1.18rem; margin-bottom: 4px; }
        .nav-item span { font-size: 0.68rem; font-weight: 700; }
    </style>
</head>
<body>
    @php
        $level = user_level_data();
        $deposited = \App\Models\Deposit::where('user_id', user()->id)->where('status', 'approved')->sum('amount');
        $betsCount = \App\Models\Bet::where('user_id', user()->id)->count();
        $checkin = checkin_streak_data(user());
        $pendingTickets = \App\Models\Bet::where('user_id', user()->id)->where('status', 'pending')->count();
    @endphp

    <div class="shell">
        <section class="hero">
            <div class="top-actions">
                <i class="fa-regular fa-envelope"></i>
                <i class="fa-solid fa-headset"></i>
                <i class="fa-solid fa-globe"></i>
            </div>

            <div class="profile-row">
                <div class="avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="profile-meta">
                    <small>{{ $level['key'] }} • {{ $level['name'] }}</small>
                    <h1>{{ user()->name ?: 'Jogador CHUTBALL' }}</h1>
                    <p>Identificacao: {{ user()->ref_id }}</p>
                </div>
            </div>

            <div class="balance-card">
                <div class="balance-head">
                    <strong>Meus ativos</strong>
                    <div class="eye"><i class="fa-regular fa-eye"></i></div>
                </div>
                <div class="balance-grid">
                    <div class="balance-item">
                        <span>Equilibrio</span>
                        <b>{{ number_format((float) user()->balance, 2, ',', '.') }}</b>
                        <small>Saldo em conta</small>
                    </div>
                    <div class="balance-item">
                        <span>Tickets</span>
                        <b>{{ $pendingTickets }}</b>
                        <small>Em andamento</small>
                    </div>
                </div>
            </div>

            <div class="action-strip">
                <a href="{{ route('user.deposit') }}"><i class="fa-solid fa-wallet"></i>Depositar</a>
                <a href="{{ route('user.withdraw') }}"><i class="fa-solid fa-money-bill-transfer"></i>Sacar</a>
                <a href="{{ route('history') }}"><i class="fa-solid fa-file-lines"></i>Extrato</a>
            </div>
        </section>

        <section class="section-card">
            <h3>Funcoes comuns</h3>
            <div class="menu-grid">
                <a href="{{ route('user.team') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-users"></i></div>
                    <p>Minha equipe</p>
                </a>
                <a href="{{ route('commission') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-coins"></i></div>
                    <p>Comissao</p>
                </a>
                <a href="{{ route('purchase.history') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-medal"></i></div>
                    <p>Meu nivel</p>
                </a>
                <a href="{{ route('recharge.history') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <p>Historico de recarga</p>
                </a>
                <a href="{{ route('withdraw.history') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
                    <p>Historico saque</p>
                </a>
                <a href="{{ route('ordered') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-ticket"></i></div>
                    <p>Historico de apostas</p>
                </a>
                <a href="{{ route('history') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-book"></i></div>
                    <p>Registro financeiro</p>
                </a>
                <a href="{{ route('user.bank.create') }}" class="menu-item">
                    <div class="menu-icon"><i class="fa-solid fa-building-columns"></i></div>
                    <p>Contrato</p>
                </a>
            </div>
        </section>

        <div class="list-card">
            <a class="list-row" href="{{ route('user.invite') }}">
                <div class="list-left">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Meu convite</span>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a class="list-row" href="{{ route('user.service') }}">
                <div class="list-left">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Sobre nos</span>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a class="list-row" href="{{ telegram_link() }}">
                <div class="list-left">
                    <i class="fa-brands fa-telegram"></i>
                    <span>Grupo das garantidas</span>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a class="list-row" href="{{ route('user.change.password') }}">
                <div class="list-left">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>Seguranca da conta</span>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>

        <div class="logout-wrap">
            <button type="button" class="logout-btn" onclick="window.location.href='{{ route('logout') }}'">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Sair da conta</span>
            </button>
        </div>

        <section class="section-card" style="margin-top: 0;">
            <h3>Resumo rapido</h3>
            <div class="menu-grid" style="grid-template-columns: repeat(2, 1fr); gap: 12px;">
                <div class="menu-item" style="text-align:left;">
                    <div style="font-size:0.74rem; color:var(--text-soft); margin-bottom:6px;">Total depositado</div>
                    <div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ price($deposited) }}</div>
                </div>
                <div class="menu-item" style="text-align:left;">
                    <div style="font-size:0.74rem; color:var(--text-soft); margin-bottom:6px;">Bilhetes enviados</div>
                    <div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ $betsCount }}</div>
                </div>
                <div class="menu-item" style="text-align:left;">
                    <div style="font-size:0.74rem; color:var(--text-soft); margin-bottom:6px;">Check-in atual</div>
                    <div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ $checkin['streak'] }} dia(s)</div>
                </div>
                <div class="menu-item" style="text-align:left;">
                    <div style="font-size:0.74rem; color:var(--text-soft); margin-bottom:6px;">Primeiro saque</div>
                    <div style="font-size:1.1rem; font-weight:700; color:var(--accent-dark);">{{ $betsCount >= 9 ? 'Liberado' : 'Faltam '.(9 - $betsCount) }}</div>
                </div>
            </div>
        </section>

        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
            <a class="nav-item" href="{{ route('ordered') }}">
                <i class="fa-solid fa-rectangle-list"></i>
                <span>Registro</span>
            </a>
            <a class="nav-item" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-futbol"></i>
                <span>Evento</span>
            </a>
            <a class="nav-item active" href="{{ route('profile') }}">
                <i class="fa-solid fa-user"></i>
                <span>Meu</span>
            </a>
        </nav>
    </div>
</body>
</html>
