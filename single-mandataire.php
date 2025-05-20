<?php
get_header();
$post_id = get_the_ID();
$supabase_id = get_post_meta($post_id, 'supabase_id', true);
$ville = get_post_meta($post_id, 'ville', true);
$email = get_post_meta($post_id, 'email', true);
$tel = get_post_meta($post_id, 'telephone', true);
$image = $supabase_id ? get_mandataire_avatar_url($supabase_id) : get_template_directory_uri() . '/assets/no-photo.png';
?>

<div style="max-width: 1100px; margin: auto; padding: 4rem 1rem; font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
  <div style="display: flex; align-items: center; gap: 2rem; margin-bottom: 3rem;">
    <img src="<?php echo esc_url($image); ?>" alt="photo" style="width: 200px; height: 260px; border-radius: 12px; object-fit: cover;">
    <div>
      <h1 style="font-size: 2rem; font-weight: bold; color: #F97316;"><?php the_title(); ?></h1>
      <?php if ($ville) echo "<p style='margin: 0.3rem 0; color: #555;'>📍 $ville</p>"; ?>
      <?php if ($tel) echo "<p style='margin: 0.2rem 0; color: #555;'>📞 $tel</p>"; ?>
      <?php if ($email) echo "<p style='margin: 0.2rem 0; color: #555;'>✉ <a href='mailto:$email' style='color:#f97316;'>$email</a></p>"; ?>
    </div>
  </div>

  <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">Biens en diffusion</h2>
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
    <?php
    $agent_id = get_post_meta(get_the_ID(), 'supabase_id', true);

    $biens = new WP_Query([
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

    if ($biens->have_posts()) :
      while ($biens->have_posts()) : $biens->the_post();
        $cover = get_post_meta(get_the_ID(), 'cover', true);
        $sid = get_post_meta(get_the_ID(), 'supabase_id', true);
        $cover_url = $cover && $sid ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$sid/cover.jpg" : get_template_directory_uri() . '/assets/no-photo.png';
        $ville = get_post_meta(get_the_ID(), 'ville', true);
        $surface = get_post_meta(get_the_ID(), 'surface_m2', true);
        $prix = get_post_meta(get_the_ID(), 'prix_vente', true);
    ?>
      <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; background: white; border-radius: 14px; overflow: hidden; box-shadow: 0 8px 24px rgba(0,0,0,0.06);">
        <img src="<?php echo esc_url($cover_url); ?>" style="width: 100%; height: 200px; object-fit: cover;">
        <div style="padding: 1rem;">
          <h3 style="font-size: 1.1rem; font-weight: bold; color: #333; margin-bottom: 0.2rem;"><?php the_title(); ?></h3>
          <p style="margin: 0.3rem 0; color: #555; font-size: 0.95rem;">📍 <?php echo esc_html($ville); ?> — <?php echo esc_html($surface); ?> m²</p>
          <p style="color: #f97316; font-weight: 600; font-size: 1rem; margin: 0;">
            <?php echo number_format((float)$prix, 0, ',', ' '); ?> €
          </p>
        </div>
      </a>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo "<p style='color:#888;'>Aucun bien pour ce mandataire.</p>";
    endif;
    ?>
  </div>
</div>

<?php get_footer(); ?>