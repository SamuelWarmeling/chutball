<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Level {{$level}} Details | VOLTA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --volta-green: #82E02D;
            --deep-black: #0a0a0a;
            --card-bg: #141414;
            --text-gray: #b4b8d5;
            --border-color: #1f1f1f;
        }

        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        
        body {
            background-color: var(--deep-black) !important;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
            overflow-x: hidden;
        }

        /* Top Header */
        .header {
            height: 60px;
            background: #000;
            display: flex;
            align-items: center;
            padding: 0 15px;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--border-color);
        }
        .header .back-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
        }
        .header .title {
            flex: 1;
            text-align: center;
            font-weight: 800;
            font-size: 1rem;
            margin-right: 40px; /* To center title perfectly */
        }
        .header .title span { color: var(--volta-green); }

        /* List Container */
        .list-container {
            padding: 15px;
            min-height: calc(100vh - 60px);
        }

        /* Member Card */
        .member-card {
            background: var(--card-bg);
            border-radius: 15px;
            margin-bottom: 12px;
            padding: 15px;
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .member-info { flex: 1; }
        .member-info h4 {
            margin: 0 0 5px 0;
            font-size: 0.9rem;
            color: #fff;
            letter-spacing: 0.5px;
        }
        .member-info p {
            margin: 0;
            font-size: 0.7rem;
            color: var(--text-gray);
        }

        .member-status {
            text-align: right;
        }
        .member-status .balance {
            display: block;
            color: var(--volta-green);
            font-weight: 800;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }
        .member-status .tag {
            font-size: 0.6rem;
            background: rgba(130, 224, 45, 0.1);
            color: var(--volta-green);
            padding: 3px 8px;
            border-radius: 4px;
            border: 1px solid rgba(130, 224, 45, 0.2);
            text-transform: uppercase;
            font-weight: 700;
        }
        .member-status .tag.inactive {
            background: rgba(255, 255, 255, 0.05);
            color: #777;
            border-color: #333;
        }

        /* Empty State */
        .no-data {
            text-align: center;
            padding: 50px 20px;
            color: var(--text-gray);
        }
        .no-data i {
            font-size: 3rem;
            color: #1a1a1a;
            margin-bottom: 15px;
        }
        .no-data p { font-size: 0.8rem; }

        .end-text {
            text-align: center;
            font-size: 0.7rem;
            color: #333;
            padding: 20px 0;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

    <div class="header">
        <a href="{{route('user.team')}}" class="back-btn">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <div class="title">LEVEL <span>{{$level}}</span> MEMBERS</div>
    </div>

    <div class="list-container">
        @if(count($users) > 0)
            @foreach($users as $element)
                <div class="member-card">
                    <div class="member-info">
                        <h4>Contact: {{ substr($element->phone, 0, 4) }}****{{ substr($element->phone, -3) }}</h4>
                        <p><i class="fa-regular fa-calendar-check" style="margin-right: 5px;"></i> {{ $element->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                    
                    <div class="member-status">
                        <span class="balance">{{price($element->balance)}}</span>
                        @if($element->investor == 1)
                            <span class="tag">VIP Member</span>
                        @else
                            <span class="tag inactive">N/A</span>
                        @endif
                    </div>
                </div>
            @endforeach
            
            <div class="end-text">— END OF LIST —</div>
        @else
            <div class="no-data">
                <i class="fa-solid fa-users-slash"></i>
                <p>No team members found in this level yet.</p>
            </div>
        @endif
    </div>

</body>
</html>