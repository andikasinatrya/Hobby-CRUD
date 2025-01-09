<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'hobbys'; 
    protected $fillable = ['hobby'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_hobbys', 'hobby_id', 'siswa_id');
    }
    
}
