# Demarrage et user auth

- auth
  email: `massire@gmail.com`
  pwd: `m`

```bash
php -S localhost:8000 -t public
```

## les étape

- creation du dossier public, index
- creation d'autoload
- démarrer la session , importer autoload, required autoloa et appleller la fonction autoload::register
- creation de request
- creation de router
- creation de viewer

## La session

je lai demarré après l'autoload car il me generait des messages d'ereur
