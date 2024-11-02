<p align="center"> 
  <a href="https://laravel.com" target="_blank"> 
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> 
  </a> 
</p> 
<p align="center"> 
  <a href="https://github.com/laravel/framework/actions"> 
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"> 
  </a> 
  <a href="https://packagist.org/packages/laravel/framework"> 
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"> 
  </a> 
  <a href="https://packagist.org/packages/laravel/framework"> 
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"> 
  </a> 
  <a href="https://packagist.org/packages/laravel/framework"> 
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"> 
  </a> 
</p>

```markdown

# About WhatsApp Clone
This application is a WhatsApp clone built with Laravel, featuring core messaging functionalities like sending and receiving messages. With a focus on simplicity and real-time communication, this app emulates key aspects of WhatsApp’s chat experience.

# Installation and Setup
To set up this application in your local environment, follow the steps below:

## Clone the Repository
```bash
git clone <your-repository-url>
cd chatapp
```

## Install Dependencies
```bash
composer install
```

## Set Up the Environment File
```bash
cp .env.example .env
php artisan key:generate
```

## Run Migrations to Set Up the Database
```bash
php artisan migrate
```

## Run Scheduled Tasks
```bash
php artisan schedule:run
```

# API Testing with Postman
To test the API endpoints, use Postman. Set the base URL to point to your local server or deployment environment and use the following endpoints:

## Authentication
### Register
**POST** `{{BASE_URL}}/api/register`

**Headers:** 
- Accept: application/json

**Body (form-data):**
- name: random
- email: random@user.com
- password: 112233
- password_confirmation: 112233

### Login
**POST** `{{BASE_URL}}/api/login`

**Headers:** 
- Accept: application/json

**Body (form-data):**
- email: random@user.com
- password: 112233

### Logout
**POST** `{{BASE_URL}}/api/logout`

**Authorization:** Bearer Token `{{token}}`  
**Headers:** 
- Accept: application/json

## Chat Room Management
### Create Room
**POST** `{{BASE_URL}}/api/create/room`

**Headers:** 
- Content-Type: application/json
- Accept: application/json

**Body (form-data):**
- name: New Room

### Remove Room
**POST** `{{BASE_URL}}/api/remove/room`

**Headers:** 
- Accept: application/json

**Body (form-data):**
- chat_room_id: 1

### Join Room
**POST** `{{BASE_URL}}/api/join/room`

**Headers:** 
- Accept: application/json

**Body (form-data):**
- chat_room_id: 1
- user_id: 1

### Leave Room
**POST** `{{BASE_URL}}/api/leave/room`

**Headers:** 
- Accept: application/json

**Body (form-data):**
- chat_room_id: 1
- user_id: 1

## Messaging
### Send Message
**POST** `{{BASE_URL}}/api/send/message`

**Authorization:** Bearer Token `{{token}}`  
**Headers:** 
- Accept: application/json

**Body (form-data):**
- chat_room_id: 1
- user_id: 1
- message: Sending Message

### Remove Message
**POST** `{{BASE_URL}}/api/remove/message`

**Headers:** 
- Accept: application/json

**Body (form-data):**
- id: 1

## Listing
### List Rooms
**GET** `{{BASE_URL}}/api/list/room`

**Headers:** 
- Accept: application/json

### List Messages
**GET** `{{BASE_URL}}/api/list/message`

**Headers:** 
- Accept: application/json

# License
This project is open-source and licensed under the MIT license.
```
