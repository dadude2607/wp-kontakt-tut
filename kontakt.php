<?php
/*
Plugin Name: Kontaktformular Tutorial
Plugin URI: https://dadude.de
Description: Ein Kontaktformular für das Wordpress Plugin Tutorial auf https://dadude.de
Version: 1.0
Author: Andre Voth
Author URI: https://dadude.de
*/

function mein_kontaktformular() {
    $form = '<form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post">';
    $form .= 'Name: <input type="text" name="cf-name"><br>';
    $form .= 'Email: <input type="text" name="cf-email"><br>';
    $form .= 'Nachricht:<br> <textarea name="cf-message"></textarea><br>';
    $form .= '<input type="submit" name="cf-submit" value="Senden">';
    $form .= '</form>';
    return $form;
}

function formular_verarbeitung() {
    if (isset($_POST['cf-submit'])) {
        $name = sanitize_text_field($_POST['cf-name']);
        $email = sanitize_email($_POST['cf-email']);
        $message = sanitize_textarea_field($_POST['cf-message']);
        
        // Hier könntet ihr z.B. eine E-Mail mit den Daten senden.
        // Für diesen Beispielcode wird einfach eine Danke-Nachricht ausgegeben.
        echo "Danke, $name! Ihre Nachricht wurde gesendet.";
    }
}
add_action('wp_head', 'formular_verarbeitung');

add_shortcode('einfaches-kontaktformular', 'mein_kontaktformular');