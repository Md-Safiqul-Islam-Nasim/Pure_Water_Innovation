<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

function uploadImage($file, $folder, $name): string
{
    $imageName = Str::slug($name) . '.' . $file->extension();
    $file->move(public_path('uploads/' . $folder), $imageName);
    $path = 'uploads/' . $folder . $imageName;
    return $path;
}

function deleteMedia($media)
{
    try {
        if (isset($media) && file_exists(public_path($media))) {
            unlink(public_path($media));
            
            return true;
        }

        return false;
    } catch (\Exception $e) { 
        return false;
    }
}


//! Generate Slug
function makeSlug($model, string $title): string
{
    $slug = Str::slug($title);
    while ($model::where('slug', $slug)->exists()) {
        $randomString = Str::random(5);
        $slug         = Str::slug($title) . '-' . $randomString;
    }
    return $slug;
}

