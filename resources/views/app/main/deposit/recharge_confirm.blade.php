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
        }

        body {
            background: radial-gradient(circle at top right, #1a2a0a, #0a0a0a 40%);
            font-family: 'Inter', sans-serif;
            margin: 0; padding: 0; color: #fff;
            padding-bottom: 50px;
        }

        /* Nav Bar */
        .nav-header {
            display: flex; align-items: center; padding: 20px;
            background: rgba(0,0,0,0.5); backdrop-filter: blur(10px);
            position: sticky; top: 0; z-index: 100;
        }
        .nav-header i { font-size: 1.2rem; margin-right: 15px; cursor: pointer; }
        .nav-header span { font-weight: bold; letter-spacing: 1px; text-transform: uppercase; }

        .container { padding: 20px; }

        /* Step Labels */
        .step-label {
            font-size: 0.75rem; color: var(--neon-green);
            text-transform: uppercase; font-weight: 800;
            letter-spacing: 1px; margin-bottom: 15px; display: block;
        }

        /* Order Info Card (Receipt Style) */
        .payment-card {
            background: var(--card-bg); border-radius: 25px;
            border: 1px solid #222; padding: 25px; margin-bottom: 25px;
            position: relative; overflow: hidden;
        }
        
        .payment-card::before {
            content: ''; position: absolute; top: 0; left: 0;
            width: 4px; height: 100%; background: var(--neon-green);
        }

        .info-row {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 0; border-bottom: 1px solid #1f1f1f;
        }
        .info-row:last-child { border: none; }

        .info-row .label { color: var(--text-gray); font-size: 0.85rem; }
        .info-row .value { 
            color: #fff; font-weight: 700; font-size: 0.95rem; 
            display: flex; align-items: center; gap: 8px;
        }
        
        .copy-icon {
            color: var(--neon-green); font-size: 0.9rem;
            background: rgba(130, 224, 45, 0.1); padding: 5px 8px;
            border-radius: 6px; cursor: pointer;
        }

        /* Amount Highlight */
        .amount-highlight {
            text-align: center; margin: 10px 0 20px;
            padding: 15px; background: rgba(130, 224, 45, 0.05);
            border-radius: 15px; border: 1px dashed var(--neon-green);
        }
        .amount-highlight h1 { margin: 0; color: var(--neon-green); font-size: 1.8rem; }
        .amount-highlight p { margin: 5px 0 0; font-size: 0.7rem; color: var(--text-gray); text-transform: uppercase; }

        /* Txn ID Input Area */
        .input-group { margin-top: 30px; }
        .txn-input-wrapper {
            background: #1a1a1a; border: 1px solid #333;
            border-radius: 15px; padding: 15px; margin-top: 10px;
        }
        .txn-input-wrapper input {
            background: transparent; border: none; color: #fff;
            width: 100%; outline: none; font-size: 1rem;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%; background: var(--neon-green); color: #000;
            border: none; padding: 18px; border-radius: 15px;
            font-weight: 900; font-size: 1rem; margin-top: 25px;
            box-shadow: 0 10px 25px rgba(130, 224, 45, 0.2);
            cursor: pointer; transition: 0.3s;
        }
        .submit-btn:active { transform: scale(0.98); }

        /* Guide Box */
        .guide-box {
            margin-top: 30px; background: rgba(255,255,255,0.03);
            border-radius: 20px; padding: 20px; border: 1px solid #222;
        }
        .guide-box h4 { margin: 0 0 10px; font-size: 0.9rem; color: #fff; }
        .guide-box p { font-size: 0.75rem; color: #666; line-height: 1.6; margin: 5px 0; }

        /* Custom Loader */
        #loader {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.85); z-index: 1000;
            justify-content: center; align-items: center; flex-direction: column;
        }
        .spinner {
            width: 40px; height: 40px; border: 3px solid #222;
            border-top: 3px solid var(--neon-green); border-radius: 50%;
            animation: spin 1s linear infinite; margin-bottom: 15px;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <div class="nav-header">
        <i class="fa-solid fa-chevron-left" onclick="window.location.href='{{route('user.deposit')}}'"></i>
        <span>Checkout Counter</span>
    </div>

    <div class="container">
        <?php $ref = strtoupper(\Str::random(3).rand(0,9990).\Str::random(3)) ;?>
        
        <form action="{{route('payment_confirmation')}}" method="post" id="paymentForm">
            @csrf
            <input type="hidden" name="amount" value="{{$amount}}">
            <input type="hidden" name="ref" value="{{$ref}}">
            <input type="hidden" name="channel_id" value="{{$channel->id}}">

            <span class="step-label">Step 1: Transfer Money</span>
            
            <div class="amount-highlight">
                <p>Transfer Exact Amount</p>
                <h1>{{price($amount)}}</h1>
            </div>

            <div class="payment-card">
                <div class="info-row">
                    <span class="label">Bank Name</span>
                    <span class="value">{{$channel->channel}}</span>
                </div>
                <div class="info-row">
                    <span class="label">Recipient Name</span>
                    <span class="value">
                        {{$channel->receiver}} 
                        <i class="fa-regular fa-copy copy-icon" onclick="copyLink('{{$channel->receiver}}')"></i>
                    </span>
                </div>
                <div class="info-row">
                    <span class="label">Account Number</span>
                    <span class="value" style="color: var(--neon-green);">
                        {{$channel->address}}
                        <i class="fa-regular fa-copy copy-icon" onclick="copyLink('{{$channel->address}}')"></i>
                    </span>
                </div>
            </div>

            <span class="step-label">Step 2: Submit Proof</span>
            <div class="input-group">
                <p style="font-size: 0.8rem; color: #aaa; margin: 0;">Enter Transaction ID (Txn ID)</p>
                <div class="txn-input-wrapper">
                    <input type="text" name="transaction_id" id="transaction_id" placeholder="Example: FT25XXXXXXXX" required>
                </div>
            </div>

            <button type="button" onclick="confirmPaid()" class="submit-btn">SUBMIT PAYMENT INFO</button>
        </form>

        <div class="guide-box">
            <h4><i class="fa-solid fa-shield-halved" style="color: var(--neon-green); margin-right: 5px;"></i> Payment Guide</h4>
            <p>1. Transfer the exact amount shown above to avoid delays.</p>
            <p>2. Always use a new bank account from this page for every order.</p>
            <p>3. Do not close this page until you have submitted the Transaction ID.</p>
        </div>
    </div>

    <div id="loader">
        <div class="spinner"></div>
        <p style="font-size: 0.7rem; letter-spacing: 2px; color: var(--neon-green);">VERIFYING TRANSACTION...</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script>
        function copyLink(text) {
            const el = document.createElement('textarea');
            el.value = text.replace(/\s+/g, '');
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            
            // Simple alert replace with your message function if exists
            alert('Copied to clipboard!');
        }

        function confirmPaid() {
            var txnId = document.getElementById('transaction_id').value;

            if (txnId.trim() === '') {
                alert('Please enter your Transaction ID');
                return;
            }

            document.getElementById('loader').style.display = 'flex';
            document.getElementById('paymentForm').submit();
        }
    </script>
</body>
</html>