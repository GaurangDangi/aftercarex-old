<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceLibraryImagesModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'resource_library_images';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'resource_library_id', 'image_url', 'is_main', 'status', 'created_at', 'updated_at'
    ];
}
