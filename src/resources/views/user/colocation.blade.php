<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Gestion des colocations</title>
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
            background: rgb(255, 255, 255);
            border-radius: 15px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(11,28,63,0.3);
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
            box-shadow: 0 5px 15px rgba(255,105,180,0.4);
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
            background: rgba(255,105,180,0.1);
            padding: 8px 15px;
            border-radius: 25px;
        }

        /* Section principale */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Formulaire d'ajout */
        .form-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(11,28,63,0.2);
            border: 1px solid rgba(255,105,180,0.2);
        }

        .form-card:hover {
            border-color: #FF69B4;
            box-shadow: 0 20px 40px rgba(155,89,182,0.25);
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
            box-shadow: 0 5px 15px rgba(135,206,235,0.4);
        }

        /* Style du formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #0B1C3F;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .form-group label i {
            color: #FF69B4;
            font-style: normal;
            font-size: 18px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
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

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: linear-gradient(145deg, #9B59B6, #FF69B4);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255,105,180,0.4);
        }

        /* Tableau des colocations */
        .table-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(11,28,63,0.2);
            border: 1px solid rgba(255,105,180,0.2);
            overflow-x: auto;
        }

        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 15px;
            overflow: hidden;
        }

        thead {
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
        }

        th {
            color: white;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #E0E0E0;
            color: #333;
        }

        tbody tr {
            transition: all 0.3s;
        }

        tbody tr:hover {
            background: linear-gradient(145deg, #F0F8FF, #FFFFFF);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(155,89,182,0.1);
        }

        .status-badge {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-edit:hover {
            background: linear-gradient(145deg, #9B59B6, #87CEEB);
            transform: scale(1.05);
        }

        .btn-delete {
            background: linear-gradient(145deg, #FF69B4, #FF1493);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-delete:hover {
            background: linear-gradient(145deg, #FF1493, #FF69B4);
            transform: scale(1.05);
        }

        /* Indicateur de recherche */
        .search-section {
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .search-box {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #E0E0E0;
            border-radius: 12px;
            font-size: 14px;
            background: #F8F9FF;
        }

        .search-box:focus {
            border-color: #FF69B4;
            outline: none;
        }

        .stats {
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        /* Footer */
        .footer {
            text-align: center;
            color: rgba(255,255,255,0.8);
            margin-top: 30px;
            padding: 20px;
            background: rgba(11,28,63,0.5);
            border-radius: 15px;
            backdrop-filter: blur(5px);
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
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
        <div class="header" style="display:flex; align-items: center; justify-content: space-between;">
            <div class="logo">
                <div class="logo-icon">🏘️</div>
                <span class="logo-text">EasyColo</span>
            </div>
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logo-tagline" type="submit">✨Logout✨</button>
            </form>
            @endauth
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
            <!-- Formulaire d'ajout de colocation -->
            <div class="form-card">
                <div class="card-header">
                    <div class="card-icon">➕</div>
                    <h2>Nouvelle colocation</h2>
                </div>

                <form id="coloForm" method="POST" action ="{{ route("colocation.add") }}">
                    @csrf
                    <div class="form-group">
                        <label>
                            <i>🏠</i>
                            Nom de la colocation
                        </label>
                        <input type="text" name="group_name" class="form-control" id="nomColocation" placeholder="Ex: Appartement Lumineux Paris" required>
                    </div>

                    <button type="submit" class="btn-submit">
                        <span>✨</span> Ajouter la colocation <span>✨</span>
                    </button>
                </form>
            </div>

            <!-- Tableau des colocations -->
            <div class="table-card">
                <div class="card-header">
                    <div class="card-icon">📋</div>
                    <h2>Liste des colocations</h2>
                </div>

                <div class="search-section">
                    <input type="text" class="search-box" id="searchInput" placeholder="🔍 Rechercher une colocation...">
                    <span class="stats" id="totalColocations">Total: {{ $colocations->count() }} colocations</span>
                </div>

                <div class="table-container">
                    <table id="colocationsTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($colocations as $colocation)
                            <tr>
                                <td>{{ $colocation->group_name }}</td>
                                <td><span class="status-badge">{{ $colocation->status }}</span></td>
                                <td style="display: flex">
                                    @if ($colocation->status == "active")
                                        <a href="{{ route('colocation.show', $colocation) }}" class="btn-delete"  >voir</a>
                                        @if($colocation->owner->user_id == auth()->user()->id)
                                            <form action="{{ route('colocation.anuller', $colocation) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn-delete" >anuller</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Section des statistiques supplémentaires -->
        <div class="footer">
            <div style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px;">
                <div>✨ Total des loyers: <span id="totalLoyers">2,300€</span></div>
                <div>✨ Surface moyenne: <span id="surfaceMoyenne">82.5m²</span></div>
                <div>✨ Nombre total de colocataires: <span id="totalColocataires">14</span></div>
            </div>
        </div>
    </div>

</body>
</html>
