<?php
/* Template Name: Contactez-Nous */
get_header(); 
?>

<div class="container" style="max-width: 1200px; margin: auto; padding: 3rem 1rem;">
  
  <!-- Header de la page -->
  <div class="glass-card" style="padding: 3rem; text-align: center; margin-bottom: 3rem;">
    <h1 class="text-display" style="color: var(--primary); margin-bottom: 1rem;">💬 Contactez-nous</h1>
    <p style="font-size: 1.2rem; color: var(--gray-600); max-width: 600px; margin: 0 auto; line-height: 1.6;">
      Vous avez un projet immobilier ? Une question sur nos services ? Notre équipe d'experts est là pour vous accompagner et vous conseiller.
    </p>
  </div>

  <!-- Grid principal -->
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;">
    
    <!-- Formulaire de contact -->
    <div class="glass-card" style="padding: 2.5rem;">
      <h2 class="text-title-1" style="color: var(--primary); margin-bottom: 2rem;">📝 Envoyez-nous un message</h2>
      
      <form id="contactForm" class="modern-form" style="background: transparent; box-shadow: none; border: none; padding: 0;">
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
          <div class="form-group">
            <input type="text" name="prenom" placeholder="Prénom" required class="form-input">
          </div>
          <div class="form-group">
            <input type="text" name="nom" placeholder="Nom" required class="form-input">
          </div>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
          <div class="form-group">
            <input type="email" name="email" placeholder="Votre email" required class="form-input">
          </div>
          <div class="form-group">
            <input type="tel" name="telephone" placeholder="Votre téléphone" class="form-input">
          </div>
        </div>
        
        <div class="form-group">
          <select name="sujet" class="form-input" required>
            <option value="">Choisissez le sujet de votre demande</option>
            <option value="estimation">🏠 Estimation gratuite de mon bien</option>
            <option value="achat">🔍 Recherche d'un bien à acheter</option>
            <option value="vente">💰 Vendre mon bien immobilier</option>
            <option value="location">🔑 Gestion locative</option>
            <option value="recrutement">🚀 Rejoindre le réseau Oi Immo</option>
            <option value="partenariat">🤝 Partenariat professionnel</option>
            <option value="autre">❓ Autre demande</option>
          </select>
        </div>
        
        <div class="form-group">
          <input type="text" name="ville" placeholder="Ville concernée (optionnel)" class="form-input">
        </div>
        
        <div class="form-group">
          <textarea name="message" placeholder="Détaillez votre demande..." rows="6" class="form-input" required></textarea>
        </div>
        
        <!-- Checkbox RGPD -->
        <div style="display: flex; align-items: flex-start; gap: 0.5rem; margin-bottom: 1.5rem;">
          <input type="checkbox" id="rgpd" name="rgpd" required style="margin-top: 0.2rem;">
          <label for="rgpd" style="font-size: 0.9rem; color: var(--gray-600); line-height: 1.5;">
            J'accepte que mes données soient utilisées pour traiter ma demande. 
            <a href="/politique-confidentialite" style="color: var(--primary);">Voir notre politique de confidentialité</a>
          </label>
        </div>
        
        <button type="submit" class="btn-primary" style="width: 100%; font-size: 1.1rem;">
          ✉️ Envoyer mon message
        </button>
        
        <div style="margin-top: 1rem; text-align: center; font-size: 0.9rem; color: var(--gray-500);">
          ⚡ Réponse garantie sous 24h • 🔒 Données sécurisées
        </div>
      </form>
    </div>
    
    <!-- Informations de contact -->
    <div>
      
      <!-- Contact direct -->
      <div class="glass-card" style="padding: 2rem; margin-bottom: 2rem;">
        <h3 style="color: var(--primary); margin-bottom: 1.5rem;">📞 Contact direct</h3>
        
        <div style="display: flex; flex-direction: column; gap: 1rem;">
          <a href="tel:0123456789" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(52, 199, 89, 0.1); border: 1px solid rgba(52, 199, 89, 0.2); border-radius: var(--radius-md); text-decoration: none; color: var(--success); font-weight: 600; transition: all var(--transition-fast);">
            <span style="font-size: 1.5rem;">📞</span>
            <div>
              <div>Appelez-nous maintenant</div>
              <div style="font-size: 0.9rem; opacity: 0.8;">01 23 45 67 89</div>
            </div>
          </a>
          
          <a href="mailto:contact@oi-immo.fr" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(249, 115, 22, 0.1); border: 1px solid rgba(249, 115, 22, 0.2); border-radius: var(--radius-md); text-decoration: none; color: var(--primary); font-weight: 600; transition: all var(--transition-fast);">
            <span style="font-size: 1.5rem;">✉️</span>
            <div>
              <div>Email général</div>
              <div style="font-size: 0.9rem; opacity: 0.8;">contact@oi-immo.fr</div>
            </div>
          </a>
          
          <a href="https://wa.me/33123456789" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(37, 211, 102, 0.1); border: 1px solid rgba(37, 211, 102, 0.2); border-radius: var(--radius-md); text-decoration: none; color: #25D366; font-weight: 600; transition: all var(--transition-fast);">
            <span style="font-size: 1.5rem;">💬</span>
            <div>
              <div>WhatsApp Business</div>
              <div style="font-size: 0.9rem; opacity: 0.8;">Message instantané</div>
            </div>
          </a>
        </div>
      </div>
      
      <!-- Horaires -->
      <div class="glass-card" style="padding: 2rem; margin-bottom: 2rem;">
        <h3 style="color: var(--primary); margin-bottom: 1.5rem;">⏰ Nos horaires</h3>
        <div style="color: var(--gray-700); line-height: 1.8;">
          <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
            <span>Lundi - Vendredi</span>
            <strong>9h00 - 19h00</strong>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
            <span>Samedi</span>
            <strong>9h00 - 17h00</strong>
          </div>
          <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
            <span>Dimanche</span>
            <strong>Sur rendez-vous</strong>
          </div>
          <div style="background: rgba(249, 115, 22, 0.1); padding: 1rem; border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.2); text-align: center;">
            <div style="font-weight: 600; color: var(--primary);">🚨 Urgences immobilières</div>
            <div style="font-size: 0.9rem;">Disponible 7j/7 pour vos urgences</div>
          </div>
        </div>
      </div>
      
      <!-- Réseaux sociaux -->
      <div class="glass-card" style="padding: 2rem;">
        <h3 style="color: var(--primary); margin-bottom: 1.5rem;">🌐 Suivez-nous</h3>
        <div style="display: flex; gap: 1rem;">
          <a href="#" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 1rem; background: #1877F2; color: white; text-decoration: none; border-radius: var(--radius-md); font-weight: 600; transition: transform var(--transition-fast);" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            📘 Facebook
          </a>
          <a href="#" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 1rem; background: #E4405F; color: white; text-decoration: none; border-radius: var(--radius-md); font-weight: 600; transition: transform var(--transition-fast);" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
            📷 Instagram
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Section FAQ -->
  <div class="glass-card" style="padding: 2.5rem;">
    <h2 class="text-title-1" style="color: var(--primary); margin-bottom: 2rem; text-align: center;">❓ Questions fréquentes</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
      
      <div style="background: rgba(249, 115, 22, 0.05); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">💰 L'estimation est-elle vraiment gratuite ?</h4>
        <p style="color: var(--gray-700); font-size: 0.95rem; line-height: 1.6;">
          Oui, absolument ! Notre estimation est 100% gratuite et sans engagement. Nous analysons votre bien selon les critères du marché local.
        </p>
      </div>
      
      <div style="background: rgba(249, 115, 22, 0.05); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">⏱️ Quel délai pour vendre mon bien ?</h4>
        <p style="color: var(--gray-700); font-size: 0.95rem; line-height: 1.6;">
          En moyenne 45 jours pour nos biens bien positionnés. Tout dépend du prix, de l'emplacement et de l'état du bien.
        </p>
      </div>
      
      <div style="background: rgba(249, 115, 22, 0.05); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">🏠 Intervenez-vous partout en France ?</h4>
        <p style="color: var(--gray-700); font-size: 0.95rem; line-height: 1.6;">
          Notre réseau couvre la France entière. Trouvez votre agent local ou contactez-nous pour connaître notre présence dans votre secteur.
        </p>
      </div>
      
      <div style="background: rgba(249, 115, 22, 0.05); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.1);">
        <h4 style="color: var(--primary); margin-bottom: 0.5rem;">💼 Comment rejoindre votre réseau ?</h4>
        <p style="color: var(--gray-700); font-size: 0.95rem; line-height: 1.6;">
          Consultez notre page <a href="/recrutement" style="color: var(--primary);">recrutement</a> ou contactez-nous directement pour en savoir plus sur les opportunités.
        </p>
      </div>
    </div>
  </div>

  <!-- Bouton retour -->
  <div style="text-align: center; margin-top: 3rem;">
    <a href="<?php echo home_url('/'); ?>" class="btn-secondary">
      ← Retour à l'accueil
    </a>
  </div>
</div>

<script>
  document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const btn = e.target.querySelector('button[type="submit"]');
    const originalText = btn.textContent;
    
    // Loading state
    btn.textContent = '⏳ Envoi en cours...';
    btn.disabled = true;
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);
    
    try {
      // Simuler l'envoi (remplacez par votre endpoint)
      await new Promise(resolve => setTimeout(resolve, 2000));
      
      // Success state
      btn.textContent = '✅ Message envoyé !';
      btn.style.background = 'var(--success)';
      e.target.reset();
      
      // Alert de succès
      const alertDiv = document.createElement('div');
      alertDiv.className = 'alert alert-success';
      alertDiv.textContent = 'Votre message a été envoyé avec succès ! Nous vous recontacterons rapidement.';
      e.target.parentNode.insertBefore(alertDiv, e.target);
      
      // Reset après 3 secondes
      setTimeout(() => {
        btn.textContent = originalText;
        btn.style.background = 'var(--primary)';
        btn.disabled = false;
        if (alertDiv.parentNode) {
          alertDiv.remove();
        }
      }, 3000);
      
    } catch (error) {
      // Error state
      btn.textContent = '❌ Erreur, réessayez';
      btn.style.background = 'var(--danger)';
      
      setTimeout(() => {
        btn.textContent = originalText;
        btn.style.background = 'var(--primary)';
        btn.disabled = false;
      }, 3000);
    }
  });
</script>

<?php get_footer(); ?>