# Run

### В режиме демона:
`docker-compose up --build -d`

### Обычный запуск с логами:
`docker-compose up --build`

### Вторая команда! 
`docker exec -it deploy_webserver_1 chmod 777 /application/public/`

> Если ругается на `deploy_webserver_1`, то изменить на имя контейнера (`docker-compose ps` в директории с проектом)
