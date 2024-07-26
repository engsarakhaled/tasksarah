<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassroomController;

Route::get('/', function () {
   return view('welcome');
});
//Route::get('cars/create',[CarController::class,'create'])->name('cars.create');
//Route::post('cars',[CarController::class,'store'])->name('cars.store');
//Route::get('cars',[CarController::class,'index'])->name('cars.index');
//Route::get('cars/{id}/edit',[CarController::class,'edit'])->name('cars.edit');
//Route::put('cars/{id}/update',[CarController::class,'update'])->name('cars.update');
//Route::get('cars/{id}/show',[CarController::class,'show'])->name('cars.show');
//Route::get('cars/{id}/delete',[CarController::class,'destroy'])->name('cars.destroy');
//Route::get('cars/trashed',[CarController::class,'showDeleted'])->name('cars.showDeleted');
Route::get('classes/create',[ClassroomController::class,'create'])->name('classes.create');
Route::post('classes',[ClassroomController::class,'store'])->name('classes.store');
Route::get('classes',[ClassroomController::class,'index'])->name('classes.index');
Route::get('classes/{id}/edit',[ClassroomController::class,'edit'])->name('classes.edit');
Route::put('classes/{id}/update',[ClassroomController::class,'update'])->name('classes.update');
Route::get('classes/{id}/show',[ClassroomController::class,'show'])->name('classes.show');
Route::delete('classes/{id}/delete',[ClassroomController::class,'destroy'])->name('classes.destroy');
Route::get('classes/trashed',[ClassroomController::class,'showDeleted'])->name('classes.showDeleted');
//Route::get('login',[ExampleController::class,'login']); //action written inside ExampleController 

//Route::get('content',[ExampleController::class,'content']); //action written inside ExampleController
//Route::post('datatask',[ExampleController::class,'datatask'])->name('datatask');



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

//Route::post('logincheck', function (){
 // return view('logincheck');
 // })->name('logincheck');
    


