<?php get_header(); ?>

<style>
.search-results-container {
    max-width: 1200px;
    margin: auto;
    padding: 3rem 1rem;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}

.search-header {
    text-align: center;
    margin-bottom: 3rem;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
    padding: 2rem;
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.search-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 0.5rem;
}

.search-query {
    color: var(--primary);
    font-weight: 600;
}

.search-count {
    font-size: 1rem;
    color: var(--gray-600);
    margin-top: 0.5rem;
}

.new-search-form {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    gap: 1rem;
    align-items: center;
}

.new-search-input {
    flex: 1;
    padding: 0.8rem 1.2rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: all var(--transition-fast);
    background: white;
}

.new-search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
}

.btn-new-search {
    background: var(--primary);
    color: white;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-fast);
    box-shadow: var(--shadow-sm);
}

.btn-new-search:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.results-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.result-card {
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
}

.result-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(249, 115, 22, 0.2);
}

.result-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform var(--transition-normal);
}

.result-card:hover .result-image {
    transform: scale(1.05);
}

.result-content {
    padding: 1.5rem;
}

.result-type {
    display: inline-block;
    background: rgba(249, 115, 22, 0.1);
    color: var(--primary);
    padding: 0.3rem 0.8rem;
    border-radius: var(--radius-full);
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 0.8rem;
}

.result-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.result-excerpt {
    color: var(--gray-600);
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 0.8rem;
}

.result-meta {
    display: flex;
    gap: 1rem;
    align-items: center;
    font-size: 0.85rem;
    color: var(--gray-500);
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--surface-elevated);
    border-radius: var(--radius-xl);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.no-results h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 1rem;
}

.no-results p {
    color: var(--gray-600);
    font-size: 1.1rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.suggestions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 2rem;
}

.suggestion-link {
    background: var(--surface);
    padding: 1rem;
    border-radius: var(--radius-md);
    text-decoration: none;
    color: var(--primary);
    font-weight: 500;
    transition: all var(--transition-fast);
    border: 1px solid rgba(249, 115, 22, 0.2);
}

.suggestion-link:hover {
    background: rgba(249, 115, 22, 0.05);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .new-search-form {
        flex-direction: column;
    }
    
    .search-header {
        padding: 1.5rem 1rem;
    }
    
    .search-title {
        font-size: 1.5rem;
    }
}
</style>

<div class="search-results-container">
    <div class="search-header">
        <h1 class="search-title">
            Résultats pour "<span class="search-query"><?php echo get_search_query(); ?></span>"
        </h1>
        <p class="search-count">
            <?php
            global $wp_query;
            echo $wp_query->found_posts . ' résultat' . ($wp_query->found_posts > 1 ? 's' : '') . ' trouvé' . ($wp_query->found_posts > 1 ? 's' : '');
            ?>
        </p>
    </div>

    <!-- Nouvelle recherche -->
    <form class="new-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input 
            type="search" 
            class="new-search-input" 
            placeholder="Affiner votre recherche..." 
            value="<?php echo get_search_query(); ?>" 
            name="s"
        />
        <button type="submit" class="btn-new-search">🔍 Rechercher</button>
    </form>

    <?php if (have_posts()) : ?>
        <div class="results-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $post_type = get_post_type();
                $post_id = get_the_ID();
                
                // Configuration selon le type de post
                switch ($post_type) {
                    case 'bien':
                        $type_label = '🏡 Bien immobilier';
                        $cover = get_post_meta($post_id, 'cover', true);
                        $supabase_id = get_post_meta($post_id, 'supabase_id', true);
                        $image_url = $cover && $supabase_id 
                            ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$supabase_id/cover.jpg"
                            : get_template_directory_uri() . '/assets/no-photo.png';
                        $ville = get_post_meta($post_id, 'ville', true);
                        $surface = get_post_meta($post_id, 'surface_m2', true);
                        $prix = get_post_meta($post_id, 'prix_vente', true);
                        $meta_info = "$ville • {$surface}m² • " . number_format((float)$prix, 0, ',', ' ') . '€';
                        break;
                        
                    case 'mandataire':
                        $type_label = '👤 Mandataire';
                        $supabase_id = get_post_meta($post_id, 'supabase_id', true);
                        $image_url = $supabase_id 
                            ? get_mandataire_avatar_url($supabase_id)
                            : get_template_directory_uri() . '/assets/no-photo.png';
                        $ville = get_post_meta($post_id, 'ville', true);
                        $tel = get_post_meta($post_id, 'telephone', true);
                        $meta_info = "$ville • $tel";
                        break;
                        
                    default:
                        $type_label = '📄 Page';
                        $image_url = get_the_post_thumbnail_url($post_id, 'medium') ?: get_template_directory_uri() . '/assets/no-photo.png';
                        $meta_info = get_the_date();
                        break;
                }
                ?>
                
                <a href="<?php the_permalink(); ?>" class="result-card">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="result-image" onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
                    
                    <div class="result-content">
                        <span class="result-type"><?php echo $type_label; ?></span>
                        <h2 class="result-title"><?php the_title(); ?></h2>
                        
                        <div class="result-excerpt">
                            <?php 
                            $excerpt = get_the_excerpt();
                            echo $excerpt ? wp_trim_words($excerpt, 20) : wp_trim_words(get_the_content(), 20);
                            ?>
                        </div>
                        
                        <div class="result-meta">
                            <span><?php echo $meta_info; ?></span>
                        </div>
                    </div>
                </a>
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
            <nav style="text-align: center; margin-top: 3rem;">
                <div style="display: inline-flex; gap: 0.5rem; background: var(--surface-elevated); padding: 1rem; border-radius: var(--radius-lg); backdrop-filter: blur(20px); box-shadow: var(--shadow-md);">
                    <?php foreach ($pagination as $link) : ?>
                        <?php echo str_replace('<a', '<a style="padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; color: var(--gray-600); transition: all 0.2s;"', $link); ?>
                    <?php endforeach; ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php else : ?>
        <div class="no-results">
            <h2>😕 Aucun résultat trouvé</h2>
            <p>Votre recherche "<strong><?php echo get_search_query(); ?></strong>" n'a donné aucun résultat.</p>
            
            <div style="background: rgba(249, 115, 22, 0.05); padding: 1.5rem; border-radius: var(--radius-md); margin: 2rem 0;">
                <h3 style="color: var(--primary); margin-bottom: 1rem;">💡 Conseils pour améliorer votre recherche :</h3>
                <ul style="text-align: left; color: var(--gray-600); line-height: 1.6;">
                    <li>Vérifiez l'orthographe des mots-clés</li>
                    <li>Essayez des termes plus généraux</li>
                    <li>Utilisez des synonymes</li>
                    <li>Réduisez le nombre de mots-clés</li>
                </ul>
            </div>

            <h3 style="margin-bottom: 1rem; color: var(--gray-700);">Suggestions :</h3>
            <div class="suggestions">
                <a href="<?php echo home_url('/biens'); ?>" class="suggestion-link">🏡 Tous nos biens</a>
                <a href="<?php echo home_url('/reseau'); ?>" class="suggestion-link">👥 Notre réseau</a>
                <a href="<?php echo home_url('/nos-services'); ?>" class="suggestion-link">🛠️ Nos services</a>
                <a href="<?php echo home_url('/contact'); ?>" class="suggestion-link">✉️ Contact</a>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
/* Styles pour la pagination */
.page-numbers {
    padding: 0.5rem 1rem !important;
    border-radius: 6px !important;
    text-decoration: none !important;
    color: var(--gray-600) !important;
    transition: all 0.2s !important;
    border: 1px solid transparent !important;
}

.page-numbers:hover {
    background: rgba(249, 115, 22, 0.1) !important;
    color: var(--primary) !important;
    border-color: rgba(249, 115, 22, 0.2) !important;
}

.page-numbers.current {
    background: var(--primary) !important;
    color: white !important;
    font-weight: 600 !important;
}
</style>

<?php get_footer(); ?>