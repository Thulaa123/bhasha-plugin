# Bhasha

## Installation

1. Pull the OctoberCMS Development Docker Image Using
```
docker pull octobercms/october-dev
```
2. For more info https://youtu.be/IImOhCbmD-I?si=ZjWuuA7iq74G9Qb9
3. Create a folder on the plugins directory called ``bhasha``
5. Clone this repository into the Bhasha folder
6. Install the ``User`` & ``Builder`` plugins from the package installer on the October cms backend \
i. Until the this plugin using
```
composer require rainlab/user-plugin "^2.1"
```
AND
```
php artisan october:migrate
```
5. Rename the ``bhasha-plugin`` folder on the graffon folder to ``xinstitute``
6. And RUN
```
 php artisan october:migrate
```
8. Open a new terminal and run the below command to give necessary permissions to the plugin
```
chown -R www-data:www-data /var/www/html/plugins/bhasha
```
