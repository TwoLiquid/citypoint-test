# CityPoint Test API

https://github.com/TwoLiquid/citypoint-test

## Старт

Для начала клонируем проект:

```
git clone https://github.com/TwoLiquid/citypoint-test
```

## Переменные окружения

Создать на базе файла **.env.example** новый файл **.env** (при необходимости запросить данные).

## Окружение

Теперь из корня склонированного проекта собираем **Docker**:

```
docker-compose build
docker-compose up -d
```

Далее заходим в **PHP** контейнер:

```
docker exec -it php bash
```

Отсюда мы уже можем запускать любые **Laravel** команды:

```
composer install
php artisan key:generate
php artisan database:create
php artisan database:init
```

## Папка storage и права

Убедитесь, что в папке **/storage** созданы все необходимые папки и дайте права на запись в эту папку со всеми вложенными:

```
storage
    app
    framework
        cache
        sessions
        views
    logs
```

## Документация

Документация ведется в **Postman**

