## API для управления пользователями
Простое REST API для управления пользователями. API поддерживает следующие методы:

### Запуск проекта

1. Создайте директорию `project` и внутри нее создайте структуру, как указано выше.
2. Запустите локальный сервер PHP, например, с помощью команды:
   ```bash
   php -S localhost:8000 -t project
   ```

### Примеры запросов

Создание пользователя:
```bash
curl -X POST -H "Content-Type: application/json" -d '{"username":"john_doe","password":"password123","email":"john@example.com"}' http://localhost:8000/api/users/create.php
```
Авторизация пользователя:
```bash
curl -X POST -H "Content-Type: application/json" -d '{"username":"john_doe","password":"password123"}' http://localhost:8000/api/users/login.php
```
Получение информации о пользователе:
```bash
curl -X GET http://localhost:8000/api/users/get.php?id=user_id
```
   
