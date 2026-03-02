<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: linear-gradient(135deg, #0B1C3F, #1A3B5C);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .invite {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            text-align: center;
        }
        a {
            background: #FF69B4;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invite">
        <p>🏠 Vous êtes invité à rejoindre EasyColo !</p>
        <a href="http://localhost:8080/invitation/{{ $token }}">Voir l'invitation</a>
    </div>
</body>
</html>
