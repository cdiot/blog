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
  private $resum;

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
  public function getResum(): string
  {
    return $this->resum;
  }

  /**
   * @param string $resum
   */
  public function setResum(string $resum): void
  {
    $this->resum = $resum;
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
  public function getPublishedAt(): DateTime
  {
    return $this->publishedAt;
  }

  /**
   * @param DateTime $publishedAt
   */
  public function setPublishedAt(DateTime $publishedAt): void
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
