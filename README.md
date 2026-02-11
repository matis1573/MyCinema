# MyCinema

## Description

MyCinema est une application web légere conçue pour la gestion complète d'un cinéma. Elle permet aux administrateurs de gérer facilement les films, les salles de projection et la programmation des séances. L'application est construite avec une architecture simple mais robuste, séparant clairement le frontend du backend.

## Fonctionnalités principales

L'application offre les fonctionnalités suivantes :

- **Gestion des films** : Ajouter, modifier et supprimer des films avec leurs détails (titre, durée, genre).
- **Gestion des salles** : Configurer les salles de cinéma et leur capacité.
- **Planification des séances** : Programmer des films dans des salles spécifiques à des horaires donnés.
- **Visualisation** : Interface utilisateur simple pour consulter la liste des films et des séances programmées.

## Architecture technique

Le projet suit une architecture de type API REST avec une séparation claire des responsabilités :

### Backend (PHP)
Le backend est structuré en couches pour assurer la maintenabilité :
- **Controllers** : Gèrent les requêtes HTTP et les réponses API.
- **Services** : Contiennent la logique métier.
- **Repositories** : Gèrent l'accès aux données et les requêtes SQL.
- **Models** : Représentent les objets métier (Film, Salle, Séance).
- **Base de données** : Utilise SQLite pour une portabilité maximale sans configuration serveur complexe.

### Frontend
L'interface utilisateur est réalisée avec des technologies web standard :
- **HTML5/CSS3** POUR la structure et le style.
- **JavaScript (Vanilla)** pour la logique client et les appels asynchrones à l'API.

## Pre-requis et Configuration

- **PHP 7.4** ou supérieur installé sur votre machine.
- L'extension **PDO SQLite** doit être activée dans votre fichier `php.ini`.

### Installation

1. Clonez ce dépôt ou copiez les fichiers dans votre répertoire de travail.
2. Assurez-vous que le fichier de base de données `backend/database.sqlite` est présent (ou initialisez-le avec `PDF/script.sql`).
3. Ouvrez un terminal à la racine du projet.
4. Lancez le serveur de développement PHP :
   ```bash
   php -S localhost:8000
   ```
5. Accédez à l'application via votre navigateur à l'adresse `http://localhost:8000/`.

