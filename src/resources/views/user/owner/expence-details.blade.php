<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColo - Dépenses</title>
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
            max-width: 1000px;
            width: 100%;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
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
        }

        tr:hover {
            background: #F8F9FF;
        }

        .category {
            background: #F0F8FF;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            color: #0B1C3F;
            border: 1px solid #87CEEB;
            display: inline-block;
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

        .status {
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .status-paye {
            background: #28a74520;
            color: #28a745;
            border: 1px solid #28a745;
        }

        .status-attente {
            background: #ffc10720;
            color: #ffc107;
            border: 1px solid #ffc107;
        }

        .montant {
            font-weight: 600;
            color: #0B1C3F;
        }

        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #999;
        }

        .total {
            background: #FFF0F5;
            padding: 8px 15px;
            border-radius: 20px;
            color: #FF69B4;
            font-weight: 600;
            border: 1px solid #FF69B4;
        }

        .btn-add {
            background: linear-gradient(145deg, #87CEEB, #9B59B6);
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .filter {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-item {
            background: #F0F8FF;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            color: #0B1C3F;
            border: 1px solid #87CEEB;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>
                    <span>💰</span> Dépenses
                </h1>
                <div class="colo-info">
                    🏠 <a href="{{ route('colocation.show', $colocation) }}">Appartement Lumineux - Paris</a>
                </div>
            </div>

            <!-- Tableau des dépenses -->
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($expence->balances as $balance)
                        <tr>
                            <td>{{ $balance->from_user->user->name }}</td>
                            <td class="montant">{{ $balance->montant }} DH</td>
                            <td>{{ $balance->created_at }}</td>
                            <td>
                                @if ($balance->status == 'pending')
                                    <span class="status status-attente">En attente</span>
                                @else
                                    <span class="status status-paye">Payé</span>
                                @endif

                            </td>
                            <td>
                                @if ($expence->creator->user_id == auth()->user()->id)
                                    @if ($balance->status == 'pending')
                                             <form action="{{ route('colocation.balance.mark-payed', $balance) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-small btn-danger">Payée</button>
                                            </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center">No detaille</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>

            <!-- Pied de page avec total -->
            <div class="footer">
                <div class="total">
                    Total: {{ $expence->montant }} DH
                </div>
            </div>
        </div>
    </div>
</body>

</html>
