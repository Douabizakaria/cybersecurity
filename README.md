# Système de Connexion PHP avec Protection Contre la Force Brute

Ce système de connexion PHP fournit un processus d'authentification sécurisé pour les utilisateurs, intégrant le cryptage des mots de passe et une protection contre les tentatives de connexion répétées et non autorisées (attaques par force brute). Il est conçu pour être facilement intégrable dans des projets PHP nécessitant une gestion d'authentification des utilisateurs.

## Fonctionnalités

- Authentification des utilisateurs avec gestion de session.
- Cryptage sécurisé des mots de passe avec `bcrypt`.
- Protection contre la force brute en limitant les tentatives de connexion infructueuses.
- Alertes dynamiques informant de l'état de la connexion (succès, erreur, verrouillage).

## Prérequis

- PHP version 7.4 ou ultérieure.
- Serveur de base de données MySQL.
- Composer pour la gestion des dépendances PHP, si nécessaire.

## Installation

1. Clonez ce dépôt dans le répertoire de votre serveur web :

    ```bash
    git clone https://github.com/Douabizakaria/cybersecurity.git
    ```

2. Importez les scripts `users.sql` et `failed_login_attempts.sql` dans votre base de données MySQL pour créer les tables nécessaires.

3. Configurez vos paramètres de connexion à la base de données dans le fichier `db.php`, en mettant à jour le nom d'utilisateur, le mot de passe et le nom de la base de données comme il convient.

## Configuration

- Modifiez le fichier `login.php` et `register.php` pour qu'il corresponde à votre configuration de base de données :

    ```php
    $db = new mysqli('localhost', 'nomUtilisateurDB', 'motDePasseDB', 'nomDeLaBaseDeDonnées');
    ```

- Ajustez les paramètres de sécurité dans `login.php` pour la protection contre la force brute selon vos besoins :

    - `$max_attempts` : Nombre maximal de tentatives de connexion échouées autorisées.
    - `$lockout_time` : Durée (en minutes) pendant laquelle l'utilisateur est bloqué après avoir dépassé le nombre maximal de tentatives.

## Utilisation

- Accédez à `index.php` depuis votre navigateur pour ouvrir le formulaire de connexion.
- Pour s'enregistrer, cliquez sur le bouton "S'inscrire" et suivez les instructions.
- Une fois enregistré, vous pouvez vous connecter avec le nom d'utilisateur et le mot de passe que vous avez créés.

## Sécurité

- Les mots de passe sont sécurisés en utilisant les fonctions `password_hash()` et `password_verify()` de PHP.
- Le système limite les tentatives de connexion infructueuses pour protéger contre les attaques par force brute.

## Contribution

Les contributions à ce projet sont bienvenues. Veuillez forker le dépôt et soumettre une pull request avec vos modifications.

## Licence

Ce projet est distribué sous la Licence MIT. Voir le fichier `LICENSE.md` pour plus de détails.

## Outils

- Bootstrap pour les éléments de formulaire et alertes front-end.
- PHP et MySQL pour la logique côté serveur et la gestion des données.
