# cat_site

sudo tasksel install lamp-server


/etc/hosts
<...>
127.0.0.1   catalog-site.ru
<...>


Конфиги апача:
/etc/apache2/conf-available/charset.conf
раскомментить AddDefaultCharset UTF-8


/etc/apache2/apache2.conf
<...>
<Directory /home/USERNAME-PC>
    Options Indexes FollowSymLinks
    AllowOverride None
    Require all granted
</Directory>
<...>


/etc/apache2/sites-available/catalog-site.ru.conf
<VirtualHost *:80>
    ServerName catalog-site.ru
    DocumentRoot /home/USERNAME-PC/cat_site
    <Directory /home/USERNAME-PC/cat_site>
        AllowOverride All
        Allow From All
    </Directory>
</VirtualHost>


mysql -u USERNAME -p < PATH_TO_DIRECTORY/cat_site/install/create_db.sql

