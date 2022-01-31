<?php

namespace Recman\Http\Controllers;

class DashboardController
{
    /**
     * Render dashboard page.
     */
    public function show()
    {
        response(view('dashboard', ['title' => 'Dashboard']));
    }
}