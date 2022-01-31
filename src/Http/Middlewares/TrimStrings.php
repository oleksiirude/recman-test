<?php

namespace Recman\Http\Middlewares;

class TrimStrings implements MiddlewareContract
{
    /**
     * @param array $params
     */
    public function handle(array &$params): void
    {
        foreach ($params as &$param) {
            $param = trim($param);
        }
    }
}