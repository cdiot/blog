<?php
/**
 * Manager Doc Comment
 * 
 * PHP version 7
 * 
 * @category Manager
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Manager;
/**
 * Manager Doc Comment
 * 
 * Manager
 * 
 * @category Manager
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
abstract class Manager
{

    protected $db;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}
