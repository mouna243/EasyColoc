<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Membres de la colocation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0B1C3F 0%, #1A3B5C 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 600px;
            width: 100%;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #87CEEB;
        }

        .header h1 {
            color: #0B1C3F;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .colo-info {
            background: #F0F8FF;
            padding: 8px 15px;
            border-radius: 20px;
            color: #0B1C3F;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid #87CEEB;
        }

        .stats {
            background: #FFF0F5;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-around;
            text-align: center;
            border: 1px solid #FF69B4;
        }

        .stat-item {
            flex: 1;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #0B1C3F;
        }

        .stat-label {
            font-size: 13px;
            color: #666;
        }

        .member-list {
            list-style: none;
        }

        .member-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #E0E0E0;
            transition: background 0.3s;
        }

        .member-item:hover {
            background: #F8F9FF;
        }

        .member-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .member-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }

        .member-details h3 {
            color: #0B1C3F;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .member-details p {
            color: #666;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .member-role {
            background: #F0F8FF;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 600;
            color: #0B1C3F;
            border: 1px solid #87CEEB;
        }

        .btn-remove {
            background: linear-gradient(145deg, #FF69B4, #FF1493);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: opacity 0.3s;
        }

        .btn-remove:hover {
            opacity: 0.9;
        }

        .btn-add {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state p {
            margin-top: 10px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #999;
        }

        .footer a {
            color: #FF69B4;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>
                    <span>👥</span> Membres
                </h1>
                <a href="{{ route('colocation.show', $colocation) }}" class="colo-info">
                    🏠 {{ $colocation->group_name }}
                </a>
            </div>

            <!-- Liste des membres -->
            <ul class="member-list">
                @forelse($members as $member)
                    <li class="member-item">
                        <div class="member-info">
                            <div class="member-avatar">JD</div>
                            <div class="member-details">
                                <h3>{{ $member->user->name }}</h3>
                                <p>
                                    <span>📧 {{ $member->user->email  }}</span>
                                    <span class="member-role">{{ $member->role }}</span>
                                </p>
                            </div>
                        </div>
                        @if ($colocation->owner->user_id == auth()->user()->id && $member->role != 'owner')
                            <a href="{{ route('colocation.members.retirer', [$colocation, $member]) }}" class="btn-remove">Retirer</a>
                        @endif
                    </li>
                @empty
                    <li class="member-item">
                        <p>No members</p>
                    </li>
                @endforelse
            </ul>

            @if ($colocation->owner->user_id == auth()->user()->id)
                <!-- Bouton pour ajouter (optionnel) -->
                <a href="{{ route('colocation.invitation.invite', $colocation) }}" class="btn-add">
                    <span>+</span> Inviter un nouveau membre
                </a>
            @endif

            <div class="footer">
                <a href="#">Gérer les invitations</a> ·
                <a href="#">Paramètres</a> ·
                <a href="#">Retour</a>
            </div>
        </div>
    </div>
</body>
</html>
