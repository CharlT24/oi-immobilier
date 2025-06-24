<?php get_header(); ?>

<style>
.archive-container {
    max-width: 1200px;
    margin: auto;
    padding: 3rem 1rem;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}

.archive-header {
    text-align: center;
    margin-bottom: 3rem;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
    padding: 3rem 2rem;
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-lg);
}

.archive-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 1rem;
    animation: fadeInUp 0.8s ease-out;
}

.archive-description {
    font-size: 1.1rem;
    color: var(--gray-600);
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto 1.5rem;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.archive-count {
    background: rgba(249, 115, 22, 0.1);
    color: var(--primary);
    padding: 0.5rem 1rem;
    border-radius: var(--radius-full);
    font-weight: 600;
    display: inline-block;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.filter-bar {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
}

.filter-controls {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
}

.filter-select {
    padding: 0.7rem 1rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    background: white;
    font-size: 0.95rem;
    transition: all var(--transition-fast);
    min-width: 150px;
}

.filter-select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
}

.search-box {
    flex: 1;
    min-width: 200px;
    padding: 0.7rem 1rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    transition: all var(--transition-fast);
}

.search-box:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
}

.view-toggle {
    display: flex;
    background: var(--gray-100);
    border-radius: var(--radius-md);
    padding: 0.3rem;
}

.view-btn {
    padding: 0.5rem 1rem;
    border: none;
    background: transparent;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all var(--transition-fast);
    font-weight: 500;
}

.view-btn.active {
    background: var(--primary);
    color: white;
    box-shadow: var(--shadow-sm);
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.posts-grid.list-view {
    grid-template-columns: 1fr;
}

.post-card {
    background: var(--surface);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-decoration: none;
    color: inherit;
    display: block;
    animation: fadeInUp 0.6s ease-out;
}

.post-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(249, 115, 22, 0.2);
}

.list-view .post-card {
    display: flex;
    align-items: center;
    gap: 2rem;
    padding: 1.5rem;
}

.post-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform var(--transition-normal);
}

.list-view .post-image {
    width: 200px;
    height: 120px;
    border-radius: var(--radius-md);
    flex-shrink: 0;
}

.post-card:hover .post-image {
    transform: scale(1.05);
}

.post-content {
    padding: 1.5rem;
}

.list-view .post-content {
    padding: 0;
    flex: 1;
}

.post-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.8rem;
    font-size: 0.85rem;
    color: var(--gray-500);
}

.post-category {
    background: rgba(249, 115, 22, 0.1);
    color: var(--primary);
    padding: 0.25rem 0.6rem;
    border-radius: var(--radius-full);
    font-weight: 600;
    font-size: 0.75rem;
}

.post-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 0.8rem;
    line-height: 1.3;
}

.list-view .post-title {
    font-size: 1.4rem;
    margin-bottom: 0.5rem;
}

.post-excerpt {
    color: var(--gray-600);
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.85rem;
    color: var(--gray-500);
}

.read-more {
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
}

.read-more:hover {
    color: var(--primary-dark);
}

.no-posts {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--surface-elevated);
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.no-posts h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 1rem;
}

.no-posts p {
    color: var(--gray-600);
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

.pagination-container {
    text-align: center;
    margin-top: 3rem;
}

.pagination-wrapper {
    display: inline-flex;
    gap: 0.5rem;
    background: var(--surface-elevated);
    padding: 1rem;
    border-radius: var(--radius-lg);
    backdrop-filter: blur(20px);
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.2);
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
    .archive-header {
        padding: 2rem 1rem;
    }
    
    .filter-bar {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-controls {
        justify-content: center;
    }
    
    .list-view .post-card {
        flex-direction: column;
        text-align: center;
    }
    
    .list-view .post-image {
        width: 100%;
        height: 200px;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="archive-container">
    <!-- En-tête d'archive -->
    <header class="archive-header">
        <h1 class="archive-title">
            <?php
            if (is_category()) {
                echo '📂 ' . single_cat_title('', false);
            } elseif (is_tag()) {
                echo '🏷️ ' . single_tag_title('', false);
            } elseif (is_author()) {
                echo '👤 ' . get_the_author();
            } elseif (is_date()) {
                if (is_year()) {
                    echo '📅 Archives ' . get_the_date('Y');
                } elseif (is_month()) {
                    echo '📅 Archives ' . get_the_date('F Y');
                } else {
                    echo '📅 Archives ' . get_the_date();
                }
            } else {
                echo '📄 Archives';
            }
            ?>
        </h1>
        
        <?php if (term_description()) : ?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php endif; ?>
        
        <span class="archive-count">
            <?php
            global $wp_query;
            echo $wp_query->found_posts . ' article' . ($wp_query->found_posts > 1 ? 's' : '');
            ?>
        </span>
    </header>

    <!-- Barre de filtres -->
    <div class="filter-bar">
        <div class="filter-controls">
            <select class="filter-select" id="orderby">
                <option value="date">Plus récents</option>
                <option value="title">Titre A-Z</option>
                <option value="comment_count">Plus commentés</option>
            </select>
            
            <input type="text" class="search-box" placeholder="🔍 Rechercher dans les articles..." id="searchBox">
        </div>
        
        <div class="view-toggle">
            <button class="view-btn active" id="gridView">🔲 Grille</button>
            <button class="view-btn" id="listView">📋 Liste</button>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <div class="posts-grid" id="postsContainer">
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large', array('class' => 'post-image')); ?>
                    <?php else : ?>
                        <div class="post-image" style="background: linear-gradient(135deg, #f97316, #ea580c); display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                            📄
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <div class="post-meta">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <span class="post-category"><?php echo $categories[0]->name; ?></span>
                            <?php endif; ?>
                            <span><?php echo get_the_date('j F Y'); ?></span>
                            <span><?php echo get_comments_number(); ?> commentaire<?php echo get_comments_number() > 1 ? 's' : ''; ?></span>
                        </div>
                        
                        <h2 class="post-title"><?php the_title(); ?></h2>
                        
                        <div class="post-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        
                        <div class="post-footer">
                            <span>Par <?php the_author(); ?></span>
                            <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite →</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <?php
        $pagination = paginate_links(array(
            'total' => $wp_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'format' => '?paged=%#%',
            'show_all' => false,
            'end_size' => 1,
            'mid_size' => 2,
            'prev_next' => true,
            'prev_text' => '← Précédent',
            'next_text' => 'Suivant →',
            'type' => 'array'
        ));

        if ($pagination) : ?>
            <nav class="pagination-container">
                <div class="pagination-wrapper">
                    <?php foreach ($pagination as $link) : ?>
                        <?php echo $link; ?>
                    <?php endforeach; ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php else : ?>
        <div class="no-posts">
            <h2>😕 Aucun article trouvé</h2>
            <p>Il n'y a actuellement aucun article dans cette section.</p>
            <a href="<?php echo home_url('/'); ?>" class="btn-primary" style="display: inline-block; text-decoration: none;">
                🏠 Retour à l'accueil
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- JavaScript pour les fonctionnalités interactives -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const postsContainer = document.getElementById('postsContainer');
    const gridViewBtn = document.getElementById('gridView');
    const listViewBtn = document.getElementById('listView');
    const searchBox = document.getElementById('searchBox');
    const orderSelect = document.getElementById('orderby');

    // Toggle entre vue grille et liste
    if (gridViewBtn && listViewBtn) {
        gridViewBtn.addEventListener('click', function() {
            postsContainer.classList.remove('list-view');
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
            localStorage.setItem('archiveView', 'grid');
        });

        listViewBtn.addEventListener('click', function() {
            postsContainer.classList.add('list-view');
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            localStorage.setItem('archiveView', 'list');
        });

        // Restaurer la vue préférée
        const savedView = localStorage.getItem('archiveView');
        if (savedView === 'list') {
            listViewBtn.click();
        }
    }

    // Recherche en temps réel (simulation)
    if (searchBox) {
        let searchTimeout;
        searchBox.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.toLowerCase();
            
            searchTimeout = setTimeout(function() {
                const posts = document.querySelectorAll('.post-card');
                posts.forEach(function(post) {
                    const title = post.querySelector('.post-title').textContent.toLowerCase();
                    const excerpt = post.querySelector('.post-excerpt').textContent.toLowerCase();
                    
                    if (title.includes(query) || excerpt.includes(query) || query === '') {
                        post.style.display = 'block';
                        post.style.animation = 'fadeInUp 0.4s ease-out';
                    } else {
                        post.style.display = 'none';
                    }
                });
            }, 300);
        });
    }

    // Animation d'apparition au scroll
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

    // Observer les cartes d'articles
    const postCards = document.querySelectorAll('.post-card');
    postCards.forEach(function(card, index) {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `opacity 0.6s ease-out ${index * 0.1}s, transform 0.6s ease-out ${index * 0.1}s`;
        observer.observe(card);
    });
});
</script>

<!-- Styles pour la pagination -->
<style>
.page-numbers {
    padding: 0.6rem 1rem !important;
    border-radius: var(--radius-md) !important;
    text-decoration: none !important;
    color: var(--gray-600) !important;
    transition: all var(--transition-fast) !important;
    border: 1px solid transparent !important;
    font-weight: 500 !important;
}

.page-numbers:hover {
    background: rgba(249, 115, 22, 0.1) !important;
    color: var(--primary) !important;
    border-color: rgba(249, 115, 22, 0.2) !important;
    transform: translateY(-1px) !important;
}

.page-numbers.current {
    background: var(--primary) !important;
    color: white !important;
    font-weight: 600 !important;
    box-shadow: var(--shadow-sm) !important;
}

.page-numbers.dots {
    border: none !important;
    background: none !important;
    color: var(--gray-400) !important;
}
</style>

<?php get_footer(); ?>