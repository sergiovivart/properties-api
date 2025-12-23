# 🏢 Properties API – Available for Operations

Prueba técnica backend desarrollada con **Laravel 11** para listar propiedades disponibles para crear operaciones, aplicando reglas de negocio, filtros y control de acceso.

---

## 📌 Objetivo

Implementar el endpoint:

GET /api/properties/available-for-operations

Que devuelva propiedades disponibles para crear operaciones, cumpliendo:

- Reglas de disponibilidad
- Filtros avanzados
- Autorización por rol/oficina
- Respuesta paginada y estructurada

---

## ⚙️ Requisitos técnicos

- PHP >= 8.2
- Laravel 11
- Composer
- SQLite
- Laravel Sanctum

---

## 🚀 Instalación

```bash
git clone https://github.com/sergiovivart/properties-api.git
cd properties-api
cd properties
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## 🔐 Generar token de acceso (entorno local) 

- GET /GeneraTokenPersonal

## 🔐 Usar el token en Postman

- Authorization: Bearer TU_TOKEN_AQUI
- Accept: application/json