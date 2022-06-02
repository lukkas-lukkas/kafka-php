# Colocar um nome aqui

Projeto desenvolvido para apresentar integração do php com kafka e utilizar conceitos de arquiterura limpa e arquitetura hexagonal

## Usage

### Instalar projeto
```
docker run --rm --interactive --tty --volume $PWD/application:/application -w application  composer install
```

### Subindo aplicação e construindo imagem
```
docker-compose up -d --build
```

### Rodando consumidores
```
docker exec ecommerce-php php artisan process-new-order
```
```
docker exec ecommerce-php php artisan log-order-approved
```
```
docker exec ecommerce-php php artisan log-order-reproved
```

### Chamada para http://localhost:9001/api/new-order com:
```
{
  "name": "Kevin Malone",
  "document": "99999999999",
  "birthdate": "2000-01-01",
  "email": "kevin.malone@dundermifflin.com",
  "amount": "10000"
}
```
