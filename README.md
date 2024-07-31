ЗАПУСК

в командной строке: 
    docker-compose build
    docker-compose up -d
после поднятия контрейнера:
    docker-compose exec app bash
    composer install
    php artisan migrate --seed
далее создаем в коренной папке файл .env
туда вставляем:
    DB_CONNECTION=pgsql
    DB_HOST=db
    DB_PORT=5432
    DB_DATABASE=test
    DB_USERNAME=user
    DB_PASSWORD=1234

эндпоинты: 
    [GET] http://127.0.0.1:8876/catalog/{paginate} - вывод каталога, в параметре указать сколько 
    количество предметов для пагинации, если ничего не указать, выведутся все
    [POST] http://127.0.0.1:8876/catalog - выводит предмет с фильтрацией
    заголовки - type(price, property),
                если type = price:
                    priceStart (integer)
                    priceEnd (integer)
                если type = property
                    propertyId (integet) от 1 до 200 (в сидере 200 характеристик)
    [GET] http://127.0.0.1:8876/feedback - выводит все отзывы 
    [POST] http://127.0.0.1:8876/feedback - создание отзыва
    заголовки - header (string)
                body (string)
                score (integer) от 1 до 5
                item_id (integer) от 1 до 50 (в сидере 50 предметов)
    Ожидаемый ответ: созданный отзыв
