## Laravel - Repository Demo

- npm install
- composer install
- chmod -R 777 storage/ bootstrap/cache
- php artisan migrate
- php artisan serve
- Add Country
- Add Users


### Useful

#### For Make Repository
- Add Users composer require jason-guru/laravel-make-repository --dev
- php artisan make:repository UserRepository
  

- Make Interface
- Make Repository (it make repository files in "app\Repositories" Folder)
- implement interface to repository
- Register In app\Providers\AppServiceProvider.php in "register" Function
- Use Class In Controllers
