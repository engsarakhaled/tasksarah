<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\EnsureAuthenticationIsValid; //using middleware //task13


//https://laravel.com/docs/11.x/middleware Task 13
Route::get('/', function () {
   return view('welcome');
});
//task12 contactus form 
Route::get('contactUS',[ContactController::class,'contactUS']);
Route::post('email',[ContactController::class,'contactUSPost'])->name('email');
//Route::get('contactUS',[ContactController::class,'create'])->name('contactUS.create'); //database
//Route::post('contactUS',[ContactController::class,'store'])->name('contactUS.store'); //database


// task 13
Route::prefix('cars')->controller(CarController::class)->middleware([EnsureAuthenticationIsValid::class])->group(function() {
   Route::get('/create', 'create')->name('cars.create');
   Route::post('', 'store')->name('cars.store');
   Route::get('', 'index')->name('cars.index');
   Route::get('/{id}/edit', 'edit')->name('cars.edit');
   Route::put('/{id}/update', 'update')->name('cars.update');
   Route::get('/{id}/show', 'show')->name('cars.show');
   Route::get('/{id}/delete', 'destroy')->name('cars.destroy');
   Route::get('/trashed','showDeleted')->name('cars.showDeleted');
   Route::patch('/{id}','restore')->name('cars.restore');
   Route::delete('/{id}','forceDelete')->name('cars.forceDelete');
});


Route::get('classes/create',[ClassroomController::class,'create'])->name('classes.create')->middleware(EnsureTokenIsValid::class);
Route::post('classes',[ClassroomController::class,'store'])->name('classes.store');
Route::get('classes',[ClassroomController::class,'index'])->name('classes.index');
Route::get('classes/{id}/edit',[ClassroomController::class,'edit'])->name('classes.edit');
Route::put('classes/{id}/update',[ClassroomController::class,'update'])->name('classes.update');
Route::get('classes/{id}/show',[ClassroomController::class,'show'])->name('classes.show');
Route::delete('classes/{id}/delete',[ClassroomController::class,'destroy'])->name('classes.destroy');
Route::get('classes/trashed',[ClassroomController::class,'showDeleted'])->name('classes.showDeleted');
Route::patch('classes/{id}',[ClassroomController::class,'restore'])->name('classes.restore');
Route::delete('classes/{id}',[ClassroomController::class,'forceDelete'])->name('classes.forceDelete');
Route::get('uploadForm',[ExampleController::class,'uploadForm'])->name('uploadForm');
Route::post('upload',[ExampleController::class,'upload'])->name('upload');


 


//https://laravel-news.com/laravel-route-organization-tips
//additional task
Route::prefix('products')->controller(ProductController::class)->group(function() {
Route::get('', 'index')->name('products.index');
Route::get('/create', 'create')->name('products.create');
Route::post('', 'store')->name('products.store');
Route::get('/{id}/edit','edit')->name('products.edit');
Route::put('/{id}/update','update')->name('products.update');
});

Route::get('home',[ProductController::class,'home']);
Route::get('about',[ProductController::class,'about']);

Route::get('test',[ExampleController::class,'test']);



//Route::get('products',[ProductController::class,'index'])->name('products.index');
//Route::get('products/create',[ProductController::class,'create'])->name('products.create');
//Route::post('products',[ProductController::class,'store'])->name('products.store');
//Route::get('home',[ProductController::class,'home']);
//Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
//Route::put('/{id}/update',[ProductController::class,'update'])->name('products.update');












//Route::group(['prefix' => 'cars'], function () {
//Route::get('/create',[CarController::class,'create'])->name('cars.create');
//Route::post('',[CarController::class,'store'])->name('cars.store');
//Route::get('',[CarController::class,'index'])->name('cars.index');
//Route::get('/{id}/edit',[CarController::class,'edit'])->name('cars.edit');
//Route::put('/{id}/update',[CarController::class,'update'])->name('cars.update');
//Route::get('/{id}/show',[CarController::class,'show'])->name('cars.show');
//Route::get('/{id}/delete',[CarController::class,'destroy'])->name('cars.destroy');
//Route::get('/trashed',[CarController::class,'showDeleted'])->name('cars.showDeleted');
//Route::patch('/{id}',[CarController::class,'restore'])->name('cars.restore');
//Route::delete('/{id}',[CarController::class,'forceDelete'])->name('cars.forceDelete');
//});

//Route::resource('cars',CarController::class)->only(['create','store','index','showDeleted']);
//Route::resource('/{id}',CarController::class)->only(['edit','update','show','destroy','restore','forceDelete']);



//Route::get('/', function () {
   // return view('welcome');
//});

//Route::get('cv', function () {
 //return view('cv');
//});
    
//});
//Route::get('cars/{id?}', function ($id=0) {
   // return "car number is ". $id;
    
//})->whereNumber('id');


 //Route::get('user/{name}/{age?}', function ($name,$age=0) {
   // if ($age > 0){
   // return " username is " .  $name . " and age is ".  $age;
    // }else{
   //   return "username is " .  $name ;
   //  }
//})->where (
    //[
   //'age' => '[0-9]+' ,
  // 'name' => '[a-zA-Z]+', 
 //  ]
//); 


//Route::get('fruit/{name}', function ($name) {
  //  return "name is"  .  $name;
//})->whereIn('name',['orange','apple','watermelon']);

//Route::prefix('company')-> group(function() {
  // Route::get('',function(){
     //  return 'Company Index';
  //  });
    
  //Route::get('users',function(){
       // return 'Company users';
 //  });
      // Route::get('IT',function(){
      //      return 'Company IT';
    //   });
    
//});
//Second Task
//Route::prefix('accounts')-> group(function() {
  // Route::get('',function(){
     //  return 'accounts';
  // });
 //Route::get('admin',function(){
   //  return 'accounts admin';
  // });
  // Route::get('user',function(){
    //    return 'accounts user';
   //});
 
//});



//Route::prefix('cars')-> group(function() {
    //Route::get('',function(){
   //     return 'cars';
   // });
     //   Route::prefix('usa')-> group(function(){
      //  Route::get('ford',function(){
      //  return 'cars usa ford';
   // }); Route::get('tesla',function(){
    //    return 'cars usa tesla';
   // });
    //});       
     //Route::prefix('ger')-> group(function(){
    //  Route::get('mercedes',function(){
      //  return 'cars ger mercedes';
   // }); Route::get('audi',function(){
    //    return 'cars ger audi';
    //}); Route::get('volkswagen',function(){
       // return 'cars ger volkswagen';
   // });

  //});
//});
//Route::fallback(function(){
 // return redirect('/');
//});

 //Route::get('link',function(){
  //$url=route('sara');
   //return "<a href='$url'>go to welcome</a>";
//});
//Route::get('welcome', function () {
  //return "welcome to laravel";
//})->name('sara');
 

//Route::get('link',function(){
//$url =route('s');
//return "<a href ='$url'>HI</a>";
//});
  
//Route::get('welcome',function(){
//return "HI HI";
//})->name('s');

Route::post('logincheck', function (){
 return view('logincheck');
 })->name('logincheck');
    



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
