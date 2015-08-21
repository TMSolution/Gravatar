# Responses from the gravatar.com

## Creating response

After declaring request, you can declare a response for your request to get a data from the gravatar.com.

#### Response with serialized data
```php
  namespace Gravatar;
  
  $response = new Response(
      new Request(
          new Account("joe.doe@example.com")
      )
  );
```

#### Response with XML data
```php
  namespace Gravatar;
  
  $response = new Response(
      new XmlRequest(
          new Account("joe.doe@example.com")
      )
  );
```

#### Response with VCF data
```php
  namespace Gravatar;
  
  $response = new Response(
      new VcfRequest(
          new Account("joe.doe@example.com")
      )
  );
```

#### Response with QR data
```php
  namespace Gravatar;
  
  $response = new Response(
      new QrRequest(
          new Account("joe.doe@example.com")
      )
  );
```

#### Response with JSON data
```php
  namespace Gravatar;
  
  $response = new Response(
      new JsonRequest(
          new Account("joe.doe@example.com")
      )
  );
```

## Getting response body and headers

When you declare response, you can get a whole body and the response headers.


```php
  namespace Gravatar;
  
  $response = new Response(
      new Request(
          new Account("joe.doe@example.com")
      )
  );
  
  $body = $response->getBody(); // eq. (string) $response
  $headers = $response->getHeaders();
```
