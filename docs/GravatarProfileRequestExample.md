# Requesting for gravatar profile

### Getting xml profile

```php 
namespace KrzysiekPiasecki\Gravatar;
    
$request = new GravatarProfileRequest(
  'krzysiekpiasecki@gmail.com',
  'xml'
);

$response = new GravatarResponse($request);
$responeMessage = $response->getMessage();

$responseBody = $responseMessage->getBody();
$responseHeaders = $responseMessage->getHeaders();
```
