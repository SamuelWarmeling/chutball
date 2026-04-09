<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Comunidade | CHUTBALL</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bg-main: #CFE8D5;
            --bg-grad-a: #eef8f0;
            --bg-grad-b: #bdd9c4;
            --accent: #3A86FF;
            --success: #38B000;
            --danger: #E63946;
            --card-bg: #F5F5F5;
            --text-main: #16324a;
            --text-gray: #627479;
            --line: rgba(22, 50, 74, 0.08);
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(58, 134, 255, 0.16), transparent 26%),
                radial-gradient(circle at bottom right, rgba(56, 176, 0, 0.10), transparent 24%),
                linear-gradient(145deg, var(--bg-grad-a) 0%, var(--bg-main) 46%, var(--bg-grad-b) 100%);
            font-family: 'Montserrat', sans-serif;
            color: var(--text-main);
            margin: 0;
            padding-bottom: 30px;
        }

        /* Header matching Dashboard */
        .page-title {
            padding: 15px 20px;
            background: rgba(245, 245, 245, 0.82);
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--line);
            gap: 15px;
            backdrop-filter: blur(12px);
        }
        .page-title i { font-size: 1.2rem; color: var(--accent); }
        .page-title p { font-weight: 800; font-size: 1.1rem; letter-spacing: 1px; margin: 0; }
        .page-title p::after { content: '.'; color: var(--accent); }

        /* Banner Section */
        .service-banner {
            margin: 15px;
            padding: 25px 20px;
            background: linear-gradient(135deg, rgba(245,245,245,0.9) 0%, rgba(231,245,234,0.92) 100%);
            border-radius: 20px;
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 18px 35px rgba(22, 50, 74, 0.08);
        }
        .service-banner img { width: 70px; height: 70px; }
        .banner-text span { display: block; font-size: 0.85rem; color: var(--text-main); font-weight: 600; line-height: 1.4; }
        .banner-text p { margin: 8px 0 0; font-size: 0.75rem; color: var(--success); font-weight: 800; text-transform: uppercase; }

        /* List Section */
        .section-box { padding: 0 15px; }
        .list-title { font-size: 0.9rem; font-weight: 800; color: var(--text-gray); margin: 20px 0 10px 5px; text-transform: uppercase; }

        .service-item {
            background: rgba(245,245,245,0.92);
            border-radius: 15px;
            padding: 15px;
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            box-shadow: 0 14px 28px rgba(22, 50, 74, 0.06);
        }

        .item-left { display: flex; align-items: center; gap: 15px; }
        .item-left .icon-box {
            width: 45px;
            height: 45px;
            background: rgba(58, 134, 255, 0.12);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            font-size: 1.3rem;
        }

        .item-info p { margin: 0; font-size: 0.95rem; font-weight: 700; color: var(--text-main); }
        .item-info span { font-size: 0.75rem; color: var(--text-gray); }

        .btn-contact {
            background: linear-gradient(135deg, #3A86FF 0%, #62a2ff 100%);
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.75rem;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(58, 134, 255, 0.2);
        }

        .arrow-icon { color: var(--accent); font-size: 1rem; }

        /* Status Badge */
        .status-dot {
            width: 8px;
            height: 8px;
            background: var(--success);
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            box-shadow: 0 0 8px rgba(56, 176, 0, 0.35);
        }
    </style>
</head>

<body>

    <div class="page-title">
        <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{route('dashboard')}}'"></i>
        <p>COMUNIDADE CHUTBALL</p>
    </div>

    <div class="service-banner">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Support">
        <div class="banner-text">
            <span>Entre na comunidade para receber palpites, novidades e avisos especiais.</span>
            <p><span class="status-dot"></span> Telegram ativo diariamente</p>
        </div>
    </div>

    <section class="section-box">
        <p class="list-title">Contato Direto</p>
        
        <div class="service-item">
            <div class="item-left">
                <div class="icon-box"><i class="fa-brands fa-telegram"></i></div>
                <div class="item-info">
                    <p>Telegram Oficial</p>
                    <span>Atendimento e suporte</span>
                </div>
            </div>
            <a href="{{ telegram_link() }}" class="btn-contact" target="_blank" rel="noopener">ABRIR</a>
        </div>

        <p class="list-title">Comunidade e Atualizacoes</p>

        <div class="service-item" onclick="window.location.href='{{ telegram_link() }}'">
            <div class="item-left">
                <div class="icon-box"><i class="fa-solid fa-bullhorn"></i></div>
                <div class="item-info">
                    <p>Telegram Channel</p>
                    <span>Bilhete do Mestre e novidades</span>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right arrow-icon"></i>
        </div>

        <div class="service-item" onclick="window.location.href='{{ telegram_link() }}'">
            <div class="item-left">
                <div class="icon-box"><i class="fa-solid fa-users"></i></div>
                <div class="item-info">
                    <p>Grupo Telegram</p>
                    <span>Troca de palpites em tempo real</span>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right arrow-icon"></i>
        </div>

        <div class="service-item" onclick="window.location.href='{{ telegram_link() }}'">
            <div class="item-left">
                <div class="icon-box"><i class="fa-brands fa-whatsapp"></i></div>
                <div class="item-info">
                    <p>Acesso rapido</p>
                    <span>Use o mesmo link oficial do Telegram</span>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right arrow-icon"></i>
        </div>
    </section>

</body>
</html>
