<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id2',
        'tax_number',
        'full_name',
        'email',
        'login_date',
        'logout_date',
    ];

    public function log()
    {
        return $this->hasOne(PersonLog::class);
    }
}
