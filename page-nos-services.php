<?php
/* Template Name: Nos Services */
get_header(); 
?>

<div class="container" style="max-width: 1200px; margin: auto; padding: 3rem 1rem;">
  
  <!-- Header de la page -->
  <div class="glass-card" style="padding: 4rem; text-align: center; margin-bottom: 4rem;">
    <h1 class="text-display" style="color: var(--primary); margin-bottom: 1.5rem;">🎯 Nos Services</h1>
    <p style="font-size: 1.3rem; color: var(--gray-600); max-width: 800px; margin: 0 auto; line-height: 1.6;">
      Chaque projet immobilier mérite l'excellence. Découvrez comment nous transformons vos ambitions en réalité avec nos services sur mesure.
    </p>
  </div>

  <!-- Services principaux -->
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2.5rem; margin-bottom: 4rem;">
    
    <!-- Service Achat -->
    <div class="glass-card" style="padding: 2.5rem; text-align: center; position: relative; overflow: hidden;">
      <div style="position: absolute; top: -50px; right: -50px; width: 100px; height: 100px; background: rgba(249, 115, 22, 0.1); border-radius: 50%; z-index: 0;"></div>
      <div style="position: relative; z-index: 1;">
        <div style="font-size: 3rem; margin-bottom: 1.5rem;">🏠</div>
        <h3 style="color: var(--primary); font-size: 1.5rem; margin-bottom: 1rem;">Achat sur mesure</h3>
        <p style="color: var(--gray-700); line-height: 1.7; margin-bottom: 2rem;">
          Accédez à une sélection exclusive de biens, négociés et validés pour vous. Nos agents dénichent la perle rare, avec passion, discrétion et efficacité.
        </p>
        
        <!-- Avantages -->
        <div style="text-align: left; margin-bottom: 2rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Recherche personnalisée selon vos critères</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Négociation professionnelle du prix</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Accompagnement jusqu'à la signature</span>
          </div>
        </div>
        
        <a href="#contact-achat" class="btn-primary" style="font-size: 0.95rem;">
          🔍 Commencer ma recherche
        </a>
      </div>
    </div>

    <!-- Service Vente -->
    <div class="glass-card" style="padding: 2.5rem; text-align: center; position: relative; overflow: hidden;">
      <div style="position: absolute; top: -50px; right: -50px; width: 100px; height: 100px; background: rgba(52, 199, 89, 0.1); border-radius: 50%; z-index: 0;"></div>
      <div style="position: relative; z-index: 1;">
        <div style="font-size: 3rem; margin-bottom: 1.5rem;">💰</div>
        <h3 style="color: var(--success); font-size: 1.5rem; margin-bottom: 1rem;">Vente optimisée</h3>
        <p style="color: var(--gray-700); line-height: 1.7; margin-bottom: 2rem;">
          Vendez vite et bien grâce à notre stratégie marketing digitale et notre estimation professionnelle. Positionnez votre bien au bon prix dès le départ.
        </p>
        
        <!-- Avantages -->
        <div style="text-align: left; margin-bottom: 2rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Estimation gratuite et précise</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Photos professionnelles et visite virtuelle</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Diffusion sur 100+ portails immobiliers</span>
          </div>
        </div>
        
        <a href="#contact-vente" class="btn-primary" style="background: var(--success); font-size: 0.95rem;">
          📏 Estimer mon bien
        </a>
      </div>
    </div>

    <!-- Service Location -->
    <div class="glass-card" style="padding: 2.5rem; text-align: center; position: relative; overflow: hidden;">
      <div style="position: absolute; top: -50px; right: -50px; width: 100px; height: 100px; background: rgba(59, 130, 246, 0.1); border-radius: 50%; z-index: 0;"></div>
      <div style="position: relative; z-index: 1;">
        <div style="font-size: 3rem; margin-bottom: 1.5rem;">🔑</div>
        <h3 style="color: var(--secondary); font-size: 1.5rem; margin-bottom: 1rem;">Gestion locative</h3>
        <p style="color: var(--gray-700); line-height: 1.7; margin-bottom: 2rem;">
          Déléguez la gestion de votre patrimoine à des professionnels. Nous assurons le suivi, la rentabilité et votre tranquillité d'esprit.
        </p>
        
        <!-- Avantages -->
        <div style="text-align: left; margin-bottom: 2rem;">
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Recherche et sélection de locataires</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Gestion des loyers et charges</span>
          </div>
          <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem; color: var(--gray-600);">
            <span style="color: var(--success);">✅</span>
            <span>Suivi technique et administratif</span>
          </div>
        </div>
        
        <a href="#contact-gestion" class="btn-primary" style="background: var(--secondary); font-size: 0.95rem;">
          🏢 Gérer mon bien
        </a>
      </div>
    </div>
  </div>

  <!-- Section processus -->
  <div class="glass-card" style="padding: 3rem; margin-bottom: 4rem;">
    <h2 class="text-title-1" style="color: var(--primary); text-align: center; margin-bottom: 3rem;">🚀 Notre méthode en 4 étapes</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
      
      <div style="text-align: center;">
        <div style="width: 80px; height: 80px; background: rgba(249, 115, 22, 0.1); border: 3px solid var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; font-weight: 700; color: var(--primary);">
          1
        </div>
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">Analyse personnalisée</h4>
        <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.6;">
          Nous étudions votre projet, vos besoins et votre situation pour vous proposer la meilleure stratégie.
        </p>
      </div>
      
      <div style="text-align: center;">
        <div style="width: 80px; height: 80px; background: rgba(249, 115, 22, 0.1); border: 3px solid var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; font-weight: 700; color: var(--primary);">
          2
        </div>
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">Mise en action</h4>
        <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.6;">
          Nous mettons en œuvre tous les moyens nécessaires : estimation, recherche, marketing, négociation.
        </p>
      </div>
      
      <div style="text-align: center;">
        <div style="width: 80px; height: 80px; background: rgba(249, 115, 22, 0.1); border: 3px solid var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; font-weight: 700; color: var(--primary);">
          3
        </div>
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">Suivi transparent</h4>
        <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.6;">
          Vous êtes informé en temps réel de l'avancement. Transparence totale sur nos actions et résultats.
        </p>
      </div>
      
      <div style="text-align: center;">
        <div style="width: 80px; height: 80px; background: rgba(249, 115, 22, 0.1); border: 3px solid var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; font-weight: 700; color: var(--primary);">
          4
        </div>
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">Finalisation sereine</h4>
        <p style="color: var(--gray-600); font-size: 0.95rem; line-height: 1.6;">
          Nous vous accompagnons jusqu'à la signature finale et au-delà pour votre entière satisfaction.
        </p>
      </div>
    </div>
  </div>

  <!-- Section spécialisations -->
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 4rem;">
    
    <!-- Types de biens -->
    <div class="glass-card" style="padding: 2.5rem;">
      <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 2rem; text-align: center;">🏘️ Nos spécialisations</h3>
      
      <div style="display: grid; gap: 1rem;">
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(249, 115, 22, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
          <span style="font-size: 1.5rem;">🏠</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Maisons individuelles</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Pavillons, villas, maisons de caractère</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(249, 115, 22, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
          <span style="font-size: 1.5rem;">🏢</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Appartements</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Du studio au penthouse</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(249, 115, 22, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
          <span style="font-size: 1.5rem;">🌿</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Terrains constructibles</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Viabilisés et prêts à construire</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(249, 115, 22, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
          <span style="font-size: 1.5rem;">🏪</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Locaux commerciaux</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Bureaux, commerces, entrepôts</div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Zones géographiques -->
    <div class="glass-card" style="padding: 2.5rem;">
      <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 2rem; text-align: center;">🗺️ Zones d'intervention</h3>
      
      <div style="display: grid; gap: 1rem;">
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(52, 199, 89, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(52, 199, 89, 0.1);">
          <span style="font-size: 1.5rem;">🌍</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">France entière</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Réseau national d'agents experts</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(52, 199, 89, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(52, 199, 89, 0.1);">
          <span style="font-size: 1.5rem;">🏙️</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Grandes métropoles</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Paris, Lyon, Marseille, Toulouse...</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(52, 199, 89, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(52, 199, 89, 0.1);">
          <span style="font-size: 1.5rem;">🌊</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Littoral et montagne</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Résidences secondaires et investissement</div>
          </div>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(52, 199, 89, 0.05); border-radius: var(--radius-md); border: 1px solid rgba(52, 199, 89, 0.1);">
          <span style="font-size: 1.5rem;">🌾</span>
          <div>
            <div style="font-weight: 600; color: var(--gray-800);">Zones rurales</div>
            <div style="font-size: 0.9rem; color: var(--gray-600);">Propriétés de caractère et terrains</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Service recrutement -->
  <div class="glass-card" style="padding: 3rem; text-align: center; margin-bottom: 4rem; background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(59, 130, 246, 0.03) 100%);">
    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">🚀</div>
    <h2 class="text-title-1" style="color: var(--primary); margin-bottom: 1rem;">Rejoignez notre réseau</h2>
    <p style="font-size: 1.1rem; color: var(--gray-600); max-width: 600px; margin: 0 auto 2rem; line-height: 1.6;">
      Vous rêvez de liberté, d'ambition et de réussite ? Chez Oi Immo, nous construisons une nouvelle façon de faire de l'immobilier, plus humaine et plus moderne.
    </p>
    
    <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-bottom: 2rem; font-size: 0.95rem; color: var(--gray-600);">
      <span>✅ Accompagnement personnalisé</span>
      <span>✅ Outils dernière génération</span>
      <span>✅ Liberté et autonomie</span>
      <span>✅ Formation continue</span>
    </div>
    
    <a href="<?php echo site_url('/recrutement'); ?>" class="btn-primary" style="font-size: 1.1rem; padding: 1.2rem 2.5rem;">
      👥 Découvrir les opportunités
    </a>
  </div>

  <!-- Contact final -->
  <div style="text-align: center;">
    <h2 style="color: var(--primary); margin-bottom: 1rem;">Prêt à démarrer votre projet ?</h2>
    <p style="color: var(--gray-600); margin-bottom: 2rem;">
      Contactez-nous dès maintenant pour une première consultation gratuite et personnalisée.
    </p>
    <a href="<?php echo site_url('/contact'); ?>" class="btn-primary" style="font-size: 1.1rem; padding: 1.2rem 2.5rem;">
      💬 Nous contacter
    </a>
  </div>
</div>

<?php get_footer(); ?>