<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Offres - SATAS</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php include 'les sections/navbar.php'; ?>

    <!-- Hero Section Offres -->
    <section class="offers-hero">
        <div class="hero-overlay"></div>
        <div class="offers-hero-container">
            <div class="offers-hero-content fadeInUp">
                <span class="hero-subtitle">MIEUX VOYAGER</span>
                <h1>Nos Offres <span class="highlight">Exclusives</span></h1>
                <p>Découvrez nos promotions du moment et voyagez moins cher à travers tout le Maroc.</p>
            </div>
        </div>
    </section>

    <!-- Offres Grid -->
    <section class="offers-section">
        <div class="container">

            <!-- Filters -->
            <div class="offers-filters fadeInUp" style="animation-delay: 0.2s;">
                <button class="filter-btn active" data-filter="all">Tout voir</button>
                <button class="filter-btn" data-filter="promo">Promotions</button>
                <button class="filter-btn" data-filter="flash">Vente Flash</button>
                <button class="filter-btn" data-filter="famille">Famille</button>
                <button class="filter-btn" data-filter="eco">Eco</button>
            </div>

            <div class="offers-grid fadeInUp" style="animation-delay: 0.4s;">
                <?php
                try {
                    // Inclusion connexion DB
                    include 'db.php';
                    
                    // Récupération des offres
                    $stmt = $pdo->query("SELECT * FROM offres ORDER BY created_at DESC");
                    $offres = $stmt->fetchAll();

                    foreach ($offres as $offre) {
                        // Calcul du badge
                        $badgeHTML = '';
                        if (!empty($offre['badge_text'])) {
                            $badgeHTML = '<div class="offer-badge ' . htmlspecialchars($offre['badge_class']) . '">' . htmlspecialchars($offre['badge_text']) . '</div>';
                        }
                ?>
                
                <!-- Offre Dynamique -->
                <div class="offer-card" data-category="<?php echo htmlspecialchars($offre['categorie']); ?>">
                    <?php echo $badgeHTML; ?>
                    <div class="offer-image">
                        <img src="<?php echo htmlspecialchars($offre['image_path']); ?>" alt="<?php echo htmlspecialchars($offre['titre']); ?>">
                    </div>
                    <div class="offer-details">
                        <div class="offer-meta">
                            <span class="offer-route"><i class="fas fa-route"></i> <?php echo htmlspecialchars($offre['ville_depart']); ?> - <?php echo htmlspecialchars($offre['ville_arrivee']); ?></span>
                        </div>
                        <h3><?php echo htmlspecialchars($offre['titre']); ?></h3>
                        <p class="offer-desc"><?php echo htmlspecialchars($offre['description']); ?></p>
                        <div class="offer-pricing">
                            <span class="old-price"><?php echo number_format($offre['prix_original'], 0, ',', ' '); ?> DH</span>
                            <span class="new-price"><?php echo number_format($offre['prix_promo'], 0, ',', ' '); ?> DH</span>
                        </div>
                        <a href="reservation.php?id=<?php echo $offre['id']; ?>" class="btn-offer">Je réserve</a>
                    </div>
                </div>

                <?php
                    } // Fin foreach
                } catch (Exception $e) {
                    echo "<p>Erreur de chargement des offres. Veuillez réessayer plus tard.</p>";
                    // Pour le debug local uniquement : echo $e->getMessage();
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'les sections/footer.php'; ?>

    <script src="script.js"></script>
</body>

</html>