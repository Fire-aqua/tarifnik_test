# tarifnik_test

### Скопировать .env.example и переименовать в .env в корне проекта.

### Сборка контейнеров
```
docker-compose build
```

### Установка библиотек на бэке
```
docker-compose run composer install
```

### Установка библиотек на фронте
```
docker-compose run yarn install
```

### Запуск контейнеров для бэка
```
docker-compose up -d
```

### Запуск фронта
```
docker-compose run -p 8080:8080 yarn serve
```