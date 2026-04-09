# Deploy no Render

## O que este projeto usa

- Web Service com `Docker`
- MySQL em `Private Service`
- Laravel servindo a pasta `public`

## Passo 1: criar o banco MySQL no Render

No Render, crie um `Private Service` com:

- `Name`: `chutball-mysql`
- `Runtime`: `Docker`
- `Image`: `mysql:8.0`
- `Plan`: `starter` ou superior
- `Disk Mount Path`: `/var/lib/mysql`
- `Disk Size`: `10 GB` ou mais

Variaveis de ambiente do MySQL:

- `MYSQL_DATABASE=chutball`
- `MYSQL_USER=chutball`
- `MYSQL_PASSWORD=` um valor forte
- `MYSQL_ROOT_PASSWORD=` um valor forte

## Passo 2: importar o banco inicial

Depois que o MySQL estiver online, conecte um cliente ao banco usando a rede privada do Render ou um acesso temporario e importe [VOLTA.sql](./VOLTA.sql).

## Passo 3: criar o Web Service

Crie um `Web Service` a partir do repo:

- Repo: `https://github.com/SamuelWarmeling/chutball`
- Branch: `main`
- Runtime: `Docker`
- Dockerfile: `./Dockerfile`

Variaveis de ambiente recomendadas:

- `APP_NAME=CHUTBALL`
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=` URL publica do Render
- `APP_KEY=` gerar com `php artisan key:generate --show`
- `LOG_CHANNEL=stack`
- `LOG_LEVEL=error`
- `DB_CONNECTION=mysql`
- `DB_HOST=` hostname interno do MySQL no Render
- `DB_PORT=3306`
- `DB_DATABASE=chutball`
- `DB_USERNAME=chutball`
- `DB_PASSWORD=` mesma senha do MySQL
- `BROADCAST_DRIVER=log`
- `CACHE_DRIVER=file`
- `FILESYSTEM_DISK=local`
- `QUEUE_CONNECTION=sync`
- `SESSION_DRIVER=file`
- `SESSION_LIFETIME=120`
- `MAIL_MAILER=log`

## Passo 4: observacoes

- O script de start deste repo espera o MySQL ficar disponivel e roda `php artisan migrate --force` antes de subir o Apache.
- O Render exige que a aplicacao escute em `0.0.0.0`; com Apache no container isso fica resolvido pelo proprio servico web.
- O MySQL no Render usa disco persistente e, por isso, nao fica no plano gratis.

## Fontes oficiais

- Laravel com Docker no Render: https://render.com/docs/deploy-php-laravel-docker
- MySQL no Render: https://render.com/docs/deploy-mysql
- Blueprints/infra as code: https://render.com/docs/blueprint-spec
