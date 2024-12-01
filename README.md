<img alt="Technical Assessment" height="100" src="./public/img/ewealth-logo.png" title="eWealth" width="504"/>

## eWealth

Technical Assessment

### Application Requirements

- I am using Laravel version 11.34.2 which requires PHP version 8.2 or above;
- While the assessment requirements stipulate a MySQL database, I am using MariaDB version 10.4.28-MariaDB which means that the version of MySQL must be version 8.0;
- Also, the assessment stipulates that this application must be developed in Angular. I am not using Angular - just Laravel and Tailwind;

### API

- I have included a Postman collection to interact with the application's API. See file `eWealth.postman_collection.json`. The Laravel server must be running in order for the API to work but only after all of the setup steps below have been completed:

```
php artisan serve
```

### Setup

Open a command line or terminal window and clone the application from GitHub:

```
git clone https://github.com/wni5378/e-wealth.git
```

Change directory into the application:

```
cd e-wealth
```

Install Composer packages

```
composer install
```

Install NPM packages

```
npm install
npm run dev
```

As per the assessment requirements, a MySQL database must be used. Open the `.env.example` file and then save a copy as `.env`. In file `.env`, add the required credentials for the MySQL database you want to use:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=enterPasswordHere
```

The email smtp details will also need to be updated. In the same `.env` file, add your smtp settings:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<your-username>@gmail.com
MAIL_PASSWORD="your-gmail-app-password"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=<your-username>@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

#### IMPORTANT:

Please note that in the above step, if you are using Gmail as your smtp server, you must use a Gmail "app" password and not your normal Gmail password. You can find information on how to get this password here:

[Google Support](https://support.google.com/mail/answer/185833?hl=en)

Run migrations:

```
php artisan migrate
```

Make sure that Vite is running:

```
npm run dev
```

Start the Laravel server:

```
php artisan serve
```

And then point your browser to:

[http://127.0.0.1:8000](http://127.0.0.1:8000)

