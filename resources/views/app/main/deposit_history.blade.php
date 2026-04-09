<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Recharge History | VOLTA</title>

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

        /* VOLTA Header */
        .page-header {
            padding: 15px 20px;
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
        .page-header h1 { font-weight: 800; font-size: 1.1rem; letter-spacing: 1px; margin: 0; text-transform: uppercase; }
        .page-header h1::after { content: '.'; color: var(--volta-green); }

        .list-wrapper { padding: 15px; }

        /* Card Design */
        .recharge-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 12px;
            border: 1px solid var(--border-color);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .status-label {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Original Status Colors */
        .status-success { color: var(--volta-green); }
        .status-pending { color: var(--volta-amber); }
        .status-failed { color: var(--volta-red); }

        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .amount-text {
            font-size: 1.25rem;
            font-weight: 900;
            color: #fff;
            display: block;
        }

        .date-text {
            font-size: 0.7rem;
            color: var(--text-gray);
            font-weight: 500;
        }

        .icon-accent {
            width: 35px;
            height: 35px;
            background: rgba(130, 224, 45, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--volta-green);
            margin-right: 10px;
        }
        
        .flex-row { display: flex; align-items: center; }
    </style>
</head>

<body>

    <div class="page-header">
        <div onclick="window.location.href='{{route ('user.deposit')}}'">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <h1>Recharge</h1>
    </div>

    <div class="list-wrapper">
        @foreach(\App\Models\Deposit::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
            <div class="recharge-card">
                <div class="card-top">
                    <div class="flex-row">
                        <div class="icon-accent">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <span class="status-label">
                            @if($element->status == 'rejected')
                                <span class="status-failed">Failed</span>
                            @elseif($element->status == 'approved')
                                <span class="status-success">Success</span>
                            @elseif($element->status == 'pending')
                                <span class="status-pending">Processing</span>
                            @endif
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div>
                        <span style="font-size: 0.6rem; color: var(--text-gray); text-transform: uppercase;">Amount</span>
                        <strong class="amount-text">{{price($element->amount)}}</strong>
                    </div>
                    <div class="date-text">
                        {{$element->created_at}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>
@include('partials.preloader')
</html>