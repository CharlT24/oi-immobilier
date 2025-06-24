<?php get_header(); ?>

<style>
.error-container {
    max-width: 800px;
    margin: auto;
    padding: 6rem 2rem;
    text-align: center;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}

.error-hero {
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
    border-radius: var(--radius-xl);
    padding: 4rem 2rem;
    margin-bottom: 3rem;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-lg);
}

.error-code {
    font-size: clamp(4rem, 8vw, 8rem);
    font-weight: 700;
    background: linear-gradient(135deg, #f97316, #ea580c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    animation: fadeInUp 0.8s ease-out;
}

.error-title {
    font-size: 2rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 1rem;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.error-message {
    font-size: 1.1rem;
    color: var(--gray-600);
    margin-bottom: 2rem;
    line-height: 1.6;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.search-container {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    padding: 2rem;
    margin: 2rem 0;
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.search-form {
    display: flex;
    gap: 1rem;
    max-width: 500px;
    margin: 0 auto;
}

.search-input {
    flex: 1;
    padding: 1rem 1.5rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: all var(--transition-fast);
    background: white;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
}

.btn-search {
    background: var(--primary);
    color: white;
    padding: 1rem 2rem;
    border: none;
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-fast);
    box-shadow: var(--shadow-sm);
}

.btn-search:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.quick-links {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
}

.quick-link {
    background: var(--surface);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: all var(--transition-normal);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-sm);
}

.quick-link:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(249, 115, 22, 0.2);
}

.quick-link h3 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.quick-link p {
    font-size: 0.9rem;
    color: var(--gray-600);
    margin: 0;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .search-form {
        flex-direction: column;
    }
    
    .error-hero {
        padding: 2rem 1rem;
    }
}
</style>

<div class="error-container">
    <div class="error-hero">
        <div class="error-code">404</div>
        <h1 class="error-title">Oups ! Page introuvable</h1>
        <p class="error-message">
            La page que vous recherchez semble avoir déménagé ou n'existe plus. 
            Mais ne vous inquiétez pas, nous pouvons vous aider à trouver ce que vous cherchez !
        </p>
    </div>

    <div class="search-container">
        <h2 style="margin-bottom: 1rem; font-size: 1.3rem; font-weight: 600;">🔍 Rechercher sur notre site</h2>
        <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input 
                type="search" 
                class="search-input" 
                placeholder="Rechercher un bien, une ville, un agent..." 
                value="<?php echo get_search_query(); ?>" 
                name="s"
                required
            />
            <button type="submit" class="btn-search">Rechercher</button>
        </form>
    </div>

    <div class="quick-links">
        <a href="<?php echo home_url('/'); ?>" class="quick-link">
            <h3>🏠 Accueil</h3>
            <p>Retour à la page principale</p>
        </a>
        
        <a href="<?php echo home_url('/biens'); ?>" class="quick-link">
            <h3>🏡 Nos Biens</h3>
            <p>Découvrir tous nos biens</p>
        </a>
        
        <a href="<?php echo home_url('/reseau'); ?>" class="quick-link">
            <h3>👥 Notre Réseau</h3>
            <p>Rencontrer nos agents</p>
        </a>
        
        <a href="<?php echo home_url('/contact'); ?>" class="quick-link">
            <h3>✉️ Contact</h3>
            <p>Nous contacter directement</p>
        </a>
    </div>

    <div style="margin-top: 3rem; padding: 2rem; background: var(--surface-blur); border-radius: var(--radius-lg); backdrop-filter: blur(20px);">
        <h3 style="margin-bottom: 1rem; color: var(--primary);">💡 Besoin d'aide ?</h3>
        <p style="color: var(--gray-600); margin-bottom: 1rem;">
            Notre équipe est là pour vous accompagner dans vos recherches immobilières.
        </p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn-primary" style="display: inline-block; text-decoration: none;">
            Nous contacter
        </a>
    </div>
</div>

<?php get_footer(); ?>