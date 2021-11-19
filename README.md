# create database in your mysql

#.env
```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1{ [IF USE DOCKER-COMPOSE] DOCKER-MYSQL-SERVICE-NAME}
DB_PORT=3306
DB_DATABASE={YOUR DATABASE NAME}
DB_USERNAME={YOUR MYSQL USER}
DB_PASSWORD={YOUR MYSQL USER PASSWORD}

MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME={YOU MAIL}
MAIL_PASSWORD={YOU MAIL PASSWORD}
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS={YOU MAIL}
MAIL_FROM_NAME="${APP_NAME}"
```

# endpoint
```
http://localhost:8000/land/(1-4)
http://localhost:8000/postcard/(1-4)
http://localhost:8000/bird/(1-4)
```
