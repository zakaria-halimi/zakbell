<section class="destinations">
    <div class="container">
        <div class="destinations-header">
            <div class="title-area">
                <h2>Destinations Populaires</h2>
                <p>Explorez le Maroc avec nos trajets les plus demandés.</p>
            </div>
            <a href="offres.php" class="btn-outline">Voir tout</a>
        </div>

        <div class="destinations-grid">
            <?php
            // Connexion DB si pas déjà incluse (gestion simple)
            require_once __DIR__ . '/../db.php';

            try {
                $stmt = $pdo->query("SELECT * FROM destinations ORDER BY prix_depart ASC LIMIT 4");
                $destinations = $stmt->fetchAll();

                foreach ($destinations as $dest) {
                    ?>

                    <div class="dest-card"
                        style="background-image: url('<?php echo htmlspecialchars($dest['image_path']); ?>');">
                        <div class="dest-overlay">
                            <div class="dest-info">
                                <span>À partir de</span>
                                <h3>
                                    <?php echo htmlspecialchars($dest['ville']); ?> <span>
                                        <?php echo number_format($dest['prix_depart'], 0, ',', ' '); ?> DH
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            } catch (Exception $e) {
                echo "<p>Nos destinations sont momentanément indisponibles.</p>";
            }
            ?>
        </div>
    </div>
</section>