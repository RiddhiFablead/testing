    <?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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




    Route::post('/register',[RegisterController::class,'register'])->name('register.submit');
    Route::get('/showregister',[RegisterController::class,'showregister'])->name('showregister');
    Route::get('/showlogin',[LoginController::class,'showLoginform'])->name('showlogin');
    Route::post('/login',[LoginController::class,'login'])->name('login');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');



    Route::get('/',function(){
        if(session()->has('user')){
            return "Welcome," . session('user') . "!";
        }else{
            return redirect('/login');
        }
    });
    
        
  
   