<?php

namespace Recman\Http\Middlewares;

class MiddlewareHandler
{
    /**
     * @var array|string[]
     */
    protected static array $middlewares = [
        'auth'             => Authenticated::class,
        'redirect-if-auth' => RedirectIfAuthenticated::class
    ];

    /**
     * @var array|string[]
     */
    protected static array $middlewaresApplyToAll = [
        'trim-strings' => TrimStrings::class,
        //
    ];

    private function __construct()
    {
    }

    /**
     * @param array $routeMiddlewares
     * @param array $requestParams
     */
    public static function apply(array $routeMiddlewares, array &$requestParams = []): void
    {
        foreach ($routeMiddlewares as $middleware) {
            /** @var $middlewareInstance MiddlewareContract */
            if (array_key_exists($middleware, self::$middlewares)) {
                $middlewareInstance = new self::$middlewares[$middleware];
                $middlewareInstance->handle($requestParams);
            }
        }

        foreach (self::$middlewaresApplyToAll as $class) {
            /** @var $middlewareInstance MiddlewareContract */
            $middlewareInstance = new $class;
            $middlewareInstance->handle($requestParams);
        }
    }

    private function __clone()
    {
    }
}