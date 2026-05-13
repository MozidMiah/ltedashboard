<?php

use App\Models\Category;

function getImageUrl($image, $directory)
{
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path($directory), $imageName);
    return $directory . $imageName;
}
function getCategory(){
    return Category::all();
}