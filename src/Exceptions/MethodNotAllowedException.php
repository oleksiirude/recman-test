<?php

namespace Recman\Exceptions;

use Exception;

class MethodNotAllowedException extends Exception
{
    protected $message = 'Method not allowed.';
}