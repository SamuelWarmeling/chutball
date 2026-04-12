<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Conta de Saque | CHUTBALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-main: #CFE8D5;
            --bg-grad-a: #eef8f0;
            --bg-grad-b: #bdd9c4;
            --accent: #25b85a;
            --accent-strong: #1d9548;
            --success: #38B000;
            --text-main: #16324a;
            --text-gray: #627479;
            --line: rgba(22, 50, 74, 0.08);
        }
        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        body {
            margin: 0;
            font-family: "Georgia", "Times New Roman", serif;
            color: var(--text-main);
            background:
                radial-gradient(circle at top left, rgba(37, 184, 90, 0.16), transparent 26%),
                radial-gradient(circle at bottom right, rgba(56, 176, 0, 0.10), transparent 24%),
                linear-gradient(180deg, #92e5d6 0%, #c8f3df 52%, #eef8f0 100%);
            min-height: 100vh;
            padding-bottom: 30px;
        }
        .shell {
            max-width: 430px;
            margin: 0 auto;
            min-height: 100vh;
        }
        .header {
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(245,245,245,0.88);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--line);
        }
        .header i { color: var(--accent); cursor: pointer; }
        .container { padding: 16px; }
        .card, .form {
            background: rgba(245,245,245,0.92);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 16px 28px rgba(22, 50, 74, 0.08);
        }
        .card {
            padding: 20px;
            margin-bottom: 16px;
            background: linear-gradient(135deg, rgba(37,184,90,0.16), rgba(255,255,255,0.92));
        }
        .chip {
            width: 46px;
            height: 34px;
            border-radius: 8px;
            background: rgba(22, 50, 74, 0.12);
            margin-bottom: 18px;
        }
        .number {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            margin-bottom: 14px;
        }
        .label {
            color: var(--text-gray);
            text-transform: uppercase;
            font-size: 0.68rem;
            margin-bottom: 4px;
        }
        .name {
            font-size: 1rem;
            font-weight: 800;
            color: var(--accent-strong);
        }
        .method {
            float: right;
            color: var(--text-gray);
            font-weight: 700;
            font-size: 0.8rem;
        }
        .form {
            padding: 18px;
        }
        .field { margin-bottom: 16px; }
        .field label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-gray);
            text-transform: uppercase;
            font-size: 0.72rem;
            font-weight: 700;
        }
        .input {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: rgba(255,255,255,0.95);
            padding: 0 14px;
        }
        .input i { color: var(--accent); }
        .input input, .input select {
            width: 100%;
            border: none;
            background: transparent;
            padding: 16px 0;
            font-size: 0.95rem;
            color: var(--text-main);
            outline: none;
            font-family: inherit;
        }
        .submit {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 16px;
            color: #fff;
            font-size: 0.95rem;
            font-weight: 900;
            font-family: inherit;
            background: linear-gradient(135deg, #25b85a 0%, #3cc96e 100%);
            box-shadow: 0 14px 26px rgba(37, 184, 90, 0.24);
        }
        .note {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            color: var(--text-gray);
            font-size: 0.8rem;
            line-height: 1.55;
        }
        .note i { color: var(--success); margin-top: 2px; }
    </style>
</head>
<body>
    <div class="shell">
        <div class="header">
            <i class="fa-solid fa-chevron-left" onclick="window.location.href='{{ route('profile') }}'"></i>
            <strong>Conta de saque</strong>
        </div>

        <div class="container">
            <div class="card">
                <div class="method">{{ user()->gateway_method ?? 'PIX' }}</div>
                <div class="chip"></div>
                <div class="number">
                    @if(user()->gateway_number)
                        **** **** {{ substr(user()->gateway_number, -4) }}
                    @else
                        0000 0000
                    @endif
                </div>
                <div class="label">Titular</div>
                <div class="name">{{ user()->name ?: 'Jogador CHUTBALL' }}</div>
            </div>

            <form action="{{ route('setup.gateway.submit') }}" method="post" class="form">
                @csrf
                <div class="field">
                    <label>Chave ou conta</label>
                    <div class="input">
                        <i class="fa-solid fa-key"></i>
                        <input type="text" name="gateway_number" placeholder="Informe sua chave PIX ou conta" value="{{ user()->gateway_number }}">
                    </div>
                </div>

                <div class="field">
                    <label>Nome do titular</label>
                    <div class="input">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="name" placeholder="Nome completo" value="{{ user()->name }}">
                    </div>
                </div>

                <div class="field">
                    <label>Metodo de retirada</label>
                    <div class="input">
                        <i class="fa-solid fa-building-columns"></i>
                        <select name="gateway_method">
                            <option value="" disabled {{ user()->gateway_method ? '' : 'selected' }}>Selecione</option>
                            @foreach(\App\Models\PaymentMethod::get() as $element)
                                <option value="{{ $element->channel }}" {{ user()->gateway_method == $element->channel ? 'selected' : '' }}>
                                    {{ $element->channel }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit">Salvar dados de saque</button>

                <div class="note">
                    <i class="fa-solid fa-shield-halved"></i>
                    <div>Confira os dados antes de salvar. O sistema usa essas informacoes para liberar seus saques.</div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
