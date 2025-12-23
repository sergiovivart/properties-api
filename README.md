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

## 📡 Endpoint principal

GET /api/properties/available-for-operations

## 🔐 Generar token de acceso (entorno local) 

La API está protegida mediante Bearer Token.

- GET /GeneraTokenPersonal

Este endpoint genera un token personal para el primer usuario de la base de datos (creado por los seeders).

Usar el token en Postman

- Authorization: Bearer TU_TOKEN_AQUI
- Accept: application/json

## 🔎 Filtros soportados (opcional)

El endpoint admite filtros vía query params, por ejemplo:

- ?page=1
- ?per_page=20
- ?office_id=
- ?property_type=
- ?min_price=
- ?max_price=

## ℹ️ Notas

Este proyecto está pensado para ejecutarse en entorno local con SQLite y datos de prueba generados mediante seeders.