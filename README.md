# Тестовое задание

__Установка консольного приложения__ 
1. Клонировать репозиторий, выполнив команду 

```
git clone https://github.com/dye491/search-filight.git
```

2. Перейти в папку search-flight, выполнить команду

```
composer install
```
3. Создать базу данных с именем `flight`
4. Отредактировать файл config/db.php, задав имя и пароль для пользователя mysql
5. Выполнить миграции, с помощью команды
```
php yii migrate
```
6. Запустить приложение, выполнив команду
```
php yii search-flight/search-and-save
```
Результатом выполнения команды будет заполнение таблицы flight данными.