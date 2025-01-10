<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class InstitutionModel extends Authenticatable
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'institution';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'institution_name','industry', 'registration_no', 'contact_person_name', 'country_code', 'mobile_no', 'email_id', 'otp','address_1', 'address_2', 'city', 'state', 'country', 'subscription_price', 'status', 'total_expected_client', 'company_website', 'radha', 'white_label_client', 'group_counselors', 'content_creation_access', 'created_at', 'updated_at'
    ];
    
}
