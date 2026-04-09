<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Historico de Apostas | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-main:#CFE8D5; --bg-grad-a:#eef8f0; --bg-grad-b:#bdd9c4; --accent:#3A86FF; --text-main:#16324a; --text-gray:#627479; --line:rgba(22,50,74,.08); }
        body { margin:0; font-family:"Montserrat",sans-serif; color:var(--text-main); background:radial-gradient(circle at top left, rgba(58,134,255,.16), transparent 26%),radial-gradient(circle at bottom right, rgba(56,176,0,.10), transparent 24%),linear-gradient(145deg,var(--bg-grad-a) 0%,var(--bg-main) 46%,var(--bg-grad-b) 100%); padding-bottom:30px; }
        .header { padding:16px 20px; display:flex; align-items:center; gap:14px; background:rgba(245,245,245,.88); backdrop-filter:blur(12px); border-bottom:1px solid var(--line); }
        .header i { color:var(--accent); cursor:pointer; }
        .list { padding:16px; display:grid; gap:12px; }
        .item { background:rgba(245,245,245,.92); border-radius:18px; border:1px solid var(--line); box-shadow:0 16px 28px rgba(22,50,74,.08); padding:16px; }
        .item h3 { margin:0 0 6px; font-size:.96rem; }
        .meta,.small { color:var(--text-gray); font-size:.8rem; }
        .row { display:flex; justify-content:space-between; align-items:center; margin-top:10px; font-size:.84rem; }
        .row strong { color:var(--accent); }
        .empty { text-align:center; margin:16px; padding:28px 20px; background:rgba(245,245,245,.92); border:1px solid var(--line); border-radius:18px; }
    </style>
</head>
<body>
    <div class="header">
        <i class="fa-solid fa-chevron-left" onclick="window.location.href='{{ route('dashboard') }}'"></i>
        <strong>Historico de apostas</strong>
    </div>
    <div class="list">
        @forelse($bets as $bet)
            <div class="item">
                <h3>{{ optional($bet->match)->home_team }} x {{ optional($bet->match)->away_team }}</h3>
                <div class="meta">{{ optional($bet->match)->league }} • {{ $bet->created_at->format('d/m/Y H:i') }}</div>
                <div class="row"><span>Palpite</span><strong>{{ $bet->selection }}</strong></div>
                <div class="row"><span>Tipo</span><strong>{{ $bet->bet_type === 'guaranteed' ? 'Garantida' : 'Sem garantia' }}</strong></div>
                <div class="row"><span>Stake</span><strong>{{ price($bet->stake) }}</strong></div>
                <div class="row"><span>Retorno potencial</span><strong>{{ price($bet->potential_win) }}</strong></div>
                <div class="row"><span>Status</span><strong>{{ strtoupper($bet->status) }}</strong></div>
            </div>
        @empty
            <div class="empty">
                <h3>Nenhuma aposta registrada</h3>
                <div class="small">Assim que voce enviar bilhetes, eles aparecem aqui.</div>
            </div>
        @endforelse
    </div>
</body>
</html>
