<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'foto',
        'about'
    ];

    protected $table = 'siswa';

    public function contact(){
        return $this->belongsToMany('App\Models\jenis_contact')->withPivot('deskripsi');
    }
    public function project(){
        return $this->hasMany('App\Models\project', 'id_siswa');
    }
}
