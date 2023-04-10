# Тестовое задание

## Описание проекта

* Развернуть Laravel (commit init)
* Установить на него voyager (commit voyager), Сделать кастомный контроллер для новости (posts), наследованный от контроллера админ-панели по умолчанию + кастомный шаблон редактирования.
* Особенность доработки в следующем: при сохранении типа ввода поля title  (Text), изменить формат отображения именно этого поля на странице редактирования в качестве Textarea. (commit edit title)
* Логика работы механизма BREAD не должна пострадать, любые изменения/добавления полей в админ-панели должны применяться к пользовательскому интерфейсу, как это работает по умолчанию

1. Поставить Laravel 9 и Voyager
2. Сделать свой контроллер для постов, который наследуется от стандартного, и шаблон редактирования
3. Поменять поле title на этом шаблоне с text на textarea без использования админки

## Требования к системе
* php ^8.1+
    * [Требуемые Laravelом расширения](https://laravel.com/docs/8.x/deployment#server-requirements)
* ИЛИ для запуска в Docker
    * docker ^20.10.9
    * docker-compose^1.22

## Установка

### Установка локально
```bash 
composer install
cp .env.example .env
php artisan key:generate
php artisan voyager:install --with-dummy 
```

### Установка в Docker
```bash
docker-compose up -d
docker-compose exec app sh
    cd /var/www/html
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan voyager:install --with-dummy
```