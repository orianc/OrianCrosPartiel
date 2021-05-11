# 1. Partiel Symfony - Orian Cros - Sujet : Albums musiciens

- [1. Partiel Symfony - Orian Cros - Sujet : Albums musiciens](#1-partiel-symfony---orian-cros---sujet--albums-musiciens)
- [2. Installation et mise en place](#2-installation-et-mise-en-place)
  - [2.1. Mise en place de symfony](#21-mise-en-place-de-symfony)
  - [2.2. Connexion au GitHub](#22-connexion-au-github)
  - [2.3. Paramétrage de la DB](#23-paramétrage-de-la-db)
- [3. Configuration de l'application](#3-configuration-de-lapplication)
  - [3.1. Entity](#31-entity)
    - [3.1.1. Création](#311-création)
    - [3.1.2. Création de la DB & Migration](#312-création-de-la-db--migration)
  - [3.2. Fixtures](#32-fixtures)
    - [3.2.1. Installation](#321-installation)
    - [Alimentation des Fixtures](#alimentation-des-fixtures)

# 2. Installation et mise en place

## 2.1. Mise en place de symfony

```bash
symfony new OrianCros --full --version=5.2

```
## 2.2. Connexion au GitHub

```bash
echo "# OrianCrosPartiel" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/orianc/OrianCrosPartiel.git
git push -u origin main
```

## 2.3. Paramétrage de la DB

```bash
DATABASE_URL="mysql://root:@127.0.0.1:3306/db_oriancrospartiel"
```

# 3. Configuration de l'application

## 3.1. Entity


### 3.1.1. Création

`Album` & `Artiste` :

```bash
symfony console make:entity
```
Mise en place des champs et d'une relation ManyToOne : 

Album 1.. ----- 1 Artiste `Each Album relates to (has) one Artiste. | Each Artiste can relate to (can have) many Album objects`


### 3.1.2. Création de la DB & Migration
Je choisi de finir la création de la DB à ce niveau pour éviter un messagge d'erreur qui indiquerai l'impossibilité de créé ou de migrer par manque d'Entity:

```bash
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migration:migrate
```

## 3.2. Fixtures

### 3.2.1. Installation
Installation du bundle `doctrine fixture`
```bash
composer require --dev doctrine/doctrine-fixtures-bundle
```
la commande `composer require --dev orm-fixtures` n'est plus nécessaire depuis Symfony 4, je la garde sous la main en cas de problème de composant lors des fixtures:load.

### Alimentation des Fixtures


Création du Crud Album

import de form_themes: ['bootstrap_4_layout.html.twig']
composer require symfony/asset