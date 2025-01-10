<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'clinic';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name_of_clinic', 'registration_no', 'contact_person_name', 'mobile_no', 'email_id', 'address_1', 'address_2', 'city', 'state', 'country', 'subscription_price', 'status', 'created_at', 'updated_at'
    ];
    use HasFactory;
}
