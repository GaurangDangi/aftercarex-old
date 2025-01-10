<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginLogsModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'login_logs_daily';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'user_id', 'role', 'login_date', 'created_at', 'updated_at'
    ];
}
