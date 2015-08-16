#Gravatar

Request to the [gravatar.com](http://www.gravatar.com) for a globally recognized avatar and profile data

## Gravatar image requests
```php
    namespace Gravatar;

    $avatar = \sprintf("<img src=\"%s\" />",
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com')
      )
    );
```
[Read more about Gravatar image requests](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/GravatarImageRequests.md)


## Gravatar profile requests
```php
    $profile = (string) new Response(
        new ProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```
[Read more about Gravatar profile requests](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/GravatarProfileRequests.md)

## Class design

- Fully immutable
- Declarative over imperative
- Avoiding static methods, properties, utils, consts, null references

## Resources
- [Application programming interface](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/Gravatar/blob/master/LICENCE.md)
