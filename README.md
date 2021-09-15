1)Run <code>composer install</code> <br>
2)Edit connection to db in <code>.env</code> <br>
3)Run <code>php artisan migrate</code> <br>
4)Run <code>php artisan passport:install</code> <br>
5)Run <code>php artisan passport:client</code> with values: [1, vuejs, w] or something else <br>
6)Run <code>php artisan db:seed</code> <br>
7)Go to table <code>oauth_clients</code> and change <code>password_client</code> to 1 <br>
8)Take the "secret" from the last row of table <code>oauth_clients</code> and put him to the Vue project -> .env -> VUE_APP_API_KEY <br>
<br>
For login use: <br>
Login: "test@abelohost.example" <br>
Password: "password" <br>
