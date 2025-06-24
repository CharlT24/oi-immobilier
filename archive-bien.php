<?php
// 📄 archive-bien.php — Page de listing des biens avec moteur de recherche Apple Style
get_header();
?>

<style>
  /* Styles Apple pour la page biens */
  .biens-header {
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.08) 0%, rgba(59, 130, 246, 0.04) 100%);
    padding: 4rem 1rem 2rem;
    text-align: center;
  }

  .search-container {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 1rem;
  }

  .search-bar {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-xl);
    padding: 2rem;
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    margin-bottom: 3rem;
    animation: fadeInUp 0.6s ease-out;
  }

  .search-form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    align-items: end;
  }

  .search-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .search-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.25rem;
  }

  .search-input, .search-select {
    padding: 0.875rem 1.25rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    transition: all var(--transition-fast);
    background: white;
    font-family: inherit;
  }

  .search-input:focus, .search-select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    transform: translateY(-1px);
  }

  .search-input::placeholder {
    color: var(--gray-400);
  }

  .search-btn {
    background: var(--primary);
    color: white;
    border: none;
    border-radius: var(--radius-md);
    padding: 0.875rem 2rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-fast);
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }

  .search-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
  }

  .clear-btn {
    background: var(--gray-100);
    color: var(--gray-700);
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    padding: 0.875rem 1.5rem;
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-fast);
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }

  .clear-btn:hover {
    background: var(--gray-200);
    transform: translateY(-1px);
    text-decoration: none;
    color: var(--gray-700);
  }

  .results-header {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .results-count {
    font-size: 1.1rem;
    color: var(--gray-600);
  }

  .sort-select {
    padding: 0.5rem 1rem;
    border: 1px solid var(--gray-300);
    border-radius: var(--radius-sm);
    background: white;
    font-size: 0.9rem;
  }

  .biens-grid {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
  }

  .bien-card {
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
    position: relative;
    animation: fadeInUp 0.6s ease-out;
  }

  .bien-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-xl);
    text-decoration: none;
    color: inherit;
  }

  .bien-image-container {
    position: relative;
    overflow: hidden;
  }

  .bien-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform var(--transition-normal);
  }

  .bien-card:hover .bien-img {
    transform: scale(1.1);
  }

  .bien-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
  }

  .bien-content {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
  }

  .bien-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--gray-800);
    margin: 0;
    line-height: 1.3;
  }

  .bien-location {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: var(--gray-600);
  }

  .bien-features {
    display: flex;
    gap: 1rem;
    font-size: 0.85rem;
    color: var(--gray-600);
    flex-wrap: wrap;
  }

  .bien-feature {
    display: flex;
    align-items: center;
    gap: 0.25rem;
  }

  .bien-prix {
    font-weight: 700;
    font-size: 1.2rem;
    color: var(--primary);
    margin-top: 0.5rem;
  }

  .no-results {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--gray-600);
  }

  .no-results-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
  }

  .loading-skeleton {
    background: linear-gradient(
      90deg,
      var(--gray-200) 0px,
      var(--gray-100) 40px,
      var(--gray-200) 80px
    );
    background-size: 200px;
    animation: shimmer 1.2s ease-in-out infinite;
  }

  @keyframes shimmer {
    0% {
      background-position: -200px 0;
    }
    100% {
      background-position: calc(200px + 100%) 0;
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Responsive */
  @media (max-width: 768px) {
    .search-form {
      grid-template-columns: 1fr;
    }
    
    .biens-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
      padding: 0 1rem;
    }
    
    .results-header {
      flex-direction: column;
      align-items: flex-start;
    }
    
    .search-bar {
      padding: 1.5rem;
    }
  }

  @media (max-width: 480px) {
    .biens-header {
      padding: 2rem 1rem 1rem;
    }
    
    .bien-content {
      padding: 1rem;
    }
  }
</style>

<div style="font-family: -apple-system, BlinkMacSystemFont, sans-serif; min-height: 100vh;">

  <!-- Header de la page -->
  <div class="biens-header">
    <h1 class="text-display" style="margin-bottom: 1rem; color: var(--gray-800);">
      🏡 Nos biens disponibles
    </h1>
    <p style="font-size: 1.1rem; color: var(--gray-600); max-width: 600px; margin: 0 auto;">
      Découvrez notre sélection de biens immobiliers soigneusement choisis pour vous
    </p>
  </div>

  <!-- Barre de recherche avancée -->
  <div class="search-container">
    <form class="search-bar" method="GET" id="searchForm">
      <div class="search-form">
        <div class="search-group">
          <label class="search-label" for="ville">📍 Ville</label>
          <input type="text" 
                 id="ville"
                 name="ville" 
                 class="search-input"
                 placeholder="Ex: Bordeaux, Mérignac..." 
                 value="<?php echo esc_attr($_GET['ville'] ?? ''); ?>" />
        </div>

        <div class="search-group">
          <label class="search-label" for="rayon">🎯 Rayon</label>
          <select name="rayon" id="rayon" class="search-select">
            <option value="">Tous rayons</option>
            <option value="5" <?php selected($_GET['rayon'] ?? '', '5'); ?>>5 km</option>
            <option value="10" <?php selected($_GET['rayon'] ?? '', '10'); ?>>10 km</option>
            <option value="20" <?php selected($_GET['rayon'] ?? '', '20'); ?>>20 km</option>
            <option value="50" <?php selected($_GET['rayon'] ?? '', '50'); ?>>50 km</option>
          </select>
        </div>

        <div class="search-group">
          <label class="search-label" for="type_bien">🏠 Type</label>
          <select name="type_bien" id="type_bien" class="search-select">
            <option value="">Tous types</option>
            <option value="Maison" <?php selected($_GET['type_bien'] ?? '', 'Maison'); ?>>Maison</option>
            <option value="Appartement" <?php selected($_GET['type_bien'] ?? '', 'Appartement'); ?>>Appartement</option>
            <option value="Terrain" <?php selected($_GET['type_bien'] ?? '', 'Terrain'); ?>>Terrain</option>
            <option value="Local" <?php selected($_GET['type_bien'] ?? '', 'Local'); ?>>Local</option>
            <option value="Immeuble" <?php selected($_GET['type_bien'] ?? '', 'Immeuble'); ?>>Immeuble</option>
          </select>
        </div>

        <div class="search-group">
          <label class="search-label" for="surface_min">📐 Surface min</label>
          <input type="number" 
                 id="surface_min"
                 name="surface_min" 
                 class="search-input"
                 placeholder="m²" 
                 value="<?php echo esc_attr($_GET['surface_min'] ?? ''); ?>" />
        </div>

        <div class="search-group">
          <label class="search-label" for="prix_min">💰 Prix min</label>
          <input type="number" 
                 id="prix_min"
                 name="prix_min" 
                 class="search-input"
                 placeholder="€" 
                 value="<?php echo esc_attr($_GET['prix_min'] ?? ''); ?>" />
        </div>

        <div class="search-group">
          <label class="search-label" for="prix_max">💰 Prix max</label>
          <input type="number" 
                 id="prix_max"
                 name="prix_max" 
                 class="search-input"
                 placeholder="€" 
                 value="<?php echo esc_attr($_GET['prix_max'] ?? ''); ?>" />
        </div>

        <div class="search-group">
          <button type="submit" class="search-btn">
            🔍 Rechercher
          </button>
        </div>

        <div class="search-group">
          <a href="<?php echo get_post_type_archive_link('bien'); ?>" class="clear-btn">
            🔄 Effacer
          </a>
        </div>
      </div>
    </form>
  </div>

  <?php
  // Construction de la query avec les filtres
  $meta_query = [];
  $has_filters = false;

  if (!empty($_GET['type_bien'])) {
    $meta_query[] = [
      'key' => 'type_bien',
      'value' => sanitize_text_field($_GET['type_bien']),
      'compare' => '='
    ];
    $has_filters = true;
  }

  if (!empty($_GET['surface_min'])) {
    $meta_query[] = [
      'key' => 'surface_m2',
      'value' => (int) $_GET['surface_min'],
      'compare' => '>=',
      'type' => 'NUMERIC'
    ];
    $has_filters = true;
  }

  if (!empty($_GET['prix_min'])) {
    $meta_query[] = [
      'key' => 'prix_vente',
      'value' => (int) $_GET['prix_min'],
      'compare' => '>=',
      'type' => 'NUMERIC'
    ];
    $has_filters = true;
  }

  if (!empty($_GET['prix_max'])) {
    $meta_query[] = [
      'key' => 'prix_vente',
      'value' => (int) $_GET['prix_max'],
      'compare' => '<=',
      'type' => 'NUMERIC'
    ];
    $has_filters = true;
  }

  // Recherche par ville
  if (!empty($_GET['ville'])) {
    $meta_query[] = [
      'key' => 'ville',
      'value' => sanitize_text_field($_GET['ville']),
      'compare' => 'LIKE'
    ];
    $has_filters = true;
  }

  $biens = new WP_Query([
    'post_type' => 'bien',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => $meta_query
  ]);

  $total_results = $biens->found_posts;
  ?>

  <!-- Résultats header -->
  <div class="results-header">
    <div class="results-count">
      <?php if ($has_filters): ?>
        <strong><?php echo $total_results; ?></strong> bien<?php echo $total_results > 1 ? 's' : ''; ?> trouvé<?php echo $total_results > 1 ? 's' : ''; ?>
        <?php if (!empty($_GET['ville'])): ?>
          à <strong><?php echo esc_html($_GET['ville']); ?></strong>
        <?php endif; ?>
      <?php else: ?>
        <strong><?php echo $total_results; ?></strong> bien<?php echo $total_results > 1 ? 's' : ''; ?> disponible<?php echo $total_results > 1 ? 's' : ''; ?>
      <?php endif; ?>
    </div>
    
    <select class="sort-select" id="sortSelect">
      <option value="date-desc">Plus récents</option>
      <option value="prix-asc">Prix croissant</option>
      <option value="prix-desc">Prix décroissant</option>
      <option value="surface-desc">Surface décroissante</option>
    </select>
  </div>

  <!-- Grille des biens -->
  <div class="biens-grid" id="biensGrid">
    <?php if ($biens->have_posts()) : ?>
      <?php while ($biens->have_posts()) : $biens->the_post();
        $post_id = get_the_ID();
        $cover = get_post_meta($post_id, 'cover', true);
        $supabase_id = get_post_meta($post_id, 'supabase_id', true);
        $cover_url = $cover && $supabase_id 
          ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$supabase_id/cover.jpg" 
          : get_template_directory_uri() . '/assets/no-photo.png';
        
        $surface = get_post_meta($post_id, 'surface_m2', true);
        $prix = get_post_meta($post_id, 'prix_vente', true);
        $ville = get_post_meta($post_id, 'ville', true);
        $pieces = get_post_meta($post_id, 'nb_pieces', true);
        $chambres = get_post_meta($post_id, 'nb_chambres', true);
        $type_bien = get_post_meta($post_id, 'type_bien', true);
        $statut = get_post_meta($post_id, 'statut', true);
      ?>
      <a href="<?php the_permalink(); ?>" 
         class="bien-card" 
         data-prix="<?php echo $prix; ?>"
         data-surface="<?php echo $surface; ?>"
         data-date="<?php echo get_the_date('Y-m-d'); ?>">
        
        <div class="bien-image-container">
          <img src="<?php echo esc_url($cover_url); ?>" 
               alt="<?php the_title(); ?>" 
               class="bien-img" 
               loading="lazy"
               onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
          
          <?php if ($statut && $statut !== 'Disponible'): ?>
            <div class="bien-badge"><?php echo esc_html($statut); ?></div>
          <?php endif; ?>
        </div>
        
        <div class="bien-content">
          <h3 class="bien-title"><?php the_title(); ?></h3>
          
          <div class="bien-location">
            <span>📍</span>
            <span><?php echo esc_html($ville); ?></span>
            <?php if ($type_bien): ?>
              <span>•</span>
              <span><?php echo esc_html($type_bien); ?></span>
            <?php endif; ?>
          </div>
          
          <div class="bien-features">
            <?php if ($surface): ?>
              <div class="bien-feature">
                <span>📐</span>
                <span><?php echo esc_html($surface); ?> m²</span>
              </div>
            <?php endif; ?>
            
            <?php if ($pieces): ?>
              <div class="bien-feature">
                <span>🛋️</span>
                <span><?php echo esc_html($pieces); ?> pièce<?php echo $pieces > 1 ? 's' : ''; ?></span>
              </div>
            <?php endif; ?>
            
            <?php if ($chambres): ?>
              <div class="bien-feature">
                <span>🛏️</span>
                <span><?php echo esc_html($chambres); ?> ch.</span>
              </div>
            <?php endif; ?>
          </div>
          
          <div class="bien-prix">
            <?php echo $prix ? number_format((float)$prix, 0, ',', ' ') . ' €' : 'Prix sur demande'; ?>
          </div>
        </div>
      </a>
      <?php endwhile; ?>
    <?php else : ?>
      <div class="no-results">
        <div class="no-results-icon">🔍</div>
        <h3 style="margin-bottom: 1rem; color: var(--gray-700);">Aucun bien trouvé</h3>
        <p style="margin-bottom: 2rem; color: var(--gray-600);">
          Aucun bien ne correspond à vos critères de recherche.
        </p>
        <a href="<?php echo get_post_type_archive_link('bien'); ?>" class="btn-primary" style="text-decoration: none;">
          Voir tous les biens
        </a>
      </div>
    <?php endif; ?>
    
    <?php wp_reset_postdata(); ?>
  </div>

</div>

<script>
// Tri des résultats
document.getElementById('sortSelect').addEventListener('change', function() {
  const sortValue = this.value;
  const grid = document.getElementById('biensGrid');
  const cards = Array.from(grid.children);
  
  cards.sort((a, b) => {
    switch(sortValue) {
      case 'prix-asc':
        return parseFloat(a.dataset.prix || 0) - parseFloat(b.dataset.prix || 0);
      case 'prix-desc':
        return parseFloat(b.dataset.prix || 0) - parseFloat(a.dataset.prix || 0);
      case 'surface-desc':
        return parseFloat(b.dataset.surface || 0) - parseFloat(a.dataset.surface || 0);
      case 'date-desc':
      default:
        return new Date(b.dataset.date) - new Date(a.dataset.date);
    }
  });
  
  // Réorganiser les éléments
  cards.forEach(card => grid.appendChild(card));
});

// Animation au scroll
function animateCardsOnScroll() {
  const cards = document.querySelectorAll('.bien-card');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });
  
  cards.forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = `opacity 0.6s ease-out ${index * 0.1}s, transform 0.6s ease-out ${index * 0.1}s`;
    observer.observe(card);
  });
}

// Validation du formulaire
document.getElementById('searchForm').addEventListener('submit', function(e) {
  const prixMin = parseInt(document.getElementById('prix_min').value || 0);
  const prixMax = parseInt(document.getElementById('prix_max').value || 0);
  
  if (prixMax > 0 && prixMin > prixMax) {
    e.preventDefault();
    alert('⚠️ Le prix minimum ne peut pas être supérieur au prix maximum.');
    return false;
  }
});

// Formatage des prix en temps réel
['prix_min', 'prix_max'].forEach(id => {
  document.getElementById(id).addEventListener('input', function() {
    let value = this.value.replace(/\s/g, '');
    if (value && !isNaN(value)) {
      // Format avec espaces pour les milliers
      this.dataset.rawValue = value;
    }
  });
});

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
  animateCardsOnScroll();
  
  // Smooth scroll vers les résultats après recherche
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.toString()) {
    setTimeout(() => {
      document.querySelector('.results-header').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }, 300);
  }
});
</script>

<?php get_footer(); ?>