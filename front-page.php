<?php
/*
Template Name: Front Page
*/
get_header();
?>

<style>
  .search-bar {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 2rem;
  }
  .search-bar input {
    flex: 1;
    border: none;
    font-size: 1rem;
    padding: 0.7rem;
    border-radius: 6px;
    background: #f3f4f6;
  }
  .search-bar button {
    background-color: #f97316;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.7rem 1.2rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
  }
  .search-bar button:hover {
    background-color: #ea580c;
  }
  .card-bien {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    transition: transform 0.3s;
    background: white;
    display: flex;
    flex-direction: column;
  }
  .card-bien:hover {
    transform: translateY(-5px);
  }
</style>

<div style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">

  <!-- ✅ Hero Image -->
  <div style="position: relative;">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/GARET2.jpg" alt="hero" style="width: 100%; max-height: 650px; object-fit: cover;">
    <div style="position: absolute; top: 20px; left: 20px;">
      <?php
        if (function_exists('the_custom_logo') && has_custom_logo()) {
          the_custom_logo();
        } else {
          echo '<h1 style="color:white;font-size:1.5rem;">Oi Immo</h1>';
        }
      ?>
    </div>
  </div>

  <!-- ✅ Biens -->
  <section style="max-width: 1400px; margin: auto; padding: 4rem 1rem;">
    <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 2rem;">Nos dernières annonces</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
      <?php
        $biens = new WP_Query([
          'post_type' => 'bien',
          'posts_per_page' => 4,
          'orderby' => 'rand'
        ]);
        while ($biens->have_posts()) : $biens->the_post();
          $cover = get_post_meta(get_the_ID(), 'cover', true);
          $id = get_post_meta(get_the_ID(), 'supabase_id', true);
          $cover_url = $cover ? "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$id/cover.jpg" : "/no-photo.jpg";
          $surface = get_post_meta(get_the_ID(), 'surface_m2', true);
          $prix = get_post_meta(get_the_ID(), 'prix_vente', true);
          $ville = get_post_meta(get_the_ID(), 'ville', true);
      ?>
      <a href="<?php the_permalink(); ?>" class="card-bien">
        <img src="<?php echo esc_url($cover_url); ?>" alt="cover" style="width: 100%; height: 180px; object-fit: cover;">
        <div style="padding: 1rem;">
          <h3 style="font-size: 1.1rem; font-weight: bold;"><?php the_title(); ?></h3>
          <p style="font-size: 0.9rem; color: #666;"><?php echo esc_html($ville); ?></p>
          <p style="font-weight: 500; margin-top: 0.5rem;"><?php echo $surface; ?> m² — <?php echo number_format($prix, 0, ',', ' '); ?> €</p>
        </div>
      </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </section>

<!-- ✅ Estimation simplifiée -->
<section style="max-width: 1200px; margin: auto; padding: 3rem 1rem;">
  <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">🧮 Estimez votre bien</h2>
  <form id="estimationForm" style="background: #fff; border-radius: 12px; padding: 2rem; box-shadow: 0 5px 20px rgba(0,0,0,0.05); display: grid; gap: 1rem;">
    <input name="nom" type="text" placeholder="Votre nom" required style="padding: 0.7rem; border-radius: 6px; border: 1px solid #ddd;" />
    <input name="email" type="email" placeholder="Votre email" required style="padding: 0.7rem; border-radius: 6px; border: 1px solid #ddd;" />
    <input name="type_bien" type="text" placeholder="Type de bien (maison, appart...)" required style="padding: 0.7rem; border-radius: 6px; border: 1px solid #ddd;" />
    <input name="ville" type="text" placeholder="Ville du bien" required style="padding: 0.7rem; border-radius: 6px; border: 1px solid #ddd;" />
    <input name="surface_m2" type="number" placeholder="Surface habitable (m²)" required style="padding: 0.7rem; border-radius: 6px; border: 1px solid #ddd;" />
    <button type="submit" style="background: #f97316; color: white; padding: 0.8rem; border-radius: 8px; font-weight: bold; font-size: 1rem;">📬 Obtenir une estimation</button>
  </form>
  <p style="font-size: 0.85rem; color: #888; margin-top: 0.5rem;">Nous vous répondrons sous 24h avec une fourchette de prix estimée.</p>
</section>

<script>
  document.getElementById("estimationForm").addEventListener("submit", async function (e) {
    e.preventDefault();
    const form = e.target;

    const data = {
      nom: form.nom.value,
      email: form.email.value,
      ville: form.ville.value,
      type_bien: form.type_bien.value,
      surface_m2: form.surface_m2.value
    };

    const res = await fetch("https://logiciel-immo-clean.vercel.app/api/prospects", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    });

    const result = await res.json();
    if (result.success) {
      alert("✅ Estimation bien reçue !");
      form.reset();
    } else {
      alert("❌ Erreur : " + result.error);
    }
  });
</script>

  <!-- ✅ Carte + recherche -->
  <section style="max-width: 1200px; margin: auto; padding: 2rem 1rem;">
    <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 1.5rem;">Notre réseau</h2>

    <!-- 🔍 Barre de recherche -->
    <div class="search-bar">
      <input type="text" id="search-agent" placeholder="Rechercher un mandataire par nom ou ville..." oninput="filterAgents()" />
      <button onclick="filterAgents()">Rechercher</button>
    </div>

    <!-- 🗺️ Leaflet Map -->
    <div id="map" style="height: 450px; border-radius: 16px;"></div>
  </section>

  <!-- ✅ Bouton nous rejoindre -->
  <div style="text-align: center; padding: 4rem 1rem;">
    <a href="/contact" class="hover:scale-105 transition" style="background: #f97316; color: white; padding: 1rem 2rem; border-radius: 50px; font-size: 1.1rem; font-weight: 600; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
      🚀 Nous rejoindre
    </a>
  </div>

  <!-- ✅ Footer -->
  <footer style="text-align: center; font-size: 0.8rem; color: #888; padding-bottom: 3rem;">
    <p><a href="/mentions-legales" style="color: #888;">Mentions légales</a> • propulsé par <strong>Oi Technologie</strong></p>
  </footer>

</div>

<!-- ✅ Leaflet JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  const agents = <?php
    $agents = get_posts([
      'post_type' => 'mandataire',
      'numberposts' => -1
    ]);
    $json = [];
    foreach ($agents as $a) {
      $json[] = [
        'nom' => $a->post_title,
        'ville' => get_post_meta($a->ID, 'ville', true)
      ];
    }
    echo json_encode($json);
  ?>;

  const map = L.map('map').setView([46.5, 2.5], 5);
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: '© OSM',
    minZoom: 2,
    maxZoom: 18
  }).addTo(map);

  async function geocode(ville) {
    const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${ville}`);
    const data = await response.json();
    if (data.length > 0) return [parseFloat(data[0].lat), parseFloat(data[0].lon)];
    return null;
  }

  async function displayAgents() {
    for (let agent of agents) {
      const coords = await geocode(agent.ville);
      if (coords) {
        L.marker(coords).addTo(map).bindPopup(`<strong>${agent.nom}</strong><br>${agent.ville}`);
      }
    }
  }

  displayAgents();

  function filterAgents() {
    const input = document.getElementById("search-agent").value.toLowerCase();
    map.eachLayer(layer => {
      if (layer instanceof L.Marker) map.removeLayer(layer);
    });

    agents
      .filter(a => a.nom.toLowerCase().includes(input) || a.ville.toLowerCase().includes(input))
      .forEach(async a => {
        const coords = await geocode(a.ville);
        if (coords) {
          L.marker(coords).addTo(map).bindPopup(`<strong>${a.nom}</strong><br>${a.ville}`).openPopup();
        }
      });
  }
</script>

<?php get_footer(); ?>
