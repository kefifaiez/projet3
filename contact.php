<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $emailSubject = $_POST["emailSubject"];
    $message = $_POST["message"];

    // Connexion à la base de données MySQL
    $conn = new mysqli("db", "root", "password", "faiez");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparez et exécutez la requête d'insertion
    $sql = "INSERT INTO contact (fullName, email, phoneNumber, emailSubject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fullName, $email, $phoneNumber, $emailSubject, $message);

    if ($stmt->execute()) {
        // Rediriger vers index.php avec un message de succès
        header("Location: index.html?success=1");
        exit(); // Arrêtez l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'envoi du message : " . $stmt->error;
    }

    // Fermez la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>
