<?php
namespace classes;

use user\GoldenUser;
use user\NormalUser;
use user\User;

trait canTrait{

    public function canLike()
    {
       return true;
    }

    public function canComment()
    {
        return is_a($this->userType,NormalUser::class) ?  false  : true;
    }

    public function canArchive()
    {
        return is_a($this->userType,GoldenUser::class) ?  true  : false;
    }
}
