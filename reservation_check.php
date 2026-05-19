<?php
include 'db.php';
$reservations = [];
$search_done = false;

if (isset($_POST['check_reservation'])) {
    $email = htmlspecialchars($_POST['email']);
    $search_done = true;

    try {
        $stmt = $pdo->prepare("
            SELECT r.*, o.titre, o.ville_depart, o.ville_arrivee, o.prix_promo 
            FROM reservations r 
            JOIN offres o ON r.offer_id = o.id 
            WHERE r.email = ? 
            ORDER BY r.created_at DESC
        ");
        $stmt->execute([$email]);
        $reservations = $stmt->fetchAll();
    } catch (PDOException $e) {
        $error = "Erreur de recherche.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations - SATAS</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <?php include 'les sections/navbar.php'; ?>

    <section class="check-section">
        <div class="container">
            <div class="check-card text-center">
                <h2>Retrouver mon billet</h2>
                <p>Entrez l'adresse email utilisée lors de la réservation.</p>
                <form method="POST" style="margin-top: 20px;">
                    <div class="form-group">
                        <input type="email" name="email" required placeholder="votre@email.com" class="form-control"
                            style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ddd; border-radius:5px;">
                    </div>
                    <button type="submit" name="check_reservation" class="btn-offer">Vérifier</button>
                </form>
            </div>

            <?php if ($search_done): ?>
                <div class="results-area" style="max-width: 800px; margin: 0 auto;">
                    <h3>Résultats pour :
                        <?php echo htmlspecialchars($email); ?>
                    </h3>

                    <?php if (count($reservations) > 0): ?>
                        <?php foreach ($reservations as $res): ?>
                            <div class="res-item fadeInUp">
                                <div>
                                    <h4 style="margin: 0 0 5px 0;">
                                        <?php echo htmlspecialchars($res['titre']); ?>
                                    </h4>
                                    <p style="margin: 0; color: #666; font-size: 0.9rem;">
                                        <i class="fas fa-route"></i>
                                        <?php echo htmlspecialchars($res['ville_depart']); ?> >
                                        <?php echo htmlspecialchars($res['ville_arrivee']); ?>
                                    </p>
                                    <p style="margin: 5px 0 0; font-size: 0.8rem; color: #999;">Date:
                                        <?php echo $res['created_at']; ?>
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span class="res-status <?php echo str_replace(' ', '', $res['status']); ?>">
                                        <?php echo $res['status']; ?>
                                    </span>
                                    <div style="font-weight: bold; margin-top: 5px; color: var(--primary-color);">
                                        <?php echo $res['prix_promo']; ?> DH
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-warning text-center">Aucune réservation trouvée pour cet email.</div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include 'les sections/footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>