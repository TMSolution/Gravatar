#Gravatar

Request to the [gravatar.com](http://www.gravatar.com) for a globally recognized avatar and profile data

## Example of usage
```php
    namespace Gravatar;

    $avatar = \sprintf("<img src=\"%s\" />",
      new ImageRequest(
        new Account('krzysiekpiasecki@gmail.com')
      )
    );
    
    $profile = (string) new Response(
        new ProfileRequest(
            new Account('krzysiekpiasecki@gmail.com')
        )
    );
```
## Class design
__Fully immutable - declarative over imperative - avoiding static methods, properties, utils, consts, null references__

## Resources
- [Application programming interface](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/api/API-documentation.zip)
- [UML Class Diagram](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/ClassDiagram.md)
- [Software metrics](https://github.com/krzysiekpiasecki/Gravatar/blob/master/docs/SoftwareMetrics.md)
- [Project licence](https://github.com/krzysiekpiasecki/Gravatar/blob/master/LICENCE.md)
