<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ClientModel extends Authenticatable
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'client';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'institution_id', 'name', 'country_code', 'mobile_no', 'email_id', 'password', 'status', 'note', 'sms_service', 
        'aftercare_service_length', 'service_date', 'type', 'category', 'disclaimer', 'created_at', 'updated_at'
    ];
}
