<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileOtpVerifyModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'mobile_otp_verify';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'role', 'user_id', 'otp', 'status', 'created_at', 'updated_at'
    ];
}
