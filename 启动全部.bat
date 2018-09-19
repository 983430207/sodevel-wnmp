@echo off
set base_path=%cd%
set nginx_path=%base_path%\nginx-1.14.0
set php_path=%base_path%\php-7.1.17
set php5_path=%base_path%\php-5.6.36
set mysql_path=%base_path%\mysql-5.6.40-winx64

echo Starting PHP FastCGI...
RunHiddenConsole %php_path%\php-cgi.exe -b 127.0.0.1:9000 -c %php_path%\php.ini
echo Starting PHP5 FastCGI...
RunHiddenConsole %php5_path%\php5-cgi.exe -b 127.0.0.1:9001 -c %php5_path%\php.ini

echo Starting nginx...
RunHiddenConsole %nginx_path%\nginx.exe -c %nginx_path%\conf\nginx.conf
echo Starting MySql...
RunHiddenConsole %mysql_path%\bin\mysqld --defaults-file=%mysql_path%\my.ini --port=3306
echo please open http://127.0.0.1 ...
ping -n 3 127.0.0.1 > nul
start iexplore "http://127.0.0.1/phpmyadmin"
exit