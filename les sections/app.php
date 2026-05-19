<section class="app-promo">
    <div class="container app-container">
        <div class="app-content">
            <span class="badge-new">NOUVEAU</span>
            <h2>Votre voyage commence <br><span class="yellow-text">dans votre poche.</span></h2>
            <p>Réservez vos billets en moins de 60 secondes, suivez la position de votre bus en temps réel et profitez
                de promotions exclusives uniquement sur l'application SATAS.</p>

            <div class="app-buttons">
                <a href="#" class="store-btn">
                    <i class="fab fa-apple"></i>
                    <div class="btn-text">
                        <span>Disponible sur</span>
                        <strong>App Store</strong>
                    </div>
                </a>
                <a href="#" class="store-btn">
                    <i class="fab fa-google-play"></i>
                    <div class="btn-text">
                        <span>Disponible sur</span>
                        <strong>Google Play</strong>
                    </div>
                </a>
            </div>

            <div class="app-stats">
                <div class="stat-item">
                    <strong>500k+</strong>
                    <span>Téléchargements</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <strong>4.8/5</strong>
                    <span>Note App Store</span>
                </div>
            </div>
        </div>

        <div class="app-image">
            <div class="phone-wrapper">
                <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=600&auto=format&fit=crop"
                    alt="Application SATAS mobile">
            </div>
        </div>
    </div>
</section>

<style>
    .app-promo {
        background-color: #0b162c;
        /* Bleu très foncé */
        padding: 100px 5%;
        color: white;
        overflow: hidden;
    }

    .app-container {
        display: flex;
        align-items: center;
        gap: 50px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Texte et Titres */
    .app-content {
        flex: 1;
    }

    .badge-new {
        background-color: #ffcc00;
        color: #0b162c;
        padding: 5px 15px;
        border-radius: 50px;
        font-weight: 900;
        font-size: 0.8rem;
        display: inline-block;
        margin-bottom: 20px;
    }

    .app-content h2 {
        font-size: 3rem;
        line-height: 1.1;
        margin-bottom: 25px;
        font-weight: 800;
    }

    .yellow-text {
        color: #ffcc00;
    }

    .app-content p {
        color: #a0aab8;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 500px;
    }

    /* Boutons Stores */
    .app-buttons {
        display: flex;
        gap: 20px;
        margin-bottom: 50px;
    }

    .store-btn {
        background: white;
        color: black;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: 0.3s;
    }

    .store-btn i {
        font-size: 1.8rem;
    }

    .btn-text span {
        display: block;
        font-size: 0.7rem;
        text-transform: uppercase;
    }

    .btn-text strong {
        font-size: 1.1rem;
        display: block;
    }

    .store-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 204, 0, 0.2);
    }

    /* Stats */
    .app-stats {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .stat-item strong {
        display: block;
        font-size: 1.8rem;
    }

    .stat-item span {
        font-size: 0.9rem;
        color: #a0aab8;
    }

    .stat-divider {
        width: 2px;
        height: 40px;
        background-color: #334155;
    }

    /* Image Téléphone */
    .app-image {
        flex: 1;
    }

    .phone-wrapper {
        position: relative;
        transform: rotate(10deg);
        /* Légère inclinaison comme sur l'image */
    }

    .phone-wrapper img {
        width: 100%;
        max-width: 450px;
        border-radius: 40px;
        box-shadow: -20px 20px 50px rgba(0, 0, 0, 0.5);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .app-container {
            flex-direction: column;
            text-align: center;
        }

        .app-content p {
            margin: 0 auto 40px auto;
        }

        .app-buttons,
        .app-stats {
            justify-content: center;
        }

        .phone-wrapper {
            transform: rotate(0);
        }
    }
</style>