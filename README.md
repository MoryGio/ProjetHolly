# Liste des cours
- [Installation du projet](./docs/README_START.md)
- [Active Record](./docs/active-record.md)


# Projet Serveur Web PHP

## Présentation
Ce projet est un site ecommerce en PHP dans un cadre pédagogique.
Il m’a permis de mieux comprendre le fonctionnement d’un serveur web,
l’organisation d’un projet PHP et la logique d’une architecture MVC.

Globalement, ce projet m’a permis de beaucoup progresser : les concepts sont
plus clairs et je comprends mieux la séparation entre logique, données et affichage.

## Architecture du projet
Le projet est structuré selon une architecture MVC :

- Controllers : gestion des actions et de la logique
- Models : gestion des données et de la base de données
- Views : affichage des pages (HTML/PHP)


## Contrôleurs et fonctions

### HomeController
Gère les pages principales du site.
Fonctions :
- `index()` : affiche la page d’accueil
- `identification()` : affiche la page de connexion / identification
- `panier()` : affiche la page du panier (structure en place)

---

### ProductController
Gère l’affichage des produits.

Fonctions :
- `index()` : affiche la liste des produits disponibles


### RegisterController
Gère l’inscription des utilisateurs.

Fonctions :
- `index()` : affiche le formulaire d’inscription
- `register()` : traite les données du formulaire et enregistre l’utilisateur


### CartController / PanierController
Gère la logique du panier.

Fonctions :
- ajout d’un produit au panier (logique partielle)
- suppression d’un produit du panier (logique partielle)

Cette partie n’est pas entièrement fonctionnelle.

## Méthodes importantes

### Méthode `render()`
Les contrôleurs utilisent une méthode `render()` héritée de la classe `Controller`.
Elle permet :
- de charger une vue
- de transmettre des données à la vue
- de centraliser l’affichage avec un layout commun

## Fonctionnalités
- Navigation entre plusieurs pages
- Affichage dynamique des vues
- Gestion basique des utilisateurs
- Affichage des produits
- Architecture MVC fonctionnelle

## Partie panier (difficulté rencontrée)
La partie panier a été la plus difficile pour moi.
Je n’ai pas réussi à la finaliser correctement, mais elle m’a permis de :
- mieux comprendre la logique d’un panier
- identifier mes lacunes
- savoir sur quels points je dois encore progresser

Même si cette partie est incomplète, elle a été très formatrice.

## Bilan personnel
Ce projet m’a permis de mieux comprendre le développement web côté serveur.
Même si tout n’est pas parfait, je constate une réelle progression et une meilleure
maîtrise globale du fonctionnement d’un serveur web en PHP.

## Auteur
Mory Touré – EFREI

