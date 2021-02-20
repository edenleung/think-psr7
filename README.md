# think-psr7

```php

use think\Psr7\Message;
use think\Psr7\ServerRequest;
use think\Psr7\Response;

Route::get('/hello', function (ServerRequest $req, Response $response) {
    $response->getBody()->write('Hello World!');
    return Message::make($response->withStatus(200));
});

```
