<?php
/* Template Name: Nos Services */
get_header(); ?>

<style>
section.service {
  padding: 4rem 1.5rem;
  max-width: 1200px;
  margin: auto;
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}
.service-header {
  text-align: center;
  margin-bottom: 4rem;
}
.service-header h1 {
  font-size: 3rem;
  font-weight: 700;
}
.service-header p {
  font-size: 1.2rem;
  color: #555;
  margin-top: 1rem;
}
.service-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 2rem;
}
.service-card {
  background: #fff;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 20px 50px rgba(0,0,0,0.05);
  transition: transform 0.3s ease;
}
.service-card:hover {
  transform: translateY(-6px);
}
.service-card h3 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: #f97316;
}
.service-card p {
  font-size: 1rem;
  color: #333;
  line-height: 1.6;
}
</style>

<section class="service">
  <div class="service-header">
    <h1>Nos Services</h1>
    <p>Chaque projet immobilier mérite l'excellence. Découvrez comment nous transformons vos ambitions en réalité.</p>
  </div>

  <div class="service-grid">

    <!-- Achat -->
    <div class="service-card">
      <h3>📦 Achat sur mesure</h3>
      <p>Accédez à une sélection exclusive de biens, négociés et validés pour vous. Nos agents dénichent la perle rare, avec passion, discrétion et efficacité.</p>
    </div>

    <!-- Estimation -->
    <div class="service-card">
      <h3>📏 Estimation précise</h3>
      <p>Vendez vite et bien grâce à notre estimation professionnelle et stratégique. Positionnez votre bien au bon prix dès le départ, et faites la différence dès la première visite.</p>
    </div>

    <!-- Gestion -->
    <div class="service-card">
      <h3>🔑 Gestion locative</h3>
      <p>Déléguez la gestion de votre patrimoine à des pros. Nous assurons le suivi, la rentabilité et la tranquillité. Vous profitez, on s’occupe de tout.</p>
    </div>

    <!-- Recrutement -->
    <div class="service-card">
      <h3>🚀 Devenez un Agent Référent</h3>
      <p>Envie de liberté et de réussite ? Rejoignez un réseau humain, moderne et innovant. Open Immobilier vous propulse avec des outils premium et une image forte. Osez le changement.</p>
    </div>

  </div>
</section>

<?php get_footer(); ?>
