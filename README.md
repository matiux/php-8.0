PHP 8.0
===

## Sviluppo

```shell
git clone git@github.com:matiux/php-8.0.git && cd php-8.0
cp docker/docker-compose.override.dist.yml docker/docker-compose.override.yml
rm -rf .git/hooks && ln -s ../scripts/git-hooks .git/hooks
```

## Gestione container
Si possono pilotare i container Docker tramite lo script `./dc`
* `./dc up -d` Esegue l'up dei container in modalità demone
* `./dc enter` Entra nel container PHP
* `./dc enter-root` Entra nel container PHP con utente root

## Alias del container PHP

#### Alias nell'immagine dev
* `xon` Attiva l'estensione Xdebug
* `xoff` Disattiva l'estensione Xdebug

#### Alias nel Dockerfile del progetto
* `xmode.coverage` Imposta Xdebug in modalità coverage
* `xmode.debug` Imposta Xdebug in modalità debug
* `psalm` Esegue psalm senza cache su tutto il progetto
* `test` Esegue Phpunit (vendor/bin/simple-phpunit)