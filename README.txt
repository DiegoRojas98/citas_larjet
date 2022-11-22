Citas Larjet(laravel con jetstream)

Aplicacion con laravel usando jetstream(livewire)
consta de moludos como configuracion de usuarios modulo
de registro e ingreso y modulo de citas 

Se modifico laravel para el uso de bootstrap sustituyendo
tailwind y se le agregaron algunas librerias dentor 
del SASS y JS para algunos estilo de tablas

-------------------------------------------------------
Requiere 
    laravel (proyecto en general)
    nodejs 
        npm install (instala las dependencias del proyecto definidas
            en package.json) 
        npm run dev(compila CSS y JS para su uso)
    mysql (base de datos)
    composer 
        composer install (instalas las dependecias vendor definidas
            en composer.json)

--------------------------------------------------------
Instalacion

Descarge el proyecto, luego ejecute los comando 

    composer install
    npm install

Esto descargara las dependencias que requiere el proyecto
En el gestor de BD(que debe ser mysql) cree la base de datos

    citas_larjet

Cree el archivo .env en la raiz con la siguiente informacion
recordando que el acceso a base de datos depende de la configuracion
local
    ------
        APP_NAME=Laravel
        APP_ENV=local
        APP_KEY=base64:LvE1N/5lMceA2BChI2RXgSQTOFe4l3OJbiwvj6RwwW4=
        APP_DEBUG=true
        APP_URL=http://localhost

        LOG_CHANNEL=stack
        LOG_DEPRECATIONS_CHANNEL=null
        LOG_LEVEL=debug

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=citas_larjet
        DB_USERNAME=root
        DB_PASSWORD=

        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        FILESYSTEM_DISK=local
        QUEUE_CONNECTION=sync
        SESSION_DRIVER=database
        SESSION_LIFETIME=120

        MEMCACHED_HOST=127.0.0.1

        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379

        MAIL_MAILER=smtp
        MAIL_HOST=mailhog
        MAIL_PORT=1025
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        MAIL_FROM_ADDRESS="hello@example.com"
        MAIL_FROM_NAME="${APP_NAME}"

        AWS_ACCESS_KEY_ID=
        AWS_SECRET_ACCESS_KEY=
        AWS_DEFAULT_REGION=us-east-1
        AWS_BUCKET=
        AWS_USE_PATH_STYLE_ENDPOINT=false

        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_HOST=
        PUSHER_PORT=443
        PUSHER_SCHEME=https
        PUSHER_APP_CLUSTER=mt1

        VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
        VITE_PUSHER_HOST="${PUSHER_HOST}"
        VITE_PUSHER_PORT="${PUSHER_PORT}"
        VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
        VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    ------

ejecute los comandos

    php artisan migrate --seed
    npm run dev
    php artisan serve

Al finalizar este le arrojara una ruta como la suiguiente
ingresela en el navegador y haga test de la app

    http://127.0.0.1:8000








Archivos de repositorio
    Para modificacion del proyecto y subida a un repositorio propio
    cree los siguientes archivos (Esto No es Indispensable)

    ----- .editorConfig
        root = true

        [*]
        charset = utf-8
        end_of_line = lf
        indent_size = 4
        indent_style = space
        insert_final_newline = true
        trim_trailing_whitespace = true

        [*.md]
        trim_trailing_whitespace = false

        [*.{yml,yaml}]
        indent_size = 2

        [docker-compose.yml]
        indent_size = 4
    -----

    ----- .gitattributes
        * text=auto

        *.blade.php diff=html
        *.css diff=css
        *.html diff=html
        *.md diff=markdown
        *.php diff=php

        /.github export-ignore
        CHANGELOG.md export-ignore
        .styleci.yml export-ignore
    -----

    ----- .gitignore
        /node_modules
        /public/build
        /public/hot
        /public/storage
        /storage/*.key
        /vendor
        .env
        .env.backup
        .env.production
        .phpunit.result.cache
        Homestead.json
        Homestead.yaml
        auth.json
        npm-debug.log
        yarn-error.log
        /.fleet
        /.idea
        /.vscode
    -----

