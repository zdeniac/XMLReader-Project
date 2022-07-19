<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'created_at'
    ];

    public $timestamps = false;

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
