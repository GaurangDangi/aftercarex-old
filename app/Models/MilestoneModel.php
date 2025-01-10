<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilestoneModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'milestones';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'title', 'days_no', 'image_url', 'status', 'created_at', 'updated_at'
    ];
}
