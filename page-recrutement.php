<?php
/* Template Name: Recrutement */
get_header(); ?>

<style>
section.recrutement {
  max-width: 1200px;
  margin: auto;
  padding: 4rem 1.5rem;
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
}
.recrutement h1 {
  font-size: 3rem;
  text-align: center;
  font-weight: 700;
  margin-bottom: 1rem;
}
.recrutement .intro {
  text-align: center;
  font-size: 1.2rem;
  color: #555;
  margin-bottom: 4rem;
  line-height: 1.6;
}
.blocs {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  margin-bottom: 4rem;
}
.bloc {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 20px 60px rgba(0,0,0,0.06);
  transition: transform 0.3s ease;
}
.bloc:hover {
  transform: translateY(-6px);
}
.bloc h3 {
  font-size: 1.4rem;
  color: #f97316;
  margin-bottom: 1rem;
}
.bloc p {
  color: #333;
  font-size: 1rem;
  line-height: 1.6;
}
.cta {
  text-align: center;
  margin-top: 3rem;
}
.cta a {
  display: inline-block;
  background: #f97316;
  color: white;
  padding: 1rem 2rem;
  border-radius: 12px;
  font-weight: bold;
  font-size: 1.1rem;
  text-decoration: none;
  transition: background 0.3s;
}
.cta a:hover {
  background: #ea6c0f;
}
</style>

<section class="recrutement">

  <h1>Rejoignez l’Aventure Open Immobilier</h1>
  <p class="intro">Vous rêvez de liberté, d’ambition et de réussite ? Chez Open Immobilier, nous construisons chaque jour une nouvelle façon de faire de l’immobilier, plus humaine, plus moderne, plus impactante.</p>

  <div class="blocs">

    <div class="bloc">
      <h3>🌍 Un réseau solide & reconnu</h3>
      <p>Profitez d’une marque nationale à la notoriété grandissante, tout en conservant votre liberté d’action. Open Immobilier vous offre une vraie visibilité sur votre secteur.</p>
    </div>

    <div class="bloc">
      <h3>🎓 Accompagnement & formation</h3>
      <p>Dès le départ, vous bénéficiez d’un parcours d’intégration complet, de formations régulières, et d’un accompagnement personnalisé pour monter en compétences rapidement.</p>
    </div>

    <div class="bloc">
      <h3>🛠️ Outils dernière génération</h3>
      <p>CRM intelligent, signature électronique, sites personnalisés, supports de com’ clé en main… vous avez tout pour réussir avec une image professionnelle dès le 1er jour.</p>
    </div>

    <div class="bloc">
      <h3>🚀 Liberté & autonomie</h3>
      <p>Choisissez vos horaires, développez votre réseau à votre rythme, soyez indépendant tout en étant soutenu. C’est votre activité, vos objectifs, votre réussite.</p>
    </div>

    <div class="bloc">
      <h3>💼 Pour tous les profils</h3>
      <p>Débutant(e) ou expérimenté(e), en reconversion ou déjà dans l’immobilier ? Nous vous donnons les moyens de performer et de vous épanouir dans un métier passionnant.</p>
    </div>

    <div class="bloc">
      <h3>❤️ Une équipe humaine & engagée</h3>
      <p>Nous croyons aux vraies relations, à la transparence et à l’esprit d’équipe. Ici, vous n’êtes jamais seul : notre réseau est à taille humaine, et ça change tout.</p>
    </div>

  </div>

  <div class="cta">
    <p>Prêt(e) à changer de vie ? À écrire un nouveau chapitre ?</p>
    <a href="<?php echo site_url('/contact'); ?>">Nous Rejoindre</a>
  </div>

</section>

<?php get_footer(); ?>
