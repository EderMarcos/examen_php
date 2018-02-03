# Examen PHP
Este pryecto fue creado por Jose Eder Marcos Lara usando el framework Slim

## Instalacion

Para ejecutar el proyecto se requiere un servidor, en mi caso ocupe xampp, se clona el proyecto dentro de la carpeta htdocs, y tambien es necesario instalar composer.

    cd examen_php/
    curl -sS https://getcomposer.org/installer | php

Posteriormente hay que hacer un `[composer install]` para instalar los archivos que requiera la aplicacion. Para probar los 

* Es necesario crear la base de datos `[examen_php]` e importar el script mail.sql.
* Para probar si esta corriendo el api, se puede acceder a la siguiente ruta `http://localhost/examen_php/public/test/` y deberia de aparecer una respuesta en json
* Se recomiendo el uso de postman para el resto de las API

#API de Shipment
* Ver todos los elementos: Metodo Get `http://localhost/examen_php/public/shipment/get/`
* Ver solo uno: Metodo Get `http://localhost/examen_php/public/shipment/get/0/`
* Crear: Metodo Post `http://localhost/examen_php/public/shipment/get/`
       
       Atributos
       * customer_email
       * order_id
       * imei
       * track_start
       * track_duration_hour
       * track_interval_min
       * next_position_update
       * shipment_vehicle_id
* Actualizar: Metodo Put `http://localhost/examen_php/public/shipment/put/0/`

        Atributos
       * customer_email
       * order_id
       * imei
       * track_start
       * track_duration_hour
       * track_interval_min
       * next_position_update
       * shipment_vehicle_id
* Eliminar: Metodo Delete `http://localhost/examen_php/public/shipment/delete/0/`

        Atributos
       * customer_email
       * order_id
       * imei
       * track_start
       * track_duration_hour
       * track_interval_min
       * next_position_update
       * shipment_vehicle_id
       
#API de Shipment Vehicle
* Ver todos los elementos: Metodo Get `http://localhost/examen_php/public/shipment-vehicle/get/`
* Ver solo uno: Metodo Get `http://localhost/examen_php/public/shipment-vehicle/get/0/`
* Crear: Metodo Post `http://localhost/examen_php/public/shipment-vehicle/get/`
       
       Atributos
       * provider_id
       * pos_date
       * pos_lat
       * pos_lng
       * imei
* Actualizar: Metodo Put `http://localhost/examen_php/public/shipment-vehicle/put/0/`

        Atributos
       * provider_id
       * pos_date
       * pos_lat
       * pos_lng
       * imei
* Eliminar: Metodo Delete `http://localhost/examen_php/public/shipment-vehicle/delete/0/`

        Atributos
       * provider_id
       * pos_date
       * pos_lat
       * pos_lng
       * imei