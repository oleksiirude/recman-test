<?php

namespace Recman\Http\Router;

use Recman\Exceptions\MethodNotAllowedException;
use Recman\Exceptions\PageNotFoundException;
use Recman\Http\Middlewares\MiddlewareHandler;
use ReflectionException;
use ReflectionMethod;

class Router
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    /**
     * @var array
     */
    private static array $routes = [];

    private function __construct()
    {
    }

    /**
     * @param string $pattern
     * @param array $handler
     * @param array $middlewares
     */
    public static function get(string $pattern, array $handler, array $middlewares = []): void
    {
        self::$routes[$pattern] = [self::METHOD_GET, $handler[0], $handler[1], $middlewares];
    }

    /**
     * @param string $pattern
     * @param array $handler
     * @param array $middlewares
     */
    public static function post(string $pattern, array $handler, array $middlewares = []): void
    {
        self::$routes[$pattern] = [self::METHOD_POST, $handler[0], $handler[1], $middlewares];
    }

    /**
     * @throws PageNotFoundException
     * @throws ReflectionException|MethodNotAllowedException
     */
    public static function run()
    {
        foreach (self::$routes as $pattern => [$method, $controller, $action, $middlewares]) {
            if ($pattern === parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)) {

                if ($_SERVER['REQUEST_METHOD'] !== $method) {
                    throw new MethodNotAllowedException();
                }

                $params = self::getRequestParameters();

                MiddlewareHandler::apply($middlewares, $params);

                $method = new ReflectionMethod($controller, $action);

                if (!empty($method->getParameters())) {
                    return (new $controller)->{$action}($params);
                }

                return (new $controller)->{$action}();
            }
        }

        throw new PageNotFoundException();
    }

    /**
     * @return array
     */
    private static function getRequestParameters(): array
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case self::METHOD_POST:
                $params = $_POST;
                break;
            case self::METHOD_GET:
                $params = $_GET;
                break;
            default:
                $params = [];
        }

        return $params;
    }

    private function __clone()
    {
    }
}