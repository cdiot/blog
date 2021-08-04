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

use App\Entity\{User, Comment, Post};
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
            'SELECT c.id, c.message, c.createdAt, c.approvement, c.postId, u.firstname, u.lastname, p.title, p.excerpt, p.publishedAt FROM comments as c
        INNER JOIN users AS u ON c.userId = u.id
        INNER JOIN posts AS p ON c.postId = p.id WHERE c.approvement = 0 
        ORDER BY c.createdAt DESC'
        );
        $req->execute();
        $commentsData = $req->fetchAll();
        $comments = [];
        foreach ($commentsData as $comment) {
            $user = new User(['firstname' => $comment['firstname'], 'lastname' => $comment['lastname']]);
            $post = new Post(['title' => $comment['title'], 'publishedAt' => $comment['publishedAt'], 'excerpt' => $comment['excerpt']]);
            $comment['user'] = $user;
            $comment['post'] = $post;
            $comments[] = new Comment($comment);
        }
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
            'SELECT * FROM comments as c 
            INNER JOIN users u ON c.userId = u.id WHERE c.postId = :postId 
            AND c.approvement = 1 ORDER BY c.createdAt ASC'
        );
        $req->bindValue(':postId', $postId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $commentsData = $req->fetchAll();
        $comments = [];
        foreach ($commentsData as $comment) {
            $user = new User(['firstname' => $comment['firstname'], 'lastname' => $comment['lastname']]);
            $comment['user'] = $user;
            $comments[] = new Comment($comment);
        }
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
        $req = $this->db->pdo()->prepare('INSERT INTO comments(message, createdAt, approvement, postId, userId) VALUES(:message, NOW(), 0, :postId, :userId)');
        $req->bindValue(':message', $comment->getMessage());
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
