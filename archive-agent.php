<?php get_header(); ?>

<div style="padding: 4rem 2rem; max-width: 1200px; margin: auto;">
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem;">Nos agents</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
        <?php
        $agents = new WP_Query(['post_type' => 'agent', 'posts_per_page' => -1]);
        while ($agents->have_posts()) : $agents->the_post();

            $id = get_the_ID();
            $supabase_id = get_post_meta($id, 'supabase_id', true);
            $photo = get_post_meta($id, 'photo', true);
            $tel = get_post_meta($id, 'tel', true);

            $photo_url = $supabase_id && $photo
                ? 'https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/avatars/' . $supabase_id . '/' . $photo
                : 'https://via.placeholder.com/300x300?text=Agent';

            $permalink = get_permalink($id);
        ?>
            <a href="<?php echo esc_url($permalink); ?>" style="text-decoration: none; color: inherit;">
                <div style="background: #fff; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); padding: 1.5rem; text-align: center;">
                    <img src="<?php echo esc_url($photo_url); ?>" alt="Photo de <?php the_title(); ?>" style="width: 120px; height: 120px; border-radius: 100%; object-fit: cover; margin-bottom: 1rem;">
                    <h2 style="font-size: 1.4rem;"><?php the_title(); ?></h2>
                    <?php if ($tel): ?>
                        <p style="margin: .5rem 0;">📞 <?php echo esc_html($tel); ?></p>
                    <?php endif; ?>
                    <span style="margin-top: .5rem; display: inline-block; color: #F97316; font-weight: bold;">Voir sa fiche →</span>
                </div>
            </a>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>
