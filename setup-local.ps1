$ErrorActionPreference = "Stop"

Write-Host "== CHUTBALL local bootstrap ==" -ForegroundColor Cyan

if (-not (Get-Command php -ErrorAction SilentlyContinue)) {
    Write-Host "PHP nao foi encontrado no PATH. Instale/configure PHP e rode este script novamente." -ForegroundColor Yellow
    exit 1
}

if (-not (Test-Path -LiteralPath ".env")) {
    Copy-Item -LiteralPath ".env.example" -Destination ".env"
    Write-Host ".env criado a partir de .env.example" -ForegroundColor Green
}

Write-Host "Gerando APP_KEY..." -ForegroundColor Cyan
php artisan key:generate --force

Write-Host "Limpando caches..." -ForegroundColor Cyan
php artisan optimize:clear

Write-Host "" 
Write-Host "Bootstrap concluido." -ForegroundColor Green
Write-Host "Passos restantes:" -ForegroundColor Cyan
Write-Host "1. Crie/import o banco 'chutball' usando VOLTA.sql"
Write-Host "2. Ajuste DB_USERNAME/DB_PASSWORD no .env se necessario"
Write-Host "3. Rode: php artisan serve"
