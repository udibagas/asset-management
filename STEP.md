## Step BE

1. Design DB
    - Table apa saja, relasi antar table, columns & data type
2. Install laravel
   `laravel new [project-name]`
3. Create Model
   `php artisan make:model [ModelName] --all`
    - Nama model singular
    - Model
    - Migration
    - Controller
    - Request
    - Factory
    - Seeder
    - Policy
4. Sesuaikan file migration
5. Jalankan migration
   `php artisan migrate`
6. Tambahkan attribute fillable pada model terkait
   `protected $fillable = ['column_a', 'column_b', ...]`
7. Sesuaikan file seeding
8. Jalankan seeding
   `php artisan db:seed --class=SeederClass`
9. Install API
   `php artisan install:api`
    - otomatis akan menginstall sanctum
    - jalankan `php artisan migrate` untuk menambahkan table/column yg dibutuhkan oleh sanctum
10. Setup `routes/api.php`
    - Mapping endpoint ke controller
      `Route::apiResource('/user', UserController::class)`
11. Sesuaikan method - method di controller (CRUD)
12. Testing masing - masing endpoint (REST Client, Postman)
13. Install fortify ('/login', '/register', '/logout')
    - `composer require laravel/fortify`
    - `php artisan fortify:install`
    - `php artisan migrate`
14. Sesuaikan setingan sanctum related

    - bootstrap/app.php

    ```php
    ->withRouting(
        // ...
        api: __DIR__ . '/../routes/api.php'
    )
    ```

    ```php
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->statefulApi();
    })
    ```

    - config/sanctum.php (atau di .env)
    - SANCTUM_STATEFUL_DOMAINS=localhost:5173

15. Sesuaikan setingan CORS

    - `php artisan config:publish cors`
    - Tambahkan path '/login', '/register', '/logout' di cors.php
    - 'supports_credentials' => true

16. Pastikan menambahkan opsi berikut di client

    ```js
    export const api = axios.create({
        baseURL: import.meta.env.VITE_API_URL || "http://localhost:8000",
        withCredentials: true, // penting!
        withXSRFToken: true, // penting!
    });
    ```

    - sesuaikan setingan domain di `config/session.php` (khusus untuk production)
    - lakukan di .env

    ```php
    'domain' => '.domain.com',
    ```

17. Protect API menggunakan middleware 'auth:sanctum'

```php
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', function (Request $request) {
        return $request->user();
    });

    Route::resources([
        'asset' => AssetController::class,
        'location' => LocationController::class,
        'category' => CategoryController::class,
    ]);
});
```

## Step FE

1. Install vue
    - npm create vite@latest [nama-project]
    - pilih official vue starter kit
    - pilih package vue router
2. Buat pages
3. Install axios untuk fetching data
4. Install tailwindcss & daisyui untuk ui
5. Mapping path ke page di route
6. npm run build (build untuk di deploy)
7. npm run preview (test tampilan di production)
