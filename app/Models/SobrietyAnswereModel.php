<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SobrietyAnswereModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'sobriety_answere';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'sobriety_id', 'question', 'answere_one', 'marks_one', 'answere_two', 'marks_two', 'answere_three', 'marks_three', 
        'answere_four', 'marks_four', 'answere_five', 'marks_five', 'answere_six', 'marks_six', 'created_at', 'updated_at'
    ];
}
