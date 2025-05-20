<?php
// 📄 single-bien.php — Fiche bien synchronisée avec le CRM
get_header();
?>

<style>
.dpe-ges-container {
  display: flex;
  gap: 2rem;
  margin-top: 2.5rem;
  flex-wrap: wrap;
}
.dpe-scale, .ges-scale {
  flex: 1 1 300px;
}
.dpe-bar, .ges-bar {
  position: relative;
  height: 28px;
  line-height: 28px;
  font-weight: bold;
  color: white;
  padding-left: 10px;
  margin-bottom: 6px;
  border-radius: 4px;
}
.dpe-bar span, .ges-bar span {
  position: absolute;
  right: 10px;
}
.dpe-selected::after, .ges-selected::after {
  content: '';
  position: absolute;
  right: -12px;
  top: 8px;
  width: 0;
  height: 0;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
  border-left: 12px solid black;
}
</style>

<?php
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
$dpe_classes = ['A' => '#2ECC71', 'B' => '#A9DFBF', 'C' => '#F7DC6F', 'D' => '#F5B041', 'E' => '#EB984E', 'F' => '#DC7633', 'G' => '#A93226'];
?>


<div style="max-width: 1100px; margin: auto; padding: 3rem 1rem; font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
  <h1 style="font-size: 2.2rem; font-weight: bold; margin-bottom: 0.5rem;">🏡 <?php echo esc_html($titre); ?></h1>
  <p style="font-size: 1rem; color: #666; margin-bottom: 1rem;">
    <?php echo esc_html($surface); ?> m² — <?php echo number_format((float)$prix, 0, ',', ' '); ?> € — <?php echo esc_html("$ville $code_postal"); ?>
  </p>

  <div class="swiper" style="border-radius: 16px; overflow: hidden; margin-bottom: 2rem;">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="<?php echo esc_url($cover_url); ?>" style="width: 100%; height: 500px; object-fit: cover;" onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
      </div>
      <?php if ($gallery && is_array($gallery)) : ?>
        <?php foreach ($gallery as $image): ?>
          <div class="swiper-slide">
            <img src="https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/gallery/<?php echo esc_attr($supabase_id); ?>/<?php echo esc_attr($image); ?>" style="width: 100%; height: 500px; object-fit: cover;" onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    new Swiper('.swiper', {
      loop: true,
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
    });
  </script>

  <h2 style="font-size: 1.5rem; font-weight: bold; margin-top: 2.5rem;">📋 Informations du bien</h2>
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem;">
    <p>📐 Surface : <strong><?php echo esc_html($surface); ?> m²</strong></p>
    <p>🛏️ Chambres : <strong><?php echo esc_html($nb_chambres); ?></strong></p>
    <p>🛋️ Pièces : <strong><?php echo esc_html($nb_pieces); ?></strong></p>
    <p>🏢 Étage : <strong><?php echo esc_html($etage); ?></strong></p>
    <p>🏷️ Type : <strong><?php echo esc_html($type_bien); ?></strong></p>
    <p>🏗️ Année : <strong><?php echo esc_html($annee); ?></strong></p>
    <p>🔥 Chauffage : <strong><?php echo esc_html("$chauffage ($mode_chauffage)"); ?></strong></p>
    <p>🌍 Terrain : <strong><?php echo esc_html($terrain); ?> m²</strong></p>
    <p>📐 Carrez : <strong><?php echo esc_html($carrez); ?> m²</strong></p>
    <p>📜 Mandat : <strong><?php echo esc_html($mandat); ?></strong> — <em><?php echo esc_html($statut); ?></em></p>
  </div>


  <?php
$options = get_post_meta($post_id, 'options', true);

if (!empty($options) && trim($options) !== ''):
  $options_array = explode(',', $options);
?>
  <h3 style="margin-top: 2rem; font-weight: 600;">⚙️ Options & Caractéristiques</h3>
  <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 0.5rem;">
    <?php foreach ($options_array as $opt): ?>
      <span style="background: #ffe6cc; padding: 0.4rem 0.8rem; border-radius: 9999px; font-size: 0.9rem; color: #444;">
        <?php echo esc_html(trim($opt)); ?>
      </span>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php
// Fonctions d’attribution des lettres
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

// Récupération des données
$dpe_conso = get_post_meta($post_id, 'dpe_conso_indice', true);
$dpe_letter = strtoupper(trim(get_post_meta($post_id, 'dpe', true)));
$dpe_ges = get_post_meta($post_id, 'dpe_ges_indice', true);
$ges_letter = getGesLetter($dpe_ges);
$dpe_conso_val = get_post_meta($post_id, 'dpe_conso_indice', true);
$ges_val = get_post_meta($post_id, 'dpe_ges_indice', true);

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

<style>
.dpe-ges-container {
  display: flex;
  gap: 2rem;
  margin-top: 2.5rem;
  flex-wrap: wrap;
}
.dpe-scale, .ges-scale {
  flex: 1 1 300px;
}
.dpe-bar, .ges-bar {
  position: relative;
  height: 22px;
  line-height: 22px;
  font-weight: bold;
  color: white;
  padding-left: 10px;
  margin-bottom: 6px;
  border-radius: 4px;
}
.dpe-bar span, .ges-bar span {
  position: absolute;
  right: 10px;
}
.dpe-selected::after, .ges-selected::after {
  content: '';
  position: absolute;
  right: -12px;
  top: 8px;
  width: 0;
  height: 0;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
  border-left: 12px solid black;
}
</style>

<div class="dpe-ges-container">
  <div class="dpe-scale">
    <h3>🔋 Consommation énergétique</h3>
    <?php foreach ($dpe_classes as $letter => $info): ?>
      <div class="dpe-bar <?php echo ($letter === $dpe_letter ? 'dpe-selected' : ''); ?>"
           style="background-color: <?php echo $info['bg']; ?>;">
        <?php echo $letter . " — " . $info['text']; ?>
        <span>
          <?php if ($letter === $dpe_letter && !empty($dpe_conso_val)) {
            echo esc_html($dpe_conso) . " kWhEP/m².an";
          } ?>
        </span>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="ges-scale">
    <h3>🌫️ Émissions GES</h3>
    <?php foreach ($ges_classes as $letter => $info): ?>
      <div class="ges-bar <?php echo ($letter === $ges_letter ? 'ges-selected' : ''); ?>"
           style="background-color: <?php echo $info['bg']; ?>;">
        <?php echo $letter . " — " . $info['text']; ?>
        <span>
          <?php if ($letter === $ges_letter && !empty($ges_val)) {
            echo esc_html($ges_val) . " kgCO₂/m².an";
          } ?>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
</div>


  <div style="margin-top: 2.5rem; background: #fffaf0; padding: 1rem 1.5rem; border-radius: 10px; box-shadow: 0 0 6px rgba(0,0,0,0.05);">
    <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem;">💰 Informations financières</h3>
    <ul style="font-size: 0.95rem; color: #444; line-height: 1.6;">
      <li><strong>Prix net vendeur :</strong> <?php echo number_format((float)$net_vendeur, 0, ',', ' '); ?> €</li>
      <li><strong>Honoraires :</strong> <?php echo number_format((float)$honoraires, 0, ',', ' '); ?> € (<?php echo $pourcentage; ?> %)</li>
      <li><strong>Prix total :</strong> <?php echo number_format((float)$prix, 0, ',', ' '); ?> €</li>
      <li><strong>Taxe foncière :</strong> <?php echo $fonciere ?: '—'; ?> €</li>
      <li><strong>Charges annuelles :</strong> <?php echo $charges ?: '—'; ?> €</li>
      <li><strong>Fonds travaux :</strong> <?php echo $travaux ?: '—'; ?> €</li>
    </ul>
  </div>

  <?php if (!empty($description)): ?>
  <div style="margin-top: 2.5rem;">
    <h3 style="font-size: 1.3rem; font-weight: 600;">📝 Description</h3>
    <div style="font-size: 0.95rem; color: #444; margin-top: 0.5rem;">
      <?php echo $description; ?>
      <p style="margin-top: 0.5rem; font-size: 0.85rem;">
        🔍 Infos risques : <a href="https://www.georisques.gouv.fr" class="text-blue-600 underline" target="_blank">Géorisques</a>
      </p>
    </div>
  </div>
<?php endif; ?>


  <?php if ($agent_post): ?>
  <div style="margin-top: 3rem;">
    <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">👤 Mandataire en charge</h3>
    <div style="display: flex; align-items: center; gap: 1rem;">
      <?php echo get_the_post_thumbnail($agent_post->ID, 'thumbnail', ['style' => 'border-radius: 50%; width: 70px; height: 70px; object-fit: cover;']); ?>
      <div>
        <p style="margin: 0; font-weight: bold; font-size: 1.1rem;"><?php echo esc_html($agent_post->post_title); ?></p>
        <p style="margin: 0; font-size: 0.95rem; color: #666;">
          <?php echo esc_html(get_post_meta($agent_post->ID, 'ville', true)); ?> - <?php echo esc_html(get_post_meta($agent_post->ID, 'telephone', true)); ?>
        </p>
        <a href="mailto:<?php echo esc_attr(get_post_meta($agent_post->ID, 'email', true)); ?>" style="display: inline-block; margin-top: 0.5rem; padding: 0.5rem 1rem; background: #f97316; color: white; text-decoration: none; border-radius: 8px; font-weight: 500;">
          ✉ Contacter le mandataire
        </a>
      </div>
    </div>
  </div>
<?php endif; ?>

</div>

<?php get_footer(); ?>
