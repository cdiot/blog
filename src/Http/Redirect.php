<?php

/**
 * Redirect Doc Comment
 * 
 * PHP version 7
 * 
 * @category Redirect
 * @package  Src/Http
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */

namespace App\Http;

/**
 * Redirect Doc Comment
 * 
 * Redirect
 * 
 * @category Redirect
 * @package  Src/Http
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class Redirect
{

    /**
     * Redirect to $uri
     *
     * @param string $uri uri
     *
     * @return void
     */
    public function redirect(string $uri): void
    {
        header("Location: $uri");
    }
}
