<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Administration</title>
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
            width: 50px;
            height: 50px;
            background: linear-gradient(145deg, #FF69B4, #9B59B6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: #0B1C3F;
        }

        .admin-badge {
            background: #0B1C3F;
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 105, 180, 0.2);
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #0B1C3F;
        }

        .stat-label {
            color: #666;
            font-size: 13px;
            margin-top: 5px;
        }

        /* Filtres et recherche */
        .filters {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-box {
            flex: 1;
            padding: 10px 15px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 14px;
            min-width: 250px;
        }

        .filter-select {
            padding: 10px 15px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            font-size: 14px;
            background: white;
        }

        /* Tableau */
        .table-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(11, 28, 63, 0.2);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-header h2 {
            color: #0B1C3F;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #0B1C3F;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        th:first-child {
            border-top-left-radius: 10px;
        }

        th:last-child {
            border-top-right-radius: 10px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #E0E0E0;
            color: #333;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover {
            background: #F8F9FF;
        }

        /* Avatar utilisateur */
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .user-details {
            line-height: 1.4;
        }

        .user-name {
            font-weight: 600;
            color: #0B1C3F;
        }

        .user-email {
            font-size: 12px;
            color: #666;
        }

        /* Badges de statut */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background: #28a74520;
            color: #28a745;
            border: 1px solid #28a745;
        }

        .status-inactive {
            background: #ffc10720;
            color: #ffc107;
            border: 1px solid #ffc107;
        }

        .status-banned {
            background: #dc354520;
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        /* Badge rôle */
        .role-badge {
            background: #F0F8FF;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 11px;
            color: #0B1C3F;
            border: 1px solid #87CEEB;
            display: inline-block;
        }

        .role-admin {
            background: #FFF0F5;
            border-color: #FF69B4;
            color: #FF1493;
        }

        /* Boutons d'action */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: opacity 0.3s;
        }

        .btn-ban {
            background: #dc3545;
            color: white;
        }

        .btn-deactivate {
            background: #ffc107;
            color: #0B1C3F;
        }

        .btn-activate {
            background: #28a745;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Pagination */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .page-item {
            padding: 8px 14px;
            background: white;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            color: #0B1C3F;
            text-decoration: none;
            font-size: 14px;
        }

        .page-item.active {
            background: #FF69B4;
            color: white;
            border-color: #FF69B4;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .filters {
                flex-direction: column;
            }

            .search-box,
            .filter-select {
                width: 100%;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Admin -->
        <div class="header">
            <div class="logo">
                <div class="logo-icon">⚡</div>
                <span class="logo-text">EasyColo Admin</span>
            </div>
            <div class="admin-badge">✨<a style="color: white; text-decoration: none;"
                    href="{{ route('colocation.index') }}">Colocation</a>✨</div>
            <div class="admin-badge">
                <span>👑</span> Administrateur
            </div>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="admin-badge" type="submit">✨Logout✨</button>
                </form>
            @endauth
        </div>


        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ $users->count() }}</div>
                <div class="stat-label">Utilisateurs totaux</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $user_active }}</div>
                <div class="stat-label">Actifs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $user_banned }}</div>
                <div class="stat-label">Bannis</div>
            </div>
        </div>

        <!-- Tableau des utilisateurs -->
        <div class="table-card">
            <div class="table-header">
                <h2>
                    <span>👥</span> Gestion des utilisateurs
                </h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Inscrit le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">{{ $user->name[0] }}</div>
                                    <div class="user-details">
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-email">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="role-badge">{{ $user->role }}</span></td>



                            <td>
                                @if ($user->banned)
                                    <span class="status-badge status-banned">Banni</span>
                                @else
                                    <span class="status-badge status-active">Actif</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if ($user->role != "admin")
                                    <div class="action-buttons">
                                        @if ($user->banned)
                                            <form action="{{ route('admin.unbanne', $user) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-activate">Unbanne</button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.banne', $user) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-ban">Bannir</button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Users</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2026 EasyColo - Panneau d'administration
        </div>
    </div>
</body>

</html>
