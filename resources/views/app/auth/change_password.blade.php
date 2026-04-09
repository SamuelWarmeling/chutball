<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Security | VOLTA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --volta-green: #82E02D;
            --deep-black: #0a0a0a;
            --card-bg: #141414;
            --text-gray: #b4b8d5;
        }

        body {
            background-color: var(--deep-black) !important;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            margin: 0;
            padding-bottom: 30px;
        }

        /* Dashboard-like Header */
        .page-title {
            padding: 15px 20px;
            background: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #1a1a1a;
        }
        .page-title p { font-weight: 800; font-size: 1.2rem; letter-spacing: 1px; margin: 0; }
        .page-title p::after { content: '.'; color: var(--volta-green); }

        /* Security Card (Dashboard Product Card style) */
        .security-card {
            background: var(--card-bg);
            border-radius: 18px;
            margin: 20px 15px;
            padding: 20px;
            border: 1px solid #222;
        }

        .input-group { margin-bottom: 20px; }
        
        .h-label { 
            color: var(--volta-green); 
            font-size: 0.75rem; 
            font-weight: 700; 
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
        }

        .input-box {
            background: #000;
            border: 1px solid #333;
            border-radius: 10px;
            display: flex;
            align-items: center;
            padding: 5px 15px;
        }

        .input-box input {
            background: transparent;
            border: none;
            color: #fff;
            padding: 12px 0;
            width: 100%;
            outline: none;
            font-size: 0.9rem;
        }

        /* Action Button (Buy Now style) */
        .btn-update {
            width: 100%;
            background: var(--volta-green);
            color: #000;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
            text-transform: uppercase;
            cursor: pointer;
        }

        .back-icon {
            color: #555;
            font-size: 1.2rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="page-title">
            <i class="fa-solid fa-arrow-left back-icon" onclick="window.history.back()"></i>
            <p>SECURITY</p>
            <i class="fa-solid fa-shield-halved" style="color: var(--volta-green);"></i>
        </div>

        <form action="{{route('user.change.password.confirmation')}}" method="post">
            @csrf
            <div class="security-card">
                
                <div class="input-group">
                    <span class="h-label">Current Password</span>
                    <div class="input-box">
                        <input type="password" name="old_password" placeholder="Enter current password" required>
                        <i class="fa-solid fa-lock" style="color: #444;"></i>
                    </div>
                </div>

                <div class="input-group">
                    <span class="h-label">New Password</span>
                    <div class="input-box">
                        <input type="password" name="new_password" placeholder="Enter new password" required>
                        <i class="fa-solid fa-key" style="color: #444;"></i>
                    </div>
                </div>

                <div class="input-group">
                    <span class="h-label">Confirm Password</span>
                    <div class="input-box">
                        <input type="password" name="confirm_password" placeholder="Confirm new password" required>
                        <i class="fa-solid fa-check-double" style="color: #444;"></i>
                    </div>
                </div>

                <button type="submit" class="btn-update">
                    <i class="fa-solid fa-circle-check"></i>
                    Update Security
                </button>
            </div>
        </form>
    </div>
</body>
</html>