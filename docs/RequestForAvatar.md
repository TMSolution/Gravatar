#Gravatar Image Requests

### Base request

Gravatar images may be requested just like a normal image, using an IMG tag. To get an image specific to a user, you must first calculate their email hash.

```php
    namespace Gravatar;
    
    $avatar = \sprintf("<img src=\"%s\" />",
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com')
      )
    );  
```

### Request with the additional parameters

In addition to base request you can also use additional parameters to modify your request. Here is an example of requesting image using https scheme with size and rating parameters.

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
[Image Requests details](http://en.gravatar.com/site/implement/images/)

### Request for image data

If you need you can request for binaray data

```php
    namespace Gravatar;
    
    $avatar = (string) new Response(
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com)
      )
    );
    
```
  
