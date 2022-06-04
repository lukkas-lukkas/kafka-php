# Kafka-php

Projeto desenvolvido para demonstrar integração do php com kafka, aplicação de conceitos de arquiterura limpa e arquitetura hexagonal

## Usage

- Build
```
docker-compose up -d --build
```

- Arquivo .env
```
docker exec ecommerce-php cp .env.example .env
```

- Instalação
```
docker exec ecommerce-php composer install
```

- Requisição para http://localhost:9001/api/new-order:
  - Condições para reprovação: idade < 15 || valor > 15.000
```
{
  "name": "Kevin Malone",
  "document": "99999999999",
  "birthdate": "2000-01-01",
  "email": "kevin.malone@dundermifflin.com",
  "amount": "10000"
}
```

- Consumidores
```
docker exec ecommerce-php php artisan process-new-order
```
```
docker exec ecommerce-php php artisan log-order-approved
```
```
docker exec ecommerce-php php artisan log-order-reproved
```

- Análise do fluxo no kafka utilizando kowl: http://localhost:7001
