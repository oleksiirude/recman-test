<?php

namespace Recman\Http\Controllers;

use Recman\Services\UserService;
use Recman\Validator\Validator;

class AuthController
{
    /**
     * @var UserService
     */
    private UserService $service;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->service = new UserService();
    }

    /**
     * Render registration page.
     */
    public function show(): void
    {
        response(view('sign_in', ['title' => 'Sign In']));
    }

    /**
     * @param array $params
     */
    public function signIn(array $params)
    {
        if (!Validator::validate($params, ['email', 'password'])) {
            redirect('sign-in?error=invalid-params');
        }

        if (!$this->service->checkCredentials($params['email'], $params['password'])) {
            redirect('sign-in?error=wrong-credentials');
        }

        $this->service->signIn();

        redirect('dashboard');
    }

    /**
     * @return void
     */
    public function signOut(): void
    {
        $this->service->signOut();

        redirect('sign-in');
    }
}