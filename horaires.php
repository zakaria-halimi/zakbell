<?php
include 'db.php';

$ville_depart = isset($_GET['depart']) ? htmlspecialchars($_GET['depart']) : '';
$ville_arrivee = isset($_GET['arrivee']) ? htmlspecialchars($_GET['arrivee']) : '';

$sql = "SELECT * FROM horaires WHERE 1=1";
$params = [];

if ($ville_depart) {
    $sql .= " AND ville_depart LIKE ?";
    $params[] = "%$ville_depart%";
}
if ($ville_arrivee) {
    $sql .= " AND ville_arrivee LIKE ?";
    $params[] = "%$ville_arrivee%";
}

$sql .= " ORDER BY heure_depart ASC";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $horaires = $stmt->fetchAll();
} catch (PDOException $e) {
    $horaires = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horaires - SATAS</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .page-header {
            background-color: #0d1b2a;
            color: white;
            padding: 120px 20px 60px;
            text-align: center;
        }
        .search-area {
            background: #f9f9f9;
            padding: 30px 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .schedule-table-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            overflow-x: auto;
        }
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-radius: 10px;
            overflow: hidden;
        }
        .schedule-table th, .schedule-table td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .schedule-table th {
            background-color: var(--primary-color); /* Fallback */
            background-color: #ec632f;
            color: white;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }
        .schedule-table tr:hover {
            background-color: #f8fbff;
        }
        .time-cell {
            font-weight: bold;
            font-size: 1.1rem;
            color: #0d1b2a;
        }
        .price-tag {
            background-color: #e6fffa;
            color: #00ca72;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
        }
    </style>
</head>
<body>

    <?php include 'les sections/navbar.php'; ?>

    <div class="page-header">
        <h1>Nos Horaires</h1>
        <p>Consultez les départs quotidiens de nos autocars.</p>
    </div>

    <form class="search-area" method="GET">
        <input type="text" name="depart" placeholder="Ville de départ" value="<?php echo $ville_depart; ?>" class="form-control" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        <input type="text" name="arrivee" placeholder="Ville d'arrivée" value="<?php echo $ville_arrivee; ?>" class="form-control" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        <button type="submit" class="btn-search" style="padding: 12px 25px; border-radius: 8px; cursor:pointer;">Filtrer</button>
    </form>

    <div class="schedule-table-container fadeInUp">
        <table class="schedule-table">
            <thead>
                <tr>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Heure</th>
                    <th>Durée</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($horaires) > 0): ?>
                    <?php foreach ($horaires as $h): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($h['ville_depart']); ?></td>
                        <td><?php echo htmlspecialchars($h['ville_arrivee']); ?></td>
                        <td>
                            <div class="time-cell"><?php echo date('H:i', strtotime($h['heure_depart'])); ?></div>
                            <small style="color:#888;">Arrivée <?php echo date('H:i', strtotime($h['heure_arrivee'])); ?></small>
                        </td>
                        <td><?php echo htmlspecialchars($h['duree']); ?></td>
                        <td><?php echo htmlspecialchars($h['type_autocar']); ?></td>
                        <td><span class="price-tag"><?php echo number_format($h['prix'], 0, ',', ' '); ?> DH</span></td>
                        <td>
                            <!-- Lien vers réservation avec un parametre special si besoin, ou juste vers offres -->
                            <a href="offres.php" style="color: #ec632f; font-weight: bold; text-decoration: none;">Réserver <i class="fas fa-arrow-right"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px;">Aucun trajet trouvé pour votre recherche.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include 'les sections/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>
