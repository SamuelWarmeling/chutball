<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Withdrawal Account | VOLTA</title>
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
            padding-bottom: 30px;
        }

        /* Nav Header */
        .nav-header {
            display: flex; align-items: center; padding: 20px;
            background: rgba(0,0,0,0.6); backdrop-filter: blur(15px);
            position: sticky; top: 0; z-index: 100;
            border-bottom: 1px solid var(--border-color);
        }
        .nav-header i { font-size: 1.2rem; margin-right: 15px; color: var(--neon-green); cursor: pointer; }
        .nav-header span { font-weight: 700; letter-spacing: 0.5px; }

        .container { padding: 20px; }

        /* Virtual Card Design */
        .virtual-card {
            background: linear-gradient(135deg, #1e1e1e 0%, #111 100%);
            border: 1px solid #333; border-radius: 20px;
            padding: 25px; margin-bottom: 30px;
            position: relative; overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .virtual-card::before {
            content: ''; position: absolute; top: -50%; right: -20%;
            width: 200px; height: 200px;
            background: var(--neon-green); opacity: 0.05;
            filter: blur(50px); border-radius: 50%;
        }
        .card-chip { width: 40px; height: 30px; background: #333; border-radius: 5px; margin-bottom: 20px; }
        .card-number { font-size: 1.4rem; letter-spacing: 3px; font-weight: 600; margin-bottom: 15px; color: #eee; }
        .card-holder { font-size: 0.7rem; color: var(--text-gray); text-transform: uppercase; letter-spacing: 1px; }
        .card-name { font-size: 1rem; font-weight: 700; margin-top: 5px; color: var(--neon-green); }
        .bank-tag { position: absolute; top: 25px; right: 25px; font-weight: 800; font-style: italic; opacity: 0.5; }

        /* Form Styling */
        .form-section { background: var(--card-bg); border-radius: 20px; border: 1px solid var(--border-color); padding: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.75rem; color: var(--text-gray); margin-bottom: 8px; text-transform: uppercase; font-weight: 700; }
        
        .input-box {
            background: #0d0d0d; border: 1px solid #222; border-radius: 12px;
            display: flex; align-items: center; padding: 0 15px; transition: 0.3s;
        }
        .input-box:focus-within { border-color: var(--neon-green); }
        .input-box i { color: #444; font-size: 0.9rem; }
        .input-box input, .input-box select {
            background: transparent; border: none; color: #fff; padding: 15px 10px;
            width: 100%; outline: none; font-size: 0.95rem;
        }
        
        /* Select Styling */
        select option { background: #141414; color: #fff; }

        .btn-submit {
            width: 100%; background: var(--neon-green); color: #000;
            border: none; padding: 18px; border-radius: 15px;
            font-weight: 900; font-size: 1rem; margin-top: 10px;
            box-shadow: 0 8px 20px rgba(130, 224, 45, 0.2);
            cursor: pointer; text-transform: uppercase; letter-spacing: 1px;
        }

        .info-note {
            display: flex; gap: 10px; padding: 15px;
            background: rgba(130, 224, 45, 0.05);
            border-radius: 12px; margin-top: 20px;
        }
        .info-note i { color: var(--neon-green); margin-top: 3px; }
        .info-note p { font-size: 0.75rem; color: #aaa; margin: 0; line-height: 1.4; }
    </style>
</head>
<body>

    <div class="nav-header">
        <i class="fa-solid fa-arrow-left" onclick="window.location.href='{{route('dashboard')}}'"></i>
        <span>Withdrawal Account</span>
    </div>

    <div class="container">
        <div class="virtual-card">
            <div class="bank-tag">{{user()->gateway_method ?? 'VOLTA PAY'}}</div>
            <div class="card-chip"></div>
            <div class="card-number">
                @if(user()->gateway_number)
                    **** **** **** {{ substr(user()->gateway_number, -4) }}
                @else
                    0000 0000 0000 0000
                @endif
            </div>
            <div class="card-holder">Account Holder</div>
            <div class="card-name">{{user()->name ?? 'YOUR NAME'}}</div>
        </div>

        <form action="{{route('setup.gateway.submit')}}" method="post" id="bankForm">
            @csrf
            <div class="form-section">
                <div class="form-group">
                    <label>Bank Account Number</label>
                    <div class="input-box">
                        <i class="fa-solid fa-hashtag"></i>
                        <input type="text" name="gateway_number" placeholder="Enter account number" value="{{user()->gateway_number}}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Account Holder Name</label>
                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="name" placeholder="Enter full name" value="{{user()->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Select Bank / Method</label>
                    <div class="input-box">
                        <i class="fa-solid fa-building-columns"></i>
                        <select name="gateway_method">
                            <option value="" disabled selected>Select Bank</option>
                            @foreach(\App\Models\PaymentMethod::get() as $element)
                                <option value="{{$element->channel}}" {{user()->gateway_method == $element->channel ? 'selected' : ''}}>
                                    {{$element->channel}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Update Information</button>
            </div>
        </form>

        <div class="info-note">
            <i class="fa-solid fa-shield-halved"></i>
            <p>Your withdrawal information is encrypted. Please ensure the account details are correct to avoid payment delays.</p>
        </div>
    </div>

</body>
</html>