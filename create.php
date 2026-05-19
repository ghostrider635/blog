<?php
    // Démarrer le buffering pour éviter les problèmes de headers
    ob_start();
    
    require_once 'config/Database.php';
    require_once 'models/Article.php';

    $erreur = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = trim($_POST['titre']);
        $contenu = trim($_POST['contenu']);
        $auteur = trim($_POST['auteur']);

        if (empty($titre) || empty($contenu) || empty($auteur)) {
            $erreur = 'Tous les champs sont requis.';
        } else {
            $db = new Database();
            $pdo = $db->getConnection();
            $article = new Article($pdo, [
                'titre' => $titre,
                'contenu' => $contenu,
                'auteur' => $auteur
            ]);

            if ($article->create()) {
                header('Location: index.php');
                exit;
            } else {
                $erreur = 'Erreur lors de la création de l\'article. Vérifiez la connexion à la base de données.';
            }
        }
    }

    require_once 'views/form_create.php';
?>