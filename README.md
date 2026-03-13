# Wallet Backend System API

## Project Overview

This project is a simple Wallet Backend System developed using **Laravel**.
It provides REST APIs that allow users to register, authenticate, view their wallet balance, and transfer tokens to other users securely.

The main goal of this project is to demonstrate backend development skills including:

* REST API development
* Database design
* Secure authentication
* Transaction safety
* Concurrency handling

---

# Tech Stack

* **Language:** PHP 8+
* **Framework:** Laravel 12
* **Authentication:** Laravel Sanctum
* **Database:** MySQL
* **API Testing:** Postman / Thunder Client

---

# Features

### 1. User Registration

Users can register using name, email, and password.

* Email must be unique
* Password is securely hashed
* A wallet is automatically created for every new user

---

### 2. User Login

Registered users can login using their email and password.

* Returns an authentication token
* Token must be used for accessing protected APIs

---

### 3. Wallet Balance

Authenticated users can check their wallet balance.

---

### 4. Token Transfer

Users can transfer tokens to other users.

Rules:

* Users cannot transfer tokens to themselves
* User must have sufficient balance
* Both sender and receiver wallets are updated
* Transaction is recorded

---

# Transaction Safety

The transfer operation uses **database transactions** to guarantee:

* Atomic updates
* No double spending
* No negative balances

Laravel's database transaction system ensures that if any part of the transfer fails, the entire operation is rolled back.

---

# Database Schema

## users

| Column     | Type            |
| ---------- | --------------- |
| id         | bigint          |
| name       | string          |
| email      | string (unique) |
| password   | string          |
| created_at | timestamp       |

---

## wallets

| Column     | Type      |
| ---------- | --------- |
| id         | bigint    |
| user_id    | bigint    |
| balance    | decimal   |
| updated_at | timestamp |

---

## transactions

| Column      | Type      |
| ----------- | --------- |
| id          | bigint    |
| sender_id   | bigint    |
| receiver_id | bigint    |
| amount      | decimal   |
| created_at  | timestamp |

---

# API Endpoints

## Register

POST `/api/register`

Request

```
{
"name": "david",
"email": "david@gmail.com",
"password": "123456"
}
```

---

## Login

POST `/api/login`

Request

```
{
"email": "david@gmail.com",
"password": "123456"
}
```

---

## Wallet Balance

GET `/api/wallet`

Headers

```
Authorization: Bearer {token}
```

---

## Transfer Tokens

POST `/api/transfer`

Headers

```
Authorization: Bearer {token}
```

Request

```
{
"receiver_id": 2,
"amount": 50
}
```

---

# Installation Guide

Clone the repository

```
git clone https://github.com/yourusername/wallet-backend-system.git
```

Go to project folder

```
cd wallet-backend-system
```

Install dependencies

```
composer install
```

```
php artisan key:generate
```

Configure database in `.env`

Run migrations

```
php artisan migrate
```

Start development server

```
php artisan serve
```

Server will run on:

```
http://127.0.0.1:8000
```

---

# API Testing

You can test the APIs using:

* Postman
* Thunder Client
---

# Security

The system uses **Laravel Sanctum** for API authentication.

All protected endpoints require a valid Bearer Token.

Passwords are securely hashed using Laravel's hashing system.

---

---

# Author

Salim Rashid Shaikh
Backend Developer
Experience: PHP, Laravel, CodeIgniter, MySQL, REST APIs

---
