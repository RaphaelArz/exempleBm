<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Chargez les classes PHPMailer
require 'vendor/autoload.php';

// Créez une instance de PHPMailer
$phpmailer = new PHPMailer();

try {
    // Configuration SMTP pour Gmail
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 465;
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Username = 'ratiktok173@gmail.com';
    $phpmailer->Password = 'ohsr nigy gbxi zspu';

    // Destinataire, sujet, corps, etc.
    $phpmailer->setFrom('votre_adresse@outlook.com', 'Votre Nom');
    $phpmailer->addAddress('raphaelmoula@gmail.com');
    $phpmailer->Subject = 'Sujet de l\'e-mail';

    // Récupérer les données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $nePourrontAssister = isset($_POST['ne-pourront-assister']);
    $reception = isset($_POST['reception']) ? 'Assisteront à la réception' : '';
    $tephiline = isset($_POST['tephiline']) ? 'Assisteront à la mise des téphiline' : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Construire le corps de l'e-mail
    $corpsEmail = "Informations du formulaire :\n";
    $corpsEmail .= "Nom : $nom\n";
    $corpsEmail .= "Prénom : $prenom\n";

    if ($nePourrontAssister) {
        $corpsEmail .= "Participation : Ne pourront pas assister\n";
    } else {
        $corpsEmail .= "Participation : $reception $tephiline\n";
        $corpsEmail .= "Nombre de personnes : $nombre\n";
    }

    $corpsEmail .= "Message au bar-mitzvah :\n";
    $corpsEmail .= "$message\n";

    $phpmailer->Body = $corpsEmail;

    // Envoi de l'e-mail
    $phpmailer->send();
    echo 'E-mail envoyé avec succès.';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ', $phpmailer->ErrorInfo;
}
?>
