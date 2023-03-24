# message_broker

## run docker:

```bash
docker compose up --build -d
```

```bash
docker exec -it b0efc9e53db9 composer require symfony/runtime
docker exec -it b0efc9e53db9 php bin/console messenger:consume 
```

## Accès web:

rabbitmq: http://localhost:15672
