<?php

namespace App\Entity;

use DateTime;

class Comment extends Entity
{
  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $content;

  /**
   * @var DateTime
   */
  private $createdAt;

  /**
   * @var bool
   */
  private $approvement;

  /**
   * @var int
   */
  private $postId;

  /**
   * @var int
   */
  private $userId;

  /**
   * @return int
   */
  public function getId()
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
   * @return Datetime
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @param Datetime $createdAt
   */
  public function setCreatedAt(\DateTime $createdAt): void
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return bool
   */
  public function getApprovement(): bool
  {
    return $this->approvement;
  }

  /**
   * @param bool $approvement
   */
  public function setApprovement(bool $approvement): void
  {
    $this->approvement = $approvement;
  }

  /**
   * @return int
   */
  public function getPostId()
  {
    return $this->postId;
  }

  /**
   * @param int $postId
   */
  public function setPostId(int $postId): void
  {
    $this->postId = $postId;
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
