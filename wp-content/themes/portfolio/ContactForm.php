<?php
add_action('admin_post_contact_form', 'handle_contact_form');
add_action('admin_post_nopriv_contact_form', 'handle_contact_form');

function handle_contact_form()
{
    $nom = sanitize_text_field($_POST['nom']);
    $prenom = sanitize_text_field($_POST['prenom']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Initialiser un tableau pour stocker les erreurs
    $errors = [];

    // Vérifier si les champs sont vides
    if (empty($nom)) {
        $errors['nom'] = 'Le champ nom est requis.';
    }
    if (empty($prenom)) {
        $errors['prenom'] = 'Le champ prénom est requis.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Le champ email est requis.';
    }
    if (empty($message)) {
        $errors['message'] = 'Le champ message est requis.';
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
        // Préparer le contenu de l'e-mail
        $email_content = "Vous avez reçu un nouveau message de $nom $prenom :\n\n$message";

        // Envoyer l'e-mail à l'administrateur du site
        wp_mail(get_option('samsamreq@gmail.com'), 'Nouveau message de contact', $email_content);

        // Rediriger vers une page de succès ou ajouter un message de succès
        wp_redirect(home_url());
        exit;
    }
}

add_action('add_meta_boxes', 'add_email_metabox');
add_action('save_post', 'save_email_metabox');

//Remplis le côté administation de l'email
function add_email_metabox()
{
    add_meta_box('email_metabox', 'Email', 'email_metabox_callback', 'message', 'side', 'default');
}

function email_metabox_callback($post)
{
    $email = get_post_meta($post->ID, 'email', true);
    echo '<input type="email" name="email" value="' . esc_attr($email) . '">';
}

function save_email_metabox($post_id)
{
    if (array_key_exists('email', $_POST)) {
        update_post_meta($post_id, 'email', sanitize_email($_POST['email']));
    }
}

//Rendre l'acces impossible aux messages utilisateurs
add_action('template_redirect', 'restrict_message_pages');
function restrict_message_pages()
{
    if (is_singular('message')) {
        wp_redirect(home_url());
        exit;
    }
}
