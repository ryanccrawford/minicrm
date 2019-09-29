# MINI CRM
Mini CRM in Laravel

Hello, to recreate:

```
$ git clone https://github.com/ryanccrawford/minicrm.git
```

Then create a MySQL database:

```
mysql> create database ryan_marketingforchange_laravel_crm
```

Then cd into minicrm

```
$ cd minicrm
```

Next create an .env file 

```
touch .env
```

Then copy and paste this to the .env you just created

```
APP_NAME='Human Asset Managment'
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ryan_marketingforchange_laravel_crm
DB_USERNAME=replace_with_user_name
DB_PASSWORD=repalce_with_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

Before saveing the above to your .env file, replace the MySQL database username and password with your own.

