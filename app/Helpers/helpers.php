<?php

function getImageUrl($file, $path)
{
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path($path), $fileName);

    return $path . $fileName;
}
