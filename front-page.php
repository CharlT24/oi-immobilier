<?php
/*
Template Name: Front Page - Apple Style
*/
get_header();
?>

<style>
  /* Variables CSS Apple pour WordPress */
  :root {
    --primary: #f97316;
    --primary-dark: #ea580c;
    --secondary: #007AFF;
    --success: #34C759;
    --gray-50: #F9FAFB;
    --gray-100: #F3F4F6;
    --gray-600: #4B5563;
    --gray-800: #1F2937;
    --surface: rgba(255, 255, 255, 0.85);
    --surface-elevated: rgba(255, 255, 255, 0.95);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.08);
    --shadow-xl: 0 32px 64px rgba(0, 0, 0, 0.12);
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 9999px;
    --transition-normal: 0.3s ease-out;
  }

  .hero-container {
    position: relative;
    min-height: 650px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  .hero-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
  }

  .hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.7) contrast(1.1);
  }

  .hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    color: white;
    max-width: 800px;
    padding: 2rem;
  }

  .hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 0.8s ease-out;
  }

  .hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.95;
    animation: fadeInUp 0.8s ease-out 0.2s both;
  }

  .glass-card {
    background: var(--surface);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    display: block;
  }

  .glass-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    text-decoration: none;
    color: inherit;
  }

  .property-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    transition: transform var(--transition-normal);
  }

  .glass-card:hover .property-image {
    transform: scale(1.05);
  }

  .btn-primary {
    background: var(--primary);
    color: white;
    padding: 1rem 2rem;
    border: none;
    border-radius: var(--radius-full);
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    transition: all 0.15s ease-out;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }

  .btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    text-decoration: none;
    color: white;
  }

  .btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.8);
    padding: 1rem 2rem;
    border-radius: var(--radius-full);
    font-weight: 600;
    text-decoration: none;
    transition: all 0.15s ease-out;
  }

  .btn-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
    transform: translateY(-2px);
    text-decoration: none;
    color: white;
  }

  .modern-form {
    background: var(--surface-elevated);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-xl);
    padding: 2rem;
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .form-input {
    width: 100%;
    padding: 1rem 1.5rem;
    border: 2px solid #E5E7EB;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.15s ease-out;
    background: white;
    box-sizing: border-box;
  }

  .form-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
    transform: translateY(-1px);
  }

  .form-input::placeholder {
    color: #9CA3AF;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
  }

  .stat-card {
    background: var(--surface);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    padding: 1.5rem;
    text-align: center;
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all var(--transition-normal);
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
  }

  .stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary);
    display: block;
  }

  .stat-label {
    color: var(--gray-600);
    font-size: 0.9rem;
    margin-top: 0.5rem;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .grid-responsive {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
  }

  .estimation-section {
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(59, 130, 246, 0.02) 100%);
    padding: 4rem 1rem;
  }

  @media (max-width: 768px) {
    .hero-content {
      padding: 1rem;
    }
    
    .form-grid {
      grid-template-columns: 1fr;
    }
    
    .btn-container {
      flex-direction: column;
      gap: 1rem;
    }
  }
</style>

<div style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">

  <!-- Hero Section Apple Style -->
  <section class="hero-container">
    <div class="hero-bg">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/GARET2.jpg" alt="Hero immobilier moderne" />
    </div>
    <div class="hero-content">
      <h1 class="hero-title">L'immobilier, réinventé</h1>
      <p class="hero-subtitle">Découvrez une expérience immobilière moderne, élégante et efficace avec notre réseau d'experts passionnés.</p>
      <div class="btn-container" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo site_url('/biens'); ?>" class="btn-primary">🏡 Découvrir nos biens</a>
        <a href="<?php echo site_url('/agents'); ?>" class="btn-secondary">👥 Nos experts</a>
      </div>
    </div>
  </section>

  <!-- Biens en vedette -->
  <section style="max-width: 1400px; margin: auto; padding: 4rem 1rem;">
    <h2 style="font-size: 2rem; font-weight: 700; text-align: center; margin-bottom: 3rem; color: var(--gray-800);">
      ✨ Nos dernières annonces
    </h2>
    <div class="grid-responsive">
      <?php
        $biens = new WP_Query([
          'post_type' => 'bien',
          'posts_per_page' => 4,
          'orderby' => 'rand'
        ]);
        while ($biens->have_posts()) : $biens->the_post();
          $cover = get_post_meta(get_the_ID(), 'cover', true);
          $id = get_post_meta(get_the_ID(), 'supabase_id', true);
          $cover_url = $cover ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$id/cover.jpg" : get_template_directory_uri() . "/assets/no-photo.png";
          $surface = get_post_meta(get_the_ID(), 'surface_m2', true);
          $prix = get_post_meta(get_the_ID(), 'prix_vente', true);
          $ville = get_post_meta(get_the_ID(), 'ville', true);
      ?>
      <a href="<?php the_permalink(); ?>" class="glass-card">
        <img src="<?php echo esc_url($cover_url); ?>" alt="Bien immobilier" class="property-image" 
             onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/no-photo.png'" />
        <div style="padding: 1.5rem;">
          <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--gray-800);">
            <?php the_title(); ?>
          </h3>
          <p style="font-size: 0.9rem; color: var(--gray-600); margin-bottom: 1rem;">
            📍 <?php echo esc_html($ville); ?> • <?php echo esc_html($surface ?: 'NC'); ?> m²
          </p>
          <p style="font-weight: 700; color: var(--primary); font-size: 1.1rem; margin: 0;">
            <?php echo $prix ? number_format((float)$prix, 0, ',', ' ') . ' €' : 'Prix sur demande'; ?>
          </p>
        </div>
      </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </section>

  <!-- Formulaire d'estimation modernisé avec téléphone -->
  <section class="estimation-section">
    <div style="max-width: 900px; margin: 0 auto; text-align: center;">
      <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: var(--gray-800);">
        🧮 Estimez votre bien
      </h2>
      <p style="font-size: 1.1rem; margin-bottom: 3rem; color: var(--gray-600);">
        Obtenez une estimation gratuite et personnalisée de votre bien immobilier en quelques clics.
      </p>
      
      <form class="modern-form" id="estimationForm">
        <div class="form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
          <div>
            <input name="nom" type="text" placeholder="👤 Votre nom complet" required class="form-input" />
          </div>
          <div>
            <input name="email" type="email" placeholder="📧 Votre email" required class="form-input" />
          </div>
          <div>
            <input name="telephone" type="tel" placeholder="📞 Votre numéro de téléphone" required class="form-input" />
          </div>
          <div>
            <input name="type_bien" type="text" placeholder="🏠 Type de bien (maison, appartement...)" required class="form-input" />
          </div>
          <div>
            <input name="ville" type="text" placeholder="📍 Ville du bien" required class="form-input" />
          </div>
          <div>
            <input name="surface_m2" type="number" placeholder="📐 Surface habitable (m²)" required class="form-input" />
          </div>
        </div>
        <button type="submit" class="btn-primary" style="width: 100%; margin-top: 2rem; font-size: 1.1rem; justify-content: center;">
          📬 Obtenir mon estimation gratuite
        </button>
      </form>
      
      <div style="margin-top: 1.5rem;">
        <p style="font-size: 0.9rem; color: var(--gray-600); margin-bottom: 0.5rem;">
          ✅ Réponse sous 24h • 🔒 Données sécurisées • 📞 Conseils personnalisés
        </p>
        <p style="font-size: 0.85rem; color: var(--gray-500);">
          Nous vous répondrons rapidement avec une fourchette de prix estimée et des conseils d'experts.
        </p>
      </div>
    </div>
  </section>

  <!-- Stats section -->
  <section style="max-width: 1200px; margin: auto; padding: 4rem 1rem;">
    <h2 style="font-size: 2rem; font-weight: 700; text-align: center; margin-bottom: 3rem; color: var(--gray-800);">
      📊 Nos performances
    </h2>
    <div class="stats-grid">
      <div class="stat-card">
        <span class="stat-number">250+</span>
        <span class="stat-label">Biens vendus cette année</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">98%</span>
        <span class="stat-label">Clients satisfaits</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">45j</span>
        <span class="stat-label">Délai moyen de vente</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">15</span>
        <span class="stat-label">Agents experts</span>
      </div>
    </div>
  </section>

  <!-- CTA final -->
  <div style="text-align: center; padding: 4rem 1rem;">
    <a href="<?php echo site_url('/contact'); ?>" class="btn-primary" style="font-size: 1.1rem; padding: 1.2rem 2.5rem;">
      🚀 Nous rejoindre
    </a>
  </div>

</div>

<!-- Script d'estimation amélioré -->
<script>
document.getElementById("estimationForm").addEventListener("submit", async function (e) {
  e.preventDefault();
  const form = e.target;
  const btn = form.querySelector('button[type="submit"]');
  const originalText = btn.textContent;
  
  // État de chargement
  btn.textContent = '⏳ Envoi en cours...';
  btn.disabled = true;
  btn.style.opacity = '0.7';
  
  // Collecte des données avec téléphone
  const data = {
    nom: form.nom.value.trim(),
    email: form.email.value.trim(),
    telephone: form.telephone.value.trim(),
    ville: form.ville.value.trim(),
    type_bien: form.type_bien.value.trim(),
    surface_m2: form.surface_m2.value
  };
  
  // Validation basique
  if (!data.telephone.match(/^[0-9\s\-\+\(\)\.]{8,}$/)) {
    alert('⚠️ Veuillez entrer un numéro de téléphone valide');
    btn.textContent = originalText;
    btn.disabled = false;
    btn.style.opacity = '1';
    return;
  }

  try {
    const res = await fetch("https://logiciel-immo-clean.vercel.app/api/prospects", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    });

    const result = await res.json();
    
    if (result.success) {
      // Succès
      btn.textContent = '✅ Estimation envoyée avec succès !';
      btn.style.background = '#34C759';
      form.reset();
      
      // Message de confirmation
      setTimeout(() => {
        alert('🎉 Votre demande d\'estimation a été envoyée ! Notre équipe vous contactera sous 24h avec une estimation personnalisée.');
      }, 500);
      
      // Reset du bouton après 4 secondes
      setTimeout(() => {
        btn.textContent = originalText;
        btn.style.background = 'var(--primary)';
        btn.disabled = false;
        btn.style.opacity = '1';
      }, 4000);
    } else {
      throw new Error(result.error || 'Erreur inconnue');
    }
  } catch (error) {
    console.error('Erreur estimation:', error);
    btn.textContent = '❌ Erreur, veuillez réessayer';
    btn.style.background = '#FF3B30';
    
    setTimeout(() => {
      btn.textContent = originalText;
      btn.style.background = 'var(--primary)';
      btn.disabled = false;
      btn.style.opacity = '1';
    }, 3000);
  }
});

// Animation au scroll pour les cartes
function animateCards() {
  const cards = document.querySelectorAll('.glass-card, .stat-card');
  cards.forEach(card => {
    const rect = card.getBoundingClientRect();
    if (rect.top < window.innerHeight * 0.8) {
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    }
  });
}

// Initialisation des animations
document.addEventListener('DOMContentLoaded', () => {
  // Préparer les cartes pour l'animation
  const cards = document.querySelectorAll('.glass-card, .stat-card');
  cards.forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
  });
  
  // Lancer l'animation
  setTimeout(animateCards, 100);
});

window.addEventListener('scroll', animateCards);
</script>

<?php get_footer(); ?>