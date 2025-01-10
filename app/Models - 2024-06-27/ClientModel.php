<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'client';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'clinic_id', 'name', 'mobile_no', 'email_id', 'password', 'status', 'sms_service', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
