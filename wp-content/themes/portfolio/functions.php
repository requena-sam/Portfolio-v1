<?php
// Démarrer la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Charger les fichiers de traduction :
load_theme_textdomain('dw', __DIR__ . '/locales');

// Désactiver l'éditeur de texte Gutenberg de Wordpress :
add_filter('use_block_editor_for_post', '__return_false');

// Enregistrer des menus de navigation :
register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');

// Enregistrer un "type de contenu" personnalisé
register_post_type('projets', [
    'label' => 'Projets',
    'description' => 'Les projets de Sam Requena',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => ['title', 'thumbnail', 'editor'],
]);

register_post_type('message', [
    'label' => 'Message de contact',
    'description' => 'Messages envoyés via le formulaire de contact.',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-email', // https://developer.wordpress.org/resource/dashicons
    'supports' => ['title', 'editor'],
]);

// Fonctions propres au thème :

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end.
function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

// 2. Retrouver les éléments d'un menu pour une location donnée
function dw_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if (is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}

// Retrouver les langues définies dans Polylang afin de pouvoir les exploiter dans un menu par exemple :
function dw_get_languages(): array
{
    $languages = [];

    $polylangs = pll_the_languages(['echo' => false, 'raw' => true]);

    foreach ($polylangs as $code => $polylang) {
        $lang = new stdClass();
        $lang->url = $polylang['url'];
        $lang->current = $polylang['current_lang'];
        $lang->label = $polylang['name'];
        $lang->code = $code;
        $lang->locale = $polylang['locale'];

        $languages[] = $lang;
    }

    return $languages;
}

// Fonction permettant d'inclure un composant
function dw_component(string $component, array $arguments = []): void
{
    if (!($path = realpath(__DIR__ . '/components/' . $component . '.php'))) {
        // Le chemin vers le component n'existe pas.
        throw new \Exception('Component "' . $component . '" is not defined.');
    }

    extract($arguments);

    include($path);
}
// Ajout d'image sous format SVG et WEBP
add_filter('upload_mimes', 'capitaine_mime_types');
add_filter('wp_check_filetype_and_ext', 'capitaine_file_types', 10, 4);

// Autoriser l'import des fichiers du type SVG et WEBP
function capitaine_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

// Contrôle de l'import d'un WEBP
function capitaine_file_types($types, $file, $filename, $mimes)
{
    if (str_contains($filename, '.webp')) {
        $types['ext'] = 'webp';
        $types['type'] = 'image/webp';
    }
    return $types;
}
//Ajouter à ACF les options pages
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}
add_action('admin_post_contact_form', 'handle_contact_form');
add_action('admin_post_nopriv_contact_form', 'handle_contact_form');

function handle_contact_form() {
    $nom = sanitize_text_field($_POST['nom']);
    $prenom = sanitize_text_field($_POST['prenom']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Initialiser un tableau pour stocker les erreurs
    $errors = [];

    // Vérifier si les champs sont vides
    if (empty($nom)) {
        $errors['nom'] = 'Le champ Nom est requis.';
    }
    if (empty($prenom)) {
        $errors['prenom'] = 'Le champ Prénom est requis.';
    }
    if (empty($email)) {
        $errors['email'] = 'Le champ Email est requis.';
    }
    if (empty($message)) {
        $errors['message'] = 'Le champ Message est requis.';
    }

    // Si il y a des erreurs, rediriger vers la page du formulaire avec les erreurs
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        wp_redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    $post_id = wp_insert_post([
        'post_type' => 'message',
        'post_title' => $nom . ' ' . $prenom,
        'post_content' => $message,
        'post_status' => 'publish',
        'meta_input' => [
            'email' => $email,
        ],
    ]);

    if ($post_id) {
        // Rediriger vers une page de succès ou ajouter un message de succès
        wp_redirect(home_url());
        exit;
    }
}
add_action('add_meta_boxes', 'add_email_metabox');
add_action('save_post', 'save_email_metabox');

function add_email_metabox() {
    add_meta_box('email_metabox', 'Email', 'email_metabox_callback', 'message', 'side', 'default');
}

function email_metabox_callback($post) {
    $email = get_post_meta($post->ID, 'email', true);
    echo '<input type="email" name="email" value="' . esc_attr($email) . '">';
}

function save_email_metabox($post_id) {
    if (array_key_exists('email', $_POST)) {
        update_post_meta($post_id, 'email', sanitize_email($_POST['email']));
    }
}
//Rendre l'acces impossible aux messages utilisateurs
add_action('template_redirect', 'restrict_message_pages');
function restrict_message_pages() {
    if (is_singular('message')) {
        wp_redirect(home_url());
        exit;
    }
}
