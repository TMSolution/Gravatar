#Request for profile data

Requesting for profile data is a similar process to requesting images. You can request for profile data in diffrent formats, but implementation is always the same - composition of the requested response.

### Request for profile data as a serialized PHP string

```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new ProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### Request for XML profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new XmlProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### Request for VCF profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new VcfProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### Request for QR profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```
Optionally you can request for QR image with specified size
```php
    $profileData = (string) new Response(
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com'),
            250
        )
    );
```
You can also request for QR image using IMG tag
```php
    $qr = \sprintf("<img src=\"%s\" />",
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```

### Request for JSON profile data

```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new JsonProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```
Optionally you can request for JSONP with specified callback
```php
    $profileData = (string) new Response(
        new JsonProfileRequest(
            new Account('krzysiekpiasecki@gmail.com'),
            "showProfile"
        )
    );
```

**[Visit gravatar.com for more details about profile data requests](http://en.gravatar.com/site/implement/profiles/)**.
