<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama'];

    public function hobby()
    {
        return $this->belongsToMany(Hobi::class, 'siswa_hobbys', 'siswa_id', 'hobby_id');
    }
    
}
