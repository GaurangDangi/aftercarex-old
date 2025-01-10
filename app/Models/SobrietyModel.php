<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SobrietyModel extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'sobriety';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'title', 'rules', 'status', 'created_at', 'updated_at'
    ];

    public function questionAns() {
        return $this->hasMany(SobrietyAnswereModel::class, 'sobriety_id');
    }
}
