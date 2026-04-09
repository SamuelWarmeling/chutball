<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Saque | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-a:#92e5d6; --bg-b:#c8f3df; --bg-c:#eef8f0; --accent:#25b85a; --accent-dark:#1d9548; --card-light:rgba(255,255,255,.94); --text-main:#243044; --text-soft:#65748b; --line:rgba(36,48,68,.08); }
        * { box-sizing:border-box; -webkit-tap-highlight-color:transparent; }
        body { margin:0; font-family:"Georgia","Times New Roman",serif; color:var(--text-main); background:radial-gradient(circle at 18% 16%, rgba(255,255,255,.34), transparent 22%),radial-gradient(circle at 82% 28%, rgba(255,255,255,.28), transparent 18%),radial-gradient(circle at 50% 72%, rgba(255,255,255,.18), transparent 24%),linear-gradient(180deg,var(--bg-a) 0%,var(--bg-b) 52%,var(--bg-c) 100%); min-height:100vh; padding-bottom:92px; }
        .shell { max-width:430px; margin:0 auto; min-height:100vh; }
        .hero { padding:22px 18px 12px; position:relative; overflow:hidden; }
        .hero::before { content:""; position:absolute; inset:0; background:linear-gradient(90deg, rgba(255,255,255,.18) 0 8%, transparent 8% 14%, rgba(255,255,255,.12) 14% 17%, transparent 17% 100%); opacity:.45; pointer-events:none; }
        .hero-top { position:relative; z-index:1; display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; color:#2a4c52; }
        .hero-top strong { font-size:1.25rem; }
        .hero-top a { color:var(--accent-dark); text-decoration:none; font-weight:700; }
        .hero-card { background:linear-gradient(180deg,#4d506f 0%,#35395a 100%); color:#fff; border-radius:18px; padding:18px 16px; box-shadow:0 16px 30px rgba(53,57,90,.28); position:relative; z-index:1; overflow:hidden; }
        .hero-card::before, .hero-card::after { content:""; position:absolute; border-radius:50%; background:rgba(255,255,255,.06); }
        .hero-card::before { width:120px; height:120px; right:-30px; bottom:-50px; }
        .hero-card::after { width:70px; height:70px; left:38%; bottom:-20px; }
        .hero-grid { position:relative; z-index:1; display:grid; grid-template-columns:repeat(2,1fr); gap:18px; margin-top:12px; }
        .hero-stat span { display:block; font-size:.78rem; opacity:.78; margin-bottom:6px; }
        .hero-stat strong { display:block; font-size:1.2rem; line-height:1.1; }
        .panel, .rules { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .field { margin-top:16px; }
        .field label { display:block; color:var(--text-soft); text-transform:uppercase; font-size:.72rem; margin-bottom:10px; font-weight:700; letter-spacing:.03em; }
        .input { display:flex; align-items:center; gap:10px; background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); border-radius:16px; padding:0 16px; }
        .input span, .input i:first-child { color:var(--accent-dark); font-weight:700; }
        .input input { width:100%; border:none; background:transparent; color:var(--text-main); font-size:1rem; padding:17px 0; outline:none; font-weight:700; font-family:inherit; }
        .helper { display:flex; justify-content:space-between; color:var(--text-soft); font-size:.8rem; margin-top:10px; gap:10px; }
        .helper strong { color:var(--accent-dark); }
        .submit { width:100%; margin-top:18px; border:none; border-radius:16px; padding:16px; color:#fff; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); font-size:.96rem; font-weight:700; box-shadow:0 14px 22px rgba(37,184,90,.22); font-family:inherit; }
        .rules h3 { margin:0 0 12px; font-size:1rem; }
        .rules ul { margin:0; padding-left:18px; color:var(--text-soft); line-height:1.65; font-size:.84rem; }
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
                <strong>Saque da conta</strong>
                <a href="{{ route('withdraw.history') }}">Historico</a>
            </div>
            <div class="hero-card">
                <strong style="position:relative; z-index:1; font-size:1rem; display:block;">Painel de saque</strong>
                <div class="hero-grid">
                    <div class="hero-stat"><span>Saldo disponivel</span><strong>{{ price(user()->balance) }}</strong></div>
                    <div class="hero-stat"><span>Bilhetes enviados</span><strong>{{ \App\Models\Bet::where('user_id', user()->id)->count() }}</strong></div>
                </div>
            </div>
        </section>
        <div class="panel">
            <form action="{{ route('user.withdraw.request') }}" method="post">
                @csrf
                <div class="field">
                    <label>Valor do saque</label>
                    <div class="input"><span>R$</span><input type="number" name="amount" id="amountInput" min="20" step="0.01" placeholder="20,00" required></div>
                    <div class="helper"><span>Taxa fixa de 7%</span><span id="receiveLabel">Liquido: <strong>R$ 0,00</strong></span></div>
                </div>
                <div class="field">
                    <label>Senha de saque</label>
                    <div class="input"><i class="fa-solid fa-lock"></i><input type="password" name="password" id="passInput" placeholder="Confirme sua senha" required><i class="fa-solid fa-eye" onclick="togglePass()" style="cursor:pointer; color:var(--text-soft);"></i></div>
                </div>
                <button type="submit" class="submit">Solicitar saque</button>
            </form>
        </div>
        <div class="rules">
            <h3>Regras de saque</h3>
            <ul>
                <li>Saque minimo de R$ 20,00.</li>
                <li>Desconto automatico de 7% por solicitacao.</li>
                <li>O primeiro saque so e liberado apos 9 apostas registradas.</li>
                <li>Confira sua chave ou conta cadastrada antes de enviar.</li>
            </ul>
        </div>
        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item active" href="{{ route('user.withdraw') }}"><i class="fa-solid fa-money-bill-transfer"></i><span>Saque</span></a>
            <a class="nav-item" href="{{ route('ordered') }}"><i class="fa-solid fa-ticket"></i><span>Bilhetes</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Meu</span></a>
        </nav>
    </div>
    <script>
        function togglePass() {
            const input = document.getElementById('passInput');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
        document.getElementById('amountInput').addEventListener('input', function (event) {
            const value = Number(event.target.value || 0);
            const receive = value > 0 ? (value * 0.93).toFixed(2).replace('.', ',') : '0,00';
            document.getElementById('receiveLabel').innerHTML = `Liquido: <strong>R$ ${receive}</strong>`;
        });
    </script>
</body>
</html>
