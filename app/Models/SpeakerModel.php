<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SpeakerModel extends Authenticatable
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'speakers';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'institution_id', 'name', 'country_code', 'mobile_no', 'email_id', 'password', 'role', 'status', 'created_at', 'updated_at'
    ];
}