<?php
// ✅ Support du logo WordPress
add_theme_support('custom-logo', array(
    'height'      => 80,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
));

// 🔓 Débloquer les appels API venant de l’extérieur (ex: depuis le CRM)
add_filter('rest_pre_serve_request', function($served, $result, $request, $server){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Authorization, Content-Type');
    return $served;
  }, 10, 4);
  

// ✅ Fonction helper pour cover
function oi_get_cover_url($post_id) {
    $cover = get_post_meta($post_id, 'cover', true);
    $supabase_id = get_post_meta($post_id, 'supabase_id', true);
    if ($cover && $supabase_id) {
        return "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/covers/$supabase_id/cover.jpg";
    }
    return get_template_directory_uri() . '/assets/no-photo.png';
}

// ✅ Fonction helper pour avatar (photo du mandataire)
function get_mandataire_avatar_url($supabase_id) {
    $base = "https://fkavtsofmglifzalclyn.supabase.co/storage/v1/object/public/photos/avatars/";
    $extensions = ['jpg', 'jpeg', 'png', 'webp'];

    foreach ($extensions as $ext) {
        $url = $base . $supabase_id . '.' . $ext;

        $response = wp_remote_head($url);
        if (!is_wp_error($response)) {
            $status_code = wp_remote_retrieve_response_code($response);
            if ($status_code === 200) {
                return $url;
            }
        }
    }

    return get_template_directory_uri() . '/assets/no-photo.png';
}

// 🚀 CPT Biens
function oi_register_post_type_bien() {
    register_post_type('bien', array(
        'labels' => array('name' => 'Biens', 'singular_name' => 'Bien'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'biens'),
        'publicly_queryable' => true,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
        'show_in_rest' => true
    ));
}
add_action('init', 'oi_register_post_type_bien');

// 🚀 CPT Agences
function oi_register_post_type_agence() {
    register_post_type('agence', array(
        'labels' => array('name' => 'Agences', 'singular_name' => 'Agence'),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'agences'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-building',
        'show_in_rest' => true
    ));
}
add_action('init', 'oi_register_post_type_agence');

// 🚀 CPT Mandataires
function oi_register_post_type_mandataire() {
    register_post_type('mandataire', array(
        'labels' => array('name' => 'Mandataires', 'singular_name' => 'Mandataire'),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'mandataires'),
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
        'menu_icon' => 'dashicons-businessman',
        'show_in_rest' => true
    ));
}
add_action('init', 'oi_register_post_type_mandataire');

// 🎯 Menu principal
add_action('after_setup_theme', function() {
    register_nav_menus([
        'primary' => 'Menu principal'
    ]);
});

// 🔁 Réception d’un bien depuis Supabase
error_log("📦 Données reçues CRM : " . print_r($data, true));

function oi_reception_bien_from_crm($request) {
    $data = $request->get_json_params();
    error_log("📦 Données reçues CRM : " . print_r($data, true));

    // 🔒 Bloquer l'import si statut "estimation"
    if (!empty($data['statut']) && strtolower($data['statut']) === 'estimation') {
        return new WP_Error('forbidden', 'Ce bien est en statut estimation et ne peut pas être exporté.', ['status' => 403]);
    }

    if (empty($data['titre']) || empty($data['id'])) {
        return new WP_Error('invalide', 'Titre ou ID manquant', ['status' => 400]);
    }

    $existing = get_posts([
        'post_type' => 'bien',
        'meta_key' => 'supabase_id',
        'meta_value' => $data['id'],
        'posts_per_page' => 1
    ]);

    if (!empty($existing)) {
        $post_id = $existing[0]->ID;
        wp_update_post([
            'ID' => $post_id,
            'post_title' => sanitize_text_field($data['titre']),
            'post_content' => sanitize_textarea_field($data['description'] ?? '')
        ]);
    } else {
        $post_id = wp_insert_post([
            'post_type'   => 'bien',
            'post_status' => 'publish',
            'post_title'  => sanitize_text_field($data['titre']),
            'post_content'=> wp_kses_post($data['description'] ?? '')
        ]);

        if (is_wp_error($post_id)) {
            return new WP_Error('echec', 'Erreur lors de la création du post', ['status' => 500]);
        }
    }

    update_post_meta($post_id, 'supabase_id', $data['id']);
    update_post_meta($post_id, 'prix_vente', $data['prix_vente']);
    update_post_meta($post_id, 'surface_m2', $data['surface_m2']);
    update_post_meta($post_id, 'ville', $data['ville']);
    update_post_meta($post_id, 'code_postal', $data['code_postal']);
    update_post_meta($post_id, 'nb_pieces', $data['nb_pieces']);
    update_post_meta($post_id, 'nb_chambres', $data['nb_chambres']);
    update_post_meta($post_id, 'etage', $data['etage']);
    update_post_meta($post_id, 'dpe', $data['dpe']);
    update_post_meta($post_id, 'mandat', $data['mandat']);
    update_post_meta($post_id, 'statut', $data['statut']);
    update_post_meta($post_id, 'type_bien', $data['type_bien']);
    update_post_meta($post_id, 'agent_nom', $data['agent_nom']);
    update_post_meta($post_id, 'honoraires', $data['honoraires']);
    update_post_meta($post_id, 'prix_net_vendeur', $data['prix_net_vendeur']);
    update_post_meta($post_id, 'pourcentage_honoraires', $data['pourcentage_honoraires']);
    update_post_meta($post_id, 'quote_part_charges', $data['quote_part_charges']);
    update_post_meta($post_id, 'taxe_fonciere', $data['taxe_fonciere']);
    update_post_meta($post_id, 'fonds_travaux', $data['fonds_travaux']);
    update_post_meta($post_id, 'annee_construction', $data['annee_construction']);
    update_post_meta($post_id, 'type_chauffage', $data['type_chauffage']);
    update_post_meta($post_id, 'mode_chauffage', $data['mode_chauffage']);
    update_post_meta($post_id, 'surface_terrain', $data['surface_terrain']);
    update_post_meta($post_id, 'surface_carrez', $data['surface_carrez']);
    update_post_meta($post_id, 'dpe_conso_indice', $data['dpe_conso_indice']);
    update_post_meta($post_id, 'dpe_ges_indice', $data['dpe_ges_indice']);
    update_post_meta($post_id, 'dpe_cout_min', $data['dpe_cout_min']);
    update_post_meta($post_id, 'dpe_cout_max', $data['dpe_cout_max']);

    if (!empty($data['cover']) && !empty($data['id'])) {
        update_post_meta($post_id, 'cover', sanitize_file_name($data['cover']));
    }

    if (!empty($data['gallery']) && is_array($data['gallery'])) {
        update_post_meta($post_id, 'gallery', json_encode($data['gallery']));
    }

// ✅ Enregistrer correctement les options
if (isset($data['options'])) {
    if (is_array($data['options'])) {
        $options_val = implode(', ', $data['options']);
    } else {
        $options_val = (string) $data['options'];
    }

    update_post_meta($post_id, 'options', $options_val);
    error_log("✅ Options bien reçues : " . $options_val);
}
    

    return rest_ensure_response(['success' => true, 'post_id' => $post_id]);
}



// ❌ Suppression d’un bien
function oi_supabase_delete_bien($request) {
    $supabase_id = $request['id'];

    $posts = get_posts([
        'post_type' => 'bien',
        'meta_key' => 'supabase_id',
        'meta_value' => $supabase_id,
        'posts_per_page' => 1
    ]);

    if (!empty($posts)) {
        wp_delete_post($posts[0]->ID, true);
        return rest_ensure_response(['success' => true, 'message' => 'Bien supprimé sur WordPress']);
    }

    return new WP_Error('not_found', 'Aucun bien trouvé avec cet ID Supabase', ['status' => 404]);
}

// ✅ Crée ou met à jour un mandataire depuis Supabase
function oi_create_agent_from_crm($request) {
    $data = $request->get_json_params();

    if (empty($data['id']) || empty($data['nom'])) {
        return new WP_Error('missing_data', 'Informations manquantes', ['status' => 400]);
    }

    $existing = get_posts([
        'post_type' => 'mandataire',
        'meta_key' => 'supabase_id',
        'meta_value' => $data['id'],
        'posts_per_page' => 1,
        'fields' => 'ids'
    ]);

    if (!empty($existing)) {
        $post_id = $existing[0];

        wp_update_post([
            'ID' => $post_id,
            'post_title' => sanitize_text_field($data['nom']),
        ]);

        update_post_meta($post_id, 'supabase_id', $data['id']);
        update_post_meta($post_id, 'ville', $data['ville'] ?? '');
        update_post_meta($post_id, 'telephone', $data['telephone'] ?? '');
        update_post_meta($post_id, 'email', $data['email'] ?? '');
        update_post_meta($post_id, 'photo_url', $data['photo_url'] ?? '');

        return rest_ensure_response(['updated' => true, 'wp_post_id' => $post_id]);
    } else {
        $post_id = wp_insert_post([
            'post_type'   => 'mandataire',
            'post_title'  => sanitize_text_field($data['nom']),
            'post_status' => 'publish',
        ]);

        if (is_wp_error($post_id)) {
            return new WP_Error('wp_error', 'Erreur WordPress', ['status' => 500]);
        }

        update_post_meta($post_id, 'supabase_id', $data['id']);
        update_post_meta($post_id, 'ville', $data['ville'] ?? '');
        update_post_meta($post_id, 'telephone', $data['telephone'] ?? '');
        update_post_meta($post_id, 'email', $data['email'] ?? '');
        update_post_meta($post_id, 'photo_url', $data['photo_url'] ?? '');

        return rest_ensure_response(['created' => true, 'wp_post_id' => $post_id]);
    }
}

// 📦 Routes API REST
add_action('rest_api_init', function () {
    register_rest_route('oi/v1', '/biens', [
        'methods' => 'POST',
        'callback' => 'oi_reception_bien_from_crm',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('oi/v1', '/supabase-delete/(?P<id>\d+)', [
        'methods' => 'DELETE',
        'callback' => 'oi_supabase_delete_bien',
        'permission_callback' => '__return_true',
    ]);

    register_rest_route('oi/v1', '/create-agent', [
        'methods' => 'POST',
        'callback' => 'oi_create_agent_from_crm',
        'permission_callback' => '__return_true',
    ]);
});
