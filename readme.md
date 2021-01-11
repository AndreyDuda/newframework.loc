## Запустить проект:

- Клонировать проект
   . Можно клонировать проект при помощи git
<pre>
<code>git clone git@github.com:AndreyDuda/newframework.loc.git </code>
</pre>
- Проект разрабатывался с Docker, все конфигурациооные файлы присуствуют и можно запустить проект командой
<pre>
<code> docker-compose build</code
затем
<code> docker-compose up -d </code>
</pre>
- Запустить через composer установку всех необходимых библиотек
<pre>
<code> docker exec -i project-php-fpm bash -c "composer install" <code>
</pre>
- Для того что коректно рабатал фронт нужно выполнить команду
<pre>
<code> docker exec project_node npm install </code>
</pre>
- Запустите миграцию, чтобы накатить таблицу в Вашу БД:
<pre>
<code>docker exec -i project-php-fpm bash -c "vendor/bin/phinx migrate" </code>
</pre>
