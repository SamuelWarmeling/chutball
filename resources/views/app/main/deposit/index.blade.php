<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Recharge | VOLTA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --neon-green: #82E02D;
            --dark-bg: #0a0a0a;
            --card-bg: #141414;
            --border-glow: rgba(130, 224, 45, 0.2);
            --text-gray: #888;
        }

        body {
            background: radial-gradient(circle at top right, #1a2a0a, #0a0a0a 40%);
            font-family: 'Inter', sans-serif;
            margin: 0; padding: 0; color: #fff;
            padding-bottom: 50px;
        }

        /* Top Navigation */
        .nav-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            position: sticky; top: 0; z-index: 100;
        }
        .nav-header i { font-size: 1.2rem; color: #fff; }
        .nav-header span { font-weight: bold; letter-spacing: 1px; }
        .record-btn { color: var(--neon-green); font-size: 0.8rem; font-weight: bold; cursor: pointer; }

        /* Balance Info Cards */
        .balance-container {
            display: flex; gap: 12px; padding: 20px;
        }
        .mini-card {
            flex: 1; background: var(--card-bg); padding: 15px;
            border-radius: 18px; border: 1px solid #222;
        }
        .mini-card span { display: block; font-size: 0.65rem; color: var(--text-gray); margin-bottom: 5px; }
        .mini-card b { font-size: 1rem; color: var(--neon-green); }

        /* Main Section */
        .section-box { margin: 0 20px; }
        .label { font-size: 0.85rem; font-weight: 600; margin-bottom: 15px; display: block; color: #ccc; }

        /* Quick Amount Grid */
        .amount-grid {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 20px;
        }
        .amount-item {
            background: #1a1a1a; border: 1px solid #333; padding: 12px;
            border-radius: 12px; text-align: center; font-size: 0.9rem;
            font-weight: bold; cursor: pointer; transition: 0.3s;
        }
        .amount-item.active {
            background: rgba(130, 224, 45, 0.1);
            border-color: var(--neon-green);
            color: var(--neon-green);
        }

        /* Input Field */
        .input-wrapper {
            background: var(--card-bg); border-radius: 15px;
            border: 1px solid #333; padding: 15px; display: flex;
            align-items: center; margin-bottom: 20px;
        }
        .input-wrapper span { color: var(--neon-green); font-weight: bold; margin-right: 10px; }
        .input-wrapper input {
            background: transparent; border: none; color: #fff; width: 100%;
            font-size: 1.1rem; outline: none; font-weight: bold;
        }

        /* Custom Select Styling */
        .select-wrapper {
            background: var(--card-bg); border-radius: 15px;
            border: 1px solid #333; padding: 15px; margin-bottom: 25px;
        }
        .select-wrapper select {
            background: transparent; border: none; color: #fff; width: 100%;
            outline: none; font-size: 0.95rem;
        }

        /* Recharge Button */
        .recharge-btn {
            width: 100%; background: var(--neon-green); color: #000;
            border: none; padding: 18px; border-radius: 15px;
            font-weight: 900; font-size: 1rem; text-transform: uppercase;
            box-shadow: 0 5px 20px rgba(130, 224, 45, 0.3);
            cursor: pointer;
        }

        /* Reminder Box */
        .reminder-box {
            margin-top: 30px; background: rgba(255,255,255,0.03);
            border-radius: 20px; padding: 20px; border: 1px dashed #444;
        }
        .reminder-box h4 { margin: 0 0 12px; color: var(--neon-green); font-size: 0.9rem; }
        .reminder-box p { margin: 0; font-size: 0.75rem; color: #777; line-height: 1.6; }

        /* Loading Spinner */
        #loader {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.8); z-index: 1000;
            justify-content: center; align-items: center; flex-direction: column;
        }
        .spinner {
            width: 40px; height: 40px; border: 4px solid #222;
            border-top: 4px solid var(--neon-green); border-radius: 50%;
            animation: spin 1s linear infinite; margin-bottom: 10px;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <div class="nav-header">
        <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{route('dashboard')}}'"></i>
        <span>RECHARGE</span>
        <div class="record-btn" onclick="window.location.href='{{route('recharge.history')}}'">Record</div>
    </div>

    <div class="balance-container">
        <div class="mini-card">
            <span>Balance</span>
            <b>{{price(user()->balance)}}</b>
        </div>
        <div class="mini-card">
            <span>Cumulative</span>
            <b>{{price(\App\Models\Deposit::where('user_id', user()->id)->where('status', 'approved')->sum('amount'))}}</b>
        </div>
    </div>

    <section class="section-box">
        <span class="label">Select Amount</span>
        <div class="amount-grid">
            <div class="amount-item" onclick="setAmount(this, 600)">600</div>
            <div class="amount-item" onclick="setAmount(this, 1000)">1000</div>
            <div class="amount-item" onclick="setAmount(this, 3000)">3000</div>
            <div class="amount-item" onclick="setAmount(this, 5000)">5000</div>
            <div class="amount-item" onclick="setAmount(this, 10000)">10000</div>
            <div class="amount-item" onclick="setAmount(this, 20000)">20000</div>
        </div>

        <span class="label">Input Amount Manually</span>
        <div class="input-wrapper">
            <span>{{currency()}}</span>
            <input type="number" name="amount" id="amount-input" placeholder="Enter Amount">
        </div>

        <span class="label">Payment Method</span>
        <div class="select-wrapper">
            <select name="channel" id="channel">
                @foreach(\App\Models\PaymentMethod::get() as $element)
                    <option value="{{$element->id}}">{{$element->channel}}</option>
                @endforeach
            </select>
        </div>

        <button class="recharge-btn" onclick="deposit()">Proceed Recharge</button>

        <div class="reminder-box">
            <h4><i class="fa-solid fa-circle-info"></i> Recharge Reminder</h4>
            <p>
                - Minimum Top-Up Amount: 600 ETB.<br>
                - Payment Methods: Use only official channels. Do not transfer funds to individuals.<br>
                - Confirmation: If recharge isn't reflected within 10 minutes, contact live support.
            </p>
        </div>
    </section>

    <div id="loader">
        <div class="spinner"></div>
        <p style="font-size: 0.8rem; letter-spacing: 1px;">PROCESSING...</p>
    </div>

    @include('partials.preloader')

    <script>
        function setAmount(el, val) {
            // Remove active class from all
            document.querySelectorAll('.amount-item').forEach(item => item.classList.remove('active'));
            // Add to current
            el.classList.add('active');
            // Set input value
            document.getElementById('amount-input').value = val;
        }

        function deposit() {
            var amount = document.getElementById('amount-input').value;
            var channel = document.getElementById('channel').value;

            if (amount >= 600) {
                document.getElementById('loader').style.display = 'flex';
                window.location.href = '{{url('siglepay/request')}}' + "/" + amount + "/" + channel;
            } else {
                alert('Minimum recharge is 600 ETB');
            }
        }
    </script>
</body>
</html>