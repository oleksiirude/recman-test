<?php

namespace Recman\Http\Middlewares;

class Authenticated implements MiddlewareContract
{
    /**
     * @param array $params
     */
    public function handle(array &$params): void
    {
        if (!userAuthenticated()) {
            redirect('sign-in');
        }
    }
}