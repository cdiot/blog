<?php

namespace App\Entity;

use DateTime;

class Post extends Entity
{
  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $title;

  /**
   * @var string
   */
  private $excerpt;

  /**
   * @var string
   */
  private $content;

  /**
   * @var DateTime
   */
  private $publishedAt;

  /**
   * @var int
   */
  private $userId;

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void
  {
    $this->id = (int) $id;
  }

  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  /**
   * @return string
   */
  public function getExcerpt(): string
  {
    return $this->excerpt;
  }

  /**
   * @param string $excerpt
   */
  public function setExcerpt(string $excerpt): void
  {
    $this->excerpt = $excerpt;
  }

  /**
   * @return string
   */
  public function getContent(): string
  {
    return $this->content;
  }

  /**
   * @param string $content
   */
  public function setContent(string $content): void
  {
    $this->content = $content;
  }

  /**
   * @return DateTime
   */
  public function getPublishedAt()
  {
    return $this->publishedAt;
  }

  /**
   * @param DateTime $publishedAt
   */
  public function setPublishedAt($publishedAt): void
  {
    $this->publishedAt = $publishedAt;
  }

  /**
   * @return int
   */
  public function getUserId()
  {
    return $this->userId;
  }

  /**
   * @param int $userId
   */
  public function setUserId(int $userId): void
  {
    $this->userId = $userId;
  }
}
