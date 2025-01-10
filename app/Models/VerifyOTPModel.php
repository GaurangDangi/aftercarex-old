<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyOTPModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'verify_otp';

    /**
     * @var array $fillable
     */
    protected $fillable = ['institution_id','otp', 'verified', 'created_at', 'updated_at'];
    
    use HasFactory;
}
