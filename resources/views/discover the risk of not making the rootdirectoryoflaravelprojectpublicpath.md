<h1>Discover the risk of not making the root directory of laravel project public path</h1>

<h3>What is the purpose of the public folder in a Laravel project?</h3>
<p>The public/ directory is the default location where Laravel serves static assets like images. By default, any file in the public directory can be accessed by users using a URL that points to the file. If we put the cat. jpg image under the public/images/ folder, it can be accessed via the /images/cat.
and the Laravel public directory is specifically designed to serve static files and act as the entry point for your application. Making the root directory public instead exposes sensitive information and can lead to serious security vulnerabilities.
</p>
<h3>The risks of not  making the root directory of laravel project public path : </h3>
<p><b>1-</b>Exposure of Sensitive Information:
<br>
Configuration files: Files like .env, containing database credentials, API keys, and other sensitive information, would be directly accessible.
Source code: Your application's source code would be exposed, allowing attackers to understand your application's logic, identify vulnerabilities, and potentially exploit them.
Framework files: Exposing Laravel's core framework files can lead to unexpected behavior and security risks.
<br>

<b>2-</b>Incorrect Routing:
Laravel uses the public directory as the base for routing. Making the root directory public would disrupt this process and lead to incorrect routing, causing errors and unexpected behavior.
<br>

<b>3-</b>Performance Issues:
Serving static files from the root directory might impact performance, as the web server would need to process requests differently compared to serving them from a dedicated directory.
Security Vulnerabilities:
<br>

<b>4-</b>Exposing the application's core files and configuration increases the attack surface, making your application more vulnerable to hacking attempts.</p>

