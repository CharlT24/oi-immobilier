<?php
// 📄 archive-bien.php — Page de listing des biens avec moteur de recherche
get_header();
?>

<style>
  .search-bar {
    background: #fff;
    padding: 1rem;
    margin-bottom: 2.5rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
  }
  .search-bar input,
  .search-bar select {
    padding: 0.6rem 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 0.95rem;
    flex: 1 1 180px;
  }
  .search-bar button {
    background: #f97316;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.6rem 1.4rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
  }
  .search-bar button:hover {
    background: #ea580c;
  }
  .biens-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
  }
  .bien-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s;
    text-decoration: none;
    color: inherit;
  }
  .bien-card:hover {
    transform: translateY(-5px);
  }
  .bien-img {
    width: 100%;
    height: 190px;
    object-fit: cover;
  }
  .bien-content {
    padding: 1.2rem;
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
  }
  .bien-title {
    font-size: 1.1rem;
    font-weight: 600;
  }
  .bien-ville {
    font-size: 0.95rem;
    color: #555;
  }
  .bien-prix {
    font-weight: bold;
    font-size: 1rem;
    color: #f97316;
    margin-top: 0.5rem;
  }
</style>

<div style="max-width: 1300px; margin: auto; padding: 4rem 1rem; font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
  <h1 style="font-size: 2.4rem; font-weight: bold; margin-bottom: 2rem;">🏡 Nos biens disponibles</h1>

  <!-- 🔍 Barre de recherche avancée -->
  <form class="search-bar" method="GET">
    <input type="text" name="ville" placeholder="Ville" value="<?php echo esc_attr($_GET['ville'] ?? ''); ?>" />
    <select name="rayon">
      <option value="">Rayon</option>
      <option value="5" <?php selected($_GET['rayon'] ?? '', '5'); ?>>5 km</option>
      <option value="10" <?php selected($_GET['rayon'] ?? '', '10'); ?>>10 km</option>
      <option value="20" <?php selected($_GET['rayon'] ?? '', '20'); ?>>20 km</option>
      <option value="50" <?php selected($_GET['rayon'] ?? '', '50'); ?>>50 km</option>
    </select>
    <select name="type_bien">
      <option value="">Type de bien</option>
      <option value="Maison" <?php selected($_GET['type_bien'] ?? '', 'Maison'); ?>>Maison</option>
      <option value="Appartement" <?php selected($_GET['type_bien'] ?? '', 'Appartement'); ?>>Appartement</option>
      <option value="Terrain" <?php selected($_GET['type_bien'] ?? '', 'Terrain'); ?>>Terrain</option>
      <option value="Local" <?php selected($_GET['type_bien'] ?? '', 'Local'); ?>>Local</option>
    </select>
    <input type="number" name="surface_min" placeholder="Surface min (m²)" value="<?php echo esc_attr($_GET['surface_min'] ?? ''); ?>" />
    <input type="number" name="prix_min" placeholder="Prix min" value="<?php echo esc_attr($_GET['prix_min'] ?? ''); ?>" />
    <input type="number" name="prix_max" placeholder="Prix max" value="<?php echo esc_attr($_GET['prix_max'] ?? ''); ?>" />
    <button type="submit">Rechercher</button>
  </form>

  <!-- 📌 Liste des biens -->
  <div class="biens-grid">
    <?php
    $meta_query = [];

    if (!empty($_GET['type_bien'])) {
      $meta_query[] = [
        'key' => 'type_bien',
        'value' => sanitize_text_field($_GET['type_bien']),
        'compare' => '='
      ];
    }
    if (!empty($_GET['surface_min'])) {
      $meta_query[] = [
        'key' => 'surface_m2',
        'value' => (int) $_GET['surface_min'],
        'compare' => '>=',
        'type' => 'NUMERIC'
      ];
    }
    if (!empty($_GET['prix_min'])) {
      $meta_query[] = [
        'key' => 'prix_vente',
        'value' => (int) $_GET['prix_min'],
        'compare' => '>=',
        'type' => 'NUMERIC'
      ];
    }
    if (!empty($_GET['prix_max'])) {
      $meta_query[] = [
        'key' => 'prix_vente',
        'value' => (int) $_GET['prix_max'],
        'compare' => '<=',
        'type' => 'NUMERIC'
      ];
    }

    $biens = new WP_Query([
      'post_type' => 'bien',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'DESC',
      'meta_query' => $meta_query
    ]);

    while ($biens->have_posts()) : $biens->the_post();
      $post_id = get_the_ID();
      $cover = get_post_meta($post_id, 'cover', true);
      $supabase_id = get_post_meta($post_id, 'supabase_id', true);
      $cover_url = $cover && $supabase_id ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$supabase_id/cover.jpg" : get_template_directory_uri() . '/assets/no-photo.png';
      $surface = get_post_meta($post_id, 'surface_m2', true);
      $prix = get_post_meta($post_id, 'prix_vente', true);
      $ville = get_post_meta($post_id, 'ville', true);
    ?>
    <a href="<?php the_permalink(); ?>" class="bien-card">
      <img src="<?php echo esc_url($cover_url); ?>" alt="Photo" class="bien-img" onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
      <div class="bien-content">
        <h2 class="bien-title"><?php the_title(); ?></h2>
        <p class="bien-ville"><?php echo esc_html($ville); ?> — <?php echo esc_html($surface ?: 'NC'); ?> m²</p>
        <p class="bien-prix"><?php echo $prix ? number_format((float)$prix, 0, ',', ' ') . ' €' : 'Prix sur demande'; ?></p>
      </div>
    </a>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</div>

<?php get_footer(); ?>
