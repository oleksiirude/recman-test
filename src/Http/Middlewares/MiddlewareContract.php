<?php

namespace Recman\Http\Middlewares;

interface MiddlewareContract
{
    public function handle(array &$params): void;
}