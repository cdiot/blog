<?php

namespace App\Routing\Exception;

use Exception;
use Throwable;

/**
 * Class RouteNotFoundException.
 */
class RouteNotFoundException extends Exception
{
    public function __construct($message = "", $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function error404()
    {
        http_response_code(404);
    }
}
