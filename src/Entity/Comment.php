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
     * Message of Comment
     * 
     * @var string
     */
    private $_message;

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
     * User of Comment
     * 
     * @var User
     */
    private $_user;

    /**
     * Post of Comment
     * 
     * @var Post
     */
    private $_post;

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
     * @param int $commentId id of Comment
     * 
     * @return void
     */
    public function setId(int $commentId): void
    {
        $this->_id = (int) $commentId;
    }

    /**
     * Get message of Comment
     * 
     * @return string
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Set message of Comment
     * 
     * @param string $message message of Comment
     * 
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->_message = $message;
    }

    /**
     * Get createdAt of Comment
     * 
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    /**
     * Set createdAd of Comment
     * 
     * @param string $createdAt createdAt of Comment
     * 
     * @return void
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->_createdAt = $createdAt;
    }

    /**
     * Get approvement of Comment
     * 
     * @return bool
     */
    public function getHasApprovement(): bool
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
    public function setHasApprovement(bool $approvement): void
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

    /**
     * Get author of Post
     * 
     * @return User
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * Set user of comment
     * 
     * @param User $user user of Post
     * 
     * @return void
     */
    public function setUser(User $user)
    {
        $this->_user = $user;
    }

    /**
     * Get post of comment
     * 
     * @return Post
     */
    public function getPost()
    {
        return $this->_post;
    }

    /**
     * Set post of Comment
     * 
     * @param Post $post post of comment
     * 
     * @return void
     */
    public function setPost(Post $post)
    {
        $this->_post = $post;
    }
}
