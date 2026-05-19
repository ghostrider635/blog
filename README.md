README - TP PHP
Informations de l’étudiant
Nom : Waseka Kibalikwa Aron
Cours : PHP
Type de travail : Travaux Pratiques (TP)
Langage utilisé : PHP
Base de données : MySQL
Environnement : XAMPP / WAMP / Laragon
Description du projet

Ce projet est un TP réalisé en PHP dans le but d’apprendre le développement web dynamique ainsi que la gestion des bases de données avec MySQL.

Le projet permet de :

Créer une connexion à une base de données
Ajouter des informations
Modifier des données
Supprimer des données
Afficher les informations enregistrées
Manipuler les formulaires HTML avec PHP
Technologies utilisées
HTML5
CSS3
PHP
MySQL
phpMyAdmin
Structure du projet
/mon-projet
│── index.php
│── config.php
│── database.php
│── style.css
│── README.md
│── /includes
│── /assets
Installation du projet
1. Cloner ou copier le projet

Placez le dossier du projet dans :

htdocs

si vous utilisez XAMPP.

2. Démarrer le serveur

Lancer :

Apache
MySQL

depuis XAMPP ou WAMP.

3. Créer la base de données

Ouvrir :

http://localhost/phpmyadmin

Créer une base de données nommée :

blog
4. Configurer la connexion

Modifier les informations dans le fichier :

config.php

Exemple :

$host = "localhost";
$dbname = "blog";
$username = "root";
$password = "";
Exécution du projet

Ouvrir dans le navigateur :

http://localhost/mon-projet
Fonctionnalités
Connexion à MySQL avec PDO
Gestion des erreurs
Système CRUD
Validation des formulaires
Organisation du code en classes
Objectifs pédagogiques

Ce TP permet de comprendre :

Le fonctionnement de PHP
La connexion à une base de données
Les requêtes SQL
L’utilisation de PDO
La programmation orientée objet en PHP
Auteur
Waseka Kibalikwa Aron

Projet académique réalisé dans le cadre de l’apprentissage du développement web avec PHP.
