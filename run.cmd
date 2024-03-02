@echo off
cd /d "%~dp0"
start /B npm run dev & start /B php artisan serve

