<?php

namespace user;

use classes\canTrait;
use classes\Post;
use classes\DataTrait;
use classes\SerializableTrait;

class User
{
    use SerializableTrait;
    use canTrait;
    use DataTrait;

    public int $id;
    public string $name;
    public User $userType;
    public array $userData;
    public array $posts;

    public function __construct($id,$name,$userType)
    {
        $this->id = $id;
        $this->name = $name;
        $this->userType = $userType;
        $this->userData[]=
            [
                'name'=>$name,
                'type'=>$userType,
            ];
    }

    /**
     * @return array
     */
    public function getUserData(User $user): array
    {
        return $this->creatData();
    }


    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function post(int $postId, string $title, string $body)
    {
        $this->posts[$postId]= new Post($this,$postId, $title, $body);
        return $this->posts[$postId];
    }

    public function archive(Post $post)
    {
        $post->archive($this);
    }

    public function unArchive(Post $post)
    {
        $post->unArchive($this);
    }

    public function getAllPost()
    {
        return $this->Serializable();
    }


}