<section class="experience">
    <div class="container">
        <div class="experience-header">
            <h2>Expérience à Bord<span>.</span></h2>
            <p>Choisissez le niveau de confort qui vous convient.</p>
        </div>

        <div class="experience-grid">
            <div class="exp-card business">
                <div class="ribbon">POPULAIRE</div>
                <h3>BUSINESS CLASS</h3>
                <ul class="exp-list">
                    <li><i class="fas fa-check-circle"></i> Sièges Cuir Inclinables 160°</li>
                    <li><i class="fas fa-check-circle"></i> Wi-Fi 5G Illimité</li>
                    <li><i class="fas fa-check-circle"></i> Prises USB & 220V</li>
                    <li><i class="fas fa-check-circle"></i> Boissons & Snacks Offerts</li>
                </ul>
                <div class="exp-footer">
                    <span>À partir de</span>
                    <span class="price">140 DH</span>
                </div>
            </div>

            <div class="exp-card standard">
                <h3>CONFORT</h3>
                <ul class="exp-list blue-icons">
                    <li><i class="fas fa-check-circle"></i> Sièges Ergonomiques</li>
                    <li><i class="fas fa-check-circle"></i> Climatisation Intelligente</li>
                    <li><i class="fas fa-check-circle"></i> Wi-Fi Gratuit</li>
                </ul>
                <div class="exp-footer">
                    <span>À partir de</span>
                    <span class="price">85 DH</span>
                </div>
            </div>

            <div class="exp-card first-class">
                <h3>FIRST CLASS</h3>
                <ul class="exp-list yellow-icons">
                    <li><i class="fas fa-star"></i> Seulement 30 Sièges (Espace Max)</li>
                    <li><i class="fas fa-star"></i> Tablette Individuelle</li>
                    <li><i class="fas fa-star"></i> Assistant de Voyage dédié</li>
                </ul>
                <div class="exp-footer">
                    <span>À partir de</span>
                    <span class="price yellow">220 DH</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* --- SECTION EXPÉRIENCE --- */
.experience {
    padding: 100px 5%;
    background-color: #fcfcfc;
    text-align: center;
}

.experience-header h2 {
    font-size: 2.5rem;
    color: #003366;
    font-weight: 800;
    font-style: italic;
}

.experience-header h2 span { color: #ffcc00; }

.experience-header p {
    color: #666;
    margin-bottom: 50px;
}

.experience-grid {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
}

/* Base des cartes */
.exp-card {
    background: white;
    flex: 1;
    min-width: 300px;
    padding: 40px 30px;
    border-radius: 25px;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    text-align: left;
    transition: 0.3s;
    overflow: hidden;
}

/* Style Spécifique Business (Bordure Jaune) */
.exp-card.business {
    border: 3px solid #ffcc00;
}

/* Style Spécifique First Class (Fond Bleu) */
.exp-card.first-class {
    background-color: #1a3a8a;
    color: white;
}

/* Titres dans les cartes */
.exp-card h3 {
    font-size: 1.5rem;
    font-weight: 900;
    margin-bottom: 25px;
    font-style: italic;
}

/* Listes */
.exp-list {
    list-style: none;
    margin-bottom: 40px;
}

.exp-list li {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
    font-size: 0.95rem;
}

.exp-list i { color: #2ecc71; font-size: 1.2rem; } /* Vert par défaut */
.blue-icons i { color: #3498db; }
.yellow-icons i { color: #ffcc00; }

/* Footer des cartes (Prix) */
.exp-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.first-class .exp-footer { border-color: rgba(255,255,255,0.1); }

.exp-footer span { font-size: 0.9rem; color: #888; }
.first-class .exp-footer span { color: #aaa; }

.price {
    font-size: 1.8rem;
    font-weight: 800;
    color: #003366;
}

.price.yellow { color: #ffcc00; }

/* Ruban "Populaire" */
.ribbon {
    position: absolute;
    top: 20px;
    right: -35px;
    background: #ffcc00;
    color: #003366;
    padding: 5px 40px;
    transform: rotate(45deg);
    font-size: 0.7rem;
    font-weight: 900;
}

/* Responsive */
@media (max-width: 768px) {
    .exp-card { min-width: 100%; }
}
</style>