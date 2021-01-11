Запустить проект:

2. Клонировать проект
   1 . Можно клонировать проект при помощи git

git clone git@github.com:AndreyDuda/newframework.loc.git
2 . Проект разрабатывался с Docker, все конфигурациооные файлы присуствуют и можно запустить проект командой

docker-compose build
затем
docker-compose up -d

3 . Запустить через composer установку всех необходимых библиотек

docker exec -i project-php-fpm bash -c "composer install"
4 . Для того что коректно рабатал фронт нужно выполнить команду

docker exec project_node_1 npm install

5 . Запустите миграцию, чтобы накатить таблицу в Вашу БД:

docker exec -i project-php-fpm bash -c "vendor/bin/phinx migrate"