<?php

//use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('welcome');
//});


//Route::get('s', function () {
   // return "Hi Sara";
    
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
Route::prefix('accounts')-> group(function() {
   Route::get('',function(){
       return 'accounts';
   });
 Route::get('admin',function(){
     return 'accounts admin';
   });
   Route::get('user',function(){
        return 'accounts user';
   });
 
});



Route::prefix('cars')-> group(function() {
    Route::get('',function(){
        return 'cars';
    });
        Route::prefix('usa')-> group(function(){
        Route::get('ford',function(){
        return 'cars usa ford';
    }); Route::get('tesla',function(){
        return 'cars usa tesla';
    });
    });       
     Route::prefix('ger')-> group(function(){
      Route::get('mercedes',function(){
        return 'cars ger mercedes';
    }); Route::get('audi',function(){
        return 'cars ger audi';
    }); Route::get('volkswagen',function(){
        return 'cars ger volkswagen';
    });

  });
});