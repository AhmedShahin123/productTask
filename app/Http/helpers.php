<?php
//use Image;


function uploadImgFromMobile($img, $tag)
{
    $fullName = $tag.'_'.mt_rand(10, 100).date('Y-m-d').'.jpeg';
    $path = public_path('/uploads/');
    $img = Image::make($img)->save($path.$fullName);

    return $fullName;
}

function uploadImage($img, $tag)
{
    $fullName = $tag.'_'.mt_rand(10, 100).date('Y-m-d').'.jpeg';
    $path = public_path('/uploads/');
    $img = Image::make($img)->save($path.$fullName);

    return $fullName;
}
