# IsEazy - Backend Test

## Instalación usando Makefile

````shell
$ make build 'to build the docker environment'
$ make run 'to spin up containers'
$ make composer-install 'to install composer dependencies'
$ make migrate-database 'to runs the migrations'
$ make migrate-test-database 'to runs the migrations for database test'
$ make all-tests 'to run the test suite'
$ make ssh-be 'to access the PHP container bash'
$ make stop 'to stop and start containers'
$ make restart 'to stop and start containers'
````

## Instalación sin Makefile
````shell
$ docker network create laravel-prueba-network
$ U_ID=$UID docker-compose up -d --build
$ U_ID=$UID docker exec --user $UID -it laravel-prueba-be composer install --no-scripts --no-interaction --optimize-autoloader 
$ U_ID=$UID docker exec --user $UID -it laravel-prueba-be php artisan migrate
$ U_ID=$UID docker exec --user $UID -it laravel-prueba-be php artisan migrate --env=test
$ U_ID=$UID docker exec --user $UID -it laravel-prueba-be php artisan test
$ U_ID=$UID docker exec -it --user $UID beer-be bash
$ U_ID=$UID docker-compose stop
````

## Permisos del storage en caso de error al escribir en el log
````shell
En caso de que no se configuren correctamente los permisos de la carpera storage, puede producirse un error de permisos de escritura en el log.
En dicho caso establecer los permisos con:
$ chmod 777 -R storage
````

## Ejemplos ENDPOINTS

````shell

POST
CreateShop
Crear tienda con productos
http://localhost:250/v1/shop

Body
{
"name": "Malaga",
"products": [
{
"name": "Producto_1"
},
{
"name": "Producto_2"
},
{
"name": "Producto_1"
},
{
"name": "Producto_1"
},
{
"name": "Producto_1"
}
]
}

Response
{
"shop": {
"name": "Malaga",
"updated_at": "2023-02-08T21:43:37.000000Z",
"created_at": "2023-02-08T21:43:37.000000Z",
"id": 1
}
}




PUT
EditShop
Editar tienda
Nota:Solo editamos el nombre
http://localhost:250/v1/shop/1

Body
{
"name": "Requejada"
}

Response

{
"shop": {
"id": 1,
"name": "Requejada",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:46:13.000000Z"
}
}


GET
ListShops
Listado de tiendas
http://localhost:250/v1/shop

Response:
[
{
"id": 1,
"name": "Requejada",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:46:13.000000Z",
"products_count": 5
}
]


GET
GetShop
Descripción de una tienda
http://localhost:250/v1/shop/1

Response
{
"id": 1,
"name": "Requejada",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:46:13.000000Z",
"products": [
{
"id": 1,
"name": "Producto_1",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:43:37.000000Z"
},
{
"id": 2,
"name": "Producto_2",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:43:37.000000Z"
},
{
"id": 1,
"name": "Producto_1",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:43:37.000000Z"
},
{
"id": 1,
"name": "Producto_1",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:43:37.000000Z"
},
{
"id": 1,
"name": "Producto_1",
"created_at": "2023-02-08T21:43:37.000000Z",
"updated_at": "2023-02-08T21:43:37.000000Z"
}
]
}

PUT
SellProduct
Vender un producto
http://localhost:250/v1/sell-product-of-shop/1/product/1

ResponseSuccessTypeAlert
{
"operationResult": "Product sold, 3 units of the product remain in stock"
}

ResponseSuccessTypeAlert
{
"operationResult": "ALERT!! Product sold, 1 units of the product remain in stock"
}

ResponseSuccessTypeProductEmptyStockException
{
"exception": "ProductEmptyStockException",
"error": "Stock of product: Producto_1 out of stock in store: \"Requejada\""
}

````

## Stack:
- `NGINX 1.19` container
- `PHP 8.1 FPM` container
- `Laravel 9` framework