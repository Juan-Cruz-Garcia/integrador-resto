# Proyecto Laravel

Este proyecto es una aplicación web construida con el framework Laravel.

## Requisitos

- PHP >= 8.2
- Composer
- Node.js y npm
- Servidor web (por ejemplo, XAMPP)

## Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. Instalar las dependencias de PHP:
    ```sh
    composer install
    ```

2. Copiar el archivo de entorno:
    ```sh
    cp .env.example .env
    ```

3. Crear la clave de cifrado:
    ```sh
    php artisan key:generate
    ```

4. Prender el servidor de XAMPP.

5. Migrar la base de datos (opcionalmente seedear):
    ```sh
    php artisan migrate

    php artisan db:seed
    ```

6. Prender el servidor de desarrollo:
    ```sh
    php artisan serve --port=80
    ```

7. Linkear el storage a public:
    ```sh
    php artisan storage:link
    ```

8. Instalar las dependencias de JavaScript y construir los assets:
    ```sh
    npm install
    npm run build
    ```

## Verificación de Formularios

Para crear una solicitud de verificación de formularios, usa el siguiente comando:
```sh
php artisan make:request ModelRequest
