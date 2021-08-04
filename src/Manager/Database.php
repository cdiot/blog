<?php

/**
 * Database Doc Comment
 * 
 * PHP version 7
 * 
 * @category Database
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */

namespace App\Manager;

use PDO;
use PDOException;
use LogicException;
use App\Http\Request;

/**
 * Database Doc Comment
 * 
 * Database
 * 
 * @category Database
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
final class Database
{

    private $_pdo;
    private static $_instance = null;

    /**
     * Constructor class
     */
    private function __construct()
    {
        $_request = new Request;
        try {
            $this->_pdo = new PDO('mysql:host=' . $_request->getEnv('HOST') . '; dbname=' . $_request->getEnv('DB_NAME'), $_request->getEnv('DB_USERNAME'), $_request->getEnv('DB_PASSWORD'));
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    /**
     * Get instance
     * 
     * @return [type]
     */
    final public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Return message if Clone
     * 
     * @return [type]
     */
    public function __clone()
    {
        throw new LogicException('Interdit de cloner !');
    }

    /**
     * Return message if wakeup
     * 
     * @return [type]
     */
    public function __wakeup()
    {
        throw new LogicException('Interdit de faire des instances en désérialisant !');
    }


    /**
     * Return pdo
     * 
     * @return [type]
     */
    public function pdo()
    {
        return $this->_pdo;
    }
}
