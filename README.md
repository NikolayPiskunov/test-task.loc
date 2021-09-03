## Запуск проекта

### Клонирование из репозитория

    git clone https://github.com/NikolayPiskunov/test-task.loc.git

### Скопировать файл .env.example    

    cp .env.example .env

### Заполнить в файле .env

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"

### Выполнить команды

    composer install
    php artisan key:generate
    php artisan migrate

### Далее открываем сайт. Доступ к рабе с заявками станет доступ после подтверждения почты.
Чтобы предоставить доступ к заявкам, юез подтверждения почты, нужно заменить строку в файле routes/web.php с

    Route::resource('order', \App\Http\Controllers\OrderController::class)
    ->only([
        'index',
        'show',
        'store',
        'create',
    ])
    ->middleware('verified');

На 

    Route::resource('order', \App\Http\Controllers\OrderController::class)
    ->only([
        'index',
        'show',
        'store',
        'create',
    ])
    ->middleware('auth');