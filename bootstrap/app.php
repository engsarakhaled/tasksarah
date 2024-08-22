<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureAuthenticationIsValid;
use App\Http\Middleware\Admin;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    
      
      then: function () {
      Route::namespace('Teacher')->prefix('teacher')->name('teacher.')->group(base_path('routes/teacher.php'));
     }
    )
  
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
      'Admin' =>  \App\Http\Middleware\Admin::class,
    ]);
  })
  ->withMiddleware(function (Middleware $middleware) {
   // $middleware->alias([
      //'EnsureTokenIsValid' =>  \App\Http\Middleware\EnsureAuthenticationIsValid::class,
      $middleware->alias([
      
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
    ]);
   
  })
     // $middleware->append(EnsureTokenIsValid::class); //task 13
       //if you want to use middleware manually
     //  $middleware->use([
      //  \Illuminate\Http\Middleware\::class,
      // ]);
   // })
 //  ->withMiddleware(function (Middleware $middleware) {
  //  $middleware->web(append: [
  //      EnsureUserIsSubscribed::class,
   // ]);

 //->withMiddleware(function (Middleware $middleware) {
   //     $middleware->alias([
   //         'subscribed' => EnsureUserIsSubscribed::class
    //    ]);
    
   // $middleware->api(prepend: [
   //     EnsureTokenIsValid::class,
  //  ]);

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

