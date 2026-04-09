<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Withdrawal History | VOLTA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --volta-green: #82E02D;
            --volta-red: #ff4d4d;
            --volta-amber: #ffcc00;
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
            padding-bottom: 30px;
        }

        /* Dashboard Header */
        .page-header {
            padding: 20px;
            background: #000;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            gap: 15px;
        }
        .page-header i { font-size: 1.2rem; color: var(--text-gray); cursor: pointer; }
        .page-header h1 { 
            font-weight: 800; 
            font-size: 1.1rem; 
            letter-spacing: 1px; 
            margin: 0; 
            text-transform: uppercase; 
        }
        .page-header h1::after { content: '.'; color: var(--volta-green); }

        .list-container { padding: 15px; }

        /* Dashboard Card Style */
        .record-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 12px;
            border: 1px solid var(--border-color);
            transition: transform 0.2s;
        }

        .record-card:active { transform: scale(0.98); }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .info-group { display: flex; align-items: center; gap: 12px; }

        .icon-circle {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-gray);
        }

        .label-small {
            font-size: 0.65rem;
            color: var(--text-gray);
            text-transform: uppercase;
            font-weight: 700;
            display: block;
            letter-spacing: 0.5px;
        }

        .amount-display {
            font-size: 1.2rem;
            font-weight: 900;
            color: #fff;
        }

        /* Status Indicators */
        .status-badge {
            font-size: 0.65rem;
            font-weight: 800;
            padding: 4px 10px;
            border-radius: 6px;
            text-transform: uppercase;
        }

        .st-success { color: var(--volta-green); background: rgba(130, 224, 45, 0.1); }
        .st-pending { color: var(--volta-amber); background: rgba(255, 204, 0, 0.1); }
        .st-failed { color: var(--volta-red); background: rgba(255, 77, 77, 0.1); }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .date-val {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        .withdrawal-tag {
            font-size: 0.6rem;
            color: var(--volta-green);
            background: rgba(130, 224, 45, 0.05);
            padding: 2px 8px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="page-header">
        <div onclick="window.location.href='{{route ('user.withdraw')}}'">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <h1>Withdrawals</h1>
    </div>

    <div class="list-container">
        @foreach(\App\Models\Withdrawal::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
            <div class="record-card">
                <div class="card-header">
                    <div class="info-group">
                        <div class="icon-circle">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div>
                            <span class="label-small">Payout Amount</span>
                            <div class="amount-display">{{price($element->amount)}}</div>
                        </div>
                    </div>

                    @if($element->status == 'rejected')
                        <span class="status-badge st-failed">Failed</span>
                    @elseif($element->status == 'approved')
                        <span class="status-badge st-success">Success</span>
                    @elseif($element->status == 'pending')
                        <span class="status-badge st-pending">Processing</span>
                    @endif
                </div>

                <div class="card-footer">
                    <span class="date-val">
                        <i class="fa-regular fa-clock" style="margin-right: 5px; opacity: 0.5;"></i>
                        {{$element->created_at}}
                    </span>
                    <span class="withdrawal-tag">PAYOUT</span>
                </div>
            </div>
        @endforeach
    </div>

</body>
@include('partials.preloader')
</html>