<?php
// 📄 single-bien.php — Fiche bien moderne style Apple
get_header();

$post_id = get_the_ID();
$titre = get_the_title();
$prix = get_post_meta($post_id, 'prix_vente', true);
$honoraires = get_post_meta($post_id, 'honoraires', true);
$net_vendeur = get_post_meta($post_id, 'prix_net_vendeur', true);
$pourcentage = get_post_meta($post_id, 'pourcentage_honoraires', true);
$charges = get_post_meta($post_id, 'quote_part_charges', true);
$fonciere = get_post_meta($post_id, 'taxe_fonciere', true);
$travaux = get_post_meta($post_id, 'fonds_travaux', true);

$surface = get_post_meta($post_id, 'surface_m2', true);
$ville = get_post_meta($post_id, 'ville', true);
$code_postal = get_post_meta($post_id, 'code_postal', true);
$nb_pieces = get_post_meta($post_id, 'nb_pieces', true);
$nb_chambres = get_post_meta($post_id, 'nb_chambres', true);
$etage = get_post_meta($post_id, 'etage', true);
$type_bien = get_post_meta($post_id, 'type_bien', true);
$statut = get_post_meta($post_id, 'statut', true);
$mandat = get_post_meta($post_id, 'mandat', true);
$annee = get_post_meta($post_id, 'annee_construction', true);
$chauffage = get_post_meta($post_id, 'type_chauffage', true);
$mode_chauffage = get_post_meta($post_id, 'mode_chauffage', true);
$terrain = get_post_meta($post_id, 'surface_terrain', true);
$carrez = get_post_meta($post_id, 'surface_carrez', true);
$options = get_post_meta($post_id, 'options', true);
$description = apply_filters('the_content', get_post_field('post_content', $post_id));

$cover = get_post_meta($post_id, 'cover', true);
$supabase_id = get_post_meta($post_id, 'supabase_id', true);
$cover_url = $cover ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$supabase_id/cover.jpg" : get_template_directory_uri() . '/assets/no-photo.png';
$gallery = json_decode(get_post_meta($post_id, 'gallery', true), true);

$agent_id = get_post_meta($post_id, 'agent_nom', true);
$agent_post = null;
if ($agent_id) {
  $agent_query = new WP_Query([
    'post_type' => 'mandataire',
    'meta_key' => 'supabase_id',
    'meta_value' => $agent_id,
    'posts_per_page' => 1
  ]);
  if ($agent_query->have_posts()) {
    $agent_post = $agent_query->posts[0];
  }
}

$dpe = strtoupper(trim(get_post_meta($post_id, 'dpe', true)));
$dpe_conso = get_post_meta($post_id, 'dpe_conso_indice', true);
$dpe_ges = get_post_meta($post_id, 'dpe_ges_indice', true);
$dpe_min = get_post_meta($post_id, 'dpe_cout_min', true);
$dpe_max = get_post_meta($post_id, 'dpe_cout_max', true);

// Fonctions d'attribution des lettres
function getDpeLetter($val) {
  if (!is_numeric($val)) return null;
  if ($val <= 50) return 'A';
  if ($val <= 90) return 'B';
  if ($val <= 150) return 'C';
  if ($val <= 230) return 'D';
  if ($val <= 330) return 'E';
  if ($val <= 450) return 'F';
  return 'G';
}
function getGesLetter($val) {
  if (!is_numeric($val)) return null;
  if ($val <= 5) return 'A';
  if ($val <= 10) return 'B';
  if ($val <= 20) return 'C';
  if ($val <= 35) return 'D';
  if ($val <= 55) return 'E';
  if ($val <= 80) return 'F';
  return 'G';
}

$dpe_letter = strtoupper(trim(get_post_meta($post_id, 'dpe', true)));
$ges_letter = getGesLetter($dpe_ges);

// Palettes officielles
$dpe_classes = [
  'A' => ['bg' => '#008000', 'text' => '≤ 50'],
  'B' => ['bg' => '#78B543', 'text' => '51 à 90'],
  'C' => ['bg' => '#F6EB13', 'text' => '91 à 150'],
  'D' => ['bg' => '#F5B041', 'text' => '151 à 230'],
  'E' => ['bg' => '#EB984E', 'text' => '231 à 330'],
  'F' => ['bg' => '#DC7633', 'text' => '331 à 450'],
  'G' => ['bg' => '#E74C3C', 'text' => '> 450']
];
$ges_classes = [
  'A' => ['bg' => '#ede3e3', 'text' => '≤ 5'],
  'B' => ['bg' => '#D4C0D6', 'text' => '6 à 10'],
  'C' => ['bg' => '#C29ACF', 'text' => '11 à 20'],
  'D' => ['bg' => '#AF75C6', 'text' => '21 à 35'],
  'E' => ['bg' => '#9D52BE', 'text' => '36 à 55'],
  'F' => ['bg' => '#892EB5', 'text' => '56 à 80'],
  'G' => ['bg' => '#6A1EA0', 'text' => '> 80']
];
?>

<div class="container" style="max-width: 1200px; margin: auto; padding: 3rem 1rem;">
  
  <!-- Header du bien avec style Apple -->
  <div class="glass-card" style="padding: 2rem; margin-bottom: 2rem; text-align: center;">
    <h1 class="text-display" style="margin-bottom: 1rem; color: var(--primary);">🏡 <?php echo esc_html($titre); ?></h1>
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem; font-size: 1.1rem; color: var(--gray-600);">
      <span>📐 <?php echo esc_html($surface); ?> m²</span>
      <span>💰 <?php echo number_format((float)$prix, 0, ',', ' '); ?> €</span>
      <span>📍 <?php echo esc_html("$ville $code_postal"); ?></span>
    </div>
  </div>

  <!-- Galerie photos moderne avec Swiper -->
  <div class="glass-card" style="padding: 0; margin-bottom: 2rem; overflow: hidden;">
    <div class="swiper" style="border-radius: var(--radius-lg);">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="<?php echo esc_url($cover_url); ?>" 
               style="width: 100%; height: 500px; object-fit: cover;" 
               onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
        </div>
        <?php if ($gallery && is_array($gallery)) : ?>
          <?php foreach ($gallery as $image): ?>
            <div class="swiper-slide">
              <img src="https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/gallery/<?php echo esc_attr($supabase_id); ?>/<?php echo esc_attr($image); ?>" 
                   style="width: 100%; height: 500px; object-fit: cover;" 
                   onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>

  <!-- Grid layout pour informations -->
  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-bottom: 2rem;">
    
    <!-- Informations principales -->
    <div class="glass-card" style="padding: 2rem;">
      <h2 class="text-title-1" style="margin-bottom: 1.5rem; color: var(--primary);">📋 Caractéristiques</h2>
      
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">📐</span>
          <div>
            <div style="font-weight: 600;">Surface habitable</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($surface); ?> m²</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🛏️</span>
          <div>
            <div style="font-weight: 600;">Chambres</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($nb_chambres); ?></div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🛋️</span>
          <div>
            <div style="font-weight: 600;">Pièces</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($nb_pieces); ?></div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🏢</span>
          <div>
            <div style="font-weight: 600;">Étage</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($etage); ?></div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🏷️</span>
          <div>
            <div style="font-weight: 600;">Type de bien</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($type_bien); ?></div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🏗️</span>
          <div>
            <div style="font-weight: 600;">Année</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($annee); ?></div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🔥</span>
          <div>
            <div style="font-weight: 600;">Chauffage</div>
            <div style="color: var(--gray-600);"><?php echo esc_html("$chauffage ($mode_chauffage)"); ?></div>
          </div>
        </div>
        
        <?php if ($terrain): ?>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <span style="font-size: 1.2rem;">🌍</span>
          <div>
            <div style="font-weight: 600;">Terrain</div>
            <div style="color: var(--gray-600);"><?php echo esc_html($terrain); ?> m²</div>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <!-- Options et équipements -->
      <?php if (!empty($options) && trim($options) !== ''): ?>
        <div style="margin-top: 2rem;">
          <h3 style="font-weight: 600; margin-bottom: 1rem;">⚙️ Options & Équipements</h3>
          <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
            <?php 
            $options_array = explode(',', $options);
            foreach ($options_array as $opt): 
            ?>
              <span style="background: rgba(249, 115, 22, 0.1); padding: 0.4rem 0.8rem; border-radius: var(--radius-full); font-size: 0.9rem; color: var(--primary); border: 1px solid rgba(249, 115, 22, 0.2);">
                <?php echo esc_html(trim($opt)); ?>
              </span>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Sidebar avec prix et agent -->
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
      
      <!-- Prix -->
      <div class="glass-card" style="padding: 1.5rem; text-align: center;">
        <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 1rem;">💰 Informations financières</h3>
        <div style="font-size: 2rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem;">
          <?php echo number_format((float)$prix, 0, ',', ' '); ?> €
        </div>
        <div style="font-size: 0.9rem; color: var(--gray-600); line-height: 1.6;">
          <div>Prix net vendeur : <strong><?php echo number_format((float)$net_vendeur, 0, ',', ' '); ?> €</strong></div>
          <div>Honoraires : <strong><?php echo number_format((float)$honoraires, 0, ',', ' '); ?> € (<?php echo $pourcentage; ?>%)</strong></div>
          <?php if ($fonciere): ?>
            <div style="margin-top: 0.5rem;">Taxe foncière : <?php echo $fonciere; ?> €</div>
          <?php endif; ?>
          <?php if ($charges): ?>
            <div>Charges annuelles : <?php echo $charges; ?> €</div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Agent -->
      <?php if ($agent_post): ?>
      <div class="glass-card" style="padding: 1.5rem;">
        <h3 style="color: var(--primary); font-size: 1.1rem; margin-bottom: 1rem;">👤 Votre contact</h3>
        <div style="text-align: center;">
          <div style="font-weight: 600; margin-bottom: 0.5rem;"><?php echo esc_html($agent_post->post_title); ?></div>
          <div style="font-size: 0.9rem; color: var(--gray-600); margin-bottom: 1rem;">
            <?php echo esc_html(get_post_meta($agent_post->ID, 'ville', true)); ?><br>
            <?php echo esc_html(get_post_meta($agent_post->ID, 'telephone', true)); ?>
          </div>
          <a href="mailto:<?php echo esc_attr(get_post_meta($agent_post->ID, 'email', true)); ?>" 
             class="btn-primary" 
             style="font-size: 0.9rem; padding: 0.75rem 1.5rem;">
            ✉ Contacter
          </a>
        </div>
      </div>
      <?php endif; ?>

      <!-- Statut -->
      <div class="glass-card" style="padding: 1.5rem; text-align: center;">
        <div style="font-size: 0.9rem; color: var(--gray-600);">
          <div>Mandat : <strong><?php echo esc_html($mandat); ?></strong></div>
          <div>Statut : <strong style="color: var(--primary);"><?php echo esc_html($statut); ?></strong></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Description -->
  <?php if (!empty($description)): ?>
  <div class="glass-card" style="padding: 2rem; margin-bottom: 2rem;">
    <h2 class="text-title-1" style="margin-bottom: 1rem; color: var(--primary);">📝 Description</h2>
    <div style="line-height: 1.7; color: var(--gray-700);">
      <?php echo $description; ?>
    </div>
    <div style="margin-top: 1rem; font-size: 0.9rem; color: var(--gray-500);">
      🔍 Informations sur les risques : <a href="https://www.georisques.gouv.fr" target="_blank" style="color: var(--primary);">Géorisques</a>
    </div>
  </div>
  <?php endif; ?>

  <!-- DPE et GES -->
  <div class="glass-card" style="padding: 2rem; margin-bottom: 2rem;">
    <h2 class="text-title-1" style="margin-bottom: 2rem; color: var(--primary);">⚡ Diagnostic de Performance Énergétique</h2>
    
    <div class="dpe-ges-container">
      <div class="dpe-scale">
        <h3 style="margin-bottom: 1rem;">🔋 Consommation énergétique</h3>
        <?php foreach ($dpe_classes as $letter => $info): ?>
          <div class="dpe-bar <?php echo ($letter === $dpe_letter ? 'dpe-selected' : ''); ?>"
               style="background-color: <?php echo $info['bg']; ?>;">
            <?php echo $letter . " — " . $info['text']; ?>
            <span>
              <?php if ($letter === $dpe_letter && !empty($dpe_conso)) {
                echo esc_html($dpe_conso) . " kWhEP/m².an";
              } ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="ges-scale">
        <h3 style="margin-bottom: 1rem;">🌫️ Émissions de gaz à effet de serre</h3>
        <?php foreach ($ges_classes as $letter => $info): ?>
          <div class="ges-bar <?php echo ($letter === $ges_letter ? 'ges-selected' : ''); ?>"
               style="background-color: <?php echo $info['bg']; ?>;">
            <?php echo $letter . " — " . $info['text']; ?>
            <span>
              <?php if ($letter === $ges_letter && !empty($dpe_ges)) {
                echo esc_html($dpe_ges) . " kgCO₂/m².an";
              } ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <?php if ($dpe_min && $dpe_max): ?>
    <div style="margin-top: 1.5rem; padding: 1rem; background: rgba(249, 115, 22, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
      <strong>💡 Estimation des coûts énergétiques annuels :</strong> 
      Entre <?php echo number_format($dpe_min, 0, ',', ' '); ?> € et <?php echo number_format($dpe_max, 0, ',', ' '); ?> €
    </div>
    <?php endif; ?>
  </div>

  <!-- Bouton retour -->
  <div style="text-align: center; margin-top: 3rem;">
    <a href="<?php echo site_url('/biens'); ?>" class="btn-secondary">
      ← Retour aux annonces
    </a>
  </div>
</div>

<!-- Swiper CSS/JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  new Swiper('.swiper', {
    loop: true,
    pagination: { 
      el: '.swiper-pagination', 
      clickable: true 
    },
    navigation: { 
      nextEl: '.swiper-button-next', 
      prevEl: '.swiper-button-prev' 
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    }
  });
</script>

<?php get_footer(); ?>