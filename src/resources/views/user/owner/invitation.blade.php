<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Invitation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0B1C3F 0%, #1A3B5C 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .invitation-card {
            background: white;
            border-radius: 25px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 50px rgba(11,28,63,0.3);
            border: 1px solid rgba(255,105,180,0.2);
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 35px;
            font-weight: bold;
            margin: 0 auto 15px;
            transform: rotate(5deg);
        }

        h1 {
            color: #0B1C3F;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #666;
            font-size: 15px;
        }

        .colo-info {
            background: linear-gradient(145deg, #F0F8FF, #FFFFFF);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 25px;
            border: 2px solid #87CEEB;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .colo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
        }

        .colo-details h3 {
            color: #0B1C3F;
            font-size: 16px;
            margin-bottom: 3px;
        }

        .colo-details p {
            color: #666;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #0B1C3F;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group label i {
            color: #FF69B4;
            margin-right: 5px;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #E0E0E0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s;
            background: #F8F9FF;
        }

        .form-control:focus {
            border-color: #FF69B4;
            outline: none;
            box-shadow: 0 0 0 4px rgba(255,105,180,0.1);
        }

        .form-control:hover {
            border-color: #87CEEB;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .message-box {
            background: #F8F9FF;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px dashed #87CEEB;
        }

        .message-box textarea {
            width: 100%;
            border: none;
            background: transparent;
            resize: vertical;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }

        .message-box textarea:focus {
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255,105,180,0.4);
        }

        .btn-secondary {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(135,206,235,0.4);
        }

        .footer-links {
            margin-top: 25px;
            text-align: center;
            font-size: 13px;
            color: #999;
        }

        .footer-links a {
            color: #FF69B4;
            text-decoration: none;
            margin: 0 5px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .success-message {
            display: none;
            background: #28a74520;
            border: 2px solid #28a745;
            color: #28a745;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        .error-message {
            display: none;
            background: #dc354520;
            border: 2px solid #dc3545;
            color: #dc3545;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .invitation-card {
                padding: 25px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="invitation-card">
        <div class="header">
            <div class="logo-icon">✉️</div>
            <h1>Inviter un colocataire</h1>
            <div class="subtitle">Envoyez une invitation à rejoindre votre colocation</div>
        </div>

        <!-- Informations de la colocation -->
        <div class="colo-info">
            <div class="colo-icon">🏘️</div>
            <div class="colo-details">
                <h3>{{ $colocation->group_name }}</h3>
            </div>
        </div>

        <!-- Formulaire d'invitation -->
        <form action="{{ route('colocation.invitation.envoyer', $colocation) }}" method="POST" id="invitationForm">
            @csrf

            <div class="form-group">
                <label>
                    <i>📧</i> Adresse email
                </label>
                <input type="email" name="email" class="form-control" id="email" placeholder="marie.dupont@email.com" required>
            </div>

            <!-- Boutons d'action -->
            <button type="submit" class="btn btn-primary">
                <span>📨</span> Envoyer l'invitation
            </button>

            <a href="{{ route('colocation.show', $colocation) }}" type="button" class="btn btn-secondary">
                <span>🏘️</span> Back to colocation
            </a>
        </form>

        <!-- Pied de page -->
        <div class="footer-links">
            <span>🔒 Les informations sont confidentielles</span><br>
            <a href="#">Politique de confidentialité</a> ·
            <a href="#">Conditions d'utilisation</a>
        </div>
    </div>
</body>
</html>
