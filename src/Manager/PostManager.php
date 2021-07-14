<?php

namespace App\Manager;

use App\Entity\Post;
use PDO;

/**
 * Queries Manager for Post.
 */
class PostManager extends Manager
{

    /**
     * Return all Posts
     * 
     * @param int $first
     * @param int $perPage
     * @return array
     */
    public function findAll(): array
    {
        $req = $this->db->pdo()->prepare('SELECT p.id, p.title, p.excerpt, p.content, p.publishedAt, u.firstname
        FROM posts as p INNER JOIN users as u ON p.userId = u.id ORDER BY p.publishedAt DESC');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $posts = $req->fetchAll();
        return $posts;
    }

    /**
     * Return one Post
     *
     * @param int $id
     * @return object|bool
     */
    public function find(int $id): object
    {
        $req = $this->db->pdo()->prepare('SELECT p.id, p.title, p.excerpt, p.content, p.publishedAt, u.firstname
        FROM posts as p INNER JOIN users as u ON p.userId = u.id WHERE p.id = :id');
        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $post = $req->fetch();
        return $post;
    }

    /**
     * Add a Post
     *
     * @param Post $post
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
     * @param Post $post
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
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->db->pdo()->exec('DELETE FROM posts WHERE id = ' . (int) $id);
    }
}
