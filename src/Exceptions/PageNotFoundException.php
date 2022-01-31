<?php

namespace Recman\Exceptions;

use Exception;

class PageNotFoundException extends Exception
{
    protected $message = 'Page not found.';
}