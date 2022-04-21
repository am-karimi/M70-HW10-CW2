<?php

require 'vendor/autoload.php';

use classes\Comment;
use user\GoldenUser;
use user\User;

$amir=new User(1,'amir',new GoldenUser());
$mamad=new User(2,'mamad',new GoldenUser());



$post1=$amir->post(1,'post1','hi amir hastam');
$post5=$amir->post(5,'post5','in the name of allah');
$post2=$mamad->post(1,'post1','hi mamad hastam');

echo '<pre>';
$post2->like($amir);
echo '<pre>';
$post2->comment($amir,'very goood');
$amir->archive($post1);
$amir->unArchive($post1);

echo '<pre>';
print_r($post2);

echo '<pre>';
print_r($amir->getAllPost());










