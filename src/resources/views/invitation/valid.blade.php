<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Invitation valide</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            max-width: 450px;
            width: 100%;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .icon {
            font-size: 70px;
            margin-bottom: 15px;
            line-height: 1;
        }

        h1 {
            color: #0B1C3F;
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .colo-name {
            background: #F0F8FF;
            color: #0B1C3F;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            font-weight: 600;
            font-size: 18px;
            border: 2px solid #87CEEB;
        }

        .inviter {
            color: #666;
            margin-bottom: 25px;
            font-size: 16px;
        }

        .inviter strong {
            color: #FF69B4;
        }

        .buttons {
            display: flex;
            gap: 15px;
            margin: 30px 0 15px;
        }

        .btn {
            flex: 1;
            text-decoration: none;
            padding: 15px 0;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            transition: opacity 0.3s;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }

        .btn-accept {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
        }

        .btn-decline {
            background: linear-gradient(145deg, #FF69B4, #FF1493);
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .info {
            font-size: 13px;
            color: #999;
            margin-top: 15px;
        }

        .info a {
            color: #FF69B4;
            text-decoration: none;
        }

        .info a:hover {
            text-decoration: underline;
        }

        .details {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 15px 0;
            font-size: 14px;
            color: #666;
        }

        .details span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="icon">📨</div>
            <h1>Invitation valide</h1>

            <div class="inviter">
                <strong>Thomas Martin</strong> vous invite à rejoindre
            </div>

            <div class="colo-name">
                🏠 {{ $colocation->group_name }}
            </div>

            <div class="buttons">
                <a href="{{ route('colocation.invitation.accepter', $colocation) }}" class="btn btn-accept">Accepter</a>
                <a href="{{ route('colocation.invitation.refuser', $colocation) }}" class="btn btn-decline">Refuser</a>
            </div>

            <div class="info">
                Cette invitation expire dans 7 jours
            </div>
        </div>
    </div>
</body>
</html>
