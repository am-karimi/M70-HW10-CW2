<?php
namespace classes;
class Comment{
    protected Post $post;
    protected string $comment;

    public function addComment(Post $post,string $comment)
    {
        $post->addComment($comment);
    }
}