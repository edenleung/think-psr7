<?php

declare(strict_types=1);

namespace think\Psr7;

use Psr\Http\Message\ResponseInterface;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

class HttpHandlerRunner
{
    public static function make(ResponseInterface $response)
    {
        $handle = new SapiEmitter();
        $handle->emit($response);
        
        // 直接结束 不交给 ThinkPHP Response 处理
        exit();
    }
}
