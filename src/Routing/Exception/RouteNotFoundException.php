<?php
/**
 * RouteNotFound Exception Doc Comment
 * 
 * PHP version 7
 * 
 * @category Routing
 * @package  Src/Routing/Exception
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Routing\Exception;

use Exception;
use Throwable;

/**
 * RouteNotFound Exception Doc Comment
 * 
 * RouteNotFound Exception 
 * 
 * @category Routing
 * @package  Src/Routing/Exception
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class RouteNotFoundException extends Exception
{
    /**
     * Constructor class
     * 
     * @param string         $message  message
     * @param int            $code     code
     * @param Throwable|null $previous previous
     */
    public function __construct($message = "", $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Force to string
     * 
     * @return [type]
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * Show error
     * 
     * @return [type]
     */
    public function error404()
    {
        http_response_code(404);
    }
}
