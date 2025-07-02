    <?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Route;

  

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/header',function(){
        return view('header');
    });
    Route::get('/footer',function(){
        return view('footer');
    });
    Route::get('/register',function(){
        return view('register');
    })->name('register');
    Route::get('/login', function () {
    return view('login');
    });
    Route::get('/profile',function(){
        return view('profile');
    });
    Route::get('/product',function(){
        return view('product');
    });



    //Register
    Route::post('/register',[RegisterController::class,'register'])->name('register.submit');
    Route::get('/showregister',[RegisterController::class,'showregister'])->name('showregister');
    //login
    Route::get('/showlogin',[LoginController::class,'showLoginform'])->name('showlogin');
    Route::post('/login',[LoginController::class,'login'])->name('login');
    //profile
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/users', [ProfileController::class, 'showUsers'])->name('users.index');
    Route::get('/users/{id}/edit', [ProfileController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{id}', [ProfileController::class, 'updateUser'])->name('users.update'); 
    //Delete user
    Route::delete('/users/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');

    Route::get('/users/create', [ProfileController::class, 'createUser'])->name('users.create');
    Route::post('/users', [ProfileController::class, 'storeUser'])->name('users.store');

    //product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


    //login 
    Route::get('/',function(){
        if(session()->has('user')){
            return "Welcome," . session('user') . "!";
        }else{
            return redirect('/login');
        }
    });
    
        
  
   