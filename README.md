# GICA Compose Symfony 5 Apache

- login to container:  
>docker-compose exec webserver bash
>cd <full> or <api> or <other>
>composer install

- use it like this: 
http://localhost/<full>/public/index.php?XDEBUG_SESSION_START=PHPSTORM

- On Linux we have an issue with *xdebug.remote_host* - it should work with **host.docker.internal** but it doesn't yet.
So I'm gonna use my docker ip instead. Get it with:

> ifconfig docker0 | grep 'inet ' | awk '{print $2;exit}'

And add it to config/php/php.ini: xdebug.remote_host key
xdebug.remote_host=172.17.0.1

(https://phauer.com/2017/debug-php-docker-container-idea-phpstorm/)
