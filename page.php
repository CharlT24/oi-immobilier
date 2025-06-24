<?php get_header(); ?>

<style>
.page-container {
    max-width: 1000px;
    margin: auto;
    padding: 3rem 1rem;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
    padding: 3rem 2rem;
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-lg);
}

.page-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 1rem;
    line-height: 1.2;
    animation: fadeInUp 0.8s ease-out;
}

.page-subtitle {
    font-size: 1.2rem;
    color: var(--gray-600);
    line-height: 1.5;
    max-width: 600px;
    margin: 0 auto;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.page-content {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-xl);
    padding: 3rem;
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.page-content h1,
.page-content h2,
.page-content h3,
.page-content h4,
.page-content h5,
.page-content h6 {
    color: var(--gray-800);
    font-weight: 600;
    margin: 2rem 0 1rem 0;
    line-height: 1.3;
}

.page-content h1 { font-size: 2.5rem; }
.page-content h2 { font-size: 2rem; color: var(--primary); }
.page-content h3 { font-size: 1.5rem; }
.page-content h4 { font-size: 1.25rem; }

.page-content p {
    color: var(--gray-700);
    line-height: 1.7;
    margin-bottom: 1.5rem;
    font-size: 1.05rem;
}

.page-content a {
    color: var(--primary);
    text-decoration: underline;
    transition: color var(--transition-fast);
}

.page-content a:hover {
    color: var(--primary-dark);
}

.page-content ul,
.page-content ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
    color: var(--gray-700);
}

.page-content li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.page-content blockquote {
    background: rgba(249, 115, 22, 0.05);
    border-left: 4px solid var(--primary);
    padding: 1.5rem;
    margin: 2rem 0;
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    font-style: italic;
    color: var(--gray-700);
}

.page-content img {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-md);
    margin: 2rem 0;
}

.page-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
    background: white;
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.page-content th,
.page-content td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--gray-200);
}

.page-content th {
    background: var(--gray-50);
    font-weight: 600;
    color: var(--gray-800);
}

.page-content .wp-block-button a,
.page-content .button {
    background: var(--primary);
    color: white;
    padding: 1rem 2rem;
    border-radius: var(--radius-full);
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    transition: all var(--transition-fast);
    box-shadow: var(--shadow-sm);
}

.page-content .wp-block-button a:hover,
.page-content .button:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.breadcrumbs {
    margin-bottom: 2rem;
    background: var(--surface);
    padding: 1rem 1.5rem;
    border-radius: var(--radius-md);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.breadcrumbs a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
}

.breadcrumbs span {
    color: var(--gray-500);
    margin: 0 0.5rem;
}

.page-meta {
    text-align: center;
    margin-top: 3rem;
    padding: 2rem;
    background: var(--surface-blur);
    border-radius: var(--radius-lg);
    backdrop-filter: blur(20px);
}

.page-meta .meta-item {
    display: inline-block;
    margin: 0 1rem;
    color: var(--gray-600);
    font-size: 0.9rem;
}

.page-meta .meta-item strong {
    color: var(--primary);
}

.social-share {
    margin-top: 2rem;
    text-align: center;
}

.social-share h4 {
    margin-bottom: 1rem;
    color: var(--gray-700);
}

.social-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.social-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.8rem 1.5rem;
    border-radius: var(--radius-full);
    text-decoration: none;
    font-weight: 500;
    transition: all var(--transition-fast);
    box-shadow: var(--shadow-sm);
}

.social-btn.facebook { background: #1877F2; color: white; }
.social-btn.twitter { background: #1DA1F2; color: white; }
.social-btn.linkedin { background: #0A66C2; color: white; }
.social-btn.email { background: var(--gray-700); color: white; }

.social-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
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
    .page-header {
        padding: 2rem 1rem;
    }
    
    .page-content {
        padding: 2rem 1.5rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .social-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<div class="page-container">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Breadcrumbs -->
        <nav class="breadcrumbs">
            <a href="<?php echo home_url('/'); ?>">🏠 Accueil</a>
            <span>›</span>
            <span><?php the_title(); ?></span>
        </nav>

        <!-- En-tête de page -->
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p class="page-subtitle"><?php the_excerpt(); ?></p>
            <?php endif; ?>
        </header>

        <!-- Contenu principal -->
        <article class="page-content">
            <?php
            // Affichage de l'image mise en avant si elle existe
            if (has_post_thumbnail()) : ?>
                <div style="text-align: center; margin-bottom: 2rem;">
                    <?php the_post_thumbnail('large', array(
                        'style' => 'max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);'
                    )); ?>
                </div>
            <?php endif; ?>

            <?php the_content(); ?>

            <?php
            // Pagination pour les pages avec <!--nextpage-->
            wp_link_pages(array(
                'before' => '<div style="text-align: center; margin: 2rem 0; padding: 1rem; background: var(--surface); border-radius: var(--radius-md);">',
                'after' => '</div>',
                'link_before' => '<span style="padding: 0.5rem 1rem; margin: 0 0.25rem; background: var(--primary); color: white; border-radius: var(--radius-sm); text-decoration: none;">',
                'link_after' => '</span>',
            ));
            ?>
        </article>

        <!-- Méta-informations -->
        <div class="page-meta">
            <div class="meta-item">
                <strong>Publié le :</strong> <?php echo get_the_date('j F Y'); ?>
            </div>
            <?php if (get_the_modified_time('U') !== get_the_time('U')) : ?>
                <div class="meta-item">
                    <strong>Mis à jour le :</strong> <?php echo get_the_modified_date('j F Y'); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Partage social -->
        <div class="social-share">
            <h4>💬 Partager cette page</h4>
            <div class="social-buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                   target="_blank" class="social-btn facebook">
                    📘 Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                   target="_blank" class="social-btn twitter">
                    🐦 Twitter
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                   target="_blank" class="social-btn linkedin">
                    💼 LinkedIn
                </a>
                <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" 
                   class="social-btn email">
                    ✉️ Email
                </a>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<!-- JavaScript pour améliorer l'expérience -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation au scroll pour les éléments
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observer tous les éléments du contenu
    const elementsToAnimate = document.querySelectorAll('.page-content h2, .page-content h3, .page-content p, .page-content img');
    elementsToAnimate.forEach(function(el) {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(el);
    });

    // Smooth scroll pour les liens internes
    document.querySelectorAll('a[href^="#"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Copier le lien de la page
    function copyPageLink() {
        navigator.clipboard.writeText(window.location.href).then(function() {
            // Feedback visuel
            const btn = document.querySelector('.copy-link-btn');
            if (btn) {
                const originalText = btn.textContent;
                btn.textContent = '✅ Copié !';
                btn.style.background = 'var(--success)';
                setTimeout(function() {
                    btn.textContent = originalText;
                    btn.style.background = '';
                }, 2000);
            }
        });
    }

    // Ajouter un bouton copier si nécessaire
    const socialShare = document.querySelector('.social-share .social-buttons');
    if (socialShare && navigator.clipboard) {
        const copyBtn = document.createElement('button');
        copyBtn.className = 'social-btn copy-link-btn';
        copyBtn.innerHTML = '🔗 Copier le lien';
        copyBtn.style.background = 'var(--gray-600)';
        copyBtn.style.color = 'white';
        copyBtn.style.border = 'none';
        copyBtn.style.cursor = 'pointer';
        copyBtn.onclick = copyPageLink;
        socialShare.appendChild(copyBtn);
    }
});
</script>

<?php get_footer(); ?>