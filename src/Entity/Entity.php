<?php
/**
 * Entity Doc Comment
 * 
 * PHP version 7
 * 
 * @category Entity
 * @package  Src/Entity
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Entity;

/**
 * Entity Doc Comment
 * 
 * Entity
 * 
 * @category Entity
 * @package  Src/Entity
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
abstract class Entity
{
    /**
     * Constructor class
     * 
     * @param array $datas datas to pass
     */
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    /**
     * Allow to handling of stored data
     * 
     * @param array $datas datas to hydrate
     * 
     * @return [type]
     */
    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}
