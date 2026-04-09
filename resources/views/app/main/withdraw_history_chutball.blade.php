<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Historico de Saques | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg-main:#CFE8D5; --bg-grad-a:#eef8f0; --bg-grad-b:#bdd9c4; --accent:#3A86FF; --success:#38B000; --danger:#E63946; --warn:#d9a404; --text-main:#16324a; --text-gray:#627479; --line:rgba(22,50,74,.08); }
        body { margin:0; font-family:"Montserrat",sans-serif; color:var(--text-main); background:radial-gradient(circle at top left, rgba(58,134,255,.16), transparent 26%),radial-gradient(circle at bottom right, rgba(56,176,0,.10), transparent 24%),linear-gradient(145deg,var(--bg-grad-a) 0%,var(--bg-main) 46%,var(--bg-grad-b) 100%); padding-bottom:30px; }
        .header { padding:16px 20px; display:flex; align-items:center; gap:14px; background:rgba(245,245,245,.88); backdrop-filter:blur(12px); border-bottom:1px solid var(--line); }
        .header i { color:var(--accent); cursor:pointer; }
        .list { padding:16px; display:grid; gap:12px; }
        .card { background:rgba(245,245,245,.92); border:1px solid var(--line); border-radius:18px; box-shadow:0 16px 28px rgba(22,50,74,.08); padding:16px; }
        .top { display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; }
        .status { padding:6px 10px; border-radius:999px; font-size:.68rem; font-weight:800; }
        .approved { color:var(--success); background:rgba(56,176,0,.1); }
        .pending { color:var(--warn); background:rgba(217,164,4,.1); }
        .rejected { color:var(--danger); background:rgba(230,57,70,.1); }
        .amount { font-size:1.05rem; font-weight:900; color:var(--accent); }
        .meta { color:var(--text-gray); font-size:.8rem; line-height:1.55; }
    </style>
</head>
<body>
    <div class="header">
        <i class="fa-solid fa-chevron-left" onclick="window.location.href='{{ route('user.withdraw') }}'"></i>
        <strong>Historico de saques</strong>
    </div>
    <div class="list">
        @forelse(\App\Models\Withdrawal::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
            <div class="card">
                <div class="top">
                    <strong>Solicitacao de saque</strong>
                    <span class="status {{ $element->status }}">{{ strtoupper($element->status) }}</span>
                </div>
                <div class="amount">{{ price($element->amount) }}</div>
                <div class="meta">Liquido: {{ price($element->final_amount) }} • Metodo: {{ $element->method_name }}</div>
                <div class="meta">{{ $element->created_at }}</div>
            </div>
        @empty
            <div class="card"><strong>Nenhum saque encontrado.</strong></div>
        @endforelse
    </div>
</body>
</html>
