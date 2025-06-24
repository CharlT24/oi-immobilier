<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f97316">
    
    <!-- Preload fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- SEO Meta -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    
    <?php wp_head(); ?>
    
    <style>
        /* Variables CSS Apple globales */
        :root {
            /* Palette principale */
            --primary: #f97316;
            --primary-dark: #ea580c;
            --primary-light: #fb923c;
            --secondary: #007AFF;
            --success: #34C759;
            --warning: #FF9500;
            --danger: #FF3B30;
            
            /* Neutrals modernes */
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            
            /* Surfaces glassmorphism */
            --surface: rgba(255, 255, 255, 0.85);
            --surface-elevated: rgba(255, 255, 255, 0.95);
            --surface-blur: rgba(255, 255, 255, 0.75);
            
            /* Shadows Apple */
            --shadow-xs: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.08);
            --shadow-xl: 0 32px 64px rgba(0, 0, 0, 0.12);
            
            /* Border radius */
            --radius-xs: 4px;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-2xl: 32px;
            --radius-full: 9999px;
            
            /* Transitions */
            --transition-fast: 0.15s ease-out;
            --transition-normal: 0.3s ease-out;
            --transition-slow: 0.5s ease-out;
            
            /* Spacing système 8px */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-12: 3rem;
            --space-16: 4rem;
        }

        /* Reset moderne */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--gray-800);
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Typography Apple */
        .text-display {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .text-title-1 {
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 600;
            line-height: 1.2;
            letter-spacing: -0.01em;
        }

        .text-headline {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .text-body {
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }

        .text-caption {
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.4;
            color: var(--gray-600);
        }

        /* Header Apple moderne */
        .apple-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--surface-blur);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: all var(--transition-normal);
            will-change: background, box-shadow;
        }

        .apple-header.scrolled {
            background: var(--surface-elevated);
            box-shadow: var(--shadow-md);
            border-bottom-color: rgba(0, 0, 0, 0.1);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: var(--space-4) var(--space-6);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-4);
        }

        /* Logo moderne */
        .logo-container {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            text-decoration: none;
            transition: transform var(--transition-fast);
        }

        .logo-container:hover {
            transform: scale(1.02);
        }

        .logo-container img {
            height: 60px;
            width: auto;
            transition: all var(--transition-fast);
            filter: drop-shadow(var(--shadow-xs));
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        /* Navigation Apple */
        .apple-nav {
            display: flex;
            align-items: center;
        }

        .nav-list {
            list-style: none;
            display: flex;
            gap: var(--space-6);
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .nav-list li {
            position: relative;
        }

        .nav-list a {
            text-decoration: none;
            font-weight: 500;
            color: var(--gray-700);
            padding: var(--space-2) var(--space-4);
            border-radius: var(--radius-full);
            transition: all var(--transition-fast);
            position: relative;
            white-space: nowrap;
        }

        .nav-list a:hover {
            color: var(--primary);
            background: rgba(249, 115, 22, 0.08);
            transform: translateY(-1px);
        }

        .nav-list a.current-menu-item {
            color: var(--primary);
            background: rgba(249, 115, 22, 0.1);
        }

        /* Bouton mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: var(--space-2);
            border-radius: var(--radius-sm);
            transition: all var(--transition-fast);
        }

        .mobile-menu-btn:hover {
            background: var(--gray-100);
        }

        .mobile-menu-btn span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--gray-700);
            margin: 5px 0;
            transition: all var(--transition-fast);
            border-radius: 1px;
        }

        /* Menu mobile */
        .mobile-nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--surface-elevated);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: var(--shadow-lg);
            padding: var(--space-4);
        }

        .mobile-nav.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }

        .mobile-nav .nav-list {
            flex-direction: column;
            gap: var(--space-2);
        }

        .mobile-nav .nav-list a {
            display: block;
            padding: var(--space-3) var(--space-4);
            border-radius: var(--radius-md);
            text-align: center;
        }

        /* Animations */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                padding: var(--space-3) var(--space-4);
            }
            
            .apple-nav > .nav-list {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .logo-container img {
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .header-container {
                padding: var(--space-2) var(--space-3);
            }
            
            .logo-container img {
                height: 45px;
            }
        }

        /* États de focus pour l'accessibilité */
        .nav-list a:focus,
        .mobile-menu-btn:focus,
        .logo-container:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Mode sombre (base) */
        @media (prefers-color-scheme: dark) {
            :root {
                --surface: rgba(30, 30, 30, 0.85);
                --surface-elevated: rgba(40, 40, 40, 0.95);
                --surface-blur: rgba(20, 20, 20, 0.75);
            }
        }

        /* Performance */
        .apple-header {
            contain: layout style paint;
        }

        /* Swiper styles si utilisé */
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-pagination-bullet {
            background: var(--primary) !important;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: var(--primary) !important;
        }
    </style>
</head>
<body <?php body_class(); ?>>

<!-- Header Apple moderne -->
<header class="apple-header" id="main-header">
    <div class="header-container">
        
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-container">
            <?php if (has_custom_logo()) : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" 
                     alt="<?php bloginfo('name'); ?>" 
                     width="120" height="60" />
            <?php else : ?>
                <span class="logo-text"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>

        <!-- Navigation principale -->
        <nav class="apple-nav" role="navigation" aria-label="Navigation principale">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-list',
                'fallback_cb' => function() {
                    echo '<ul class="nav-list">
                        <li><a href="' . home_url('/') . '">Accueil</a></li>
                        <li><a href="' . home_url('/biens') . '">Biens</a></li>
                        <li><a href="' . home_url('/agents') . '">Agents</a></li>
                        <li><a href="' . home_url('/nos-services') . '">Services</a></li>
                        <li><a href="' . home_url('/contact') . '">Contact</a></li>
                    </ul>';
                }
            ]);
            ?>
            
            <!-- Bouton menu mobile -->
            <button class="mobile-menu-btn" 
                    id="mobile-menu-btn" 
                    aria-label="Ouvrir le menu mobile"
                    aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>

        <!-- Menu mobile -->
        <div class="mobile-nav" id="mobile-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-list',
                'fallback_cb' => function() {
                    echo '<ul class="nav-list">
                        <li><a href="' . home_url('/') . '">🏠 Accueil</a></li>
                        <li><a href="' . home_url('/biens') . '">🏡 Biens</a></li>
                        <li><a href="' . home_url('/agents') . '">👥 Agents</a></li>
                        <li><a href="' . home_url('/nos-services') . '">⚙️ Services</a></li>
                        <li><a href="' . home_url('/contact') . '">📞 Contact</a></li>
                    </ul>';
                }
            ]);
            ?>
        </div>
    </div>
</header>

<!-- Swiper CSS (si utilisé) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<script>
// Header scroll effect
window.addEventListener('scroll', () => {
    const header = document.getElementById('main-header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
}, { passive: true });

// Menu mobile
document.addEventListener('DOMContentLoaded', () => {
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    
    if (mobileBtn && mobileNav) {
        mobileBtn.addEventListener('click', () => {
            const isOpen = mobileNav.classList.contains('active');
            
            if (isOpen) {
                mobileNav.classList.remove('active');
                mobileBtn.setAttribute('aria-expanded', 'false');
                mobileBtn.setAttribute('aria-label', 'Ouvrir le menu mobile');
            } else {
                mobileNav.classList.add('active');
                mobileBtn.setAttribute('aria-expanded', 'true');
                mobileBtn.setAttribute('aria-label', 'Fermer le menu mobile');
            }
        });
        
        // Fermer le menu mobile quand on clique sur un lien
        mobileNav.addEventListener('click', (e) => {
            if (e.target.tagName === 'A') {
                mobileNav.classList.remove('active');
                mobileBtn.setAttribute('aria-expanded', 'false');
                mobileBtn.setAttribute('aria-label', 'Ouvrir le menu mobile');
            }
        });
        
        // Fermer le menu mobile avec Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                mobileNav.classList.remove('active');
                mobileBtn.setAttribute('aria-expanded', 'false');
                mobileBtn.focus();
            }
        });
    }
});

// Smooth scroll pour les ancres
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Performance: Preload des images importantes
document.addEventListener('DOMContentLoaded', () => {
    const importantImages = [
        '<?php echo get_template_directory_uri(); ?>/assets/GARET2.jpg',
        '<?php echo get_template_directory_uri(); ?>/assets/logo.png'
    ];
    
    importantImages.forEach(src => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'image';
        link.href = src;
        document.head.appendChild(link);
    });
});
</script>

<!-- Swiper JS (si utilisé) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>