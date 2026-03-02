<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Gestion des catégories</title>
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

        /* Header */
        .header {
            background: white;
            border-radius: 15px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(11,28,63,0.3);
            display: flex;
            align-items: center;
            justify-content: space-between;
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
        }

        .logo-text {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .colo-info {
            background: rgba(255,105,180,0.1);
            padding: 10px 20px;
            border-radius: 25px;
            color: #0B1C3F;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Navigation */
        .nav-links {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .nav-link {
            background: white;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            color: #0B1C3F;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .nav-link:hover {
            transform: translateY(-2px);
            border-color: #FF69B4;
            box-shadow: 0 5px 15px rgba(255,105,180,0.2);
        }

        .nav-link.active {
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
        }

        /* Cartes */
        .card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(11,28,63,0.2);
            border: 1px solid rgba(255,105,180,0.2);
            margin-bottom: 30px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid;
            border-image: linear-gradient(to right, #0B1C3F, #87CEEB, #FF69B4, #9B59B6) 1;
        }

        .card-header h2 {
            color: #0B1C3F;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Formulaire */
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

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #FF69B4;
            outline: none;
            box-shadow: 0 0 0 4px rgba(255,105,180,0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 15px;
            align-items: end;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .btn-primary {
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,105,180,0.4);
        }

        .btn-success {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(145deg, #FF69B4, #FF1493);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(145deg, #FFA500, #FF8C00);
            color: white;
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 12px;
        }

        /* Grille des catégories */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .category-card {
            background: linear-gradient(145deg, #F8F9FF, #FFFFFF);
            border-radius: 15px;
            padding: 20px;
            border: 2px solid;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(155,89,182,0.2);
        }

        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .category-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .category-name {
            font-size: 18px;
            font-weight: 700;
            color: #0B1C3F;
            margin-bottom: 10px;
        }

        .category-budget {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
        }

        .category-spent {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #E0E0E0;
            border-radius: 4px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            border-radius: 4px;
            transition: width 0.3s;
        }

        .category-stats {
            display: flex;
            justify-content: space-between;
            color: #666;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .category-actions {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        /* Tableau des dépenses par catégorie */
        .expenses-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .expenses-table th {
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            color: white;
            padding: 12px;
            font-size: 14px;
            text-align: left;
        }

        .expenses-table td {
            padding: 12px;
            border-bottom: 1px solid #E0E0E0;
        }

        .expenses-table tr:hover {
            background: #F0F8FF;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #28a74520;
            color: #28a745;
        }

        .badge-warning {
            background: #ffc10720;
            color: #ffc107;
        }

        .badge-danger {
            background: #dc354520;
            color: #dc3545;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .close {
            font-size: 30px;
            cursor: pointer;
            color: #666;
        }

        .close:hover {
            color: #FF69B4;
        }

        /* Statistiques */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            border: 2px solid;
            border-color: #87CEEB;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header avec info colocation -->
        <div class="header">
            <div class="logo">
                <div class="logo-icon">🏘️</div>
                <span class="logo-text">EasyColo</span>
            </div>
            <div class="colo-info">
                <span>🏠</span>
                <span>{{ $colocation->group_name }}</span>
            </div>
        </div>

        <!-- Navigation -->
        <div class="nav-links">
            <a href="{{ route('colocation.show', $colocation) }}" class="nav-link">
                <span>🏠</span> Vue d'ensemble
            </a>
        </div>

        <form action="{{ route('colocation.expence.update', [$colocation, $expence]) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Filtre par mois -->
            <div class="filter-section">
                <select name="category_id" id="monthFilter" class="filter-select">
                    <option value="">Tout les catégories</option>
                    @foreach ($colocation->categories as $categorie)
                        <option @if($expence->categorie_id == $categorie->id) selected @endif value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach

                </select>
            </div>

            <!-- Formulaire ajout dépense -->
            <div class="colo-form" style="grid-template-columns: 1fr 1fr auto;">
                <input value="{{ $expence->name }}" name="name" type="text" id="expenseDesc" class="form-control" placeholder="Nom">
                <input value="{{ $expence->montant }}" name="montant" type="number" id="expenseAmount" class="form-control"
                    placeholder="Montant">

                <button class="btn btn-success" onclick="addExpense()">➕ Editer</button>
            </div>
        </form>
    </div>
</body>
</html>
