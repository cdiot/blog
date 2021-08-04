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
     * Return all Posts
     * 
     * @return array
     */
    public function findAll(): array
    {
        $req = $this->db->pdo()->prepare(
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
     * Return one Post
     *
     * @param int $id id of Post
     * 
     * @return object|bool
     */
    public function find(int $id): object
    {
        $req = $this->db->pdo()->prepare(
            'SELECT p.id, p.title, p.excerpt, p.content, p.publishedAt, u.firstname, u.lastname
            FROM posts as p 
            INNER JOIN users as u ON p.userId = u.id WHERE p.id = :id'
        );
        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $postData = $req->fetch();
        $user = new User(['firstname' => $postData['firstname'], 'lastname' => $postData['lastname']]);
        $postData['author'] = $user;
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
        $req = $this->db->pdo()->prepare('INSERT INTO posts(title, excerpt, content, publishedAt, userId) VALUES(:title, :excerpt, :content, NOW(), :userId)');
        $req->bindValue(':title', $post->getTitle());
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
        $req = $this->db->pdo()->prepare('UPDATE posts SET title = :title, excerpt = :excerpt, content = :content, publishedAt = NOW() , userId = :userId WHERE id = :id');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':excerpt', $post->getExcerpt());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':userId', $post->getUserId());
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Delete a Post
     *
     * @param int $id id of Post
     * 
     * @return void
     */
    public function delete(int $id): void
    {
        $this->db->pdo()->exec('DELETE FROM posts WHERE id = ' . (int) $id);
    }
}
