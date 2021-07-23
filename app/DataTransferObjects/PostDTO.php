<?php
namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PostDTO extends DataTransferObject
{
    public string $title;

    public string $description;

    public string $image_path;
}
