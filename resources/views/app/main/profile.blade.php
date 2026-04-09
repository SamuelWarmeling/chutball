<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>My Account | VOLTA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --neon-green: #82E02D;
            --dark-surface: #0f1115;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --border-glow: rgba(130, 224, 45, 0.2);
        }

        body {
            background: radial-gradient(circle at top right, #1a2a0a, #0a0a0a 40%);
            font-family: 'Inter', sans-serif;
            margin: 0; padding: 0;
            color: #fff;
            min-height: 100vh;
        }


       .stats-bar {
    display: flex;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat;
    margin: 10px 20px;
    border-radius: 20px;
    border: 1px solid var(--border-glow);
    backdrop-filter: blur(10px);
    padding: 20px 10px;
}

        .stat-item {
            flex: 1;
            text-align: center;
            border-right: 1px solid rgba(255,255,255,0.05);
        }
        .stat-item:last-child { border-right: none; }
        .stat-item span { display: block; font-size: 0.65rem; color: #fff; text-transform: uppercase; margin-bottom: 5px; }
        .stat-item b { font-size: 0.95rem; color: var(--neon-green); }

        /* Grid Menu Icons */
        .action-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 25px 20px;
        }
        .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            transition: 0.3s;
        }
        .icon-box {
            width: 50px;
            height: 50px;
 background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat;            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            border: 1px solid #222;
            color: #ccc;
        }
        .action-item:active .icon-box {
            border-color: var(--neon-green);
            color: var(--neon-green);
            transform: scale(0.9);
        }
        .action-item p { margin: 0; font-size: 0.7rem; color: #aaa; }

        /* Referral Glass Card */
        .referral-glass {
            margin: 10px 20px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(130,224,45,0.1) 0%, rgba(0,0,0,0.5) 100%);
            border-radius: 24px;
            border: 1px solid var(--border-glow);
            position: relative;
            overflow: hidden;
        }
        .referral-glass::after {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 100px; height: 100px;
            background: var(--neon-green);
            filter: blur(50px);
            opacity: 0.2;
        }
        .ref-header { font-size: 0.9rem; font-weight: bold; margin-bottom: 12px; }
        .copy-link-area {
            background: rgba(0,0,0,0.3);
            border-radius: 12px;
            display: flex;
            align-items: center;
            padding: 5px 5px 5px 12px;
            border: 1px solid #333;
        }
        .copy-link-area span { font-size: 0.75rem; color: #777; flex: 1; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; }
        .copy-btn {
            background: var(--neon-green);
            color: #000;
            border: none;
            padding: 8px 18px;
            border-radius: 10px;
            font-weight: 900;
            font-size: 0.7rem;
        }

        /* Logout Section */
        .logout-section {
            padding: 30px 20px;
        }
        .btn-logout {
            width: 100%;
 background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat;            border: 1px solid #333;
            color: #fff;
            padding: 15px;
            border-radius: 15px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
/* Bottom Tab Bar */
        .bottom {
            position: fixed;
            bottom: 0; left: 0; width: 100%;
            background: #000;
            padding: 12px 0;
            display: flex;
            border-top: 1px solid #1a1a1a;
        }
        .bottom-item { flex: 1; text-align: center; color: #555; }
        .bottom-item.active { color: #82E02D; }
        .bottom-item i { font-size: 1.2rem; display: block; margin-bottom: 3px; }
        .bottom-item p { font-size: 0.65rem; font-weight: 700; margin: 0; }
    </style>
</head>
<body>

   <style>
    /* Updated Hero Section for Left-Aligned Profile */
    .hero-section {
        padding: 30px 20px;
        display: flex;
        align-items: center; /* Vertical center */
        gap: 15px; /* Space between avatar and text */
        background: linear-gradient(to right, rgba(130, 224, 45, 0.05), transparent);
        border-radius: 0 0 30px 30px;
    }

    .profile-avatar-wrap {
        position: relative;
        width: 75px;
        height: 75px;
        flex-shrink: 0; /* Avatar size fix */
    }

    .profile-avatar-wrap img {
        width: 100%;
        height: 100%;
        border-radius: 20px;
        border: 2px solid var(--neon-green);
 background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat;        object-fit: cover;
    }

    .status-dot {
        position: absolute;
        bottom: -2px;
        right: -2px;
        width: 14px;
        height: 14px;
        background: var(--neon-green);
        border-radius: 50%;
        border: 3px solid #0a0a0a;
        box-shadow: 0 0 10px var(--neon-green);
    }

    .user-info-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Silver Member Text (Top) */
    .user-info-text .tier-label {
        color: var(--neon-green);
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Phone Number (Bottom) */
    .user-info-text h2 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.5px;
    }
</style>

<div class="hero-section">
    <div class="profile-avatar-wrap">
        <img src="/green/man-with-hat-3d-icon-png-download-7292046.webp" alt="User Profile">
        <div class="status-dot"></div>
    </div>

    <div class="user-info-text">
        <div class="tier-label">
            <i class="fa-solid fa-crown" style="font-size: 0.7rem;"></i> 
            Silver Tier Member
        </div>
        <h2>+251 {{user()->phone}}</h2>
    </div>
</div>

    <div class="stats-bar">
        <div class="stat-item">
            <span>DEPOSIT</span>
            <b>{{price(\App\Models\Deposit::where('user_id', user()->id)->where('status', 'approved')->sum('amount'))}}</b>
        </div>
        <div class="stat-item">
            <span>WITHDRAWN</span>
            <b>{{price(\App\Models\Withdrawal::where('user_id', user()->id)->where('status', 'approved')->sum('amount'))}}</b>
        </div>
    </div>

    <div class="action-grid">
        <a href="{{route('user.deposit')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-bolt"></i></div>
            <p>Recharge</p>
        </a>
        <a href="{{route('user.withdraw')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
            <p>Withdraw</p>
        </a>
        <a href="{{route('history')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-receipt"></i></div>
            <p>Bills</p>
        </a>
        <a href="{{route('user.bank.create')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-landmark"></i></div>
            <p>Bank</p>
        </a>
        <a href="{{route('user.change.tpassword')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-lock"></i></div>
            <p>PIN</p>
        </a>
        <a href="{{route('user.change.password')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-user-gear"></i></div>
            <p>Security</p>
        </a>
        <a href="#" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-mobile-screen"></i></div>
            <p>APP</p>
        </a>
        <a href="{{route('user.team')}}" class="action-item">
            <div class="icon-box"><i class="fa-solid fa-users-rays"></i></div>
            <p>Team</p>
        </a>
    </div>


    <div class="logout-section">
        <button class="btn-logout" onclick="window.location.href='{{route('logout')}}'">
            <i class="fa-solid fa-power-off"></i> DISCONNECT ACCOUNT
        </button>
    </div>
    <br>
    <br>
    <br>
  <div class="bottom">
                <div class="bottom-item " onclick="window.location.href='{{route('dashboard')}}'">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </div>
                <div class="bottom-item" onclick="window.location.href='ordered'">
                    <i class="fa-solid fa-chart-pie"></i>
                    <p>Order</p>
                </div>
                <div class="bottom-item" onclick="window.location.href='{{route('user.team')}}'">
                    <i class="fa-solid fa-users"></i>
                    <p>Team</p>
                </div>
                <div class="bottom-item active" onclick="window.location.href='{{route('profile')}}'">
                    <i class="fa-solid fa-user"></i>
                    <p>Mine</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyLink(text) {
            const input = document.createElement("input");
            document.body.appendChild(input);
            input.value = text;
            input.select();
            document.execCommand("copy");
            document.body.removeChild(input);
            alert('Success: Link copied to clipboard!');
        }
    </script>

</body>
</html>