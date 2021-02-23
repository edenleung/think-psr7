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

## 注意

如使用 `HttpHandlerRunner::make()` 返回 response 信息， `public/index.php` 入口文件以下代码将会失效

**此[文件](https://github.com/edenleung/think-psr7/blob/master/src/HttpHandlerRunner.php#L20)代为处理**

**中间件 end 方法 暂时失效**

```
namespace think;

require __DIR__ . '/../vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

// 已失效
$response->send();

// 已失效
$http->end($response);
```
