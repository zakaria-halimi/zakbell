<section class="ecologie">
    <div class="container">
        <h2>Voyager avec SATAS, c'est aussi <br>proteger notre Terre<span>.</span></h2>
        
        <div class="stats-eco-grid">
            <div class="stat-eco-item">
                <i class="fas fa-leaf eco-green"></i>
                <strong>-45%</strong>
                <span>ÉMISSIONS CO2</span>
            </div>
            <div class="stat-eco-item">
                <i class="fas fa-gas-pump eco-yellow"></i>
                <strong>12M</strong>
                <span>LITRES ÉCONOMISÉS</span>
            </div>
            <div class="stat-eco-item">
                <i class="fas fa-tree eco-light-green"></i>
                <strong>85k</strong>
                <span>ARBRES PRÉSERVÉS</span>
            </div>
            <div class="stat-eco-item">
                <i class="fas fa-road eco-blue"></i>
                <strong>150+</strong>
                <span>VILLES CONNECTÉES</span>
            </div>
        </div>

        <p class="eco-quote">
            "Chaque trajet en bus retire en moyenne 30 voitures de la route. Merci de choisir un voyage responsable."
        </p>
    </div>
</section>


<style>
    /* --- SECTION ECOLOGIE --- */
.ecologie {
    background-color: #1a56db; /* Le bleu vif de l'image */
    padding: 80px 5%;
    color: white;
    text-align: center;
}

.ecologie h2 {
    font-size: 2.2rem;
    font-weight: 800;
    margin-bottom: 60px;
    line-height: 1.2;
}

.ecologie h2 span { color: #ffcc00; }

.stats-eco-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
    max-width: 1100px;
    margin: 0 auto 60px auto;
}

.stat-eco-item i {
    font-size: 2.5rem;
    margin-bottom: 20px;
    display: block;
}

/* Couleurs spécifiques des icônes */
.eco-green { color: #4ade80; }
.eco-yellow { color: #facc15; }
.eco-light-green { color: #86efac; }
.eco-blue { color: #60a5fa; }

.stat-eco-item strong {
    font-size: 2.5rem;
    display: block;
    margin-bottom: 5px;
    font-weight: 800;
}

.stat-eco-item span {
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1px;
    opacity: 0.9;
}

.eco-quote {
    font-style: italic;
    font-size: 1rem;
    max-width: 700px;
    margin: 0 auto;
    opacity: 0.8;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 768px) {
    .ecologie h2 { font-size: 1.8rem; }
    .stats-eco-grid { gap: 30px; }
}
</style>