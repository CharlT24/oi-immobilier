<!-- Footer moderne style Apple -->
<footer style="background: var(--surface-blur); backdrop-filter: blur(20px); border-top: 1px solid rgba(255, 255, 255, 0.2); margin-top: 4rem; padding: 3rem 0 2rem;">
  <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    
    <!-- Grid footer -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
      
      <!-- Logo et description -->
      <div>
        <div style="margin-bottom: 1rem;">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Oi Immo" style="height: 50px;">
        </div>
        <p style="color: var(--gray-600); line-height: 1.6; margin-bottom: 1rem;">
          L'immobilier moderne et humain. Découvrez une nouvelle façon d'acheter, vendre et investir avec nos experts passionnés.
        </p>
        <div style="display: flex; gap: 1rem;">
          <a href="#" style="color: var(--gray-500); transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">📘 Facebook</a>
          <a href="#" style="color: var(--gray-500); transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">📷 Instagram</a>
          <a href="#" style="color: var(--gray-500); transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">🐦 Twitter</a>
        </div>
      </div>
      
      <!-- Navigation -->
      <div>
        <h4 style="color: var(--gray-800); font-weight: 600; margin-bottom: 1rem;">Navigation</h4>
        <ul style="list-style: none; padding: 0; margin: 0;">
          <li style="margin-bottom: 0.5rem;">
            <a href="<?php echo home_url('/'); ?>" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Accueil</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="<?php echo site_url('/biens'); ?>" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Nos biens</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="<?php echo site_url('/reseau'); ?>" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Notre réseau</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="<?php echo site_url('/nos-services'); ?>" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Nos services</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="<?php echo site_url('/contact'); ?>" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Contact</a>
          </li>
        </ul>
      </div>
      
      <!-- Services -->
      <div>
        <h4 style="color: var(--gray-800); font-weight: 600; margin-bottom: 1rem;">Services</h4>
        <ul style="list-style: none; padding: 0; margin: 0;">
          <li style="margin-bottom: 0.5rem;">
            <a href="#" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Estimation gratuite</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="#" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Achat immobilier</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="#" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Vente immobilière</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="#" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Gestion locative</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="<?php echo site_url('/recrutement'); ?>" style="color: var(--gray-600); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-600)'">Nous rejoindre</a>
          </li>
        </ul>
      </div>
      
      <!-- Contact -->
      <div>
        <h4 style="color: var(--gray-800); font-weight: 600; margin-bottom: 1rem;">Contact</h4>
        <div style="color: var(--gray-600); line-height: 1.6;">
          <div style="margin-bottom: 0.5rem;">📧 contact@oi-immo.fr</div>
          <div style="margin-bottom: 0.5rem;">📞 01 23 45 67 89</div>
          <div style="margin-bottom: 1rem;">📍 France entière</div>
          
          <div style="background: rgba(249, 115, 22, 0.1); padding: 1rem; border-radius: var(--radius-md); border: 1px solid rgba(249, 115, 22, 0.2);">
            <div style="font-weight: 600; color: var(--primary); margin-bottom: 0.5rem;">Newsletter</div>
            <div style="font-size: 0.9rem; margin-bottom: 1rem;">Restez informé de nos dernières annonces</div>
            <form style="display: flex; gap: 0.5rem;">
              <input type="email" placeholder="Votre email" style="flex: 1; padding: 0.5rem; border: 1px solid var(--gray-300); border-radius: var(--radius-sm); font-size: 0.9rem;">
              <button type="submit" style="background: var(--primary); color: white; border: none; padding: 0.5rem 1rem; border-radius: var(--radius-sm); font-size: 0.9rem; cursor: pointer;">OK</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Séparateur -->
    <div style="height: 1px; background: rgba(255, 255, 255, 0.2); margin: 2rem 0;"></div>
    
    <!-- Copyright -->
    <div style="display: flex; justify-content: between; align-items: center; flex-wrap: wrap; gap: 1rem; font-size: 0.9rem; color: var(--gray-500);">
      <div>
        © <?php echo date('Y'); ?> Oi Immo. Tous droits réservés.
      </div>
      <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
        <a href="/mentions-legales" style="color: var(--gray-500); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">Mentions légales</a>
        <a href="/politique-confidentialite" style="color: var(--gray-500); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">Confidentialité</a>
        <a href="/cgu" style="color: var(--gray-500); text-decoration: none; transition: color var(--transition-fast);" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--gray-500)'">CGU</a>
        <span>Propulsé par <strong style="color: var(--primary);">Oi Technologie</strong></span>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>