#Gravatar Image Requests

### Base request

Gravatar images may be requested just like a normal image, using an IMG tag. To get an image specific to a user, you must first create image request.

```php
    namespace Gravatar;
    
    $avatar = \sprintf("<img src=\"%s\" />",
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com')
      )
    );  
```

### Requests with the additional parameters

In addition to base request you can also use additional parameters to modify your request.

Here is an example of requesting image using https scheme with size and rating parameters. **[Visit gravatar.com for more details about request parameters](http://en.gravatar.com/site/implement/images/)**.


```php
    namespace Gravatar;
    
    $avatar = \sprintf("<img src=\"%s\" />",
      (new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com')
      ))->withHttps()
      ->withSize(250)
      ->withRating("g")
    );  
```

### Request for image data

You can request for a binary text data creating response for your request.

```php
    namespace Gravatar;
    
    $avatar = (string) new Response(
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com)
      )
    );
```

### Getting response body and headers

If you create response for your request, you can get the whole body and all response headers.

```php
    namespace Gravatar;
    
    $response = new Response(
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com)
      )
    );
    
    $body = $response->getBody(); // (string) $response
    $headers = $response->getHeaders();
```
  
