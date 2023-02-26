# blog-portfolio-php

Ce projet consiste à réaliser un Blog / Portfolio qui recense à la fois des articles divers sur des sujets comme l'actu web et technologique, les dernières nouveautés materiels et logiciel, crypto, ciné, etc...
Mais aussi des projets professionnels réalisés dans le milieu du développement web pour ma part, mais qui peut évidemment servir de squelette pour tout autre projet.

Ce projet ce compose:

- D'une page d'accueil sur laquelle nous trouvons les trois derniers Article et Projet sous forme de carte reprenant les elements principaux (Sujet, titre, extrait de contenu et date de création) pour les articles et (Titre, techno utilisés, extrait de contenu et date de création) pour les projets, avec pour chacun la possibilité de cliqué sur un bouton "voir plus" et la possibilité d'aller sur la page d'archive respectivement pour article et projet.
- Les pages d'archives qui présentent la même configuration.
- Une page projet ou nous retrouvons, le titre, les technologies utilisés, une presentation du projet ainsi que le lien vers le dit projet.
- Une page article qui ce compose de son titre, son contenu et une partie commentaire, dont la publication est réservé aux utilisateurs qui ont un compte.
- Ce qui nous amène à une page de Connexion / Inscription.
- Et aussi une page d'administration qui permet l'ajout, la modification et la suppression des Articles et/ou Projet.

Le tout connecté à une base de données détaillée ci-dessous

Ce Projet utilise le modèle M.V.C (Model View Controller)

Dans le dossier racine, ouvrir le Terminal et taper la commande suivante: ``npm init``.

Une fois npm initialisé taper: ``npm i bootstrap@5.3.0-alpha1`` pour installer la dernière version de BootStrap.

## Les technologies

Voici les technologies utilisés :

- HTML
- CSS
- Git
- GitHub
- Sass
- Bootstrap
- PHP
- MySQL

## Base De Données

Pour ce projet il faut créer une base de donnée "blog_portfolio" qui contient 4 tables

### user

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT(11)|PRIMARY KEY, Auto_increment|L'ID de l’utilisateur
|email|text|utf8_general_ci, NOT NULL|Email de l'utilisateur
|password|text|utf8_general_ci, NOT NULL|Mot de passe de l'utilisateur
|secret|text|utf8_general_ci, NOT NULL|Identifiant Cookie
|creation_date|DATETIME|CURRENT_TIMESTAMP, NOT NULL|Date de création du compte

### article

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT(11)|PRIMARY KEY, Auto_increment|L'ID de l'article
|subject|varchar(100)|utf8_general_ci, NOT NULL|Sujet de l'article
|title|varchar(100)|utf8_general_ci, NOT NULL|Titre de l'article
|content|text|utf8_general_ci, NOT NULL|Contenu de l'article
|created_date|DATETIME|CURRENT_TIMESTAMP, NOT NULL|Date de création de l'article

### project

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT(11)|PRIMARY KEY, Auto_increment|L'ID du projet
|title|varchar (100)|utf8_general_ci, NOT NULL|titre du projet
|techno|text|utf8_general_ci, NOT NULL|Technologie utilisé
|content|text|utf8_general_ci, NOT NULL|Contenu du projet
|created_date|DATETIME|CURRENT_TIMESTAMP, NOT NULL|Date de création du projet

### comment

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT(11)|PRIMARY KEY, Auto_increment|L'ID du commentaire
|comment_content|text|utf8_general_ci, NOT NULL|Commentaire
|article_id|INT(11)|NOT NULL|Récupère l'ID de l'article
|created_date|DATETIME|CURRENT_TIMESTAMP, NOT NULL|Date de création du commentaire

## Info de connexion
Informations de connexion à la base de données à modifier dans:

- Model
  - Manager.php
 
et dans 

- src
  - connection.php
