#Request for profile data

Requesting for profile data is a similar process to requesting images. You can request for data diffrent formats, but implementation is always the same.

### Request for profile data as a serialized PHP string

```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new ProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```


### Request for XML profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new XmlProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

### Request for VCF profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new VcfProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

### Request for QR profile data
```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

```php
    $profileData = (string) new Response(
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        ), 250
    );
```

### Request for JSON profile data

```php
    namespace Gravatar;
    
    $profileData = (string) new Response(
        new JsonProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

```php
    $response = new Response(
        new JsonProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        ), "showProfile"
    );
```
