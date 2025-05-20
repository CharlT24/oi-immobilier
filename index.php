<?php get_header(); ?>

<section style="padding: 6rem 2rem; text-align: center; max-width: 1000px; margin: auto;">
    <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem; color: #111;">L’immobilier, réinventé</h1>
    <p style="font-size: 1.2rem; color: #555; max-width: 600px; margin: 0 auto 3rem;">Explorez des biens d'exception, rencontrez des agents de confiance et découvrez une expérience immobilière élégante et efficace.</p>
    <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
        <a href="<?php echo site_url('/biens'); ?>" style="background: #F97316; color: white; padding: 1rem 2rem; border-radius: 999px; font-weight: bold; text-decoration: none; transition: 0.3s;">Voir les biens</a>
        <a href="<?php echo site_url('/agents'); ?>" style="border: 2px solid #F97316; color: #F97316; padding: 1rem 2rem; border-radius: 999px; font-weight: bold; text-decoration: none; transition: 0.3s;">Nos agents</a>
    </div>
</section>

<section style="background: #f9f9f9; padding: 4rem 2rem; text-align: center;">
    <h2 style="font-size: 2rem; margin-bottom: 2rem;">Pourquoi choisir Oi Immo ?</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 2rem; max-width: 1000px; margin: auto;">
        <div style="padding: 2rem; background: white; border-radius: 16px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
            <h3 style="color: #F97316;">Biens triés sur le volet</h3>
            <p style="color: #555;">Des sélections exclusives, vérifiées et toujours bien présentées.</p>
        </div>
        <div style="padding: 2rem; background: white; border-radius: 16px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
            <h3 style="color: #F97316;">Agents passionnés</h3>
            <p style="color: #555;">Un accompagnement humain, transparent et dédié à vos projets.</p>
        </div>
        <div style="padding: 2rem; background: white; border-radius: 16px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
            <h3 style="color: #F97316;">Technologie de pointe</h3>
            <p style="color: #555;">Un site rapide, fluide et intelligent, connecté à votre CRM.</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
