<?php

/**
 * Post Manager Doc Comment
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

use App\Entity\{User, Post};
use PDO;

/**
 * Post Manager Doc Comment
 * 
 * Queries Manager for Post.
 * 
 * @category Manager
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class PostManager extends Manager
{

    /**
     * Find all Posts
     * 
     * @return array
     */
    public function findAll(): array
    {
        $req = $this->database->pdo()->prepare(
            'SELECT * FROM posts as p ORDER BY p.publishedAt DESC'
        );
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $postsData = $req->fetchAll();
        $posts = [];
        foreach ($postsData as $post) {
            $posts[] = new POST($post);
        }
        return $posts;
    }

    /**
     * Find one Post
     *
     * @param int $postId id of Post
     * 
     * @return object|bool
     */
    public function find(int $postId)
    {
        $req = $this->database->pdo()->prepare(
            'SELECT p.id, p.title, p.author, p.excerpt, p.content, p.publishedAt
            FROM posts as p WHERE p.id = :id'
        );
        $req->bindValue(':id', (int) $postId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $postData = $req->fetch();
        $post = new Post($postData);

        return $post;
    }

    /**
     * Add a Post
     *
     * @param Post $post instance of Post
     * 
     * @return void
     */
    public function add(Post $post): void
    {
        $req = $this->database->pdo()->prepare('INSERT INTO posts(title, author, excerpt, content, publishedAt, userId) VALUES(:title, author, :excerpt, :content, NOW(), :userId)');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':author', $post->getAuthor());
        $req->bindValue(':excerpt', $post->getExcerpt());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':userId', $post->getUserId());
        $req->execute();
    }

    /**
     * Update a Post
     *
     * @param Post $post instance of Post
     * 
     * @return void
     */
    public function update(Post $post): void
    {
        $req = $this->database->pdo()->prepare('UPDATE posts SET title = :title, author = :author, excerpt = :excerpt, content = :content, publishedAt = NOW() , userId = :userId WHERE id = :id');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':author', $post->getAuthor());
        $req->bindValue(':excerpt', $post->getExcerpt());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':userId', $post->getUserId());
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Delete a Post
     *
     * @param int $postId id of Post
     * 
     * @return void
     */
    public function delete(int $postId): void
    {
        $this->database->pdo()->exec('DELETE FROM posts WHERE id = ' . (int) $postId);
    }
}
