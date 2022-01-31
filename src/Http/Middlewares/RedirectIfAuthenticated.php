<?php

namespace Recman\Http\Middlewares;

class RedirectIfAuthenticated implements MiddlewareContract
{
    /**
     * @param array $params
     */
    public function handle(array &$params = []): void
    {
        if (userAuthenticated()) {
            redirect('dashboard');
        }
    }
}