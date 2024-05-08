<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nePourrontAssister = isset($_POST['ne-pourront-assister']) ? true : false;
    $reception = isset($_POST['reception']) ? true : false;
    $tephiline = isset($_POST['tephiline']) ? true : false;
    $nombre = $_POST['nombre'];
    $message = $_POST['message'];

    // Construction du corps du message
    $body = "Bonjour,\n\n";
    $body .= "Nom: $nom\n";
    $body .= "Prénom: $prenom\n\n";

    if ($nePourrontAssister) {
        $body .= "Ils ne pourront pas assister.\n\nMessage au bar-mitzvah:\n$message";
    } else {
        $body .= "Détails de la participation:\n";
        $body .= "Assisteront à la réception: " . ($reception ? "Oui" : "Non") . "\n";
        $body .= "Assisteront à la mise des téphiline: " . ($tephiline ? "Oui" : "Non") . "\n";
        $body .= "Nombre de personnes: $nombre\n\n";
        $body .= "Message au bar-mitzvah:\n$message";
    }

    // Envoi de l'e-mail
    $to = "raphaelmoula@gmail.com"; // Remplacez par votre adresse e-mail
    $subject = "Confirmation de participation au bar-mitzvah";
    $headers = "From: $nom $prenom <raphaelmoula@gmail.com>"; // Remplacez par votre adresse e-mail
    mail($to, $subject, $body, $headers);

    // Redirection vers une page de confirmation
    exit;
}
?>
