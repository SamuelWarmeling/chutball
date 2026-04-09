<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Convites | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-main:#CFE8D5; --bg-grad-a:#eef8f0; --bg-grad-b:#bdd9c4; --accent:#3A86FF; --success:#38B000; --text-main:#16324a; --text-gray:#627479; --line:rgba(22,50,74,.08); }
        body { margin:0; font-family:"Montserrat",sans-serif; color:var(--text-main); background:radial-gradient(circle at top left, rgba(58,134,255,.16), transparent 26%),radial-gradient(circle at bottom right, rgba(56,176,0,.10), transparent 24%),linear-gradient(145deg,var(--bg-grad-a) 0%,var(--bg-main) 46%,var(--bg-grad-b) 100%); padding-bottom:30px; }
        .header { padding:16px 20px; display:flex; align-items:center; gap:14px; background:rgba(245,245,245,.88); backdrop-filter:blur(12px); border-bottom:1px solid var(--line); }
        .header i { color:var(--accent); cursor:pointer; }
        .card { margin:16px; padding:18px; background:rgba(245,245,245,.92); border:1px solid var(--line); border-radius:20px; box-shadow:0 16px 28px rgba(22,50,74,.08); }
        .code { font-size:1.2rem; font-weight:900; color:var(--accent); letter-spacing:.08em; }
        .copy { margin-top:12px; display:flex; gap:10px; }
        .copy button,.telegram { border:none; border-radius:12px; padding:12px 14px; font-weight:800; }
        .copy button { background:rgba(58,134,255,.12); color:var(--accent); }
        .telegram { background:linear-gradient(135deg,#3A86FF 0%,#62a2ff 100%); color:#fff; text-decoration:none; display:inline-flex; align-items:center; gap:8px; margin-top:8px; }
        p { color:var(--text-gray); line-height:1.6; font-size:.84rem; }
    </style>
</head>
<body>
    <div class="header">
        <i class="fa-solid fa-chevron-left" onclick="window.location.href='{{ route('dashboard') }}'"></i>
        <strong>Convide seu time</strong>
    </div>
    <div class="card">
        <h3 style="margin-top:0;">Seu codigo</h3>
        <div class="code">{{ auth()->user()->ref_id }}</div>
        <p>Compartilhe seu link ou codigo de convite para montar sua rede e receber comissao de equipe nas apostas da plataforma.</p>
        <div style="word-break:break-all; font-size:.82rem; color:var(--text-main);">{{ url('account/create').'?inviteCode='.auth()->user()->ref_id }}</div>
        <div class="copy">
            <button onclick="copyText('{{ auth()->user()->ref_id }}')">Copiar codigo</button>
            <button onclick="copyText('{{ url('account/create').'?inviteCode='.auth()->user()->ref_id }}')">Copiar link</button>
        </div>
        <a href="{{ telegram_link() }}" class="telegram"><i class="fa-brands fa-telegram"></i>Grupo oficial</a>
    </div>
    <div class="card">
        <h3 style="margin-top:0;">Como funciona</h3>
        <p>Seu time conta ate 3 niveis de indicacao. O sistema soma membros, depositos e comissoes geradas pela atividade da rede. As apostas garantidas continuam sendo divulgadas no Telegram oficial.</p>
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
