<h1>Middleware</h1>
<h3>What is the middleware in Laravel?</h3>
<p>Middleware acts as a layer between the user and the request. It means that when the user requests the server then the request will pass through the middleware, and then the middleware verifies whether the request is authenticated or no </p>
<h3>Defining Middleware</h3>
<p>To create a new middleware, use the make:middleware Artisan command:

<b>php artisan make:middleware EnsureTokenIsValid</b>

This command will place a new EnsureTokenIsValid class within your app/Http/Middleware directory. In this middleware, we will only allow access to the route if the supplied token input matches a specified value. Otherwise, we will redirect the users back to the /home URI:</p>
<p>Implement the logic in the handle method of the middleware class:

    public function handle(Request $request, Closure $next)
    {
        // Logic to be executed before the route
        // ...

        $response = $next($request);

        // Logic to be executed after the route
        // ...

        return $response;
    }

</p>

 <h3>What is Global Middleware </h3>

<p>If you want a middleware to run during every HTTP request to your application, you may append it to the global middleware stack in your application's bootstrap/app.php file:
<br>
use App\Http\Middleware\EnsureTokenIsValid;
 
->withMiddleware(function (Middleware $middleware) {
     $middleware->append(EnsureTokenIsValid::class);
})

The $middleware object provided to the withMiddleware closure is an instance of Illuminate\Foundation\Configuration\Middleware and is responsible for managing the middleware assigned to your application's routes. The append method adds the middleware to the end of the list of global middleware. If you would like to add a middleware to the beginning of the list, you should use the prepend method.
</p>
<h3>Manually Managing Laravel's Default Global Middleware</h3>

<p>If you would like to manage Laravel's global middleware stack manually, you may provide Laravel's default stack of global middleware to the use method. Then, you may adjust the default middleware stack as necessary:
<br>
<?php 

    $middleware->use([
        // \Illuminate\Http\Middleware\TrustHosts::class,
        \Illuminate\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ]);
</p>

<h3>Assigning Middleware to Routes?</h3>

<p>If you would like to assign middleware to specific routes, you may invoke the middleware method when defining the route:

use App\Http\Middleware\EnsureTokenIsValid;
 
Route::get('/profile', function () {
    // ...
})->middleware(EnsureTokenIsValid::class);
<br>
You may assign multiple middleware to the route by passing an array of middleware names to the middleware method:

Route::get('/', function () {
    // ...
})->middleware([First::class, Second::class]);
</p>
<h3>What is Middleware Aliases</h3>
<p>You may assign aliases to middleware in your application's bootstrap/app.php file. Middleware aliases allow you to define a short alias for a given middleware class, which can be especially useful for middleware with long class names:
<br>

use App\Http\Middleware\EnsureUserIsSubscribed;

->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'subscribed' => EnsureUserIsSubscribed::class
    ]);
})
</p>
<h3>How to add middleware to the routes</h3>
<p>// routes/web.php
Route::get('/dashboard', function () {
    // ...
})->middleware('auth');</p>

<h3>Terminable Middleware</h3>
<p>Sometimes a middleware may need to do some work after the HTTP response has been sent to the browser. If you define a terminate method on your middleware and your web server is using FastCGI, the terminate method will automatically be called after the response is sent to the browser:
<br>
 public function terminate(Request $request, Response $response): void
    {
        // ...
    }
    <br>
    The terminate method should receive both the request and the response. Once you have defined a terminable middleware, you should add it to the list of routes or global middleware in your application's bootstrap/app.php file.

When calling the terminate method on your middleware, Laravel will resolve a fresh instance of the middleware from the service container. If you would like to use the same middleware instance when the handle and terminate methods are called, register the middleware with the container using the container's singleton method. Typically this should be done in the register method of your AppServiceProvider:
<br>
<?php
use App\Http\Middleware\TerminatingMiddleware;

public function register(): void
{
    $this->app->singleton(TerminatingMiddleware::class);
}
</p>


<h3>References</h3>
<p><b>1.</b>https://laravel.com/docs/11.x/middleware#:~:text=Middleware%20provide%20a%20convenient%20mechanism,of%20your%20application%20is%20authenticated.</p>