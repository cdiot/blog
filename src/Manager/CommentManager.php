<?php
/**
 * Comment Manager Doc Comment
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

use App\Entity\Comment;
use PDO;

/**
 * Comment Manager Doc Comment
 * 
 * Queries Manager for Comment.
 * 
 * @category Manager
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class CommentManager extends Manager
{
    /**
     * Return all Comments
     * 
     * @return array
     */
    public function findAll(): array
    {
        $req = $this->db->pdo()->prepare(
            'SELECT c.id, c.content, c.createdAt, c.approvement, c.postId, u.firstname, p.title, p.excerpt, p.publishedAt FROM comments as c
        JOIN users AS u ON c.userId = u.id
        JOIN posts AS p ON c.postId = p.id WHERE c.approvement = 0 GROUP BY c.postId ORDER BY c.createdAt DESC'
        );
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $comments = $req->fetchAll();
        return $comments;
    }

    /**
     * Return all Comments by Post
     * 
     * @param int $postId postId of Comment
     * 
     * @return array
     */
    public function findByPost(int $postId): array
    {
        $req = $this->db->pdo()->prepare(
            'SELECT c.id, c.content, c.createdAt, c.approvement, c.postId, c.userId
        FROM comments as c WHERE c.postId = :postId AND c.approvement = 1 ORDER BY c.createdAt DESC'
        );
        $req->bindValue(':postId', $postId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $comments = $req->fetchAll();
        return $comments;
    }

    /**
     * Add a Comment
     *
     * @param Comment $comment instance of Comment
     * 
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
     * @param Comment $comment instance of Comment
     * 
     * @return void
     */
    public function approve(Comment $comment): void
    {
        $req = $this->db->pdo()->prepare('UPDATE comments SET approvement = :approvement WHERE id = :id');
        $req->bindValue(':approvement', $comment->getApprovement());
        $req->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Delete a Comment
     *
     * @param int $id id of Comment
     * 
     * @return void
     */
    public function delete(int $id): void
    {
        $this->db->pdo()->exec('DELETE FROM comments WHERE id = ' . (int) $id);
    }
}
