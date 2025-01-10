<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceLibraryModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'resource_library';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'type', 'title', 'description', 'thumbnail', 'pdfUrl', 'external_link', 'author', 'category', 
        'role', 'popular', 'status', 'created_at', 'updated_at'
    ];

    public function multipleImages() {
        return $this->hasMany(ResourceLibraryImagesModel::class, 'resource_library_id');
    }
}
