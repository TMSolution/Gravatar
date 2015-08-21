# Requests to the gravatar.com

##Gravatar Image Requests

### #Base request

Gravatar images may be requested just like a normal image, using an IMG tag. To get an image specific to a user, you must first create image request.

```php
    namespace Gravatar;
    
    $avatar = \sprintf("<img src=\"%s\" />",
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com')
      )
    );  
```

#### Requests with the additional parameters

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

#### Request for image data

You can request for a binary text data creating response for your request.

```php
    namespace Gravatar;
    
    $avatar = (string) new Response(
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com)
      )
    );
```


##Request for the profile data

You can request for profile data in diffrent formats declaring a request object

#### Request for serialized profile data

```php
    namespace Gravatar;
    
    new Request(
        new Account('joe.doe@example.com')
    );
```

#### Request for XML profile data
```php
    namespace Gravatar;
    
    new XmlRequest(
        new Account('joe.doe@example.com')
    );
```

### Request for VCF profile data
```php
    namespace Gravatar;
    
    new VcfRequest(
        new Account('joe.doe@example.com')
    );
```

### Request for QR profile data
```php
    namespace Gravatar;
    
    new QrRequest(
        new Account('joe.doe@example.com')
    );

    new QrRequest(
        new Account('joe.doe@example.com'),
        250 // Custom size of qr image
    );
```

Request for QR image using IMG tag
```php
    $qr = \sprintf("<img src=\"%s\" />",
        new QrRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### Request for JSON profile data

```php
    namespace Gravatar;

    new JsonRequest(
        new Account('joe.doe@example.com'),
    );

    new JsonRequest(
        new Account('joe.doe@example.com'),
        "alert" // Callback name
    );
```

**[Visit gravatar.com for more details about profile data requests](http://en.gravatar.com/site/implement/profiles/)**
