#Requesting for gravatar image

```php
namespace KrzysiekPiasecki\Gravatar;

$request = new GravatarImageRequest();

$request
    ->withEmail('krzysiekpiasecki@gmail.com')
    ->withHttps()
    ->withSize(200);

$response = new GravatarResponse($request);

$message = $response->getMessage();

$headers = $message->getHeaders();
$image = $message->getBody();
```
