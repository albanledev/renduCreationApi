# Evaluation API Platform

## Description

Ce projet consiste à mettre en place une API avec Symfony et API Platform pour gérer un bar. L'API doit permettre la gestion des commandes, des boissons et des utilisateurs (patron, barmans, serveurs et clients).

## 👥 Contributeurs

- Gabriel Dautreppe
- Alban de Braquilanges

## 📦 Comment récupérer le projet et le lancer

### Prérequis

- PHP >= 8.3.1
- Composer
- Symfony CLI
- Node.js (pour le support front-end si nécessaire)
- MySQL ou un autre SGBD compatible

### Étapes d'installation

1. Clonez le dépôt GitHub :
   ```bash
   git clone https://github.com/username/repository-name.git
   ```
2. Installez les dépendances PHP :
   ```bash
   composer install
   ```
3. Configurez les variables d'environnement :
   ```bash
   cp .env.example .env
   ```
4. Générez la clé JWT (si nécessaire) :
   ```bash
   openssl genpkey -algorithm RSA -out config/jwt/private.pem -aes256
   openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
   ```
5. Créez la base de données :
   ```bash
   php bin/console doctrine:database:create
   ```
6. Lancez le serveur Symfony :
   ```bash
   symfony server:start
   ```

### 🛠 Utilisation de Postman

1. Importez la collection Postman fournie dans le dépôt (`postman_collection.json`).
   
2. Assurez-vous que les requêtes sont correctement configurées avec les en-têtes nécessaires (par exemple, les jetons d'authentification JWT).
  
3. Utilisez les requêtes pour interagir avec l'API selon les rôles et les fonctionnalités décrites.
