<?php
include 'db.php';

$message_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($nom) && !empty($email) && !empty($message)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (nom, email, sujet, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $email, $sujet, $message]);
            $message_status = "succes";
        } catch (PDOException $e) {
            $message_status = "erreur";
        }
    } else {
        $message_status = "incomplet";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous - SATAS</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <?php include 'les sections/navbar.php'; ?>

    <section class="contact-section">
        <div class="section-title text-center">
            <h2>Contactez-nous</h2>
            <p>Une question ? Besoin d'aide ?</p>
        </div>

        <div class="contact-form fadeInUp">
            <?php if ($message_status == "succes"): ?>
                <div class="form-feedback success">Votre message a été envoyé avec succès !</div>
            <?php elseif ($message_status == "erreur"): ?>
                <div class="form-feedback error">Une erreur est survenue. Réessayez plus tard.</div>
            <?php elseif ($message_status == "incomplet"): ?>
                <div class="form-feedback error">Veuillez remplir tous les champs obligatoires.</div>
            <?php endif; ?>

            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label>Nom complet</label>
                    <input type="text" name="nom" required placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required placeholder="votre@email.com">
                </div>
                <div class="form-group">
                    <label>Sujet</label>
                    <input type="text" name="sujet" placeholder="Sujet de votre message">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" rows="5" required
                        placeholder="Comment pouvons-nous vous aider ?"></textarea>
                </div>
                <button type="submit" class="btn-confirm">Envoyer le message</button>
            </form>
        </div>
    </section>

    <?php include 'les sections/footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>