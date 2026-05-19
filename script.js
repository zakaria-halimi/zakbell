const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');
const links = document.querySelectorAll('.nav-links a');

// Toggle Menu Mobile
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    // Animation simple du hamburger
    hamburger.classList.toggle('toggle');
});

// Gérer le lien Actif (Active state)
links.forEach(link => {
    link.addEventListener('click', function () {
        links.forEach(l => l.classList.remove('active'));
        this.classList.add('active');

        // Fermer le menu mobile après clic
        if (navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
        }
    });
});


document.querySelector('.search-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const btn = document.querySelector('.btn-search');
    btn.innerHTML = "Recherche...";
    btn.style.opacity = "0.7";

    // Simulation d'une recherche
    setTimeout(() => {
        alert("Recherche de trajets en cours pour " + this.depart.value + " vers " + this.destination.value);
        btn.innerHTML = "RECHERCHER";
        btn.style.opacity = "1";
    }, 1000);
});


// Animation au défilement (Scroll Reveal)
const revealCards = () => {
    const cards = document.querySelectorAll('.feature-card');
    const triggerBottom = window.innerHeight / 5 * 4;

    cards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;

        if (cardTop < triggerBottom) {
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }
    });
};

// Initialisation des styles pour l'animation
document.querySelectorAll('.feature-card').forEach(card => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s ease-out";
});

window.addEventListener('scroll', revealCards);
// Lancer une fois au chargement
revealCards();



const stats = document.querySelectorAll('.stat-item strong');
let started = false;

window.addEventListener('scroll', () => {
    const section = document.querySelector('.app-promo');
    const pos = section.getBoundingClientRect().top;
    const screen = window.innerHeight;

    if (pos < screen && !started) {
        stats.forEach(stat => {
            const target = parseFloat(stat.innerText);
            let count = 0;
            const update = () => {
                const speed = target / 50;
                if (count < target) {
                    count += speed;
                    stat.innerText = count.toFixed(stat.innerText.includes('.') ? 1 : 0) + (stat.innerText.includes('k') ? 'k+' : '');
                    setTimeout(update, 20);
                } else {
                    stat.innerText = target + (stat.innerText.includes('k') ? 'k+' : '');
                }
            };
            update();
        });
        started = true;
    }
});

// Filtrage des offres
// Filtrage des offres (Direct Execution)
const safefilterButtons = document.querySelectorAll('.filter-btn');
const safeofferCards = document.querySelectorAll('.offer-card');

if (safefilterButtons.length > 0 && safeofferCards.length > 0) {
    safefilterButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // Prevents jump to top if href="#"

            // 1. Gérer la classe 'active'
            safefilterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // 2. Récupérer la valeur du filtre
            const filterValue = btn.getAttribute('data-filter');

            // 3. Filtrer les cartes
            safeofferCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');

                // Vérifier si 'all' ou si la catégorie correspond
                if (filterValue === 'all' || cardCategory === filterValue) {
                    // Afficher
                    card.style.display = 'flex';
                    // Petit délai pour l'animation d'opacité
                    setTimeout(() => {
                        card.style.opacity = '1';
                        // card.style.transform = 'translateY(0)'; // Removed to avoid conflict with defaults
                    }, 10);
                } else {
                    // Masquer
                    card.style.display = 'none';
                    card.style.opacity = '0';
                }
            });
        });
    });
}