<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Redeem Rewards | VOLTA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --volta-green: #82E02D;
            --deep-black: #0a0a0a;
            --card-bg: #141414;
            --text-gray: #b4b8d5;
            --border-color: #1f1f1f;
        }

        body {
            background-color: var(--deep-black) !important;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            margin: 0;
            padding-bottom: 80px;
        }

        /* Fixed Header matching Dashboard */
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

        /* Main Content Container */
        .content-wrap { padding: 20px; }

        /* Redemption Card Design */
        .redeem-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 25px 20px;
            border: 1px solid var(--border-color);
            text-align: center;
            margin-top: 10px;
        }

        .redeem-icon {
            font-size: 3rem;
            color: var(--volta-green);
            margin-bottom: 15px;
            filter: drop-shadow(0 0 10px rgba(130, 224, 45, 0.3));
        }

        .redeem-card h2 {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .redeem-card p {
            color: var(--text-gray);
            font-size: 0.85rem;
            margin-bottom: 25px;
        }

        /* Input Box Styling */
        .input-group {
            background: #000;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .input-group i { color: var(--volta-green); font-size: 1.1rem; }

        .input-group input {
            background: transparent;
            border: none;
            color: #fff;
            width: 100%;
            font-size: 0.9rem;
            font-weight: 600;
            outline: none;
        }

        .input-group input::placeholder { color: #555; }

        /* Action Button */
        .btn-redeem {
            width: 100%;
            background: var(--volta-green);
            color: #000;
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-redeem:active { transform: scale(0.98); opacity: 0.8; }

        /* Congratulations Popup (Same Theme) */
        .overlay { 
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0,0,0,0.85); z-index: 1000; display: none; 
            backdrop-filter: blur(5px);
        }
        .ex { 
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
            width: 85%; background: var(--card-bg); border-radius: 25px; z-index: 1001; 
            display: none; text-align: center; padding-bottom: 25px; 
            border: 1px solid var(--volta-green); overflow: hidden;
        }
        .ex img { width: 100%; border-bottom: 1px solid #222; }
        .ex h3.ccon { color: var(--volta-green); font-weight: 800; margin: 20px 0 5px; }
        .ex h3.ttik { font-size: 1.8rem; margin: 10px 0 20px; }
        .takeIt {
            display: inline-block; background: var(--volta-green); color: #000;
            padding: 12px 30px; border-radius: 10px; text-decoration: none;
            font-weight: 800;
        }

        /* Bottom Tab Bar (Same as Dashboard) */
        .bottom {
            position: fixed;
            bottom: 0; left: 0; width: 100%;
            background: #000;
            padding: 12px 0;
            display: flex;
            border-top: 1px solid #1a1a1a;
        }
        .bottom-item { flex: 1; text-align: center; color: #555; text-decoration: none; }
        .bottom-item.active { color: var(--volta-green); }
        .bottom-item i { font-size: 1.2rem; display: block; margin-bottom: 3px; }
        .bottom-item p { font-size: 0.65rem; font-weight: 700; margin: 0; }
    </style>
</head>

<body>

    <div class="page-title">
        <p>REWARDS</p>
        <div onclick="window.location.href='{{route('history')}}'">
            <i class="fa-solid fa-clock-rotate-left" style="color: var(--text-gray);"></i>
        </div>
    </div>

    <div class="content-wrap">
        <div class="redeem-card">
            <i class="fa-solid fa-gift redeem-icon"></i>
            <h2>Gift Redemption</h2>
            <p>Enter your secret gift code below to claim instant cash prizes to your wallet.</p>

            <div class="input-group">
                <i class="fa-solid fa-ticket"></i>
                <input type="text" name="client" placeholder="Enter Gift Code here..." id="giftCode">
            </div>

            <button onclick="toClient()" class="btn-redeem">
                <i class="fa-solid fa-bolt"></i> REDEEM NOW
            </button>
        </div>

        <div style="margin-top: 20px; padding: 15px; border-radius: 12px; background: rgba(130, 224, 45, 0.05); border: 1px dashed var(--volta-green);">
            <p style="font-size: 0.7rem; color: var(--volta-green); margin: 0; font-weight: 600; text-align: center; letter-spacing: 0.5px;">
                <i class="fa-solid fa-circle-info"></i> FOLLOW OUR TELEGRAM CHANNEL FOR DAILY CODES
            </p>
        </div>
    </div>

    <div class="bottom">
        <a href="{{route('dashboard')}}" class="bottom-item">
            <i class="fa-solid fa-house"></i>
            <p>Home</p>
        </a>
        <a href="ordered" class="bottom-item">
            <i class="fa-solid fa-chart-pie"></i>
            <p>Order</p>
        </a>
        <a href="{{route('user.team')}}" class="bottom-item">
            <i class="fa-solid fa-users"></i>
            <p>Team</p>
        </a>
        <a href="{{route('profile')}}" class="bottom-item">
            <i class="fa-solid fa-user"></i>
            <p>Mine</p>
        </a>
    </div>

    <?php $bonus = \App\Models\Bonus::where('status', 'active')->first(); ?>
    <div class="overlay" onclick="closePop()"></div>
    <div class="ex">
        <img src="{{asset('public/ex.png')}}" alt="Gift">
        <h3 class="ccon">CONGRATULATIONS!</h3>
        <h3 class="ttik">{{currency()}}{{($bonus ? $bonus->amount : 0)}}</h3>
        <a href="javascript:void(0)" class="takeIt" onclick="getClaiemCode()">HAPPY TO TAKE IT</a>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function closePop(){
            $('.overlay, .ex').fadeOut();
        }

        function toClient(){
            let cliem = $('input[name="client"]').val();
            if (cliem == ''){
                alert('Please enter a valid code');
                return;
            }

            $.ajax({
                type:'GET',
                url:'{{url("submit-bonus-check")}}/'+cliem,
                success:function(data){
                    if (data.status == true){
                        $('.overlay, .ex').fadeIn();
                    } else {
                        alert(data.message);
                        $('input[name="client"]').val('');
                    }
                }
            });
        }

        function getClaiemCode(){
            let cliem = $('input[name="client"]').val();
            $('.takeIt').text('Loading...');

            $.ajax({
                type:'GET',
                url:'{{url("submit-bonus-amount")}}/'+cliem,
                success:function(data){
                    alert(data.message);
                    $('.takeIt').text('HAPPY TO TAKE IT');
                    closePop();
                    $('input[name="client"]').val('');
                    window.location.reload();
                }
            });
        }
    </script>
</body>
</html>