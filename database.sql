-- Création de la base de données
CREATE DATABASE IF NOT EXISTS satas_db;
USE satas_db;

-- Table des offres
CREATE TABLE IF NOT EXISTS offres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    ville_depart VARCHAR(100),
    ville_arrivee VARCHAR(100),
    prix_original DECIMAL(10, 2),
    prix_promo DECIMAL(10, 2),
    categorie VARCHAR(50), -- 'promo', 'flash', 'famille', 'eco'
    image_path VARCHAR(255),
    badge_text VARCHAR(50), -- Texte du badge (ex: "-25%", "Vente Flash")
    badge_class VARCHAR(50), -- Classe CSS du badge (ex: "promo", "flash")
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO offres (titre, description, ville_depart, ville_arrivee, prix_original, prix_promo, categorie, image_path, badge_text, badge_class) VALUES
('Spécial Été', 'Profitez du soleil d''Agadir avec notre offre estivale. Confort premium garanti.', 'Casablanca', 'Agadir', 200.00, 150.00, 'promo', 'img/agadir_beach_1769370316461.png', '-25%', 'promo'),
('Week-end Découverte', 'Partez à la découverte du nord. Wifi gratuit et sièges inclinables.', 'Marrakech', 'Tanger', 250.00, 199.00, 'flash', 'img/tanger_coast_1769370356811.png', 'Vente Flash', 'flash'),
('Pack Famille', 'Réduction spéciale pour les groupes de 4 personnes et plus. Bagages inclus.', 'Rabat', 'Fès', 120.00, 90.00, 'famille', 'img/casablanca_mosque_1769370329572.png', 'Famille', 'famille'),
('Aventure Sud', 'Explorez les portes du désert à petit prix sur nos lignes régulières.', 'Ouarzazate', 'Zagora', 80.00, 65.00, 'eco', 'img/marrakech_plaza_1769370342531.png', 'Eco', 'eco');

-- Table des Destinations Populaires
CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville VARCHAR(100) NOT NULL,
    prix_depart DECIMAL(10, 2) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO destinations (ville, prix_depart, image_path) VALUES
('Agadir', 120.00, 'img/agadir_beach_1769370316461.png'),
('Casablanca', 90.00, 'img/casablanca_mosque_1769370329572.png'),
('Marrakech', 80.00, 'img/marrakech_plaza_1769370342531.png'),
('Tanger', 150.00, 'img/tanger_coast_1769370356811.png');

-- Table des Réservations
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    offer_id INT,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    places INT DEFAULT 1,
    status VARCHAR(50) DEFAULT 'En attente', -- 'En attente', 'Confirmé', 'Annulé'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (offer_id) REFERENCES offres(id)
);

-- Table des Messages (Contact)
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sujet VARCHAR(255),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des Horaires
CREATE TABLE IF NOT EXISTS horaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville_depart VARCHAR(100) NOT NULL,
    ville_arrivee VARCHAR(100) NOT NULL,
    heure_depart TIME NOT NULL,
    heure_arrivee TIME NOT NULL,
    duree VARCHAR(20),
    prix DECIMAL(10, 2) NOT NULL,
    type_autocar VARCHAR(50) DEFAULT 'Premium',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO horaires (ville_depart, ville_arrivee, heure_depart, heure_arrivee, duree, prix, type_autocar) VALUES
('Casablanca', 'Agadir', '08:00:00', '13:30:00', '5h30', 220.00, 'Premium'),
('Casablanca', 'Agadir', '14:30:00', '20:00:00', '5h30', 220.00, 'Premium'),
('Casablanca', 'Agadir', '22:00:00', '03:30:00', '5h30', 200.00, 'Standard'),
('Marrakech', 'Tanger', '07:30:00', '15:30:00', '8h00', 300.00, 'Premium'),
('Marrakech', 'Tanger', '21:00:00', '05:00:00', '8h00', 280.00, 'Standard'),
('Agadir', 'Casablanca', '09:00:00', '14:30:00', '5h30', 220.00, 'Premium'),
('Tanger', 'Marrakech', '08:00:00', '16:00:00', '8h00', 300.00, 'Premium');

-- Table des Agences
CREATE TABLE IF NOT EXISTS agences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville VARCHAR(100) NOT NULL,
    nom_agence VARCHAR(255) NOT NULL,
    adresse TEXT NOT NULL,
    telephone VARCHAR(20),
    horaires_ouverture VARCHAR(100) DEFAULT '08:00 - 20:00',
    localisation_url VARCHAR(255) DEFAULT '#',
    image_path VARCHAR(255) DEFAULT 'img/agency_storefront_1769370382738.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO agences (ville, nom_agence, adresse, telephone, image_path) VALUES
('Casablanca', 'Gare Routière Ouled Ziane', 'Rue des Oudayas, Casablanca', '0522-123456', 'img/agency_storefront_1769370382738.png'),
('Agadir', 'Agence Massira', 'Av. Hassan II, Agadir', '0528-654321', 'img/agency_storefront_1769370382738.png'),
('Marrakech', 'Gare Bab Doukkala', 'Bd. 11 Janvier, Marrakech', '0524-987654', 'img/agency_storefront_1769370382738.png'),
('Tanger', 'Agence Gare', 'Place la Ligue Arabe, Tanger', '0539-123789', 'img/agency_storefront_1769370382738.png'),
('Rabat', 'Agence Kamra', 'Av. Hassan II, Rabat', '0537-456789', 'img/agency_storefront_1769370382738.png');
