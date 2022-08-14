# quesms
SMS Queuing app

Requirements

• PHP 7.3 or higher
Version

This Laravel framework is running on a version of 8.* and Bootstrap is running on 5.2
Usage

Clone the repository

git clone git@github.com:itsassef/quesms.git

Change directories into quesms

cd quesms/

Install composer

composer install

Create the .env file by duplicating the .env.example file

cp .env.example .env

Set the APP_KEY value

Get your twilio credentials set up in the .env file.
command the following
php artisan key:generate

Clear your cache & config (OPTIONAL)

php artisan cache:clear && php artisan config:clear

Finally, run your project in the browser!

php artisan serve

add the numbers in the box separated by comma and add a message to add the message and numbers to the queue.

