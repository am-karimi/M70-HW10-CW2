<?php

namespace classes;

use user\User;



class Post
{
    protected array $data;
    protected int $postId;
    protected string $title;
    protected string $body;

    public function __construct(User $user,int $postId, string $title, string $body)
    {
        $this->postId = $postId;
        $this->body = $body;
        $this->title = $title;

        $this->data[$user->id] =
            [
                'id' => $postId,
                'title' => $title,
                'body' => $body
            ];
    }


//    /**
//     * @return array
//     */
//    public function getData(): array                                  wrong code
//    {
//        return $this->Serializable();
//    }


    public function like(User $user)
    {
        if ($user->canLike()) {
            $this->data['like'][] = $user->id;
            echo "user like the post".PHP_EOL;
        } else {
            echo "user can not like".PHP_EOL;
        }
    }

    public function comment(User $user, string $comment)
    {
        if ($user->canComment()) {
            $this->data['comments'][] =
                [
                    'id' => $user->id,
                    'name' => $user->name,
                    'body' => $comment
                ];

            echo "user comment on the post".PHP_EOL;
        } else {
            echo "user can not comment on the post".PHP_EOL;
        }
    }

    public function archive(User $user)
    {
        if ($user->canArchive()) {
            $this->data['archive'] = true;
            echo "post is archive successfull".PHP_EOL;
        } else {
            echo "user can not archive the post".PHP_EOL;
        }
    }

    public function unArchive(User $user)
    {
        if ($user->canArchive()) {
            $this->data['archive'] = false;
            echo "post is unArchive successfull".PHP_EOL;
        }else{
            echo "user can not unArchive the post".PHP_EOL;
        }
    }

}