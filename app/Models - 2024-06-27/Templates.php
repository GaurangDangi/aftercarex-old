<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'templates';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id', 'type', 'title', 'sequence', 'content', 'abuse', 'status', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
