<?php
/*
Template Name: Réseau
*/
get_header();
?>

<style>
  .reseau-wrapper {
    max-width: 1100px;
    margin: auto;
    padding: 3rem 1rem;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  }
  .search-input {
    width: 100%;
    max-width: 400px;
    margin: 0 auto 2rem;
    padding: 0.8rem 1rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
  }
  .mandataires-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
  }
  .mandataire-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    padding: 2rem 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
  }
  .mandataire-card:hover {
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    transform: translateY(-6px);
  }
  .mandataire-card img {
    width: 180px;
    height: 240px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 1rem;
  }
  .mandataire-card h4 {
    margin: 0.5rem 0 0.2rem;
    font-size: 1.3rem;
    font-weight: 700;
    color: #F97316;
  }
  .mandataire-card p {
    margin: 0;
    color: #444;
    font-size: 1rem;
  }
</style>

<div class="reseau-wrapper">
  <h1 style="font-size: 2.4rem; font-weight: bold; margin-bottom: 2rem; text-align: center;">Notre réseau</h1>

  <input type="text" id="search-ville" class="search-input" placeholder="🔍 Rechercher une ville...">

  <div class="mandataires-list" id="mandataires-list">
    <?php
    $mandataires = new WP_Query([
      'post_type' => 'mandataire',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    ]);

    if ($mandataires->have_posts()) :
      while ($mandataires->have_posts()) : $mandataires->the_post();
        $ville = get_post_meta(get_the_ID(), 'ville', true);
        $supabase_id = get_post_meta(get_the_ID(), 'supabase_id', true);
        $image = $supabase_id ? get_mandataire_avatar_url($supabase_id) : get_template_directory_uri() . '/assets/no-photo.png';
    ?>
      <a href="<?php the_permalink(); ?>" class="mandataire-card" data-ville="<?php echo strtolower($ville); ?>" style="text-decoration: none; color: inherit;">
        <img src="<?php echo esc_url($image); ?>" alt="Photo de <?php the_title(); ?>">
        <h4><?php the_title(); ?></h4>
        <?php if ($ville) echo '<p>' . esc_html($ville) . '</p>'; ?>
      </a>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p style="color: #777;">Aucun mandataire trouvé.</p>';
    endif;
    ?>
  </div>
</div>

<script>
  document.getElementById('search-ville').addEventListener('input', function () {
    const val = this.value.toLowerCase();
    const cards = document.querySelectorAll('.mandataire-card');
    cards.forEach(card => {
      const ville = card.getAttribute('data-ville');
      card.style.display = ville.includes(val) ? 'block' : 'none';
    });
  });
</script>

<?php get_footer(); ?>