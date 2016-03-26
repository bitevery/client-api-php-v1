# client-api-php-v1
Official client API to interact with www.bitevery.com.

## Installation
include the endpoint file to your local project. For example:
``` php
require_once('src/tip.php');
```

## File Structure
Two files in the src folder which provide services as follow:
* tip ([docs](Documentation/tip.md))
* apiCode ([docs](Documentation/apiCode.md))

## API Code Required
In order to hide the user information in the API calls as much as possible, bitevery requires an API code to access all the service endpoints. API is available by using apiCode module.
