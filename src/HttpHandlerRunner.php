<?php

declare(strict_types=1);

namespace think\Psr7;

use Psr\Http\Message\ResponseInterface;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use think\App;
use think\Container;
use think\event\HttpEnd;

class HttpHandlerRunner
{
    public static function make(ResponseInterface $response)
    {
        $handle = new SapiEmitter();
        $handle->emit($response);

        $app = Container::getInstance()->make(App::class);
        $app->event->trigger(HttpEnd::class, $response);
        $app->log->save();
        
        // 直接结束 不交给 ThinkPHP Response 处理
        // public/index.php 以下代码失效 由上方处理代处理
        // 中间件 end 方法暂时失效
        // $response->send();
        // $http->end($response);
        exit();
    }
}
