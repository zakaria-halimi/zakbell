<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Voyagez avec <br><span class="highlight">Excellence.</span></h1>
            <p>Découvrez le Maroc avec le confort, la sécurité et la ponctualité de SATAS.</p>
        </div>

        <div class="hero-image">
            <img src="img/bus_travel_header_1769370369294.png" alt="Bus SATAS Excellence">
        </div>
    </div>

    <div class="search-bar-container">
        <form class="search-form" action="offres.php" method="GET">
            <div class="input-group">
                <label>DÉPART</label>
                <select name="depart">
                    <option value="">Ville de départ</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Tanger">Tanger</option>
                </select>
            </div>

            <div class="input-group">
                <label>DESTINATION</label>
                <select name="destination">
                    <option value="">Ville d'arrivée</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Tanger">Tanger</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Casablanca">Casablanca</option>
                </select>
            </div>

            <div class="input-group">
                <label>DATE</label>
                <input type="date" name="date" placeholder="mm/dd/yyyy">
            </div>

            <button type="submit" class="btn-search">RECHERCHER</button>
        </form>
    </div>
</section>