<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Depositar | CHUTBALL</title>
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
        .panel, .tips { margin:18px 16px 0; background:var(--card-light); border:1px solid rgba(255,255,255,.55); border-radius:20px; box-shadow:0 14px 28px rgba(40,76,82,.08); padding:18px 16px; }
        .label { display:block; color:var(--text-soft); text-transform:uppercase; font-size:.72rem; font-weight:700; margin:16px 0 10px; letter-spacing:.03em; }
        .amount-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:10px; }
        .amount-item { background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); border:1px solid rgba(37,184,90,.12); padding:12px; border-radius:14px; text-align:center; font-size:.9rem; font-weight:700; }
        .amount-item.active { background:rgba(37,184,90,.1); border-color:rgba(37,184,90,.28); color:var(--accent-dark); }
        .input, .select { display:flex; align-items:center; gap:10px; border:1px solid rgba(37,184,90,.12); border-radius:14px; background:linear-gradient(180deg,#ffffff 0%,#eff7f2 100%); padding:0 14px; }
        .input i, .select i { color:var(--accent-dark); }
        .input input, .select select { width:100%; border:none; background:transparent; padding:16px 0; font-size:.95rem; color:var(--text-main); outline:none; font-family:inherit; }
        .btn { width:100%; border:none; border-radius:14px; padding:16px; font-size:.95rem; font-weight:700; color:#fff; background:linear-gradient(135deg,#25b85a 0%,#3cc96e 100%); box-shadow:0 14px 22px rgba(37,184,90,.22); margin-top:18px; font-family:inherit; }
        .tips h3 { margin:0 0 10px; font-size:1rem; }
        .tips p { margin:0; color:var(--text-soft); font-size:.84rem; line-height:1.65; }
        .bottom-nav { position:fixed; left:50%; transform:translateX(-50%); bottom:0; width:100%; max-width:430px; background:rgba(255,255,255,.95); backdrop-filter:blur(12px); border-top:1px solid rgba(36,48,68,.08); display:grid; grid-template-columns:repeat(4,1fr); padding:10px 4px 12px; }
        .nav-item { text-align:center; color:#8a97a1; text-decoration:none; }
        .nav-item.active { color:var(--accent); }
        .nav-item i { display:block; font-size:1.18rem; margin-bottom:4px; }
        .nav-item span { font-size:.68rem; font-weight:700; }
        #loader { display:none; position:fixed; inset:0; background:rgba(36,48,68,.35); backdrop-filter:blur(4px); align-items:center; justify-content:center; z-index:999; }
        .spinner { width:42px; height:42px; border:4px solid rgba(255,255,255,.5); border-top:4px solid var(--accent); border-radius:50%; animation:spin 1s linear infinite; }
        @keyframes spin { 100% { transform:rotate(360deg); } }
    </style>
</head>
<body>
    <div class="shell">
        <section class="hero">
            <div class="hero-top">
                <strong>Depositar saldo</strong>
                <a href="{{ route('recharge.history') }}">Historico</a>
            </div>
            <div class="hero-card">
                <strong style="position:relative; z-index:1; font-size:1rem; display:block;">Entrada de saldo</strong>
                <div class="hero-grid">
                    <div class="hero-stat"><span>Saldo atual</span><strong>{{ price(user()->balance) }}</strong></div>
                    <div class="hero-stat"><span>Total depositado</span><strong>{{ price(\App\Models\Deposit::where('user_id', user()->id)->where('status', 'approved')->sum('amount')) }}</strong></div>
                </div>
            </div>
        </section>
        <section class="panel">
            <span class="label">Valores rapidos</span>
            <div class="amount-grid">
                <div class="amount-item" onclick="setAmount(this, 20)">R$ 20</div>
                <div class="amount-item" onclick="setAmount(this, 50)">R$ 50</div>
                <div class="amount-item" onclick="setAmount(this, 100)">R$ 100</div>
                <div class="amount-item" onclick="setAmount(this, 200)">R$ 200</div>
                <div class="amount-item" onclick="setAmount(this, 500)">R$ 500</div>
                <div class="amount-item" onclick="setAmount(this, 1000)">R$ 1.000</div>
            </div>
            <span class="label">Valor manual</span>
            <div class="input"><i class="fa-solid fa-wallet"></i><input type="number" id="amount-input" placeholder="Digite o valor do deposito" min="20"></div>
            <span class="label">Metodo</span>
            <div class="select">
                <i class="fa-solid fa-building-columns"></i>
                <select id="channel">
                    @foreach(\App\Models\PaymentMethod::get() as $element)
                        <option value="{{ $element->id }}">{{ $element->channel }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn" onclick="deposit()">Continuar deposito</button>
        </section>
        <section class="tips">
            <h3>Regras de entrada</h3>
            <p>O valor inicial da plataforma comeca em R$ 20,00. Depositos aprovados aumentam seu limite operacional e ajudam na subida de nivel. Se a recarga nao cair, confira o metodo escolhido e fale com o suporte.</p>
        </section>
        <nav class="bottom-nav">
            <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-item active" href="{{ route('user.deposit') }}"><i class="fa-solid fa-wallet"></i><span>Deposito</span></a>
            <a class="nav-item" href="{{ route('ordered') }}"><i class="fa-solid fa-ticket"></i><span>Bilhetes</span></a>
            <a class="nav-item" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Meu</span></a>
        </nav>
    </div>
    <div id="loader"><div class="spinner"></div></div>
    <script>
        function setAmount(el, val) {
            document.querySelectorAll('.amount-item').forEach(item => item.classList.remove('active'));
            el.classList.add('active');
            document.getElementById('amount-input').value = val;
        }
        function deposit() {
            var amount = Number(document.getElementById('amount-input').value || 0);
            var channel = document.getElementById('channel').value;
            if (amount >= 20) {
                document.getElementById('loader').style.display = 'flex';
                window.location.href = '{{ url('siglepay/request') }}' + '/' + amount + '/' + channel;
            } else {
                alert('O deposito minimo e R$ 20,00');
            }
        }
    </script>
</body>
</html>
