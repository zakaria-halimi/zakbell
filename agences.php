<?php
include 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM agences ORDER BY ville ASC");
    $agences = $stmt->fetchAll();
} catch (PDOException $e) {
    $agences = [];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Agences - SATAS</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .agences-section {
            padding: 120px 5% 60px;
            background-color: #f4f6f8;
        }

        .agences-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .agence-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .agence-card:hover {
            transform: translateY(-5px);
        }

        .agence-map-preview {
            height: 180px;
            background-color: #ddd;
            position: relative;
        }

        .agence-map-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .agence-info {
            padding: 25px;
        }

        .agence-city {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ec632f;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .agence-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: #0d1b2a;
            margin-bottom: 15px;
        }

        .agence-detail {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 10px;
            font-size: 0.95rem;
            color: #555;
        }

        .agence-detail i {
            color: #ec632f;
            margin-top: 4px;
        }

        .btn-map {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #0d1b2a;
            color: white;
            padding: 12px;
            text-decoration: none;
            font-weight: 700;
            margin-top: 20px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-map:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

    <?php include 'les sections/navbar.php'; ?>

    <section class="agences-section">
        <div class="container text-center" style="margin-bottom: 50px;">
            <h1 class="section-title">Trouvez votre agence</h1>
            <p style="color: #666; max-width: 600px; margin: 0 auto;">Nous sommes présents dans les plus grandes villes
                du Royaume pour être au plus proche de vous.</p>
        </div>

        <div class="agences-grid fadeInUp">
            <?php foreach ($agences as $agence): ?>
                <div class="agence-card">
                    <div class="agence-map-preview">
                        <!-- Placeholder Map Image -->
                        <img src="<?php echo htmlspecialchars($agence['image_path']); ?>" alt="Agence SATAS">
                    </div>
                    <div class="agence-info">
                        <div class="agence-city">
                            <?php echo htmlspecialchars($agence['ville']); ?>
                        </div>
                        <div class="agence-name">
                            <?php echo htmlspecialchars($agence['nom_agence']); ?>
                        </div>

                        <div class="agence-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>
                                <?php echo htmlspecialchars($agence['adresse']); ?>
                            </span>
                        </div>
                        <div class="agence-detail">
                            <i class="fas fa-phone"></i>
                            <span>
                                <?php echo htmlspecialchars($agence['telephone']); ?>
                            </span>
                        </div>
                        <div class="agence-detail">
                            <i class="far fa-clock"></i>
                            <span>
                                <?php echo htmlspecialchars($agence['horaires_ouverture']); ?>
                            </span>
                        </div>

                        <a href="https://maps.google.com/?q=<?php echo urlencode($agence['adresse'] . ', ' . $agence['ville']); ?>"
                            target="_blank" class="btn-map">
                            <i class="fas fa-location-arrow"></i> S'y rendre
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include 'les sections/footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>