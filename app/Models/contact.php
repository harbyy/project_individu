<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fliable = [
        'siswa_id',
        'jenis_contact_id',
        'deskripsi'
    ];
    protected $table = 'jenis_contact_siswa';

    public function siswa(){
        return $this->belongsTo('App\Models\siswa','id');
    }
}
