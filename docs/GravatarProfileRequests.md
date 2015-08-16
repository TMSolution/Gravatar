#Request for profile data


### Serialized array profile data
```php
    namespace Gravatar;
    
    $response = new Response(
        new ProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```


### XML profile data
```php
    namespace Gravatar;
    
    $response = new Response(
        new XmlProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

### VCF profile data
```php
    namespace Gravatar;
    
    $response = new Response(
        new VcfProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

### QR profile data
```php
    namespace Gravatar;
    
    $response = new Response(
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        )
    );
```

```php
    $response = new Response(
        new QrProfileRequest(
            new Account('krzysiekpiasecki@gmail.com)
        ), 250
    );
```

### JSON profile data
```php
    namespace Gravatar;
    
    $response = new Response(
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
    
```
