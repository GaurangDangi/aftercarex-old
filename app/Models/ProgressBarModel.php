<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressBarModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'progress_bar';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'user_id', 'role', 'login_date', 'created_at', 'updated_at'
    ];
}
