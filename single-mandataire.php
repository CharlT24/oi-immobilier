<?php
get_header();
$post_id = get_the_ID();
$supabase_id = get_post_meta($post_id, 'supabase_id', true);
$ville = get_post_meta($post_id, 'ville', true);
$email = get_post_meta($post_id, 'email', true);
$tel = get_post_meta($post_id, 'telephone', true);
$image = $supabase_id ? get_mandataire_avatar_url($supabase_id) : get_template_directory_uri() . '/assets/no-photo.png';
?>

<div class="container" style="max-width: 1200px; margin: auto; padding: 3rem 1rem;">
  
  <!-- Header de l'agent avec style Apple -->
  <div class="glass-card" style="padding: 3rem; margin-bottom: 3rem; text-align: center;">
    <div style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">
      
      <!-- Avatar avec effet moderne -->
      <div style="position: relative;">
        <img src="<?php echo esc_url($image); ?>" 
             alt="Photo de <?php the_title(); ?>" 
             style="width: 200px; height: 260px; border-radius: var(--radius-lg); object-fit: cover; box-shadow: var(--shadow-lg); border: 4px solid rgba(249, 115, 22, 0.1);">
        
        <!-- Badge statut en ligne -->
        <div style="position: absolute; bottom: 10px; right: 10px; background: var(--success); color: white; padding: 0.3rem 0.8rem; border-radius: var(--radius-full); font-size: 0.8rem; font-weight: 600; box-shadow: var(--shadow-md);">
          🟢 En ligne
        </div>
      </div>
      
      <!-- Informations de l'agent -->
      <div>
        <h1 class="text-display" style="color: var(--primary); margin-bottom: 1rem;"><?php the_title(); ?></h1>
        
        <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem; font-size: 1.1rem; color: var(--gray-600); margin-bottom: 2rem;">
          <?php if ($ville): ?>
          <div style="display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 1.2rem;">📍</span>
            <span><?php echo esc_html($ville); ?></span>
          </div>
          <?php endif; ?>
          
          <?php if ($tel): ?>
          <div style="display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 1.2rem;">📞</span>
            <a href="tel:<?php echo esc_attr($tel); ?>" style="color: var(--gray-600); text-decoration: none;"><?php echo esc_html($tel); ?></a>
          </div>
          <?php endif; ?>
          
          <?php if ($email): ?>
          <div style="display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 1.2rem;">✉️</span>
            <a href="mailto:<?php echo esc_attr($email); ?>" style="color: var(--primary); text-decoration: none;"><?php echo esc_html($email); ?></a>
          </div>
          <?php endif; ?>
        </div>
        
        <!-- Boutons d'action -->
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <?php if ($tel): ?>
          <a href="tel:<?php echo esc_attr($tel); ?>" class="btn-primary">
            📞 Appeler maintenant
          </a>
          <?php endif; ?>
          
          <?php if ($email): ?>
          <a href="mailto:<?php echo esc_attr($email); ?>" class="btn-secondary">
            ✉️ Envoyer un email
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Statistiques de l'agent -->
  <div class="stats-container" style="margin-bottom: 3rem;">
    <?php
    $agent_id = get_post_meta(get_the_ID(), 'supabase_id', true);
    
    // Compter les biens de cet agent
    $biens_query = new WP_Query([
      'post_type' => 'bien',
      'posts_per_page' => -1,
      'meta_query' => [
        [
          'key' => 'agent_nom',
          'value' => $agent_id,
          'compare' => '='
        ]
      ]
    ]);
    
    $total_biens = $biens_query->found_posts;
    $biens_vendus = 0;
    $ca_total = 0;
    
    if ($biens_query->have_posts()) {
      while ($biens_query->have_posts()) {
        $biens_query->the_post();
        $statut = get_post_meta(get_the_ID(), 'statut', true);
        $prix = get_post_meta(get_the_ID(), 'prix_vente', true);
        
        if (strtolower($statut) === 'vendu') {
          $biens_vendus++;
          $ca_total += (float)$prix;
        }
      }
      wp_reset_postdata();
    }
    
    $taux_reussite = $total_biens > 0 ? round(($biens_vendus / $total_biens) * 100) : 0;
    ?>
    
    <div class="stat-card">
      <span class="stat-number"><?php echo $total_biens; ?></span>
      <span class="stat-label">Biens en portefeuille</span>
    </div>
    
    <div class="stat-card">
      <span class="stat-number"><?php echo $biens_vendus; ?></span>
      <span class="stat-label">Biens vendus</span>
    </div>
    
    <div class="stat-card">
      <span class="stat-number"><?php echo $taux_reussite; ?>%</span>
      <span class="stat-label">Taux de réussite</span>
    </div>
    
    <div class="stat-card">
      <span class="stat-number"><?php echo number_format($ca_total, 0, ',', ' '); ?> €</span>
      <span class="stat-label">CA réalisé</span>
    </div>
  </div>

  <!-- Biens de l'agent -->
  <div class="glass-card" style="padding: 2rem; margin-bottom: 2rem;">
    <h2 class="text-title-1" style="margin-bottom: 2rem; color: var(--primary);">🏡 Biens en diffusion</h2>
    
    <?php
    // Reset query pour les biens actifs
    $biens_actifs = new WP_Query([
      'post_type' => 'bien',
      'posts_per_page' => -1,
      'meta_query' => [
        [
          'key' => 'agent_nom',
          'value' => $agent_id,
          'compare' => '='
        ],
        [
          'key' => 'statut',
          'value' => ['Disponible', 'En vente', 'Actif'],
          'compare' => 'IN'
        ]
      ]
    ]);

    if ($biens_actifs->have_posts()) : ?>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <?php while ($biens_actifs->have_posts()) : $biens_actifs->the_post();
          $cover = get_post_meta(get_the_ID(), 'cover', true);
          $sid = get_post_meta(get_the_ID(), 'supabase_id', true);
          $cover_url = $cover && $sid ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$sid/cover.jpg" : get_template_directory_uri() . '/assets/no-photo.png';
          $ville = get_post_meta(get_the_ID(), 'ville', true);
          $surface = get_post_meta(get_the_ID(), 'surface_m2', true);
          $prix = get_post_meta(get_the_ID(), 'prix_vente', true);
          $type_bien = get_post_meta(get_the_ID(), 'type_bien', true);
          $nb_pieces = get_post_meta(get_the_ID(), 'nb_pieces', true);
        ?>
        
        <a href="<?php the_permalink(); ?>" class="property-card">
          <img src="<?php echo esc_url($cover_url); ?>" 
               alt="Photo de <?php the_title(); ?>" 
               class="property-image"
               onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'">
          
          <div class="property-content">
            <h3 class="property-title"><?php the_title(); ?></h3>
            
            <div style="display: flex; align-items: center; gap: 1rem; margin: 0.5rem 0; font-size: 0.9rem; color: var(--gray-600);">
              <span>📍 <?php echo esc_html($ville); ?></span>
              <span>📐 <?php echo esc_html($surface); ?> m²</span>
              <?php if ($nb_pieces): ?>
              <span>🛋️ <?php echo esc_html($nb_pieces); ?>P</span>
              <?php endif; ?>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
              <span class="property-price">
                <?php echo number_format((float)$prix, 0, ',', ' '); ?> €
              </span>
              <span style="background: rgba(249, 115, 22, 0.1); color: var(--primary); padding: 0.3rem 0.8rem; border-radius: var(--radius-full); font-size: 0.8rem; font-weight: 600;">
                <?php echo esc_html($type_bien); ?>
              </span>
            </div>
          </div>
        </a>
        
        <?php endwhile; ?>
      </div>
      
    <?php else : ?>
      <div style="text-align: center; padding: 3rem; color: var(--gray-500);">
        <div style="font-size: 3rem; margin-bottom: 1rem;">🏠</div>
        <h3 style="margin-bottom: 1rem;">Aucun bien en cours</h3>
        <p>Cet agent n'a actuellement aucun bien en diffusion.</p>
      </div>
    <?php endif; 
    wp_reset_postdata(); ?>
  </div>

  <!-- Section contact avancée -->
  <div class="glass-card" style="padding: 2rem;">
    <h2 class="text-title-1" style="margin-bottom: 2rem; color: var(--primary); text-align: center;">💬 Contactez <?php echo esc_html(explode(' ', get_the_title())[0]); ?></h2>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
      
      <!-- Formulaire de contact -->
      <div>
        <form class="modern-form" style="background: rgba(249, 115, 22, 0.02); border: 1px solid rgba(249, 115, 22, 0.1);">
          <h3 style="margin-bottom: 1.5rem; color: var(--primary);">Envoyez un message</h3>
          
          <div class="form-group">
            <input type="text" name="nom" placeholder="Votre nom complet" required class="form-input">
          </div>
          
          <div class="form-group">
            <input type="email" name="email" placeholder="Votre email" required class="form-input">
          </div>
          
          <div class="form-group">
            <input type="tel" name="telephone" placeholder="Votre téléphone" class="form-input">
          </div>
          
          <div class="form-group">
            <select name="sujet" class="form-input" required>
              <option value="">Choisir un sujet</option>
              <option value="estimation">Demande d'estimation</option>
              <option value="achat">Recherche d'un bien</option>
              <option value="vente">Vendre mon bien</option>
              <option value="information">Demande d'information</option>
              <option value="autre">Autre</option>
            </select>
          </div>
          
          <div class="form-group">
            <textarea name="message" placeholder="Votre message..." rows="5" class="form-input" required></textarea>
          </div>
          
          <button type="submit" class="btn-primary" style="width: 100%;">
            ✉️ Envoyer le message
          </button>
        </form>
      </div>
      
      <!-- Informations de contact -->
      <div>
        <div style="text-align: center; margin-bottom: 2rem;">
          <div style="background: rgba(249, 115, 22, 0.1); padding: 2rem; border-radius: var(--radius-lg); border: 1px solid rgba(249, 115, 22, 0.2);">
            <h4 style="color: var(--primary); margin-bottom: 1rem;">Disponibilité</h4>
            <div style="color: var(--gray-700); line-height: 1.7;">
              <div style="margin-bottom: 0.5rem;">📅 Lun-Ven : 9h00 - 19h00</div>
              <div style="margin-bottom: 0.5rem;">📅 Samedi : 9h00 - 17h00</div>
              <div style="margin-bottom: 1rem;">📅 Dimanche : Sur rendez-vous</div>
              
              <div style="font-weight: 600; color: var(--success);">⚡ Réponse sous 2h en moyenne</div>
            </div>
          </div>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 1rem;">
          <?php if ($tel): ?>
          <a href="tel:<?php echo esc_attr($tel); ?>" 
             style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(52, 199, 89, 0.1); border: 1px solid rgba(52, 199, 89, 0.2); border-radius: var(--radius-md); text-decoration: none; color: var(--success); font-weight: 600;">
            <span style="font-size: 1.5rem;">📞</span>
            <div>
              <div>Appel direct</div>
              <div style="font-size: 0.9rem; opacity: 0.8;"><?php echo esc_html($tel); ?></div>
            </div>
          </a>
          <?php endif; ?>
          
          <?php if ($email): ?>
          <a href="mailto:<?php echo esc_attr($email); ?>" 
             style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(249, 115, 22, 0.1); border: 1px solid rgba(249, 115, 22, 0.2); border-radius: var(--radius-md); text-decoration: none; color: var(--primary); font-weight: 600;">
            <span style="font-size: 1.5rem;">✉️</span>
            <div>
              <div>Email direct</div>
              <div style="font-size: 0.9rem; opacity: 0.8;"><?php echo esc_html($email); ?></div>
            </div>
          </a>
          <?php endif; ?>
          
          <a href="https://wa.me/33<?php echo substr($tel, 1); ?>" 
             style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(37, 211, 102, 0.1); border: 1px solid rgba(37, 211, 102, 0.2); border-radius: var(--radius-md); text-decoration: none; color: #25D366; font-weight: 600;">
            <span style="font-size: 1.5rem;">💬</span>
            <div>
              <div>WhatsApp</div>
              <div style="font-size: 0.9rem; opacity: 0.8;">Message instantané</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bouton retour -->
  <div style="text-align: center; margin-top: 3rem;">
    <a href="<?php echo site_url('/reseau'); ?>" class="btn-secondary">
      ← Retour au réseau
    </a>
  </div>
</div>

<?php get_footer(); ?>