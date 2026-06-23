## Для запуска:
```shell
docker compose up -d
```

## Запустить миграции в докер контейнере с Yii:
```shell
php yii migrate/up
```

## Эндпоинты:
POST car:
```shell
curl --location 'http://localhost:8000/car/create' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'Cookie: _csrf=a086c7b06939c13f9d31f131809ea86f920ad1903922208128070fb262fafad8a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%227ClT5ygjVhaa_GwgBYO6FWqTvh0bR8E5%22%3B%7D' \
--data '{
  "title": "BMW 3 Series",
  "description": "Sport package, excellent condition",
  "price": 25000,
  "photo_url": "https://example.com/bmw.jpg",
  "contacts": "+44 7777 777777",
  "options": {
    "brand": "BMW",
    "model": "320i",
    "year": 2021,
    "body": "sedan",
    "mileage": 45000
  }
}'
```

GET car/*:
```shell
curl --location --request GET 'http://localhost:8000/car/1' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'Cookie: _csrf=a086c7b06939c13f9d31f131809ea86f920ad1903922208128070fb262fafad8a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%227ClT5ygjVhaa_GwgBYO6FWqTvh0bR8E5%22%3B%7D' \
--data '{
  "title": "BMW 3 Series",
  "description": "Sport package, excellent condition",
  "price": 25000,
  "photo_url": "https://example.com/bmw.jpg",
  "contacts": "+44 7777 777777",
  "options": {
    "brand": "BMW",
    "model": "320i",
    "year": 2021,
    "body": "sedan",
    "mileage": 45000
  }
}'
```

GET car/list:
```shell
curl --location --request GET 'http://localhost:8000/car/list' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'Cookie: _csrf=a086c7b06939c13f9d31f131809ea86f920ad1903922208128070fb262fafad8a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%227ClT5ygjVhaa_GwgBYO6FWqTvh0bR8E5%22%3B%7D' \
--data '{
  "title": "BMW 3 Series",
  "description": "Sport package, excellent condition",
  "price": 25000,
  "photo_url": "https://example.com/bmw.jpg",
  "contacts": "+44 7777 777777",
  "options": {
    "brand": "BMW",
    "model": "320i",
    "year": 2021,
    "body": "sedan",
    "mileage": 45000
  }
}'
```
