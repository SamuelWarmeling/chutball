<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>My Team | VOLTA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --volta-green: #82E02D;
            --deep-black: #0a0a0a;
            --card-bg: #141414;
            --text-gray: #b4b8d5;
        }

        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        
        body {
            background-color: var(--deep-black) !important;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding-bottom: 90px;
            color: #fff;
            overflow-x: hidden;
        }

        /* Header */
        .page-title {
            height: 60px;
            padding: 0 20px;
            background: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #1a1a1a;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .page-title p { font-weight: 800; font-size: 1.1rem; margin: 0; }
        .page-title p::after { content: '.'; color: var(--volta-green); }

        /* Team Stats Card (Dashboard Look) */
        .team-stats-card {
            width: 92%;
            margin: 20px auto;
 background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat;            border-radius: 20px;
            padding: 25px 20px;
            border: 1px solid #222;
            text-align: center;
        }
        .stats-grid { display: flex; justify-content: space-around; align-items: center; }
        .stat-item h3 { font-size: 1.5rem; color: var(--volta-green); margin: 0; font-weight: 800; }
        .stat-item p { font-size: 0.7rem; color: var(--text-gray); margin-top: 5px; text-transform: uppercase; letter-spacing: 1px; }
        .stat-divider { width: 1px; height: 40px; background: #333; }

        /* Invitation Box */
        .invite-section {
            width: 92%;
            margin: 0 auto 20px;
            background: var(--card-bg);
            border-radius: 15px;
            padding: 15px;
            border: 1px solid #1f1f1f;
        }
        .invite-label { font-size: 0.75rem; color: var(--text-gray); margin-bottom: 10px; display: block; }
        .invite-link-box {
             background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat;
            border: 1px dashed #333;
            padding: 12px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .invite-link-box span { font-size: 0.7rem; color: #eee; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex: 1; padding-right: 10px; }
        .copy-icon { color: var(--volta-green); font-size: 1.1rem; }

        /* Level Cards */
        .level-card {
            width: 92%;
            margin: 0 auto 15px;
            background: var(--card-bg);
            border-radius: 15px;
            padding: 15px;
            border: 1px solid #1f1f1f;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .level-header { display: flex; justify-content: space-between; align-items: center; }
        .level-title { display: flex; align-items: center; gap: 10px; }
        .level-title img { width: 35px; height: 35px; }
        .level-title span { font-weight: 700; font-size: 0.9rem; }
        
        .level-stats { display: flex; gap: 20px;  background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url("green/profile-bg.jpg") center/cover no-repeat; padding: 12px; border-radius: 10px; }
        .l-stat { flex: 1; }
        .l-stat small { font-size: 0.6rem; color: var(--text-gray); display: block; }
        .l-stat b { font-size: 0.9rem; color: #fff; }

        .view-btn {
            background: rgba(130, 224, 45, 0.1);
            color: var(--volta-green);
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid rgba(130, 224, 45, 0.2);
        }

        /* Rules Section */
        .rules-box { width: 92%; margin: 20px auto; padding: 15px; border-top: 1px solid #1a1a1a; }
        .rules-box h4 { font-size: 0.9rem; color: var(--volta-green); margin-bottom: 10px; }
        .rules-box p { font-size: 0.75rem; color: var(--text-gray); line-height: 1.6; margin: 5px 0; }

        
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
        .bottom-item.active { color: var(--volta-green); }
        .bottom-item i { font-size: 1.2rem; display: block; margin-bottom: 3px; }
        .bottom-item p { font-size: 0.65rem; font-weight: 700; margin: 0; }
    </style>
</head>

<body>

    <div class="page-title">
        <p>My Team</p>
        <div onclick="window.location.href='{{route('user.service')}}'">
            <i class="fa-solid fa-headset" style="color: var(--volta-green);"></i>
        </div>
    </div>

    <div class="team-stats-card">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>{{$team_size}}</h3>
                <p>Total Size</p>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <h3>{{price($levelTotalCommission1 + $levelTotalCommission2 + $levelTotalCommission3)}}</h3>
                <p>Commission</p>
            </div>
        </div>
    </div>

    <div class="invite-section">
        <span class="invite-label">Invitation Link</span>
        <div class="invite-link-box" onclick="copyLink('{{url('account/create').'?inviteCode='.auth()->user()->ref_id}}')">
            <span>{{url('account/create').'?inviteCode='.auth()->user()->ref_id}}</span>
            <i class="fa-regular fa-copy copy-icon"></i>
        </div>
        <div class="invite-link-box" onclick="copyLink('{{auth()->user()->ref_id}}')">
            <span style="letter-spacing: 2px; font-weight: 800; font-size: 0.9rem;">CODE: {{auth()->user()->ref_id}}</span>
            <i class="fa-solid fa-share-nodes copy-icon"></i>
        </div>
    </div>

    <div class="level-card">
        <div class="level-header">
            <div class="level-title">
                <img src="{{asset ('luno/team/luno/dist/img/ic_level1.cde7cd4a.png')}}">
                <span>Level 1 Team</span>
            </div>
            <span style="color: var(--volta-green); font-size: 0.75rem; font-weight: 700;">Rebate: {{$rebate->interest_commission1}}%</span>
        </div>
        <div class="level-stats">
            <div class="l-stat">
                <small>Members</small>
                <b>{{$first_level_users->count()}}</b>
            </div>
            <div class="l-stat">
                <small>Cashback</small>
                <b>{{price($levelTotalCommission1)}}</b>
            </div>
        </div>
        <a href="{{route('team.level', 1)}}" class="view-btn">VIEW DETAILS</a>
    </div>

    <div class="level-card">
        <div class="level-header">
            <div class="level-title">
                <img src="{{asset ('luno/team/luno/dist/img/ic_level2.c312183b.png')}}">
                <span>Level 2 Team</span>
            </div>
            <span style="color: var(--volta-green); font-size: 0.75rem; font-weight: 700;">Rebate: {{$rebate->interest_commission2}}%</span>
        </div>
        <div class="level-stats">
            <div class="l-stat">
                <small>Members</small>
                <b>{{$second_level_users->count()}}</b>
            </div>
            <div class="l-stat">
                <small>Cashback</small>
                <b>{{price($levelTotalCommission2)}}</b>
            </div>
        </div>
        <a href="{{route('team.level', 2)}}" class="view-btn">VIEW DETAILS</a>
    </div>

    <div class="level-card">
        <div class="level-header">
            <div class="level-title">
                <img src="{{asset ('luno/team/luno/dist/img/ic_level3.de64c7b2.png')}}">
                <span>Level 3 Team</span>
            </div>
            <span style="color: var(--volta-green); font-size: 0.75rem; font-weight: 700;">Rebate: {{$rebate->interest_commission3}}%</span>
        </div>
        <div class="level-stats">
            <div class="l-stat">
                <small>Members</small>
                <b>{{$third_level_users->count()}}</b>
            </div>
            <div class="l-stat">
                <small>Cashback</small>
                <b>{{price($levelTotalCommission3)}}</b>
            </div>
        </div>
        <a href="{{route('team.level', 3)}}" class="view-btn">VIEW DETAILS</a>
    </div>

    <div class="rules-box">
        <h4>Team Rewards System</h4>
        <p>• Level 1: Get <b>{{$rebate->interest_commission1}}%</b> from direct referrals investment.</p>
        <p>• Level 2: Get <b>{{$rebate->interest_commission2}}%</b> from secondary referrals.</p>
        <p>• Level 3: Get <b>{{$rebate->interest_commission3}}%</b> from tertiary referrals.</p>
    </div>

      <div class="bottom">
                <div class="bottom-item " onclick="window.location.href='{{route('dashboard')}}'">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </div>
                <div class="bottom-item" onclick="window.location.href='ordered'">
                    <i class="fa-solid fa-chart-pie"></i>
                    <p>Order</p>
                </div>
                <div class="bottom-item active" onclick="window.location.href='{{route('user.team')}}'">
                    <i class="fa-solid fa-users"></i>
                    <p>Team</p>
                </div>
                <div class="bottom-item" onclick="window.location.href='{{route('profile')}}'">
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
            alert('Copied to clipboard!');
        }
    </script>

</body>
</html>