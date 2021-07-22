<?php

namespace App\Manager;

use App\Entity\Comment;
use PDO;

/**
 * Queries Manager for Comment.
 */
class CommentManager extends Manager
{
    /**
     * Return all Comments
     * 
     * @param int $postId
     * @return array
     */
    public function findAll(): array
    {
        $req = $this->db->pdo()->prepare('SELECT c.id, c.content, c.createdAt, c.approvement, c.postId, c.userId
        FROM comments as c ORDER BY c.createdAt DESC');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $comments = $req->fetchAll();
        return $comments;
    }
    /**
     * Return all Comments by Post
     * 
     * @param int $postId
     * @return array
     */
    public function findByPost(int $postId): array
    {
        $req = $this->db->pdo()->prepare('SELECT c.id, c.content, c.createdAt, c.approvement, c.postId, c.userId
        FROM comments as c WHERE c.postId = :postId ORDER BY c.createdAt DESC');
        $req->bindValue(':postId', $postId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $comments = $req->fetchAll();
        return $comments;
    }

    /**
     * Add a Comment
     *
     * @param Comment $comment
     * @return void
     */
    public function add(Comment $comment): void
    {
        $req = $this->db->pdo()->prepare('INSERT INTO comments(content, createdAt, approvement, postId, userId) VALUES(:content, NOW(), 0, :postId, :userId)');
        $req->bindValue(':content', $comment->getContent());
        $req->bindValue(':postId', $comment->getPostId(), PDO::PARAM_INT);
        $req->bindValue(':userId', $comment->getUserId(), PDO::PARAM_INT);
        $req->execute();
    }

     /**
     * Approve a Comment
     *
     * @param Comment $comment
     * @return void
     */
     public function approve(Comment $comment): void
  {
    $req = $this->db->pdo()->prepare('UPDATE comment SET approvement = :approvement WHERE id = :id');
    $req->bindValue(':approvement', $comment->getApprovement());
    $req->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
    $req->execute();
  }
}
