<?php
require_once 'config/Database.php';

$db = new Database();
$pdo = $db->getConnection();

echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Blog - Accueil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .success { color: green; padding: 10px; background: #d4edda; }
        .article { border: 1px solid #ddd; padding: 15px; margin: 10px 0; }
        .actions a { margin-right: 10px; }
    </style>
</head>
<body>
    <h1>Mon Blog</h1>
    
    <div class='actions'>
        <a href='create.php'>Créer un nouvel article</a>
    </div>
    
    <h2>Articles récents</h2>";

try {
    // Vérifier si la table existe
    $stmt = $pdo->query("SHOW TABLES LIKE 'articles'");
    
    if ($stmt->rowCount() > 0) {
        // Récupérer les articles
        $stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
        $articles = $stmt->fetchAll();
        
        if (count($articles) > 0) {
            foreach ($articles as $article) {
                echo "<div class='article'>";
                echo "<h3>" . htmlspecialchars($article['titre']) . "</h3>";
                echo "<p><strong>Auteur:</strong> " . htmlspecialchars($article['auteur']) . "</p>";
                echo "<p><strong>Date:</strong> " . htmlspecialchars($article['created_at']) . "</p>";
                echo "<p>" . nl2br(htmlspecialchars(substr($article['contenu'], 0, 200))) . "...</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun article pour le moment. <a href='create.php'>Créez le premier !</a></p>";
        }
    } else {
        echo "<p class='success'>✓ Connexion à la base de données réussie</p>";
        echo "<p>La table 'articles' n'existe pas encore. <a href='create.php'>Créez le premier article</a> pour la créer automatiquement.</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erreur: " . htmlspecialchars($e->getMessage()) . "</p>";
}

echo "</body></html>";
?>