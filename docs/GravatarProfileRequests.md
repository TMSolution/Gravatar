#Request for profile data

Requesting for profile data is a similar process to requesting images. You can request for profile data in diffrent formats, but implementation is always the same - composition of the requested response.

### Serialized PHP array

```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new ArrayRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### XML profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new XmlRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### VCF profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new VcfRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### QR profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new QrRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```
Optionally you can request for QR image with specified size
```php
    $profileData = (string) new Response(
        new QrRequest(
            new Account('krzysiekpiasecki@gmail.com'),
            250
        )
    );
```
You can also request for QR image using IMG tag
```php
    $qr = \sprintf("<img src=\"%s\" />",
        new QrRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### JSON profile data

```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new JsonRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```
Optionally you can request for JSONP with specified callback
```php
    $profileData = (string) new Response(
        new JsonRequest(
            new Account('krzysiekpiasecki@gmail.com'),
            "showProfile"
        )
    );
```

**[Visit gravatar.com for more details about profile data requests](http://en.gravatar.com/site/implement/profiles/)**
