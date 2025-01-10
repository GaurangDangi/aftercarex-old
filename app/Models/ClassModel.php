<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'classes';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'speaker_id', 'zoomLink', 'title', 'start_date', 'start_time', 'duration', 'subject', 'status', 'created_at', 'updated_at'
    ];
}
