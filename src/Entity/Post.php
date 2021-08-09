<?php

/**
 * Post Entity Doc Comment
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
 * Post Entity Doc Comment
 * 
 * Post Entity
 * 
 * @category Entity
 * @package  Src/Entity
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class Post extends Entity
{
    /**
     * Id of Post
     * 
     * @var int
     */
    private $_id;

    /**
     * Title of Post
     * 
     * @var string
     */
    private $_title;

    /**
     * Post's author
     * 
     * @var string
     */
    private $_author;

    /**
     * Except of Post
     * 
     * @var string
     */
    private $_excerpt;

    /**
     * Content of Post
     * 
     * @var string
     */
    private $_content;

    /**
     * PublishedAt of Post
     * 
     * @var DateTime
     */
    private $_publishedAt;

    /**
     * UserId of Post
     * 
     * @var int
     */
    private $_userId;

    /**
     * Get id of Post
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * Set id of Post
     * 
     * @param int $postId id of Post
     * 
     * @return void
     */
    public function setId(int $postId): void
    {
        $this->_id = (int) $postId;
    }

    /**
     * Get title of Post
     * 
     * @return string
     */
    public function getTitle(): string
    {
        return $this->_title;
    }

    /**
     * Set tilte of Post
     * 
     * @param string $title title of Post
     * 
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->_title = $title;
    }

    /**
     * Get author of Post
     * 
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->_author;
    }

    /**
     * Set author of Post
     * 
     * @param string $author author of Post
     * 
     * @return void
     */
    public function setAuthor(string $author): void
    {
        $this->_author = $author;
    }

    /**
     * Get except of Post
     * 
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->_excerpt;
    }

    /**
     * Set except of Post
     * 
     * @param string $excerpt excerpt of Post
     * 
     * @return void
     */
    public function setExcerpt(string $excerpt): void
    {
        $this->_excerpt = $excerpt;
    }

    /**
     * Get content of Post
     * 
     * @return string
     */
    public function getContent(): string
    {
        return $this->_content;
    }

    /**
     * Set content of Post
     * 
     * @param string $content content of Post
     * 
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->_content = $content;
    }

    /**
     * Get publishedAt of Post
     * 
     * @return DateTime
     */
    public function getPublishedAt()
    {
        return $this->_publishedAt;
    }

    /**
     * Set publishedAt of Post
     * 
     * @param DateTime $publishedAt publishedAt of Post
     * 
     * @return void
     */
    public function setPublishedAt($publishedAt): void
    {
        $this->_publishedAt = $publishedAt;
    }

    /**
     * Get userId of Post
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * Set userId of Post
     * 
     * @param int $userId userId of Post
     * 
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->_userId = $userId;
    }
}
