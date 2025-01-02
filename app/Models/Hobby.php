<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hobby extends Model
{
    
    protected $fillable = [
        'name',
    ];

    public function hobby(): HasMany
    {
      return $this->hasMany(Student::class, 'nisn_id');
    }
}

