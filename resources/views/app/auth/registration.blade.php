<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>CHUTBALL | Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-main: #CFE8D5;
            --bg-grad-a: #e7f5ea;
            --bg-grad-b: #b9d9c3;
            --accent: #3A86FF;
            --success: #38B000;
            --danger: #E63946;
            --card: #F5F5F5;
            --line: #d7e2da;
            --text: #17324d;
            --muted: #6d7f77;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
            font-family: 'Montserrat', sans-serif;
            background: var(--bg-main);
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(58, 134, 255, 0.16), transparent 28%),
                radial-gradient(circle at bottom right, rgba(56, 176, 0, 0.12), transparent 24%),
                linear-gradient(145deg, var(--bg-grad-a) 0%, var(--bg-main) 46%, var(--bg-grad-b) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrapper {
            width: 85%;
            max-width: 380px;
            background: rgba(245, 245, 245, 0.74);
            border: 1px solid rgba(255,255,255,0.7);
            box-shadow: 0 18px 60px rgba(23, 50, 77, 0.12);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 28px 24px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-img {
            width: 100px;
            margin-bottom: 10px;
        }

        .p1 {
            color: var(--text);
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .p1 span {
            color: var(--accent);
        }

        /* Tabs */
        .tabs-wrap {
            display: flex;
            justify-content: flex-start;
            gap: 20px;
            margin-bottom: 25px;
        }

        .tabs-wrap p {
            color: var(--muted);
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            text-transform: uppercase;
        }

        .tabs-wrap p.ac {
            color: var(--text);
            border-bottom: 3px solid var(--accent);
            padding-bottom: 5px;
        }

        /* Solid Input Style (No Glass) */
        .input-group {
            margin-bottom: 12px;
        }

        .label-text {
            color: var(--accent);
            font-size: 0.7rem;
            font-weight: 700;
            margin-bottom: 6px;
            text-transform: uppercase;
            display: block;
            letter-spacing: 1px;
        }

        .input-box {
            background: rgba(255,255,255,0.9);
            border: 2px solid var(--line);
            border-radius: 14px;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            transition: 0.3s ease;
        }

        .input-box:focus-within {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(58, 134, 255, 0.12);
        }

        .phone-left p {
            color: var(--text);
            font-weight: 700;
            margin-right: 12px;
            padding-right: 12px;
            border-right: 2px solid var(--line);
        }

        .van-field__control {
            background: transparent;
            border: none;
            outline: none;
            color: var(--text);
            width: 100%;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .van-field__control::placeholder {
            color: var(--muted);
        }

        /* Buttons */
        .forgot {
            display: block;
            text-align: right;
            color: var(--muted);
            font-size: 0.8rem;
            margin-top: 15px;
            margin-bottom: 25px;
            text-decoration: none;
        }

        .forgot span {
            color: var(--accent);
            font-weight: 700;
        }

        .btnsign {
            background: linear-gradient(135deg, #3A86FF 0%, #62a2ff 100%);
            color: #fff;
            width: 100%;
            height: 55px;
            border: none;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 12px 24px rgba(58, 134, 255, 0.28);
            transition: 0.2s;
        }

        .btnsign:active {
            transform: translateY(3px);
            box-shadow: 0 4px 12px rgba(58, 134, 255, 0.2);
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <header>
        <img src="/green/logo.webp" alt="CHUTBALL" class="logo-img">
    </header>

    <div class="tabs-wrap">
        <p class="ac">Cadastro</p>
        <p onclick="window.location.href='{{route ('login')}}'">Login</p>
    </div>

    <form action="{{url('register')}}" method="post">
        @csrf
        
        <div class="input-group">
            <span class="label-text">Numero de telefone</span>
            <div class="input-box">
                <div class="phone-left"><p>+55</p></div>
                <input type="tel" name="phone" class="van-field__control" placeholder="Seu telefone" required>
            </div>
        </div>

        <div class="input-group">
            <span class="label-text">Criar senha</span>
            <div class="input-box">
                <input type="password" name="password" class="van-field__control" placeholder="Sua senha" required>
            </div>
        </div>
<div class="input-group">
    <span class="label-text">Codigo de verificacao</span>
    <div style="display: flex; gap: 10px; align-items: center;">
        <div class="input-box" style="flex: 1; margin-bottom: 0;">
            <input type="text" id="captchaInput" name="captcha" class="van-field__control" placeholder="Digite o codigo" required>
        </div>
        
        <div id="captchaBox" onclick="generateCaptcha()" 
             style="background: linear-gradient(135deg, #3A86FF 0%, #62a2ff 100%); color: #fff; height: 50px; min-width: 100px; border-radius: 14px; 
                    display: flex; align-items: center; justify-content: center; font-weight: 800; 
                    font-size: 1.2rem; letter-spacing: 3px; cursor: pointer; user-select: none; 
                    text-decoration: line-through; box-shadow: inset 0 0 5px rgba(0,0,0,0.2);">
            <script>document.write(Math.floor(1000 + Math.random() * 9000));</script>
        </div>
    </div>
</div>

<script>
    // Click karne par naya code generate karne ke liye
    function generateCaptcha() {
        const randomNo = Math.floor(1000 + Math.random() * 9000);
        document.getElementById("captchaBox").innerHTML = randomNo;
    }
</script>
        <div class="input-group">
            <span class="label-text">Codigo de convite</span>
            <div class="input-box">
                <input name="ref_by" value="{{isset($ref_by) && !empty($ref_by) ? $ref_by : rand(1111,9999)}}" type="text" class="van-field__control" placeholder="Codigo opcional">
            </div>
        </div>

        <a href="{{route('login')}}" class="forgot">Ja tem conta? <span>Entrar</span></a>
        
        <button type="submit" class="btnsign">Criar conta</button>
    </form>
</div>

</body>
@include('partials.preloader')
</html>
