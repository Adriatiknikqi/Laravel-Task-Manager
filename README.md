## Project Setup

To set up the project locally, follow these steps:

### 1. Clone the Repository

```bash
git clone git@github.com:Adriatiknikqi/Laravel-Task-Manager.git
```

### 2. Navigate to the Project Directory

```bash
cd Laravel-Task-Manager
```

### 3. Install PHP Dependencies

Make sure you have [Composer](https://getcomposer.org/) installed. Run the following command to install all PHP dependencies:

```bash
composer install
```

### 4. Create a `.env` File

Create a copy of the `.env.example` file and rename it to `.env`:

```bash
cp .env.example .env
```

### 5. Generate Application Key

Run the following command to generate the application key:

```bash
php artisan key:generate
```

### 6. Configure Environment Variables

Update your `.env` file with the necessary database and other configuration details.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo-app
DB_USERNAME=root
DB_PASSWORD=

### 7. Run Migrations

To create the necessary database tables, run the following command:

```bash
php artisan migrate
```

### 8. Install Node.js Dependencies

Make sure you have [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/) installed. Run the following command to install all Node.js dependencies:

```bash
npm install
```

### 9. Compile Assets

To compile assets (CSS, JS, etc.), run the following command:

```bash
npm run dev
```

### 10. Start the Development Server

To start the Laravel development server, run:

```bash
php artisan serve
```

The application will be available at [http://localhost:8000](http://localhost:8000).

## Contributing

Thank you for considering contributing to the project! Please follow the guidelines outlined in the [Laravel documentation](https://laravel.com/docs/contributions).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

