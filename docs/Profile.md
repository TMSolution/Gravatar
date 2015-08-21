# Profile

To get a profile data you must declare the response for the request with serialized data.

```php
  namespace Gravatar;
  
  $profile = new Profile(
      new Response(
          new Request(
              new Account("joedoe@example.com")
          )
      )
  );
```

After declaring profile object use profile interface to get the data.
