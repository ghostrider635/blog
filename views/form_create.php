<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Créer un nouvel article</h1>
    <?php if (!empty($erreur)): ?>
        <p style="color: red;"><?= htmlspecialchars($erreur); ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre"><br><br>

        <label for="contenu">Contenu:</label>
        <textarea id="contenu" name="contenu"></textarea><br><br>

        <label for="auteur">Auteur:</label>
        <input type="text" id="auteur" name="auteur"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>