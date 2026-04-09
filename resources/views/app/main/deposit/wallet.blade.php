<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Checkout | VOLTA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --neon-green: #82E02D;
            --dark-bg: #0a0a0a;
            --card-bg: #141414;
            --text-gray: #888;
            --border-color: #222;
        }

        body {
            background: radial-gradient(circle at top right, #1a2a0a, #0a0a0a 40%);
            font-family: 'Inter', sans-serif;
            margin: 0; padding: 0; color: #fff;
            padding-bottom: 50px;
        }

        /* Top Nav */
        .nav-header {
            display: flex; align-items: center; padding: 20px;
            background: rgba(0,0,0,0.6); backdrop-filter: blur(15px);
            position: sticky; top: 0; z-index: 100;
            border-bottom: 1px solid var(--border-color);
        }
        .nav-header i { font-size: 1.2rem; margin-right: 15px; color: var(--neon-green); cursor: pointer; }
        .nav-header span { font-weight: 700; letter-spacing: 0.5px; }

        .container { padding: 20px; }

        /* Status Label */
        .step-tag {
            font-size: 0.65rem; color: var(--neon-green);
            background: rgba(130, 224, 45, 0.1);
            padding: 4px 10px; border-radius: 50px;
            text-transform: uppercase; font-weight: 800;
            letter-spacing: 1px; margin-bottom: 10px; display: inline-block;
        }

        /* Amount Section */
        .amount-card {
            text-align: center; margin: 10px 0 25px;
            padding: 25px; background: var(--card-bg);
            border-radius: 20px; border: 1px solid var(--border-color);
            position: relative; overflow: hidden;
        }
        .amount-card h1 { margin: 5px 0; color: var(--neon-green); font-size: 2.2rem; font-weight: 900; }
        .amount-card p { margin: 0; font-size: 0.75rem; color: var(--text-gray); text-transform: uppercase; letter-spacing: 1px; }
        
        /* Receipt Style Card */
        .receipt-card {
            background: var(--card-bg); border-radius: 20px;
            border: 1px solid var(--border-color); padding: 5px 20px;
            margin-bottom: 25px;
        }

        .receipt-row {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 0; border-bottom: 1px solid #1f1f1f;
        }
        .receipt-row:last-child { border: none; }

        .receipt-row .label { color: var(--text-gray); font-size: 0.85rem; }
        .receipt-row .value { 
            color: #fff; font-weight: 600; font-size: 0.95rem; 
            display: flex; align-items: center; gap: 10px;
        }
        
        .btn-copy {
            background: #1f1f1f; color: var(--neon-green);
            border: 1px solid #333; padding: 6px 10px;
            border-radius: 8px; font-size: 0.8rem; cursor: pointer;
            transition: 0.2s;
        }
        .btn-copy:active { background: var(--neon-green); color: #000; }

        /* Form Area */
        .input-box {
            background: #111; border: 1px solid #333;
            border-radius: 15px; padding: 15px; margin-top: 10px;
            display: flex; align-items: center;
        }
        .input-box input {
            background: transparent; border: none; color: #fff;
            width: 100%; outline: none; font-size: 1rem; padding-left: 10px;
        }
        .input-box i { color: var(--neon-green); width: 20px; text-align: center; }

        .submit-btn {
            width: 100%; background: var(--neon-green); color: #000;
            border: none; padding: 18px; border-radius: 15px;
            font-weight: 900; font-size: 1rem; margin-top: 30px;
            box-shadow: 0 10px 20px rgba(130, 224, 45, 0.2);
            cursor: pointer; text-transform: uppercase;
        }

        /* Tips Section */
        .tips-box {
            margin-top: 35px; background: rgba(255,255,255,0.02);
            border-radius: 15px; padding: 20px; border-left: 3px solid var(--neon-green);
        }
        .tips-box h4 { margin: 0 0 10px; font-size: 0.9rem; display: flex; align-items: center; gap: 8px; }
        .tips-box p { font-size: 0.75rem; color: #777; line-height: 1.6; margin: 8px 0; }

        /* Loader */
        .load {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.9); display: none; z-index: 1000;
            justify-content: center; align-items: center; flex-direction: column;
        }
        .spinner {
            width: 40px; height: 40px; border: 3px solid #222;
            border-top: 3px solid var(--neon-green); border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <div class="nav-header">
        <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{route('user.deposit')}}'"></i>
        <span>Checkout Counter</span>
    </div>

    <div class="container">
        <?php $ref = strtoupper(\Str::random(3).rand(0,9990).\Str::random(3)) ;?>
        
        <form action="{{route('payment_confirmation')}}" method="post" id="payForm">
            @csrf
            <input type="hidden" name="amount" value="{{$amount}}">
            <input type="hidden" name="ref" value="{{$ref}}">
            <input type="hidden" name="channel_id" value="{{$channel->id}}">

            <div class="step-tag">Step 1: Order Summary</div>
            
            <div class="amount-card">
                <p>Transfer Exactly</p>
                <h1>{{price($amount)}}</h1>
                <div style="font-size: 0.6rem; color: #555; margin-top: 10px;">REF ID: {{$ref}}</div>
            </div>

            <div class="receipt-card">
                <div class="receipt-row">
                    <span class="label">Bank</span>
                    <span class="value">{{$channel->channel}}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Account Name</span>
                    <span class="value">
                        {{$channel->receiver}} 
                        <button type="button" class="btn-copy" onclick="copyLink('{{$channel->receiver}}')"><i class="fa-regular fa-copy"></i></button>
                    </span>
                </div>
                <div class="receipt-row">
                    <span class="label">Account Number</span>
                    <span class="value" style="color: var(--neon-green);">
                        {{$channel->address}}
                        <button type="button" class="btn-copy" onclick="copyLink('{{$channel->address}}')"><i class="fa-regular fa-copy"></i></button>
                    </span>
                </div>
            </div>

            <div class="step-tag">Step 2: Payment Verification</div>
            <p style="font-size: 0.8rem; color: var(--text-gray); margin-bottom: 5px;">Enter your 12-digit Transaction ID</p>
            <div class="input-box">
                <i class="fa-solid fa-receipt"></i>
                <input type="text" name="transaction_id" id="transaction_id" placeholder="FT25XXXXXXXX" required>
            </div>

            <button type="button" onclick="confirmPaid()" class="submit-btn">Submit Order</button>
        </form>

        <div class="tips-box">
            <h4><i class="fa-solid fa-circle-info" style="color: var(--neon-green);"></i> Important Guide</h4>
            <p>• Transfer money using your mobile banking app first.</p>
            <p>• Ensure the <b>amount matches exactly</b> to avoid automatic rejection.</p>
            <p>• For every new recharge, please generate a new order. Do not reuse old accounts.</p>
        </div>
    </div>

    <div class="load" id="loadingOverlay">
        <div class="spinner"></div>
        <p style="margin-top: 15px; font-size: 0.7rem; letter-spacing: 2px; color: var(--neon-green);">PROCESSING PAYMENT...</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script>
        function copyLink(text) {
            const tempInput = document.createElement("input");
            tempInput.value = text.replace(/\s+/g, '');
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            
            // You can replace this with your custom toast message
            alert('Copied: ' + tempInput.value);
        }

        function confirmPaid() {
            const txn = document.getElementById('transaction_id').value;

            if (txn.trim() === '') {
                alert('Please enter Transaction ID');
                return;
            }

            document.getElementById('loadingOverlay').style.display = 'flex';
            document.getElementById('payForm').submit();
        }
    </script>
</body>
</html>