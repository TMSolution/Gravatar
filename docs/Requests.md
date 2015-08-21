# Requests to the gravatar.com

##Request for profile data

Requesting for profile data is a similar process to requesting images. You can request for profile data in diffrent formats, but implementation is always the same - composition of the response.

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
    
    $request = new XmlRequest(
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

### QR profile data
```php
    namespace Gravatar;
    
    new QrRequest(
        new Account('joe.doe@example.com')
    );

    new QrRequest(
        new Account('joe.doe@example.com'),
        250 // size of qr image
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
        "alert" // callback name
    );
```

**[Visit gravatar.com for more details about profile data requests](http://en.gravatar.com/site/implement/profiles/)**
