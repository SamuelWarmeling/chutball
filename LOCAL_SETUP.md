# Setup local do CHUTBALL

Este projeto e Laravel 9 com base de dados principal em `VOLTA.sql`.

## Requisitos

- PHP 8.0 ou superior
- Composer
- MySQL 8+ ou MariaDB compativel

## 1. Criar o banco

Crie um banco chamado `chutball`.

Exemplo no MySQL:

```sql
CREATE DATABASE chutball CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

## 2. Configurar o ambiente

O projeto ja vem com `.env` local preparado para:

- `APP_NAME=CHUTBALL`
- `APP_URL=http://127.0.0.1:8000`
- `DB_DATABASE=chutball`
- `DB_USERNAME=root`
- `DB_PASSWORD=`

Se seu MySQL usa outro usuario ou senha, ajuste o `.env`.

## 3. Importar a base

Este projeto depende do dump em [VOLTA.sql](C:/Users/samue/OneDrive/Documentos/Playground/chutball/VOLTA.sql).

Importe o arquivo no banco `chutball`.

Exemplo:

```bash
mysql -u root -p chutball < VOLTA.sql
```

Observacao:

- O projeto possui migrations Laravel, mas o dump SQL continua sendo o caminho mais seguro para reproduzir o banco atual.
- Eu notei que nem todas as tabelas do dump aparecem nas migrations, entao nao recomendo depender so de `php artisan migrate`.

## 4. Gerar chave e limpar cache

Depois que o PHP estiver funcionando no terminal:

```bash
php artisan key:generate
php artisan optimize:clear
```

## 5. Subir o servidor

```bash
php artisan serve
```

Abra:

```text
http://127.0.0.1:8000
```

## 6. Ajustes recomendados apos subir

- Atualizar a tabela `settings` para refletir marca e links do CHUTBALL
- Trocar imagens antigas do tema anterior
- Revisar pacotes/apostas cadastrados na tabela `packages`
- Criar usuarios de teste em vez de usar dados importados antigos

## Problemas conhecidos

- O terminal atual ainda nao encontra `php`, entao eu nao consegui rodar `artisan` daqui.
- O arquivo `VOLTA.sql` ainda carrega nomes e dados antigos do script original.
- Algumas telas ainda carregam visual herdado do tema anterior e merecem rebranding completo.
