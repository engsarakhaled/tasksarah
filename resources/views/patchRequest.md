<h1>PUT and PATCH Requests</h1>
<h3>What is a PUT HTTP Request?</h3>
<p>PUT is a technique of creating, changing or overwriting resources at a specific URL. The PUT method is generally called when we need to change a single resource.</p>
<h3>What is a PATCH HTTP Request?</h3>
<p>The PATCH method is used for making partial modifications to a current resource without changing the whole data.</p>
<h3>Difference Between PUT and PATCH Request</h3>
<table>
  <tr>
    <th>PULL</th>
    <th>PATCH</th>
    
  </tr>
  <tr>
    <td>1-PUT is a technique of altering resources when the client transmits data that revamps the whole resource.</td>
    <td>PATCH is a technique for transforming the resources when the client transmits partial data that will be updated without changing the whole data.</td>
    
  </tr>
  <tr>
    <td>2-The PUT HTTP method is known to be unchanged. That means, if you retry a request numerous times, that will be equal to a single request conversion.</td>
    <td>The PATCH HTTP method is believed to be non-idempotent. That means, if you retry the request multiple times, you will end up having multiple resources with different URIs.</td>
    
  </tr>
   <tr>
    <td>The PUT method has high bandwidth.</td>
    <td>Whereas, the PATCH method has comparatively low bandwidth.</td>
    
  </tr>
</table>
<h3>Laravel Implementation</h3>
<p>
PHP
// Controller method for handling a PUT request
public function update(Request $request, $id)
{
    // Update the entire resource with ID $id
}

// Controller method for handling a PATCH request
public function update(Request $request, $id)
{
    // Update specific fields of the resource with ID $id
}
</p>
<h4>Example</h4>

<p>Imagine you have a User model with fields name, email, and password.

PUT: To update all user details, you would send a PUT request with all three fields in the request body.
PATCH: To update only the user's name, you would send a PATCH request with just the name field in the request body.
By understanding the differences between PUT and PATCH, you can choose the appropriate method based on your specific use case and improve the efficiency of your Laravel applications.</p>
<p>put:
If I want to update my first name, then I send a put request:

{ "first": "Nazmul", "last": "hasan" } 
But here is a problem with using put request: When I want to send put request I have to send all two parameters that is first and last (whereas I only need to update first) so it is mandatory to send them all again with put request.

patch:
patch request, on the other hand, says: only specify the data which you need to update and it won't be affecting or changing other data.
So no need to send all values again. Do I only need to change first name? Well, It only suffices to specify first in patch request.</p>
 <h3>References<h3>
 <p>1-https://stackoverflow.com/questions/42313033/how-to-use-patch-request-in-laravel</p>
 <p>2-https://laracasts.com/discuss/channels/general-discussion/whats-the-differences-between-put-and-patch?page=1 </p>
<p>3-https://stackoverflow.com/questions/21660791/what-is-the-main-difference-between-patch-and-put-request#:~:text=PUT%20request%20is%20idempotent%20i.e.,update%20existing%20user%20or%20order.&A%20HTTP.,method%20to%20update%20order%20status.</p>