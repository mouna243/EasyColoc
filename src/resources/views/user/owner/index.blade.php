<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Gestion complète</title>
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
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: white;
            border-radius: 15px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(11, 28, 63, 0.3);
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

        .header-actions {
            display: flex;
            gap: 15px;
        }

        /* Navigation buttons */
        .nav-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .nav-btn {
            background: white;
            border: none;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 600;
            color: #0B1C3F;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .nav-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.3);
            border-color: #FF69B4;
        }

        .nav-btn i {
            font-size: 24px;
        }

        .btn-colo {
            background: linear-gradient(145deg, #87CEEB20, #FFFFFF);
        }

        .btn-category {
            background: linear-gradient(145deg, #9B59B620, #FFFFFF);
        }

        .btn-member {
            background: linear-gradient(145deg, #FF69B420, #FFFFFF);
        }

        .btn-invite {
            background: linear-gradient(145deg, #FF149320, #FFFFFF);
        }

        /* Grille principale */
        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Cartes */
        .card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(11, 28, 63, 0.2);
            border: 1px solid rgba(255, 105, 180, 0.2);
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

        /* Formulaire colocation */
        .colo-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #0B1C3F;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #FF69B4;
            outline: none;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.4);
        }

        .btn-success {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(145deg, #FF69B4, #FF1493);
            color: white;
        }

        /* Tableau des colocations */
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(145deg, #0B1C3F, #1A3B5C);
            color: white;
            padding: 12px;
            font-size: 14px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #E0E0E0;
        }

        tr:hover {
            background: #F0F8FF;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn-small {
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 5px;
        }

        /* Section des dettes */
        .debts-section {
            background: linear-gradient(145deg, #FFF0F5, #FFFFFF);
            border-radius: 15px;
            padding: 20px;
            border: 2px solid #FF69B4;
        }

        .debt-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: white;
            border-radius: 10px;
            margin-bottom: 10px;
            border-left: 4px solid;
        }

        .debt-item.positive {
            border-left-color: #28a745;
        }

        .debt-item.negative {
            border-left-color: #dc3545;
        }

        .debt-amount {
            font-size: 18px;
            font-weight: 700;
        }

        .amount-positive {
            color: #28a745;
        }

        .amount-negative {
            color: #dc3545;
        }

        /* Filtres */
        .filter-section {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 10px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            min-width: 150px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
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
            max-height: 80vh;
            overflow-y: auto;
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

        .logo-tagline {
            color: #FF69B4;
            margin-left: auto;
            font-style: italic;
            font-weight: 500;
            background: rgba(255, 105, 180, 0.1);
            padding: 8px 15px;
            border-radius: 25px;
        }


        @media (max-width: 768px) {
            .nav-buttons {
                grid-template-columns: 1fr;
            }

            .main-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <div class="logo-icon">🏘️</div>
                <span class="logo-text">EasyColo</span>
            </div>

            <div class="header-actions">
                <a class="btn btn-primary" href="{{ route('colocation.index') }}">
                    🏠 Colocations
                </a>
            </div>

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logo-tagline" type="submit">✨Logout✨</button>
                </form>
            @endauth
        </div>

        <!-- Boutons de navigation -->
        <div class="nav-buttons">
            @if ($colocation->owner->user_id == auth()->user()->id)
                <a href="{{ route('colocation.category.index', $colocation) }}" class="nav-btn btn-category">
                    <i>📑</i> Gestion Catégories
                </a>
                <a href="{{ route('colocation.members.index', $colocation) }}" class="nav-btn btn-member">
                    <i>👥</i> Gestion Membres
                </a>
                <a href="{{ route('colocation.invitation.invite', $colocation) }}" class="nav-btn btn-invite">
                    <i>📨</i> Envoyer Invitation
                </a>
                <a href="{{ route('colocation.anuller', $colocation) }}" class="nav-btn btn-invite">
                    <i>🏠</i> Anuller La colocation
                </a>
            @else
                <a href="{{ route('colocation.members.index', $colocation) }}" class="nav-btn btn-member">
                    <i>👥</i> Voir Membres
                </a>
                <a href="{{ route('colocation.members.quitter', $colocation) }}" class="nav-btn btn-invite">
                    <i>🏠</i> Quitter La colocation
                </a>
            @endif
        </div>

        <!-- Section Dépenses -->
        <div class="main-grid">
            <!-- Dépenses -->
            <div class="card">
                <div class="card-header">
                    <h2><span>💰</span> Dépenses</h2>
                </div>
                <form action="{{ route('colocation.expence.store', $colocation) }}" method="POST">
                    @csrf
                    <!-- Filtre par mois -->
                    <div class="filter-section">
                        <select name="category_id" id="monthFilter" class="filter-select">
                            <option value="">Tout les catégories</option>
                            @foreach ($colocation->categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Formulaire ajout dépense -->
                    <div class="colo-form" style="grid-template-columns: 1fr 1fr auto;">
                        <input name="name" type="text" id="expenseDesc" class="form-control" placeholder="Nom">
                        <input name="montant" type="number" id="expenseAmount" class="form-control"
                            placeholder="Montant">

                        <button class="btn btn-success" onclick="addExpense()">➕ Ajouter</button>
                    </div>
                </form>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Montant</th>
                                <th>Catégorie</th>
                                <th>Créateur</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="expensesList">
                            @forelse ($colocation->expences as $expence)
                                <tr>
                                    <td>{{ $expence->name }}</td>
                                    <td>{{ $expence->montant }}</td>
                                    <td>{{ $expence->category->name }}</td>
                                    <td>{{ $expence->creator->user->name }}</td>
                                    <td>{{ $expence->created_at }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a class="btn btn-small btn-primary"
                                                href="{{ route('colocation.expence.show', [$colocation, $expence]) }}">voir</a>
                                            @if ($expence->creator->user_id == auth()->user()->id)
                                                <a href="{{ route('colocation.expence.edit', [$colocation, $expence]) }}"
                                                    class="btn btn-small btn-primary">✏️</a>
                                                <form action="{{ route('colocation.expence.destroy', $expence) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-small btn-danger">🗑️</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">No Expences</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Section "Doit à qui" (Dettes) -->
            <div>
                <div class="card">
                    <div class="card-header">
                        <h2><span>💸</span> Doit à qui</h2>
                    </div>
                    <div class="debts-section" id="debtsSection">
                        @forelse ($colocation->members as $member)
                            @if ($member->user_id != auth()->user()->id)
                                @if ($member->total_final > 0)
                                    <div class="debt-item positive">
                                        <span>{{ $member->user->name }} doit à {{ auth()->user()->name }} </span>
                                        <span class="debt-amount amount-positive">{{ $member->total_final }} DH</span>
                                    </div>
                                @elseif($member->total_final < 0)
                                    <div class="debt-item negative">
                                        <span>{{ auth()->user()->name }} doit à {{ $member->user->name }} </span>
                                        <span class="debt-amount amount-negative">{{ $member->total_final }} DH</span>
                                    </div>
                                @endif
                            @endif
                        @empty
                            <div class="debt-item">
                                <span>No 7sab</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour les détails d'une dépense -->
        <div id="expenseModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Détails de la dépense</h3>
                    <span class="close" onclick="closeModal()">&times;</span>
                </div>
                <div id="expenseDetails"></div>
            </div>
        </div>
    </div>
</body>

</html>
