<?php

use Recman\Http\Router\Router;
use Recman\Http\Controllers\AuthController;
use Recman\Http\Controllers\RegistrationController;
use Recman\Http\Controllers\DashboardController;

Router::get('/registration', [RegistrationController::class, 'show'], ['redirect-if-auth']);
Router::post('/register-action', [RegistrationController::class, 'register'], ['redirect-if-auth']);

Router::get('/sign-in', [AuthController::class, 'show'], ['redirect-if-auth']);
Router::post('/sign-in-action', [AuthController::class, 'signIn'], ['redirect-if-auth']);
Router::post('/sign-out', [AuthController::class, 'signOut'], ['auth']);

Router::get('/dashboard', [DashboardController::class, 'show'], ['auth']);