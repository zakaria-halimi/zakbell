<?php
include 'db.php';

// Vérifier si un ID est passé
if (isset($_GET['id'])) {
    $offer_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM offres WHERE id = ?");
        $stmt->execute([$offer_id]);
        $offer = $stmt->fetch();
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération de l'offre.";
    }
} else {
    // Redirection si pas d'ID
    header("Location: offres.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver - SATAS</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <?php include 'les sections/navbar.php'; ?>

    <section class="reservation-section">
        <?php if ($offer): ?>
            <div class="reservation-container fadeInUp">
                <div class="reservation-summary">
                    <span class="summary-title">Votre Réservation</span>
                    <div class="summary-offer">
                        <h2>
                            <?php echo htmlspecialchars($offer['titre']); ?>
                        </h2>
                        <div class="summary-route">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo htmlspecialchars($offer['ville_depart']); ?> <i class="fas fa-arrow-right"></i>
                            <?php echo htmlspecialchars($offer['ville_arrivee']); ?>
                        </div>
                        <div class="summary-price">
                            <?php echo number_format($offer['prix_promo'], 0, ',', ' '); ?> DH
                        </div>
                        <p style="margin-top: 20px; opacity: 0.8;">*Prix par personne</p>
                    </div>
                </div>

                <div class="reservation-form-container">
                    <?php
                    $booking_success = false;
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_booking'])) {
                        $nom = htmlspecialchars($_POST['nom']);
                        $email = htmlspecialchars($_POST['email']);
                        $tel = htmlspecialchars($_POST['tel']);
                        $places = intval($_POST['places']);
                        $off_id = $_POST['offer_id'];

                        try {
                            $stmt = $pdo->prepare("INSERT INTO reservations (offer_id, nom, email, tel, places) VALUES (?, ?, ?, ?, ?)");
                            $stmt->execute([$off_id, $nom, $email, $tel, $places]);
                            $booking_success = true;
                        } catch (PDOException $e) {
                            echo "<div class='alert error'>Erreur technique. Veuillez réessayer.</div>";
                        }
                    }
                    ?>

                    <?php if ($booking_success): ?>
                        <div class="success-message text-center fadeInUp" style="padding: 40px;">
                            <i class="fas fa-check-circle" style="font-size: 4rem; color: #28a745; margin-bottom: 20px;"></i>
                            <h3>Réservation Confirmée !</h3>
                            <p>Merci <?php echo $nom; ?>, votre demande a été enregistrée.</p>
                            <p>Un email de confirmation vous sera envoyé à <strong><?php echo $email; ?></strong>.</p>
                            <a href="reservation_check.php" class="btn-offer"
                                style="margin-top: 20px; display: inline-block;">Voir mes billets</a>
                        </div>
                    <?php else: ?>
                        <h3>Finaliser votre demande</h3>
                        <p style="margin-bottom: 30px; color: #666;">Remplissez ce formulaire et nous vous contacterons pour
                            confirmer.</p>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nom complet</label>
                                <input type="text" name="nom" required placeholder="Votre nom">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required placeholder="votre@email.com">
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="tel" name="tel" required placeholder="06XXXXXXXX">
                            </div>
                            <div class="form-group">
                                <label>Nombre de places</label>
                                <input type="number" name="places" min="1" value="1" required>
                            </div>
                            <input type="hidden" name="offer_id" value="<?php echo $offer['id']; ?>">

                            <button type="submit" name="confirm_booking" class="btn-confirm">Confirmer la réservation</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="container text-center">
                <h1>Offre non trouvée</h1>
                <a href="offres.php" class="btn-offer">Retour aux offres</a>
            </div>
        <?php endif; ?>
    </section>

    <?php include 'les sections/footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>