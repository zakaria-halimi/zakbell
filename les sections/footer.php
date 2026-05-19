<footer class="main-footer">
    <div class="container footer-grid">
        <div class="footer-about">
            <a href="#" class="logo-footer">SATAS<span>.</span></a>
            <p>Leader du transport de voyageurs au Maroc depuis des décennies. Nous voyageons pour vous rapprocher.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

        <div class="footer-links">
            <h4>Navigation</h4>
            <ul>
                <li><a href="horaires.php">Horaires</a></li>
                <li><a href="agences.php">Agences</a></li>
                <li><a href="#">Offres Spéciales</a></li>
                <li><a href="#">Recrutement</a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Support</h4>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Conditions de vente</a></li>
                <li><a href="#">Politique de cookies</a></li>
                <li><a href="contact.php">Contactez-nous</a></li>
            </ul>
        </div>

        <div class="footer-trust">
            <h4>Paiement Sécurisé</h4>
            <div class="payment-methods">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/CMI_Logo.png" alt="CMI Logo"
                    style="width: 50px;">
            </div>
            <p class="safety-text"><i class="fas fa-lock"></i> Données cryptées SSL</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 SATAS Transport. Tous droits réservés. Réalisé avec ❤️ au Maroc.</p>
    </div>
</footer>

<style>
    /* --- FOOTER STYLE --- */
    .main-footer {
        background-color: #0d1b2a;
        color: #fff;
        padding: 80px 5% 20px 5%;
        font-family: 'Segoe UI', sans-serif;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 50px;
    }

    .logo-footer {
        font-size: 32px;
        font-weight: 900;
        color: #fff;
        text-decoration: none;
        font-style: italic;
        display: block;
        margin-bottom: 20px;
    }

    .logo-footer span {
        color: #ffcc00;
    }

    .footer-about p {
        color: #adb5bd;
        line-height: 1.6;
        font-size: 0.9rem;
    }

    .social-icons {
        margin-top: 20px;
        display: flex;
        gap: 15px;
    }

    .social-icons a {
        color: #fff;
        font-size: 1.2rem;
        transition: 0.3s;
    }

    .social-icons a:hover {
        color: #ec632f;
    }

    .footer-links h4,
    .footer-trust h4 {
        font-size: 1.1rem;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .footer-links ul {
        list-style: none;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: #adb5bd;
        text-decoration: none;
        transition: 0.3s;
        font-size: 0.9rem;
    }

    .footer-links a:hover {
        color: #fff;
        padding-left: 5px;
    }

    .payment-methods {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .safety-text {
        font-size: 0.8rem;
        color: #4ade80;
        /* Vert pour la sécurité */
    }

    .footer-bottom {
        text-align: center;
        padding-top: 30px;
        color: #6c757d;
        font-size: 0.8rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-grid {
            text-align: center;
        }

        .social-icons {
            justify-content: center;
        }

        .payment-methods {
            justify-content: center;
        }
    }
</style>