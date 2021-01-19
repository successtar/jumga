<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/successtar/jumga/blob/master/public/img/logo.png?raw=true" width="400"></a></p>

<p>
Jumga is a <a href="https://challenge.flutterwave.com" >Flutterwave</a> code challenge for an Ideal E-commerce platform where merchant set up their platform with a token and have their shop running within seconds.
</p>
<p>
    The application can be tested online here <a href="https://jumga-shop.herokuapp.com"> JUMGA </a>
    <br/>
    <b>Admin</b> => Email: admin@jumga.com Password: admin12345!
    <br/>
    <b>Merchant</b> => Email: test@test.com Password: test12345!
    <br/>
    <b>Merchant</b> => Email: osanyinpejuhammed35@gmail.com Password: successtar1#
    
</p>

<p>
    <h3> Features </h3>
    <ul>
        <li>Merchant and Admin Authentication (Login, Register, and Email Activation)</li>
        <li>Merchant Onboarding and setting up of online shop after paying a token </li>
        <li>Fund management between Jumga, Merchant, and dispatch</li>
        <li>Admin overview of all merchants, transactions, orders, products and other administrative activities.</li>
        <li>Merchant activities which include adding and deleting of products, insight to orders and dashaboard</li>
        <li>Customers seeing different shops to buy from and make purchase with ease</li>
        <li>Intuitive UI/UX</li>
    </ul>
</p>
    
<p>
    <h3> Tools </h3>
    <ul>
        <li>Language: PHP (^7.3|^8.0), JavaScript</li>
        <li>Framework: Laravel (^8.12)</li>
        <li>Library: JQuery (v3.4.1), Bootstrap ^4.4, toastr </li>
        <li>Database: SQL (MYSQL, PgSQL)</li>
        <li>Flutterwave Account</li>
    </ul>
</p>


<p>
    <h3> SETUP </h3>
    <ul>
        <li>composer, php ^7.3, MySQL/PgSQL are required to set the application up locally</li>
        <li>Clone this repository</li>
    <li>RUN <b>composer install</b> to install dependencies </li>
    <li>Create a file with the name <b>.env</b> in the root directory</li>
    <li>Copy all the content in the <b>.env.example</b> file to the file you just created</b>
    <li>Edit the .env file by filling the required fields which include database credentials (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD), Flutterwave test credentials (FW_PUBKEY, FW_SECKEY, FW_ENCKEY), and Mail Credentials (MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION) </li>
    <li>RUN <b>php artisan migrate --seed</b> to set up your db </li>
    <li>RUN <b>php artisan key:generate</b> to generate the app key </li>
    <li>RUN <b>php artisan serve</b> to start the app </li>
    <li>You should be able to access the app via http://127.0.0.1:8000. The test credentials above for admin and merchants and be used to login</li>
    <li>If you are having issue setting up the app, you can check the <a href="https://laravel.com/docs">laravel documentation</a> or raise an issue </li> 
   </ul>
</p>

<p>
    <h3> Local Test Environment </h3>
    <ul>
        <li>OS: Ubuntu 20.04</li>
        <li>PHP : PHP 7.3</li>
        <li>Server: Nginx 1.18 </li>
        <li>Database: MySQL 8.0.22</li>
    </ul>
</p>

<p>
    <h3> Staging Test Environment </h3>
    <ul>
        <li>Platform: Heroku</li>
        <li>Deployment: Heroku Pipeline (Github)</li>
        <li>Database: PgSQL</li>
    </ul>
</p>

<p>
    <h3> TODO </h3>
    <ul>
        <li>Merchant Updating perasonal details and bank accounts</li>
        <li>Merchant Withdrawing to bank account</li>
        <li>Improved User Experience</li>
    </ul>
</p>

## License

MIT © [Hammed Olalekan Osanyinpeju](https://successtar.github.io)
