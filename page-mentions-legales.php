<?php
/* Template Name: Mentions Légales */
get_header(); ?>

<style>
.legal-container {
    max-width: 900px;
    margin: auto;
    padding: 3rem 1rem;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}

.legal-header {
    text-align: center;
    margin-bottom: 3rem;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
    padding: 3rem 2rem;
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-lg);
}

.legal-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 1rem;
}

.legal-subtitle {
    font-size: 1.1rem;
    color: var(--gray-600);
    line-height: 1.6;
}

.legal-content {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-xl);
    padding: 3rem;
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.legal-section {
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.legal-section:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.legal-section h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.legal-section h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--gray-700);
    margin: 1.5rem 0 1rem 0;
}

.legal-section p {
    color: var(--gray-700);
    line-height: 1.7;
    margin-bottom: 1rem;
}

.legal-section ul,
.legal-section ol {
    color: var(--gray-700);
    line-height: 1.6;
    margin: 1rem 0;
    padding-left: 2rem;
}

.legal-section li {
    margin-bottom: 0.5rem;
}

.contact-info {
    background: rgba(249, 115, 22, 0.05);
    padding: 1.5rem;
    border-radius: var(--radius-md);
    border: 1px solid rgba(249, 115, 22, 0.1);
    margin: 1.5rem 0;
}

.contact-info h4 {
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 1rem;
}

.contact-info p {
    margin-bottom: 0.5rem;
}

.legal-date {
    text-align: center;
    margin-top: 2rem;
    padding: 1rem;
    background: var(--gray-50);
    border-radius: var(--radius-md);
    font-size: 0.9rem;
    color: var(--gray-600);
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
    margin-bottom: 2rem;
    transition: all var(--transition-fast);
}

.back-link:hover {
    color: var(--primary-dark);
    transform: translateX(-4px);
}
</style>

<div class="legal-container">
    <a href="<?php echo home_url('/'); ?>" class="back-link">
        ← Retour à l'accueil
    </a>

    <header class="legal-header">
        <h1 class="legal-title">📄 Mentions Légales</h1>
        <p class="legal-subtitle">
            Informations légales relatives au site internet Oi Immo et à ses services
        </p>
    </header>

    <div class="legal-content">
        
        <section class="legal-section">
            <h2>🏢 Identification de l'éditeur</h2>
            <div class="contact-info">
                <h4>Oi Immo</h4>
                <p><strong>Forme juridique :</strong> SAS (Société par Actions Simplifiée)</p>
                <p><strong>Capital social :</strong> 10 000 €</p>
                <p><strong>Siège social :</strong> [Adresse à compléter]</p>
                <p><strong>RCS :</strong> [Numéro RCS à compléter]</p>
                <p><strong>SIRET :</strong> [Numéro SIRET à compléter]</p>
                <p><strong>TVA intracommunautaire :</strong> [Numéro TVA à compléter]</p>
                <p><strong>Carte professionnelle :</strong> [Numéro carte prof à compléter]</p>
                <p><strong>Garantie financière :</strong> [Assurance à compléter]</p>
            </div>
            
            <h3>Contact</h3>
            <p><strong>Téléphone :</strong> [Numéro à compléter]</p>
            <p><strong>Email :</strong> contact@oi-immo.fr</p>
            <p><strong>Site web :</strong> https://oi-immo.fr</p>
        </section>

        <section class="legal-section">
            <h2>🔧 Directeur de publication</h2>
            <p>Le directeur de la publication est [Nom du dirigeant], en qualité de [Fonction].</p>
        </section>

        <section class="legal-section">
            <h2>🌐 Hébergeur</h2>
            <div class="contact-info">
                <h4>Informations hébergeur</h4>
                <p><strong>Nom :</strong> [Nom hébergeur]</p>
                <p><strong>Adresse :</strong> [Adresse hébergeur]</p>
                <p><strong>Téléphone :</strong> [Téléphone hébergeur]</p>
            </div>
        </section>

        <section class="legal-section">
            <h2>💻 Développement technique</h2>
            <div class="contact-info">
                <h4>Oi Technologie</h4>
                <p>Conception, développement et maintenance du site internet</p>
                <p><strong>Contact technique :</strong> tech@oi-technologie.fr</p>
            </div>
        </section>

        <section class="legal-section">
            <h2>📊 Collecte de données personnelles</h2>
            <h3>Données collectées</h3>
            <p>Dans le cadre de l'utilisation de notre site, nous pouvons être amenés à collecter les données suivantes :</p>
            <ul>
                <li>Informations d'identification (nom, prénom, email, téléphone)</li>
                <li>Informations sur vos projets immobiliers</li>
                <li>Données de navigation (cookies, adresse IP)</li>
                <li>Préférences de recherche</li>
            </ul>

            <h3>Finalités</h3>
            <p>Ces données sont collectées pour :</p>
            <ul>
                <li>Traiter vos demandes d'estimation et de contact</li>
                <li>Vous proposer des biens correspondant à vos critères</li>
                <li>Améliorer nos services et l'expérience utilisateur</li>
                <li>Respecter nos obligations légales</li>
            </ul>

            <h3>Vos droits</h3>
            <p>Conformément au RGPD, vous disposez des droits suivants :</p>
            <ul>
                <li>Droit d'accès, de rectification et de suppression</li>
                <li>Droit à la portabilité des données</li>
                <li>Droit d'opposition et de limitation du traitement</li>
                <li>Droit de définir des directives post-mortem</li>
            </ul>
            <p>Pour exercer ces droits, contactez-nous à : <strong>rgpd@oi-immo.fr</strong></p>
        </section>

        <section class="legal-section">
            <h2>🍪 Cookies</h2>
            <p>Notre site utilise des cookies pour :</p>
            <ul>
                <li><strong>Cookies essentiels :</strong> Fonctionnement du site (connexion, panier)</li>
                <li><strong>Cookies analytiques :</strong> Mesure d'audience anonyme</li>
                <li><strong>Cookies de personnalisation :</strong> Préférences de recherche</li>
            </ul>
            <p>Vous pouvez configurer vos préférences cookies via le bandeau présent sur notre site ou dans les paramètres de votre navigateur.</p>
        </section>

        <section class="legal-section">
            <h2>📸 Propriété intellectuelle</h2>
            <p>L'ensemble des éléments du site Oi Immo (textes, images, vidéos, logos, etc.) sont protégés par le droit d'auteur. Toute reproduction, représentation, modification ou exploitation est interdite sans autorisation préalable.</p>
            
            <h3>Photos des biens</h3>
            <p>Les photographies des biens immobiliers sont utilisées avec l'autorisation des propriétaires et sont protégées par le droit à l'image.</p>
        </section>

        <section class="legal-section">
            <h2>⚖️ Responsabilité</h2>
            <h3>Informations</h3>
            <p>Nous nous efforçons de maintenir des informations exactes et à jour. Cependant, nous ne garantissons pas l'exactitude, la complétude ou l'actualité des informations diffusées.</p>
            
            <h3>Liens externes</h3>
            <p>Notre site peut contenir des liens vers des sites tiers. Nous n'assumons aucune responsabilité quant au contenu de ces sites externes.</p>
            
            <h3>Disponibilité</h3>
            <p>Nous nous efforçons d'assurer la continuité du service mais ne garantissons pas un accès ininterrompu au site.</p>
        </section>

        <section class="legal-section">
            <h2>🏛️ Réglementation professionnelle</h2>
            <h3>Activité immobilière</h3>
            <p>Oi Immo exerce son activité dans le respect de :</p>
            <ul>
                <li>La loi Hoguet du 2 janvier 1970</li>
                <li>Le décret n°72-678 du 20 juillet 1972</li>
                <li>Le Code de la construction et de l'habitation</li>
                <li>Le Code de la consommation</li>
            </ul>
            
            <h3>Médiation</h3>
            <p>En cas de litige, vous pouvez saisir le médiateur de la consommation compétent :</p>
            <div class="contact-info">
                <h4>Médiation FNAIM</h4>
                <p><strong>Adresse :</strong> 129 rue du Faubourg Saint-Honoré - 75008 Paris</p>
                <p><strong>Site :</strong> www.fnaim-mediation.fr</p>
            </div>
        </section>

        <section class="legal-section">
            <h2>⚖️ Droit applicable</h2>
            <p>Les présentes mentions légales sont régies par le droit français. En cas de litige, les tribunaux français seront seuls compétents.</p>
        </section>

        <div class="legal-date">
            <p><strong>Dernière mise à jour :</strong> <?php echo date('d/m/Y'); ?></p>
            <p>Ces mentions légales peuvent être modifiées à tout moment. Nous vous invitons à les consulter régulièrement.</p>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>