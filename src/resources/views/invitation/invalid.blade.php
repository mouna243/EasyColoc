<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Lien invalide</title>
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
            max-width: 400px;
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
            margin-bottom: 20px;
            line-height: 1;
        }

        h1 {
            color: #0B1C3F;
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 30px;
            padding: 0 10px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
            text-decoration: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 18px;
            transition: opacity 0.3s;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .info {
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }

        .info a {
            color: #FF69B4;
            text-decoration: none;
        }

        .info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="icon">🔗</div>
            <h1>Lien invalide</h1>
            <p>Le lien d'invitation que vous avez utilisé n'est plus valide ou a expiré.</p>
            <a href="{{ route('colocation.index') }}" class="btn">Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>
