<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
About WhatsApp Clone
This application is a WhatsApp clone built with Laravel. It includes core messaging features such as sending and receiving messages, along with other functionalities typically found in a chat application. The aim is to provide a similar experience to the WhatsApp messaging system with a focus on simplicity and real-time communication.

Installation and Setup
To get started, follow these steps to set up the application on your local environment.

Clone the repository:

bash
Copy code
git clone /chatapp
cd your-repository
Install dependencies:

bash
Copy code
composer install
Set up the environment file:

bash
Copy code
cp .env.example .env
php artisan key:generate
Run migrations to set up the database:

bash
Copy code
php artisan migrate
Run any scheduled tasks:

bash
Copy code
php artisan schedule:run
Testing with Postman
Use Postman to test the messaging API endpoints. Import the Postman collection and set the base URL to point to your local or production server.

chat-app
﻿

POST
Register
{{BASE_URL}}api/register
﻿

Request Headers
Accept
application/json
Body
urlencoded
name
random
email
random@user.com
password
112233
password_confirmation
112233
POST
Login
{{BASE_URL}}api/login
﻿

Request Headers
Accept
application/json
Body
form-data
email
random@user.com
password
112233
POST
logout
{{BASE_URL}}api/logout
﻿

Authorization
Bearer Token
Token
{{token}}
Request Headers
Accept
application/json
POST
Create Room
{{BASE_URL}}api/create/room
﻿

Request Headers
Content-Type
application/json
Accept
application/json
Body
form-data
name
New Room
POST
Remove Room
{{BASE_URL}}api/remove/room
﻿

Request Headers
Accept
application/json
Body
urlencoded
chat_room_id
1
POST
Join Room
{{BASE_URL}}api/join/room
﻿

Request Headers
Accept
application/json
Body
urlencoded
chat_room_id
1
user_id
1
POST
Leave Room
{{BASE_URL}}api/leave/room
﻿

Request Headers
Accept
application/json
Body
urlencoded
chat_room_id
1
user_id
1
POST
Send Message
{{BASE_URL}}api/send/message
﻿

Authorization
Bearer Token
Token
{{token}}
Request Headers
Accept
application/json
Body
urlencoded
chat_room_id
1
user_id
1
message
Sending Message
POST
Remove Message
{{BASE_URL}}api/remove/message
﻿

Request Headers
Accept
application/json
Body
urlencoded
id
1
GET
List Room
{{BASE_URL}}api/list/room
﻿

Request Headers
Accept
application/json
GET
List Messages
{{BASE_URL}}api/list/message
﻿

Request Headers
Accept
application/json

Send Message: Use the POST /messages endpoint to send a new message.
Receive Messages: Use the GET /messages endpoint to retrieve all messages or filter by specific criteria.
License
This project is open-sourced software licensed under the MIT license.

Feel free to customize further by adding more detailed descriptions of your app’s unique features. Let me know if you need help with specific sections or additional details!
