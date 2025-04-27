<?php
// Vérifie que le formulaire a été soumis en POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sécurisation basique
    $name = htmlspecialchars($_POST["name"] ?? '');
    $email = htmlspecialchars($_POST["email"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    // Ici tu peux traiter les données, les enregistrer, ou les envoyer par e-mail

    // Exemple : envoyer un mail (à toi-même)
    $to = "tonemail@exemple.com"; // 👉 change avec ton vrai mail
    $subject = "Nouveau message du formulaire de contact";
    $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Envoie le mail
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Message envoyé avec succès.";
    } else {
        http_response_code(500);
        echo "Erreur lors de l'envoi du message.";
    }
} else {
    http_response_code(403); // Méthode non autorisée
    echo "Accès interdit.";
}
?>
