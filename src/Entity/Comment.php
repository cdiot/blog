<?php
/**
 * Comment Entity Doc Comment
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

use DateTime;

/**
 * Comment Entity Doc Comment
 * 
 * Comment Entity
 * 
 * @category Entity
 * @package  Src/Entity
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class Comment extends Entity
{
    /**
     * Id of Comment
     * 
     * @var int
     */
    private $_id;

    /**
     * Content of Comment
     * 
     * @var string
     */
    private $_content;

    /**
     * CreatedAt of Comment
     * 
     * @var DateTime
     */
    private $_createdAt;

    /**
     * Approvement of Comment
     * 
     * @var bool
     */
    private $_approvement;

    /**
     * PostId of Comment
     * 
     * @var int
     */
    private $_postId;

    /**
     * UserId of Comment
     * 
     * @var int
     */
    private $_userId;

    /**
     * Get id of Comment
     * 
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set id of Comment
     * 
     * @param int $id id of Comment
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->_id = (int) $id;
    }

    /**
     * Get content of Comment
     * 
     * @return string
     */
    public function getContent(): string
    {
        return $this->_content;
    }

    /**
     * Set content of Comment
     * 
     * @param string $content content of Comment
     * 
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->_content = $content;
    }

    /**
     * Get createdAt of Comment
     * 
     * @return Datetime
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    /**
     * Set createdAd of Comment
     * 
     * @param Datetime $createdAt createdAt of Comment
     * 
     * @return void
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->_createdAt = $createdAt;
    }

    /**
     * Get approvement of Comment
     * 
     * @return bool
     */
    public function getApprovement(): bool
    {
        return $this->_approvement;
    }

    /**
     * Set approvement of Comment
     * 
     * @param bool $approvement approvement of Comment
     * 
     * @return void
     */
    public function setApprovement(bool $approvement): void
    {
        $this->_approvement = $approvement;
    }

    /**
     * Get postId of Comment
     * 
     * @return int
     */
    public function getPostId()
    {
        return $this->_postId;
    }

    /**
     * Set postId of Comment
     * 
     * @param int $postId postId of Comment
     * 
     * @return void
     */
    public function setPostId(int $postId): void
    {
        $this->_postId = $postId;
    }

    /**
     * Get userId of Comment
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * Set UserId of Comment
     * 
     * @param int $userId userId of Comment
     * 
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->_userId = $userId;
    }
}
