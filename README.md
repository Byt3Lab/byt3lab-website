````markdown
# Configuration de base du Site WordPress (Bedrock + Docker)

Site WordPress basé sur [Bedrock](https://roots.io/bedrock/) avec environnement local Docker.

## Prérequis

- Docker & Docker Compose
- PHP 8.4+ (uniquement pour Composer)
- Composer

## Démarrage local

1. Copier le fichier d'environnement :
   ```bash
   cp .env.example .env
   ```
````

2. Générer les clés de sécurité sur https://roots.io/salts.html et les coller dans `.env`.

3. Lancer les conteneurs :

   ```bash
   docker compose up -d --build
   ```

4. Attendre que MariaDB soit prête :

   ```bash
   docker compose logs db --tail=5 | grep "ready for connections"
   ```

5. Installer WordPress :

   ```bash
   docker compose exec php vendor/bin/wp core install \
     --url="http://localhost:8080" \
     --title="Mon Site" \
     --admin_user="admin" \
     --admin_password="admin" \
     --admin_email="admin@example.com" \
     --allow-root
   ```

6. Accéder au site : http://localhost:8080
   Admin : http://localhost:8080/wp/wp-admin/

## Structure

- `config/` — Configuration Bedrock (application.php, environnements)
- `web/app/themes/` — Thèmes custom (versionnés)
- `web/app/plugins/` — Plugins custom (versionnés)
- `web/wp/` — Core WordPress (géré par Composer, non versionné)
- `docker/` — Configurations Nginx et PHP

## Déploiement

Voir `.github/workflows/deploy.yml`. Les secrets nécessaires sont :

- `SSH_HOST` — IP ou domaine du VPS
- `SSH_USER` — Utilisateur de déploiement
- `SSH_PRIVATE_KEY` — Clé SSH privée

## Commandes utiles

```bash
# Voir les logs
docker compose logs -f php

# Accéder à WP-CLI
docker compose exec php vendor/bin/wp --allow-root <commande>

# Accéder à MariaDB
docker compose exec db mariadb -uwordpress -pwordpress wordpress
```

## Notes importantes :

- Les plugins installés via l'interface ne sont PAS versionnés dans Git. Si on redéploies depuis une autre machine, ils ne seront pas là.
- La philosophie Bedrock est de gérer les plugins via Composer (composer require wpackagist-plugin/updraftplus). C'est plus propre, reproductible, et versionné.
- La solution symlink shared est un compromis pratique : elle permet d'installer via l'interface tout en gardant les plugins entre les déploiements. Mais elle dévie du standard Bedrock.
- Pour les plugins critiques, utiliser Composer. Pour les plugins mineurs, l'interface avec symlink shared est acceptable.
- "Les plugins listés dans composer.json sont gérés par l'agence. Vous pouvez installer d'autres plugins via l'admin, mais ils ne sont pas sauvegardés par le pipeline."
