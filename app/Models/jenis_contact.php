<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_contact extends Model
{
    use HasFactory;
    protected $fliable = [
        'deskripsi'
    ];

    protected $table = 'jenis_contact';

    public function siswa(){
        return $this->belongsToMany('App\Models\siswa');
    }
}
