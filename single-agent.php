<?php get_header(); ?>

<div style="max-width: 1100px; margin: auto; padding: 4rem 2rem; font-family: -apple-system, sans-serif;">
    <?php while (have_posts()) : the_post();
        $agent_id = get_post_meta(get_the_ID(), 'supabase_id', true);
        $photo = get_post_meta(get_the_ID(), 'photo', true);
        $tel = get_post_meta(get_the_ID(), 'tel', true);
        $email = get_post_meta(get_the_ID(), 'email', true);
        $photo_url = $photo && $agent_id
            ? 'https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/avatars/' . $agent_id . '/' . $photo
            : 'https://via.placeholder.com/200x200?text=Agent';
    ?>

    <!-- 🧑 Agent -->
    <div style="text-align: center; margin-bottom: 3rem;">
        <img src="<?php echo esc_url($photo_url); ?>" alt="" style="width: 120px; height: 120px; border-radius: 100%; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <h1 style="margin-top: 1rem;"><?php the_title(); ?></h1>
        <?php if ($tel) echo "<p>📞 $tel</p>"; ?>
        <?php if ($email) echo "<p>📧 $email</p>"; ?>
    </div>

    <!-- 🏡 Biens de cet agent -->
    <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">Ses biens</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
        <?php
        $biens = new WP_Query([
            'post_type' => 'bien',
            'posts_per_page' => -1,
            'meta_query' => [[
                'key' => 'agent_nom',
                'value' => $agent_id,
                'compare' => '='
            ]]
        ]);

        if ($biens->have_posts()) :
            while ($biens->have_posts()) : $biens->the_post();
                $cover = get_post_meta(get_the_ID(), 'cover', true);
                $bien_id = get_post_meta(get_the_ID(), 'supabase_id', true);
                $cover_url = $cover ? 'https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/' . $bien_id . '/' . $cover : '';
        ?>
            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                    <?php if ($cover_url): ?>
                        <img src="<?php echo esc_url($cover_url); ?>" alt="" style="width: 100%; height: 180px; object-fit: cover;">
                    <?php endif; ?>
                    <div style="padding: 1rem;">
                        <h3 style="margin: 0;"><?php the_title(); ?></h3>
                        <p style="margin: .5rem 0;"><?php echo get_post_meta(get_the_ID(), 'surface_m2', true); ?> m² - 
                            <?php
                            $prix = get_post_meta(get_the_ID(), 'prix_vente', true);
                            echo $prix ? number_format($prix, 0, ',', ' ') . ' €' : 'Prix non renseigné';
                            ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php endwhile;
        else : ?>
            <p>Aucun bien pour cet agent.</p>
        <?php endif; wp_reset_postdata(); ?>
    </div>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
