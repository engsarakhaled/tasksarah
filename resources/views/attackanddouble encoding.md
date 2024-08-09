<h1>Path Traversal Attack vs. Double Encoding</h1>
<h3>What is path traversal?</h3>
<p>Path traversal is also known as directory traversal. These vulnerabilities enable an attacker to read arbitrary files on the server that is running an application. This might include:
<br>
Application code and data.
<br>
Credentials for back-end systems.
<br>
Sensitive operating system files.
<br>
In some cases, an attacker might be able to write to arbitrary files on the server, allowing them to modify application data or behavior, and ultimately take full control of the server..</p>
<h3>Example on Path Traversal Attack?</h3>
<p><b>Normal way</b>:  You type in the name of the picture, like "puppy.jpg", and the website shows you the picture.
<br><b>Attack</b>: A bad person tries to download a secret file instead of a picture. They might type something like "../secretfile.txt" instead of "puppy.jpg".
<br>
If the website doesn't check carefully, it might try to find and show the "secretfile.txt" which is not supposed to be seen. This is a path traversal attack.
</p>
<h3>How to prevent a path traversal attack?</h3>
<p>
To stop someone from sneaking into your house (website) through the attic window, you need to:
</p>
<p><b>1.</b>bLock all doors and windows: This means checking and cleaning all the ways people can enter your site.</p>
<p><b>2.</b>Have a strong door (firewall): A good firewall is like a strong door that keeps unwanted visitors out.</p>
<p><b>3.</b>Don't trust strangers: Never let someone tell you where to go in your house. Always check their request.</p>
<p><b>4.</b>Regularly check for weaknesses: Look for any open doors or windows in your house (website) and fix them right away.</p>
<p>,so The most effective way to prevent path traversal vulnerabilities is to avoid passing user-supplied input to filesystem APIs altogether. Many application functions that do this can be rewritten to deliver the same behavior in a safer way.
If you can't avoid passing user-supplied input to filesystem APIs, we recommend using two layers of defense to prevent attacks:

Validate the user input before processing it. Ideally, compare the user input with a whitelist of permitted values. If that isn't possible, verify that the input contains only permitted content, such as alphanumeric characters only.
After validating the supplied input, append the input to the base directory and use a platform filesystem API to canonicalize the path. Verify that the canonicalized path starts with the expected base directory.
Below is an example of some simple Java code to validate the canonical path of a file based on user input:
</p>
<br><p>
File file = new File(BASE_DIRECTORY, userInput);
if (file.getCanonicalPath().startsWith(BASE_DIRECTORY)) {
    // process file
}</p>
<h3>What is Double Encoding?</h3>
<p>Imagine you have a secret message. To hide it, you change the letters to symbols (encoding).Double encoding means changing the letters to symbols, and then changing those symbols to different symbols again.
This attack technique consists of encoding user request parameters twice in hexadecimal format in order to bypass security controls or cause unexpected behavior from the application. It’s possible because the webserver accepts and processes client requests in many encoded forms.

By using double encoding it’s possible to bypass security filters that only decode user input once. The second decoding process is executed by the backend platform or modules that properly handle encoded data, but don’t have the corresponding security checks in place.

Attackers can inject double encoding in pathnames or query strings to bypass the authentication schema and security filters in use by the web application.

There are some common characters sets that are used in Web applications attacks. For example, Path Traversal attacks use ../ (dot-dot-slash) , while XSS attacks use < and > characters. These characters give a hexadecimal representation that differs from normal data.

For example, ../ (dot-dot-slash) characters represent %2E%2E%2F in hexadecimal representation. When the % symbol is encoded again, its representation in hexadecimal code is %25. The result from the double encoding process ../ (dot-dot-slash) would be %252E%252E%252F:

The hexadecimal encoding of ../ represents %2E%2E%2F
Then encoding the % represents %25
Double encoding of ../ represents %252E%252E%252F
</p>
<h3>Example on Double Encoding ?</h3>
<p>This example presents an old well-known vulnerability found in IIS versions 4.0 and 5.0, where an attacker could bypass an authorization schema and gain access to any file on the same drive as the web root directory due to an issue with the decoding mechanism. For more details about folder traversal vulnerability, see CVE 2001-0333.

In this scenario, the victim has a published executable directory (e.g. cgi) that’s stored on the same partition as the Windows system folder. An attacker could execute arbitrary commands on the web server by submitting the following URL:

Original URL:

http://victim/cgi/../../winnt/system32/cmd.exe?/c+dir+c:\

However, the application uses a security check filter that refuses requests containing characters like “../”. By double encoding the URL, it’s possible to bypass the security filter:

Double encoded URL:

http://victim/cgi/%252E%252E%252F%252E%252E%252Fwinnt/system32/cmd.exe?/c+dir+c:\ 
</p>
<h3>How to prevent Double Encoding?</h3>
<p>To prevent double encoding, you need to:<br>
-Check the message carefully: Look at the message and see if it's already been hidden (encoded).<br>
-Unhide it once: If it's hidden, remove the first layer of hiding.<br>

-Only hide it once: If you need to hide the message again, do it only once.
,Also Double encoding attacks can be tricky, but with proper handling, they can be effectively mitigated. Here's a breakdown of key strategies:

<b>1-</b>Understand the Context
Identify where the input comes from: Is it user-generated content, external APIs, or other sources?<br>
<b>2-</b>Determine the expected encoding: What encoding format is anticipated (e.g., UTF-8, ISO-8859-1)?<br>
<b>3-</b>Recognize potential attack vectors: Where in your application might double encoding be exploited (e.g., URL parameters, form inputs, database storage)?<br>
<b>4-</b>Input Validation and Sanitization
Strict input validation: Use Laravel's validation rules to ensure data conforms to expected formats.<br>
<b>5-</b>Sanitize user input: Remove or escape potentially harmful characters using functions like htmlspecialchars(), htmlentities(), or Laravel's e() helper.<br>
<b>6-</b>Consider using prepared statements: For database interactions, protect against SQL injection and other attacks.
<p>

<h3>References</h3>
<p>1-https://owasp.org/www-community/attacks/Path_Traversal</p>
<p>2-https://www.synopsys.com/glossary/what-is-path-traversal.html#:~:text=A%20path%20traversal%20vulnerability%20allows,they%20should%20not%20have%20access.</p>
<p>3-https://portswigger.net/web-security/file-path-traversal</p>
<p>https://talk.tiddlywiki.org/t/how-do-i-avoid-double-url-encoding-when-rendering-urls-in-my-website/8731</p>