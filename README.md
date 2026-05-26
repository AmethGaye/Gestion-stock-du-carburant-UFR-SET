# Gestion Stock du Carburant — UFR SET

## Description

### Présentation du projet

**GSC-UFR-SET** est une application web dédiée à la gestion du stock de carburant de l'Unité
de Formation et de Recherche en Sciences et Technologies (UFR SET) de l'Université Iba Der
Thiam de Thiès. Elle centralise et automatise l'ensemble du processus de dotation, de
remboursement des vacataires et de suivi du carburant, à travers une interface multi-rôles
adaptée à chaque intervenant de la chaîne administrative.

### Contexte et Problématique

L'UFR SET utilise le carburant comme ressource stratégique pour assurer la mobilité de ses
enseignants vacataires, financer ses activités pédagogiques et couvrir les déplacements
administratifs. Avant ce projet, la gestion de cette ressource reposait entièrement sur des
processus manuels :

- **Suivi sur Excel** — saisie manuelle sujette aux erreurs et aux incohérences
- **Circulation physique des documents** — impression, signature et transmission papier entre
  assistants, chefs de département, directeur et comptable, entraînant des délais importants
- **Aucune visibilité temps réel** — le comptable ne disposait pas d'une vue précise et à jour
  du stock, ce qui pouvait provoquer des ruptures ou des surplus non anticipés
- **Calcul manuel des tickets** — la détermination du nombre de tickets à attribuer à chaque
  vacataire (selon sa provenance, son statut de véhiculé et le nombre de cours effectués)
  était réalisée à la main, augmentant le risque d'erreurs et de contestations
- **Absence d'outils de statistiques** — les chefs de département, le directeur et le comptable
  ne disposaient d'aucun tableau de bord pour piloter leurs activités

### Solution proposée

En réponse à ces problèmes, nous avons conçu et développé une plateforme web intégrée qui
digitalise l'intégralité du processus. La solution offre :

- Un **workflow multi-étapes** entièrement dématérialisé : saisie des cours → approbation
  chef de département → validation directeur → remboursement comptable
- Un **calcul automatique** du nombre de tickets de carburant selon la région de provenance
  du vacataire, son statut (véhiculé ou non) et le nombre d'heures dispensées
- Un **tableau de bord personnalisé** par rôle avec statistiques en temps réel (stock restant,
  demandes en cours, cours remboursés, activités validées)
- Une **gestion du stock** avec renouvellement, suivi des entrées/sorties, dotations régulières
  aux départements et à l'administration, et historique complet des attributions
- Un système de **notifications** automatiques entre les acteurs à chaque étape du workflow
- Un **contrôle d'accès strict** : seul l'administrateur peut créer des comptes utilisateurs,
  garantissant la sécurité et la traçabilité des opérations

---

## Technologies Utilisées

- **Backend** : Laravel 10, PHP 8.2, Eloquent ORM
- **Frontend** : Blade, Tailwind CSS, JavaScript, jQuery, Chart.js
- **Base de données** : MySQL 8.0
- **Build** : Vite, npm
- **Authentification** : Laravel Auth (sessions)
- **Conteneurisation** : Docker (PHP-FPM + Nginx + MySQL)

---

## Installation

### Option 1 — Docker (recommandé)

**Prérequis** : Docker Desktop installé et démarré.

```bash
git clone https://github.com/AmethGaye/Gestion-stock-du-carburant-UFR-SET.git
cd Gestion-stock-du-carburant-UFR-SET
```

Copier et configurer l'environnement :

```bash
cp .env.example .env
```

Modifier les variables de base de données dans `.env` :

```env
DB_HOST=db
DB_PORT=3306
DB_DATABASE=gsc_ufr_set
DB_USERNAME=root
DB_PASSWORD=ahmada
```

Démarrer les containers :

```bash
docker-compose up -d
```

Générer la clé d'application et peupler la base :

```bash
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate:fresh --seed --force
```

L'application est accessible sur `http://localhost:8000`.

---

### Option 2 — Installation classique (XAMPP / WAMP)

**Prérequis** : PHP 8.1+, Composer, Node.js 18+, MySQL 8.0.

```bash
git clone https://github.com/AmethGaye/Gestion-stock-du-carburant-UFR-SET.git
cd Gestion-stock-du-carburant-UFR-SET
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Créer la base de données puis configurer `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gsc_ufr_set
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

Lancer les migrations avec les données de test :

```bash
php artisan migrate --seed
npm run dev
php artisan serve
```

L'application sera accessible sur `http://localhost:8000`.

---

## Comptes de Test

Les comptes suivants sont automatiquement créés par `php artisan migrate --seed` :

| Rôle | Email | Mot de passe |
|------|-------|-------------|
| Administrateur | mouhamad.gaye@univ-thies.sn | password |
| Directeur | thiam@univ-thies.sn | password |
| Chef de département | gaye@univ-thies.sn | password |
| Comptable | diop@univ-thies.sn | password |
| Assistant(e) | seck@univ-thies.sn | password |

---

## Permissions par Rôle

### Administrateur
- Créer, modifier, désactiver et supprimer des utilisateurs
- Gérer les rôles et les UFR
- Consulter les statistiques globales du système

### Directeur
- Consulter et approuver les demandes de remboursement transmises par les chefs de département
- Créer, modifier et supprimer des activités nécessitant une dotation en tickets
- Recevoir des notifications pour chaque nouvelle demande soumise

### Chef de département / Assistant(e)
- Gérer les vacataires (ajout, modification, suppression)
- Saisir les séances de cours (vacataire, matière, filière, durée)
- Approuver ou rejeter les cours avant transmission au directeur
- Soumettre les demandes de remboursement au directeur

### Comptable
- Consulter et renouveler le stock de carburant
- Traiter les remboursements des vacataires approuvés par le directeur
- Allouer des tickets aux activités créées par le directeur
- Gérer les dotations régulières aux départements et à l'administration
- Consulter l'historique complet des attributions

---

## Fonctionnalités Implémentées

✅ **Gestion des vacataires** — CRUD, filtres par mois et par provenance  
✅ **Gestion des cours** — Saisie, approbation multi-niveaux, restauration  
✅ **Workflow de remboursement** — Chef dept → Directeur → Comptable avec notifications  
✅ **Calcul automatique des tickets** — Basé sur la région, le statut véhiculé et les heures  
✅ **Gestion du stock** — Renouvellement, suivi entrées/sorties, annulation  
✅ **Dotations régulières** — Aux départements et aux membres de l'administration  
✅ **Gestion des activités** — Création par le directeur, allocation tickets par le comptable  
✅ **Historique des attributions** — Filtres par mois et recherche  
✅ **Tableaux de bord** — Statistiques par rôle avec graphiques (Chart.js)  

---

## Limitations Actuelles

- La gestion individuelle des tickets n'est pas implémentée
- Pas d'export PDF / CSV des remboursements et du stock
- Pas d'alertes automatiques en cas de stock bas
- Le système de notifications temps réel (Pusher) est installé mais peu exploité
- Pas de gestion multi-UFR (prévu pour une future extension à toute l'université)
- Pas de 2FA pour les comptes sensibles (directeur, comptable)

---

## Structure du Projet

```
├── app/
│   ├── Http/Controllers/    # Contrôleurs par rôle
│   └── Models/              # Modèles Eloquent
├── database/
│   ├── migrations/          # Schéma de la base de données
│   └── seeders/             # Données de test (9 seeders)
├── resources/
│   ├── views/               # Templates Blade par rôle
│   ├── css/                 # Styles
│   └── js/                  # Scripts JavaScript
├── routes/
│   └── web.php              # Routes organisées par rôle
├── nginx/
│   └── default.conf         # Configuration Nginx (Docker)
├── public/                  # Assets compilés
├── Dockerfile               # Image PHP 8.2-FPM + Node 20
└── docker-compose.yml       # Services app + nginx + MySQL
```

---

## Modélisation

Le système repose sur **15 modèles Eloquent** interconnectés :

```
User ──── Role          Vacataire ──── Cours
 │                          │
 ├── Activite           Cours ──── Matiere
 ├── RemboursementVac        └──── Filiere ──── Departement ──── Ufr
 ├── DotationAdmin
 └── DotationDepart     Stock ──── Ticket
```

---

## Auteurs

- **Mouhamad Gaye** — Développeur Full-Stack
- **Mamadou Ba** — Développeur Backend

**Encadreur** : Pr Mouhamadou Thiam — Directeur de l'UFR SET  
**Établissement** : Université Iba Der Thiam de Thiès — UFR Sciences et Technologies  
**Diplôme** : Licence Informatique, option Génie Logiciel — Année 2022/2023
