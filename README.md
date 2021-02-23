# think-psr7

```php

use think\Psr7\HttpHandlerRunner;
use think\Psr7\ServerRequest;
use think\Psr7\Response;

Route::get('/hello', function (ServerRequest $req, Response $response) {
    $response->getBody()->write('Hello World!');
    return HttpHandlerRunner::make($response->withStatus(200));
});

```
