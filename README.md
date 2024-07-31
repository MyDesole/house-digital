ЗАПУСК

в командной строке: 
    docker-compose build
    docker-compose up -d
после поднятия контрейнера:
    docker-compose exec app bash
    cd ../var/www
    php artisan migrate --seed
эндпоинты: 
    [GET] /catalog/{paginate} - вывод каталога, в параметре указать сколько 
    количество предметов для пагинации, если ничего не указать, выведутся все
    [POST] /catalog - выводит предмет с фильтрацией
    заголовки - type(price, property),
                если type = price:
                    priceStart (integer)
                    priceEnd (integer)
                если type = property
                    propertyId (integet) от 1 до 200 (в сидере 200 характеристик)
    [GET] /feedback - выводит все отзывы 
    [POST] /feedback - создание отзыва
    заголовки - header (string)
                body (string)
                score (integer) от 1 до 5
                item_id (integer) от 1 до 50 (в сидере 50 предметов)
    Ожидаемый ответ: созданный отзыв
