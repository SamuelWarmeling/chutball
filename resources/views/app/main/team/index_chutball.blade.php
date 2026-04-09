<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Time | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-main:#CFE8D5; --bg-grad-a:#eef8f0; --bg-grad-b:#bdd9c4; --accent:#3A86FF; --success:#38B000; --text-main:#16324a; --text-gray:#627479; --line:rgba(22,50,74,.08); }
        body { margin:0; font-family:"Montserrat",sans-serif; color:var(--text-main); background:radial-gradient(circle at top left, rgba(58,134,255,.16), transparent 26%),radial-gradient(circle at bottom right, rgba(56,176,0,.10), transparent 24%),linear-gradient(145deg,var(--bg-grad-a) 0%,var(--bg-main) 46%,var(--bg-grad-b) 100%); padding-bottom:88px; }
        .header,.bottom { background:rgba(245,245,245,.88); backdrop-filter:blur(12px); }
        .header { padding:16px 20px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid var(--line); }
        .hero,.card { background:rgba(245,245,245,.92); border:1px solid var(--line); border-radius:20px; box-shadow:0 16px 28px rgba(22,50,74,.08); }
        .hero { margin:16px; padding:20px; }
        .stats { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; margin-top:14px; }
        .stat span { display:block; color:var(--text-gray); font-size:.68rem; text-transform:uppercase; margin-bottom:6px; }
        .stat strong { color:var(--accent); font-size:1rem; }
        .card { margin:0 16px 14px; padding:18px; }
        .row { display:flex; justify-content:space-between; gap:12px; padding:10px 0; border-bottom:1px solid var(--line); font-size:.84rem; }
        .row:last-child { border-bottom:none; }
        .row span { color:var(--text-gray); }
        .row strong { text-align:right; }
        .link-box { background:rgba(255,255,255,.9); border:1px dashed var(--line); border-radius:14px; padding:12px; font-size:.8rem; word-break:break-all; }
        .copy-btn { margin-top:12px; display:inline-flex; gap:8px; align-items:center; background:linear-gradient(135deg,#3A86FF 0%,#62a2ff 100%); color:#fff; border:none; padding:11px 14px; border-radius:12px; font-weight:800; }
        .bottom { position:fixed; left:0; bottom:0; width:100%; display:flex; padding:12px 0; border-top:1px solid var(--line); }
        .bottom-item { flex:1; text-align:center; color:var(--text-gray); }
        .bottom-item.active { color:var(--accent); }
        .bottom-item i { display:block; font-size:1.15rem; margin-bottom:4px; }
        .bottom-item p { margin:0; font-size:.64rem; font-weight:700; }
    </style>
</head>
<body>
    <div class="header">
        <strong>Seu time</strong>
        <i class="fa-solid fa-share-nodes" style="color:var(--accent);" onclick="window.location.href='{{ route('user.invite') }}'"></i>
    </div>

    <div class="hero">
        <div style="font-size:1.2rem; font-weight:900;">Rede de indicacao</div>
        <div style="margin-top:6px; color:var(--text-gray);">Acompanhe membros, comissoes e desempenho da sua estrutura de equipe.</div>
        <div class="stats">
            <div class="stat"><span>Total de membros</span><strong>{{ $team_size }}</strong></div>
            <div class="stat"><span>Comissao total</span><strong>{{ price($levelTotalCommission1 + $levelTotalCommission2 + $levelTotalCommission3) }}</strong></div>
            <div class="stat"><span>Depositos da rede</span><strong>{{ price($lvTotalDeposit) }}</strong></div>
            <div class="stat"><span>Saques da rede</span><strong>{{ price($lvTotalWithdraw) }}</strong></div>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-top:0;">Link de convite</h3>
        <div class="link-box">{{ url('account/create').'?inviteCode='.auth()->user()->ref_id }}</div>
        <button class="copy-btn" onclick="copyText('{{ url('account/create').'?inviteCode='.auth()->user()->ref_id }}')"><i class="fa-regular fa-copy"></i>Copiar link</button>
    </div>

    <div class="card">
        <h3 style="margin-top:0;">Resumo por nivel</h3>
        <div class="row"><span>Nivel 1</span><strong>{{ $first_level_users->count() }} membros • {{ price($levelTotalCommission1) }}</strong></div>
        <div class="row"><span>Nivel 2</span><strong>{{ $second_level_users->count() }} membros • {{ price($levelTotalCommission2) }}</strong></div>
        <div class="row"><span>Nivel 3</span><strong>{{ $third_level_users->count() }} membros • {{ price($levelTotalCommission3) }}</strong></div>
    </div>

    <div class="card">
        <h3 style="margin-top:0;">Atividade da equipe</h3>
        <div class="row"><span>Membros ativos N1</span><strong>{{ $activeMembers1 }}</strong></div>
        <div class="row"><span>Membros ativos N2</span><strong>{{ $activeMembers2 }}</strong></div>
        <div class="row"><span>Membros ativos N3</span><strong>{{ $activeMembers3 }}</strong></div>
    </div>

    <div class="bottom">
        <div class="bottom-item" onclick="window.location.href='{{ route('dashboard') }}'"><i class="fa-solid fa-house"></i><p>Home</p></div>
        <div class="bottom-item" onclick="window.location.href='{{ route('ordered') }}'"><i class="fa-solid fa-ticket"></i><p>Bilhetes</p></div>
        <div class="bottom-item active" onclick="window.location.href='{{ route('user.team') }}'"><i class="fa-solid fa-users"></i><p>Time</p></div>
        <div class="bottom-item" onclick="window.location.href='{{ route('profile') }}'"><i class="fa-solid fa-user"></i><p>Perfil</p></div>
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
