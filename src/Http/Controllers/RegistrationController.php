<?php

namespace Recman\Http\Controllers;

use Recman\Validator\Validator;
use Recman\Services\UserService;

class RegistrationController
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
        response(view('registration', ['title' => 'Registration']));
    }

    /**
     * @param array $params
     */
    public function register(array $params): void
    {
        if (!Validator::validate($params, ['first_name', 'last_name', 'phone', 'email', 'password'])) {
            redirect('registration?error=invalid-params');
        }

        if ($this->service->userExists($params['email'])) {
            redirect('registration?error=user-exists');
        }

        $this->service->createUser($params);

        redirect('sign-in?registration=success');
    }
}