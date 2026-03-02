<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Tableau de bord</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header avec logo */
        .header {
            background: white;
            border-radius: 15px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(11, 28, 63, 0.3);
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 4px solid #FF69B4;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            transform: rotate(5deg);
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.4);
        }

        .logo-text {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .logo-tagline {
            color: #FF69B4;
            margin-left: auto;
            font-style: italic;
            font-weight: 500;
            background: rgba(255, 105, 180, 0.1);
            padding: 8px 15px;
            border-radius: 25px;
        }

        /* Grille principale */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Cartes */
        .card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(11, 28, 63, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 105, 180, 0.2);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(155, 89, 182, 0.25);
            border-color: #FF69B4;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid;
            border-image: linear-gradient(to right, #0B1C3F, #87CEEB, #FF69B4, #9B59B6) 1;
        }

        .card-header h2 {
            color: #0B1C3F;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(145deg, #87CEEB, #FF69B4);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 5px 15px rgba(135, 206, 235, 0.4);
        }

        /* Section invitations */
        .invitation-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .invitation-item {
            background: linear-gradient(145deg, #F8F9FF, #FFFFFF);
            border-radius: 15px;
            padding: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-left: 6px solid;
            border-image: linear-gradient(to bottom, #87CEEB, #9B59B6) 1;
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.1);
        }

        .invitation-info h3 {
            color: #0B1C3F;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .invitation-info p {
            color: #666;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .invitation-actions {
            display: flex;
            gap: 10px;
        }

        .btn-accept {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(135, 206, 235, 0.3);
        }

        .btn-accept:hover {
            background: linear-gradient(145deg, #9B59B6, #87CEEB);
            transform: scale(1.05);
        }

        .btn-decline {
            background: linear-gradient(145deg, #FF69B4, #FF1493);
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
        }

        .btn-decline:hover {
            background: linear-gradient(145deg, #FF1493, #FF69B4);
            transform: scale(1.05);
        }

        /* Section colocations */
        .colocation-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .colocation-card {
            background: linear-gradient(145deg, #F0F8FF, #FFFFFF);
            border-radius: 15px;
            padding: 18px;
            border: 2px solid;
            border-color: #87CEEB;
            transition: all 0.3s;
        }

        .colocation-card:hover {
            border-color: #FF69B4;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2);
        }

        .colocation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .colocation-header h3 {
            color: #0B1C3F;
            font-size: 17px;
            font-weight: 700;
        }

        .colocation-status {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            padding: 5px 12px;
            border-radius: 25px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .colocation-details {
            color: #1A3B5C;
            font-size: 13px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .colocation-members {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 13px;
        }

        .colocation-members i {
            font-style: normal;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(255, 105, 180, 0.3);
        }

        /* Section paiements */
        .payment-card {
            grid-column: span 2;
        }

        .payment-summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }

        .payment-stat {
            text-align: center;
            padding: 20px;
            background: linear-gradient(145deg, #F0F8FF, #FFFFFF);
            border-radius: 15px;
            border: 2px solid;
            border-color: #87CEEB;
        }

        .payment-stat:hover {
            border-color: #FF69B4;
        }

        .payment-stat-value {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .payment-stat-label {
            color: #666;
            font-size: 15px;
            font-weight: 500;
        }

        .payment-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .payment-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background: linear-gradient(145deg, #F8F9FF, #FFFFFF);
            border-radius: 12px;
            border: 2px solid;
            transition: all 0.3s;
        }

        .payment-item.paid {
            border-color: #87CEEB;
            background: linear-gradient(145deg, #F0F8FF, #FFFFFF);
        }

        .payment-item.pending {
            border-color: #FF69B4;
            background: linear-gradient(145deg, #FFF0F5, #FFFFFF);
        }

        .payment-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.15);
        }

        .payment-info h4 {
            color: #0B1C3F;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .payment-info p {
            color: #666;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .payment-amount {
            font-weight: 800;
            font-size: 18px;
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .payment-status {
            padding: 6px 15px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-paid {
            background: linear-gradient(145deg, #87CEEB20, #9B59B620);
            color: #0B1C3F;
            border: 1px solid #87CEEB;
        }

        .status-pending {
            background: linear-gradient(145deg, #FF69B420, #FF149320);
            color: #FF1493;
            border: 1px solid #FF69B4;
        }

        .btn-pay {
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
        }

        .btn-pay:hover {
            background: linear-gradient(145deg, #9B59B6, #FF69B4);
            transform: scale(1.05);
        }

        /* Footer */
        .footer {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 40px;
            font-size: 14px;
            padding: 20px;
            background: rgba(11, 28, 63, 0.5);
            border-radius: 15px;
            backdrop-filter: blur(5px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .payment-summary {
                grid-template-columns: 1fr;
            }

            .colocation-grid {
                grid-template-columns: 1fr;
            }

            .invitation-item {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .logo-tagline {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header avec logo EasyColo -->
        <div class="header">
            <div class="logo">
                <div class="logo-icon">🏘️</div>
                <span class="logo-text">EasyColo</span>
            </div>
            <div class="logo-tagline">✨<a href="{{ route("colocation.index") }}">Colocation</a>✨</div>
             @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logo-tagline" type="submit">✨Logout✨</button>
            </form>
            @endauth
        </div>

        <!-- Grille du tableau de bord -->
        <div class="">


            <!-- Section Colocations -->
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">🏢</div>
                    <h2>Mes colocations</h2>
                </div>
                <div class="colocation-grid">
                    <div class="colocation-card">
                        <div class="colocation-header">
                            <h3>🏛️ Appartement Paris</h3>
                            <span class="colocation-status">Active</span>
                        </div>


                    </div>



                    </div>
                </div>
            </div>
        </div>

        <!-- Section Paiements (sur toute la largeur) -->


        <div class="footer">
            ✨ EasyColo - La colocation qui vous ressemble ✨
        </div>
    </div>


</body>

</html>
