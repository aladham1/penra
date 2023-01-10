<p align="center"><a href="http://www.penra.gov.ps/" target="_blank"><img src="http://www.penra.gov.ps/templates/ja_labra/images/logo.jpg" width="400" alt="Penra Project"></a></p>



How to install project on cpanel or xampp

1. Download project from GitHub
2. Extract project
3. Copy project to htdocs or public_html
4. Open terminal or cmd and go to project folder
5. Run command "composer install"
6. Create database in phpmyadmin
7. Open .env file and change database name, username and password
8. Open terminal and run command "php artisan migrate"
9. Open terminal and run command "php artisan db:seed"
10. Open terminal and run command "php artisan storage:link"
11. Open terminal and run command "php artisan serve"
12. Open browser and type url displayed in terminal

To login as admin
Use Email: admin@admin.com
Password: password


