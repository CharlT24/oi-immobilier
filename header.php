<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header style="background: white; border-bottom: 1px solid #eee; padding: 1rem 2rem; position: sticky; top: 0; z-index: 1000;">
    <div style="max-width: 1200px; margin: auto; display: flex; justify-content: space-between; align-items: center;">
        
        <!-- ✅ Logo WordPress (ou fallback texte) -->
        <div class="site-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="display: inline-block;">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Logo Oi Immo" style="height: 60px;">
</a>
        </div>

        <!-- ✅ Menu principal -->
        <nav class="main-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-list',
                'fallback_cb' => false
            ]);
            ?>
        </nav>
    </div>
</header>

<style>
/* ✅ Menu clean + responsive de base */
.nav-list {
    list-style: none;
    display: flex;
    gap: 2rem;
    margin: 0;
    padding: 0;
}
.nav-list li {
    display: inline;
}
.nav-list a {
    text-decoration: none;
    font-weight: 500;
    color: #333;
    transition: color 0.3s;
}
.nav-list a:hover {
    color: #F97316;
}
</style>

<!-- ✅ Swiper (si utilisé) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
